<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <head>
        <meta name="google-site-verification" content="o0bkoCQH_RkshHTdjesjPhFHkgFd38pNZczZMBgqGyI" />
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Kantipur Overseas Pvt. Ltd</title>
        <link rel="canonical" href="https://kantipuroverseas.com.np/">
        <link rel="stylesheet" href="assets/css/app.css">
        <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
        <meta name='description' itemprop='description'
            content='The main objectives of Kantipur Overseas Services Pvt. Ltd. is to
        organize job placement for Nepalese job seekers in the international market in respect of
        solving unemployment crisis in the country and ensure the remarkable portion of remittance
        to Nepal.'>
        <meta property="og:image" content="https://example.com/assets/images/kos-fav.png">
        <meta name='keywords'
            content="'kantipur overseas ltd','kantipur overseas p. ltd.','manpower', 'kantipur', 'kantipur overseas', 'kant', 'Kantipur', 'KANTIPUR', 'best manpower', 'old manpower', 'saudi', 'qatar', 'dubai', 'Employment', 'Kantipur Overseas', 'Kantipur Manpower Agency', 'Kantipur Recruitment Nepal', 'Kantipur Manpower Services', 'Kantipur Overseas Jobs', 'Kantipur Foreign Employment', 'Kantipur Employment Agency', 'Kantipur Human Resources', 'Kantipur Job Placement', 'Kantipur Workforce Solutions', 'Kantipur Overseas Recruitment', 'Kantipur Nepali Manpower Services', 'Kantipur Overseas Job Placement', 'Kantipur Skilled Manpower', 'Kantipur Professional Manpower', 'Kantipur Staffing Solutions', 'Kantipur Job Opportunities', 'Kantipur Employment Services', 'Kantipur Recruitment Solutions', 'Kantipur Nepali Workers Abroad'">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="icon" href="{{ asset('assets/images/kos-fav.png') }}" sizes="16x16">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
</head>
<style>
    .header-links li span {
        position: relative;
        z-index: 0;
    }

    .header-links li span::before {
        content: '';
        position: absolute;
        z-index: -1;
        bottom: 2px;
        left: -4px;
        right: -4px;
        display: block;
        height: 6px;
    }

    .header-links li.active span::before {
        background-color: #fcae04;
    }

    .header-links li:not(.active):hover span::before {
        background-color: #ccc;
    }
</style>

<body>
    @include('frontend.partials.header')
    <main>
        @yield('content')
    </main>
    @include('frontend.partials.footer')
</body>

</html>
