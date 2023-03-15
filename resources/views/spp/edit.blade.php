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
                <label for="year" class="form-label">Tahun</label>
                <input type="number" name="year" class="form-control @error('year') is-invalid @enderror" autofocus required value="{{$spp->year}}">
                @error('year')
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
