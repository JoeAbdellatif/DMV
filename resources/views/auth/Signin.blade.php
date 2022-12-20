<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="assets/img/logo.png" rel="icon">
    <link href="assets/img/logo.png" rel="apple-touch-icon">
    <title>Login</title>


    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<!-- Google Fonts -->
<link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.js"></script>
<!-- Vendor CSS Files -->
<link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
<link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
<link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
<link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
<link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!-- Template Main CSS File -->
<link href="assets/css/style.css" rel="stylesheet">
</head>

<style>
    label{
        color:Black;
        font-weight: bold;
    }
    .SignupButtonn {
        width: 100%;
        Background-color: #4183c9;
        color: white;
        font-weight: bold;
    }
    body{
        background: url('assets/img/main_background.png') no-repeat right 55px #4183c9 fixed;
        padding:6%;
    }
</style>
<body>

    <div class="container mb-5 mt-5 " >
        <div class="row d-flex justify-content-center">
            <div class="col-md-6 mt-5" style="height:60vh;background-color:white; background-repeat: no-repeat; ">
                <div class="container mt-5">
                    @if (session('alertLogin'))
                    <div class="alert alert-danger">
                        {{ session('alertLogin') }}
                    </div>
                @endif
                        <form action="Login" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12 mb-4 pb-2">
                                    <div class="form-outline">
                                        <label class="form-label" for="phoneNumber">Email</label>
                                        <input type="text" id="email" name="email" class="form-control " />
                                        <span
                                            style="color:red; background-color:transparent;">@error('email'){{ $message }}
                                            @enderror</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-4 pb-2">
                                    <div class="form-outline">
                                        <label class="form-label" for="emailAddress">Password</label>
                                        <input type="password" id="emailAddress" name="password"
                                            class="form-control " />
                                        <span
                                            style="color:red; background-color:transparent;">@error('password'){{ $message }}
                                            @enderror</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 pt-2">
                                <input class="btn btn SignupButtonn" type="submit" value="Submit" />
                            </div>
                            @csrf
                        </form>

                </div>
            </div>
        </div>
    </div>


</body>
</html>
