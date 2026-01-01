<?php

namespace App\Filament\Resources\Ips\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\IconColumn;

class IpsTable
{



    public static function configure(Table $table): Table
    {
        return $table
            ->contentGrid([
                'sm' => 3,
                'md' => 4,
                'lg' => 10, // Numero di colonne (N)
                '2xl' => 8,
            ])
            ->columns([
                Stack::make([
//                    IconColumn::make('status_icon') // Nome fittizio o campo db
//                        ->label('')
//                        ->icon('heroicon-s-squares-plus') // La tua icona
//                        ->color('primary')
//                        ->alignCenter()
//                        ->extraAttributes([
//                            // Rendiamo la cella un quadrato cliccabile
//                            'class' => 'aspect-square flex items-center justify-center cursor-pointer
//                                    hover:bg-primary-50 transition-colors border border-gray-100 rounded-xl',
//                        ]),

                    Tables\Columns\TextColumn::make('address')
                        ->size('xs')
                        ->weight('bold')
                        ->alignment('center')
                        ->color(fn ($record) => $record->hostname == null ? 'success' : 'danger')
                ]),
            ])
            ->filters([
                    SelectFilter::make('ip_class_id')
                        ->label('Classe IP')
                        ->options(
                            \App\Models\IpClass::all()->pluck('label', 'id')->toArray())
                ], layout: FiltersLayout::AboveContent)

            ->paginated([64, 128,
                200]); // Definisci quanti elementi per pagina
    }
}
