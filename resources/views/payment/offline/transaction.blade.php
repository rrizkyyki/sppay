@extends('layouts.base')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 justify-content-between d-flex">
        <h6 class="m-0 font-weight-bold text-primary">Transaksi</h6>
        <div class="right-navigation">
            <a href="{{route('offlinePayment.create')}}" class="btn btn-sm btn-primary">Kembali</a>
        </div>
    </div>

    <div class="card-body">
        <form action="{{route('offlinePayment.store')}}" id="form1" method="post">
            @csrf
            <div class="form-group">
                <label for="user_id" class="form-label">Petugas</label>
                <input type="hidden" name="user_id" class="form-control @error('user_id') is-invalid @enderror" value="{{Auth::user()->id}}" readonly required>
                <input type="text" class="form-control @error('user_id') is-invalid @enderror" value="{{$user->name}}" readonly required>
                @error('user_id')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label">NISN</label>
                <input type="text" class="form-control"  value="{{$student->nisn}}" readonly required>
            </div>
            <div class="form-group">
                <label class="form-label">NISN</label>
                <input type="text" class="form-control"  value="{{$student->nis}}" readonly required>
            </div>
            <div class="form-group">
                <label for="student_id" class="form-label">Murid</label>
                <input type="hidden" name="student_id" class="form-control @error('student_id') is-invalid @enderror"  value="{{$student->id}}" readonly required>
                <input type="text" class="form-control @error('student_id') is-invalid @enderror"  value="{{$student->name}}" readonly required>
                @error('student_id')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label">SPP</label>
                <input type="text" class="form-control"  value="Rp. {{$student->spp->amount}}" readonly required>
            </div>
            <div class="form-group">
                <label for="pay_date" class="form-label">Tanggal</label>
                <input type="date" name="pay_date" class="form-control @error('pay_date') is-invalid @enderror" required>
                @error('pay_date')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="amount" class="form-label">Jumlah</label>
                <input type="text" name="amount" class="form-control @error('amount') is-invalid @enderror" required>
                @error('amount')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-warning w-100 mt-2">Bayar</button>
        </form>
    </div>
</div>
@endsection
