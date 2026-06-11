@extends('layouts.index_layout')

@section('content')

    <section id="menu" style="padding: 60px 0; background-image: url('{{ asset('assets/img/about.jpeg') }}'); background-size: cover; background-position: center; background-attachment: fixed; background-repeat: no-repeat; position: relative;">

        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.4); z-index: 0;"></div>

        <div class="container" style="position: relative; z-index: 1;">
            <div class="text-center mb-5" data-aos="fade-up" data-aos-duration="1000">
                <h2 class="stitle" style="color: #fff;">Our <span>Merchandise</span></h2>
                <div class="sline"></div>
                @if(auth()->check() && auth()->user()->role === 'artist')
                    <div class="mt-3">
                        <a href="{{ url('/merchandise/create') }}" class="btn btn-primary px-4 py-2" style="border-radius: 50px;">+ Add Merch</a>
                    </div>
                @endif
                <form action="{{ url('/merchandise') }}" method="GET" class="mt-4 mb-4">
                   <div class="input-group">
                      <input type="text"name="search"class="form-control"placeholder="Search by name..."value="{{ request('search') }}">
                      <button class="btn btn-dark" type="submit"><i class="bi bi-search"></i> Search</button>
                   </div>
                </form>
                <br>
            </div>

            <div class="row g-4" id="mgrid">
                @foreach($merchandises as $merchandise)
                    <div class="col-sm-6 col-lg-4">
                        <div class="mcard" style="cursor: default;" data-aos="fade-up" data-aos-duration="1000">
                            
                            <div data-bs-toggle="modal" data-bs-target="#modal-{{ $merchandise->id }}" style="cursor: pointer;">
                                <div class="mimg">
                                    @if($merchandise->image_file)
                                        <img src="{{ asset('merchandise_files/' . $merchandise->image_file) }}" alt="{{ $merchandise->name }}" style="width:100%; height:250px; object-fit:cover;">
                                    @endif
                                </div>
                                <div class="mbody">
                                    <div class="mtit">{{ $merchandise->name }}</div>
                                    <p>{{ $merchandise->description }}</p>
                                </div>
                            </div>

                            <div class="mfoot" style="margin-top:20px; padding: 0 20px 20px 20px;">
                                <div class="mprice">RM {{ $merchandise->price }}</div>
                                <div class="small text-muted">Stock: {{ $merchandise->stock }}</div>

                                @if(auth()->check() && auth()->user()->role === 'artist')
                                <div class="mt-3">
                                    <a href="{{ url('/merchandise/' . $merchandise->id . '/edit') }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                    <form action="{{ url('/merchandise/' . $merchandise->id) }}" method="POST" style="display:inline;">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete?')">Delete</button>
                                    </form>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        @foreach($merchandises as $merchandise)
            <div class="modal fade" id="modal-{{ $merchandise->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content" style="border-radius: 25px; border: none; padding: 20px;">
                        <div class="modal-body">
                            <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <img src="{{ asset('merchandise_files/' . $merchandise->image_file) }}" class="img-fluid" style="border-radius: 20px; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                                </div>
                                <div class="col-md-6 p-4">
                                    <h6 style="color: #26aef2; letter-spacing: 1px; text-transform: uppercase; font-size: 1 rem;">Merchandise</h6>
                                    <h2 style="font-family: 'Playfair Display', serif; font-weight: 700; font-size: 3rem; margin-bottom: 15px; color: #000000 !important;">{{ $merchandise->name }}</h2>
                                    <p class="text-muted" style="font-size: 0.95rem; line-height: 1.6;">{{ $merchandise->description }}</p>
                                    <div class="d-flex align-items-center mb-4">
                                        <h3 style="color: #26aef2; font-weight: 700; margin-right: 15px;">RM {{ number_format($merchandise->price, 2) }}</h3>
                                        <span class="badge bg-light text-dark">Stock: {{ $merchandise->stock }}</span>
                                    </div>
                                    <button class="btn" style="background: #26aef2; color: white; width: 100%; padding: 12px; border-radius: 50px; font-weight: 600;">
                                        <i class="bi bi-cart-plus me-2"></i> Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </section>
@endsection