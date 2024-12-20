<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;

class ServicesController extends Controller
{
    // Fetch all services
    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 20);
        $services = Services::paginate($perPage);

        return response()->json([
            'success' => true,
            'data' => $services,
            'message' => 'Services retrieved successfully.',
        ], 200);
    }

    // Fetch a single service by ID
    public function show($id)
    {
        $service = Services::find($id);

        if (!$service) {
            return response()->json(['error' => 'Service not found'], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $service,
            'message' => 'Service retrieved successfully.',
        ], 200);
    }

    // Create a new service
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|image',
            'featured' => 'nullable|boolean',
            'status' => 'nullable|string',
            'amount' => 'nullable|numeric',
            'type' => 'nullable|string',
            'bookingsFee' => 'nullable|numeric',
            'bookingType' => 'nullable|string',
        ]);

        // Handle file upload for 'icon'
        if ($request->hasFile('icon')) {
            $validatedData['icon'] = $request->file('icon')->store('servicesIcons', 'public');
        }

        $service = Services::create($validatedData);

        return response()->json([
            'success' => true,
            'data' => $service,
            'message' => 'Service created successfully.',
        ], 201);
    }

    // Update an existing service
    // public function update(Request $request, $id)
    // {
    //     $service = Services::find($id);
    //     if (!$service) {
    //         return response()->json(['error' => 'Service not found'], 404);
    //     }
    
    //     $validatedData = $request->validate([
    //         'name' => 'sometimes|required|string|max:255',
    //         'description' => 'nullable|string',
    //         'icon' => 'nullable|image',
    //         'featured' => 'nullable|boolean',
    //         'status' => 'nullable|string',
    //         'amount' => 'nullable|numeric',
    //         'type' => 'nullable|string',
    //         'bookingsFee' => 'nullable|numeric',
    //         'bookingType' => 'nullable|string',
    //     ]);
    
    //     if ($request->hasFile('icon')) {
    //         if ($request->file('icon')->isValid()) {
    //             $validatedData['icon'] = $request->file('icon')->store('servicesIcons', 'public');
    //         } else {
    //             return response()->json(['error' => 'Invalid icon file.'], 400);
    //         }
    //     }
    
    //     // Force type consistency for 'featured'
    //     $validatedData['featured'] = (bool) $request->input('featured', false);
    
    //     $service->update($validatedData);
    
    //     return response()->json([
    //         'success' => true,
    //         'data' => $service,
    //         'message' => 'Service updated successfully.',
    //     ], 200);
    // }
    
    public function update(Request $request, $id)
    {
        logger('Incoming data for service update:', $request->all());
        // return response()->json($request->all());
        $service = Services::find($id);
        if (!$service) {
            return response()->json(['error' => 'Service not found'], 404);
        }

        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|image',
            'featured' => 'nullable|boolean',
            'status' => 'nullable|string',
            'amount' => 'nullable|numeric',
            'type' => 'nullable|string',
            'bookingsFee' => 'nullable|numeric',
            'bookingType' => 'nullable|string',
        ]);

        // Handle file upload for 'icon'
        if ($request->hasFile('icon')) {
            $validatedData['icon'] = $request->file('icon')->store('servicesIcons', 'public');
        }

        $service->update($validatedData);

        return response()->json([
            'success' => true,
            'data' => $service,
            'message' => 'Service updated successfully.',
        ], 200);
    }

    // Delete a service
    public function destroy($id)
    {
        $service = Services::find($id);

        if (!$service) {
            return response()->json(['error' => 'Service not found'], 404);
        }

        $service->delete();

        return response()->json([
            'success' => true,
            'message' => 'Service deleted successfully.',
        ], 200);
    }
}
