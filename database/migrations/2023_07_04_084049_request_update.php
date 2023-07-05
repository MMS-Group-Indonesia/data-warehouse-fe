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
        Schema::create('request_updates', function (Blueprint $table) {
            $table->id();
            $table->uuid('request_update_id');
            $table->string('hrbp', 100)->comment('HRBP');
            $table->string('nik', 15)->comment('ID');
            $table->string('fullname', 100)->comment('Full Name');
            $table->string('nationality', 50)->nullable()->comment('Nationality');
            $table->date('join_date')->comment('Join Date');
            $table->string('group', 100)->nullable()->comment('Group');
            $table->string('employment', 100)->nullable()->comment('Employement');
            $table->string('group_of_dedicated_entity', 100)->nullable()->comment('Group Of Dedicated entity');
            $table->string('entity_of_headcount', 100)->nullable()->comment('Entity Of Headcount');
            $table->string('chief_in_charge', 100)->nullable()->comment('Chief In Charge');
            $table->string('business_head', 100)->nullable()->comment('Business Head / Function');
            $table->string('division', 100)->nullable()->comment('Division');
            $table->string('sub_division', 100)->nullable()->comment('Sub Division');
            $table->string('department', 100)->nullable()->comment('Deoartment');
            $table->string('section', 100)->nullable()->comment('Section');
            $table->string('job_title', 100)->nullable()->comment('Job Title');
            $table->string('job_position', 100)->nullable()->comment('Job Position');
            $table->string('superior1', 50)->nullable()->comment('Superior 1');
            $table->string('superior1_nik', 50)->nullable()->comment('Superior 1 NIK');
            $table->string('work_location', 150)->nullable()->comment('Work Location');
            $table->text('work_location_details')->nullable()->comment('Work Location Details');
            $table->string('grade',25)->nullable()->nullable()->comment('Grade');
            $table->string('employee_status', 100)->nullable()->comment('Employee Status');
            $table->date('expired_at')->nullable()->comment('End Contract/Probation/Expire Date');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
