<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees;
use App\Models\References;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class EmployeesController extends Controller
{
    //
    public function index()
    {
        return Employees::all();
    }

    public function show($id)
    {
        return Employees::find($id);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'min:2', 'unique:employees,name'],
            'status_id' => ['required', Rule::in(References::where('code', 'employee_status')->pluck('id'))],
            'salary' => ['required', 'integer', 'gt:2000000', 'lt:10000000']
        ]);

        if($validator->fails())
        {
            return response()->json($validator->messages(), 400);
        }

        $employees = Employees::create($request->all());

        return response()->json($employees, 201);
    }

    public function update(Request $request, Employees $employees)
    {
        $employees->update($request->all());

        return response()->json($employees, 200);
    }

    public function delete(Employees $employees)
    {
        $employees->delete();

        return response()->json(null, 204);
    }
}
