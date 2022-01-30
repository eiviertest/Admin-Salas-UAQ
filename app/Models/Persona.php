<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $primaryKey = 'idPer';

    protected $fillable = [
        'nomPer',
        'apePatPer',
        'apeMatPer',
        'telPer',
        'idArea'
    ];
}
