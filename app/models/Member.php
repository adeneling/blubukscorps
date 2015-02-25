<?php

class Member extends BaseModel{

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
		//'name' => 'required|unique:members'
		'name' => 'required|unique:members,name,:id'
	];

	// Don't forget to fill this array
	protected $fillable = ['name'];

	public function transactions(){
		return $this->hasMany('Transaction');
	}
	// fungsi boot
	public static function boot(){
		parent::boot();

		self::deleting( function( $member){
			// mengecek apakah penulis masih punya buku
			if ( $member->transactions-> count()>0) {
				$html = 'Member tidak bisa dihapus karena mempunyai history transaksi : ' ;
				$html .= '<ul>' ;
				foreach ( $member->transactions as $transaction) {
					$html .= " <li>ID Transaksi : $transaction->id</li> " ;
				}
				$html .= '</ul>' ;
					Session:: flash( 'errorMessage' , $html );
				return false;
			}
		});
	}
}
