<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDomainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('domains', function (Blueprint $table) {
            $table->increments('id');
            $table->string('domain', 255)->unique();
            $table->string('tenant_id');

            $table->timestamps();
            $table->foreign('tenant_id')->references('id')->on('tenants')->onUpdate('cascade')->onDelete('cascade');
        });

        // Insert initial data
        DB::table('domains')->insert([
            [
                'domain' => 'test.localhost',
                'tenant_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'domain' => 'complete.localhost',
                'tenant_id' => '2',
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
        Schema::dropIfExists('domains');
    }
}
