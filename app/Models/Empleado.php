<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    
    protected $table = 'empleado';
    
    protected $fillable = ['iddepartamento', 'idpuesto', 'name', 'surname', 'email', 'phone', 'datecontract'];
    
    protected $attributes = ['iddepartamento' => null, 'idpuesto' => null];
    
    public function departamento () {
        return $this->belongsTo('App\Models\Departamento', 'iddepartamento');
    }
    
    public function puesto () {
        return $this->belongsTo('App\Models\Puesto', 'idpuesto');
    }
    
}
