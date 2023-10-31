<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kantipur Overseas Pvt. Ltd</title>
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<style>
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
</style>

<body>
    <div class="main">
        <div class="navbar fixed-top bg-light mb-3">
            <div class="icon">
                <h2 class="logo">Kantipur Overseas Pvt. Ltd.</h2>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Clients</a></li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="clearfix content col-sm">

                    <h2>
                        Kantipur Overseas Pvt. Ltd.
                    </h2>
                    <p class="par">“We have ardently striven and worked diligently to comprehensively transform the
                        well-established and conventional hiring and personnel selection services, aiming to
                        revolutionize
                        and adapt in response to the constantly evolving and dynamic global demands, prerequisites, and
                        criteria set forth by corporations, businesses, and enterprises across the globe. Our relentless
                        efforts have led us to confront and deal with these shifting needs
                        and requirements by providing universal and international staffing solutions and support on a
                        global scale,
                        ensuring that our offerings are tailored to the specific and varied necessities of organizations
                        in every corner of the world.”
                    </p>
                    <button class="cn"><a href="#">Read More</a></button>
                </div>
                <div class="col-sm">
                    <div id="app" class="wrapper">
                        <Login />

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <h1 class="colorful-heading d-flex justify-content-center">Message from Chairman</h1>
        <div class="row">
            <div class="col-lg-6">
                <p class="h5">
                    <b>Kantipur Overseas Services Pvt. Ltd </b> was envisioned, founded and administered for sustainable
                    growth through a relentless effort by providing capable manpower services to business organizations
                    all over the world. We have a management system with a highly capable team of professionals and have
                    gained consistent stability and growth of human resources despite the crisis in recent years.

                    We are an employment/recruitment company in Kathmandu, Nepal driven towords providing manpower to
                    every job category in Asia, the Middle East and Europe.
            </div>
            <div class="col-lg-6">
                <img src="{{ asset('assets/images/lil-sir.jpg') }}" class="img-fluid" alt="Description">
            </div>

        </div>
    </div>
    <div class="mt-3 company_overview">
        <div class="row">
            <div class="col-sm-4">
                <div class="card text-center">
                    <div class="card-header" >
                        <div class="ml-5 circle" style="margin-left:45% !important">
                            <i class="fa fa-binoculars fa-2x" style="color: white; position: relative;"></i>
                        </div>
                        <h2 class="mt-3">Our Vision</h2>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><b>Kantipur Overseas Services Pvt. Ltd.</b> is committed to providing human
                            resources that helps businesses to accomplish their vision. We understand that labour power
                            is a great asset to any company. KOS is driven by its vision, mission and goal in delivering
                            component labour power to the world.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card text-center">
                    <div class="card-header">
                        <div class="circle" style="margin-left:40%">
                            <i class="fa fa-eye fa-2x" style="color: white; position: relative;"></i>
                        </div>
                        <h2 class="ml-5 mt-3">Company Overview</h2>
                    </div>
                    <div class="card-body">

                        <p class="card-text"><b>Kantipur Overseas Services Pvt. Ltd.</b> one of the leading manpower
                            suppliers of Nepal with the Government Licence No. 167/056//057, has been supplying
                            qualitative and dedicated manpower around the world under the dynamic leadership of its
                            young enterpreneurs.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card text-center">
                    <div class="card-header">
                        <div class="circle" style="margin-left:40%">
                            <i class="fa fa-list fa-2x" style="color: white; position: relative;"></i>
                        </div>
                        <h2 class="mt-3">Objectives</h2>
                    </div>
                    <div class="card-body">
                        <p class="card-text">The main objectives of <b>Kantipur Overseas Services Pvt. Ltd.</b> is to
                            organize job placement for Nepalese job seekers in the international market in respect of
                            solving unemployment crisis in the country and ensure the remarkable portion of remittance
                            to Nepal.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="manpower_availability_div ">
        <h1 class="manpower_availability d-flex justify-content-center" style="border-radius: 10px;">Manpower Availability</h1>
        <div class="manpower-card row row-cols-1 row-cols-md-3 g-4 text-dark bg-light border-dark mb-3">
            <div class="col">
                <div class="card h-100">
                    <img src="{{asset('assets/images/manpower_availability/1.jpg')}}" class="card-img-top" alt="...">
                    <h1 class="text-center" >High Professional</h1>
                    <ul class="text-center list-group list-group-flush" style="margin-left: -50px;">
                      <b> <li class="text-sm">Doctors</li>
                        <li class="text-sm">Engineers</li>
                        <li class="text-sm">Professor</li>
                        <li class="text-sm">Architects, Planners</li>
                        <li class="text-sm">Chartered</li></b> 
                      </ul>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="{{asset('assets/images/manpower_availability/2.jpg')}}" class="card-img-top" alt="...">
                    <h1 class="text-center">Hotel Personnel</h1>
                    <ul class="text-center list-group list-group-flush" style="margin-left: -50px;">
                        <b> <li class="text-sm">Manager</li>
                          <li class="text-sm">House Keeping Supervisor</li>
                          <li class="text-sm">Chef, Cooks-Commis</li>
                          <li class="text-sm">Bar Boy</li>
                          <li class="text-sm">Bell Boy</li>
                          <li class="text-sm">Kitchen Helpers</li></b> 
                        </ul>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="{{asset('assets/images/manpower_availability/3.jpeg')}}" class="card-img-top" alt="...">
                    <h1 class="text-center">Office Management</h1>
                    <ul class="text-center list-group list-group-flush" style="margin-left: -50px;">
                        <b> <li class="text-sm">Office Manager</li>
                          <li class="text-sm">Assist Manager</li>
                          <li class="text-sm">Computer Programmer</li>
                          <li class="text-sm">Office Boy</li>
                         
                        </b> 
                        </ul>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="{{asset('assets/images/manpower_availability/4.jpg')}}" class="card-img-top" alt="...">
                    <h1 class="text-center">Skilled</h1>
                    <ul class="text-center list-group list-group-flush" style="margin-left: -50px;">
                        <b> <li class="text-sm">Computer Operators</li>
                          <li class="text-sm">Laboratory Technicians</li>
                          <li class="text-sm">Software Developer</li>
                          <li class="text-sm">Data Analyst</li>
                          <li class="text-sm">Accountant</li>
                          <li class="text-sm">Documentaion Manager</li>
                        </b> 

                        </ul>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="{{asset('assets/images/manpower_availability/5.jpeg')}}" class="card-img-top" alt="...">
                    <h1 class="text-center">Heavy Duty Operators & Drivers</h1>
                    <ul class="text-center list-group list-group-flush" style="margin-left: -50px;">
                        <b> <li class="text-sm">Operators(Crane,Shovel,Grader,Backhoe and Excavators)</li>
                          <li class="text-sm">Heavy/Light Drivers G.C.C License</li>
                          <li class="text-sm">Mechanics</li>
                          <li class="text-sm">Diesel Mechanics</li>
                          <li class="text-sm">Gasoline Mechanics</li>
                          <li class="text-sm">Auto Electrician Mechanics</li>
                          <li class="text-sm">Seat Maker Daintier Mechanics</li>
                          <li class="text-sm">Concrete mixer operator</li>

                        </b> 
                        </ul>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="{{asset('assets/images/manpower_availability/6.jpg')}}" class="card-img-top" alt="...">
                    <h1 class="text-center">Construction, Maintenance, Industrial</h1>
                    <ul class="text-center list-group list-group-flush" style="margin-left: -50px;">
                        <b> <li class="text-sm">Supervisor</li>
                          <li class="text-sm">Foremen(Electrical)</li>
                          <li class="text-sm">Foremen(Electrical)</li>
                          <li class="text-sm">Welders(Gas, Electric)</li>
                          <li class="text-sm">Scaffolder</li>
                          <li class="text-sm">Block & Bricks Markers</li>
                          <li class="text-sm">Carpenters</li>
                          <li class="text-sm">Mechanics</li>
                        </b> 
                        </ul>
                </div>
            </div>
        </div>
    </div>
    <footer>
        
    <section class="border-b">
        <div class="container">
            <div class="row py-8 ">
                <div class="col-lg-2 col-md-12 ">
                    <div class="text-center">
                        <div class="p-2">
                            <a class="w-fit " href="/">
                                <img class="h-20  mx-auto bg-white rounded-full" src="/images/GBHO-Logo-Final1.png">
                                {{-- @if (settings()->get('site_logo'))
                                    <img class="h-20  mx-auto bg-white rounded-full"
                                        src="{{ asset('storage/'.settings()->get('site_logo')) }}">
                                @endif --}}
                            </a>
                        </div>

                        <p class="text-xs font-normal text-justify text-white font-poppins md:text-center">
                            {{ settings()->get('about_us_short_text') }}
                        </p>
                    </div>
                </div>


                <div class="col-lg-2 col-md-6  footerlist1">


                    <h5 class=" ps-5 text-sm font-medium text-white uppercase font-poppins">Organization</h5>

                    <ul>

                        <p>
                            <li> <a href=""
                                    class=" text-xs ps-5 font-normal text-white font-poppins">Home</a></li>
                        </p>


                        <p>
                            <li> <a href=""
                                    class=" text-xs font-normal text-white  ps-5  font-poppins">About</a></li>
                        </p>


                        <p>
                            <li><a href=""
                                    class=" text-xs font-normal text-white  ps-5  font-poppins">Newsletters</a></li>
                        </p>

                        <p>
                            <li><a href="{{ route('publications') }}"
                                    class=" text-xs font-normal text-white  ps-5  font-poppins">Publications</a></li>
                        </p>

                        <p>
                            <li><a href="{{ route('testimonials') }}"
                                    class=" text-xs font-normal text-white  ps-5  font-poppins">Testimonials</a></li>
                        </p>

                        <p>
                            <li><a href="{{ route('global_network') }}"
                                    class=" text-xs font-normal text-white  ps-5  font-poppins">Global Network</a></li>
                        </p>
                    </ul>

                </div>


                <div class="col-lg-2 col-md-6 footerlist2">

                    <h5 class=" text-sm font-medium text-white uppercase font-poppins">Useful links</h5>
                    <ul>
                        <p>
                            <li>
                                <a href="{{ route('faqs') }}"
                                    class=" text-xs font-normal text-white font-poppins">FAQ</a>
                            </li>
                        </p>

                        <p>
                            <li><a href="{{ route('news') }}"
                                    class=" text-xs font-normal text-white font-poppins">News</a>
                            </li>
                        </p>

                        <p>
                            <li><a href="{{ route('projects') }}"
                                    class="text-xs font-normal text-white font-poppins">Projects</a></li>
                        </p>

                        <p>
                            <li><a href="{{ route('archive') }}"
                                    class=" text-xs font-normal text-white font-poppins">Archive</a></li>
                        </p>

                        <p>
                            <li><a href="{{ route('activities') }}"
                                    class=" text-xs font-normal text-white font-poppins">Activities</a></li>
                        </p>

                        <p>
                            <li><a href="{{ route('download_apps') }}"
                                    class=" text-xs font-normal text-white font-poppins">Download Apps</a></li>
                        </p>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-6 footerlist">

                    <h5 class=" text-sm font-medium text-white uppercase font-poppins">Related</h5>
                    <ul>
                        <p>
                            <li><a href="{{ route('view-issue') }}"
                                    class=" text-xs font-normal text-white font-poppins">Become a Member</a>
                        </p>
                        </li>

                        <p>
                            <li><a href="{{ route('volunteer') }}"
                                    class=" text-xs font-normal text-white font-poppins">Become a Volunteer</a>
                        </p>
                        </li>

                        <p>
                            <li><a href="{{ route('executive_committee') }}"
                                    class=" text-xs font-normal text-white font-poppins">Executive committee</a>
                        </p>
                        </li>

                        <p>
                            <li><a href="{{ route('board_director') }}"
                                    class=" text-xs font-normal text-white font-poppins">Board of Directors</a></li>
                        </p>

                        <p>
                            <li><a href="{{ route('advisory_board') }}"
                                    class=" text-xs font-normal text-white font-poppins">Advisory </a></li>
                        </p>
                        <p>
                            <li><a href="{{ route('priest.register') }}"
                                    class=" text-xs font-normal text-white font-poppins">Be a Registered Priest With
                                    Us</a></li>
                        </p>
                        <p>
                            <li>
                                <a href="{{ route('Founding.members') }}"
                                    class="  text-xs font-normal text-white  ffter font-poppins">ॐ Center Founding
                                    Members Us</a>
                            </li>
                        </p>

                        <p>
                            <li>
                                <a href="{{ route('arati.darshan') }}"
                                    class=" text-xs font-normal text-white font-poppins"> ॐ Center Live Arati Darshan
                                </a>
                            </li>
                        </p>
                    </ul>

                </div>

                <div class="col-lg-2 col-md-6 footerlist">

                    <h5 class=" text-sm font-medium text-white uppercase font-poppins">Legal</h5>
                    <ul>
                        <p>
                            <li><a href="{{ route('bylaws') }}" class=" text-xs font-normal text-white font-poppins">By
                                    Laws</a></li>
                        </p>

                        <p>
                            <li><a href="{{ url('/page/cookie-policy') }}"
                                    class=" text-xs font-normal text-white font-poppins">Cookie Policy</a></li>
                        </p>

                        <p>
                            <li><a href="{{ url('/page/privacy-policy') }}"
                                    class=" text-xs font-normal text-white font-poppins">Privacy Policy</a></li>
                        </p>

                        <p>
                            <li><a href="{{ url('/page/terms-and-condition') }}"
                                    class=" text-xs font-normal text-white font-poppins">Terms & Conditions</a></li>
                        </p>
                        <p>
                            <li><a href="{{ route('carrer_opportunities') }}"
                                    class=" text-xs font-normal text-white font-poppins">Career/Opportunities</a></li>
                        </p>

                    </ul>
                </div>

                <div class="col-lg-2 col-md-12">
                    <div class="text-center">
                        <h5 class="mb-3 text-sm font-medium text-white uppercase font-poppins">We Accept</h5>
                        <div>
                            <div class="flex justify-evenly">
                                <div class="p-2 mr-2">
                                    <a href="#" target="_blank"
                                        class="text-xl text-white no-underline align-items-center">
                                        <img class="h-8" src="{{ asset('assets/img/paypal.png') }}"
                                            alt="" />
                                    </a>
                                </div>
                                <div class="p-2 mr-2">
                                    <a href="#" target="_blank"
                                        class="text-xl text-white no-underline align-items-center">
                                        <img class="h-8" src="{{ asset('assets/img/master-card.png') }}"
                                            alt="" />
                                    </a>
                                </div>
                                <div class="p-2 mr-2">
                                    <a href="#" target="_blank"
                                        class="text-xl text-white no-underline align-items-center">
                                        <img class="h-8" src="{{ asset('assets/img/visa-card.png') }}"
                                            alt="" />
                                    </a>
                                </div>
                            </div>
                            <div class="p-2 mr-2">
                                <a href="#" target="_blank"
                                    class="text-xl text-white no-underline align-items-center">
                                    <img class="h-20 m-auto w-fit " src="/images/Zelle_logo.svg.png" alt="zelle">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-6 lg:hidden">
                <div id="contact" class="py-4 ">
                    <h5 class="mb-3 text-sm font-medium text-white uppercase font-poppins">Contact</h5>

                    <form action="{{ route('contact.send') }}" method="POST">
                        @csrf
                        <div>
                            <span class="text-sm font-semibold tracking-wide text-white uppercase">Full Name <span
                                    style="color:darkred">*</span></span>
                            <input type="text" name="name" value="{{ old('name') }}"
                                class="w-full p-2 border text-red focus:outline-none focus:shadow-outline "
                                placeholder="Full Name">
                        </div>
                        @error('name')
                            <h6 class="font-poppins " style="color:darkred">{{ $message }}</h6>
                        @enderror
                        <div class="mt-2">
                            <span class="text-sm font-semibold tracking-wide text-white uppercase">Email <span
                                    style="color:darkred">*</span></span>
                            <input type="text" name="footer_email" value="{{ old('footer_email') }}"
                                class="w-full p-2 text-gray-900 border focus:outline-none focus:shadow-outline ">
                        </div>
                        @error('footer_email')
                            <h6 class="font-poppins " style="color:darkred">{{ $message }}</h6>
                        @enderror
                        <div class="mt-2">
                            <span class="text-sm font-semibold tracking-wide text-white uppercase ">Mobile <span
                                    style="color:darkred">*</span></span>
                            <input type="text" name="mobile" value="{{ old('mobile') }}"
                                class="w-full p-2 text-gray-900 border phone focus:outline-none focus:shadow-outline "
                                placeholder="(___)___-____" data-slots="_">
                        </div>
                        @error('mobile')
                            <h6 class="font-poppins " style="color:darkred">{{ $message }}</h6>
                        @enderror
                        <script>
                            $(document).ready(function() {
                                $('.phone').inputmask('(999)-999-9999');
                                $('.mobile').inputmask('(999)-999-9999');
                            });
                        </script>
                        <div class="mt-2">
                            <span class="text-sm font-semibold tracking-wide text-white uppercase">Message <span
                                    style="color:darkred">*</span></span>
                            <textarea name="message" class="w-full h-20 p-2 text-gray-900 border focus:outline-none focus:shadow-outline "></textarea>
                        </div>
                        @error('message')
                            <h6 class="font-poppins " style="color:darkred">{{ $message }}</h6>
                        @enderror
                        <div class="mt-2">
                            <button
                                class="flex items-center justify-center w-full p-3 text-sm font-bold tracking-wide text-gray-100 uppercase bg-blue-500 focus:outline-none focus:shadow-outline hover:bg-blue-600"
                                wire:loading.attr="disabled">
                                <svg wire:loading="" wire:target="send"
                                    class="w-2 h-2 mr-3 -ml-1 text-white animate-spin"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="10" cy="10" r="10"
                                        stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>
                                Send Message
                            </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    </footer>
</body>

</html>
