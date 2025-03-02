<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\User;
use App\Models\Ciudad;
use App\Models\Employe;
use App\Models\Empresa;
use App\Models\UserSon;
use App\Models\Customer;
use App\Models\RoleUser;
use App\Models\AreaUsers;
use App\Models\EmpresaUser;
use App\Models\UserCustomer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\HelpersClass;
use App\Http\Controllers\AppBaseController;
use App\Http\Controllers\EmployeController;

class UserController extends AppBaseController
{

  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('role_or_permission:root|mostrar_usuarios|crear_usuario|actualizar_usuario|bloquear_usuario', ['only' => ['index', 'store', 'update', 'destroy']]);
  }

  #------------------------------------------------------------------------------------

  public function index()
  {
    if (Auth::user()->hasRole('root')) {
      $empresas =  Empresa::all()->pluck('nombre', 'id')->toArray();
      $areas = Area::orderBy('nombre')->pluck('nombre', 'id')->toArray();
      $roles = Role::orderBy('display_name')->pluck('display_name', 'id');
      $clientes = Customer::with(['rel_empresa:id,nombre'])
        ->orderBy('name')
        ->select('id', 'name', 'company_id')->get();
    } else {
      $empresas_user = EmpresaUser::where('user_id', Auth::user()->id)->pluck('empresa_id');
      $empresas =  Empresa::whereIn('id', $empresas_user)->pluck('nombre', 'id')->toArray();
      $areas = Area::whereIn('empresa_id', $empresas_user)->pluck('nombre', 'id')->toArray();
      $roles = RoleUser::with('nombreRol:id,display_name')->whereIn('empresa_id', $empresas_user)->where('model_id', Auth::user()->id)->get()->pluck('nombreRol.display_name');
      $clientes = Customer::with(['rel_empresa:id,nombre'])
        ->orderBy('name')
        ->select('id', 'name', 'company_id')
        ->whereIn('company_id', $empresas_user)
        ->get();
    }

    return view('users.index', [
      'roles' => $roles,
      'empresas' => $empresas,
      'areas' => $areas,
      'clientes' => $clientes
    ]);
  }

  #------------------------------------------------------------------------------------

  public function usersIndex(Request $request)
  {

    // Recursos del sistema
    ini_set('max_execution_time', 0);
    ini_set('memory_limit', '-1');

    // Columnas a mostrar
    $columns = array(
      0 => 'name',
      1 => 'username',
      2 => 'email',
      3 => 'cargo',
      4 => 'estado',
      5 => 'action'
    );

    // Consulta dependiendo permisos.
    if (Auth::user()->hasRole('root')) {
      $consulta = User::with(['empresa.nombreEmpresa']);
      $consulta = User::with(['roles_id.nombreRol', 'empresa.nombreEmpresa', 'areas.nombreAreas']);
    } else {
      $empresas_user = EmpresaUser::where('user_id', Auth::user()->id)->pluck('empresa_id');
      $users_empresas = EmpresaUser::whereIn('empresa_id', $empresas_user)->pluck('user_id');
      $consulta = User::with(['roles_id.nombreRol', 'empresa.nombreEmpresa', 'areas.nombreAreas'])->whereIn('id', $users_empresas)->where('id', '!=', 1);
    }
    // Datos Server Side
    $totalData = $consulta->count();
    $limit = $request->input('length');
    $start = $request->input('start');
    $order = $columns[$request->input('order.0.column')];
    $dir = $request->input('order.0.dir');

    // Validaciones con o sin Busqueda
    if (empty($request->input('search.value'))) {
      // Consulta sin Busqueda
      $posts = $consulta->offset($start)->limit($limit)->orderBy($order, $dir)->get();
      $totalFiltered = $totalData;
    } else {
      // Consulta con busqueda
      $search = $request->input('search.value');
      // Condicionales segun nivel de acceso
      if (Auth::user()->hasRole('root')) {

        $clausulas = $consulta
          ->where('name', 'like', "%{$search}%");

        $clausulas = $consulta
          ->orWhere('username', 'like', "%{$search}%");

        $clausulas = $consulta
          ->orWhere('email', 'like', "%{$search}%");

        $clausulas = $consulta
          ->orWhere('cargo', 'like', "%{$search}%");

        $inp_search = strtolower($search);
        $busqueda = '';
        if (stristr('Activo', $inp_search)) {
          $busqueda = '%1%';
        } else if (stristr('Inactivo', $inp_search)) {
          $busqueda = '%0%';
        }
        $clausulas = $consulta
          ->orWhere('estado', 'like', $busqueda);
      } else {
        $clausulas = $consulta
          ->where('name', 'like', "%{$search}%")
          ->whereIn('id', $users_empresas)
          ->where('id', '!=', 1);

        $clausulas = $consulta
          ->orWhere('username', 'like', "%{$search}%")
          ->whereIn('id', $users_empresas)
          ->where('id', '!=', 1);

        $clausulas = $consulta
          ->orWhere('email', 'like', "%{$search}%")
          ->whereIn('id', $users_empresas)
          ->where('id', '!=', 1);

        $clausulas = $consulta
          ->orWhere('cargo', 'like', "%{$search}%")
          ->whereIn('id', $users_empresas)
          ->where('id', '!=', 1);

        $inp_search = strtolower($search);
        $busqueda = '';
        if (stristr('Activo', $inp_search)) {
          $busqueda = '%1%';
        } else if (stristr('Inactivo', $inp_search)) {
          $busqueda = '%0%';
        }
        $clausulas = $consulta
          ->orWhere('estado', 'like', $busqueda)
          ->whereIn('id', $users_empresas)
          ->where('id', '!=', 1);
      }

      $totalFiltered = $clausulas->count();
      $posts = $clausulas->offset($start)->limit($limit)->orderBy($order, $dir)->get();
    }

    $data = array();
    if ($posts) {
      foreach ($posts as $r) {
        $rolesArray = [];
        $nestedData['id'] = $r->id;
        $nestedData['name'] = $r->name;
        $nestedData['username'] = $r->username;
        $nestedData['email'] = $r->email;
        $nestedData['cargo'] = $r->cargo;
        if ($r->estado == 1) {
          $nestedData['estado'] = '<div class="badge bg-success rounded-pill text-light p-2"><span>Activo</span></div>';
        } else {
          $nestedData['estado'] = '<div class="badge bg-danger rounded-pill text-light p-2"><span>Inactivo</span></div>';
        }
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

  #------------------------------------------------------------------------------------

  public function rolandarea($string)
  {

    //Tratamiento de String a Array.
    $array = explode(",", $string);

    //Roles.
    $roles = [];
    $roles = Role::select('id', 'display_name')->orderBy('name', 'ASC')->where('id', '<>', 1)->get();

    $rolesData = [];
    foreach ($roles as $role) {
      array_push($rolesData, $role);
    }

    //Areas.
    $empresasArea = Area::with('empresas')->select('empresa_id')->whereIn('empresa_id', $array)->distinct()->get();
    $areasData = [];
    if ($empresasArea) {
      foreach ($empresasArea as $a) {
        $nestedData['id'] = '';
        $nestedData['text'] =  $a->empresas->nombre;

        $areas = Area::with('empresas')->orderBy('nombre', 'ASC')->where('empresa_id', $a->empresa_id)->get();

        $childrenAreas = [];
        foreach ($areas as $r) {
          $childrenDataAreas['id'] = $r->id;
          $childrenDataAreas['text'] = $r->nombre;
          $childrenAreas[] = $childrenDataAreas;
        };

        $nestedData['children'] = $childrenAreas;

        $areasData[] = $nestedData;
      }
    }

    // Dimensiones Arreglos.
    $arreglo[0] = $rolesData;
    $arreglo[1] = $areasData;
    // Retorno a Ajax del Arreglo.
    return json_encode($arreglo);
  }

  #------------------------------------------------------------------------------------

  public function rolandareaedit($string, $id)
  {

    //Tratamiento de String a Array de las empresas asociadas al usuario a editar.
    $empresas_user_a_editar = explode(",", $string);

    // Logica para mostrar lista desplegable de solo las empresas que tenga el usuario en sesion comparado con las empresas asigandas al usuario en edición
    if (Auth::user()->hasRole('root')) {
      $empresas_autorizadas =  Empresa::all()->pluck('id')->toArray();
      $empresas_usuario = $empresas_user_a_editar;
      $empresas_accedidas = array_intersect($empresas_autorizadas, $empresas_usuario);
    } else {
      $empresas_autorizadas = EmpresaUser::where('user_id', Auth::user()->id)->pluck('id_empresa')->toArray();
      $empresas_usuario = $empresas_user_a_editar;
      $empresas_accedidas = array_intersect($empresas_autorizadas, $empresas_usuario);
    }

    //Roles.
    $empresasRole = Role::with('empresas')->select('empresa_id')->whereIn('empresa_id', $empresas_accedidas)->distinct()->get();
    $empresasRole = [];

    $rolesData = [];
    if ($empresasRole) {
      foreach ($empresasRole as $e) {
        $nestedData['id'] = '';
        $nestedData['text'] =  $e->empresas->nombre;

        $rolesTotales = [];
        $rolesTotales = Role::with('empresas')->where('empresa_id', $e->empresa_id)->get();
        $rolesAsignados = [];
        $rolesAsignados = RoleUser::where('user_id', $id)->pluck('role_id')->toArray();

        $childrenRoles = [];
        foreach ($rolesTotales as $r) {
          $childrenDataRoles['id'] = $r->id;
          $childrenDataRoles['text'] = $r->display_name;
          $childrenDataRoles['selected'] = array_intersect(array($r->id), $rolesAsignados) ? true : false;
          $childrenRoles[] = $childrenDataRoles;
        };

        $nestedData['children'] = $childrenRoles;
        $rolesData[] = $nestedData;
      }
    }

    //Areas.
    $empresasArea = [];
    $empresasArea = Area::with('empresas')->select('empresa_id')->whereIn('empresa_id', $empresas_accedidas)->distinct()->get();
    $areasData = [];
    if ($empresasArea) {
      foreach ($empresasArea as $a) {
        $nestedData['id'] = '';
        $nestedData['text'] =  $a->empresas->nombre;

        $areasTotales = [];
        $areasTotales = Area::with('empresas')->where('empresa_id', $a->empresa_id)->get();
        $areasAsignadas = [];
        $areasAsignadas = AreaUsers::where('user_id', $id)->pluck('id_area')->toArray();

        $childrenAreas = [];
        foreach ($areasTotales as $r) {
          $childrenDataAreas['id'] = $r->id;
          $childrenDataAreas['text'] = $r->nombre;
          $childrenDataAreas['selected'] = array_intersect(array($r->id), $areasAsignadas) ? true : false;
          $childrenAreas[] = $childrenDataAreas;
        };

        $nestedData['children'] = $childrenAreas;

        $areasData[] = $nestedData;
      }
    }

    // Dimensiones Arreglos.
    $arreglo[0] = $rolesData;
    $arreglo[1] = $areasData;

    // Retorno a Ajax del Arreglo.
    return json_encode($arreglo);
  }

  #------------------------------------------------------------------------------------

  static function store(Request $request)
  {

    // Procesamiento de servidor
    ini_set('post_max_size', 100);

    //Validador Null. 
    if ($request->name == null || $request->username == null || $request->email == null || $request->empresaTbl == null || $request->rolesTbl == null || $request->cargo == null) {
      return 0;
    }

    //Tratamiento de Variables.
    #--> Nombre
    $name = trim(ucwords(strtolower($request->name)));
    #--> Username
    $username = trim(strtolower(HelpersClass::utf8_remplace($request->username)));
    #--> Correo Electronico
    $email = trim($request->email);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $email = strtolower($email);
    #---> Cargo
    $cargo = trim(ucwords(strtolower($request->cargo)));

    //Validador Duplicidad
    $unique_key = User::where('username', $username)->orWhere('email', $email)->count();
    if ($unique_key >= 1) {
      return 1;
    }

    #------------------------------------------------------------------------------------
    # CARGUE DE IMAGEN DE FIRMA
    #------------------------------------------------------------------------------------

    // Carpeta destino de la Imagen con la firma del usuario
    $path = public_path('image/users/firmas');
    // comprobar existencia de la carpeta. Si no existe, se crea con permisos.
    if (!file_exists($path))
      mkdir($path, 0777, true);
    // Archivo
    $file = $request->file('file');
    // Extension del archivo
    if (!empty($file)) {
      $originalName = $file->getClientOriginalName();
      $extension = $file->getClientOriginalExtension();
      // Nombre para el documento
      $name_image = strtolower(HelpersClass::utf8_remplace($request->name));
      // Cargue de Firma
      $cargarArchivo = $file->move($path, ($name_image . '.' . $extension));
    }


    #------------------------------------------------------------------------------------
    # CARGUE DE USUARIO
    #------------------------------------------------------------------------------------

    DB::beginTransaction();
    try {
      $user = new User;
      $user->name = $name;
      $user->username = $username;
      $user->email = $email;
      $user->password = bcrypt($username);
      $user->cargo = $cargo;
      $user->identification = $username;
      if ($request->checkCliente == 'on')
        $user->customer_id = $request->customer_id;
      $user->user_id = Auth::user()->id;
      if (!empty($file)) {
        $user->signature = $name_image . '.' . $extension;
      }

      if ($user->save()) {
        foreach ($request->rolesTbl as $key => $rol) {
          $rolId = array_filter(explode(",", $rol));
          $empresa = $request->empresaTbl[$key];
          foreach ($rolId as $value) {
            $rolUs = new RoleUser();
            $rolUs->role_id = $value;
            $rolUs->model_type = 'App\Models\User';
            $rolUs->model_id = $user->id;
            $rolUs->empresa_id = $empresa;
            $rolUs->save();
          }
        }
        foreach (array_unique($request->areaTbl) as $area) {
          $areaUs = new AreaUsers();
          $areaUs->user_id = $user->id;
          $areaUs->area_id = $area;
          $areaUs->save();
        }
        foreach (array_unique($request->empresaTbl) as $key => $empresa) {
          $empresaUs = new EmpresaUser();
          $empresaUs->user_id = $user->id;
          $empresaUs->empresa_id = $empresa;
          $empresaUs->save();
        }

        if ($request->checkCliente == 'on')
          UserCustomer::insert(['user_id' => $user->id, 'customer_id' => $request->customer_id, 'created_at' => date('Y-m-d G:i:s')]);
      }
      if (!empty($request->employe_id))
        Employe::where('id', $request->employe_id)->update(['user_rel_id' => $user->id]);

      DB::commit();
      return 2;
    } catch (\Throwable $th) {
      DB::rollback();
      return response()->json($th->getMessage());
    }
  }

  #------------------------------------------------------------------------------------

  public static function update($id, Request $request)
  {

    // Procesamiento de servidor
    ini_set('post_max_size', 100);

    //Validador Null. 
    if ($request->name_act == null || $request->username_act == null || $request->email_act == null || $request->empresaTbl_edit == null || $request->cargo_act == null) {
      return 0;
    }

    //Tratamiento de Variables.
    #--> Nombre
    $name_act = trim(ucwords(strtolower($request->name_act)));
    #--> Username
    $username_act = trim(strtolower(HelpersClass::utf8_remplace($request->username_act)));
    #--> Correo Electronico
    $email_act = trim($request->email_act);
    $email_act = filter_var($email_act, FILTER_SANITIZE_EMAIL);
    $email_act = strtolower($email_act);
    #---> Cargo
    $cargo_act = trim(ucwords(strtolower($request->cargo_act)));

    //Validador Duplicidad
    $unique_key = User::where('username', $username_act)->where('id', '<>', $id);
    $unique_key = $unique_key->orWhere('email', $email_act)->where('id', '<>', $id);
    $unique_key = $unique_key->count();
    if ($unique_key >= 1) {
      return 1;
    }

    DB::beginTransaction();
    try {

      $user = User::find($id);

      if ($user->customer_id != $request->customer_id_edit && $request->customer_id_edit != null)
        UserCustomer::insert(['user_id' => $user->id, 'customer_id' => $request->customer_id_edit, 'created_at' => date('Y-m-d G:i:s')]);


      #------------------------------------------------------------------------------------
      # CARGUE DE IMAGEN DE FIRMA
      #------------------------------------------------------------------------------------

      // Carpeta destino de la Imagen con la firma del usuario
      $path = public_path('image/users/firmas');
      // Archivo
      $file = $request->file('file');
      if (!empty($file)) {
        // Eliminar Archivo Actual de la Carpeta.
        @unlink(public_path('image/users/firmas/' . $user->signature));
        // Extension del archivo
        $extension = $file->getClientOriginalExtension();
        // Nombre para el documento
        $name_image = strtolower(HelpersClass::utf8_remplace($request->name_act));
        // Cargue de Firma
        $cargarArchivo = $file->move($path, ($name_image . '.' . $extension));
      }

      #------------------------------------------------------------------------------------
      # CARGUE DE USUARIO
      #------------------------------------------------------------------------------------

      $user->name = $name_act;
      $user->username = $username_act;
      $user->email = $email_act;
      $user->cargo = $cargo_act;
      $user->identification = $username_act;
      $user->customer_id = $request->customer_id_edit;
      $user->user_id = Auth::user()->id;
      if (!empty($file)) {
        $user->signature = $name_image . '.' . $extension;
      }


      if ($user->save()) {

        // al editar desde la creacion del trabajador
        if (!empty($request->employe_id)) {
          // si la empresa que viene por request no esta asocida al usuario a editar, se agrea a la tabla empresa_users
          $empUsr = EmpresaUser::where('user_id', $id)->where('empresa_id', $request->empresaTbl_edit[0])->first();
          if (empty($empUsr))
            EmpresaUser::insert(['user_id' => $id, 'empresa_id' => $request->empresaTbl_edit[0]]);

          // si el area que viene por request no esta asocida al usuario a editar, se agrea a la tabla areas_users
          $areaUsr = AreaUsers::where('user_id', $id)->where('area_id', $request->areaTbl_edit[0])->first();
          if (empty($areaUsr))
            AreaUsers::insert(['user_id' => $id, 'area_id' => $request->areaTbl_edit[0]]);

          // si el rol que viene por request no esta asocido al usuario a editar, se agrea a la tabla model_has_roles
          $rolUsr = RoleUser::where('model_id', $id)->where('role_id', $request->rolesTbl_edit[0])->where('empresa_id', $request->empresaTbl_edit[0])->first();
          if (empty($rolUsr))
            RoleUser::insert(['model_id' => $id, 'role_id' => $request->rolesTbl_edit[0], 'empresa_id' => $request->empresaTbl_edit[0], 'model_type' => 'App\Models\User']);
        } else {
          //al editar desde administracion->usuarios

          //* Eliminar roles Actuales de acuerdo al nivel de acceso del usuario conectado
          if (Auth::user()->hasRole('root')) {

            // * El usuario Root Elimina el 100% de los roles asociados al usuario en edición.
            RoleUser::where('model_id', $id)->delete();
            //* El usuario Root Elimina el 100% de las areas asociadas al usuario en edición.
            AreaUsers::where('user_id', $id)->delete();
            //* El usuario Root Elimina el 100% de las empresas asociadas al usuario en edición.
            EmpresaUser::where('user_id', $id)->delete();

            // * Cargue de los nuevos roles
            foreach ($request->rolesTbl_edit as $key => $rol) {
              $roles = array_filter(explode(',', $rol));
              foreach ($roles as $value) {
                $rolUs = new RoleUser();
                $rolUs->role_id = $value;
                $rolUs->model_type = 'App\Models\User';
                $rolUs->model_id = $user->id;
                $rolUs->empresa_id = $request->empresaTbl_edit[$key];
                $rolUs->save();
              }
            }

            //* trata array para valores unicos
            $empresas = array_unique($request->empresaTbl_edit);
            //* Cargue de las nuevas empresas
            foreach ($empresas as $empresa) {
              $empresaUs = new EmpresaUser;
              $empresaUs->user_id = $id;
              $empresaUs->empresa_id = $empresa;
              $empresaUs->save();
            }

            //* trata array para valores unicos
            $area = array_unique($request->areaTbl_edit);
            //   //* Cargue de las nuevas areas
            foreach ($area as $area) {
              $areaUs = new AreaUsers;
              $areaUs->user_id = $id;
              $areaUs->area_id = $area;
              $areaUs->save();
            }
          } else {
            // Un usuario diferente al actualizar, en la base de datos se eliminan los roles asociados a sus empresas pero se conservan los roles de las empresas diferentes.
            $empresas_user = EmpresaUser::where('user_id', Auth::user()->id)->pluck('empresa_id');

            //* Elimino roles activos 
            RoleUser::where('model_id', $id)->delete();
            //* Elimino areas activas consultando la empresa en relacion a la tabla areas
            AreaUsers::where('user_id', $id)->delete();
            //* Elimino empresas activas
            EmpresaUser::where('user_id', $id)->delete();
            // Cargue de los nuevs roles
            foreach ($empresas_user as $empUs) {
              foreach ($request->rolesTbl_edit as $key => $value) {
                if (intval($request->empresaTbl_edit[$key]) == $empUs) {
                  $roles = array_filter(explode(',', $value));
                  foreach ($roles as $key => $valueRol) {
                    $userRol = new RoleUser;
                    $userRol->role_id = $valueRol;
                    $userRol->model_type = 'App\Models\User';
                    $userRol->model_id = $user->id;
                    $userRol->empresa_id = $empUs;
                    $userRol->save();
                  }
                }
              }
            }

            //* trata array para valores unicos
            $empresa = array_unique($request->empresaTbl_edit);

            //* Cargue de las nuevas empresas
            foreach ($empresa as $key => $empresa_id) {
              $empresaUs = new EmpresaUser;
              $empresaUs->user_id = $id;
              $empresaUs->empresa_id = $empresa_id;
              $empresaUs->save();
            }

            //* trata array para valores unicos
            $area = array_unique($request->areaTbl_edit);
            //* Cargue de las nuevas areas
            foreach ($area as $key => $area_id) {
              $areaUs = new AreaUsers;
              $areaUs->user_id = $id;
              $areaUs->area_id = $area_id;
              $areaUs->save();
            }
          }
        }
      }
      if (!empty($request->employe_id))
        Employe::where('id', $request->employe_id)->update(['user_rel_id' => $user->id]);

      DB::commit();
      return 2;
    } catch (\Throwable $th) {
      $success = false;
      $errors = $th->getMessage();
      DB::rollback();
      return response()->json($errors);
    }
  }

  #------------------------------------------------------------------------------------

  public function edit($id)
  {
    // Datos de usuario
    $user = User::where('id', Crypt::decryptString($id))->first();
    $guarda =  User::whereHas('roles', function ($q) {
        $q->where('name', 'guarda');
      })
      ->where('id', Auth::user()->id)
      ->first();
    $ciudades = Ciudad::select(DB::raw("CONCAT(nombre,' - ',departamento) as display_name"), "id")->pluck('display_name', 'id');
    return view('users.edit', compact('user', 'ciudades', 'guarda'));
  }

  #------------------------------------------------------------------------------------

  public function actualizar(Request $request)
  {
    // Recursos del servidor
    ini_set('post_max_size', 100);

    //Validador Null. 
    if ($request->name_act == null || $request->email_act == null || $request->cargo_act == null || $request->password == null) {
      return 0;
    }

    //Tratamiento de Variables.
    #--> Nombre
    $name_act = trim(ucwords(strtolower($request->name_act)));
    #--> Correo Electronico
    $email_act = trim($request->email_act);
    $email_act = filter_var($email_act, FILTER_SANITIZE_EMAIL);
    $email_act = strtolower($email_act);
    #---> Cargo
    $cargo_act = trim(ucwords(strtolower($request->cargo_act)));

    // Cargue de imagen
    // URL Destino Imagen Firma.
    $path = public_path('image/users/firmas');
    // Archivo Cargado
    $file = $request->file('file');
    // Se Ejecuta solo si se cargo un archivo
    if (!empty($file)) {
      // Eliminar la imagen de firma del usuario.
      @unlink(public_path('image/users/firmas/' . $request->firma));
      // Extraer el Formato de la Imagen
      $originalName = $file->getClientOriginalName();
      $extension = substr($originalName, -3);
      // Nombre del Archivo
      $nameImage = HelpersClass::utf8_remplace($name_act);
      // Mover la Imagen a su carpeta destino
      $cargarArchivo = $file->move($path, ($nameImage . '.' . $extension));
    }


    DB::beginTransaction();
    try {
      $user = User::find(Auth::user()->id);
      $user->name = $name_act;
      $user->email = $email_act;
      $user->cargo = $cargo_act;
      $user->password = bcrypt($request->password);
      if (!empty($file))
        $user->signature = $nameImage . '.' . $extension;
      $user->identification = $request->identification;
      $user->address = $request->address;
      $user->contact_name = $request->contact_name;
      $user->contact_phone = $request->contact_phone;
      $user->relationship = $request->relationship;
      $user->shirt = $request->shirt;
      $user->pant = $request->pant;
      $user->shoes = $request->shoes;
      $user->last_date_update = date('Y-m-d G:i:s');
      $user->save();

      $infoTabla = json_decode($request->jsontableSons);
      if (!empty($infoTabla)) {
        DB::table("users_sons")->where('user_id', Auth::user()->id)->delete();
        foreach ($infoTabla as $key => $hijo) {
          $nombCiudad = explode(' - ', $hijo->ciudad);
          $ciudad = Ciudad::where('nombre', $nombCiudad[0])->where('departamento', $nombCiudad[1])->first();
          UserSon::create([
            'son_name' => $hijo->nombre,
            'birthdate' => date("Y-m-d", strtotime($hijo->fecha)),
            'user_id' => Auth::user()->id,
            'gender' => $hijo->sexo,
            'city_id' => $ciudad->id
          ]);
        }
      }
      DB::commit();
      return 1;
    } catch (\Throwable $th) {
      $success = false;
      DB::rollback();
      return response()->json($th->getMessage());
    }
  }

  #------------------------------------------------------------------------------------

  public static function destroy(Request $request)
  {
    $id = $request->id;
    DB::beginTransaction();
    try {
      $user = User::with('rel_empleado:id,user_rel_id')->find($id);
      if (!empty($user)) {
        
        if($request->empleado != 1 && !empty($user?->rel_empleado?->user_rel_id))
          EmployeController::destroy(Crypt::encryptString($user?->rel_empleado?->user_rel_id, 1));

      if ($user->estado == 1) 
        $user->estado = 0;
       else 
        $user->estado = 1;

      $user->save();
      DB::commit();
    }
      return ['status' => true];
    } catch (\Throwable $th) {
      DB::rollback();
      return response()->json($th->getMessage());
    }
  }

  #------------------------------------------------------------------------------------

  public function rolesPorEmpresa(Request $request)
  {
    $arrayArea = [];
    $arrayEmpresa = [];

    // valida las variables recibidas desde la creacion del empleado
    if (empty($request->id))
      $id = 0;
    else
      $id = $request->id;

    if (empty($request->cedula))
      $cedula = '';
    else
      $cedula = $request->cedula;

    if (empty($request->email))
      $email = '';
    else
      $email = $request->email;

    $user_id = User::where('id', $id)
      ->orWhere('identification', $cedula)
      ->orWhere('email',$email)
      ->first();

    // si el usuario no se encuentra (desde la creacion del empleado) devuelve 0
    if(empty($user_id))
      return 0;

    if ($request->accion == 'editar') {
      // Empresas del Usuario
      $empresas_user = EmpresaUser::where('user_id', Auth::user()->id)->pluck('empresa_id');
      $areasUser = AreaUsers::where('user_id', Auth::user()->id)->pluck('area_id');
    } else {
      if (Auth::user()->hasRole('root')) {
        $areasUser = AreaUsers::where('user_id', $user_id->id)->pluck('area_id');
      } else {
        // Empresas del Usuario
        $empresas_user = EmpresaUser::where('user_id', Auth::user()->id)->pluck('empresa_id');

        // Id de las Areas de la empresa del usuario
        $areas = Area::whereIn('empresa_id', $empresas_user)->pluck('id');

        $areasUser = AreaUsers::whereIn('area_id', $areas)->where('user_id', $user_id->id)->pluck('area_id');
      }
    }

    #-----------------------------------------------------------------------------------
    # AREA DE USUARIO A A EDITAR
    #-----------------------------------------------------------------------------------

    foreach ($areasUser as $area) {
      $areaUser = Area::where('id', $area)->select('id', 'empresa_id', 'nombre')->get();
      $empresa  = Empresa::where('id', $areaUser[0]['empresa_id'])->select('nombre', 'id')->get();

      array_push($arrayEmpresa, $empresa);
      array_push($arrayArea, $areaUser->toArray());
    }
    if ($request->accion == 'editar')
      $rolesUser = RoleUser::where('model_id', Auth::user()->id)->get();
    else
      $rolesUser = RoleUser::where('model_id', $user_id->id)->get();

    $arrayRoles = [];
    for ($i = 0; $i < count($arrayArea); $i++) {
      $campos = [];
      foreach ($rolesUser as $key => $rol) {
        if ($rol->empresa_id == $arrayArea[$i][0]['empresa_id']) {
          $rolUser = Role::where('id', $rol->role_id)->select('display_name', 'id')->get();
          array_push($campos, $rolUser);
        }
      }
      $arrayRoles[$i] = $campos;
    }

    for ($i = 0; $i < count($arrayEmpresa); $i++) {
      $todo[$i] = array(
        'empresa' => $arrayEmpresa[$i],
        'area' => $arrayArea[$i],
        'roles' => $arrayRoles[$i]
      );
    }

    return $todo;
  }

  //mostrar tabla de clientes por los que ha pasado el usuario

  public function clientes(Request $request)
  {
    $id = $request->id;
    $clientes = UserCustomer::where('user_id', $id)->get();

    $arr = [];
    $arrTodo = [];
    foreach ($clientes as $key => $value) {
      $cliente = Customer::find($value->customer_id);
      if ($key + 1 == $clientes->count())
        $fechaPost = 'Actualmente';
      else
        $fechaPost = date('d-m-Y h:i:s a', strtotime($clientes[$key + 1]->created_at));
      $arr = array(
        'cliente' => $cliente->name,
        'fecha_ini' => date('d-m-Y h:i:s a', strtotime($value->created_at)),
        'fecha_fin' => $fechaPost
      );
      array_push($arrTodo, $arr);
    }
    return response()->json($arrTodo);
  }

  public function searchWatchman($id)
  {

    //usuarios cuando tienen el rol de guarda
    $guardas =  User::select('id', 'name', 'customer_id')
      ->whereHas('roles', function ($q) {
        $q->where('name', 'guarda');
      })->get();

    if(!Auth::user()->hasRole('root'))
    $guardas = $guardas->where('customer_id', $id);

    return response()->json($guardas);
  }

  public function detalleHijos(Request $request)
  {
    $hijos = DB::table('users_sons')
      ->join('ciudades', 'ciudades.id', '=', 'users_sons.city_id')
      ->select('users_sons.*', 'ciudades.nombre as nombre_ciudad', 'ciudades.departamento as departamento')
      ->where('users_sons.user_id', Auth::user()->id)->get();
    return response()->json($hijos);
  }
}
