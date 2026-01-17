<?php

namespace App\Filament\Resources\Ips\Pages;

use App\Filament\Resources\Ips\IpResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListIps extends ListRecords
{
    protected static string $resource = IpResource::class;
    public function getTitle(): string
    {
        return __("Elenco indirizzi IP privati");
    }

    public function getBreadcrumb(): string
    {
        return __("Elenco indirizzi IP privati");
    }
    protected function getHeaderActions(): array
    {
        return [
            // CreateAction::make(),
        ];
    }
}
