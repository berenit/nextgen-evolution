<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Models\Ip;
use App\Models\IpClass;

class GenerateIpAddresses implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public IpClass $ipClass)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        [$subnet, $mask] = explode('/', $this->ipClass->cidr);
        $start = ip2long($subnet);
        $count = pow(2, (32 - (int)$mask));

        $batchSize = 1000;
        $data = [];

        // Saltiamo network e broadcast address (.0 e .255 per una /24)
        for ($i = 1; $i < $count - 1; $i++) {
            $data[] = [
                'ip_class_id' => $this->ipClass->id,
                'address' => long2ip($start + $i),
                'hostname' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            if (count($data) >= $batchSize) {
                Ip::insert($data);
                $data = [];
            }
        }

        if (!empty($data)) {
            Ip::insert($data);
        }
    }
}
