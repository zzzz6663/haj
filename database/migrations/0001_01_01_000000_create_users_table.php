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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name',30);
            $table->string('family',30)->nullable();;
            $table->unsignedInteger('province_id')->nullable();;
            $table->unsignedInteger('city_id')->nullable();;
            $table->string('active',2)->nullable();;
            $table->string('avatar',50)->nullable();;
            $table->string('role',20)->nullable();;
            $table->string('year',20)->nullable();;
            $table->string('email',30)->unique()->nullable();;
            $table->string('username',30)->unique()->nullable();;
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();;
            $table->string('ids',30)->nullable();;
            $table->string('KarevanID',30)->nullable();;
            $table->string('PassengerCode',30)->nullable();;
            $table->string('PassengerTypeID',30)->nullable();;
            $table->string('fathername',30)->nullable();;
            $table->string('OldFamily',30)->nullable();;
            $table->string('UserID',30)->nullable();;
            $table->string('MarriageStatus',30)->nullable();;
            $table->string('idno',30)->nullable();;
            $table->string('BirthDate',30)->nullable();;
            $table->string('birthplace',30)->nullable();;
            $table->string('JobID',30)->nullable();;
            $table->string('JobTitle',30)->nullable();;
            $table->string('EducationID',30)->nullable();;
            $table->string('Religion',30)->nullable();;
            $table->string('HajCount',30)->nullable();;
            $table->string('HajTypeID',30)->nullable();;
            $table->string('RelationID',30)->nullable();;
            $table->string('Sex',30)->nullable();;
            $table->string('telcode',30)->nullable();;
            $table->string('tel',30)->nullable();;
            $table->string('cell',30)->nullable();;
            $table->string('Address',400)->nullable();;
            $table->string('JobTel',30)->nullable();;
            $table->string('JobAddress',400)->nullable();;
            $table->string('PostalCode',30)->nullable();;
            $table->string('RelatedPassengerCode',30)->nullable();;
            $table->string('PassengerStepID',30)->nullable();;
            $table->string('MarjaaID',30)->nullable();;
            $table->string('ssn',30)->nullable();;
            $table->string('serialno',30)->nullable();;
            $table->string('Nationality',30)->nullable();;
            $table->string('EsarID',30)->nullable();;
            $table->string('Description',30)->nullable();;
            $table->string('InsertDateTime',30)->nullable();;
            $table->string('persiandate',30)->nullable();;
            $table->string('Disease',30)->nullable();;
            $table->string('expert',30)->nullable();;
            $table->string('BirthDate_ENG',30)->nullable();;
            $table->string('BirthPlace_ENG',30)->nullable();;
            $table->string('Family_ENG',30)->nullable();;
            $table->string('FatherName_ENG',30)->nullable();;
            $table->string('ExpDate',30)->nullable();;
            $table->string('Name_ENG',30)->nullable();;
            $table->string('IssueDate',30)->nullable();;
            $table->string('PassNo',30)->nullable();;
            $table->string('EducationTitle',30)->nullable();;
            $table->string('VisaNo',30)->nullable();;
            $table->string('NezamCode',30)->nullable();;
            $table->string('mobile',30)->nullable();;
            $table->string('status',30)->nullable();;
            $table->string('commission_reason',30)->nullable();;
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
