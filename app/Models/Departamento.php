<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;
    
    protected $table = 'departamento';
    
    protected $fillable = ['idempleadojefe', 'name', 'location'];
    
    protected $attributes = ['idempleadojefe' => null];
    
    public function empleados () {
        return $this->hasMany('App\Models\Empleado', 'iddepartamento');
    }
    
}
