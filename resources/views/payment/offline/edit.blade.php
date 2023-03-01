@extends('layouts.base')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 justify-content-between d-flex">
        <h6 class="m-0 font-weight-bold text-primary">Konfirmasi</h6>
        <div class="right-navigation">
            <a href="{{route('offlinePayment.create')}}" class="btn btn-sm btn-primary">Kembali</a>
        </div>
    </div>

    <div class="card-body">
        <form action="" id="form2" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <input type="hidden" name="id" value="{{$student->id}}">
            <div class="form-group">
                <label for="name" class="form-label">Nama</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" readonly required value="{{$student->name}}">
            </div>
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" readonly required value="{{$student->email}}">
            </div>
            <div class="form-group">
                <label for="nisn" class="form-label">NISN</label>
                <input type="text" name="nisn" class="form-control @error('nisn') is-invalid @enderror" readonly required value="{{$student->nisn}}">
            </div>
            <div class="form-group">
                <label for="nis" class="form-label">NIS</label>
                <input type="text" name="nis" class="form-control @error('nis') is-invalid @enderror" readonly required value="{{$student->nis}}">
            </div>
            <div class="form-group">
                <label for="grade_id">Kelas</label>
                <input type="text" name="grade_id" value="{{$student->grade_id}}" readonly class="form-control">
            </div>
            <div class="form-group">
                <label for="major_id">Kompetensi Keahlian</label>
                <input type="text" name="major_id" value="{{$student->major_id}}" readonly class="form-control">
            </div>
            <div class="form-group">
                <label for="address" class="form-label">Alamat</label>
                <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" readonly required value="{{$student->address}}">
            </div>
            <div class="form-group">
                <label for="phone_number" class="form-label">Telepon</label>
                <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" readonly required value="{{$student->phone_number}}">
            </div>
            <div class="form-group">
                <label for="spp_id">Spp</label>
                <input type="text" name="spp_id" value="{{$student->spp_id}}" readonly class="form-control">
            </div>
            <div class="form-group">
                <label for="payment_status">Status Pembayaran</label>
                <select class="form-control @error('payment_status') is-invalid @enderror" name="payment_status">
                    @if ($student->payment_status == 1)
                        <option value="1">Belum Lunas</option>
                        <option value="2">Lunas</option>
                    @else
                        <option value="2">Lunas</option>
                        <option value="1">Belum Lunas</option>
                    @endif
                </select>
            </div>
            <div class="form-group">
                <input type="hidden" name="image" class="form-control @error('image') is-invalid @enderror"
                id="image" value="{{$student->image}}">
            </div>
            <div class="form-group">
                <input type="hidden" name="password" id="inputPassword" class="form-control @error('password') is-invalid @enderror" required value="{{$student->password}}">
            </div>
            <button type="submit" class="btn btn-info w-100 mt-2">Selesai</button>
        </form>
    </div>
</div>
@endsection
