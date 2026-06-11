@extends('layouts.app')

@section('content')

    <section id="menu" style="padding: 60px 0; background-image: url('{{ asset('assets/img/try5.jpeg') }}'); background-size: cover; background-position: center center; background-attachment: fixed; background-repeat: no-repeat; position: relative;">
        
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.4); z-index: 0;"></div>

        <div class="container" style="position: relative; z-index: 1;">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="mcard" style="padding: 30px; background-color: #b3b3b3;">
                        <h2 class="stitle mb-4 text-center">Add <span>Merchandise</span></h2>
                        
                        <form method="POST" action="{{ url('/merchandise') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">Product Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea name="description" class="form-control" rows="3"></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Price (RM)</label>
                                <input type="number" step="0.01" name="price" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Stock</label>
                                <input type="number" name="stock" class="form-control" required>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Product Image</label>
                                <input type="file" name="image_file" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Save Product</button>
                        </form>
                    </div>
                    </div>
            </div>
        </div>
    </section>

@endsection