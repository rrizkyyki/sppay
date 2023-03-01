@extends('layouts.base')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 justify-content-between d-flex">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Kelas</h6>
        <div class="right-navigation">
            <a href="{{route('grade.index')}}" class="btn btn-sm btn-primary">Kembali</a>
        </div>
    </div>

    <div class="card-body">
        <form action="{{route('grade.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="grade" class="form-label">Kelas</label>
                <input type="text" name="grade" class="form-control @error('grade') is-invalid @enderror" autofocus required value="{{old('grade')}}">
                @error('grade')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
</div>
@endsection
