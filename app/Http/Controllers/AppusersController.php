<?php

namespace App\Http\Controllers;

use App\Models\Appusers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AppusersController extends Controller
{
    // Fetch all app users
    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 20);
        $users = Appusers::paginate($perPage);

        return response()->json([
            'success' => true,
            'data' => $users,
            'message' => 'Users retrieved successfully.',
        ], 200);
    }

    // Fetch a single app user by ID
    public function show($id)
    {
        $user = Appusers::find($id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $user,
            'message' => 'User retrieved successfully.',
        ], 200);
    }

    // Create a new app user
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:appusers,email',
            'phone' => 'required|string|max:15',
            'dob' => 'required|date',
            'city' => 'required|string|max:255',
            'profile' => 'nullable|image',
            'password' => 'required|string|min:8',
        ]);

        // Handle file upload for 'profile'
        if ($request->hasFile('profile')) {
            $validatedData['profile'] = $request->file('profile')->store('profiles', 'public');
        }

        $validatedData['password'] = bcrypt($validatedData['password']);

        $user = Appusers::create($validatedData);

        return response()->json([
            'success' => true,
            'data' => $user,
            'message' => 'User created successfully.',
        ], 201);
    }

    // Update an app user
    public function update(Request $request, $id)
    {
        // Log incoming data for debugging purposes
        logger('Incoming data for user update:', $request->all());
    
        // Find the user by ID
        $user = Appusers::find($id);
    
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }
    
        // Validate incoming data
        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'nullable|email|unique:appusers,email,' . $user->id,
            'phone' => 'nullable|string|max:15',
            'dob' => 'nullable|date',
            'city' => 'nullable|string|max:255',
            'profile' => 'nullable',
            'password' => 'nullable|string|min:8',
        ]);
    
        // Handle file upload for 'profile'
        if ($request->hasFile('profile')) {
            // Delete the old profile image if it exists
            if ($user->profile && Storage::disk('public')->exists($user->profile)) {
                Storage::disk('public')->delete($user->profile);
            }
    
            // Store the new profile image and get the URL
            $validatedData['profile'] = Storage::url($request->file('profile')->store('profiles', 'public'));
        }
    
        // Hash the password if it's being updated
        if (isset($validatedData['password'])) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        }
    
        // Update the user with validated data
        $user->update($validatedData);
    
        return response()->json([
            'success' => true,
            'data' => $user,
            'message' => 'User updated successfully.',
        ], 200);
    }
    

    // Delete an app user
    public function destroy($id)
    {
        $user = Appusers::find($id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        // Delete profile image if exists
        if ($user->profile && Storage::disk('public')->exists($user->profile)) {
            Storage::disk('public')->delete($user->profile);
        }

        $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'User deleted successfully.',
        ], 200);
    }
}
