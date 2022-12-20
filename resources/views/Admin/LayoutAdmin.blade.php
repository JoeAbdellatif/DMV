<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="assets/img/logo.jpg" rel="icon">
    <link href="assets/img/logo.jpg" rel="apple-touch-icon">
    <title>DMV Lebanon</title>
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<style>
    /* Googlefont Poppins CDN Link */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    .sidebar {
        position: fixed;
        height: 100%;
        width: 240px;
        background: #4183c9;
        transition: all 0.5s ease;
    }

    .sidebar.active {
        width: 60px;
    }

    .sidebar .logo-details {
        height: 80px;
        display: flex;
        align-items: center;
    }

    .sidebar .logo-details i {
        font-size: 28px;
        font-weight: 500;
        color: #fff;
        min-width: 60px;
        text-align: center
    }

    .sidebar .logo-details .logo_name {
        color: #fff;
        font-size: 24px;
        font-weight: 500;
    }

    .sidebar .nav-links {
        margin-top: 10px;
    }

    .sidebar .nav-links li {
        position: relative;
        list-style: none;
        height: 50px;
    }

    .sidebar .nav-links li a {
        height: 100%;
        width: 100%;
        display: flex;
        align-items: center;
        text-decoration: none;
        transition: all 0.4s ease;
    }

    .sidebar .nav-links li a.active {
        background: gray;
    }

    .sidebar .nav-links li a:hover {
        background: gray;
    }

    .sidebar .nav-links li i {
        min-width: 60px;
        text-align: center;
        font-size: 18px;
        color: #fff;
    }

    .sidebar .nav-links li a .links_name {
        color: #fff;
        font-size: 15px;
        font-weight: 400;
        white-space: nowrap;
    }

    .sidebar .nav-links .log_out {
        position: absolute;
        bottom: 0;
        width: 100%;
    }

    .home-section {
        position: relative;
        background: #f5f5f5;
        min-height: 100vh;
        width: calc(100% - 240px);
        left: 240px;
        transition: all 0.5s ease;
    }

    .sidebar.active~.home-section {
        width: calc(100% - 60px);
        left: 60px;
    }

    .home-section nav {
        display: flex;
        justify-content: space-between;
        height: 80px;
        background: #fff;
        display: flex;
        align-items: center;
        position: fixed;
        width: calc(100% - 240px);
        left: 240px;
        z-index: 100;
        padding: 0 20px;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
        transition: all 0.5s ease;
    }

    .sidebar.active~.home-section nav {
        left: 60px;
        width: calc(100% - 60px);
    }

    .home-section nav .sidebar-button {
        display: flex;
        align-items: center;
        font-size: 24px;
        font-weight: 500;
    }

    nav .sidebar-button i {
        font-size: 35px;
        margin-right: 10px;
    }

    .home-section nav .search-box {
        position: relative;
        height: 50px;
        max-width: 550px;
        width: 100%;
        margin: 0 20px;
    }

    nav .search-box input {
        height: 100%;
        width: 100%;
        outline: none;
        background: #F5F6FA;
        border: 2px solid #EFEEF1;
        border-radius: 6px;
        font-size: 18px;
        padding: 0 15px;
    }

    nav .search-box .bx-search {
        position: absolute;
        height: 40px;
        width: 40px;
        background: #2697FF;
        right: 5px;
        top: 50%;
        transform: translateY(-50%);
        border-radius: 4px;
        line-height: 40px;
        text-align: center;
        color: #fff;
        font-size: 22px;
        transition: all 0.4 ease;
    }

    .home-section nav .profile-details {
        display: flex;
        align-items: center;
        background: #F5F6FA;
        border: 2px solid #EFEEF1;
        border-radius: 6px;
        height: 50px;
        min-width: 190px;
        padding: 0 15px 0 2px;
    }

    nav .profile-details img {
        height: 40px;
        width: 40px;
        border-radius: 6px;
        object-fit: cover;
    }

    nav .profile-details .admin_name {
        font-size: 15px;
        font-weight: 500;
        color: #333;
        margin: 0 10px;
        white-space: nowrap;
    }

    nav .profile-details i {
        font-size: 25px;
        color: #333;
    }

    .home-section .home-content {
        position: relative;
        padding-top: 104px;
    }

    #AddnewMovie {
        display: flex;
        align-items: center;
    }

    .home-content .overview-boxes {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        padding: 0 20px;
        margin-bottom: 26px;
    }

    .overview-boxes .box {
        display: flex;
        align-items: center;
        justify-content: center;
        width: calc(100% / 4 - 15px);
        background: #fff;
        padding: 15px 14px;
        border-radius: 12px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    }

    .overview-boxes .box-topic {
        font-size: 20px;
        font-weight: 500;
    }

    .home-content .box .number {
        display: inline-block;
        font-size: 35px;
        margin-top: -6px;
        font-weight: 500;
    }

    .home-content .box .indicator {
        display: flex;
        align-items: center;
    }

    .home-content .box .indicator i {
        height: 20px;
        width: 20px;
        background: #8FDACB;
        line-height: 20px;
        text-align: center;
        border-radius: 50%;
        color: #fff;
        font-size: 20px;
        margin-right: 5px;
    }

    .box .indicator i.down {
        background: #e87d88;
    }

    .home-content .box .indicator .text {
        font-size: 12px;
    }

    .home-content .box .cart {
        display: inline-block;
        font-size: 32px;
        height: 50px;
        width: 50px;
        background: #cce5ff;
        line-height: 50px;
        text-align: center;
        color: #66b0ff;
        border-radius: 12px;
        margin: -15px 0 0 6px;
    }

    .home-content .box .cart.two {
        color: #2BD47D;
        background: #C0F2D8;
    }

    .home-content .box .cart.three {
        color: #ffc233;
        background: #ffe8b3;
    }

    .home-content .box .cart.four {
        color: #e05260;
        background: #f7d4d7;
    }

    .home-content .total-order {
        font-size: 20px;
        font-weight: 500;
    }

    .home-content .sales-boxes {
        display: flex;
        justify-content: space-between;
        /* padding: 0 20px; */
    }

    /* left box */
    .home-content .sales-boxes .recent-sales {
        width: 65%;
        background: #fff;
        padding: 20px 30px;
        margin: 0 20px;
        border-radius: 12px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    }

    .home-content .sales-boxes .sales-details {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .sales-boxes .box .title {
        font-size: 24px;
        font-weight: 500;
        /* margin-bottom: 10px; */
    }

    .sales-boxes .sales-details li.topic {
        font-size: 20px;
        font-weight: 500;
    }

    .sales-boxes .sales-details li {
        list-style: none;
        margin: 8px 0;
    }

    .sales-boxes .sales-details li a {
        font-size: 18px;
        color: #333;
        font-size: 400;
        text-decoration: none;
    }

    .sales-boxes .box .button {
        width: 100%;
        display: flex;
        justify-content: flex-end;
    }

    .sales-boxes .box .button a {
        color: #fff;
        background: #0A2558;
        padding: 4px 12px;
        font-size: 15px;
        font-weight: 400;
        border-radius: 4px;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .sales-boxes .box .button a:hover {
        background: #0d3073;
    }

    /* Right box */
    .home-content .sales-boxes .top-sales {
        width: 35%;
        background: #fff;
        padding: 20px 30px;
        margin: 0 20px 0 0;
        border-radius: 12px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    }

    .sales-boxes .top-sales li {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin: 10px 0;
    }

    .sales-boxes .top-sales li a img {
        height: 40px;
        width: 40px;
        object-fit: cover;
        border-radius: 12px;
        margin-right: 10px;
        background: #333;
    }

    .sales-boxes .top-sales li a {
        display: flex;
        align-items: center;
        text-decoration: none;
    }

    .sales-boxes .top-sales li .product,
    .price {
        font-size: 17px;
        font-weight: 400;
        color: #333;
    }

    /* Responsive Media Query */
    @media (max-width: 1240px) {
        .sidebar {
            width: 60px;
        }

        .sidebar.active {
            width: 220px;
        }

        .home-section {
            width: calc(100% - 60px);
            left: 60px;
        }

        .sidebar.active~.home-section {
            /* width: calc(100% - 220px); */
            overflow: hidden;
            left: 220px;
        }

        .home-section nav {
            width: calc(100% - 60px);
            left: 60px;
        }

        .sidebar.active~.home-section nav {
            width: calc(100% - 220px);
            left: 220px;
        }
    }

    @media (max-width: 1150px) {
        .home-content .sales-boxes {
            flex-direction: column;
        }

        .home-content .sales-boxes .box {
            width: 100%;
            overflow-x: scroll;
            margin-bottom: 30px;
        }

        .home-content .sales-boxes .top-sales {
            margin: 0;
        }
    }

    @media (max-width: 1000px) {
        .overview-boxes .box {
            width: calc(100% / 2 - 15px);
            margin-bottom: 15px;
        }
    }

    @media (max-width: 700px) {

        nav .sidebar-button .dashboard,
        nav .profile-details .admin_name,
        nav .profile-details i {
            display: none;
        }

        .home-section nav .profile-details {
            height: 50px;
            min-width: 40px;
        }

        .home-content .sales-boxes .sales-details {
            width: 560px;
        }
    }

    @media (max-width: 550px) {
        .overview-boxes .box {
            width: 100%;
            margin-bottom: 15px;
        }

        .sidebar.active~.home-section nav .profile-details {
            display: none;
        }
    }
    body{margin-top:20px;}

.member-details {
    padding-top: 80px;
    padding-bottom: 80px
}

@media (min-width:992px) {
    .member-details {
        padding-top: 100px;
        padding-bottom: 100px
    }
}

.member-details .member_designation {
    margin-bottom: 30px
}

.member-details .member_designation h2 {
    margin-bottom: 5px;
    margin-top: 25px
}

@media (min-width:768px) {
    .member-details .member_designation h2 {
        margin-top: 0
    }
}

.member-details .member_designation span {
    font-style: italic
}

.member-details .member_desc li {
    display: block;
    float: unset;
    width: 100%
}

.member-details .member_desc li i {
    color: #0cc652;
    font-size: 14px
}

.member-details .member_desc h4 {
    margin-top: 40px
}

.member-details .member_desc p {
    margin-top: 10px
}

.member-details .member_desc .progress-holder {
    margin-top: 30px
}

.member-details .media-box {
    margin-bottom: 20px
}

@media (min-width:992px) {
    .member-details .media-box {
        margin-bottom: 0
    }
}

.member-details .member_contact {
    padding: 40px;
    position: relative;
    margin-top: 40px
}

.member-details .member_contact .media-icon {
    font-size: 32px;
    color: #dae0e6;
    position: relative;
    width: 30px;
    text-align: center;
    float: left;
    margin-right: 15px
}

.member-details .member_contact .media-content {
    padding-left: 0;
    float: left
}

.member-details .member_contact .media-content h5 {
    font-size: 15px
}

.member-details .member_contact .media-content h5,
.member-details .member_contact .media-content a {
    color: #dae0e6
}

@media (min-width:992px) {
    .member-details .member_contact .social-icons {
        text-align: right
    }
}

.member-details .member_contact .social-icons .btn-social {
    width: 40px;
    height: 40px;
    line-height: 40px
}

.member-details .member_contact .social-icons .btn {
    background-color: transparent;
    border: 1px solid;
    border-color: #999;
    color: #dae0e6
}

.member-details .member_contact .social-icons .btn:hover {
    background-color: #0cc652;
    border-color: #0cc652;
    opacity: 1
}

.bg-image-holder,
.bg-image {
    background-size: cover!important;
    background-position: 50% 0!important;
    transition: all .3s linear;
    background: #f5f5f6;
    position: relative
}

.bg-image:before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, .7)
}

