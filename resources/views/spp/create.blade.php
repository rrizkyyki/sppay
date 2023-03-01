@extends('layouts.base')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 justify-content-between d-flex">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Spp</h6>
        <div class="right-navigation">
            <a href="{{route('spp.index')}}" class="btn btn-sm btn-primary">Kembali</a>
        </div>
    </div>

    <div class="card-body">
        <form action="{{route('spp.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="start_period" class="form-label">Periode Bermulai</label>
                <input type="date" name="start_period" class="form-control @error('start_period') is-invalid @enderror" autofocus required value="{{old('start_period')}}">
                @error('start_period')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="end_period" class="form-label">Periode Berakhir</label>
                <input type="date" name="end_period" class="form-control @error('end_period') is-invalid @enderror" autofocus required value="{{old('end_period')}}">
                @error('end_period')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="amount" class="form-label">Nominal</label>
                <input type="text" name="amount" class="form-control @error('amount') is-invalid @enderror" autofocus required value="{{old('amount')}}">
                @error('amount')
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
