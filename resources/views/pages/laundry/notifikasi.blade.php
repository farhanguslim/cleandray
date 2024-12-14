@extends('layouts.app')

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Dashboard', 'titleSub' => ''. ucfirst(Auth::user()->auth). ' : '. Auth::user()->nama])
<div class="container py-5">
    <div class="card shadow border-0">
        <div class="card-header text-white">
            <h5 class="fw-bold mb-0">Notifikasi</h5>
        </div>
        <div class="card-body">
            <ul class="list-group">
                @forelse ($notifikasis as $notifikasi)
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">{{ $notifikasi->judul }}</div>
                            {{ $notifikasi->pesan }}
                        </div>
                        <div class="d-flex align-items-center">
                            <small class="text-muted me-3">{{ $notifikasi->created_at->diffForHumans() }}</small>
                            @if (!$notifikasi->is_read)
                                <button class="btn btn-sm btn-outline-primary mark-as-read-btn"
                                        data-id="{{ $notifikasi->id }}">Tandai Dibaca</button>
                            @endif
                        </div>
                    </li>
                @empty
                    <li class="list-group-item">Tidak ada notifikasi baru.</li>
                @endforelse
            </ul>
        </div>
    </div>
</div>
<script>
    document.querySelectorAll('.mark-as-read-btn').forEach(button => {
        button.addEventListener('click', function () {
            const notifikasiId = this.getAttribute('data-id');
            
            fetch(`/notifikasi/${notifikasiId}/mark-as-read`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
                this.remove();
            })
            .catch(error => console.error('Error:', error));
        });
 });
</script>
@endsection
