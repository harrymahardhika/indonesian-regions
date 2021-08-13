<?php

namespace Concatenate\IndonesianRegions\Database\Seeders;

use Concatenate\IndonesianRegions\Models\AreaCity;
use Concatenate\IndonesianRegions\Models\AreaDistrict;
use Illuminate\Database\Seeder;
use Jawira\CaseConverter\CaseConverterException;
use Jawira\CaseConverter\Convert;
use ParseCsv\Csv;

class DistrictSeeder extends Seeder
{
    /**
     * @throws CaseConverterException
     */
    public function run()
    {
        $file = __DIR__.'/../../data/districts.csv';

        $csv = new Csv();
        $csv->delimiter = ';';
        $csv->parseFile($file);

        foreach ($csv->data as $row) {
            $city = AreaCity::where('code', $row['city_id'])->first();

            $district = AreaDistrict::firstOrNew(['code' => $row['id']]);
            $district->city()->associate($city);
            $district->code = $row['id'];
            $district->name = (new Convert($row['name']))->toTitle();
            $district->save();
        }
    }
}
