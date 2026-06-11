@extends('layouts.home_layout')

@section('content')

<section id="menu" class="contact section" style="padding: 80px 0; background-image: url('{{ asset('assets/img/about.jpeg') }}'); background-size: cover; background-position: center center; background-attachment: fixed; background-repeat: no-repeat; position: relative;">

    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.3); z-index: 0;"></div>

    <div class="container" style="position: relative; z-index: 1;">
        <div class="text-center mb-5" data-aos="fade-up" data-aos-duration="1000">
            <h2 class="stitle">Our <span>Contact</span></h2>
            <div class="sline"</div>
        </div>
        <p class="text-center" style="color: #fff;">Contact us if any inquiries</p>
    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">
            <div class="col-lg-5">
                <div class="info-wrap">
                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                        <i class="bi bi-geo-alt flex-shrink-0"></i>
                        <div>
                            <h3>Address</h3>
                            <p>53100 Kuala Lumpur, Selangor, Malaysia</p>
                        </div>
                    </div>
                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                        <i class="bi bi-telephone flex-shrink-0"></i>
                        <div>
                            <h3>Call Us</h3>
                            <p>+60 19-565 8595</p>
                        </div>
                    </div>
                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                        <i class="bi bi-envelope flex-shrink-0"></i>
                        <div>
                            <h3>Email Us</h3>
                            <p>royaltyfreeworld@gmail.com</p>
                        </div>
                    </div>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.568461708849!2d101.73195977531773!3d3.2503253967451275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc38c4c784196d%3A0x7d674148485295c5!2sInternational%20Islamic%20University%20Malaysia!5e0!3m2!1sen!2smy!4v1717861864570!5m2!1sen!2smy" frameborder="0" width="100%" height="270px" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div> 

            <div class="col-lg-7">
                <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
                    <div class="row gy-4">
                        <div class="col-md-6">
                            <label for="name-field" class="pb-2">Your Name</label>
                            <input type="text" name="name" id="name-field" class="form-control" required="">
                        </div>
                        <div class="col-md-6">
                            <label for="email-field" class="pb-2">Your Email</label>
                            <input type="email" class="form-control" name="email" id="email-field" required="">
                        </div>
                        <div class="col-md-12">
                            <label for="subject-field" class="pb-2">Subject</label>
                            <input type="text" class="form-control" name="subject" id="subject-field" required="">
                        </div>
                        <div class="col-md-12">
                            <label for="message-field" class="pb-2">Message</label>
                            <textarea class="form-control" name="message" rows="10" id="message-field" required=""></textarea>
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="submit">Send Message</button>
                        </div>
                    </div>
                </form>
            </div> 
        </div>
    </div>
</section>

@endsection