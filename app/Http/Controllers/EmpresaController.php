<?php

namespace App\Http\Controllers;


use App\Models\Ciudad;
use App\Models\Empresa;
use App\Models\EmpresaUser;
use Illuminate\Http\Request;
use App\Models\EmpresaServicio;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\HelpersClass;

class EmpresaController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('role_or_permission:root|mostrar_empresas|actualizar_empresa', ['only' => ['index','edit','update']]);
    $this->middleware('role_or_permission:root|crear_empresa', ['only' => ['create','store']]);
  }

  public function index()
  {
    $ciudades = Ciudad::select(DB::raw("CONCAT(nombre,' - ',departamento) as display_name"), "id")->orderBy('display_name')->pluck('display_name', 'id');
    return view('empresas.index', compact('ciudades'));
  }

  public function empresasIndex(Request $request)
  {
    ini_set('max_execution_time', 0);
    ini_set('memory_limit', '-1');
    $columns = array(
      0 => 'nombre',
      1 => 'nit',
      2 => 'direccion',
      3 => 'telefono',
      4 => 'celular',
      5 => 'ciudad',
      6 => 'observaciones',
      7 => 'action'
    );
    if (Auth::user()->hasRole('root')) {
      $consulta = DB::table('empresas')
        ->join('ciudades', 'ciudades.id', '=', 'empresas.ciudad_id')
        ->select('empresas.id AS id', 'empresas.nombre AS nombre', 'empresas.nit AS nit', 'empresas.direccion AS direccion', 'empresas.telefono AS telefono', 'empresas.celular AS celular', 'empresas.ciudad_id AS ciudad_id', DB::raw("CONCAT(ciudades.nombre,' - ',ciudades.departamento) AS ciudad"), 'empresas.observaciones', 'empresas.logo AS logo', 'empresas.estado AS estado');
    } else {
      $empresas_user = EmpresaUser::where('user_id', Auth::user()->id)->pluck('empresa_id');
      $consulta = DB::table('empresas')
        ->join('ciudades', 'ciudades.id', '=', 'empresas.ciudad_id')
        ->select('empresas.id AS id', 'empresas.nombre AS nombre', 'empresas.nit AS nit', 'empresas.direccion AS direccion', 'empresas.telefono AS telefono', 'empresas.celular AS celular', 'empresas.ciudad_id AS ciudad_id', DB::raw("CONCAT(ciudades.nombre,' - ',ciudades.departamento) AS ciudad"), 'empresas.observaciones', 'empresas.logo AS logo', 'empresas.estado AS estado')
        ->whereIn('empresas.id', $empresas_user);
    }
    // Valores para datatable
    $totalData = $consulta->count();
    $limit = $request->input('length');
    $start = $request->input('start');
    $order = $columns[$request->input('order.0.column')];
    $dir = $request->input('order.0.dir');

    if (empty($request->input('search.value'))) {
      $posts = $consulta->offset($start)->limit($limit)->orderBy($order, $dir)->get();
      $totalFiltered = $totalData;
    } else {
      $search = $request->input('search.value');
      if (Auth::user()->hasRole('root')) {
        $clausulas = $consulta
          ->where('empresas.nombre', 'like', "%{$search}%");
        $clausulas = $consulta
          ->orWhere('empresas.nit', 'like', "%{$search}%");
        $clausulas = $consulta
          ->orWhere('empresas.direccion', 'like', "%{$search}%");
        $clausulas = $consulta
          ->orWhere('empresas.telefono', 'like', "%{$search}%");
        $clausulas = $consulta
          ->orWhere('empresas.celular', 'like', "%{$search}%");
        $clausulas = $consulta
          ->orWhere(DB::raw("CONCAT(ciudades.nombre,' - ',ciudades.departamento)"), 'like', "%{$search}%");
        $clausulas = $consulta
          ->orWhere('empresas.observaciones', 'like', "%{$search}%");
      } else {
        $clausulas = $consulta
          ->where('empresas.nombre', 'like', "%{$search}%")
          ->whereIn('empresas.id', $empresas_user);
        $clausulas = $consulta
          ->orWhere('empresas.nit', 'like', "%{$search}%")
          ->whereIn('empresas.id', $empresas_user);
        $clausulas = $consulta
          ->orWhere('empresas.direccion', 'like', "%{$search}%")
          ->whereIn('empresas.id', $empresas_user);
        $clausulas = $consulta
          ->orWhere('empresas.telefono', 'like', "%{$search}%")
          ->whereIn('empresas.id', $empresas_user);
        $clausulas = $consulta
          ->orWhere('empresas.celular', 'like', "%{$search}%")
          ->whereIn('empresas.id', $empresas_user);
        $clausulas = $consulta
          ->orWhere(DB::raw("CONCAT(ciudades.nombre,' - ',ciudades.departamento)"), 'like', "%{$search}%")
          ->whereIn('empresas.id', $empresas_user);
        $clausulas = $consulta
          ->orWhere('empresas.observaciones', 'like', "%{$search}%")
          ->whereIn('empresas.id', $empresas_user);
      }
      $totalFiltered = $clausulas->count();
      $posts = $clausulas->offset($start)->limit($limit)->orderBy($order, $dir)->get();
    }
    $data = array();
    if ($posts) {
      foreach ($posts as $r) {
        $nestedData['id'] = Crypt::encryptString($r->id);
        $nestedData['nombre'] = $r->nombre;
        $nestedData['nit'] = $r->nit;
        $nestedData['direccion'] = $r->direccion;
        $nestedData['telefono'] = $r->telefono;
        $nestedData['celular'] = $r->celular;
        $nestedData['ciudad'] = $r->ciudad;
        $nestedData['observaciones'] = $r->observaciones;
        $nestedData['action'] = $r;
        $data[] = $nestedData;
      }
    }
    $json_data = array(
      "draw"            => intval($request->input('draw')),
      "recordsTotal"    => intval($totalData),
      "recordsFiltered" => intval($totalFiltered),
      "data"            => $data
    );
    return json_encode($json_data);
  }

  public function create()
  {
    $ciudades = Ciudad::select(DB::raw("CONCAT(nombre,' - ',departamento) as display_name"), "id")->orderBy('display_name')->pluck('display_name', 'id');
    return view('empresas.create', compact('ciudades'));
  }

  public function store(Request $request)
  {
    $infoTabla = json_decode($request->jsonTableServicios);

    //Validador Null. 
    if ($request->nombre_empresa == null || $request->nit_empresa == null || $request->telefono_empresa == null || $request->celular_empresa == null || $request->direccion_empresa == null || $request->ciudad_empresa == null || $request->sobre_nosotros == null || $request->mision == null || $request->vision == null || $request->video_institucional == null || $request->ubicacion_maps == null || $request->facebook == null || $request->instagram == null || $request->linkedin == null || $infoTabla == null) {
      return 0;
    }

    //Tratamiento de Variables.
    $nombre_empresa = trim($request->nombre_empresa);
    $nit_empresa =  intval($request->nit_empresa);
    $direccion_empresa =  ucwords(strtolower($request->direccion_empresa));
    $telefono_empresa =  intval($request->telefono_empresa);
    $celular_empresa = intval($request->celular_empresa);
    $sobre_nosotros =  str_replace(array("\r\n", "\n\r", "\r", "\n"), "<br />", $request->sobre_nosotros);
    $mision =  str_replace(array("\r\n", "\n\r", "\r", "\n"), "<br />", $request->mision);
    $vision =  str_replace(array("\r\n", "\n\r", "\r", "\n"), "<br />", $request->vision);
    $observaciones =  str_replace(array("\r\n", "\n\r", "\r", "\n"), "<br />", $request->observaciones);
    
    //Validador Duplicidad
    $unique_key = Empresa::where('nombre', $nombre_empresa)->orWhere('nit', $nit_empresa)->count();
    if ($unique_key >= 1) {
      return 1;
    }

    // Cargue a Base de datos
    DB::beginTransaction();
    try {

      ini_set('post_max_size', 100);

      // CARGUE LOGO
      // Directorio Destino
      $path = public_path('image/logos/empresas');
      // Archivo
      $file = $request->file('file');
      //Extension
      $extension = $request->file->getClientOriginalExtension();
      //Nuevo Nombre (Nombre de la Empresa)
      $nombre_empresa_file = HelpersClass::utf8_remplace(strtolower($nombre_empresa));
      //Si no esta vacio el input.
      if (!empty($file)) {
        $file->move($path, ($nombre_empresa_file . '.' . $extension));
      }

      // Creacion de Empresa
      $empresa = new Empresa;
      $empresa->nombre = $nombre_empresa;
      $empresa->nit = $nit_empresa;
      $empresa->direccion = $direccion_empresa;
      $empresa->telefono = $telefono_empresa;
      $empresa->email = $request->email_empresa;
      $empresa->celular = $celular_empresa;
      $empresa->ciudad_id = $request->ciudad_empresa;
      $empresa->user_id = Auth::user()->id;
      $empresa->observaciones = $request->observaciones_empresa;
      $empresa->sobre_nosotros = $request->sobre_nosotros;
      $empresa->mision = $request->mision;
      $empresa->vision = $request->vision;
      $empresa->video_institucional = $request->video_institucional;
      $empresa->ubicacion_maps = $request->ubicacion_maps;
      $empresa->facebook = $request->facebook;
      $empresa->instagram = $request->instagram;
      $empresa->linkedin = $request->linkedin;
      if (!empty($file)) {
        $empresa->logo = $nombre_empresa_file . '.' . $extension;
      }
      $empresa->save();
      foreach ($infoTabla as $servicio) {
        // almacenar los datos en la tabla
        $nombre = HelpersClass::utf8_remplace(strtolower(str_replace(' ','_',$servicio->nombre))).'_'.$empresa->id.".jpg";
        $serv = new EmpresaServicio;
        $serv->empresa_id = $empresa->id;
        $serv->nombre = $servicio->nombre;
        $serv->descripcion = $servicio->descripcion;
        $serv->imagen = $nombre;
        $serv->save();

        // convertir la imagen obtenida en base64 y almacenarla en JPG
        $image = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $servicio->imagen));
        $path = public_path('/image/servicios');
            // comprobar existencia de la carpeta. Si no existe, se crea con permisos.
            if (!file_exists($path)) 
                mkdir($path, 0777, true);
        $path = public_path().'/image/servicios/'.$nombre;
        file_put_contents($path,$image);
      }
      DB::commit();
      return 2;
    } catch (\Throwable $th) {
      DB::rollback();
      return response()->json($th->getMessage());
    }
  }

  public function edit($id)
  {
    $id = Crypt::decryptString($id);
    $ciudades = Ciudad::select(DB::raw("CONCAT(nombre,' - ',departamento) as display_name"), "id")->orderBy('display_name')->pluck('display_name', 'id');
    $empresa = Empresa::with('servicios')->find($id);
    return view('empresas.edit', compact('ciudades','empresa'));
  }
  
  public function update($id, Request $request){
    $id = Crypt::decryptString($id);
    $infoTabla = json_decode($request->jsonTableServicios);

    //Validador Null. 
    if ($request->nombre_empresa == null || $request->nit_empresa == null || $request->telefono_empresa == null || $request->celular_empresa == null || $request->direccion_empresa == null || $request->ciudad_empresa == null || $request->sobre_nosotros == null || $request->mision == null || $request->vision == null || $request->video_institucional == null || $request->ubicacion_maps == null || $request->facebook == null || $request->instagram == null || $request->linkedin == null || $infoTabla == null) {
      return 0;
    }

    //Tratamiento de Variables.
    $nombre_empresa = trim($request->nombre_empresa);
    $nit_empresa =  intval($request->nit_empresa);
    $direccion_empresa =  ucwords(strtolower($request->direccion_empresa));
    $telefono_empresa =  intval($request->telefono_empresa);
    $celular_empresa = intval($request->celular_empresa);
    $sobre_nosotros =  str_replace(array("\r\n", "\n\r", "\r", "\n"), "<br />", $request->sobre_nosotros);
    $mision =  str_replace(array("\r\n", "\n\r", "\r", "\n"), "<br />", $request->mision);
    $vision =  str_replace(array("\r\n", "\n\r", "\r", "\n"), "<br />", $request->vision);
    $observaciones =  str_replace(array("\r\n", "\n\r", "\r", "\n"), "<br />", $request->observaciones);

    //Validador Duplicidad
    $unique_key = Empresa::where('nombre', $nombre_empresa)
    ->where('id', '<>', $id)
    ->orWhere('nit', $nit_empresa)
    ->where('id', '<>', $id)
    ->count();
    if ($unique_key >= 1) {
      return 1;
    }

    // Actualizacion Base de Datos
    try {
      DB::beginTransaction();
      $empresa = Empresa::find($id);
      $file = $request->file('logoEmpresa1');

      if (!empty($file)) {
        ini_set('post_max_size', 100);
        $path = public_path('image' . DIRECTORY_SEPARATOR . 'logos' . DIRECTORY_SEPARATOR . 'empresas');
        $filePath = $path . DIRECTORY_SEPARATOR . $empresa->logo;
        // Verifica si el archivo existe antes de eliminarlo
        if (file_exists($filePath)) {
            unlink($filePath);
        }
        $extension = $file->getClientOriginalExtension();
        $nombre_empresa_file = HelpersClass::utf8_remplace(strtolower($nombre_empresa));
        $file->move($path, $nombre_empresa_file . '.' . $extension);
    }

      $empresa->nombre = $nombre_empresa;
      $empresa->nit = $nit_empresa;
      $empresa->direccion = $direccion_empresa;
      $empresa->telefono = $telefono_empresa;
      $empresa->celular = $celular_empresa;
      $empresa->email = $request->email_empresa;
      $empresa->ciudad_id = $request->ciudad_empresa;
      $empresa->user_id = Auth::user()->id;
      $empresa->observaciones = $request->observaciones_empresa;
      $empresa->sobre_nosotros = $request->sobre_nosotros;
      $empresa->mision = $request->mision;
      $empresa->vision = $request->vision;
      $empresa->video_institucional = $request->video_institucional;
      $empresa->ubicacion_maps = $request->ubicacion_maps;
      $empresa->facebook = $request->facebook;
      $empresa->instagram = $request->instagram;
      $empresa->linkedin = $request->linkedin;
      if (!empty($file)) {
        $empresa->logo = $nombre_empresa_file . '.' . $extension;
      }
      $empresa->save();

      //busca cuales de los que estaban guardados ya no vienen en la tabla, y lo elimina en BD
      $serv_bd = EmpresaServicio::where('empresa_id', $id)->get()->pluck('nombre')->toArray();
      $serv_app = [];

      // Construir lista de servicios de la tabla HTML
      foreach ($infoTabla as $servicio) {
          $serv_app[] = $servicio->nombre;
      }

      // Determinar servicios a eliminar
      $serv_eliminar = array_diff($serv_bd, $serv_app);

      // Eliminar servicios de la base de datos que no están en la tabla
      if (!empty($serv_eliminar)) {
          $srvcs = EmpresaServicio::where('empresa_id', $id)->whereIn('nombre', $serv_eliminar)->delete();

          if ($srvcs) {
              // Eliminar imágenes relacionadas de los servicios eliminados
              foreach ($serv_eliminar as $elim) {
                  $filePath = public_path('/image/servicios/') . str_replace(' ', '_', $elim) . '_' . $id . '.jpg';
                  if (file_exists($filePath)) {
                      unlink($filePath);
                  }
              }
          }
      }

      // Guardar nuevos servicios o actualizar los existentes
      foreach ($infoTabla as $servicio) {
          $nombreImagen = HelpersClass::utf8_remplace(strtolower(str_replace(' ', '_', $servicio->nombre))) . '_' . $id . ".jpg";

          // Verificar si el servicio ya existe en la base de datos
          $existingService = EmpresaServicio::where('empresa_id', $empresa->id)
              ->where('nombre', $servicio->nombre)
              ->first();

          if (!$existingService) {
              // Crear nuevo servicio
              $newService = new EmpresaServicio();
              $newService->empresa_id = $empresa->id;
              $newService->nombre = $servicio->nombre;
              $newService->descripcion = $servicio->descripcion;
              $newService->imagen = $nombreImagen;
              $newService->save();

              // Guardar la imagen en el servidor
              if (strpos($servicio->imagen, 'data:image') === 0) {
                  $image = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $servicio->imagen));
                  $filePath = public_path('/image/servicios/') . $nombreImagen;
                  file_put_contents($filePath, $image);
              }
          }
      }

      DB::commit();
      return 2;
    } catch (\Throwable $th) {
      DB::rollback();
      return response()->json($th->getMessage());
    }
  }
}
