@extends('layouts.base')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 justify-content-between d-flex">
        <div class="left-navigation">
            <h6 class="m-0 font-weight-bold text-primary mb-2">Data Pembayaran Offline</h6>
            <h6 class="m-0 font-weight-bold text-primary">Total : {{$offlinePayments->count()}}</h6>
        </div>
        <div class="right-navigation">
            <a href="{{route('offlinePayment.export_excel')}}" class="btn btn-sm btn-success font-weight-bold my-1 w-100"><i class="fa fa-download" aria-hidden="true"></i> Excel</a>
            <a href="{{route('offlinePayment.create')}}" class="m-0 btn btn-sm btn-primary font-weight-bold w-100"><i class="fa fa-plus" aria-hidden="true"></i> Tambah</a>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Petugas</th>
                        <th>Siswa</th>
                        <th>Tanggal</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                        {{-- <th>Aksi</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($offlinePayments as $key => $get)
                        <tr>
                            <td>{{$offlinePayments->firstItem() + $key}}</td>
                            <td>{{$get->user->name}}</td>
                            <td>{{$get->student->name}}</td>
                            <td>{{$get->pay_date}}</td>
                            <td>{{$get->amount}}</td>
                            @if ($get->amount >= $get->student->spp->amount)
                                <td><p class="badge badge-success" style="font-size: 15px;">Lunas</p></td>
                            @else
                                <td><p class="badge badge-success" style="font-size: 15px;">Belum Lunas</p></td>
                            @endif
                            {{-- <td>
                                <a href="major/edit/{{$get->id}}" class="btn btn-warning">Ubah</a>
                                <button data-toggle="modal" data-target="#deleteModal{{$get->id}}" class="btn btn-danger my-1">Hapus</button>
                            </td> --}}
                        </tr>

                        <!-- Modal -->
                        {{-- <div class="modal fade" id="deleteModal{{$get->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    Apakah anda yakin ingin menghapus rekap pembayaran ?
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <form action="major/destroy/{{$get->id}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                                </div>
                            </div>
                            </div>
                        </div> --}}
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center mt-4">
                {{$offlinePayments->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
