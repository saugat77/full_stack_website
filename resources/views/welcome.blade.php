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
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <div class="main">
        <div class="navbar">
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
                        well-established and conventional hiring and personnel selection services, aiming to revolutionize 
                        and adapt in response to the constantly evolving and dynamic global demands, prerequisites, and 
                        criteria set forth by corporations, businesses, and enterprises across the globe. Our relentless 
                        efforts have led us to confront and deal with these shifting needs
                         and requirements by providing universal and international staffing solutions and support on a global scale,
                          ensuring that our offerings are tailored to the specific and varied necessities of organizations in every corner of the world.”
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
</body>

</html>
