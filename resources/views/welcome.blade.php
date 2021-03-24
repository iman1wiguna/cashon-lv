@extends('layouts.app')

@section('content')
<body class="bg">
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ url('/') }}">
        <img src="../assets/images/cashon-logo.png" alt="homepage" class="dark-logo" />
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/transaksi') }}">Transaksi</a>
        </li>
      </ul>
    </div>
  </nav>
	<div class="centered">
	    <div>
	    	<h1 class="txt">Simpan Tunai Gunakan Cash On</h1>
	        <a href="">
	            <img src="../assets/images/play-store.png">
	        </a>
	    </div>
	</div>
  <footer class="footer">
      © 2019 CashOn
  </footer>
</body>
@endsection