<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }

    protected function beforeSave(): void
    {
        if ($this->data['password'] !== $this->data['password_confirmation']) {
            Notification::make()
                ->warning()
                ->title(__("I campi password non corrispondono!"))
                ->body(__("Verifica che la password e la sua conferma corrispondano."))
                ->send();

            $this->halt();
        }
    }
}
