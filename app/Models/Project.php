<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = "project";
    protected $fillable = [
        'nama_project',
        'deskripsi',
        'link_project',
        'foto',
    ];
    public $timestamps = true;
}
