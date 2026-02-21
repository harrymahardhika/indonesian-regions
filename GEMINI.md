# Indonesian Regions

A lightweight and modern Indonesian Region Database (Provinsi, Kota/Kabupaten, Kecamatan, Kelurahan/Desa) package for Laravel.

## Project Overview

- **Main Technologies:** PHP 8.2+, Laravel (Eloquent), `spatie/laravel-data`.
- **Architecture:**
    - **Models:** Eloquent models in `src/Models/` representing the four levels of administrative regions: `AreaProvince`, `AreaCity`, `AreaDistrict`, and `AreaSubdistrict`.
    - **Relationships:** Hierarchical relationships are defined between models (e.g., `AreaProvince` has many `AreaCity`).
    - **Data Source:** Raw CSV data stored in `data/`.
    - **Seeding:** High-performance seeders in `database/seeders/` that handle bulk upserts from CSV data.
    - **Integration:** Integrated into Laravel via `IndonesianRegionsServiceProvider` and `IndonesianRegions` facade.

## Building and Running

### Development Environment
1.  Install dependencies:
    ```bash
    composer install
    ```

### Testing
- Run the test suite:
  ```bash
  composer test
  ```

### Static Analysis and Linting
- Linting with Laravel Pint:
  ```bash
  composer pint
  ```
- Refactoring with Rector:
  ```bash
  composer rector
  ```
- Static Analysis with PHPStan/Larastan:
  ```bash
  vendor/bin/phpstan analyze
  ```

### Usage in Laravel (Local Integration)
After installing the package in a Laravel application:
1.  Publish assets:
    ```bash
    php artisan vendor:publish --provider="HarryM\IndonesianRegions\IndonesianRegionsServiceProvider"
    ```
2.  Run migrations:
    ```bash
    php artisan migrate
    ```
3.  Seed the database:
    ```bash
    php artisan db:seed --class="HarryM\IndonesianRegions\Database\Seeders\RegionSeeder"
    ```

## Development Conventions

- **Strict Typing:** All PHP files must include `declare(strict_types=1);`.
- **Formatting:** Adhere to Laravel Pint standards (configured in `pint.json`).
- **Testing:** New features or bug fixes must include tests using Pest, following the structure in `tests/`.
- **Migrations:** All database changes must be included in `database/migrations/`.
- **Data Transfer Objects:** Use `Area...Data` classes in `src/DataTransferObjects/` for structured data handling.
- **Model Docblocks:** Maintain comprehensive IDE helper docblocks on models for better developer experience.
