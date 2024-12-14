@extends('layouts.app')

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Dashboard', 'titleSub' => ''. ucfirst(Auth::user()->auth). ' : '. Auth::user()->nama])
<div class="container py-5">
    <div class="card shadow border-0">
        <!-- Header -->
        <div class="card-header text-white text-center">
            <h5 class="fw-bold mb-0">Profile</h5>
        </div>

        <!-- Body -->
        <div class="card-body">
            <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Profile Image -->
                @if($user->gambar_profile && file_exists(public_path('storage/' . $user->gambar_profile)))
                    <div class="text-center mb-4">
                        <img src="{{ asset('storage/' . $user->gambar_profile) }}"
                             alt="profile" class="rounded-circle img-fluid"
                             style="width: 200px; height: 200px; object-fit: cover;">
                    @else
                    <div class="text-center mb-5">
                        <x-hugeicons-user-circle-02 style="width: 200px; height: 200px; object-fit: cover;" />
                    @endif
                </div>

                <!-- Unggah Gambar -->
                <div class="mb-3">
                    <label for="gambar_profile" class="form-label">Unggah Gambar Profile</label>
                    <input type="file" name="gambar_profile" id="gambar_profile"
                           class="form-control">
                </div>

                <!-- Nama -->
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" id="nama"
                           class="form-control" placeholder="Masukkan nama Anda" value="{{ $user->nama }}">
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email"
                           class="form-control" placeholder="Masukkan email Anda" value="{{ $user->email }}">
                </div>

                <!-- Nomor Telepon -->
                <div class="mb-3">
                    <label for="no_hp" class="form-label">Nomor Telepon</label>
                    <input type="tel" name="no_hp" id="no_hp"
                           class="form-control" placeholder="Masukkan nomor telepon Anda" value="{{ $user->no_hp }}">
                </div>


                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="btn w-100" style="background-color: #003366; color: white;">
                        Edit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
