<?php

class GuestController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	protected $layout = 'layouts.guest';

	public function login()
	{
		$this->layout->content = View::make( 'guest.login' );
	}

	public function signup(){
		$this->layout->content = View::make( 'guest.signup' );
	}

	//aktivasi
	public function activate(){
		$email = Input::get( 'email' );
		$activationCode = Input:: get( 'activationCode' );
		try {
			$user = Sentry:: findUserByLogin( $email );
			$user-> attemptActivation( $activationCode);

		}catch (UserAlreadyActivatedException $e) {
			return Redirect::route( 'guest.login' )->with( 'errorMessage' , $e-> getMessage());
		}catch (UserNotFoundException $e) {
			return Redirect::route( 'guest.login' )->with( 'errorMessage' , $e-> getMessage());
		}
			return Redirect::route( 'guest.login' )->with('successMessage' ,"Akun Anda berhasil diaktivasi, silahkan login." );
	}


	/**
	* Register User dan kirim email untuk aktivasi
	* @return response
	*/
	public function register(){
		$validator = Validator:: make( $data = Input:: all (), User:: $rules);

		if ( $validator-> fails()){
			return Redirect:: back() -> withErrors( $validator) -> withInput();
		}

		// Register User tanpa diaktivasi
		$user = Sentry::register( array(
			'email' => Input::get( 'email' ),
			'password' => Input::get( 'password' ),
			'first_name' => Input::get( 'first_name' ),
			'last_name' => Input::get( 'last_name' )
			//set true untuk langsung aktivasi, false belum diaktivasi
		), false);

		// Cari grup regular
		$regularGroup = Sentry::findGroupByName( 'regular' );

		// Masukkan user ke grup regular
		$user-> addGroup( $regularGroup);

		
		// Persiapkan activation code untuk dikirim ke email
		$data = [
			'email' => $user-> email ,
			// Generate kode aktivasi
			'activationCode' => $user-> getActivationCode()
		];

		// Kirim email aktivasi
		Mail::send( 'emails.auth.register' , $data, function ( $message) use ( $user) {
			$message-> to( $user-> email , $user-> first_name . ' ' . $user-> last_name) -> subject( 'Aktivasi Akun Blubuks' );
		});
		
		

		// Redirect ke halaman login with aktivasi message kirim email
		return Redirect::route('guest.login' ) -> with( 'successMessage', " Silahkan cek email Anda ( $user->email ) untuk melakukan aktivasi akun. " );

		// Redicect ke halaman login tanpa aktivasi key
		//return Redirect::route('guest.login' ) -> with( 'successMessage', " Akun dengan Email ( $user->email ) Berhasil dibuat. " );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
