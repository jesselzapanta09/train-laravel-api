<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username', 100)->unique();
            $table->string('email', 150)->unique();
            $table->string('password');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });

        // Insert data using Laravel query builder
        DB::table('users')->insert([
            [
                'id' => 1,
                'username' => 'Jessel Zapanta',
                'email' => 'jesselzapanta@gmail.com',
                'password' => '$2b$10$zb5.7jUvR39pgOqILkodouhXa9aeP3ZB1RNMeXuN/JjZvNHUa9Ir6',
                'created_at' => '2026-03-16 13:56:58',
                'updated_at' => '2026-03-22 08:13:48',
            ],
            [
                'id' => 2,
                'username' => 'jesselzapanta09',
                'email' => 'jesselzapanta09@gmail.com',
                'password' => '$2b$10$OUf9vBUPpl.TUIZKvV4GEOGoTVIyMbSJa.YeH.fEL5slSAPhjqPPS',
                'created_at' => '2026-03-17 08:07:19',
                'updated_at' => '2026-03-17 08:07:19',
            ],
            [
                'id' => 3,
                'username' => 'Juan Dela Cruz',
                'email' => 'juandelacruz9@gmail.com',
                'password' => '$2b$10$BSJLo5vdyDVuovqdOuCdYOwsRC7TXWFhDiPxbxGw7cH8XBFwR.Uke',
                'created_at' => '2026-03-23 12:31:24',
                'updated_at' => '2026-03-23 12:39:09',
            ],
            [
                'id' => 4,
                'username' => 'John Doe',
                'email' => 'johndoe@gmail.com',
                'password' => '$2b$10$x10Uji5HF2qNJn9N3f6v1u52Dt/p4RAu85zAgR0lUG/PgG7XgdZfO',
                'created_at' => '2026-03-23 12:41:37',
                'updated_at' => '2026-03-23 12:41:37',
            ],
            [
                'id' => 5,
                'username' => 'Raiden Shogun',
                'email' => 'raidenshogun@gmail.com',
                'password' => '$2b$10$HZGVOSSsuU4C03.9dnVs9OKzlHPYXd8odLdROPjbRHPm8.3r65JRO',
                'created_at' => '2026-03-23 12:42:38',
                'updated_at' => '2026-03-23 12:53:22',
            ],
            [
                'id' => 6,
                'username' => 'Eren Yeager',
                'email' => 'erenyeager@gmail.com',
                'password' => '$2b$10$lgFV/r2oowLgjUfvgbjUfvgbjUuOeeHsFAeT9dSZJR3S81651OthjZaHFkK',
                'created_at' => '2026-03-23 12:43:50',
                'updated_at' => '2026-03-23 12:54:09',
            ],
            [
                'id' => 7,
                'username' => 'Gabimaru',
                'email' => 'gabimaru@gmail.com',
                'password' => '$2b$10$9YGdUCKkpPt97SkjGVNl.OsI8Rrknwx6VwOmBmwQ4ollNOMZg/Gq2',
                'created_at' => '2026-03-23 12:45:57',
                'updated_at' => '2026-03-23 12:45:57',
            ],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};