@extends('layouts.app')

@section('content')

<style>
    /* Tukar background box putih */
    .bg-white {
        background-color: #f8f9fa !important;
    }
    .bg-gray-800 {
        background-color: #26aef2 !important;
    }
    .bg-gray-800:hover {
        background-color: #26aef2 !important;
    }
</style>

<section id="profile-section" style="padding: 60px 0; background-image: url('{{ asset('assets/img/try4.jpeg') }}'); background-size: cover; background-position: center center; background-attachment: fixed; background-repeat: no-repeat; position: relative; min-height: 100vh;">
    
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.6); z-index: 0;"></div>

    <div class="container" style="position: relative; z-index: 1;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="mcard" style="padding: 40px; background-color: #b3b3b3; border-radius: 20px;">
                    
                    <h2 class="stitle mb-4 text-center">Account <span>Profile</span></h2>

                    @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                        @livewire('profile.update-profile-information-form')
                        <hr class="my-4">
                    @endif

                    @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                        <div class="mt-4">
                            @livewire('profile.update-password-form')
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</section>

@endsection