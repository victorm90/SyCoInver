<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Hash; 
use App\Http\Controllers\Controller;
use App\Models\activityLogs;
use Illuminate\Http\Request;
Use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\Models\Activity;
Use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     */

    
    public function index()
    {
        
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

       /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|max:255',
            'usuario' => 'required|max:255',
            'ci' => 'required|max:12|min:9',
            'addres' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required ',
            'password_confirmation' => 'required '
          ]);       
        
        /* $users=User::create($request->all());  */  
        $users=User::create([
            'name'=> $request -> name,
            'usuario' => $request -> usuario,
            'ci' => $request -> ci,
            'addres' => $request -> addres,
            'email' => $request -> email,
            'password' => Hash::make(value:$request->password),
        ]);

        $dt = Carbon::now();
        $todayDate = $dt->toDayDateTimeString();
        $user = auth()->user();
        $roleName = auth()->user()->roles->first()->name;        
        $activityLogs= activityLogs::create([            
            'name' => $user->usuario,
            'rol' => $roleName,            
            'descripcion' => 'Creo un Usuario',                        
            'data_time' => $todayDate,            
        ]); 

        return redirect()->route('admin.users.index', $users)->with('info','Se creo con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('admin.users.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function activitylog(activityLogs $activityLogs)
    {
        $activityLogs = activityLogs::all();        
        return view('admin.log.activity',compact('activityLogs'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);

        $dt = Carbon::now();
        $todayDate = $dt->toDayDateTimeString();
        $userr = auth()->user();
        $roleName = auth()->user()->roles->first()->name;        
        $activityLogs= activityLogs::create([            
            'name' => $userr->usuario,
            'rol' => $roleName,            
            'descripcion' => 'Asigno un Rol a un Usuario',                        
            'data_time' => $todayDate,            
        ]); 

        return redirect()->route('admin.users.index', $user)->with('info','Se asigno los roles correctamnete');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        $dt = Carbon::now();
        $todayDate = $dt->toDayDateTimeString();
        $userr = auth()->user();
        $roleName = auth()->user()->roles->first()->name;        
        $activityLogs= activityLogs::create([            
            'name' => $userr->usuario,
            'rol' => $roleName,            
            'descripcion' => 'Elimino un Usuario',                        
            'data_time' => $todayDate,            
        ]);

        return redirect()->route('admin.users.index')->with('info','Se a eliminado correctamente');
    }
}
