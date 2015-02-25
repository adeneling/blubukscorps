<div class="uk-form-row" >
	{{ Form::labelUk('member_id', 'Member') }}
	{{ Form::select('member_id', array(''=>'')+Member::lists('name','id'), null, array(
	'id'=>'member_id',
	'placeholder' => "Select Member ID")) }}
</div>

<div class="uk-form-row" >
	{{ Form::labelUk('product_types', 'Jumlah Tipe Produk Beli') }}
	{{ Form::textUk('product_types', 'Jumlah Tipe Produk', 'uk-icon-th') }}
</div>
<div class="uk-form-row" >
	{{ Form::labelUk('total_price', 'Total Price') }}
	{{ Form::textUk('total_price', 'Total Harga', 'uk-icon-money') }}
</div>

<div class="uk-form-row" >
	{{ Form::labelUk('point', 'Point') }}
	{{ Form::textUk('point', 'Jumlah Poin', 'uk-icon-plus-square') }}
</div>

	{{ HTML::divider() }}
<div class="uk-form-row" >
	{{ Form::submitUk('Simpan') }}
</div>

<script>
	$(document).ready(function(){$("#member_id").select2();});
</script>