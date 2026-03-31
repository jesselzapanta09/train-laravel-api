<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('trains', function (Blueprint $table) {
            $table->id();
            $table->string('train_name', 150);
            $table->decimal('price', 10, 2);
            $table->string('route', 255);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });

        // Insert data
        DB::table('trains')->insert([
            [
                'id' => 1,
                'train_name' => 'LRT Line 1',
                'price' => 20.00,
                'route' => 'Baclaran - Fernando Poe Jr. Station',
                'created_at' => '2026-03-16 13:56:58',
                'updated_at' => '2026-03-23 12:50:37',
            ],
            [
                'id' => 2,
                'train_name' => 'LRT Line 2',
                'price' => 25.00,
                'route' => 'Recto - Antipolo',
                'created_at' => '2026-03-16 13:56:58',
                'updated_at' => '2026-03-23 12:50:27',
            ],
            [
                'id' => 3,
                'train_name' => 'MRT Line 3',
                'price' => 24.00,
                'route' => 'North Avenue - Taft Avenue',
                'created_at' => '2026-03-16 13:56:58',
                'updated_at' => '2026-03-23 12:50:19',
            ],
            [
                'id' => 4,
                'train_name' => 'PNR Metro Commuter Line',
                'price' => 30.00,
                'route' => 'Tutuban - Alabang',
                'created_at' => '2026-03-16 13:56:58',
                'updated_at' => '2026-03-23 12:50:06',
            ],
            [
                'id' => 5,
                'train_name' => 'PNR Bicol Express',
                'price' => 450.00,
                'route' => 'Manila - Naga',
                'created_at' => '2026-03-16 13:56:58',
                'updated_at' => '2026-03-23 12:49:59',
            ],
            [
                'id' => 6,
                'train_name' => 'PNR Mayon Limited',
                'price' => 500.00,
                'route' => 'Manila - Legazpi',
                'created_at' => '2026-03-16 13:56:58',
                'updated_at' => '2026-03-23 12:49:49',
            ],
            [
                'id' => 7,
                'train_name' => 'LRT Cavite Extension',
                'price' => 35.00,
                'route' => 'Baclaran - Niog',
                'created_at' => '2026-03-16 13:56:58',
                'updated_at' => '2026-03-23 12:49:44',
            ],
            [
                'id' => 8,
                'train_name' => 'MRT Line 7',
                'price' => 28.00,
                'route' => 'North Avenue - San Jose del Monte',
                'created_at' => '2026-03-16 13:56:58',
                'updated_at' => '2026-03-23 12:49:34',
            ],
            [
                'id' => 9,
                'train_name' => 'North–South Commuter Railway',
                'price' => 60.00,
                'route' => 'Clark - Calamba',
                'created_at' => '2026-03-16 13:56:58',
                'updated_at' => '2026-03-23 12:48:57',
            ],
            [
                'id' => 10,
                'train_name' => 'Metro Manila Subway',
                'price' => 35.00,
                'route' => 'Valenzuela - NAIA Terminal 3',
                'created_at' => '2026-03-16 13:56:58',
                'updated_at' => '2026-03-23 12:48:51',
            ],
            [
                'id' => 11,
                'train_name' => 'PNR South Long Haul',
                'price' => 800.00,
                'route' => 'Manila - Matnog',
                'created_at' => '2026-03-16 13:56:58',
                'updated_at' => '2026-03-23 12:48:40',
            ],
            [
                'id' => 12,
                'train_name' => 'Clark Airport Express',
                'price' => 120.00,
                'route' => 'Clark Airport - Manila',
                'created_at' => '2026-03-16 13:56:58',
                'updated_at' => '2026-03-23 12:48:28',
            ],
            [
                'id' => 13,
                'train_name' => 'Mindanao Railway Phase 1',
                'price' => 50.00,
                'route' => 'Tagum - Davao - Digos',
                'created_at' => '2026-03-16 13:56:58',
                'updated_at' => '2026-03-23 12:48:14',
            ],
            [
                'id' => 14,
                'train_name' => 'Panay Rail Revival',
                'price' => 40.00,
                'route' => 'Iloilo - Roxas City',
                'created_at' => '2026-03-16 13:56:58',
                'updated_at' => '2026-03-23 12:48:03',
            ],
            [
                'id' => 15,
                'train_name' => 'Cebu Monorail',
                'price' => 25.00,
                'route' => 'Cebu City - Mactan Airport',
                'created_at' => '2026-03-16 13:56:58',
                'updated_at' => '2026-03-23 12:47:48',
            ],
            [
                'id' => 16,
                'train_name' => 'OZ-TRAIN',
                'price' => 50.00,
                'route' => 'Ozamiz - Tangub',
                'created_at' => '2026-03-21 14:36:34',
                'updated_at' => '2026-03-23 12:47:27',
            ],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('trains');
    }
};