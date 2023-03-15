@extends('layouts.base')
@section('content')
<center>
    <h5 class="mb-5 mt-5"><b>SELAMAT DATANG DI SPPAY</b></h5>
</center>

<div class="row d-flex justify-content-center">

<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Kelas</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{auth()->user()->grade->grade}}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-list-ol fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Spp</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{auth()->user()->spp->amount}}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Kompetensi Keahlian</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{auth()->user()->major->major}}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-wrench fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
@endsection