@extends('layouts.app')

@section('content')
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ url('/') }}">
        <img src="../assets/images/cashon-logo.png" alt="homepage" class="dark-logo" />
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/transaksi') }}">Transaksi</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="container">
      <div class="row mt-5">
        <div class="col-sm-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Pulsa Reguler</h5>
              <a href="" class="btn btn-primary" data-toggle="modal" data-target="#pulsa-reguler">Beli</a>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Kuota Internet</h5>
              <a href="" class="btn btn-primary" data-toggle="modal" data-target="#kuota-internet">Beli</a>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Token Listrik</h5>
              <a href="" class="btn btn-primary" data-toggle="modal" data-target="#token-listrik">Beli</a>
            </div>
          </div>
        </div>
      </div>
  </div>
  <footer class="footer">
      © 2019 CashOn
  </footer>

  <div class="modal fade" id="pulsa-reguler" tabindex="-1" role="dialog" aria-labelledby="pulsa-reguler" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Pulsa Reguler</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div>
              <input type="number" class="form-control" placeholder="Nomor Ponsel">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="button" class="btn btn-primary">Beli</button>
        </div>
      </div>
    </div>
</div>

<div class="modal fade" id="token-listrik" tabindex="-1" role="dialog" aria-labelledby="token-listrik" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Token Listrik</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div>
              <input type="number" class="form-control" placeholder="Token">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="button" class="btn btn-primary">Beli</button>
        </div>
      </div>
    </div>
</div>

<div class="modal fade" id="kuota-internet" tabindex="-1" role="dialog" aria-labelledby="kuota-internet" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Kuota Internet</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="button" class="btn btn-primary">Beli</button>
        </div>
      </div>
    </div>
</div>

</body>
@endsection