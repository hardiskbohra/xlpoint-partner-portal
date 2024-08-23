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
        Schema::create('permissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('parent_id')->nullable()->index();
            $table->string('name');
            $table->string('description');
            $table->timestamps();
        });
        
        DB::statement("INSERT INTO `permissions` (`id`, `parent_id`, `name`, `description`, `created_at`, `updated_at`) VALUES 
        (1, NULL, 'USER', 'USER module', UTC_TIMESTAMP(), UTC_TIMESTAMP()), 
        (2, 1, 'USER.READ', 'READ access of USER module', UTC_TIMESTAMP(), UTC_TIMESTAMP()), 
        (3, 1, 'USER.ADD', 'ADD access of USER module', UTC_TIMESTAMP(), UTC_TIMESTAMP()), 
        (4, 1, 'USER.EDIT', 'EDIT access of USER module', UTC_TIMESTAMP(), UTC_TIMESTAMP()),
        (5, 1, 'USER.DELETE', 'DELETE access of USER module', UTC_TIMESTAMP(), UTC_TIMESTAMP()),
        (6, NULL, 'PARTNER', 'PARTNER module', UTC_TIMESTAMP(), UTC_TIMESTAMP()), 
        (7, 6, 'PARTNER.READ', 'READ access of PARTNER module', UTC_TIMESTAMP(), UTC_TIMESTAMP()), 
        (8, 6, 'PARTNER.ADD', 'ADD access of PARTNER module', UTC_TIMESTAMP(), UTC_TIMESTAMP()), 
        (9, 6, 'PARTNER.EDIT', 'EDIT access of PARTNER module', UTC_TIMESTAMP(), UTC_TIMESTAMP()),
        (10, 6, 'PARTNER.DELETE', 'DELETE access of PARTNER module', UTC_TIMESTAMP(), UTC_TIMESTAMP()),
        (11, NULL, 'CUSTOMER', 'CUSTOMER module', UTC_TIMESTAMP(), UTC_TIMESTAMP()), 
        (12, 11, 'CUSTOMER.READ', 'READ access of CUSTOMER module', UTC_TIMESTAMP(), UTC_TIMESTAMP()), 
        (13, 11, 'CUSTOMER.ADD', 'ADD access of CUSTOMER module', UTC_TIMESTAMP(), UTC_TIMESTAMP()), 
        (14, 11, 'CUSTOMER.EDIT', 'EDIT access of CUSTOMER module', UTC_TIMESTAMP(), UTC_TIMESTAMP()),
        (15, 11, 'CUSTOMER.DELETE', 'DELETE access of CUSTOMER module', UTC_TIMESTAMP(), UTC_TIMESTAMP()),
        (16, NULL, 'TRANSACTION', 'TRANSACTION module', UTC_TIMESTAMP(), UTC_TIMESTAMP()), 
        (17, 16, 'TRANSACTION.READ', 'READ access of TRANSACTION module', UTC_TIMESTAMP(), UTC_TIMESTAMP()), 
        (18, 16, 'TRANSACTION.ADD', 'ADD access of TRANSACTION module', UTC_TIMESTAMP(), UTC_TIMESTAMP()), 
        (19, 16, 'TRANSACTION.EDIT', 'EDIT access of TRANSACTION module', UTC_TIMESTAMP(), UTC_TIMESTAMP()),
        (20, 16, 'TRANSACTION.DELETE', 'DELETE access of TRANSACTION module', UTC_TIMESTAMP(), UTC_TIMESTAMP());
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissions');
    }
};
