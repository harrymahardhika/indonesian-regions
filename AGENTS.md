# AGENTS.md

Laravel package (`harrym/indonesian-regions`): Indonesian administrative regions (Provinsi → Kota/Kabupaten → Kecamatan → Kelurahan/Desa) as Eloquent models, seeders, and CSV data. Namespace `HarryM\IndonesianRegions` (PSR-4, `src/`). See `GEMINI.md` for the project overview; `CONTRIBUTING.md` for PR requirements.

## Commands

- `composer test` → `vendor/bin/pest`
- `composer pint` → `vendor/bin/pint` (formatter; auto-fixes in place, laravel preset + custom rules in `pint.json`)
- `composer rector` → `vendor/bin/rector process` (refactors files in place — not a dry run)
- `vendor/bin/phpstan analyze` — there is **no** composer script for PHPStan; don't guess `composer analyse`/`stan`
- After changes, verify in this order: `composer pint` → `vendor/bin/phpstan analyze` → `composer rector` → `composer test`. CI (`test.yml`) only runs `vendor/bin/pest`.

## Testing

- Testbench ^10 ⇒ Laravel 12; tests use an in-memory SQLite connection configured in `tests/TestCase.php` — no DB service or `php artisan` needed, always `vendor/bin/pest`.
- `tests/SeedingTest.php` seeds real CSVs; the subdistrict case alone takes ~25s (whole suite ~30s). Use `vendor/bin/pest --filter=Seeding` (or `--filter=Models`) for focused runs.
- New features/bugfixes require Pest tests (CONTRIBUTING.md).

## Data & seeding pipeline

- `data/*.csv` are `;`-delimited with quoted names; first line is the header row. Subdistricts is ~80k rows, so seeders bulk-`upsert` in chunks of 1000.
- Seeder call order is strictly FK-dependent: Province → City → District → Subdistrict. `RegionSeeder` gates each via config flags; `enable_subdistricts` defaults to `false` (slowest).
- CSV headers the seeders read: cities `id;province_id;name`, districts `id;regency_id;name` (DistrictSeeder maps `regency_id` → `city_id`), subdistricts `id;district_id;name`.
- `bin/getcsv` refreshes CSVs from an upstream GitHub repo, but runs BSD-style `sed -i ''` (misbehaves on Linux, and would rename the districts header to `city_id`, conflicting with `DistrictSeeder`). Don't run it blindly.

## Architecture notes

- 4 model levels in `src/Models/` (`AreaProvince` → `AreaCity` → `AreaDistrict` → `AreaSubdistrict`); `code` is a unique string; relationships use explicit FK columns (`province_id`, `city_id`, `district_id`).
- Models carry large ide-helper docblocks — regenerate with `build_helper` (runs `artisan ide-helper` from a host app) rather than hand-writing them.
- `src/DataTransferObjects/` are spatie/laravel-data `Area...Data` classes. `src/IndonesianRegions.php` is the service behind the `IndonesianRegions` facade (currently a stub).
- Migrations use fixed `2021_01_01_00000N` timestamps to keep publish order stable in host apps — preserve this scheme when adding tables.
- Publish tags: `indonesian-regions.config` and `indonesian-regions.stubs`.

## Conventions & constraints

- Every PHP file starts with `declare(strict_types=1);`. Pint enforces `global_namespace_import: false` (no `use` for global classes) and `yoda_style: true`.
- PHPStan runs at **level 8** with Larastan, but only over `src/` + `database/` — `tests/` are excluded from analysis.
- PHP floor is `^8.2`. pest/phpunit are deliberately pinned to v3/v11 (v4/v12+ require PHP 8.3+); testbench is ^10 (Laravel 12). Do not bump those majors without also raising the PHP floor.
- `config/indonesian-regions.php` controls which levels `RegionSeeder` seeds — check it before asserting seeder behavior.
