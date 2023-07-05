<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Employee\Request as EmployeeRequest;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function request_update_column(EmployeeRequest $request)
    {
        $column = $request->getColumnRequestUpdate('request_update');

        $resp = [
            'column' => $column,
        ];
        return response()->json($resp,200);
    }

    /**
     * Display a listing of the resource.
     */
    public function request_update_data(EmployeeRequest $request)
    {
        $data = $request->getDataRequestUpdate();

        $data = DataTables::collection($data)->toArray();
        
        return response()->json($data,  200);
    }

    public function request_update_import(EmployeeRequest $request)
    {
        $import = $request->import();

        return response()->json($import,  200); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(EmployeeRequest $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EmployeeRequest $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeRequest $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EmployeeRequest $request)
    {
        //
    }
}
