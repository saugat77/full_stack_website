<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kantipur Overseas Pvt. Ltd</title>
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
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
                <a href="{{ url('backend/dashboard') }}"><li class='transparent-button'>Login</li></a>
            </ul>
        </div>
    </div>


</div>
</body>
</html>
