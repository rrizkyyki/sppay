@extends('layouts.base')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 justify-content-between d-flex">
        <div class="left-navigation">
            <h6 class="m-0 font-weight-bold text-primary mb-2">Data Petugas</h6>
            <h6 class="m-0 font-weight-bold text-primary">Total : {{$users->count()}}</h6>
        </div>
        <div class="right-navigation">
            <a href="{{route('operator.export_excel_view')}}" class="btn btn-sm btn-success font-weight-bold my-1 w-100"><i class="fa fa-download" aria-hidden="true"></i> Excel</a>
            <a href="{{route('operator.create')}}" class="m-0 btn btn-sm btn-primary font-weight-bold w-100"><i class="fa fa-plus" aria-hidden="true"></i> Tambah</a>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Level</th>
                        <th>Profil</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $key => $get)
                        <tr>
                            <td>{{$users->firstItem() + $key}}</td>
                            <td>{{$get->name}}</td>
                            <td>{{$get->email}}</td>
                            <td>{{$get->role}}</td>
                            @if ($get->image)
                                <td>
                                    <img src="{{asset('storage/'.$get->image)}}" alt="{{$get->image}}" style="width: 100px;">
                                </td>
                            @else
                                <td>
                                    <img src="{{asset('sbadmin2/img/undraw_profile.svg')}}" alt="default.svg" style="width: 100px;">
                                </td>
                            @endif
                            <td>
                                <a href="operator/edit/{{$get->id}}" class="btn btn-warning">Ubah</a>
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
                                    Apakah anda yakin ingin menghapus petugas {{$get->name}} ?
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <form action="operator/destroy/{{$get->id}}" method="post">
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
                {{$users->links()}}
            </div>
        </div>
    </div>
</div>
@endsection