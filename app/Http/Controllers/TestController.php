<?php

// namespace App\Http\Controllers;

// use App\Models\test;
// use App\Http\Requests\StoretestRequest;
// use App\Http\Requests\UpdatetestRequest;

// class TestController extends Controller
// {
//     /**
//      * Display a listing of the resource.
//      */
//     public function index()
//     {
//         //
//     }

//     /**
//      * Show the form for creating a new resource.
//      */
//     public function create()
//     {
//         //
//     }

//     /**
//      * Store a newly created resource in storage.
//      */
//     public function store(StoretestRequest $request)
//     {
//         //
//     }

//     /**
//      * Display the specified resource.
//      */
//     public function show(test $test)
//     {
//         //
//     }

//     /**
//      * Show the form for editing the specified resource.
//      */
//     public function edit(test $test)
//     {
//         //
//     }

//     /**
//      * Update the specified resource in storage.
//      */
//     public function update(UpdatetestRequest $request, test $test)
//     {
//         //
//     }

//     /**
//      * Remove the specified resource from storage.
//      */
//     public function destroy(test $test)
//     {
//         //
//     }
// }


namespace App\Http\Controllers;

use App\Models\Test;
use App\Http\Requests\StoreTestRequest;
use App\Http\Requests\UpdateTestRequest;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        return Test::all();
    }

    public function store(StoreTestRequest $request)
    {
        $validated = $request->validated();
        $validated['password'] = bcrypt($validated['password']);
        
        $test = Test::create($validated);

        return response()->json($test, 201);
    }

    public function show(Test $test)
    {
        return $test;
    }

    public function update(UpdateTestRequest $request, Test $test)
    {
        $validated = $request->validated();
        if (isset($validated['password'])) {
            $validated['password'] = bcrypt($validated['password']);
        }
        
        $test->update($validated);

        return response()->json($test, 200);
    }

    public function destroy(Test $test)
    {
        $test->delete();

        return response()->json(null, 204);
    }
}
