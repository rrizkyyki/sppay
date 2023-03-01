@extends('layouts.base')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 justify-content-between d-flex">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Siswa</h6>
        <div class="right-navigation">
            <a href="{{route('student.index')}}" class="btn btn-sm btn-primary">Kembali</a>
        </div>
    </div>

    <div class="card-body">
        <form action="{{route('student.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name" class="form-label">Nama</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" autofocus required value="{{old('name')}}">
                @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" autofocus required value="{{old('email')}}">
                @error('email')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="nisn" class="form-label">NISN</label>
                <input type="text" name="nisn" class="form-control @error('nisn') is-invalid @enderror" autofocus required value="{{old('nisn')}}">
                @error('nisn')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="nis" class="form-label">NIS</label>
                <input type="text" name="nis" class="form-control @error('nis') is-invalid @enderror" autofocus required value="{{old('nis')}}">
                @error('nis')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="grade_id" class="form-label">Kelas</label>
                <select class="form-control @error('grade_id') is-invalid @enderror" name="grade_id">
                    <option value="">Pilih Kelas</option>
                    @foreach ($grades as $get)
                        <option value="{{$get->id}}">{{$get->grade}}</option>
                    @endforeach
                </select>
                @error('grade_id')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="major_id" class="form-label">Kompetensi Keahlian</label>
                <select class="form-control @error('major_id') is-invalid @enderror" name="major_id">
                    <option value="">Pilih Kompetensi Keahlian</option>
                    @foreach ($majors as $get)
                        <option value="{{$get->id}}">{{$get->major}}</option>
                    @endforeach
                </select>
                @error('major_id')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="address" class="form-label">Alamat</label>
                <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" autofocus required value="{{old('address')}}">
                @error('address')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="phone_number" class="form-label">Telepon</label>
                <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" autofocus required value="{{old('phone_number')}}">
                @error('phone_number')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="spp_id" class="form-label">Spp</label>
                <select class="form-control @error('spp_id') is-invalid @enderror" name="spp_id">
                    <option value="">Pilih Spp</option>
                    @foreach ($spp as $get)
                        <option value="{{$get->id}}">Rp. {{$get->amount}} Berakhir {{$get->end_period}}</option>
                    @endforeach
                </select>
                @error('spp_id')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <input type="hidden" name="payment_status" value="1">
            <div class="form-group">
                <label for="image" class="form-label">Gambar</label>
                <img class="img-priview img-fluid mb-3 col-sm-5">
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"
                id="image" onchange="priviewImage()">
                @error('image')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
                <small>Dapat dibiarkan kosong</small>
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="inputPassword" class="form-control @error('password') is-invalid @enderror" autofocus required value="{{old('password')}}">
                @error('password')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <div class="custom-control custom-checkbox small">
                    <input type="checkbox" class="custom-control-input" id="customCheck" onclick="seePassword()">
                    <label class="custom-control-label" for="customCheck">Lihat Kata Sandi</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100 mt-2">Tambah</button>
        </form>
    </div>
</div>
@endsection
