<?php

namespace App\Filament\Resources\IpClasses\Pages;

use App\Filament\Resources\IpClasses\IpClassResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListIpClasses extends ListRecords
{
    protected static string $resource = IpClassResource::class;

    public function getTitle(): string
    {
        return __("Elenco Classi IP");
    }

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
