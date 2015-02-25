<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeyToTransactions extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::table( 'transactions' , function(Blueprint $table) {
		$table->foreign( 'member_id' )->references( 'id' )->on( 'members' )
			->onDelete('restrict' )
			->onUpdate('cascade' );
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('transactions', function(Blueprint $table)
		{
			$table->dropForeign( 'transactions_member_id_foreign' );
		});
	}

}
