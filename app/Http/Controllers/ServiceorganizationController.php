<?php

namespace App\Http\Controllers;

use App\Models\Serviceorganization;
use App\Http\Requests\StoreserviceorganizationRequest;
use App\Http\Requests\UpdateserviceorganizationRequest;

class ServiceorganizationController extends Controller
{
    public function index()
    {
        $organizations = Serviceorganization::paginate(5);
        return response()->json([
            'success' => true,
            'data' => $organizations,
            'message' => 'Service organizations retrieved successfully.'
        ]);
    }

    public function store(StoreserviceorganizationRequest $request)
    {
        $organization = Serviceorganization::create($request->validated());
        return response()->json([
            'success' => true,
            'data' => $organization,
            'message' => 'Service organization created successfully.'
        ]);
    }

    public function show(Serviceorganization $serviceorganization)
    {
        return response()->json([
            'success' => true,
            'data' => $serviceorganization
        ]);
    }

    public function update(UpdateserviceorganizationRequest $request, Serviceorganization $serviceorganization)
    {
        $serviceorganization->update($request->validated());
        return response()->json([
            'success' => true,
            'data' => $serviceorganization,
            'message' => 'Service organization updated successfully.'
        ]);
    }

    public function destroy(Serviceorganization $serviceorganization)
    {
        $serviceorganization->delete();
        return response()->json([
            'success' => true,
            'message' => 'Service organization deleted successfully.'
        ]);
    }
}
