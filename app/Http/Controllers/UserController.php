<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.pages.users.user', compact('users'));
    }

    public function create()
    {
        return view('admin.pages.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'is_admin' => 'boolean',
        ]);

        $data = $request->except('password');
        $data['password'] = bcrypt($request->input('password'));

        User::create($data);

        return redirect()->route('admin.users.index')
            ->with('success', 'User created successfully.');
    }

    // public function show(User $user)
    // {
    //     return view('admin.users.show', compact('user'));
    // }

    public function edit($id)
    {
        try {
            // dd($id);
    
            $user = User::find($id);
    
            if (!$user) {
                abort(404); // or redirect to a 404 page
            }
    
            // Add the following lines for debugging
            // dd($id, $user);
    
            return view('admin.pages.users.edit', compact('user'));
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'nullable|min:6',
                'is_admin' => 'boolean',
            ]);
    
            $data = $request->except('password');
    
            if ($request->has('password')) {
                $data['password'] = bcrypt($request->input('password'));
            }
    
            /// * To check id is exist on DB or not
            /// * If not will throw on exception
            $user = User::findOrFail($id);
    
            $user->update($data);
    
            return redirect()->route('admin.users.index')
                ->with('success', 'User updated successfully.');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function destroy($id)
    {

        /// * To check id is exist on DB or not
        /// * If not will throw on exception
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', 'User deleted successfully.');
    }
}
