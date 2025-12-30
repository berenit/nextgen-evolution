<?php

namespace App\Filament\Resources\Ips\Pages;

use App\Filament\Resources\Ips\IpResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewIp extends ViewRecord
{
    protected static string $resource = IpResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
