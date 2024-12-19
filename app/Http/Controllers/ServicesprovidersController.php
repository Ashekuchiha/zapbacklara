<?php

namespace App\Http\Controllers;

use App\Models\Servicesproviders;
use App\Http\Requests\StoreservicesprovidersRequest;
use App\Http\Requests\UpdateservicesprovidersRequest;
use Illuminate\Http\Request;

class ServicesprovidersController extends Controller
{
    public function index()
    {
        $servicesproviders = Servicesproviders::paginate(20);
        return response()->json([
            'success' => true,
            'data' => $servicesproviders,
            'message' => 'Services retrieved successfully.'
        ]);
    }

    public function store(StoreservicesprovidersRequest $request)
    {
        $servicesprovider = Servicesproviders::create($request->validated());
        return response()->json([
            'success' => true,
            'data' => $servicesprovider,
            'message' => 'Service provider created successfully.'
        ]);
    }

    public function show(Servicesproviders $servicesprovider)
    {
        return response()->json([
            'success' => true,
            'data' => $servicesprovider,
        ]);
    }

    public function update(UpdateservicesprovidersRequest $request, Servicesproviders $servicesprovider)
    {
        $servicesprovider->update($request->validated());
        return response()->json([
            'success' => true,
            'data' => $servicesprovider,
            'message' => 'Service provider updated successfully.'
        ]);
    }

    public function destroy(Servicesproviders $servicesprovider)
    {
        $servicesprovider->delete();
        return response()->json([
            'success' => true,
            'message' => 'Service provider deleted successfully.'
        ]);
    }
}
