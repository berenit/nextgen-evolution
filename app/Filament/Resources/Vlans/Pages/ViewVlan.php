<?php

namespace App\Filament\Resources\Vlans\Pages;

use App\Filament\Resources\Vlans\VlanResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewVlan extends ViewRecord
{
    protected static string $resource = VlanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
