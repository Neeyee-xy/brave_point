<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Tables restored from database/seeders/data/{table}.json,
     * in insertion order.
     */
    protected array $tables = [
        'users',
        'categories',
        'products',
        'deliveries',
        'carts',
        'orders',
        'transactions',
        'notifications',
        'blogs',
        'blogsettings',
        'home_page_settings',
        'settings',
        'subscriptions',
    ];

    /**
     * Seed the application's database from the JSON snapshot.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        foreach ($this->tables as $table) {
            $path = database_path("seeders/data/{$table}.json");

            if (! file_exists($path)) {
                $this->command?->warn("Skipping {$table}: {$path} not found");

                continue;
            }

            $rows = json_decode(file_get_contents($path), true) ?? [];

            DB::table($table)->truncate();

            foreach (array_chunk($rows, 200) as $chunk) {
                DB::table($table)->insert($chunk);
            }

            $this->command?->info("Seeded {$table} (".count($rows).' rows)');
        }

        Schema::enableForeignKeyConstraints();
    }
}
