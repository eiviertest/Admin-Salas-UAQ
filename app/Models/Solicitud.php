<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;

    protected $table = 'solicitud';

    protected $primaryKey = 'idSolicitud';

    protected $fillable = [
        'rutaSol',
        'idSal',
        'idPer',
        'idEst'
    ];
}
