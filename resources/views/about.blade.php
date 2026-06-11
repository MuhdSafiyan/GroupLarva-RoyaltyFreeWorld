@extends('layouts.home_layout')

@section('content')

<section id="menu" class="about section" style="padding: 80px 0; background-image: url('{{ asset('assets/img/about.jpeg') }}'); background-size: cover; background-position: center center; background-attachment: fixed; background-repeat: no-repeat;position: relative;">

    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.3); z-index: 0;"></div>

    <div class="container" style="position: relative; z-index: 1;">
        <div class="text-center mb-5" data-aos="fade-up" data-aos-duration="1000">
            <h2 class="stitle">About <span>Us</span></h2>
            <div class="sline"/div>
        </div>
        <p class="text-center" style="color: #fff;">A platform that empowers creators to share music, showcase merchandise, and reach a wider audience.</p>
    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="100" style="position: relative; z-index: 1; background: rgba(255, 255, 255, 0.95); padding: 40px; border-radius: 20px; margin-top: 30px; color: #333;">

        <div class="row gy-4 justify-content-center">
            <div class="col-lg-4" style="margin-top: 110px;">
              <img src="{{ asset('assets/img/team.jpeg') }}" class="img-fluid" alt="Team" style="border-radius: 10px;">
            </div>
            <div class="col-lg-8 content">
                <h2 style="color: #111111;">Empowering Independent Creators</h2>
                <p class="fst-italic py-3">
                    Royalty-Free World is a web platform developed to support independent artists by providing a centralized space to share royalty-free music and sell exclusive merchandise. Our goal is to connect creators with listeners through a simple, secure, and user-friendly digital marketplace.
                </p>
                <div class="row">
                    <div class="col-lg-6">
                        <ul>
                            <li><i class="bi bi-chevron-right"></i> <strong>WAN MOHAMED NAZRIN BIN WAN ROSHDAN</strong> <span>2218629</span></li>
                            <li><i class="bi bi-chevron-right"></i> <strong>MUHAMMAD AZRI BIN MOHD FUAD</strong> <span>2413927</span></li>
                            <li><i class="bi bi-chevron-right"></i> <strong>MUHAMMAD SYAHIRAN AFFANDI BIN AZLI</strong> <span>2418369</span></li>
                            <li><i class="bi bi-chevron-right"></i> <strong>MUHAMMAD SAFIYAN BIN HAMZAH</strong> <span>2417743</span></li>
                            <li><i class="bi bi-chevron-right"></i> <strong>WAN MUHAMMAD TAUFIQ BIN WAN SHUBLYE SHAH</strong> <span>2413943</span></li>
                        </ul>
                    </div>
                </div>
                <p class="py-3">
                    Royalty-Free World was created to provide a platform where independent artists can upload royalty-free music and showcase their creative merchandise. Unlike traditional music platforms, our system focuses on supporting emerging creators by giving them direct control over their digital content and products. Through an intuitive interface, users can discover music, download royalty-free tracks, 
                    and purchase merchandise while artists manage their own collections efficiently.
                </p>
            </div>
        </div>
    </div>

</section>

@endsection
