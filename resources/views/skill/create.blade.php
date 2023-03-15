@extends('layouts.base')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 justify-content-between d-flex">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Jurusan</h6>
        <div class="right-navigation">
            <a href="{{route('skill.index')}}" class="btn btn-sm btn-primary">Kembali</a>
        </div>
    </div>

    <div class="card-body">
        <form action="{{route('skill.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="skill" class="form-label">Nama Jurusan</label>
                <input type="text" name="skill" class="form-control @error('skill') is-invalid @enderror" autofocus required value="{{old('skill')}}">
                @error('skill')
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