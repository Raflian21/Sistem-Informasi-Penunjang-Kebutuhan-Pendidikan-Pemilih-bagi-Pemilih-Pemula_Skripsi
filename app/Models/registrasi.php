<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class registrasi extends Model
{
    use HasFactory;

    protected $fillable = [
        // Kolom lain yang bisa diisi secara massal
        'name', 'foto', 'email', 'username', 'password'
    ];
}
