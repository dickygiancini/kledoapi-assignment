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
*    @OA\Get(
*     path="/overtime",
*     description="List Overtimes",
*     @OA\Response(response="default", description="Menampilkan semua informasi Overtimes yang ada dari seluruh employees")
*    )
*    @OA\Post(
*     path="/overtime",
*     description="Save Overtimes",
*     @OA\Response(response="default", description="Melakukan POST untuk menyimpan data Overtimes employee")
*    )
*    @OA\Get(
*     path="/overtime-pays/calculate",
*     description="List Kalkulasi Overtime Employee",
*     @OA\Response(response="default", description="Menampilkan hasil dari kalkulasi overtime dari employee yang telah mengajukan")
*    )
*    @OA\Patch(
*     path="/settings",
*     description="Edit Settings",
*     @OA\Response(response="default", description="Mengubah data yang ada pada tabel settings")
*    )
*/

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
