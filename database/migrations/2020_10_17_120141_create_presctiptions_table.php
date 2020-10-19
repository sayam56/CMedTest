<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresctiptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('prescriptions')) /*checks if there exists a table of the same name or not*/ 
        {
            Schema::create('prescriptions', function (Blueprint $table) {
                $table->id();
                $table->integer('uploaderID')->unsigned();
                $table->date('prescription_date');
                $table->string('patient_name');
                $table->double('patient_age');
                $table->string('patient_gender');
                $table->longText('patient_diagnosis');
                $table->longText('patient_medicines');
                $table->date('nextVisit_date')->nullable();
                $table->timestamps();

                $table->foreign('uploaderID')->references('id')->on('users');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('presctiptions');
    }
}
