# Indonesian Regions

[![Latest Version on Packagist](https://img.shields.io/packagist/v/harrym/indonesian-regions.svg?style=flat-square)](https://packagist.org/packages/harrym/indonesian-regions)
[![Total Downloads](https://img.shields.io/packagist/dt/harrym/indonesian-regions.svg?style=flat-square)](https://packagist.org/packages/harrym/indonesian-regions)
[![License](https://img.shields.io/packagist/l/harrym/indonesian-regions.svg?style=flat-square)](https://packagist.org/packages/harrym/indonesian-regions)

A fast, lightweight, and modern Indonesian Region Database (Provinsi, Kota/Kabupaten, Kecamatan, Kelurahan/Desa) package for Laravel.

## Installation

You can install the package via composer:

```bash
composer require harrym/indonesian-regions
```

After installation, publish the database migrations and configuration:

```bash
php artisan vendor:publish --provider="HarryM\IndonesianRegions\IndonesianRegionsServiceProvider"
```

Then run the migrations to create the required tables:

```bash
php artisan migrate
```

Finally, seed the regions database (this process handles bulk upserts securely and efficiently):

```bash
php artisan db:seed --class="HarryM\IndonesianRegions\Database\Seeders\RegionSeeder"
```

## Structure

The provided datasets contain data mapped into four levels of regions:

- `AreaProvince` (Provinces)
- `AreaCity` (Cities & Regencies / Kota & Kabupaten)
- `AreaDistrict` (Districts / Kecamatan)
- `AreaSubdistrict` (Subdistricts & Villages / Kelurahan & Desa)

## Usage

All Area models use Laravel's standard Eloquent system. You can interact with them statically or via relationships:

```php
use HarryM\IndonesianRegions\Models\AreaProvince;
use HarryM\IndonesianRegions\Models\AreaCity;

// Get all provinces
$provinces = AreaProvince::all();

// Get the cities of a specific province using relationship
$province = AreaProvince::where('name', 'DKI JAKARTA')->first();
$jakartaCities = $province->cities;

// Get the district associated with a city
$city = AreaCity::where('name', 'KOTA JAKARTA SELATAN')->first();
$districts = $city->districts;

// Get subdistricts of a specific district
$district = $city->districts()->first();
$subdistricts = $district->subdistricts;
```

## Testing

```bash
composer test
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
