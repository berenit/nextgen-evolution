<?php

namespace App\Filament\Resources\IpClasses;

use App\Filament\Resources\IpClasses\Pages\CreateIpClass;
use App\Filament\Resources\IpClasses\Pages\EditIpClass;
use App\Filament\Resources\IpClasses\Pages\ListIpClasses;
use App\Filament\Resources\IpClasses\Pages\ViewIpClass;
use App\Filament\Resources\IpClasses\Schemas\IpClassForm;
use App\Filament\Resources\IpClasses\Schemas\IpClassInfolist;
use App\Filament\Resources\IpClasses\Tables\IpClassesTable;
use App\Models\IpClass;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class IpClassResource extends Resource
{
    protected static ?string $model = IpClass::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function getNavigationLabel(): string
    {
        return __('Classi IP');
    }

    public static function form(Schema $schema): Schema
    {
        return IpClassForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return IpClassInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return IpClassesTable::configure($table);
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
            'index' => ListIpClasses::route('/'),
            'create' => CreateIpClass::route('/create'),
            'view' => ViewIpClass::route('/{record}'),
            'edit' => EditIpClass::route('/{record}/edit'),
        ];
    }
}
