<?php

namespace App\Filament\Resources\Ips\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class IpInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('ip_class_id')
                    ->numeric(),
                TextEntry::make('address'),
                TextEntry::make('hostname'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
