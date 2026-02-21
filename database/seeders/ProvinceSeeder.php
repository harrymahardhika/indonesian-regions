<?php

declare(strict_types=1);

namespace HarryM\IndonesianRegions\Database\Seeders;

use HarryM\IndonesianRegions\Models\AreaProvince;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    public function run(): void
    {
        $file = __DIR__.'/../../data/provinces.csv';
        $handle = fopen($file, 'rb');
        if (false === $handle) {
            throw new \RuntimeException("Failed to open file: {$file}");
        }

        // Read headers
        $headers = fgetcsv($handle, 0, ';');
        if (false === $headers) {
            fclose($handle);

            throw new \RuntimeException("Failed to read headers from file: {$file}");
        }

        /** @var array<int, string> $headers */
        $data = [];
        $now = now()->toDateTimeString();

        while (($row = fgetcsv($handle, 0, ';')) !== false) {
            $row = array_combine($headers, $row);
            $data[] = [
                'code' => $row['id'],
                'name' => $row['name'],
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        foreach (array_chunk($data, 1000) as $chunk) {
            AreaProvince::upsert($chunk, ['code'], ['name', 'updated_at']);
        }

        fclose($handle);
    }
}
