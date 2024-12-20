<?php

// namespace App\Http\Controllers;

// use App\Models\Servicesproviders;
// use App\Http\Requests\StoreservicesprovidersRequest;
// use App\Http\Requests\UpdateservicesprovidersRequest;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Storage;

// class ServicesprovidersController extends Controller
// {
//     // Fetch all records with pagination
//     public function index()
//     {
//         $servicesproviders = Servicesproviders::paginate(20);
//         return response()->json([
//             'success' => true,
//             'data' => $servicesproviders,
//             'message' => 'Services retrieved successfully.'
//         ]);
//     }

//     // Display a single record
//     public function show(Servicesproviders $servicesprovider)
//     {
//         return response()->json([
//             'success' => true,
//             'data' => $servicesprovider,
//         ]);
//     }

//     // Store a new record
//     public function store(Request $request)
//     {
//         $validated = $request->validate([
//             'name' => 'required|string',
//             'email' => 'required|email|unique:servicesproviders',
//             'assistantName' => 'required|string',
//             'assistantphoneNumber' => 'nullable|string',
//             'qualification' => 'required|string',
//             'phoneNumber' => 'nullable|string',
//             'organizationMobile' => 'nullable|string',
//             'password' => 'required|string',
//             'service' => 'required|string',
//             'specialized' => 'required|string',
//             'experience' => 'required|integer',
//             'serviceOrganization' => 'required|array',
//             'status' => 'required|string',
//             'amount' => 'nullable|string',
//             'type' => 'nullable|string',
//             'featured' => 'required|boolean',
//             'profileImage' => 'nullable|image',
//             'certificate' => 'nullable|image',
//         ]);

//         // Handle file uploads
//         if ($request->hasFile('profileImage')) {
//             $validated['profileImage'] = $request->file('profileImage')->store('servicesproviders/profile_images', 'public');
//         }
//         if ($request->hasFile('certificate')) {
//             $validated['certificate'] = $request->file('certificate')->store('servicesproviders/certificates', 'public');
//         }

//         $servicesprovider = Servicesproviders::create($validated);

//         return response()->json([
//             'success' => true,
//             'data' => $servicesprovider,
//             'message' => 'Service provider created successfully.'
//         ]);
//     }

//     // Update an existing record
//     // public function update(Request $request, Servicesproviders $servicesprovider)
//     // {
//     //     $validated = $request->validate([
//     //         'name' => 'sometimes|string',
//     //         'email' => 'sometimes|email|unique:servicesproviders,email,' . $servicesprovider->id,
//     //         'assistantName' => 'sometimes|string',
//     //         'assistantphoneNumber' => 'nullable|string',
//     //         'qualification' => 'sometimes|string',
//     //         'phoneNumber' => 'nullable|string',
//     //         'organizationMobile' => 'nullable|string',
//     //         'password' => 'sometimes|string',
//     //         'service' => 'sometimes|string',
//     //         'specialized' => 'sometimes|string',
//     //         'experience' => 'sometimes|integer',
//     //         'serviceOrganization' => 'sometimes|array',
//     //         'status' => 'sometimes|string',
//     //         'amount' => 'nullable|string',
//     //         'type' => 'nullable|string',
//     //         'featured' => 'sometimes|boolean',
//     //         'profileImage' => 'nullable|image',
//     //         'certificate' => 'nullable|image',
//     //     ]);

//     //     // Handle file uploads and delete old files
//     //     if ($request->hasFile('profileImage')) {
//     //         if ($servicesprovider->profileImage) {
//     //             Storage::disk('public')->delete($servicesprovider->profileImage);
//     //         }
//     //         $validated['profileImage'] = $request->file('profileImage')->store('servicesproviders/profile_images', 'public');
//     //     }

//     //     if ($request->hasFile('certificate')) {
//     //         if ($servicesprovider->certificate) {
//     //             Storage::disk('public')->delete($servicesprovider->certificate);
//     //         }
//     //         $validated['certificate'] = $request->file('certificate')->store('servicesproviders/certificates', 'public');
//     //     }

//     //     $servicesprovider->update($validated);

//     //     return response()->json([
//     //         'success' => true,
//     //         'data' => $servicesprovider,
//     //         'message' => 'Service provider updated successfully.'
//     //     ]);
//     // }

//     // Delete a record
//     public function destroy(Servicesproviders $servicesprovider)
//     {
//         // Delete associated files
//         if ($servicesprovider->profileImage) {
//             Storage::disk('public')->delete($servicesprovider->profileImage);
//         }
//         if ($servicesprovider->certificate) {
//             Storage::disk('public')->delete($servicesprovider->certificate);
//         }

