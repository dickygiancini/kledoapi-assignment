<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Models\Employees;
use App\Models\Overtimes;

class OvertimeCalculationController extends Controller
{
    //
    public function index()
    {
        $employees = Employees::with(['status:id,name', 'overtime' => function($query){
            $query->join('employees', 'employees.id', '=', 'overtimes.employee_id')
            ->join('references', 'references.id', 'employees.status_id')
            ->selectRaw('overtimes.*,
            CASE WHEN references.id = 4 AND TIME_TO_SEC(TIMEDIFF(overtimes.time_ended,overtimes.time_started)) <= 7200 THEN 0
            WHEN references.id = 4 AND (TIME_TO_SEC(overtimes.time_ended-overtimes.time_started)/3600 BETWEEN TIME_TO_SEC(overtimes.time_ended-overtimes.time_started)/3600 - 1 AND TIME_TO_SEC(overtimes.time_ended-overtimes.time_started)/3600 + 1) THEN CAST(TIME_TO_SEC(overtimes.time_ended-overtimes.time_started)/3600 - 1 AS UNSIGNED)
            ELSE ROUND(TIME_TO_SEC(overtimes.time_ended-overtimes.time_started)/3600) END as overtime_duration');
        }])->get();

        return $employees;
    }
}
