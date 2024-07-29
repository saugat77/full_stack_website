<html lang="en">

<head>
    <meta name="google-site-verification" content="o0bkoCQH_RkshHTdjesjPhFHkgFd38pNZczZMBgqGyI" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kantipur Overseas Pvt. Ltd</title>
    <link rel="canonical" href="https://kantipuroverseas.com.np/">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <meta name='description' itemprop='description' content='The main objectives of Kantipur Overseas Services Pvt. Ltd. is to
    organize job placement for Nepalese job seekers in the international market in respect of
    solving unemployment crisis in the country and ensure the remarkable portion of remittance
    to Nepal.'>
    <meta property="og:image" content="https://example.com/assets/images/kos-fav.png">
    <meta name='keywords' content="'kantipur overseas ltd','kantipur overseas p. ltd.','manpower', 'kantipur', 'kantipur overseas', 'kant', 'Kantipur', 'KANTIPUR', 'best manpower', 'old manpower', 'saudi', 'qatar', 'dubai', 'Employment', 'Kantipur Overseas', 'Kantipur Manpower Agency', 'Kantipur Recruitment Nepal', 'Kantipur Manpower Services', 'Kantipur Overseas Jobs', 'Kantipur Foreign Employment', 'Kantipur Employment Agency', 'Kantipur Human Resources', 'Kantipur Job Placement', 'Kantipur Workforce Solutions', 'Kantipur Overseas Recruitment', 'Kantipur Nepali Manpower Services', 'Kantipur Overseas Job Placement', 'Kantipur Skilled Manpower', 'Kantipur Professional Manpower', 'Kantipur Staffing Solutions', 'Kantipur Job Opportunities', 'Kantipur Employment Services', 'Kantipur Recruitment Solutions', 'Kantipur Nepali Workers Abroad'">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="{{ asset('assets/images/kos-fav.png') }}" sizes="16x16">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<style>
    *{
        margin: auto !important;
        padding: auto;
    }
    .circle {
        width: 50px;
        /* Set the width and height as needed */
        height: 50px;
        /* Set the width and height as needed */
        background-color: #1f5137;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white !important;
    }

    .clearfix::after {
        content: "";
        clear: both;
        display: table;
    }


</style>
<header>
    <div class="navbar fixed-top bg-light">
        <div class="icon">
            <h2 class="logo">Kantipur Overseas Pvt. Ltd.</h2>
        </div>
        <div class="menu">
            @include('frontend.partials.nav-bar')

        </div>
        <a class="float-right" id="sidebar" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop"
            aria-controls="offcanvasTop"><i class="fa fa-bars fa-2x"></i></a>
        <div class="sidebar-toggle">
            <div class="offcanvas offcanvas-start" tabindex="2" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
                <div>
                    <button type="button" id="sidebar-closebtn" class="btn-close text-reset"
                        data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-header mt-1">
                    <img class="" src="{{ asset('assets/images/kos-fav.png') }}" alt="">
                    <h5 id="offcanvasTopLabel">Kantipur Overseas Pvt. Ltd.</h5>

                </div>
                <div class="offcanvas-body minimized-size-navbar">
                    @include('frontend.partials.nav-bar')
                </div>
            </div>
        </div>

    </div>
</header>

<body>
    <div class="hero">
        <div class="wrapper">
            @yield('content')
        </div>
    </div>

</body>
<footer style="padding-top:0.1%; background-color: #deded5;">
    <div class="container">
        <div class="row ">
            <div class="col-lg-6 col-md-12 mb-4">
                <h3 class="mb-3" style="letter-spacing: 2px; color: #818963;">Kantipur Overseas Services Pvt
                    Ltd.</h3>
                <p>
                    P.o Box : 12418, Samakushi, Kathmandu, Nepal <br>

                    Tel : 01-4960615 <br>

                    Fax : +977-01-4360616 <br>

                    Email : <a href="mailto: kantipurovs@gmail.com">kantipurovs@gmail.com</a> <br>

                    Web : www.kantipuroverseas.com.np <br>
                </p>
                <h4 class="mb-1" style="letter-spacing: 2px; color: #818963;">Opening hours</h4>
                <div>
                    <label>Sun - Fri:</label>
                    <label class="ml-4">10am - 5pm</label>

                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <h3 class="mb-3" style="letter-spacing: 2px; color: #818963;">Countries of Service</h3>
                <ul class="list-unstyled mb-0">
                    <li class="mb-1">
                        <a href="#!" style="color: #4f4f4f;">Saudi Arabia</a>
                    </li>
                    <li class="mb-1">
                        <a href="#!" style="color: #4f4f4f;">Baharain</a>
                    </li>
                    <li class="mb-1">
                        <a href="#!" style="color: #4f4f4f;">Oman</a>
                    </li>
                    <li>
                        <a href="#!" style="color: #4f4f4f;">UAE</a>
                    </li>
                    <li>
                        <a href="#!" style="color: #4f4f4f;">Malaysia</a>
                    </li>
                    <li>
                        <a href="#!" style="color: #4f4f4f;">Kuwait</a>
                    </li>
                    <li>
                        <a href="#!" style="color: #4f4f4f;">Qatar</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <h3 class="mb-3" style="letter-spacing: 2px; color: #818963;">Location</h3>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3531.4746063060866!2d85.31356707505167!3d27.73350372433808!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1920d8b96c3f%3A0xe9f8d70e3da15e83!2sKantipur%20Overseas%20Services%20P.%20Ltd.!5e0!3m2!1sen!2snp!4v1698869958644!5m2!1sen!2snp"
                    width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2023 Copyright:
        <a class="text-dark " target="_blank" href="https://kantipuroverseas.com.np/">Kantipur Overseas Pvt.
            Ltd.</a>
        <div class="float-right"> Developed By: <a target="_blank" href="https://github.com/saugat77">Saugat</a>
        </div>
    </div>
    <!-- Copyright -->
</footer>

</html>
