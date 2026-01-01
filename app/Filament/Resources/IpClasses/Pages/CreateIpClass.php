<?php

namespace App\Filament\Resources\IpClasses\Pages;

use App\Filament\Resources\IpClasses\IpClassResource;
use Filament\Resources\Pages\CreateRecord;
use App\Models\Ip;
use Illuminate\Support\Facades\Concurrency;

class CreateIpClass extends CreateRecord
{
    protected static string $resource = IpClassResource::class;

    protected function afterCreate(): void
    {
        $record = $this->record;

        // Eseguiamo il calcolo in un processo separato per non rallentare l'utente

        $this->generateAndStoreIps($record);

    }

    private function generateAndStoreIps($record): void
    {

        [$subnet, $mask] = explode('/', $record->cidr);
        $start = ip2long($subnet);
        $count = pow(2, (32 - (int)$mask));

        // Chunking per evitare di saturare la memoria con milioni di IP
        $batchSize = 1000;
        $data = [];

        for ($i = 1; $i < $count - 1; $i++) {
            $data[] = [
                'ip_class_id' => $record->id,
                'address' => long2ip($start + $i),
                'hostname' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            if (count($data) >= $batchSize) {
                IP::insert($data);
                $data = [];
            }
        }

        if (!empty($data)) {
            IP::insert($data);
        }
    }
}
