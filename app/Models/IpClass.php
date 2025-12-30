<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IpClass extends Model
{
    protected $fillable = ['cidr', 'label', 'vlan_id'];

    /** @use HasFactory<\Database\Factories\IpClassFactory> */
    use HasFactory;
}
