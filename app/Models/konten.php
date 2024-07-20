<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class konten extends Model
{
    use HasFactory;

    protected $fillable = [
        // Kolom lain yang bisa diisi secara massal
        'nama', 'video', 'created_by'
    ];

    // Relasi ke model User
    public function createdByUser()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
