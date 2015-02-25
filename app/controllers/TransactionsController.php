<?php

class TransactionsController extends BaseController {

	/**
	 * Display a listing of transactions
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Datatable::shouldHandle()){
			//eager load member untuk menghemat query sql
			return Datatable::collection(Transaction::with('member')->get())
			->showColumns('id','member','product_types','total_price','point','')
			// menggunakan closure untuk menampilkan nama member dari relasi
			->addColumn('member', function ($model){
				return $model->member->name;
			})
			->addColumn('',function($model){
					/*
					$html = '<a href="' . route( 'admin.members.edit' , [ 'members' => $model -> id]) . '" class="uk-button uk-button-primary uk-button-small">Edit</a> ' ;
					$html .= Form:: open( array( 'url' => route( 'admin.members.destroy' , [ 'members' => $model -> id]), 'method' => 'delete' , 'class' => 'uk-display-inline' ));
					$html .= Form:: submit( 'Delete' , array( 'class' => 'uk-button uk-button-danger uk-button-small' ));
					$html .= Form:: close();
					return $html ;
					*/
					$html = '<a href="' . route( 'admin.transactions.edit' , [ 'transactions' => $model -> id]) . '" class="uk-button uk-button-primary uk-button-small">edit</a> ' ;
					$html .= Form:: open( array( 'url' => route( 'admin.transactions.destroy' , [ 'transactions' => $model -> id]), 'method' => 'delete' , 'class' => 'uk-display-inline' ));
					$html .= Form:: submit( 'delete' , array( 'class' => 'uk-button uk-button-danger uk-button-small' ));
					$html .= Form:: close();
					return $html ;
				
					// return '<a href="'. route('admin.transactions.edit', ['transactions'=>$model-> id]).'">edit</a> | delete';
			})
			->searchColumns('member','product_types','total_price','point')
			->orderColumns('member','product_types','total_price','point')
			->make();

		}
		return View::make('transactions.index')->withTitle('Transactions');
	}

	/**
	 * Show the form for creating a new transaction
	 *
	 * @return Response
	 */
	public function create()
	{

		return View::make('transactions.create')->withTitle('Add New Transaction');
	}

	/**
	 * Store a newly created transaction in storage.
	 *
	 * @return Response
	 */

	public function store(){
		// validasi
		$validator = Validator::make($data = Input::all (), Transaction::$rules);

		if($validator->fails())
		{
			// kembali ke halaman sebelumnya
			return Redirect::back()->withErrors($validator)->withInput();
		}

		// insert ke database
		$transaction =Transaction::create($data);

		// kembali ke index
		return Redirect::route('admin.transactions.index')->with("successMessage"," Berhasil Menambahkan Transaksi Baru pada ID Member $transaction->member_id <br> dengan jumlah transaksi senilai $transaction->total_price" );
	}

	/**
	 * Display the specified transaction.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$transaction = Transaction::findOrFail($id);

		return View::make('transactions.show', compact('transaction'));
	}

	/**
	 * Show the form for editing the specified transaction.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$transaction=Transaction::find($id);
		
		return View::make( 'transactions.edit' , ['transaction' => $transaction])->withTitle( " Ubah $transaction->name" );
		
		// return View::make('transactions.edit', compact('transaction'));
	}

	/**
	 * Update the specified transaction in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// cari transaksi
		$transaction = Transaction::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Transaction::$rules);

		// mengganti dengan nilai yang baru
		// $validator = Validator::make( $data = Input::all (), $transaction->updateRules());

		//validasi
		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		//insert ke database
		$transaction->update($data);

		return Redirect::route('admin.transactions.index')->with("successMessage","Berhasil Menyimpan Pembaharuan ke ID Transaksi $transaction->id. ");
	}

	/**
	 * Remove the specified transaction from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Transaction::destroy($id);

		return Redirect::route('admin.transactions.index') -> with( 'successMessage' , 'ID Transaksi Berhasil dihapus.' );
	}

}
