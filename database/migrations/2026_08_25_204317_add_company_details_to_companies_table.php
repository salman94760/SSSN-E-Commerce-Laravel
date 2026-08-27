<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('companies', function (Blueprint $table) {

            $table->string('company_name')->nullable();
            $table->string('company_email')->nullable();
            $table->string('phone')->nullable();
            $table->string('website')->nullable();

            $table->text('address')->nullable();

            $table->string('logo')->nullable();

            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->string('whatsapp')->nullable();

        });
    }

    public function down(): void
    {
        Schema::table('companies', function (Blueprint $table) {

            $table->dropColumn([
                'company_name',
                'company_email',
                'phone',
                'website',
                'address',
                'logo',
                'facebook',
                'instagram',
                'youtube',
                'whatsapp',
            ]);

        });
    }
};