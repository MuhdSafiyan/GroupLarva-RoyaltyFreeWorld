@extends('layouts.app')

@section('content')

  <section id="menu" style="padding: 60px 0; background-image: url('{{ asset('assets/img/try5.jpeg') }}'); background-size: cover; background-position: center center; background-attachment: fixed; background-repeat: no-repeat; position: relative;">
    
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.4); z-index: 0;"></div>

    <div class="container" style="position: relative; z-index: 1;">
      <div class="row justify-content-center">
        <div class="col-md-6">
          
          <div class="mcard" style="padding: 30px; background-color: #b3b3b3;">
            <h2 class="stitle mb-4 text-center">Edit <span>Merchandise</span></h2>
            
            <form method="POST" action="{{ url('/merchandise/' . $merchandise->id) }}" enctype="multipart/form-data">
              @csrf
              @method('PUT')

              <div class="mb-3">
                <label class="form-label">Product Name</label>
                <input type="text" name="name" class="form-control" value="{{ $merchandise->name }}" required>
              </div>

              <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="3">{{ $merchandise->description }}</textarea>
              </div>

              <div class="mb-3">
                <label class="form-label">Price (RM)</label>
                <input type="number" step="0.01" name="price" class="form-control" value="{{ $merchandise->price }}" required>
              </div>

              <div class="mb-3">
                <label class="form-label">Stock</label>
                <input type="number" name="stock" class="form-control" value="{{ $merchandise->stock }}" required>
              </div>

              <div class="mb-4">
                <label class="form-label">Product Image</label>
                @if($merchandise->image_file)
                  <div class="mb-2">
                    <img src="{{ asset('merchandise_files/' . $merchandise->image_file) }}" style="width:100px; height:100px; object-fit:cover; border-radius:8px;">
                  </div>
                @endif
                <input type="file" name="image_file" class="form-control">
              </div>

              <button type="submit" class="btn btn-primary w-100">Save Changes</button>
              <a href="{{ url('/merchandise') }}" class="btn btn-secondary w-100 mt-2">Cancel</a>
            </form>
          </div>
          
        </div>
      </div>
    </div>
  </section>

@endsection