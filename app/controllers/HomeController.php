<?php

class HomeController extends BaseController {

	protected $layout = 'layouts.master';

	public function dashboard(){
		$this->layout->content = View::make('dashboard.index')->withTitle('Dashboard');

	}

	//untuk melakukan authentikasi dari data username dan password.
	public function authenticate(){
		// ambil credentials dari POST variabel

		$credentials = array(
			'email'		=> Input::get('email'),
			'password' 	=> Input::get('password'),
		);

		try{
			// autentikasi user
			$user = Sentry::authenticate($credentials, false);
			//redirect user ke dashboard
			return Redirect::intended( 'dashboard' );
			//return Redirect::to('dashboard');

		}
		catch (Cartalyst\Sentry\Users\WrongPasswordException $e) {
			return Redirect:: back() -> with( 'errorMessage' , 'Password yang Anda masukan salah.' );
		} catch (Exception $e) {
			return Redirect:: back() -> with( 'errorMessage' , trans( 'Akun dengan email tersebut tidak ditemukan di sistem kami.' ));
		}

	}

	public function logout(){
		// Untuk Logout User
		Sentry::logout();
		//Redirect user ke halaman login
		return Redirect::to('login')->with('successMessage','Anda berhasil logout.');
	}



}
