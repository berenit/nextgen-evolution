<?php

namespace App\Filament\Resources\IpClasses\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class IpClassForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('cidr')
                    ->required(),
                    //->rules(['ipv4', 'regex:/^\d{1,3}(\.\d{1,3}){3}\/\d{1,2}$/']),
                TextInput::make('description'),
                Select::make('vlan_id') // Il campo sulla tua tabella IP
                    ->label('Classe di Rete')
                    ->relationship('Vlan', 'vlan') // 1. Nome relazione nel Model, 2. Colonna da mostrare
                    ->searchable() // Rende il campo ricercabile (consigliato)
                    ->preload()    // Carica le opzioni all'apertura (ottimo per liste non enormi)
                    ->required(),
            ]);
    }
}
