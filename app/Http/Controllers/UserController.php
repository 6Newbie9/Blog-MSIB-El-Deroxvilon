<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Display a listing of users
    public function index()
    {
        $users = User::all(); // Retrieve all users
        return view('users.index', compact('users')); // Pass users to the view
    }

    // Show the form for creating a new user
    public function create()
    {
        return view('users.create'); // Return the view for creating a new user
    }

    // Store a newly created user in storage
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create a new user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash the password
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully');
    }

    // Display the specified user
    public function show(User $user)
    {
        return view('users.show', compact('user')); // Return the view with user details
    }

    // Show the form for editing the specified user
    public function edit(User $user)
    {
        return view('users.edit', compact('user')); // Return the edit view with user data
    }

    // Update the specified user in storage
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id, // Ignore the current user's email for uniqueness
            'password' => 'nullable|string|min:8|confirmed', // Password is optional on update
        ]);

        // Update user details
        $user->name = $request->name;
        $user->email = $request->email;
        
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password); // Hash the password if provided
        }
        
        $user->save(); // Save the user

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    // Remove the specified user from storage
    public function destroy(User $user)
    {
        $user->delete(); // Delete the user
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
}
