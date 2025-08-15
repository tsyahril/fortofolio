<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{
    protected $table = "Informasi";
    protected $fillable = [
        'foto',
        'nama',
        'pekerjaan',
        'no_telpon',
        'email',
        'deskripsi',
    ];

}
