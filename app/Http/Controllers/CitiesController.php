<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use Illuminate\Http\Request;

class CitiesController extends Controller
{
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
            'message' => 'Cities retrieved successfully.'
        ]);
    }

    // Other CRUD methods (store, show, update, destroy) can be added as needed.
}
