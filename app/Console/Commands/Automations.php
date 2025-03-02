<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\Employe;
use App\Models\Apodatos;
use App\Models\Customer;
use App\Models\CustomerTracing;
use App\Models\EmployeContract;
use Illuminate\Console\Command;
use App\Models\CustomerAttachment;
use App\Models\EmployeAffiliation;
use App\Models\ApodatosNotification;
use Illuminate\Support\Facades\Mail;
use App\Models\ComercialNotification;
use App\Models\AffiliationNotification;

class Automations extends Command
{
    protected $signature = 'notificaciones:Automatizaciones';
    protected $description = 'En este espacio se ejecutan todos los cronjobs del sistema';

    public function handle()
    {
        $empleados = Employe::where('state', 1)->get();
        $datos = [];
        $usuarios = User::permission('mostrar_notificaciones_pendiente_afiliaciones')->get();
        foreach ($empleados as $val) {
            $faltantes = [];
            $epsCount = EmployeAffiliation::where('affiliation_id', 1)->where('employe_id', $val->id)->first();
            if (empty($epsCount)) {
                array_push($faltantes, 'EPS');
            }
            $arlCount = EmployeAffiliation::where('affiliation_id', 2)->where('employe_id', $val->id)->first();
            if (empty($arlCount)) {
                array_push($faltantes, 'ARL');
            }
            $afpCount = EmployeAffiliation::where('affiliation_id', 3)->where('employe_id', $val->id)->first();
            if (empty($afpCount)) {
                array_push($faltantes, 'AFP');
            }
            $cesCount = EmployeAffiliation::where('affiliation_id', 4)->where('employe_id', $val->id)->first();
            if (empty($cesCount)) {
                array_push($faltantes, 'CES');
            }
            $ccfCount = EmployeAffiliation::where('affiliation_id', 5)->where('employe_id', $val->id)->first();
            if (empty($ccfCount)) {
                array_push($faltantes, 'CCF');
            }
            if (!empty($faltantes)) {
                $data = [
                    'empleado' => $val->name . ' ' . $val->surname,
                    'afiliaciones' => implode(', ', $faltantes)
                ];
                array_push($datos, $data);
                if (!empty($usuarios)) {
                    foreach ($usuarios as $u) {
                        $email = [$u->email];
                        $registrada = AffiliationNotification::where('type_id', 8)
                            ->where('employe_id', $val->id)
                            ->where('user_id', $u->id)
                            ->count();
                        if ($registrada == 0) {
                            AffiliationNotification::insert([
                                'type_id' => 8,
                                'employe_id' => $val->id,
                                'obs' => 'Afiliaciones Faltantes: ' . implode(', ', $faltantes),
                                'created_at' => date('Y-m-d G:i:s'),
                                'updated_at' => date('Y-m-d G:i:s'),
                                'user_id' => $u->id
                            ]);
                        }
                    }
                }
            }
        }
        //envio de email con los empleados que les falta alguna afiliación
        if (!empty($datos) && !empty($usuarios)) {
            Mail::send('emails.sinAfiliacion', ['email' => $email, 'datos' => $datos], function ($message) use ($email, $datos) {
                $message->from('notificaciones@correo.com', 'Alejandro Ltda');
                $message->Bcc($email);
                $message->subject('Reporte de Personal sin Afiliaciones');
            });
        }

        $fechaActual = date('Y-m-d');
        $Ults40d = date('Y-m-d', strtotime($fechaActual . '+ 45 days'));

        //***********CONTRATO POR VENCER*******************
        $ContXvencer = Customer::where('current_contract_end_date', '>', $fechaActual)->where('current_contract_end_date', '<', $Ults40d)->get();
        if (count($ContXvencer) > 0) {
            foreach ($ContXvencer as $val) {
                // notificación por sistema CONTRATO POR VENCER por 40 días
                $fecha40d = date('Y-m-d', strtotime($val->current_contract_end_date . '- 40 days'));
                $usuarios = User::permission('mostrar_notificaciones_contrato_por_vencer')->get();
                if ($fechaActual == $fecha40d) {
                    if (!empty($usuarios)) {
                        foreach ($usuarios as $u) {
                            $registrada = ComercialNotification::where('type_id', 2)
                                ->where('customer_id', $val->id)
                                ->where('user_id', $u->id)
                                ->count();
                            if ($registrada == 0) {
                                ComercialNotification::insert([
                                    'type_id' => 2,
                                    'customer_id' => $val->id,
                                    'obs' => 'Fecha de finalización de contrato comercial por vencer',
                                    'created_at' => date('Y-m-d G:i:s'),
                                    'updated_at' => date('Y-m-d G:i:s'),
                                    'user_id' => $u->id
                                ]);
                            }
                        }
                    }
                }

                // notificación por sistema CONTRATO POR VENCER por 15 días
                $fecha15d = date('Y-m-d', strtotime($val->current_contract_end_date . '- 15 days'));
                if ($fechaActual == $fecha15d) {
                    if (!empty($usuarios)) {
                        foreach ($usuarios as $u) {
                            $registrada = ComercialNotification::where('type_id', 2)
                                ->where('customer_id', $val->id)
                                ->where('user_id', $u->id)
                                ->count();
                            if ($registrada == 0) {
                                ComercialNotification::insert([
                                    'type_id' => 2,
                                    'customer_id' => $val->id,
                                    'obs' => 'Fecha de finalización de contrato comercial por vencer',
                                    'created_at' => date('Y-m-d G:i:s'),
                                    'updated_at' => date('Y-m-d G:i:s'),
                                    'user_id' => $u->id
                                ]);
                            }
                        }
                    }
                }
            }
        }

        // **********PROGRAMAR PRIMERA VISITA despues de enviar BROCHURE**********
        $visita1 = CustomerTracing::where('send_brochure', 'no')
            ->where('date_of_visit', null)
            ->get();

        if (count($visita1) > 0) {
            foreach ($visita1 as $val) {
                $fecha8d = date('Y-m-d', strtotime($val->created_at . '+ 8 days'));
                $usuarios = User::permission('mostrar_notificaciones_primera_visita')->get();
                if ($fechaActual == $fecha8d) {
                    if (!empty($usuarios)) {
                        foreach ($usuarios as $u) {
                            $registrada = ComercialNotification::where('type_id', 1)
                                ->where('customer_id', $val->customer_id)
                                ->where('user_id', $u->id)
                                ->count();
                            if ($registrada == 0) {
                                ComercialNotification::insert([
                                    'type_id' => 1,
                                    'customer_id' => $val->customer_id,
                                    'obs' => 'Programar visita después de enviar brochure',
                                    'created_at' => date('Y-m-d G:i:s'),
                                    'updated_at' => date('Y-m-d G:i:s'),
                                    'user_id' => $u->id
                                ]);
                            }
                        }
                    }
                }
            }
        }

        // **********PROGRAMAR VISITA despues de enviar PROPUESTA ECONÓMICA**********
        $visita1 = CustomerAttachment::where('type', 'Propuesta Económica')
            ->where('date_send', '<', $Ults40d)->get();

        if (count($visita1) > 0) {
            foreach ($visita1 as $val) {
                $fecha8d = date('Y-m-d', strtotime($val->created_at . '+ 8 days'));
                $usuarios = User::permission('mostrar_notificaciones_segunda_visita')->get();
                if ($fechaActual == $fecha8d) {
                    if (!empty($usuarios)) {
                        foreach ($usuarios as $u) {
                            $registrada = ComercialNotification::where('type_id', 3)
                                ->where('customer_id', $val->customer_id)
                                ->where('user_id', $u->id)
                                ->count();
                            if ($registrada == 0) {
                                ComercialNotification::insert([
                                    'type_id' => 3,
                                    'customer_id' => $val->customer_id,
                                    'obs' => 'Confirmar recibido de propuesta económica',
                                    'created_at' => date('Y-m-d G:i:s'),
                                    'updated_at' => date('Y-m-d G:i:s'),
                                    'user_id' => $u->id
                                ]);
                            }
                        }
                    }
                }
            }
        }

        // **********PROGRAMAR VISITA MENSUAL**********
        $visitaMensual = Customer::where('state', 1)->get();
        if (count($visitaMensual) > 0) {
            foreach ($visitaMensual as $val) {
                $noti1 = Customer::where('last_notification', null)->get();
                if (isset($noti1)) {
                    $fecha30d = date('Y-m-d', strtotime($val->contract_init_date . '+ 30 days'));
                } else {
                    $fecha30d = date('Y-m-d', strtotime($noti1->last_notification . '+ 30 days'));
                }
                $usuarios = User::permission('mostrar_notificaciones_visita_mensual')->get();
                if ($fechaActual == $fecha30d) {
                    if (!empty($usuarios)) {
                        foreach ($usuarios as $u) {
                            $registrada = ComercialNotification::where('type_id', 4)
                                ->where('customer_id', $val->id)
                                ->where('user_id', $u->id)
                                ->count();
                            if ($registrada == 0) {
                                ComercialNotification::insert([
                                    'type_id' => 4,
                                    'customer_id' => $val->id,
                                    'obs' => 'Realizar visita para seguimiento mensual',
                                    'created_at' => date('Y-m-d G:i:s'),
                                    'updated_at' => date('Y-m-d G:i:s'),
                                    'user_id' => $u->id
                                ]);
                                if (isset($noti1)) {
                                    $fecha30d = date('Y-m-d', strtotime($val->contract_init_date . '+ 30 days'));
                                    Customer::where('id', $val->id)->update(['last_notification' => $fechaActual]);
                                }
                            }
                        }
                    }
                }
            }
        }

        // **********CURSO POR VENCER (APODATOS)**********
        $fechaMenos1A = date('Y-m-d', strtotime($fechaActual . '- 364 days'));
        $cursoXvencer = Apodatos::where('course_date', '>=', $fechaMenos1A)->where('state', 1)->get();
        if (count($cursoXvencer) > 0) {
            foreach ($cursoXvencer as $val) {
                $usuarios = User::permission('mostrar_notificaciones_curso_por_vencer')->get();
                if ($fechaMenos1A == date('Y-m-d', strtotime($val->course_date . '- 30 days'))) {
                    if (!empty($usuarios)) {
                        foreach ($usuarios as $u) {
                            $registrada = ApodatosNotification::where('type_id', 7)
                                ->where('employe_id', $val->employe_id)
                                ->where('user_id', $u->id)
                                ->count();
                            if ($registrada == 0) {
                                ApodatosNotification::insert([
                                    'type_id' => 7,
                                    'employe_id' => $val->employe_id,
                                    'obs' => 'Curso próximo a vencer el ' . date('d-m-Y', strtotime($val->course_date . '+ 364 days')),
                                    'created_at' => date('Y-m-d G:i:s'),
                                    'updated_at' => date('Y-m-d G:i:s'),
                                    'user_id' => $u->id
                                ]);
                            }
                        }
                    }
                    Apodatos::where('id', $val->id)->update(['state' => 3]);
                }
            }
        }

        // **********CONTRATO POR VENCER (NOTIFICACION PARA LA REALIZACION DE EXÁMENES MÉDICOS)**********
        //Notificar los contratos indefinidos y por obra o labor (2 meses de periodo de prueba, notificar 15 dias antes)
        $fechaMas15d = date('Y-m-d', strtotime($fechaActual . '+ 15 days'));
        $fechaMenos60d = date('Y-m-d', strtotime($fechaActual . '- 50 days'));
        $contIndObra = EmployeContract::where('start_date','>=',$fechaMenos60d)
        ->where('end_date', $fechaMas15d)
        ->where('state', 1)
        ->whereIn('contract_type_id',[2,3])
        ->get();
        if (count($contIndObra) > 0) {
            foreach ($contIndObra as $val) {
                $usuarios = User::permission('mostrar_notificaciones_examenes_medicos')->get();
                if (!empty($usuarios)) {
                    foreach ($usuarios as $u) {
                        $registrada = EmployeContractNotification::where('type_id', 9)
                            ->where('employe_id', $val->employe_id)
                            ->where('user_id', $u->id)
                            ->count();
                        if ($registrada == 0) {
                            EmployeContractNotification::insert([
                                'type_id' => 9,
                                'employe_id' => $val->employe_id,
                                'obs' => 'Contrato de período de prueba próximo a vencer el ' . date('d-m-Y', strtotime($val->end_date)),
                                'created_at' => date('Y-m-d G:i:s'),
                                'updated_at' => date('Y-m-d G:i:s'),
                                'user_id' => $u->id
                            ]);
                        }
                    }
                }
            }
        }

        // Notificar los contratos a término fijo (37 dias de periodo de prueba, notificar 15 dias antes)
        $fechaMenos37d = date('Y-m-d', strtotime($fechaActual . '- 37 days'));
        $contFijo = EmployeContract::where('start_date','>=',$fechaMenos37d)
        ->where('end_date', $fechaMas15d)
        ->where('state', 1)
        ->where('contract_type_id',1)
        ->get();
        if (count($contFijo) > 0) {
            foreach ($contFijo as $val) {
                $usuarios = User::permission('mostrar_notificaciones_examenes_medicos')->get();
                if (!empty($usuarios)) {
                    foreach ($usuarios as $u) {
                        $registrada = EmployeContractNotification::where('type_id', 10)
                            ->where('employe_id', $val->employe_id)
                            ->where('user_id', $u->id)
                            ->count();
                        if ($registrada == 0) {
                            EmployeContractNotification::insert([
                                'type_id' => 10,
                                'employe_id' => $val->employe_id,
                                'obs' => 'Contrato de período de prueba próximo a vencer el ' . date('d-m-Y', strtotime($val->end_date)),
                                'created_at' => date('Y-m-d G:i:s'),
                                'updated_at' => date('Y-m-d G:i:s'),
                                'user_id' => $u->id
                            ]);
                        }
                    }
                }
            }
        }

        //Notificar exámenes periódicos (cada 2 años, notificar 15 dias antes)
        $fechaMenos2a = date('Y-m-d', strtotime($fechaActual . '- 2 years'));
        $fechaMenos2a = date('Y-m-d', strtotime($fechaMenos2a . '- 15 days'));
        $ExamPeriodico = EmployeContract::where('state', 1)
        ->whereRelation(
            'rel_ult_examen', 'date', $fechaMenos2a
        )
        ->get();
        if (count($ExamPeriodico) > 0) {
            foreach ($ExamPeriodico as $val) {
                $usuarios = User::permission('mostrar_notificaciones_examenes_medicos')->get();
                if (!empty($usuarios)) {
                    foreach ($usuarios as $u) {
                        $registrada = EmployeContractNotification::where('type_id', 11)
                            ->where('employe_id', $val->employe_id)
                            ->where('user_id', $u->id)
                            ->count();
                        if ($registrada == 0) {
                            EmployeContractNotification::insert([
                                'type_id' => 11,
                                'employe_id' => $val->employe_id,
                                'obs' => 'Exámen periódico próximo a vencer el ' . date('d-m-Y', strtotime($val->end_date)),
                                'created_at' => date('Y-m-d G:i:s'),
                                'updated_at' => date('Y-m-d G:i:s'),
                                'user_id' => $u->id
                            ]);
                        }
                    }
                }
            }
        }

    }
}
