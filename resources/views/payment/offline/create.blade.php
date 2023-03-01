@extends('layouts.base')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 justify-content-between d-flex">
        <div class="left-navigation">
            <h6 class="m-0 font-weight-bold text-primary mb-2">Data Siswa</h6>
            <h6 class="m-0 font-weight-bold text-primary">Total : {{$students->count()}}</h6>
        </div>
        <div class="right-navigation">
            <a href="" class="btn btn-sm btn-success font-weight-bold my-1 w-100"><i class="fa fa-download" aria-hidden="true"></i> Excel</a>
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
