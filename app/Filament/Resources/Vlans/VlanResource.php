<?php

namespace App\Filament\Resources\Vlans;

use App\Filament\Resources\Vlans\Pages\CreateVlan;
use App\Filament\Resources\Vlans\Pages\EditVlan;
use App\Filament\Resources\Vlans\Pages\ListVlans;
use App\Filament\Resources\Vlans\Pages\ViewVlan;
use App\Filament\Resources\Vlans\Schemas\VlanForm;
use App\Filament\Resources\Vlans\Schemas\VlanInfolist;
use App\Filament\Resources\Vlans\Tables\VlansTable;
use App\Models\Vlan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class VlanResource extends Resource
{
    protected static ?string $model = Vlan::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function getNavigationLabel(): string
    {
        return __('VLAN');
    }

    public static function form(Schema $schema): Schema
    {
        return VlanForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return VlanInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return VlansTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListVlans::route('/'),
            'create' => CreateVlan::route('/create'),
            'view' => ViewVlan::route('/{record}'),
            'edit' => EditVlan::route('/{record}/edit'),
        ];
    }
}
