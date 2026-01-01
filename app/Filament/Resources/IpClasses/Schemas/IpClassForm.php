<?php

namespace App\Filament\Resources\IpClasses\Schemas;

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
                TextInput::make('label'),
                TextInput::make('vlan_id')
                    ->required()
                    ->numeric(),
            ]);
    }
}
