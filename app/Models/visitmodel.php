<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class visitmodel extends Model
{
    use HasFactory;
    protected $fillable = ['ip_address', 'visit_time', 'departure_time'];
}
