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
                    <div class="card-header">
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
        <h1 class="manpower_availability d-flex justify-content-center" style="border-radius: 10px;">Manpower
            Availability</h1>
        <div class="manpower-card row row-cols-1 row-cols-md-3 g-4 text-dark bg-light border-dark mb-3">
            <div class="col">
                <div class="card h-100">
                    <img src="{{ asset('assets/images/manpower_availability/1.jpg') }}" class="card-img-top"
                        alt="...">
                    <h1 class="text-center">High Professional</h1>
                    <ul class="text-center list-group list-group-flush" style="margin-left: -50px;">
                        <b>
                            <li class="text-sm">Doctors</li>
                            <li class="text-sm">Engineers</li>
                            <li class="text-sm">Professor</li>
                            <li class="text-sm">Architects, Planners</li>
                            <li class="text-sm">Chartered</li>
                        </b>
                    </ul>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="{{ asset('assets/images/manpower_availability/2.jpg') }}" class="card-img-top"
                        alt="...">
                    <h1 class="text-center">Hotel Personnel</h1>
                    <ul class="text-center list-group list-group-flush" style="margin-left: -50px;">
                        <b>
                            <li class="text-sm">Manager</li>
                            <li class="text-sm">House Keeping Supervisor</li>
                            <li class="text-sm">Chef, Cooks-Commis</li>
                            <li class="text-sm">Bar Boy</li>
                            <li class="text-sm">Bell Boy</li>
                            <li class="text-sm">Kitchen Helpers</li>
                        </b>
                    </ul>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="{{ asset('assets/images/manpower_availability/3.jpeg') }}" class="card-img-top"
                        alt="...">
                    <h1 class="text-center">Office Management</h1>
                    <ul class="text-center list-group list-group-flush" style="margin-left: -50px;">
                        <b>
                            <li class="text-sm">Office Manager</li>
                            <li class="text-sm">Assist Manager</li>
                            <li class="text-sm">Computer Programmer</li>
                            <li class="text-sm">Office Boy</li>

                        </b>
                    </ul>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="{{ asset('assets/images/manpower_availability/4.jpg') }}" class="card-img-top"
                        alt="...">
                    <h1 class="text-center">Skilled</h1>
                    <ul class="text-center list-group list-group-flush" style="margin-left: -50px;">
                        <b>
                            <li class="text-sm">Computer Operators</li>
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
                    <img src="{{ asset('assets/images/manpower_availability/5.jpeg') }}" class="card-img-top"
                        alt="...">
                    <h1 class="text-center">Heavy Duty Operators & Drivers</h1>
                    <ul class="text-center list-group list-group-flush" style="margin-left: -50px;">
                        <b>
                            <li class="text-sm">Operators(Crane,Shovel,Grader,Backhoe and Excavators)</li>
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
                    <img src="{{ asset('assets/images/manpower_availability/6.jpg') }}" class="card-img-top"
                        alt="...">
                    <h1 class="text-center">Construction, Maintenance, Industrial</h1>
                    <ul class="text-center list-group list-group-flush" style="margin-left: -50px;">
                        <b>
                            <li class="text-sm">Supervisor</li>
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
    <footer style="padding-top:0.1%; background-color: #deded5;">
        <div class="container">
            <div class="row ">
                <div class="col-lg-6 col-md-12 mb-4">
                    <h5 class="mb-3" style="letter-spacing: 2px; color: #818963;">Kantipur Overseas Services Pvt Ltd.</h5>
                    <p>
                        P.o Box : 12418, Samakushi, Kathmandu, Nepal <br>

                        Tel : 01-4960615 <br>
                        
                        Fax : +977-01-4360616 <br>
                        
                        Email : <a href="mailto: kantipurovs@gmail.com">kantipurovs@gmail.com</a> <br>
                        
                        Web : www.kantipuroverseas.com.np <br>
                    </p>
                    <h5 class="mb-1" style="letter-spacing: 2px; color: #818963;">Opening hours</h5>
                    <div>       
                                <label>Sun - Fri:</label> 
                                <label class="ml-4">10am - 5pm</label>
                       
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5 class="mb-3" style="letter-spacing: 2px; color: #818963;">Countries of Service</h5>
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
                    <h5 class="mb-3" style="letter-spacing: 2px; color: #818963;">Location</h5>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3531.4746063060866!2d85.31356707505167!3d27.73350372433808!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1920d8b96c3f%3A0xe9f8d70e3da15e83!2sKantipur%20Overseas%20Services%20P.%20Ltd.!5e0!3m2!1sen!2snp!4v1698869958644!5m2!1sen!2snp" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2023 Copyright:
            <a class="text-dark " target="_blank" href="https://kantipuroverseas.com.np/">Kantipur Overseas Pvt. Ltd.</a>
            <div class="float-right"> Developed By: <a target="_blank" href="https://github.com/saugat77">Saugat</a></div>
        </div>
        <!-- Copyright -->
    </footer>

</body>

</html>
