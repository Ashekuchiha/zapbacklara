<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use Illuminate\Http\Request;
use App\Http\Requests\StorecitiesRequest;
use App\Http\Requests\UpdatecitiesRequest;

class CitiesController extends Controller
{
    //by state

    public function getCitiesByState(Request $request, $StateName)
    {
        try {
            // Fetch cities where StateName matches the parameter
            $cities = Cities::where('StateName', $StateName)->get();
    
            // Structure the response
            $response = [
                'success' => true,
                'data' => [
                    'data' => $cities,
                    'total' => $cities->count(),
                ],
                'message' => 'city locations retrieved successfully.',
            ];
    
            return response()->json($response, 200);
        } catch (\Exception $e) {
            // Handle errors
            return response()->json([
                'success' => false,
                'message' => 'Error retrieving city locations.',
            ], 500);
        }
    }
    
    // Fetch all cities with pagination
    public function index(Request $request)
    {
        $perPage = $request->query('per_page', 20);
        $cities = Cities::paginate($perPage);

        return response()->json([
            'success' => true,
            'data' => [
                'current_page' => $cities->currentPage(),
                'data' => $cities->items(),
                'total' => $cities->total(),
                'per_page' => $cities->perPage(),
                'last_page' => $cities->lastPage(),
                'from' => $cities->firstItem(),
                'to' => $cities->lastItem(),
                'first_page_url' => $cities->url(1),
                'last_page_url' => $cities->url($cities->lastPage()),
                'next_page_url' => $cities->nextPageUrl(),
                'prev_page_url' => $cities->previousPageUrl(),
                'links' => $cities->linkCollection(),
            ],
            'message' => 'Cities retrieved successfully.',
        ]);
    }

    // Create a new city
    public function store(StorecitiesRequest $request)
    {
        $city = Cities::create($request->validated());

        return response()->json([
            'success' => true,
            'data' => $city,
            'message' => 'City created successfully.',
        ], 201);
    }

    // Show a specific city by ID
    public function show($id)
    {
        $city = Cities::find($id);

        if (!$city) {
            return response()->json([
                'success' => false,
                'message' => 'City not found.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $city,
            'message' => 'City retrieved successfully.',
        ]);
    }

    // Update a specific city by ID
    public function update(UpdatecitiesRequest $request, $id)
    {
        $city = Cities::find($id);

        if (!$city) {
            return response()->json([
                'success' => false,
                'message' => 'City not found.',
            ], 404);
        }

        $city->update($request->validated());

        return response()->json([
            'success' => true,
            'data' => $city,
            'message' => 'City updated successfully.',
        ]);
    }

    // Delete a specific city by ID
    public function destroy($id)
    {
        $city = Cities::find($id);

        if (!$city) {
            return response()->json([
                'success' => false,
                'message' => 'City not found.',
            ], 404);
        }

        $city->delete();

        return response()->json([
            'success' => true,
            'message' => 'City deleted successfully.',
        ]);
    }
}
