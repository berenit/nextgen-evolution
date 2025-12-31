<?php

namespace App\Filament\Resources\Ips\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class IpForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('ip_class_id')
                    ->required()
                    ->numeric(),
                TextInput::make('address')
                    ->required()
                    ->ip(),
                TextInput::make('hostname')
                    ->required()
                    ->string(),
            ]);
    }
}
