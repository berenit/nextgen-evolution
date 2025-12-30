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
                TextInput::make('label'),
                TextInput::make('vlan_id')
                    ->required()
                    ->numeric(),
            ]);
    }
}
