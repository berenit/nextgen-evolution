<?php

namespace App\Filament\Resources\IpClasses\Pages;

use App\Filament\Resources\IpClasses\IpClassResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditIpClass extends EditRecord
{
    protected static string $resource = IpClassResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
