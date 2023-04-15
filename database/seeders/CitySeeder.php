<?php

declare(strict_types=1);

namespace Concatenate\IndonesianRegions\Database\Seeders;

use Concatenate\IndonesianRegions\Models\AreaCity;
use Concatenate\IndonesianRegions\Models\AreaProvince;
use Illuminate\Database\Seeder;
use Jawira\CaseConverter\CaseConverterException;
use Jawira\CaseConverter\Convert;
use ParseCsv\Csv;

class CitySeeder extends Seeder
{
    /**
     * @throws CaseConverterException
     */
    public function run(): void
    {
        $file = __DIR__.'/../../data/cities.csv';

        $csv = new Csv();
        $csv->delimiter = ';';
        $csv->parseFile($file);

        foreach ($csv->data as $row) {
            $province = AreaProvince::where('code', $row['province_id'])->first();

            $city = AreaCity::firstOrNew(['code' => $row['id']]);
            $city->province()->associate($province);
            $city->code = $row['id'];
            $city->name = (new Convert($row['name']))->toTitle();
            $city->save();
        }
    }
}
