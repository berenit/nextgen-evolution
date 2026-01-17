<?php

namespace App\Models;


use Filament\Forms\Components\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IpClass extends Model
{
    // Forza il nome della tabella se non segue lo standard pluralizzato
    protected $table = 'ip_classes';

    // Se la tua chiave primaria non si chiama 'id'
    protected $primaryKey = 'id';

    protected $fillable = [
        'cidr',
        'description',
        'vlan_id',
    ];

    public function Vlan(): BelongsTo
    {
        return $this->belongsTo(Vlan::class);
    }

}
