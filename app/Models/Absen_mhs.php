<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen_mhs extends Model
{
    protected $fillable=['nip','nim','status_hadir'];
    protected $table='absen_mhs';

}
