@extends('Layout');


@section('content')

<main id="main">
    <section class="jumbotron text-center" style="background-image: url(assets/img/slide/slide-3.jpg)">
        <div class="container ">
            <h1 class="jumbotron-heading pt-5">Check Your Car!</h1>
            {{-- <p class="lead text-muted mb-0">Contact Page build with Bootstrap 4 !</p> --}}
        </div>
    </section>
    <!-- ======= About Section ======= -->
    <section  class="about">
        <div class="container">

            <div class="row content">
                <div class="col-md-6">
                <form   method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="col-lg-6">
                    <div class="form-group">
                        <strong>Code:</strong>
                        <select class="form-control" name="VehiclesCode" >
                            @foreach($VehiclesCode as $c)
                            <option value="{{ $c->id }}" >{{ $c->CodeName }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <strong>Plate No:</strong>
                        <input type="text" name="Platenumber" class="form-control" placeholder="Plate No">
                    </div>
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0">
                    <button type="submit" class="btn btn-submit">Submit</button>
                </div>

            </form>
        </div>
        <div class="col-md-6">
            @if( !empty($VehNotFound))
            <div class="alert alert-danger">
                {{$VehNotFound}}
            </div>
            @endif

            @if ( !empty($VehFoundNoTicket))
            <div class="alert alert-success">
                @foreach($Vehicle as $v)
                <p>{{ $VehFoundNoTicket }}   {{ $v->CodeName}} {{ $v->Platenumber}}</p>
                @endforeach
            </div>
            @endif
            @if ( !empty($VehFound))
            <div class="alert alert-success">
                <p> {{ $VehFound }}</p>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">PlateNumber</th>
                        <th scope="col">Reason</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Expiry Date</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($Ticket as $t)
                        <tr>
                            <td> {{ $t->CodeName}} {{ $t->Platenumber}}</td>
                            <td> {{ $t->TypeName}}</td>
                            <td> {{ $t->Amount}}</td>
                            <td> {{ $t->ExpiryDate}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        @endif

        </div>
            </div>

        </div>
    </section>
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
                    <a class="btn-get-started animate__animated animate__fadeInUp scrollto" href="#">Check now</a>
                </div>
            </div>
        </div>
    </section>
    <section class="about">

        <h2 class="h1-responsive font-weight-bold text-center my-4">Contact us</h2>
        <p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
            a matter of hours to help you.</p>
            <div class="container">
        <div class="row">
            <div class="col-md-9 mb-md-0 mb-5">
                <form  name="contact-form" action="SubmitForm" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <label for="name" class="">Your name</label>
                                <input type="text" id="name" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <label for="email" class="">Your email</label>
                                <input type="text" id="email" name="email" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="md-form mb-0">
                                <label for="subject" class="">Subject</label>
                                <input type="text" id="subject" name="subject" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="md-form">
                                <label for="message">Your message</label>
                                <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" id="hidesubmit" class="btn btn-primary d-none">hide</button>
                </form>
                <div class="status text-center" style="color:#d9232d !important;" ></div>
                <div class="text-center text-md-left">

                    <a class="btn btn-submit"  style="color:white !important;" onclick="validateForm();">Send</a>
                </div>

            </div>
            <div class="col-md-3 text-center">
                <ul class="list-unstyled mb-0">
                    <li><i class="fa fa-map-marker fa-2x"></i>
                        <p>Beirut, Lebanon</p>
                    </li>
                    <li><i class="fa fa-phone mt-4 fa-2x"></i>
                        <p>+961 70 152 152</p>
                    </li>
                    <li><i class="fa fa-envelope mt-4 fa-2x"></i>
                        <p>contact@dmv.com</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    </section>
    <script>
        function validateForm() {
            var name =  document.getElementById('name').value;
            if (name == "") {
                document.querySelector('.status').innerHTML = "Name cannot be empty";
                return false;
            }
            var email =  document.getElementById('email').value;
            if (email == "") {
                document.querySelector('.status').innerHTML = "Email cannot be empty";
                return false;
            } else {
                var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                if(!re.test(email)){
                    document.querySelector('.status').innerHTML = "Email format invalid";
                    return false;
                }
            }
            var subject =  document.getElementById('subject').value;
            if (subject == "") {
                document.querySelector('.status').innerHTML = "Subject cannot be empty";
                return false;
            }
            var message =  document.getElementById('message').value;
            if (message == "") {
                document.querySelector('.status').innerHTML = "Message cannot be empty";
                return false;
            }
            var btn =  document.getElementById('hidesubmit');
            btn.click();
    }
    </script>
@stop
