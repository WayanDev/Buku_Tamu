<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuTamu extends Model
{
    use HasFactory;
    protected $table='tamu';
    protected $fillable = ['nama', 'jenis_kelamin', 'alamat', 'kesan', 'pesan','image'];
}
