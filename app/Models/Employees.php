<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;

    protected $table = 'employees';
    protected $guarded = [];

    public function status()
    {
        return $this->belongsTo('App\Models\References', 'status_id', 'id');
    }

    public function overtime()
    {
        return $this->hasMany('App\Models\Overtimes', 'employee_id', 'id');
    }

    public function scopeOvertimes($query, $id)
    {
        return $query->where('employee_id', $id);
    }
}
