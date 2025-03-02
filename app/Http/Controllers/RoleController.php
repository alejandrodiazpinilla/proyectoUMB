<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\PermissionRole;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\HelpersClass;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller{

    public function __construct(){
        $this->middleware('auth');
		$this->middleware('role_or_permission:root|mostrar_roles', ['only' => ['index','store','update']]);
    }
    
    public function index(){
        $roles = Role::where('id','<>',1)->get();
        $permissions = Permission::pluck('display_name','id');

        return view('roles.index',[
            'roles' => $roles,
            'permissions' => $permissions
        ]);
    }

    public function store(Request $request){

        //Validador Null.
        if ($request->display_name == null || $request->permisos == null) {
            return 0;
        }

        //Tratamiento de Variables.
        $nombre = trim(strtolower(HelpersClass::utf8_remplace($request->display_name)));
        $display_name = trim(ucwords(strtolower($request->display_name)));

        //Validador Duplicidad
        $unique_key = Role::where('name',$nombre)->count();
        if ($unique_key >= 1) {
            return 1;
        }

        //Insercion de datos a la base de datos.
        DB::beginTransaction();
        try{
            $rol = new Role;
            $rol->name = $nombre;
            $rol->display_name = $display_name;
            $save = $rol->save();

            if($save){

                $permission = $request->permisos;
                $permisos = implode(',', $permission);
                $permissions = explode(",",$permisos);

                foreach ($permissions as $key => $permiso){
                    $rol_per = new PermissionRole;
                    $rol_per->role_id = $rol->id;
                    $rol_per->permission_id = $permiso;
                    $rol_per->save();
                }
            }

            DB::commit();
            return 2;

        }catch (\Throwable $th) {

            $success = false;
            $errors = $th->getMessage();
            DB::rollback();
            return response()->json($errors);

        }
    }
    
    public function update($id, Request $request){

        //Validador Null.
        if ($request->display_name_act == null || $request->permisos_act == null) {
            return 0;
        }

        //Tratamiento de Variables.
        $nombre = trim(strtolower(HelpersClass::utf8_remplace($request->display_name_act)));
        $display_name_act = trim(ucwords(strtolower($request->display_name_act)));

        //Validador Duplicidad
        $unique_key = Role::where('name',$nombre)->where('id','<>',$id)->count();
        if ($unique_key >= 1) {
            return 1;
        }

        //Insercion de datos a la base de datos.
        DB::beginTransaction();
        try{

            $rol = Role::find($id);
            $rol->display_name = $display_name_act;
            $save = $rol->save();

            if($save){
                
                // Tratamiento del arreglo con los datos de los permisos
                $permission = $request->permisos_act;
                $permisos = implode(',', $permission);
                $permissions = explode(",",$permisos);

                // Eliminacion de permisos actuales
                PermissionRole::where('role_id', $rol->id)->delete();
                
                // Cargue de Nuevos permisos
                foreach ($permissions as $key => $permiso) {
                    $rol_per = new PermissionRole;
                    $rol_per->role_id = $rol->id;
                    $rol_per->permission_id = $permiso;
                    $rol_per->save();
                }
            }

            DB::commit();
            return 2;

        }catch (\Throwable $th) {

            $success = false;
            $errors = $th->getMessage();
            DB::rollback();
            return response()->json($errors);

        }
        
    }    

    public function destroy($id){

        // Busqueda por Id
        $rol = Role::find($id);
        if(!empty($rol)){
            // Eliminacion Tabla Permisos
            PermissionRole::where('role_id', $rol->id)->delete();
            // Eliminacion Tabla de Roles
            $rol->delete();
            // Respuesta
            return 1;
        }else{
            // Respuesta
            return 0;
        }
    }
}
