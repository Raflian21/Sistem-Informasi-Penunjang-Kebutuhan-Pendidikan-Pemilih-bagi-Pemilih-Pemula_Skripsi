<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sejarah extends Model
{
    use HasFactory;

    protected $fillable = [
        // Kolom lain yang bisa diisi secara massal
        'jenis', 'tahunpemilu', 'jumlahpartai', 'totalsuara', 'suaradimenangkan', 'presiden', 'wakilpresiden', 'foto', 'linkpartai','created_by' 
    ];

    // Relasi ke model User
    public function createdByUser()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
