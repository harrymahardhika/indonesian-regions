<?php

namespace Concatenate\IndonesianRegions\Database\Seeders;

use Concatenate\IndonesianRegions\Models\AreaProvince;
use Illuminate\Database\Seeder;
use Jawira\CaseConverter\CaseConverterException;
use Jawira\CaseConverter\Convert;
use ParseCsv\Csv;

class ProvinceSeeder extends Seeder
{
    /**
     * @throws CaseConverterException
     */
    public function run()
    {
        $file = __DIR__.'/../../data/provinces.csv';

        $csv = new Csv();
        $csv->delimiter = ';';
        $csv->parseFile($file);

        foreach ($csv->data as $row) {
            $province = AreaProvince::firstOrNew(['code' => $row['id']]);
            $province->code = $row['id'];
            $name = 'DKI JAKARTA' === $row['name'] ? 'DKI Jakarta' : (new Convert($row['name']))->toTitle();
            $province->name = $name;
            $province->save();
        }
    }
}
