<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
	$query = "insert into companies values (null,?,?,?,?,?)";
	for($i=0;$i<4000000;$i++){
            DB::insert($query,['tien','tien','tien','tien','tien']);
	}
    }
}
