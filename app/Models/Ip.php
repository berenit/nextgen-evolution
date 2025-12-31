<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ip extends Model
{
    /** @use HasFactory<\Database\Factories\IpFactory> */
    use HasFactory;

    protected $fillable = [
        'ip_class_id',
        'address',
        'hostname'
    ];
}
