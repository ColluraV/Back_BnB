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
        //many to many
        // connecting foreign keys on the bridge between apartment and service
        Schema::table('apartment_service', function (Blueprint $table) {
            $table->foreignId('apartment_id')->nullable()->constrained();
            $table->foreignId('service_id')->nullable()->constrained();
        });

        // connecting foreign keys on the bridge between apartment and sponsorship
        Schema::table('apartment_sponsorship', function (Blueprint $table) {
            $table->foreignId('apartment_id')->nullable()->constrained();
            $table->foreignId('sponsorship_id')->nullable()->constrained();
        });




        // 1 to many
        // creating foreign key between apartment and message
        Schema::table('messages', function (Blueprint $table) {
            $table->foreignId("apartment_id")->nullable()->constrained();
        });

        // creating foreign key between apartment and visits
        Schema::table('visits', function (Blueprint $table) {
            $table->foreignId("apartment_id")->nullable()->constrained();
        });

        // creating foreign key between user and apartments
        Schema::table('apartments', function (Blueprint $table) {
            $table->foreignId("user_id")->nullable()->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //many to many
        // disconnecting foreign keys on the bridge between apartment and service
        Schema::table('apartment_service', function (Blueprint $table) {
            $table->dropForeign('apartment_service_apartment_id_foreign');
            $table->dropForeign('apartment_service_service_id_foreign');

            $table->dropColumn('apartment_id');
            $table->dropColumn('service_id');
        });

        // disconnecting foreign keys on the bridge between apartment and sponsorship
        Schema::table('apartment_sponsorship', function (Blueprint $table) {
            $table->dropForeign('apartment_sponsorship_apartment_id_foreign');
            $table->dropForeign('apartment_sponsorship_sponsorship_id_foreign');

            $table->dropColumn('apartment_id');
            $table->dropColumn('sponsorship_id');
        });



        // 1 to many
        // disconnecting foreign key between apartment and message
        Schema::table('messages', function (Blueprint $table) {
            $table->dropForeign('messages_apartment_id_foreign');
            $table->dropColumn('apartment_id');
        });

        // disconnecting foreign key between apartment and visits
        Schema::table('visits', function (Blueprint $table) {
            $table->dropForeign('visits_apartment_id_foreign');
            $table->dropColumn('apartment_id');
        });

        // disconnecting foreign key between user and apartments
        Schema::table('apartments', function (Blueprint $table) {
            $table->dropForeign('apartments_user_id_foreign');
            $table->dropColumn('user_id');
        });
    }
};

