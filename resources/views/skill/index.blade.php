@extends('layouts.base')
@push('search-bar')
<!-- Topbar Search -->
<form action="/skill" method="GET"
    class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
    <div class="input-group">
        <input type="search" name="search" class="form-control bg-light border-0 small" placeholder="Cari jurusan..."
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
            <form action="/skill" method="GET" class="form-inline mr-auto w-100 navbar-search">
                <div class="input-group">
                    <input type="search" name="search" class="form-control bg-light border-0 small"
                        placeholder="Cari jurusan..." aria-label="Search"
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
            <h6 class="m-0 font-weight-bold text-primary mb-2">Data Kompetensi Keahlian</h6>
            <h6 class="m-0 font-weight-bold text-primary">Total : {{$countSkills}}</h6>
        </div>
        <div class="right-navigation">
            <a href="{{route('skill.export-excel')}}" class="btn btn-sm btn-success font-weight-bold my-1 w-100"><i class="fa fa-download" aria-hidden="true"></i> Excel</a>
            <a href="{{route('skill.create')}}" class="m-0 btn btn-sm btn-primary font-weight-bold w-100"><i class="fa fa-plus" aria-hidden="true"></i> Tambah</a>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kompetensi Keahlian</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($skills as $key => $get)
                        <tr>
                            <td>{{$skills->firstItem() + $key}}</td>
                            <td>{{$get->skill}}</td>
                            <td>
                                <a href="skill/edit/{{$get->id}}" class="btn btn-warning">Ubah</a>
                                <button data-toggle="modal" data-target="#deleteModal{{$get->id}}" class="btn btn-danger my-1">Hapus</button>
                            </td>
                        </tr>

                        <!-- Modal -->
                        <div class="modal fade" id="deleteModal{{$get->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    Apakah anda yakin ingin menghapus jurusan {{$get->major}} ?
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <form action="skill/destroy/{{$get->id}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                                </div>
                            </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center mt-4">
                {{$skills->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
