@extends('layouts.lay')

@section('content')
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Permintaan Top up</h3>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- column -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nomor Hp</th>
                                        <th>Bukti Transfer</th>
                                        <th>Nominal</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($list as $l)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$l->user->phone_number}}</td>
                                        <td><img src="" alt="bukti transaksi"></td>
                                        <td></td>
                                        <td>
                                        	<a href="/usersaldo/{{$l->user->id}}" class="btn btn-primary" data-toggle="modal" data-target="#proses">Proses</a>
											<a href="" class="btn btn-danger" data-toggle="modal" data-target="#batal">Batal</a>
										</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <footer class="footer">
        © 2019 {{ config('app.name', 'CashOn') }}
    </footer>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>

<!-- Modal Proses -->
<div class="modal fade" id="proses" tabindex="-1" role="dialog" aria-labelledby="prosesModel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Permintaan Top Up</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @foreach($list as $l)
        <form action="/usersaldo/update/{{ $l->user->id }}" method="post">
            @csrf
            @method('patch')
            <input type="hidden" name="id" id="id" value="{{ $l->user->id }}">
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">No HP :</label>
                <input type="text" class="form-control" name="phone_number" id="recipient-name" value="{{ $l->phone_number }}">
            </div>
            <div class="form-group">
                <label for="message-text" class="col-form-label">Tambah Saldo :</label>
                <input type="text" class="form-control" name="saldo" id="recipient-name" value="{{ $l->user->saldo }}">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Proses</button>
            </div>
        </form>
        @endforeach
      </div>
    </div>
  </div>
</div>

<!-- Modal Batal -->
<div class="modal fade" id="batal" tabindex="-1" role="dialog" aria-labelledby="batalModel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Batalkan Top Up</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        @foreach($list as $l)
        <form action="requesttopup/{{$l->id_permintaan}}" method="get">
            @csrf
            <button type="submit" class="btn btn-primary">Batalkan</button>
        </form>
        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection