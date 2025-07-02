<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedores extends Model
{
    use HasFactory;

    protected $table = 'proveedores';

    protected $fillable = [
        'nombre',
        'upc'
    ];

    // Relación con Categorias
    public function categorias()
    {
        return $this->hasMany(Categoria::class, 'proveedor_id');
    }

    public static $rules = [
        'nombre' => 'required|string|max:255',
        'upc' => 'required|string|max:20|unique:proveedores,upc'
    ];
}