<?php

// Composer: "fzaninotto/faker": "v1.3.0"

class TransactionsTableSeeder extends Seeder {

	public function run(){
	// kosongkan database
	DB:: table( 'transactions' ) -> delete();

	// buat array untuk diinput
	$transactions = [
 		[ 'id' => 1, 'member_id' => 1, 'product_types' => 3, 'total_price' => 30000, 'point' => '3', 'created_at' => '2014-05-16 11:15:22' , 'updated_at' => '2014-05-16 11:15:22' ],
		[ 'id' => 2, 'member_id' => 2, 'product_types' => 5, 'total_price' => 50000, 'point' => '5', 'created_at' => '2014-05-16 11:15:22' , 'updated_at' => '2014-05-16 11:15:22' ],
		[ 'id' => 3, 'member_id' => 3, 'product_types' => 6, 'total_price' => 60000, 'point' => '6', 'created_at' => '2014-05-16 11:15:22' , 'updated_at' => '2014-05-16 11:15:22' ],
		[ 'id' => 4, 'member_id' => 3, 'product_types' => 7, 'total_price' => 70000, 'point' => '7', 'created_at' => '2014-05-16 11:15:22' , 'updated_at' => '2014-05-16 11:15:22' ]
	];

	// insert data ke database
	DB:: table( 'transactions' )->insert($transactions);
	}

}