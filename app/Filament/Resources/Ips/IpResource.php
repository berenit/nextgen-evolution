<?php

namespace App\Filament\Resources\Ips;

use App\Filament\Resources\Ips\Pages\CreateIp;
use App\Filament\Resources\Ips\Pages\EditIp;
use App\Filament\Resources\Ips\Pages\ListIps;
use App\Filament\Resources\Ips\Pages\ViewIp;
use App\Filament\Resources\Ips\Schemas\IpForm;
use App\Filament\Resources\Ips\Schemas\IpInfolist;
use App\Filament\Resources\Ips\Tables\IpsTable;
use App\Models\Ip;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class IpResource extends Resource
{
    protected static ?string $model = Ip::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::QueueList;

    protected static ?int $navigationSort = 1;

    public static function getNavigationLabel(): string
    {
        return __('Indirizzi IP');
    }

    public static function getBreadcrumb(): string
    {
        return __('Indirizzi IP');
    }

    public static function form(Schema $schema): Schema
    {
        return IpForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return IpInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return IpsTable::configure($table);
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
            'index' => ListIps::route('/'),
            // 'create' => CreateIp::route('/create'),
            'view' => ViewIp::route('/{record}'),
            'edit' => EditIp::route('/{record}/edit'),
        ];
    }
}
