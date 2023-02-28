@extends('layouts.base')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 justify-content-between d-flex">
        <h6 class="m-0 font-weight-bold text-primary">Edit Jurusan</h6>
        <div class="right-navigation">
            <a href="{{route('major.index')}}" class="btn btn-sm btn-primary">Kembali</a>
        </div>
    </div>

    <div class="card-body">
        <form action="" method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <input type="hidden" name="id" value="{{$major->id}}">
                <label for="major" class="form-label">Nama Jurusan</label>
                <input type="text" name="major" class="form-control @error('major') is-invalid @enderror" value="{{$major->major}}" autofocus required>
                @error('major')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-warning">Ubah</button>
        </form>
    </div>
</div>
@endsection