<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('karevans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("doctor_id")->nullable();
            $table->string('IDS',30)->nullable();;
            $table->string('year',30)->nullable();;
            $table->string('ProvinceID',30)->nullable();;
            $table->string('KarevanNo',30)->nullable();;
            $table->string('CapId',30)->nullable();;
            $table->string('Madineh',30)->nullable();;
            $table->string('City',30)->nullable();;
            $table->string('ManagerName',30)->nullable();;
            $table->string('ManagerFamily',30)->nullable();;
            $table->string('MeccaHouseID',30)->nullable();;
            $table->string('MedinaHouseID',30)->nullable();;
            $table->string('Tel',30)->nullable();;
            $table->string('Address',30)->nullable();;
            $table->string('KarevanTypeID',30)->nullable();;
            $table->string('Religon',30)->nullable();;
            $table->string('MeccaPriceID',30)->nullable();;
            $table->string('MedinaPriceID',30)->nullable();;
            $table->string('MeccaEnterDate',30)->nullable();;
            $table->string('MeccaExitDate',30)->nullable();;
            $table->string('MedinaEnterDate',30)->nullable();;
            $table->string('MedinaExitDate',30)->nullable();;
            $table->string('ExitDate',30)->nullable();;
            $table->string('Cancel',30)->nullable();;
            $table->string('ManagerArabCell',30)->nullable();;
            $table->string('v',30)->nullable();;
            $table->string('CellIran',30)->nullable();;
            $table->string('ManagerEducation',30)->nullable();;
            $table->string('ManagerBranch',30)->nullable();;
            $table->string('ManagerJob',30)->nullable();;
            $table->string('ManagerEmail',30)->nullable();;
            $table->string('hotelgroupmecca',30)->nullable();;
            $table->string('hotelgroupmeccaname',30)->nullable();;
            $table->string('hotelgroupmedina',30)->nullable();;
            $table->string('hotelgroupmedinaname',30)->nullable();;
            $table->string('ZaerNo',30)->nullable();;
            $table->string('AvamelNo',30)->nullable();;
            $table->string('MeccaHouse',30)->nullable();;
            $table->string('MedinehHouse',30)->nullable();;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karevans');
    }
};
