<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryPackage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_package_category', function (Blueprint $table) {
            $table->id();
            $table->string('category_id')->uniqid();
            $table->string('category_name');
            $table->timestamps();
        });

        Schema::table('tbl_package_category', function (Blueprint $table) {
            DB::statement("ALTER TABLE `tbl_package_category` ADD COLUMN `parent_category_id` VARCHAR(191) NULL DEFAULT NULL AFTER `category_name`");
        });

        Schema::table('tbl_package_category', function (Blueprint $table) { 
            DB::statement("ALTER TABLE `tbl_package_category` ADD COLUMN `category_status` ENUM('Active','Inactive') NULL DEFAULT NULL AFTER `parent_category_id`");
        });

        Schema::table('tbl_package_category', function (Blueprint $table) {
            $table->softDeletes();
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_package_category');
    }
}
