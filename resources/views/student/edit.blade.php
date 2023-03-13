@extends('layouts.base')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 justify-content-between d-flex">
        <h6 class="m-0 font-weight-bold text-primary">Edit Siswa</h6>
        <div class="right-navigation">
            <a href="{{route('student.index')}}" class="btn btn-sm btn-primary">Kembali</a>
        </div>
    </div>

    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <input type="hidden" name="id" value="{{$student->id}}">
            <div class="form-group">
                <label for="name" class="form-label">Nama</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" autofocus required value="{{$student->name}}">
                @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" autofocus required value="{{$student->email}}">
                @error('email')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="nisn" class="form-label">NISN</label>
                <input type="text" name="nisn" class="form-control @error('nisn') is-invalid @enderror" autofocus required value="{{$student->nisn}}">
                @error('nisn')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="nis" class="form-label">NIS</label>
                <input type="text" name="nis" class="form-control @error('nis') is-invalid @enderror" autofocus required value="{{$student->nis}}">
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
                        @if (old('id', $get->id) == $student->grade_id)
                            <option value="{{$get->id}}" selected>{{$get->grade}}</option>
                        @else
                            <option value="{{$get->id}}">{{$get->grade}}</option>
                        @endif
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
                    <option value="">Pilih Kelas</option>
                    @foreach ($majors as $get)
                        @if (old('id', $get->id) == $student->major_id)
                            <option value="{{$get->id}}" selected>{{$get->major}}</option>
                        @else
                            <option value="{{$get->id}}">{{$get->major}}</option>
                        @endif
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
                <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" autofocus required value="{{$student->address}}">
                @error('address')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="phone_number" class="form-label">Telepon</label>
                <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" autofocus required value="{{$student->phone_number}}">
                @error('phone_number')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="spp_id" class="form-label">Spp</label>
                <select class="form-control @error('spp_id') is-invalid @enderror" name="spp_id">
                    @foreach ($spp as $get)
                        {{-- <option value="{{$get->id}}">Rp. {{$get->amount}} Berakhir {{$get->end_date}}</option> --}}
                        @if (old('id', $get->id) == $student->spp_id)
                            <option value="{{$get->id}}" selected>Rp. {{$get->amount}} Berakhir {{$get->end_period}}</option>
                        @else
                            <option value="{{$get->id}}">Rp. {{$get->amount}} Berakhir {{$get->end_period}}</option>
                        @endif
                    @endforeach
                </select>
                @error('spp_id')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <input type="hidden" name="payment_status" value="{{$student->payment_status}}">
            <div class="form-group">
                <label for="image" class="form-label">Gambar</label>
                @if ($student->image)
                    <img src="{{asset('storage/'.$student->image)}}" class="img-priview img-fluid mb-3 col-sm-5 d-block">
                @else
                    <img class="img-priview img-fluid mb-3 col-sm-5">
                @endif
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"
                id="image" onchange="priviewImage()">
                @error('image')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
                <small>Dapat dibiarkan kosong</small>
            </div>
            @if (auth()->user()->role == 'admin')
                <div class="form-group">
                    {{-- <label for="password" class="form-label">Password</label> --}}
                    <input type="hidden" name="password" id="inputPassword" class="form-control @error('password') is-invalid @enderror" autofocus required value="{{$student->password}}">
                    @error('password')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                {{-- <div class="form-group">
                    <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck" onclick="seePassword()">
                        <label class="custom-control-label" for="customCheck">Lihat Kata Sandi</label>
                    </div>
                </div> --}}
            @endif
            <button type="submit" class="btn btn-warning w-100 mt-2">Edit</button>
        </form>
    </div>
</div>
@endsection
