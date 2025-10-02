@extends('admin.template')
@section('content')
    <div class="container-fluid mt-4">
        <div class="card shadow p-3" style="background-color: #f1b434; border-radius: 10px">
            <h2 class="p-3">Dashboard {{ Auth::user()->role }}</h2>
            <div class="row mb-3 gap-3 justify-content-start align-items-start">

                {{-- Khusus Admin --}}
                @if(Auth::user()->role == 'Admin')
                    <div class="col-md-3">
                        <div class="card text-white" style="background-color: #001f3f">
                            <div class="d-flex align-item-center">
                                <i class="fas fa-users fa-2x m-2 me-3"></i>
                                <div class="card-body">
                                    <h5 class="card-title m-0">User</h5>
                                    <p class="card-text">{{ $totalUser ?? 0 }}</p>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="card text-white" style="background-color: #001f3f">
                            <div class="d-flex align-item-center">
                                <i class="fa-solid fa-chalkboard-teacher fa-2x m-2 me-3"></i>
                                <div class="card-body">
                                    <h5 class="card-title m-0">Guru</h5>
                                    <p class="card-text">{{ $totalGuru ?? 0 }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    {{-- Umum (Admin & Operator) --}}
                    <div class="col-md-3">
                        <div class="card text-white" style="background-color: #001f3f">
                            <div class="d-flex align-item-center">
                                <i class="fa-solid fa-graduation-cap fa-2x m-2 me-3"></i>
                                <div class="card-body">
                                    <h5 class="card-title m-0">Siswa</h5>
                                    <p class="card-text">{{ $totalSiswa ?? 0 }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="col-md-3">
                    <div class="card text-white" style="background-color: #001f3f">
                        <div class="d-flex align-item-center">
                            <i class="fa-solid fa-newspaper fa-2x m-2 me-3"></i>
                            <div class="card-body">
                                <h5 class="card-title m-0">Galeri</h5>
                                <p class="card-text">{{ $totalGaleri ?? 0 }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card text-white" style="background-color: #001f3f">
                        <div class="d-flex align-item-center">
                            <i class="fa-solid fa-masks-theater fa-2x m-2 me-3"></i>
                            <div class="card-body">
                                <h5 class="card-title m-0">Ekstrakulikuler</h5>
                                <p class="card-text">{{ $totalEkskul ?? 0 }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card text-white" style="background-color: #001f3f">
                        <div class="d-flex align-item-center">
                            <i class="fa-solid fa-file fa-2x m-2 me-3"></i>
                            <div class="card-body">
                                <h5 class="card-title m-0">Berita</h5>
                                <p class="card-text">{{ $totalBerita ?? 0 }}</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
