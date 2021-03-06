@section('title')
	{{ $title }}
@stop

@section('nav')
	
	<li> <a href="#" >Member</a> </li>
	<li> <a href="#" >Point</a> </li>
	
	<li><a href="{{URL::to('/admin/members')}}" class="uk-navbar-nav-subtitle"><center>Admin</center>
		<div>Manage</div>
        </a>
    </li>
    <li><a href="{{URL::to('/admin/transactions')}}" class="uk-navbar-nav-subtitle"><center>Transaction</center>
		<div> History Transactions</div>
        </a>
    </li>
@stop

@section('breadcrumb')
	<li > {{ $title }} </li>
@stop

@section('content')
	<div class="uk-animation-slide-bottom">
		Selamat datang di Menu Administrasi Blubuks. Silahkan pilih menu administrasi yang diinginkan.
	</div>

	<!-- Promotion Page -->
	<ul class="uk-tab">
	    <li><a href="">Promo 1</a></li>
	    <li><a href="">Promo 2</a></li>
	    <li><a href="">Promo 3</a></li>
	    <li><a href="">Promo 4</a></li>
	    <li><a href="">Promo 5</a></li>

    <!-- This is the container enabling the JavaScript 

    <li data-uk-dropdown="{mode:'click'}">
        <!-- This is the menu item toggling the dropdown

        <a href="">Promo 1</a>
        <!-- This is the dropdown

        <div class="uk-dropdown uk-dropdown-small">
            <ul class="uk-nav uk-nav-dropdown">
                <li><a href="">Bla Bla Bla</a></li>
            </ul>
        </div>
    </li>

    -->
	</ul>



@stop