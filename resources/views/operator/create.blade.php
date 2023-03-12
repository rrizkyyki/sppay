@extends('layouts.base')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 justify-content-between d-flex">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Petugas</h6>
        <div class="right-navigation">
            <a href="{{route('operator.index')}}" class="btn btn-sm btn-primary">Kembali</a>
        </div>
    </div>

    <div class="card-body">
        <form action="{{route('operator.store')}}" method="post" enctype="multipart/form-data">
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
                <label for="email" class="form-label">Alamat Email</label>
                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" required value="{{old('email')}}">
                @error('email')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="role" class="form-label">Level</label>
                <select class="form-control @error('role') is-invalid @enderror" name="role">
                    <option>Pilih Level</option>
                    <option value="admin">Admin</option>
                    <option value="operator">Petugas</option>
                </select>
                @error('role')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="image" class="form-label">Profil</label>
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
                <label for="password" class="form-label">Kata Sandi</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required value="{{old('password')}}"
                id="inputPassword">
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
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
</div>
@endsection