.bg-fixed {
    background-attachment: fixed
}

.bg-image .overlay-content {
    position: relative;
    z-index: 5
}


.progress-holder {
    margin-top: 50px
}

.progress-holder .barWrapper .progressText {
    font-size: 15px;
    color: #222
}

.progress-holder .progress {
    margin-bottom: 25px;
    margin-top: 10px;
    overflow: visible;
    background-color: #f5f5f6
}

.progress-holder .progress .progress-bar {
    position: relative
}

.progress-holder .progress .progress-bar:after {
    position: absolute;
    content: '';
    width: 1px;
    height: 33px;
    background-color: #0cc652;
    top: -8px;
    right: 0;
    z-index: 55
}

.img-full {
    width: 100%;
}

p {
    color: #8b8e93;
    font-weight: 300;
    margin-bottom: 0;
    font-size: 14px;
    line-height: 26px;
}


.styled_list {
    margin-top: 15px;
    position: relative;
    display: inline-block
}

@media (min-width:768px) {
    .styled_list {
        margin-top: 15px
    }
}

.styled_list li {
    font-size: 14px;
    line-height: 30px
}

@media (min-width:768px) {
    .styled_list li {
        font-size: 14px;
        float: left;
        width: 50%
    }
}

.styled_list li i {
    margin-right: 10px;
    font-size: 12px
}

