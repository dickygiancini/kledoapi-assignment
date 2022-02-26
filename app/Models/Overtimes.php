<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Overtimes extends Model
{
    use HasFactory;

    protected $table = 'overtimes';
    protected $guarded = [];

    public function employees()
    {
        return $this->belongsTo('App\Models\Employees', 'employee_id', 'id');
    }
}
