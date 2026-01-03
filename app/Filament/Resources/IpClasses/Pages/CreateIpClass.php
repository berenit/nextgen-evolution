<?php

namespace App\Filament\Resources\IpClasses\Pages;

use App\Filament\Resources\IpClasses\IpClassResource;
use Filament\Resources\Pages\CreateRecord;
use App\Models\privateIp;
use Illuminate\Support\Facades\Log;

class CreateIpClass extends CreateRecord
{
    protected static string $resource = IpClassResource::class;

    protected function afterCreate(): void
    {
        // Eseguiamo il calcolo in un processo separato per non rallentare l'utente
        $record = $this->record;
        $this->generateAndStoreIps($record);
    }

    private function generateAndStoreIps($record): void
    {

        Log::info('Generazione indirizzi IP avviata', [
            'user_id' => auth()->id(),
            'cidr' => $record->cidr,
        ]);

        [$subnet, $mask] = explode('/', $record->cidr);
        $start = ip2long($subnet);
        $count = pow(2, (32 - (int)$mask));

        // Chunking per evitare di saturare la memoria con milioni di IP
        $batchSize = 1000;
        $data = [];

        for ($i = 1; $i < $count - 1; $i++) {
            $data[] = [
                'ip_class_id' => $record->id,
                'ip' => long2ip($start + $i),
                'created_at' => now(),
                'updated_at' => now(),
            ];

            if (count($data) >= $batchSize) {
                privateIp::insert($data);
                $data = [];
            }
        }

        if (!empty($data)) {
            privateIp::insert($data);
        }
    }
}
