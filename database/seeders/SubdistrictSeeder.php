<?php

namespace Concatenate\IndonesianRegions\Database\Seeders;

use Concatenate\IndonesianRegions\Models\AreaCity;
use Concatenate\IndonesianRegions\Models\AreaDistrict;
use Concatenate\IndonesianRegions\Models\AreaProvince;
use Concatenate\IndonesianRegions\Models\AreaSubdistrict;
use Illuminate\Database\Seeder;
use Jawira\CaseConverter\CaseConverterException;
use Jawira\CaseConverter\Convert;
use ParseCsv\Csv;

class SubdistrictSeeder extends Seeder
{
    /**
     * @throws CaseConverterException
     */
    public function run()
    {
        $file = __DIR__.'/../../data/subdistricts.csv';

        $csv = new Csv();
        $csv->delimiter = ';';
        $csv->parseFile($file);

        foreach ($csv->data as $row) {
            $district = AreaDistrict::where('code', $row['district_id'])->first();

            $subdistrict = AreaSubdistrict::firstOrNew(['code' => $row['id']]);
            $subdistrict->district()->associate($district);
            $subdistrict->code = $row['id'];
            $subdistrict->name = (new Convert($row['name']))->toTitle();
            $subdistrict->save();
        }
    }
}