.styled_list li a {
    color: #8b8e93
}

@media (min-width:768px) {
    .styled_list li a {
        font-size: 12px
    }
}

@media (min-width:992px) {
    .styled_list li a {
        font-size: 14px
    }
}

ol.styled_list {
    margin-left: 15px
}

ol.styled_list li {
    padding-left: 10px
}
</style>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <span class="logo_name"> </span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="/Admin/Dashboard">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Home</span>
                </a>
            </li>
            <li>
                <a href="/Admin/Vehicles">
                    <i class='bx bx-list-ul'></i>
                    <span class="links_name">Vehicles</span>
                </a>
            </li>
            <li>
                <a href="/Admin/Category">
                    <i class='bx bx-list-ul'></i>
                    <span class="links_name">Categories</span>
                </a>
            </li>
            <li>
                <a href="/Admin/Tickets">
                    <i class='bx bx-list-ul'></i>
                    <span class="links_name">Tickets</span>
                </a>
            </li>

        </ul>
    </div>
    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class='bx bx-menu sidebarBtn'></i>
                <span class="dashboard">Dashboard</span>
            </div>
            {{-- <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search' ></i>
      </div> --}}
            <div class="profile-details">
                <!--<img src="images/profile.jpg" alt="">-->
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ session()->get('userfirstname') }} {{ session()->get('userlastname') }}
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="/Logout">Logout</a>
                    </div>
                </div>
            </div>
        </nav>

        <div class="container home-content">
            @yield('content')
        </div>

    </section>
    <script>
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
            if (sidebar.classList.contains("active")) {
                sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
            } else
                sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
        }
    </script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>
