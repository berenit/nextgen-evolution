<?php

namespace App\Filament\Resources\Ips\Schemas;

use Filament\Actions\Action;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Textarea;
class IpForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('macAddress')
                    ->label(__('Indirizzo MAC'))
                    ->string()
                    ->unique()
                    ->live() // Opzionale: aggiorna lo stato in tempo reale
                    ->suffixAction(
                        Action::make('clear')
                            ->icon('heroicon-m-x-mark') // Icona di una "X"
                            ->color('danger')
                            ->action(function (TextInput $component) {
                                $component->state(null); // Cancella il contenuto
                            })),
                Repeater::make('hostnames')
                    ->addActionLabel('Aggiungi un hostname')
                    ->relationship('hostnames') // Nome del metodo nel modello Ip
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('name')
                            ->label(__('Hostname'))
                            ->required(),
                    ])
                    ->columnSpanFull()
                    ->itemLabel(fn (array $state): ?string => $state['name'] ?? null)
                    ->collapsible() // Ottimo per l'UX se hai molti hostname
                    ->defaultItems(1), // Parte con un campo già pronto
                Textarea::make('description')
                    ->label(__('Note'))
                    ->columnSpanFull(),
            ]);
    }
}
