<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $table = 'skills';  // pastikan nama tabel jamak (skills)

    protected $fillable = ['nama', 'foto', 'deskripsi'];
}