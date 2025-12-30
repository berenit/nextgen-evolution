<?php

namespace App\Filament\Resources\Ips\Pages;

use App\Filament\Resources\Ips\IpResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditIp extends EditRecord
{
    protected static string $resource = IpResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
