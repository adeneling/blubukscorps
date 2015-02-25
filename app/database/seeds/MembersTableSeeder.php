<?php

class MembersTableSeeder extends Seeder{
	public function run(){
		//mengosongkan isi database
		DB::table('members')->delete();

		//membuat array untuk di input
		$members = [
			['id'=>1,'name'=>'M Farqi Zuhdi','created_at'=>'2014-02-19 01:20:22','updated_at'=>'2014-02-19 01:20:22'],
			['id'=>2,'name'=>'Kuncoro Buwono','created_at'=>'2014-02-19 01:20:22','updated_at'=>'2014-02-19 01:20:22'],
			['id'=>3,'name'=>'Teguh Munawar A','created_at'=>'2014-02-19 01:20:22','updated_at'=>'2014-02-19 01:20:22'],
		];

		// masukan ke database
		DB::table('members')->insert($members);
	}

}