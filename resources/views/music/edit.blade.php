@extends('layouts.app')

@section('content')

<section id="menu" style="padding: 60px 0; background-image: url('{{ asset('assets/img/try4.jpeg') }}'); background-size: cover; background-position: center center; background-attachment: fixed; background-repeat: no-repeat; position: relative;">
    
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.4); z-index: 0;"></div>

    <div class="container" style="position: relative; z-index: 1;">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="mcard" style="padding: 30px; background-color: #b3b3b3; border-radius: 20px; ">
                    <h2 class="stitle mb-4 text-center">Edit <span>Music</span></h2>
                    
                    <form method="POST" action="{{ url('/music/' . $music->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" value="{{ $music->title }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Artist</label>
                            <input type="text" name="artist" class="form-control" value="{{ $music->artist }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Genre</label>
                            <input type="text" name="genre" class="form-control" value="{{ $music->genre }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Album Cover</label>
                            @if($music->image_file)
                                <div class="mb-2">
                                    <img src="{{ asset('image_files/' . $music->image_file) }}" style="width:100px; height:100px; object-fit:cover; border-radius:8px;">
                                </div>
                            @endif
                            <input type="file" name="image_file" class="form-control">
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Music File (MP3)</label>
                            <p><small class="text-muted">Current file: {{ $music->music_file }}</small></p>
                            <input type="file" name="music_file" class="form-control" accept=".mp3">
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Save Changes</button>
                        <a href="{{ url('/music') }}" class="btn btn-secondary w-100 mt-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection