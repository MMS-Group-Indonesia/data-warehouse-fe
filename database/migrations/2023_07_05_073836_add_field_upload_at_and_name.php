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
        Schema::table('request_updates', function($table) {
            $table->string('upload_filename', 200)->nullable()->comment('Upload Filename');
            $table->timestamp('uploaded_at')->nullable()->comment('Uploaded At');
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
