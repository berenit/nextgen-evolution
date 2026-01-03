<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PrivateIp extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ip',
        'description',
        'macAddress',
        'ip_class_id',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'id' => 'integer',
            'ip_class_id' => 'integer',
        ];
    }

    public function IpClass(): BelongsTo
    {
        return $this->belongsTo(IpClass::class);
    }

    public function hostnames(): HasMany
    {
        return $this->hasMany(Hostname::class);
    }
}
