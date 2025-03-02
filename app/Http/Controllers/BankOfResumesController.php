<?php

namespace App\Http\Controllers;

use App\Models\Ciudad;
use App\Models\Empresa;
use App\Models\Locality;
use App\Models\EmpresaUser;
use App\Models\Neighborhood;
use Illuminate\Http\Request;
use App\Models\BankOfResumes;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BankOfResumesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('role_or_permission:root|mostrar_banco_hdv', ['only' => ['index','consultar']]);
        $this->middleware('role_or_permission:root|crear_hdv', ['only' => ['store']]);
        $this->middleware('role_or_permission:root|actualizar_hdv', ['only' => ['update']]);
	}
    
    public function index()
    {
        if (Auth::user()->hasRole('root')) {
            $empresas =  Empresa::all()->pluck('nombre', 'id');
        } else {
            $empresas_user = EmpresaUser::where('user_id', Auth::user()->id)->pluck('empresa_id');
            $empresas =  Empresa::whereIn('id', $empresas_user)->pluck('nombre', 'id');
        }
        $localidades =  ['Seleccione...' => ''];
        $barrios =  ['Seleccione...' => ''];
        $ciudades = Ciudad::select(DB::raw("CONCAT(nombre,' - ',departamento) as display_name"), "id")->pluck('display_name', 'id');
        return view('bankofresumes.index', compact('empresas', 'ciudades', 'localidades', 'barrios'));
    }

    public function store(Request $request)
    {
        //Validador Duplicidad
        $unique_key = BankOfResumes::where('identification', $request->identification)
        ->orWhere('email', $request->email)->count();
        if ($unique_key >= 1) {
            return response()->json(['status' => 0]);
        }
        DB::beginTransaction();
        try {
            ini_set('post_max_size', 100);
            $file = $request->file('archivo');
            $nombre = null;
            if (!empty($file)) {
                $fecha = date('d_m_Y_H.i.s');
                $path = public_path('Adjuntos/BancoHdv');
                if (!file_exists($path))
                    mkdir($path, 0777, true);
                $extension = $file->getClientOriginalExtension();
                $nombre = $fecha . '_' . $request->identification . '.' . $extension;
                $file->move($path, $nombre);
            }
            $request['user_id'] = Auth::user()->id;
            $request['file'] = $nombre;
            // Crear registro con lo que viene del request exceptuando campos
            BankOfResumes::create($request->except(['_token', 'crypt_id', 'archivo']));
            DB::commit();
            return response()->json(['status' => 1, 'msg' => 'creado']);
        } catch (\Throwable $th) {
            DB::rollback();
            return $th->getMessage();
        }
    }

    public function update(Request $request, $id)
    {
        //Validador Duplicidad
        $unique_key = BankOfResumes::where('name', $request->name)
            ->where('id', '<>', $id)
            ->orWhere('email', $request->email)
            ->where('id', '<>', $id)
            ->orWhere('identification', $request->identification)
            ->where('id', '<>', $id)
            ->count();
        if ($unique_key >= 1) {
            return response()->json(['status' => 0]);
        }
        DB::beginTransaction();
        try {
            $hdv = BankOfResumes::find($id);
            $nombre = null;
            ini_set('post_max_size', 100);
            $file = $request->file('archivo');
            if (!empty($file)) {
                $fecha = date('d_m_Y_H.i.s');
                $path = public_path('Adjuntos/BancoHdv');
                if (!file_exists($path))
                    mkdir($path, 0777, true);
                $extension = $file->getClientOriginalExtension();
                $nombre = $fecha . '_' . $request->identification . '.' . $extension;
                $file->move($path, $nombre);
            }
            if (!empty($hdv->file))
                $nombre = $hdv->file;

            $request['user_id'] = Auth::user()->id;
            $request['file'] = $nombre;

            // actualizar el cliente tal como viene en el request excepto archivo
            $hdv->fill($request->except('archivo'))->save();
            DB::commit();
            return response()->json(['status' => 1, 'msg' => 'actualizado']);
        } catch (\Throwable $th) {
            DB::rollback();
            return $th->getMessage();
        }
    }

    public function consultar(Request $request){
        $hdv = BankOfResumes::where('company_id', $request->company_id_filter);
        $edad = explode(";", $request->age_range);
        $fecha_actual = date("d-m-Y");
        $fechaIni = date("Y-m-d", strtotime($fecha_actual . "- " . $edad[1] . " year"));
        $fechaFin = date("Y-m-d", strtotime($fecha_actual . "- " . $edad[0] . " year"));
        $hdv = $hdv->whereBetween('date_of_birth', [$fechaIni, $fechaFin]);

        if (!empty($request->state_filter))
            $hdv = $hdv->where('state', $request->state_filter);

        if (!empty($request->identification_filter))
            $hdv = $hdv->where('identification', $request->identification_filter);

        if (!empty($request->name_filter))
            $hdv = $hdv->where('name', $request->name_filter);

        if (!empty($request->email_filter))
            $hdv = $hdv->where('email', $request->email_filter);

        if (!empty($request->gender_filter))
            $hdv = $hdv->where('gender', $request->gender_filter);

        if (!empty($request->telephone_filter))
            $hdv = $hdv->where('telephone', $request->telephone_filter);

        if (!empty($request->address_filter))
            $hdv = $hdv->where('address', $request->address_filter);

        if (!empty($request->city_id_filter))
            $hdv = $hdv->where('city_id', $request->city_id_filter);

        if (!empty($request->locality_id_filter))
            $hdv = $hdv->where('locality_id', $request->locality_id_filter);

        if (!empty($request->neighborhood_id_filter))
            $hdv = $hdv->where('neighborhood_id', $request->neighborhood_id_filter);

        $hdv = $hdv->get();

        if ($hdv->count() > 0) {
            $collect = collect();
            foreach ($hdv as $h) {
                $arr = [
                    'permisoEditar' => Auth::user()->hasrole('root') || Auth::user()->can('actualizar_hdv'),
                    'id' => $h->id,
                    'identification' => $h->identification,
                    'name' => $h->name,
                    'company_id' => $h->company_id,
                    'company' => Empresa::find($h->company_id)->nombre,
                    'email' => $h->email,
                    'telephone' => $h->telephone,
                    'date_of_birth' => $h->date_of_birth,
                    'age' => intval(floor((time() - strtotime($h->date_of_birth)) / 31556926)),
                    'gender' => $h->gender,
                    'genderExtend' => $h->gender == 'F' ? 'Femenino' : ($h->gender == 'M' ? 'Masculino' : 'Otro'),
                    'address' => $h->address,
                    'city_id' => $h->city_id,
                    'city' => Ciudad::find($h->city_id)->nombre,
                    'locality_id' => $h->locality_id,
                    'locality' => Locality::find($h->locality_id)->name,
                    'neighborhood_id' => $h->neighborhood_id,
                    'neighborhood' => Neighborhood::find($h->neighborhood_id)->name,
                    'state' => $h->state,
                    'stateExtend' => $h->state == 0 ? 'Disponible' : 'Actualmente Contratado',
                    'file' => $h->file,
                ];
                $collect->push($arr);
            }
            return response()->json(['status' => 1, 'data' => $collect]);
        } else {
            return response()->json(['status' => 0]);
        }
    }
}
