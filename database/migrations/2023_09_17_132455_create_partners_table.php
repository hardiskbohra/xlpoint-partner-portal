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
        Schema::create('partners', function (Blueprint $table) {
            $table->bigIncrements('partner_id');
            $table->integer('user_id')->nullable()->index();
            $table->string('company_name')->nullable()->index();
            $table->string('website_url')->nullable()->index();
            $table->string('address_line1')->nullable()->index();
            $table->string('address_line2')->nullable()->index();
            $table->string('city')->nullable()->index();
            $table->string('state')->nullable()->index();
            $table->string('country')->nullable()->index();
            $table->string('proof_of_id')->nullable()->index();
            $table->string('proof_of_address')->nullable()->index();
            $table->string('gst_number')->nullable()->index();
            
            $table->string('bank_name')->nullable()->index();
            $table->string('account_holder_name')->nullable()->index();
            $table->string('account_number')->nullable()->index();
            $table->string('ifsc_code')->nullable()->index();
            
            $table->enum('profile_complete', ['yes', 'no'])->default('no')->index();
            $table->date('registration_date')->nullable()->index();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partners');
    }
};
