@extends('layouts.app')

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Category', 'titleSub' => ''. ucfirst(Auth::user()->auth). ' : '. Auth::user()->nama])
<div class="container-fluid py-4">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-lg-3 col-md-4">
            <div class="card shadow border-0" style="background-color: #003366">
                <h5 class="mb-4 fw-bold text-white">Kategory Laundry</h5>
                <div class="card-body text-center">
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-lg-9 col-md-8">
            <div class="card shadow border border-2 text-black" style="width: 60rem">
            <div class="card-header d-flex justify-content-between align-items-center bg-white">
                <h5 class="mb-0 fw-bold">Kategori Laundry</h5>
                <!-- Icon Keranjang -->
                <a href="{{ route('pages.cartlaundry', ['auth' => 'admin']) }}"
                    class="d-flex justify-content-center align-items-center p-2"
                    style="background-color: #003366; border-radius: 8px; width: 3rem; height: 3rem; background: rgba(0,0,0,0.0);">
                    {{ svg('ionicon-cart-sharp') }}
                </a>


            </div>
            <div class="card-body">
                <div class="row">
                    @foreach ($categories as $category)
                    <div class="col-md-4 mb-4">
                        <div class="card text-center border-0 shadow">
                            <div class="card-body">
                                {{ svg($category->icon, 'icon-lg') }}
                                <h5 class="mt-3 fw-bold">{{ucwords($category->nama)}}</h5>
                                <a href="{{ route('pages.inputdetail', ['auth' => 'admin', 'category' => $category->nama]) }}"
                                class="btn btn-primary mt-3 w-100" style="background-color: #003366">
                                    Pilih
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

                <div class="card-footer d-flex justify-content-between align-items-center">
                    <p class="mb-0 text-muted">Showing data 1 to 8 of 256K entries</p>
                    <nav>
                        <ul class="pagination pagination-sm mb-0">
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">...</a></li>
                            <li class="page-item"><a class="page-link" href="#">40</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
