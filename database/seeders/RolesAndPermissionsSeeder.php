<?php

namespace Database\Seeders;

use App\Models\RoleUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions

        // INICIO ADMINISTRACION
        Permission::create(
            [
                'name' => 'mostrar_administracion',
                'display_name' => 'Mostrar Administracion',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'mostrar_areas',
                'display_name' => 'Mostrar Areas',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'crear_area',
                'display_name' => 'Crear Areas',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'actualizar_area',
                'display_name' => 'Actualizar Area',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'bloquear_area',
                'display_name' => 'Bloquear Area',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'mostrar_barrios',
                'display_name' => 'Mostrar Barrios',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'crear_barrio',
                'display_name' => 'Crear Barrios',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'actualizar_barrio',
                'display_name' => 'Actualizar Barrio',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'mostrar_ciudades',
                'display_name' => 'Mostrar Ciudades',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'crear_ciudad',
                'display_name' => 'Crear Ciudad',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'actualizar_ciudad',
                'display_name' => 'Actualizar Ciudad',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'mostrar_clientes',
                'display_name' => 'Mostrar Clientes',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'crear_cliente',
                'display_name' => 'Crear Cliente',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'actualizar_cliente',
                'display_name' => 'Actualizar Cliente',
                'guard_name' => 'web'
            ]
        );

        Permission::create(
            [
                'name' => 'mostrar_condiciones_pago',
                'display_name' => 'Mostrar Condiciones Pago',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'crear_condicion_pago',
                'display_name' => 'Crear Condición Pago',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'actualizar_condicion_pago',
                'display_name' => 'Actualizar Condición Pago',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'bloquear_condicion_pago',
                'display_name' => 'Bloquear Condición Pago',
                'guard_name' => 'web'
            ]
        );

        Permission::create(
            [
                'name' => 'mostrar_seguimiento_cliente',
                'display_name' => 'Mostrar Seguimiento Cliente',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'crear_seguimiento_cliente',
                'display_name' => 'Crear Seguimiento Cliente',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'bloquear_cliente',
                'display_name' => 'Bloquear Cliente',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'mostrar_empleados',
                'display_name' => 'Mostrar Empleados',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'crear_empleado',
                'display_name' => 'Crear Empleado',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'actualizar_empleado',
                'display_name' => 'Actualizar Empleado',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'bloquear_empleado',
                'display_name' => 'Bloquear Empleado',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'agregar_examen',
                'display_name' => 'Agregar Examen',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'actualizar_archivo',
                'display_name' => 'Actualizar Archivo',
                'guard_name' => 'web'
            ]
        );

        Permission::create(
            [
                'name' => 'mostrar_empresas',
                'display_name' => 'Mostrar Empresas',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'crear_empresa',
                'display_name' => 'Crear Empresa',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'actualizar_empresa',
                'display_name' => 'Actualizar Empresa',
                'guard_name' => 'web'
            ]
        );

        Permission::create(
            [
                'name' => 'mostrar_encargado_novedades',
                'display_name' => 'Mostrar Encargado Novedades',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'crear_encargado_novedad',
                'display_name' => 'Crear Encargado Novedad',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'actualizar_encargado_novedad',
                'display_name' => 'Actualizar Encargado Novedad',
                'guard_name' => 'web'
            ]
        );

        Permission::create(
            [
                'name' => 'mostrar_estado_civil',
                'display_name' => 'Mostrar Estado Civil',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'crear_estado_civil',
                'display_name' => 'Crear Estado Civil',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'actualizar_estado_civil',
                'display_name' => 'Actualizar Estado Civil',
                'guard_name' => 'web'
            ]
        );

        Permission::create(
            [
                'name' => 'mostrar_localidades',
                'display_name' => 'Mostrar Localidades',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'crear_localidad',
                'display_name' => 'Crear Localidad',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'actualizar_localidad',
                'display_name' => 'Actualizar Localidad',
                'guard_name' => 'web'
            ]
        );

        Permission::create(
            [
                'name' => 'mostrar_proveedores',
                'display_name' => 'Mostrar Proveedores',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'crear_proveedor',
                'display_name' => 'Crear Proveedor',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'actualizar_proveedor',
                'display_name' => 'Actualizar Proveedor',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'bloquear_proveedor',
                'display_name' => 'Bloquear Proveedor',
                'guard_name' => 'web'
            ]
        );

        Permission::create(
            [
                'name' => 'mostrar_tipo_documentos',
                'display_name' => 'Mostrar Tipo Documentos',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'crear_tipo_documento',
                'display_name' => 'Crear Tipo Documento',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'actualizar_tipo_documento',
                'display_name' => 'Actualizar Tipo Documento',
                'guard_name' => 'web'
            ]
        );

        Permission::create(
            [
                'name' => 'mostrar_tipo_novedades',
                'display_name' => 'Mostrar Tipo Novedades',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'crear_tipo_novedad',
                'display_name' => 'Crear Tipo Novedad',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'actualizar_tipo_novedad',
                'display_name' => 'Actualizar Tipo Novedad',
                'guard_name' => 'web'
            ]
        );

        Permission::create(
            [
                'name' => 'mostrar_tipo_visitas',
                'display_name' => 'Mostrar Tipo Visitas',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'crear_tipo_visita',
                'display_name' => 'Crear Tipo Visita',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'actualizar_tipo_visita',
                'display_name' => 'Actualizar Tipo Visita',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'bloquear_tipo_visita',
                'display_name' => 'Bloquear Tipo Visita',
                'guard_name' => 'web'
            ]
        );

        Permission::create(
            [
                'name' => 'mostrar_usuarios',
                'display_name' => 'Mostrar Usuarios',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'crear_usuario',
                'display_name' => 'Crear Usuario',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'actualizar_usuario',
                'display_name' => 'Actualizar Usuario',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'bloquear_usuario',
                'display_name' => 'bloquear Usuario',
                'guard_name' => 'web'
            ]
        );
        // FIN ADMINISTRACION

        Permission::create(
            [
                'name' => 'mostrar_actas_reunion',
                'display_name' => 'Mostrar Actas Reunion',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'crear_acta_reunion',
                'display_name' => 'Crear Acta Reunion',
                'guard_name' => 'web'
            ]
        );

        Permission::create(
            [
                'name' => 'mostrar_apodatos',
                'display_name' => 'Mostrar Apodatos',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'crear_apodatos',
                'display_name' => 'Crear Apodatos',
                'guard_name' => 'web'
            ]
        );

        Permission::create(
            [
                'name' => 'mostrar_capacitaciones',
                'display_name' => 'Mostrar Capacitaciones',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'crear_capacitacion',
                'display_name' => 'Crear Capacitacion',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'actualizar_capacitacion',
                'display_name' => 'Actualizar Capacitacion',
                'guard_name' => 'web'
            ]
        );

        Permission::create(
            [
                'name' => 'mostrar_entrega_dotacion',
                'display_name' => 'Mostrar Entrega Dotacion',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'crear_entrega_dotacion',
                'display_name' => 'Crear entrega Dotacion',
                'guard_name' => 'web'
            ]
        );

        // INICIO INFORMES
        Permission::create(
            [
                'name' => 'mostrar_informes',
                'display_name' => 'Mostrar Informes',
                'guard_name' => 'web'
            ]
        );

        Permission::create(
            [
                'name' => 'mostrar_cctv',
                'display_name' => 'Mostrar Cctv',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'crear_cctv',
                'display_name' => 'Crear Cctv',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'actualizar_cctv',
                'display_name' => 'Actualizar Cctv',
                'guard_name' => 'web'
            ]
        );

        Permission::create(
            [
                'name' => 'mostrar_informe_mensual',
                'display_name' => 'Mostrar Informe Mensual',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'crear_informe_mensual',
                'display_name' => 'Crear Informe Mensual',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'actualizar_informe_mensual',
                'display_name' => 'Actualizar Informe Mensual',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'aprobar_informe_mensual',
                'display_name' => 'Aprobar Informe Mensual',
                'guard_name' => 'web'
            ]
        );

        Permission::create(
            [
                'name' => 'mostrar_inspeccion_ruta',
                'display_name' => 'Mostrar Inspeccion Ruta',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'crear_inspeccion_ruta',
                'display_name' => 'Crear Inspeccion Ruta',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'actualizar_inspeccion_ruta',
                'display_name' => 'Actualizar Inspeccion Ruta',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'cargar_pdf_inspeccion_ruta',
                'display_name' => 'Cargar Pdf Inspeccion Ruta',
                'guard_name' => 'web'
            ]
        );

        // FIN INFORMES

        // INICIO NOVEDADES
        Permission::create(
            [
                'name' => 'mostrar_novedades',
                'display_name' => 'Mostrar Novedades',
                'guard_name' => 'web'
            ]
        );

        Permission::create(
            [
                'name' => 'mostrar_novedades_clientes',
                'display_name' => 'Mostrar Novedades Clientes',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'crear_novedad_cliente',
                'display_name' => 'Crear Novedad Cliente',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'gestionar_novedad_cliente',
                'display_name' => 'Gestionar Novedad Cliente',
                'guard_name' => 'web'
            ]
        );

        Permission::create(
            [
                'name' => 'mostrar_novedades_guardas',
                'display_name' => 'Mostrar Novedades Guardas',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'crear_novedad_guarda',
                'display_name' => 'Crear Novedad Guarda',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'gestionar_novedad_guarda',
                'display_name' => 'Gestionar Novedad Guarda',
                'guard_name' => 'web'
            ]
        );

        Permission::create(
            [
                'name' => 'mostrar_novedades_rrhh',
                'display_name' => 'Mostrar Novedades Rrhh',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'crear_novedad_rrhh',
                'display_name' => 'Crear Novedad RRHH',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'gestionar_novedad_rrhh',
                'display_name' => 'Gestionar Novedad RRHH',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'exportar_novedades_rrhh',
                'display_name' => 'Exportar Novedades RRHH',
                'guard_name' => 'web'
            ]
        );

        // FIN NOVEDADES

        Permission::create(
            [
                'name' => 'mostrar_visita_tecnica',
                'display_name' => 'Mostrar Visita Tecnica',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'crear_visita_tecnica',
                'display_name' => 'Crear Visita Tecnica',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'actualizar_visita_tecnica',
                'display_name' => 'Actualizar Visita Tecnica',
                'guard_name' => 'web'
            ]
        );

        Permission::create(
            [
                'name' => 'mostrar_desvinculaciones',
                'display_name' => 'Mostrar Desvinculaciones',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'crear_desvinculacion',
                'display_name' => 'Crear Desvinculacion',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'aprobar_desvinculacion',
                'display_name' => 'Aprobar Desvinculacion',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'exportar_desvinculacion',
                'display_name' => 'Exportar Desvinculacion',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'mostrar_solicitud_personal',
                'display_name' => 'Mostrar Solicitud Personal',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'crear_solicitud_personal',
                'display_name' => 'crear Solicitud Personal',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'aprobar_solicitud_personal',
                'display_name' => 'Aprobar Solicitud Personal',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'crear_contrato',
                'display_name' => 'Crear Contrato',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'mostrar_banco_hdv',
                'display_name' => 'Mostrar Banco HDV',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'crear_hdv',
                'display_name' => 'Crear HDV',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'actualizar_hdv',
                'display_name' => 'Actualizar HDV',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'mostrar_certificados',
                'display_name' => 'Mostrar Certificados',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'mostrar_cotizaciones',
                'display_name' => 'Mostrar Cotizaciones',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'crear_cotizacion',
                'display_name' => 'Crear Cotizacion',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'aprobar_cotizacion',
                'display_name' => 'Aprobar Cotizacion',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'registrar_pago_orden_compra',
                'display_name' => 'Registrar Pago Orden Compra',
                'guard_name' => 'web'
            ]
        );

        // INICIO NOTIFICACIONES
        Permission::create(
            [
                'name' => 'mostrar_notificaciones_contrato_por_vencer',
                'display_name' => 'Mostrar Notificaciones Contrato Por Vencer',
                'guard_name' => 'web'
            ]
        );

        Permission::create(
            [
                'name' => 'mostrar_notificaciones_primera_visita',
                'display_name' => 'Mostrar Notificaciones Primera Visita',
                'guard_name' => 'web'
            ]
        );

        Permission::create(
            [
                'name' => 'mostrar_notificaciones_segunda_visita',
                'display_name' => 'Mostrar Notificaciones Segunda Visita',
                'guard_name' => 'web'
            ]
        );

        Permission::create(
            [
                'name' => 'mostrar_notificaciones_visita_mensual',
                'display_name' => 'Mostrar Notificaciones Visita Mensual',
                'guard_name' => 'web'
            ]
        );

        Permission::create(
            [
                'name' => 'mostrar_notificaciones_curso_por_vencer',
                'display_name' => 'Mostrar Notificaciones Curso Por Vencer',
                'guard_name' => 'web'
            ]
        );

        Permission::create(
            [
                'name' => 'mostrar_notificaciones_pendiente_afiliaciones',
                'display_name' => 'Mostrar Notificaciones Pendiente Afiliaciones',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'mostrar_notificaciones_examenes_medicos',
                'display_name' => 'Mostrar Notificaciones Examenes Medicos',
                'guard_name' => 'web'
            ]
        );

        // INICIO PANEL DE NOTIFICACIONES
        Permission::create(
            [
                'name' => 'mostrar_notificaciones_comercial',
                'display_name' => 'Mostrar Notificaciones Comercial',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'mostrar_notificaciones_desvinculaciones',
                'display_name' => 'Mostrar Notificaciones Desvinculaciones',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'mostrar_notificaciones_solicitud_personal',
                'display_name' => 'Mostrar Notificaciones Solicitud Personal',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'mostrar_notificaciones_apodatos',
                'display_name' => 'Mostrar Notificaciones Apodatos',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'mostrar_notificaciones_afiliaciones',
                'display_name' => 'Mostrar Notificaciones Afiliaciones',
                'guard_name' => 'web'
            ]
        );
        // FIN PANEL DE NOTIFICACIONES

        // FIN NOTIFICACIONES

        Permission::create(
            [
                'name' => 'mostrar_visitas_domiciliarias',
                'display_name' => 'Mostrar Visitas Domiciliarias',
                'guard_name' => 'web'
            ]
        );
        Permission::create(
            [
                'name' => 'crear_visita_domiciliaria',
                'display_name' => 'Crear Visita Domiciliaria',
                'guard_name' => 'web'
            ]
        );

        // Crear rol root y asignar todos permisos
        $role = Role::create(['name' => 'root', 'display_name' => 'Super Admin', 'guard_name' => 'web']);
        $role->givePermissionTo(Permission::all());

        // Crear rol administrador y asignar permisos
        $role = Role::create(['name' => 'admin', 'display_name' => 'Administrador', 'guard_name' => 'web']);
        $role->givePermissionTo(Permission::all());

        // Crear rol gerencia y asignar permisos
        $role = Role::create(['name' => 'gerencia', 'display_name' => 'Gerencia', 'guard_name' => 'web'])
            ->givePermissionTo([
                'mostrar_administracion',
                'mostrar_clientes',
                'mostrar_empleados',
                'mostrar_empresas',
                'actualizar_empresa',
                'mostrar_usuarios',
                'mostrar_capacitaciones',
                'mostrar_informes',
                'mostrar_cctv',
                'mostrar_informe_mensual',
                'aprobar_informe_mensual',
                'mostrar_inspeccion_ruta',
                'mostrar_novedades',
                'mostrar_novedades_clientes',
                'mostrar_novedades_guardas',
                'mostrar_visita_tecnica',
                'mostrar_desvinculaciones',
                'aprobar_desvinculacion',
                'exportar_desvinculacion',
                'mostrar_actas_reunion',
                'mostrar_novedades_rrhh',
                'crear_novedad_rrhh',
                'exportar_novedades_rrhh',
                'mostrar_cotizaciones',
                'crear_cotizacion',
                'aprobar_cotizacion',
            ]);

        // Crear rol subgerencia y asignar permisos
        $role = Role::create(['name' => 'subgerencia', 'display_name' => 'Subgerencia', 'guard_name' => 'web'])
            ->givePermissionTo([
                'mostrar_administracion',
                'mostrar_clientes',
                'mostrar_empleados',
                'mostrar_empresas',
                'actualizar_empresa',
                'mostrar_usuarios',
                'mostrar_capacitaciones',
                'mostrar_informes',
                'mostrar_cctv',
                'mostrar_informe_mensual',
                'aprobar_informe_mensual',
                'mostrar_inspeccion_ruta',
                'mostrar_novedades',
                'mostrar_novedades_clientes',
                'mostrar_novedades_guardas',
                'mostrar_visita_tecnica',
                'mostrar_desvinculaciones',
                'aprobar_desvinculacion',
                'exportar_desvinculacion',
                'mostrar_actas_reunion',
                'mostrar_novedades_rrhh',
                'crear_novedad_rrhh',
                'exportar_novedades_rrhh',
                'mostrar_cotizaciones',
                'crear_cotizacion',
                'aprobar_cotizacion',
            ]);

        // Crear rol guarda y asignar permisos
        $role = Role::create(['name' => 'guarda', 'display_name' => 'Seguridad', 'guard_name' => 'web'])
            ->givePermissionTo([
                'mostrar_novedades',
                'mostrar_novedades_guardas',
                'crear_novedad_guarda'
            ]);

        // Crear rol cliente y asignar permisos
        $role = Role::create(['name' => 'cliente', 'display_name' => 'Cliente', 'guard_name' => 'web'])
            ->givePermissionTo(
                [
                    'mostrar_novedades',
                    'mostrar_novedades_clientes',
                    'crear_novedad_cliente',
                    'mostrar_informes',
                    'mostrar_inspeccion_ruta',
                    'mostrar_visita_tecnica',
                    'crear_visita_tecnica',
                    'mostrar_cctv'
                ],
            );

        // Crear rol coordinador y asignar permisos
        $role = Role::create(['name' => 'coordinador', 'display_name' => 'Coordinador', 'guard_name' => 'web'])
            ->givePermissionTo([
                'mostrar_novedades',
                'mostrar_novedades_clientes',
                'gestionar_novedad_cliente',
                'mostrar_novedades_guardas',
                'gestionar_novedad_guarda',
                'mostrar_informes',
                'mostrar_inspeccion_ruta',
                'crear_inspeccion_ruta',
                'actualizar_inspeccion_ruta',
                'mostrar_visita_tecnica',
                'crear_visita_tecnica',
                'actualizar_visita_tecnica',
                'mostrar_actas_reunion',
                'crear_acta_reunion',
                'mostrar_novedades_rrhh',
                'crear_novedad_rrhh',
                'exportar_novedades_rrhh'
            ]);

        // Crear rol jefe de operaciones y asignar permisos
        $role = Role::create(['name' => 'jefe_operaciones', 'display_name' => 'Jefe Operaciones', 'guard_name' => 'web'])
            ->givePermissionTo([
                'mostrar_novedades',
                'mostrar_novedades_clientes',
                'gestionar_novedad_cliente',
                'mostrar_novedades_guardas',
                'gestionar_novedad_guarda',
                'mostrar_informes',
                'mostrar_inspeccion_ruta',
                'crear_inspeccion_ruta',
                'actualizar_inspeccion_ruta',
                'mostrar_visita_tecnica',
                'crear_visita_tecnica',
                'actualizar_visita_tecnica',
                'mostrar_desvinculaciones',
                'crear_desvinculacion',
                'aprobar_desvinculacion',
                'mostrar_solicitud_personal',
                'crear_solicitud_personal',
                'mostrar_actas_reunion',
                'crear_acta_reunion',
                'mostrar_notificaciones_solicitud_personal',
                'mostrar_novedades_rrhh',
                'crear_novedad_rrhh',
                'exportar_novedades_rrhh'
            ]);

        // Crear rol supervisor y asignar permisos
        $role = Role::create(['name' => 'supervisor', 'display_name' => 'Supervisor', 'guard_name' => 'web'])
            ->givePermissionTo([
                'mostrar_informes',
                'mostrar_inspeccion_ruta',
                'crear_inspeccion_ruta',
                'actualizar_inspeccion_ruta',
                'crear_inspeccion_ruta',
                'actualizar_inspeccion_ruta',
                'mostrar_visita_tecnica',
                'crear_visita_tecnica',
                'actualizar_visita_tecnica',
                'mostrar_actas_reunion',
                'crear_acta_reunion',
                'crear_visita_domiciliaria',
                'mostrar_novedades',
                'mostrar_novedades_rrhh',
                'crear_novedad_rrhh',
                'exportar_novedades_rrhh'
            ]);

        // Crear rol Auxiliar de Operaciones y asignar permisos
        $role = Role::create(['name' => 'auxiliar_operaciones', 'display_name' => 'Auxiliar Operaciones', 'guard_name' => 'web'])
            ->givePermissionTo([
                'mostrar_administracion',
                'mostrar_areas',
                'mostrar_barrios',
                'crear_barrio',
                'actualizar_barrio',
                'mostrar_ciudades',
                'crear_ciudad',
                'actualizar_ciudad',
                'mostrar_clientes',
                'crear_cliente',
                'actualizar_cliente',
                'mostrar_seguimiento_cliente',
                'crear_seguimiento_cliente',
                'bloquear_cliente',
                'mostrar_empleados',
                'mostrar_empresas',
                'actualizar_empresa',
                'mostrar_localidades',
                'crear_localidad',
                'actualizar_localidad',
                'mostrar_usuarios',
                'crear_usuario',
                'actualizar_usuario',
                'mostrar_capacitaciones',
                'crear_capacitacion',
                'actualizar_capacitacion',
                'mostrar_entrega_dotacion',
                'crear_entrega_dotacion',
                'mostrar_informes',
                'mostrar_informe_mensual',
                'crear_informe_mensual',
                'actualizar_informe_mensual',
                'mostrar_cctv',
                'mostrar_inspeccion_ruta',
                'cargar_pdf_inspeccion_ruta',
                'mostrar_novedades',
                'mostrar_novedades_clientes',
                'mostrar_novedades_guardas',
                'mostrar_visita_tecnica',
                'mostrar_desvinculaciones',
                'aprobar_desvinculacion',
                'crear_desvinculacion',
                'mostrar_solicitud_personal',
                'crear_solicitud_personal',
                'mostrar_actas_reunion',
                'crear_acta_reunion'
            ]);

        // Crear rol Auxiliar Comercial y asignar permisos
        $role = Role::create(['name' => 'auxiliar_comercial', 'display_name' => 'Auxiliar Comercial', 'guard_name' => 'web'])
            ->givePermissionTo([
                'mostrar_administracion',
                'mostrar_areas',
                'mostrar_barrios',
                'crear_barrio',
                'actualizar_barrio',
                'mostrar_ciudades',
                'crear_ciudad',
                'actualizar_ciudad',
                'mostrar_clientes',
                'crear_cliente',
                'actualizar_cliente',
                'mostrar_seguimiento_cliente',
                'crear_seguimiento_cliente',
                'bloquear_cliente',
                'mostrar_empleados',
                'mostrar_empresas',
                'mostrar_localidades',
                'crear_localidad',
                'actualizar_localidad',
                'mostrar_capacitaciones',
                'crear_capacitacion',
                'actualizar_capacitacion',
                'mostrar_informes',
                'mostrar_informe_mensual',
                'crear_informe_mensual',
                'actualizar_informe_mensual',
                'mostrar_cctv',
                'mostrar_inspeccion_ruta',
                'mostrar_visita_tecnica',
                'mostrar_solicitud_personal',
                'crear_solicitud_personal',
                'mostrar_notificaciones_contrato_por_vencer',
                'mostrar_notificaciones_primera_visita',
                'mostrar_notificaciones_segunda_visita',
                'mostrar_notificaciones_visita_mensual'
            ]);

        // Crear rol Director Comercial y asignar permisos
        $role = Role::create(['name' => 'director_comercial', 'display_name' => 'Director Comercial', 'guard_name' => 'web'])
            ->givePermissionTo([
                'mostrar_administracion',
                'mostrar_areas',
                'mostrar_barrios',
                'crear_barrio',
                'actualizar_barrio',
                'mostrar_ciudades',
                'crear_ciudad',
                'actualizar_ciudad',
                'mostrar_clientes',
                'crear_cliente',
                'actualizar_cliente',
                'mostrar_seguimiento_cliente',
                'crear_seguimiento_cliente',
                'bloquear_cliente',
                'mostrar_empleados',
                'mostrar_empresas',
                'mostrar_localidades',
                'crear_localidad',
                'actualizar_localidad',
                'mostrar_capacitaciones',
                'crear_capacitacion',
                'actualizar_capacitacion',
                'mostrar_informes',
                'mostrar_informe_mensual',
                'crear_informe_mensual',
                'actualizar_informe_mensual',
                'mostrar_cctv',
                'mostrar_inspeccion_ruta',
                'mostrar_visita_tecnica',
                'crear_visita_tecnica',
                'actualizar_visita_tecnica',
                'mostrar_desvinculaciones',
                'aprobar_desvinculacion',
                'mostrar_notificaciones_contrato_por_vencer',
                'mostrar_notificaciones_primera_visita',
                'mostrar_notificaciones_segunda_visita',
                'mostrar_notificaciones_visita_mensual',
                'mostrar_notificaciones_comercial',
                'mostrar_novedades',
                'mostrar_novedades_rrhh',
                'crear_novedad_rrhh',
                'exportar_novedades_rrhh'
            ]);

        // Crear rol auxiliar de tesoreria y asignar permisos
        $role = Role::create(['name' => 'auxiliar_tesoreria', 'display_name' => 'Auxiliar Tesoreria', 'guard_name' => 'web'])
            ->givePermissionTo([
                'mostrar_administracion',
                'mostrar_areas',
                'mostrar_barrios',
                'mostrar_ciudades',
                'mostrar_clientes',
                'mostrar_seguimiento_cliente',
                'mostrar_empleados',
                'mostrar_empresas',
                'mostrar_localidades',
                'mostrar_capacitaciones',
                'mostrar_informes',
                'mostrar_informe_mensual',
                'crear_informe_mensual',
                'actualizar_informe_mensual',
                'mostrar_desvinculaciones',
                'aprobar_desvinculacion',
                'exportar_desvinculacion'
            ]);

        // Crear rol asistente de RRHH y asignar permisos
        $role = Role::create(['name' => 'asistente_rrhh', 'display_name' => 'Asistente RRHH', 'guard_name' => 'web'])
            ->givePermissionTo([
                'mostrar_administracion',
                'mostrar_areas',
                'mostrar_barrios',
                'crear_barrio',
                'actualizar_barrio',
                'mostrar_ciudades',
                'crear_ciudad',
                'actualizar_ciudad',
                'mostrar_clientes',
                'mostrar_seguimiento_cliente',
                'mostrar_empleados',
                'crear_empleado',
                'actualizar_empleado',
                'bloquear_empleado',
                'actualizar_archivo',
                'mostrar_empresas',
                'actualizar_empresa',
                'mostrar_localidades',
                'crear_localidad',
                'actualizar_localidad',
                'mostrar_usuarios',
                'crear_usuario',
                'actualizar_usuario',
                'bloquear_usuario',
                'mostrar_capacitaciones',
                'crear_capacitacion',
                'actualizar_capacitacion',
                'mostrar_entrega_dotacion',
                'mostrar_informes',
                'mostrar_informe_mensual',
                'crear_informe_mensual',
                'actualizar_informe_mensual',
                'mostrar_inspeccion_ruta',
                'mostrar_visita_tecnica',
                'mostrar_desvinculaciones',
                'crear_desvinculacion',
                'aprobar_desvinculacion',
                'exportar_desvinculacion',
                'mostrar_solicitud_personal',
                'crear_contrato',
                'mostrar_banco_hdv',
                'crear_hdv',
                'actualizar_hdv',
                'mostrar_notificaciones_curso_por_vencer',
                'mostrar_notificaciones_pendiente_afiliaciones',
                'mostrar_apodatos',
                'crear_apodatos',
                'agregar_examen',
                'mostrar_notificaciones_examenes_medicos',
                'mostrar_certificados'
            ]);

        // Crear rol jefe de RRHH y asignar permisos
        $role = Role::create(['name' => 'jefe_rrhh', 'display_name' => 'Jefe RRHH', 'guard_name' => 'web'])
        ->givePermissionTo([
            'mostrar_administracion',
            'mostrar_areas',
            'mostrar_barrios',
            'crear_barrio',
            'actualizar_barrio',
            'mostrar_ciudades',
            'crear_ciudad',
            'actualizar_ciudad',
            'mostrar_clientes',
            'mostrar_seguimiento_cliente',
            'mostrar_empleados',
            'crear_empleado',
            'actualizar_empleado',
            'bloquear_empleado',
            'actualizar_archivo',
            'mostrar_empresas',
            'actualizar_empresa',
            'mostrar_localidades',
            'crear_localidad',
            'actualizar_localidad',
            'mostrar_usuarios',
            'crear_usuario',
            'actualizar_usuario',
            'bloquear_usuario',
            'mostrar_capacitaciones',
            'crear_capacitacion',
            'actualizar_capacitacion',
            'mostrar_entrega_dotacion',
            'mostrar_informes',
            'mostrar_informe_mensual',
            'crear_informe_mensual',
            'actualizar_informe_mensual',
            'mostrar_inspeccion_ruta',
            'mostrar_visita_tecnica',
            'mostrar_desvinculaciones',
            'crear_desvinculacion',
            'aprobar_desvinculacion',
            'exportar_desvinculacion',
            'mostrar_solicitud_personal',
            'crear_contrato',
            'mostrar_banco_hdv',
            'crear_hdv',
            'actualizar_hdv',
            'mostrar_notificaciones_curso_por_vencer',
            'mostrar_notificaciones_pendiente_afiliaciones',
            'mostrar_apodatos',
            'crear_apodatos',
            'agregar_examen',
            'mostrar_notificaciones_examenes_medicos',
            'mostrar_visitas_domiciliarias',
            'mostrar_notificaciones_desvinculaciones',
            'mostrar_notificaciones_solicitud_personal',
            'mostrar_novedades',
            'mostrar_novedades_rrhh',
            'crear_novedad_rrhh',
            'gestionar_novedad_rrhh',
            'exportar_novedades_rrhh',
            'mostrar_certificados'
        ]);

        // Crear rol director de RRHH y asignar permisos
        $role = Role::create(['name' => 'director_rrhh', 'display_name' => 'Director RRHH', 'guard_name' => 'web'])
        ->givePermissionTo([
            'mostrar_administracion',
            'mostrar_areas',
            'mostrar_barrios',
            'crear_barrio',
            'actualizar_barrio',
            'mostrar_ciudades',
            'crear_ciudad',
            'actualizar_ciudad',
            'mostrar_clientes',
            'mostrar_seguimiento_cliente',
            'mostrar_empleados',
            'crear_empleado',
            'actualizar_empleado',
            'bloquear_empleado',
            'actualizar_archivo',
            'mostrar_empresas',
            'actualizar_empresa',
            'mostrar_localidades',
            'crear_localidad',
            'actualizar_localidad',
            'mostrar_usuarios',
            'crear_usuario',
            'actualizar_usuario',
            'bloquear_usuario',
            'mostrar_capacitaciones',
            'crear_capacitacion',
            'actualizar_capacitacion',
            'mostrar_entrega_dotacion',
            'mostrar_informes',
            'mostrar_informe_mensual',
            'crear_informe_mensual',
            'actualizar_informe_mensual',
            'mostrar_inspeccion_ruta',
            'mostrar_visita_tecnica',
            'mostrar_desvinculaciones',
            'crear_desvinculacion',
            'aprobar_desvinculacion',
            'exportar_desvinculacion',
            'mostrar_solicitud_personal',
            'crear_contrato',
            'mostrar_banco_hdv',
            'crear_hdv',
            'actualizar_hdv',
            'mostrar_notificaciones_curso_por_vencer',
            'mostrar_notificaciones_pendiente_afiliaciones',
            'mostrar_apodatos',
            'crear_apodatos',
            'agregar_examen',
            'mostrar_notificaciones_examenes_medicos',
            'mostrar_visitas_domiciliarias',
            'mostrar_notificaciones_desvinculaciones',
            'mostrar_notificaciones_solicitud_personal',
            'mostrar_novedades',
            'mostrar_novedades_rrhh',
            'crear_novedad_rrhh',
            'gestionar_novedad_rrhh',
            'exportar_novedades_rrhh',
            'mostrar_certificados'
        ]);

        // Crear rol líder de gestión documental y asignar permisos
        $role = Role::create(['name' => 'lider_gestion_documental', 'display_name' => 'Lider Gestion Documental', 'guard_name' => 'web'])
            ->givePermissionTo([
                'mostrar_desvinculaciones',
                'aprobar_desvinculacion'
            ]);

        // Crear rol director de calidad y asignar permisos
        $role = Role::create(['name' => 'director_calidad', 'display_name' => 'Director Calidad', 'guard_name' => 'web'])
            ->givePermissionTo([
                'mostrar_administracion',
                'mostrar_areas',
                'mostrar_barrios',
                'crear_barrio',
                'actualizar_barrio',
                'mostrar_ciudades',
                'crear_ciudad',
                'actualizar_ciudad',
                'mostrar_clientes',
                'mostrar_seguimiento_cliente',
                'mostrar_empleados',
                'crear_empleado',
                'actualizar_empleado',
                'bloquear_empleado',
                'actualizar_archivo',
                'mostrar_empresas',
                'actualizar_empresa',
                'mostrar_localidades',
                'crear_localidad',
                'actualizar_localidad',
                'mostrar_usuarios',
                'crear_usuario',
                'actualizar_usuario',
                'mostrar_capacitaciones',
                'crear_capacitacion',
                'actualizar_capacitacion',
                'mostrar_entrega_dotacion',
                'crear_entrega_dotacion',
                'mostrar_informes',
                'mostrar_informe_mensual',
                'crear_informe_mensual',
                'actualizar_informe_mensual',
                'mostrar_inspeccion_ruta',
                'mostrar_novedades',
                'mostrar_novedades_clientes',
                'mostrar_novedades_guardas',
                'mostrar_visita_tecnica',
                'mostrar_desvinculaciones',
                'aprobar_desvinculacion',
                'exportar_desvinculacion',
                'mostrar_solicitud_personal',
                'crear_contrato',
                'mostrar_actas_reunion',
                'crear_acta_reunion',
                'mostrar_novedades_rrhh',
                'crear_novedad_rrhh',
                'exportar_novedades_rrhh'
            ]);

        // Crear rol director de operaciones y asignar permisos
        $role = Role::create(['name' => 'director_operaciones', 'display_name' => 'Director Operaciones', 'guard_name' => 'web'])
            ->givePermissionTo([
                'mostrar_novedades',
                'mostrar_novedades_clientes',
                'gestionar_novedad_cliente',
                'mostrar_novedades_guardas',
                'gestionar_novedad_guarda',
                'mostrar_informes',
                'mostrar_inspeccion_ruta',
                'crear_inspeccion_ruta',
                'actualizar_inspeccion_ruta',
                'mostrar_visita_tecnica',
                'crear_visita_tecnica',
                'actualizar_visita_tecnica',
                'mostrar_desvinculaciones',
                'crear_desvinculacion',
                'aprobar_desvinculacion',
                'mostrar_solicitud_personal',
                'crear_solicitud_personal',
                'mostrar_actas_reunion',
                'crear_acta_reunion',
                'mostrar_novedades_rrhh',
                'crear_novedad_rrhh',
                'exportar_novedades_rrhh'
            ]);

        // Crear rol director de financiero y asignar permisos
        $role = Role::create(['name' => 'director_financiero', 'display_name' => 'Director Financiero', 'guard_name' => 'web'])
        ->givePermissionTo([
            'mostrar_condiciones_pago',
            'crear_condicion_pago',
            'actualizar_condicion_pago',
            'bloquear_condicion_pago',
            'mostrar_proveedores',
            'crear_proveedor',
            'actualizar_proveedor',
            'bloquear_proveedor',
            'mostrar_cotizaciones',
            'crear_cotizacion',
            'registrar_pago_orden_compra',
        ]);

        // Crear rol auxiliar financiero y asignar permisos
        $role = Role::create(['name' => 'auxiliar_financiero', 'display_name' => 'Auxiliar Financiero', 'guard_name' => 'web'])
        ->givePermissionTo([
            'mostrar_condiciones_pago',
            'crear_condicion_pago',
            'actualizar_condicion_pago',
            'bloquear_condicion_pago',
            'mostrar_proveedores',
            'crear_proveedor',
            'actualizar_proveedor',
            'bloquear_proveedor',
            'mostrar_cotizaciones',
            'crear_cotizacion',
            'registrar_pago_orden_compra',
        ]);

        // Asignar el rol root al usuario 1 (root)
        RoleUser::create([
            'role_id' => 1,
            'model_type' => 'App\Models\User',
            'model_id' => 1,
            'empresa_id' => 1,
        ]);

        // Asignar el rol gerencia al gerente (Andres Villamizar)
        RoleUser::create([
            'role_id' => 3,
            'model_type' => 'App\Models\User',
            'model_id' => 2,
            'empresa_id' => 1,
        ]);

        // Asignar el rol subgerencia a la subgerente (Blanca Romero)
        RoleUser::create([
            'role_id' => 4,
            'model_type' => 'App\Models\User',
            'model_id' => 3,
            'empresa_id' => 1,
        ]);
    }
}