//         $servicesprovider->delete();

//         return response()->json([
//             'success' => true,
//             'message' => 'Service provider deleted successfully.'
//         ]);
//     }
// }

namespace App\Http\Controllers;

use App\Models\Servicesproviders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServicesprovidersController extends Controller
{
    // Fetch all service providers
    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 20);
        $servicesproviders = Servicesproviders::paginate($perPage);

        return response()->json([
            'success' => true,
            'data' => $servicesproviders,
            'message' => 'Service providers retrieved successfully.',
        ], 200);
    }

    // Fetch a single service provider by ID
    public function show($id)
    {
        $servicesprovider = Servicesproviders::find($id);

        if (!$servicesprovider) {
            return response()->json(['error' => 'Service provider not found'], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $servicesprovider,
            'message' => 'Service provider retrieved successfully.',
        ], 200);
    }

    // Create a new service provider
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:servicesproviders',
            'assistantName' => 'required|string',
            'assistantphoneNumber' => 'nullable|string',
            'qualification' => 'required|string',
            'phoneNumber' => 'nullable|string',
            'organizationMobile' => 'nullable|string',
            'password' => 'required|string',
            'service' => 'required|string',
            'specialized' => 'required|string',
            'experience' => 'required|integer',
            'serviceOrganization' => 'required|array',
            'status' => 'required|string',
            'amount' => 'nullable|string',
            'type' => 'nullable|string',
            'featured' => 'required|boolean',
            'profileImage' => 'nullable|image',
            'certificate' => 'nullable|image',
        ]);

        // Handle file uploads
        if ($request->hasFile('profileImage')) {
            $validatedData['profileImage'] = $request->file('profileImage')->store('servicesproviders/profile_images', 'public');
        }
        if ($request->hasFile('certificate')) {
            $validatedData['certificate'] = $request->file('certificate')->store('servicesproviders/certificates', 'public');
        }

        $servicesprovider = Servicesproviders::create($validatedData);

        return response()->json([
            'success' => true,
            'data' => $servicesprovider,
            'message' => 'Service provider created successfully.',
        ], 201);
    }

    // Update an existing service provider
    public function update(Request $request, $id)
    {
        $servicesprovider = Servicesproviders::find($id);

        if (!$servicesprovider) {
            return response()->json(['error' => 'Service provider not found'], 404);
        }

        $validatedData = $request->validate([
            'name' => 'sometimes|required|string',
            'email' => 'sometimes|email|unique:servicesproviders,email,' . $servicesprovider->id,
            'assistantName' => 'sometimes|string',
            'assistantphoneNumber' => 'nullable|string',
            'qualification' => 'sometimes|string',
            'phoneNumber' => 'nullable|string',
            'organizationMobile' => 'nullable|string',
            'password' => 'sometimes|string',
            'service' => 'sometimes|string',
            'specialized' => 'sometimes|string',
            'experience' => 'sometimes|integer',
            'serviceOrganization' => 'sometimes|array',
            'status' => 'sometimes|string',
            'amount' => 'nullable|string',
            'type' => 'nullable|string',
            'featured' => 'sometimes|boolean',
            'profileImage' => 'nullable|image',
            'certificate' => 'nullable|image',
        ]);

        // Handle file uploads
        if ($request->hasFile('profileImage')) {
            if ($servicesprovider->profileImage) {
                Storage::disk('public')->delete($servicesprovider->profileImage);
            }
            $validatedData['profileImage'] = $request->file('profileImage')->store('servicesproviders/profile_images', 'public');
        }

        if ($request->hasFile('certificate')) {
            if ($servicesprovider->certificate) {
                Storage::disk('public')->delete($servicesprovider->certificate);
            }
            $validatedData['certificate'] = $request->file('certificate')->store('servicesproviders/certificates', 'public');
        }

        $servicesprovider->update($validatedData);

        return response()->json([
            'success' => true,
            'data' => $servicesprovider,
            'message' => 'Service provider updated successfully.',
        ], 200);
    }

    // Delete a service provider
    public function destroy($id)
    {
        $servicesprovider = Servicesproviders::find($id);

        if (!$servicesprovider) {
            return response()->json(['error' => 'Service provider not found'], 404);
        }

        // Delete associated files
        if ($servicesprovider->profileImage) {
            Storage::disk('public')->delete($servicesprovider->profileImage);
        }
        if ($servicesprovider->certificate) {
            Storage::disk('public')->delete($servicesprovider->certificate);
        }

        $servicesprovider->delete();

        return response()->json([
            'success' => true,
            'message' => 'Service provider deleted successfully.',
        ], 200);
    }
}
