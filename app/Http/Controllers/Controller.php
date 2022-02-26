<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
*    @OA\Info(title="Dicky KledoAPI", version="1.0.0")
*    @OA\Get(
*     path="/employees",
*     description="List Employees",
*     @OA\Response(response="default", description="Menampilkan semua informasi employees yang ada pada database")
*    )
*    @OA\Post(
*     path="/employees",
*     description="Save Employees",
*     @OA\Response(response="default", description="Melakukan POST untuk menyimpan data employees")
*    )
*/

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
