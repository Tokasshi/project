<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::get();
        return view('admin.user.users', compact('users'));
    }
    

    public function showHeader()
{
    $user = auth()->user(); // Get the currently logged-in user
    return view('admin.includes.header', compact('user')); // Pass the user to the view
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.add_user');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'userName' => 'required|string',
            'email' => 'required|string|max:500|unique:users',
            'password' => 'min:8',
            'password_confirmation' => 'required_with:password|same:password|min:8',
        ]);

        $data['password'] = Hash::make($data['password']);
        $data['active'] = isset($request->active);
        $data['email_verified_at'] = now();
        User::create($data);

        return redirect()->route('user.index')->with('success', 'User created and email verified!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit_user', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'userName' => 'required|string',
            'email' => 'required|string|max:500',
            'password' => 'min:8|sometimes',
        ]);
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->input('password'));
        } else {
            // Remove password from the data if not provided
            unset($data['password']);
        }
        
        $data['active'] = isset($request->active);

        User::where('id', $id)->update($data);
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
