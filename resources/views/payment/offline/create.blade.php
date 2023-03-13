@extends('layouts.base')
@push('search-bar')
<!-- Topbar Search -->
<form action="/offlinePayment/create" method="GET"
    class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
    <div class="input-group">
        <input type="search" name="search" class="form-control bg-light border-0 small" placeholder="Cari murid..."
            aria-label="Search" aria-describedby="basic-addon2" value="{{request('search')}}">
        <div class="input-group-append">
            <button class="btn btn-primary" type="submit">
                <i class="fas fa-search fa-sm"></i>
            </button>
        </div>
    </div>
</form>
@endpush
@push('search-bar-responsive')
    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
    <li class="nav-item dropdown no-arrow d-sm-none">
        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-search fa-fw"></i>
        </a>
        <!-- Dropdown - Messages -->
        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
            aria-labelledby="searchDropdown">
            <form action="/offlinePayment/create" method="GET" class="form-inline mr-auto w-100 navbar-search">
                <div class="input-group">
                    <input type="search" name="search" class="form-control bg-light border-0 small"
                        placeholder="Cari murid..." aria-label="Search"
                        aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </li>
@endpush
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 justify-content-between d-flex">
        <div class="left-navigation">
            <h6 class="m-0 font-weight-bold text-primary mb-2">Data Status Murid</h6>
            <h6 class="m-0 font-weight-bold text-primary">Total : {{$students->count()}}</h6>
        </div>
        <div class="right-navigation">
            <a href="{{route('offlinePayment.export_student_status_view')}}" class="btn btn-sm btn-success font-weight-bold my-1 w-100"><i class="fa fa-download" aria-hidden="true"></i> Excel</a>
            <a href="{{route('offlinePayment.index')}}" class="btn btn-sm btn-primary w-100">Kembali</a>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Kompetensi Keahlian</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th>Spp</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $key => $get)
                        <tr>
                            <td>{{$students->firstItem() + $key}}</td>
                            <td>{{$get->name}}</td>
                            <td>{{$get->grade->grade}}</td>
                            <td>{{$get->major->major}}</td>
                            <td>{{$get->address}}</td>
                            <td>{{$get->phone_number}}</td>
                            <td>Rp. {{$get->spp->amount}}</td>
                            @if ($get->payment_status == 1)
                                <td><p class="badge badge-danger" style="font-size: 15px;">Belum Lunas</p></td>
                            @else
                                <td><p class="badge badge-success" style="font-size: 15px;">Lunas</p></td>
                            @endif
                            <td>
                                <a href="edit/{{$get->id}}" class="btn btn-info">Konfirmasi</a>
                                <a href="transaction/{{$get->id}}" class="btn btn-warning my-1">Bayar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center mt-4">
                {{$students->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
