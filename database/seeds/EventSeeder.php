<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for ($i=0; $i < 5; $i++) { 
        	DB::table('events')->insert([
        	    'name' => Str::random(10),
        	    'date' => Carbon::now(),
        	    'city' => Str::random(10),
        	]);
    	}
    }
}
