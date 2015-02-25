<?php

class MembersController extends \BaseController {

	/**
	 * Display a listing of members
	 *
	 * @return Response
	 */

	/* awal tambahan untuk menampilkan list member
	public function ListMember()
	{
		if(Datatable::shouldHandle()){
			return Datatable::collection(Member::all(array('id','name')))
				->showColumns('id','name')
				->searchColumns('name')
				->orderColumns('name')
				->make();
		}
		return View::make('members.listmember')->withTitle('Members');
	}
	akhir
	*/

	public function index()
	{
		if(Datatable::shouldHandle()){
			return Datatable::collection(Member::all(array('id','name')))
				->showColumns('id','name')
				->addColumn('',function($model){
					$html = '<a href="' . route( 'admin.members.edit' , [ 'members' => $model -> id]) . '" class="uk-button uk-button-primary uk-button-small">Edit</a> ' ;
					$html .= Form:: open( array( 'url' => route( 'admin.members.destroy' , [ 'members' => $model -> id]), 'method' => 'delete' , 'class' => 'uk-display-inline' ));
					$html .= Form:: submit( 'Delete' , array( 'class' => 'uk-button uk-button-danger uk-button-small' ));
					$html .= Form:: close();
					return $html ;
				})
				->searchColumns('name')
				->orderColumns('name')
				->make();
		}
		return View::make('members.index')->withTitle('Manage');
	}

	/**
	 * Show the form for creating a new member
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('members.create')->withTitle('Add New Member');
	}

	/**
	 * Store a newly created member in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Member::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$member = Member::create($data);

		return Redirect:: route( 'admin.members.index' )->with("successMessage", "Berhasil menyimpan $member->name");
	}

	/**
	 * Display the specified member.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$member = Member::findOrFail($id);

		return View::make('members.show', compact('member'));
	}

	/**
	 * Show the form for editing the specified member.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$member = Member::find($id);

		//return View::make('members.edit', compact('member'));
		return View::make('members.edit' , [ 'member' => $member]) -> withTitle( " Change $member->name" );
	}

	/**
	 * Update the specified member in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$member = Member::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Member::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		//tambah ke database
		$member->update($data);

		return Redirect:: route( 'admin.members.index' ) -> with( 'successMessage' , " Berhasil menyimpan $member->name " );
	}

	/**
	 * Remove the specified member from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		// mengecek apakah Member bisa dihapus
		if ( !Member::destroy( $id)){
			return Redirect:: back();
		}

		return Redirect:: route( 'admin.members.index' ) -> with( 'successMessage' , "Member berhasil dihapus." );


		
	}

}
