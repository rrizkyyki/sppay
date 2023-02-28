@extends('layouts.base')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 justify-content-between d-flex">
        <h6 class="m-0 font-weight-bold text-primary">Edit Spp</h6>
        <div class="right-navigation">
            <a href="{{route('spp.index')}}" class="btn btn-sm btn-primary">Kembali</a>
        </div>
    </div>

    <div class="card-body">
        <form action="" method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="start_date" class="form-label">Tanggal Berawal</label>
                <input type="date" name="start_date" class="form-control @error('start_date') is-invalid @enderror" autofocus required value="{{$spp->start_date}}">
                @error('start_date')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="end_date" class="form-label">Tanggal Berakhir</label>
                <input type="date" name="end_date" class="form-control @error('end_date') is-invalid @enderror" autofocus required value="{{$spp->end_date}}">
                @error('end_date')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="amount" class="form-label">Nominal</label>
                <input type="text" name="amount" class="form-control @error('amount') is-invalid @enderror" autofocus required value="{{$spp->amount}}">
                @error('amount')
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