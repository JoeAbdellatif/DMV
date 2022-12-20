@extends('Layout');


@section('content')
<section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

            <!-- Slide 1 -->
            <div class="carousel-item active" style="background-image: url(assets/img/slide/slide-1.png)">
                <div class="carousel-container">
                    <div class="container">
                        <h2 class="animate__animated animate__fadeInDown">Road signs</h2>
                        <p class="animate__animated animate__fadeInUp">Traffic signs or road signs are signs erected at the side of or above roads to give instructions or provide information to road users.</p>
                        <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read
                            More</a>
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item" style="background-image: url(assets/img/slide/slide-2.jpg)">
                <div class="carousel-container">
                    <div class="container">
                        <h2 class="animate__animated animate__fadeInDown">Driver's license</h2>
                        <p class="animate__animated animate__fadeInUp">A driver's license is a legal authorization, or the official document confirming such an authorization, for a specific individual to operate one or more types of motorized vehicles. </p>
                        {{-- <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read
                            More</a> --}}
                    </div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item" style="background-image: url(assets/img/slide/slide-3.jpg)">
                <div class="carousel-container">
                    <div class="container">
                        <h2 class="animate__animated animate__fadeInDown">Traffic ticket</h2>
                        <p class="animate__animated animate__fadeInUp">A traffic citation is a summons issued by a law enforcement officer to a person violating a traffic law. A traffic citation is commonly known as a traffic ticket.</p>
                        <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read
                            More</a>
                    </div>
                </div>
            </div>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

    </div>
</section><!-- End Hero -->

<main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container">

            <div class="row content">
                <div class="col-lg-6">
                    <h4>Ticket checker platform</h4>
                    <p>The citation is a piece of paper that describes one or more violations that the person may have committed. On receiving a traffic citation, the accused person should appear before a court to pay an fine associated with the charge or contest the charge.

                        A traffic citation may include one or more violation, depending on the violations made. Traffic citation may be issued for violations such as illegal lane change, speeding, lack of insurance, no fastened seat belt, or a broken tail light</p>
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0">
                    <p>
                        Welcome to our online Ticket checker platform
                    </p>
                    <ul>
                        <li><i class="ri-check-double-line"></i>You may be able to check for tickets using your license plate number or driver's license number.</li>
                    </ul>
                    <p class="fst-italic">
                        Help contribute to a good cause
                    </p>
                    <a class="btn-get-started animate__animated animate__fadeInUp scrollto" href="/CheckTickets">Check now</a>
                </div>
            </div>
        </div>
    </section>
    <!-- End About Section -->




@stop
