<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_permission', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id')->constrained('roles')->onDelete('cascade');
            $table->foreignId('permission_id')->constrained('permissions')->onDelete('cascade');
            $table->timestamps();
        });
        
        DB::statement("INSERT INTO `role_permission` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES 
            (NULL, 1, 1, UTC_TIMESTAMP(), UTC_TIMESTAMP()),
            (NULL, 1, 2, UTC_TIMESTAMP(), UTC_TIMESTAMP()),
            (NULL, 1, 3, UTC_TIMESTAMP(), UTC_TIMESTAMP()),
            (NULL, 1, 4, UTC_TIMESTAMP(), UTC_TIMESTAMP()),
            (NULL, 1, 5, UTC_TIMESTAMP(), UTC_TIMESTAMP()),
            (NULL, 2, 6, UTC_TIMESTAMP(), UTC_TIMESTAMP()),
            (NULL, 2, 7, UTC_TIMESTAMP(), UTC_TIMESTAMP()),
            (NULL, 2, 8, UTC_TIMESTAMP(), UTC_TIMESTAMP()),
            (NULL, 2, 9, UTC_TIMESTAMP(), UTC_TIMESTAMP()),
            (NULL, 2, 10, UTC_TIMESTAMP(), UTC_TIMESTAMP()),
            (NULL, 3, 7, UTC_TIMESTAMP(), UTC_TIMESTAMP()),
            (NULL, 3, 12, UTC_TIMESTAMP(), UTC_TIMESTAMP()),
            (NULL, 3, 16, UTC_TIMESTAMP(), UTC_TIMESTAMP());
        ");
    }

    public function down()
    {
        Schema::dropIfExists('role_permission');
    }
};
