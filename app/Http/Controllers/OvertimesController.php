<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Overtimes;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Rules\OvertimeDateRule;
use App\Rules\OvertimeEndDateRule;

class OvertimesController extends Controller
{
    //
    public function index()
    {
        return Overtimes::with(['employees:name,id'])->get();
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'employee_id' => ['required', 'integer', 'exists:employees,id'],
            'date' => ['required', 'date', Rule::notIn(Overtimes::where('employee_id', $request->employee_id)->pluck('date'))],
            'time_started' => ['required', 'date_format:HH:mm', 'lt:'.$request->time_ended.'', new OvertimeDateRule($request->date, $request->time_started, $request-employee_id)],
            'time_ended' => ['required', 'date_format:HH:mm', 'gt:'.$request->time_started.'', new OvertimeEndDateRule($request->date, $request->time_ended, $request-employee_id)]
        ]);

        if($validator->fails())
        {
            return response()->json($validator->messages(), 400);
        }

        $employees = Overtimes::create($request->all());

        return response()->json($employees, 201);
    }
}
