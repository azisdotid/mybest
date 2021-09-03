<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    protected $table='komentar_chat';
    protected $fillable=['id_chat','user_komentar','komentar'];
}
