<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVenuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venues', function (Blueprint $table) {
            $table->increments('id');

            $table->string('venue_name');

             $table->string('slug');

            $table->json('venue_type');

            $table->json('best_for');


            $table->double('total_area');


            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('country')->default('India');
            $table->string('pincode');


            $table->text('description')->nullable();
            
            $table->integer('venue_since');

            $table->integer('rooms')->default(0);

            $table->double('railway')->default(0);
            $table->double('airport')->default(0);

            $table->text('exclusive_features')->nullable();

            $table->json('facilities')->nullable();

            $table->json('parameters')->nullable();

            
            $table->string('contact_name');
            $table->string('email');
            $table->string('phone');

            

            $table->integer('user_id');


            $table->integer('elite')->default(0);
           
           
            $table->float('ambience')->default(80);
            $table->float('hospitality')->default(70);
            $table->float('food')->default(90);

            $table->json('food_available')->nullable();
         
    
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
        Schema::dropIfExists('venues');
    }
}