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
                <label for="nisn" class="form-label">NISN</label>
                <input type="text" name="nisn" class="form-control @error('nisn') is-invalid @enderror" required value="{{$student->nisn}}">
                @error('nisn')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="nis" class="form-label">NIS</label>
                <input type="text" name="nis" class="form-control @error('nis') is-invalid @enderror" required value="{{$student->nis}}">
                @error('nis')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="name" class="form-label">Nama</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" required value="{{$student->name}}">
                @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" required value="{{$student->email}}">
                @error('email')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="gender" class="form-label">Jenis Kelamin</label>
                <select class="form-control @error('gender') is-invalid @enderror" name="gender">
                    @if($student->gender == 'male')
                        <option value="male">Laki-laki</option>
                        <option value="female">Perempuan</option>
                    @else
                        <option value="female">Perempuan</option>
                        <option value="male">Laki-laki</option>
                    @endif
                    {{-- use for debugging --}}
                    {{-- <option value="{{$user->gender}}" selected>{{$user->gender}}</option> --}}
                </select>
                @error('gender')
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
                <label for="skill_id" class="form-label">Kompetensi Keahlian</label>
                <select class="form-control @error('skill_id') is-invalid @enderror" name="skill_id">
                    <option value="">Pilih Kelas</option>
                    @foreach ($skill as $get)
                        @if (old('id', $get->id) == $student->skill_id)
                            <option value="{{$get->id}}" selected>{{$get->skill}}</option>
                        @else
                            <option value="{{$get->id}}">{{$get->skill}}</option>
                        @endif
                    @endforeach
                </select>
                @error('skill_id')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="phone_number" class="form-label">Telepon</label>
                <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" required value="{{$student->phone_number}}">
                @error('phone_number')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="address" class="form-label">Alamat</label>
                <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" required value="{{$student->address}}">
                @error('address')
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
                <input type="hidden" name="password" id="inputPassword" class="form-control @error('password') is-invalid @enderror" required value="{{$student->password}}">
                @error('password')
            <button type="submit" class="btn btn-warning w-100 mt-2">Edit</button>
        </form>
    </div>
</div>
@endsection
