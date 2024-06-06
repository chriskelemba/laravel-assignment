<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Models\User;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class UserController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:view user', only: ['index']),
            new Middleware('permission:create user', only: ['create', 'store']),
            new Middleware('permission:update user', only: ['update', 'edit']),
            new Middleware('permission:delete user', only: ['destroy']),
        ];
    }
    
    public function index()
    {
        $users = User::get();
        return view('role-permission.user.index', ['users' => $users]);
    }

    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('role-permission.user.create', ['roles' => $roles]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|max:20',
            'roles' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->syncRoles($request->roles);

        return redirect('/users')->with('status', 'User created successfully with roles');
    }

    public function edit(User $user)
    {
        $roles = Role::pluck('name', 'name')->all();
        $userRoles = $user->roles->pluck('name', 'name')->all();

        return view('role-permission.user.edit', [
            'user' => $user,
            'roles' => $roles,
            'userRoles' => $userRoles
        ]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|max:20',
            'roles' => 'required'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if(!empty($request->password)) {
            $data += [
                'password' => Hash::make($request->password),
            ];
        }

        $user->update($data);
        $user->syncRoles($request->roles);

        return redirect('/users')->with('status', 'User Updated Successfully with roles');
    }

    public function destroy($userId)
    {
        $user = User::findOrFail($userId);
        $user->delete();

        return redirect('/users')->with('status', 'User Deleted Successfully');
    }
    // // Add a user
    // public function add(Request $request)
    // {
    //     $user = new User();
    //     $user->name = $request->input('name');
    //     $user->email = $request->input('email');
    //     $user->password = bcrypt($request->input('password'));
    //     $user->save();
    //     return redirect()->route('dashboard');
    // }

    // // Edit a user
    // public function edit($id)
    // {
    //     $user = User::findOrFail($id);
    //     return view('edit', compact('user'));
    // }

    // public function update(Request $request, $id)
    // {
    //     $user = User::findOrFail($id);
    //     $user->name = $request->input('name');
    //     $user->email = $request->input('email');
    //     $user->save();
    //     return redirect()->route('dashboard');
    // }

    // // Delete a user
    // public function destroy($id)
    // {
    //     $user = User::findOrFail($id);
    //     $user->delete();
    //     return redirect()->route('dashboard');
    // }
}