<?php

declare(strict_types=1);

namespace HarryM\IndonesianRegions\Database\Seeders;

use HarryM\IndonesianRegions\Models\AreaDistrict;
use HarryM\IndonesianRegions\Models\AreaSubdistrict;
use Illuminate\Database\Seeder;

class SubdistrictSeeder extends Seeder
{
    public function run(): void
    {
        $file = __DIR__.'/../../data/subdistricts.csv';

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
        $districts = AreaDistrict::pluck('id', 'code');
        $data = [];
        $now = now()->toDateTimeString();

        while (($row = fgetcsv($handle, 0, ';')) !== false) {
            $row = array_combine($headers, $row);
            $data[] = [
                'code' => $row['id'],
                'district_id' => $districts[$row['district_id']] ?? null,
                'name' => $row['name'],
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        foreach (array_chunk($data, 1000) as $chunk) {
            AreaSubdistrict::upsert($chunk, ['code'], ['district_id', 'name', 'updated_at']);
        }

        fclose($handle);
    }
}
