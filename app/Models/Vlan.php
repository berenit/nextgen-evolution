<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vlan extends Model
{
    /** @use HasFactory<\Database\Factories\VlanFactory> */
    use HasFactory;

    protected $fillable = ['address'];
}
