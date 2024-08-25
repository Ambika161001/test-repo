<?php

declare(strict_types=1);

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->string('id')->primary();

            // your custom columns may go here

            $table->timestamps();
            $table->json('data')->nullable();
        });

        // Insert initial data
        DB::table('tenants')->insert([
            [
                'id' => '1',
                'data' => json_encode(['name' => 'Tenant 1']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '2',
                'data' => json_encode(['name' => 'Tenant 2']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('tenants');
    }
}
