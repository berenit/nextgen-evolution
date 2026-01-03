<?php

namespace App\Filament\Resources\Vlans\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class VlanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('vlan')
                    ->required(),
                TextInput::make('description'),
            ]);
    }
}
