@extends('layouts.index_layout')

@section('content')

    <section id="menu" style="padding: 60px 0; background-image: url('{{ asset('assets/img/about.jpeg') }}'); background-size: cover; background-position: center center; background-attachment: fixed; background-repeat: no-repeat; position: relative;">
        
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.4); z-index: 0;"></div>

        <div class="container" style="position: relative; z-index: 1;">
            <div class="text-center mb-5" data-aos="fade-up" data-aos-duration="1000">
                <h2 class="stitle" style="color: #fff;">My <span>Music Library</span></h2>
                <div class="sline"></div>
                @if(auth()->check() && auth()->user()->role === 'artist')
                    <div class="mt-3">
                        <a href="{{ url('/music/create') }}" class="btn btn-primary px-4 py-2" style="border-radius: 50px;">
                            + Add Music
                        </a>
                    </div>
                @endif
                <form action="{{ url('/music') }}" method="GET" class="mt-4 mb-4">
                   <div class="input-group">
                     <input type="text"name="search"class="form-control"placeholder="Search by title or artist..."value="{{ request('search') }}">
                     <button class="btn btn-dark" type="submit"><i class="bi bi-search"></i> Search</button>
                   </div>
                </form>
                <br>
            </div>

            <div class="row g-4" id="mgrid">
                @foreach($musics as $music)
                    <div class="col-sm-6 col-lg-4">
                        <div class="mcard" data-aos="fade-up" data-aos-duration="1000">
                            <div class="mimg">
                                @if($music->image_file)
                                    <img src="{{ asset('image_files/' . $music->image_file) }}" alt="{{ $music->title }}">
                                @else
                                    <div class="placeholder-img" style="height: 200px; background: #f0f0f0; display: flex; align-items: center; justify-content: center;">
                                        <i class="bi bi-music-note" style="font-size: 50px; color: #ccc;"></i>
                                    </div>
                                @endif
                            </div>

                            <div class="mbody" style="padding: 20px;">
                                <div class="mtit" style="font-weight: bold; font-size: 1.2rem;">{{ $music->title }}</div>
                                <p>Artist: {{ $music->artist }}<br>Genre: {{ $music->genre }}</p>
                                
                                <a href="{{ asset('audio_files/'.$music->music_file) }}" class="btn btn-success w-100" download>Download</a>
                                
                                @if(auth()->check() && auth()->user()->role === 'artist')
                                    <div class="d-flex mt-2">
                                        <a href="{{ url('/music/' . $music->id . '/edit') }}" class="btn btn-sm btn-outline-primary w-50">Edit</a>
                                        <form action="{{ url('/music/' . $music->id) }}" method="POST" class="w-50">
                                            @csrf 
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger w-100">Delete</button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                        </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection