<?php

// namespace App\Http\Controllers;

// use App\Http\Requests\StoreServicesRequest;
// use App\Http\Requests\UpdateServicesRequest;
// use App\Models\Services;
// use Illuminate\Http\Request;

// class ServicesController extends Controller
// {
//     public function index(Request $request)
//     {
        // $perPage = $request->get('per_page', 20);
        // $services = Services::paginate($perPage);

        // return response()->json([
        //     'success' => true,
        //     'data' => $services,
        //     'message' => 'Services retrieved successfully.',
        // ]);
//     }

//     public function store(StoreServicesRequest $request)
//     {
//         $service = Services::create($request->validated());

//         return response()->json([
//             'success' => true,
//             'data' => $service,
//             'message' => 'Service created successfully.',
//         ]);
//     }

//     public function show(Services $id)
//     {
        // return response()->json([
        //     'success' => true,
        //     'data' => $id,
        //     'message' => 'Service retrieved successfully.',
        // ]);
//     }

//     public function update(UpdateServicesRequest $request, Services $service)
//     {
//         $service->update($request->validated());

//         return response()->json([
//             'success' => true,
//             'data' => $service,
//             'message' => 'Service updated successfully.',
//         ]);
//     }

//     public function destroy(Services $service)
//     {
//         $service->delete();

//         return response()->json([
//             'success' => true,
//             'message' => 'Service deleted successfully.',
//         ]);
//     }
// }


namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    // Fetch all services
    public function index(Request $request)
    {
        // $services = Services::all();
        // return response()->json($services, 200);

        $perPage = $request->get('per_page', 20);
        $services = Services::paginate($perPage);

        return response()->json([
            'success' => true,
            'data' => $services,
            'message' => 'Services retrieved successfully.',
        ]);
    }

    // Fetch a single service by ID
    public function show($id)
    {
        $service = Services::find($id); // Find by primary key

        if (!$service) {
            return response()->json(['error' => 'Service not found'], 404);
        }

        // return response()->json($service, 200);
        return response()->json([
            'success' => true,
            'data' => $service,
            'message' => 'Service retrieved successfully.',
        ]);
    }

    // Create a new service
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|image',
            'featured' => 'nullable|boolean',
            'status' => 'nullable|boolean',
            'amount' => 'nullable|numeric',
            'type' => 'nullable|string',
            'bookingsFee' => 'nullable|numeric',
            'bookingType' => 'nullable|string',
        ]);

        $service = Services::create($validatedData);

        return response()->json(['message' => 'Service created successfully', 'data' => $service], 201);
    }

    // Update an existing service
    public function update(Request $request, $id)
    {
        $service = Services::find($id);

        if (!$service) {
            return response()->json(['error' => 'Service not found'], 404);
        }

        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|image',
            'featured' => 'nullable|boolean',
            'status' => 'nullable|boolean',
            'amount' => 'nullable|numeric',
            'type' => 'nullable|string',
            'bookingsFee' => 'nullable|numeric',
            'bookingType' => 'nullable|string',
        ]);

        $service->update($validatedData);

        return response()->json(['message' => 'Service updated successfully', 'data' => $service], 200);
    }

    // Delete a service
    public function destroy($id)
    {
        $service = Services::find($id);

        if (!$service) {
            return response()->json(['error' => 'Service not found'], 404);
        }

        $service->delete();

        return response()->json(['message' => 'Service deleted successfully'], 200);
    }
}
