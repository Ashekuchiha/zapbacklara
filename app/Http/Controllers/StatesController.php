<?php

namespace App\Http\Controllers;

use App\Models\States;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class StatesController extends Controller
{

    //all state
    public function getAllStates(): JsonResponse
    {
        $states = States::all();
        $response = [
            "success" => true,
            "data" => [
                "data" => $states->map(function ($state) {
                    return [
                        "id" => $state->id,
                        "StateName" => $state->StateName,
                        "longitude" => $state->longitude,
                        "latitude" => $state->latitude,
                    ];
                }),
                "total" => $states->count(),
            ],
            "message" => "Service locations retrieved successfully.",
        ];

        return response()->json($response);
    }

    //all 
    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 5);
        $states = States::paginate($perPage);

        return response()->json([
            'success' => true,
            'data' => $states,
            'message' => 'States retrieved successfully.'
        ]);
    }

    //by id
    public function show($id)
    {
        $state = States::find($id); // Find by primary key

        if (!$state) {
            return response()->json(['error' => 'state not found'], 404);
        }

        // return response()->json($state, 200);
        return response()->json([
            'success' => true,
            'data' => $state,
            'message' => 'state retrieved successfully.',
        ]);
    }

    //post
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'StateName' => 'required|string|max:255',
            'longitude' => 'required|string',
            'latitude' => 'required|string',
        ]);

        $state = States::create($validatedData);

        return response()->json([
            'success' => true,
            'data' => $state,
            'message' => 'State created successfully.',
        ], 201);
    }

    //put normal
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'StateName' => 'sometimes|required|string|max:255',
            'longitude' => 'sometimes|required|string',
            'latitude' => 'sometimes|required|string',
        ]);

        $state = States::find($id);

        if (!$state) {
            return response()->json([
                'success' => false,
                'message' => 'State not found.',
            ], 404);
        }

        $state->update($validatedData);

        return response()->json([
            'success' => true,
            'data' => $state,
            'message' => 'State updated successfully.',
        ]);
    }

    //delete
    public function destroy($id)
    {
        $state = States::find($id);

        if (!$state) {
            return response()->json([
                'success' => false,
                'message' => 'State not found.',
            ], 404);
        }

        $state->delete();

        return response()->json([
            'success' => true,
            'message' => 'State deleted successfully.',
        ]);
    }
}
