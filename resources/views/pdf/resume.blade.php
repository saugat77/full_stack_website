<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>CV</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</head>
<style>
    * {
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        /* Change the font if needed */
        line-height: 1.22;
        /* Adjust the line height */
        margin: 0;
        padding-left: 10px;
        padding-right: 10px;
        padding-bottom: 5px;
        text-transform: capitalize;
    }

    .underline {
        text-decoration: underline;
    }

    .bold {
        font-weight: bold;
        color: black;
        text-decoration: none;
        margin-left: -8px;
    }

    .max-content-span {
        width: max-content;
        display: inline-block;
    }
</style>

<body>
    <header style="margin-top: 20px">
        <div class="col header left">
            <img src="{{ $europass }}" alt="">
        </div>
        <div class="col header right">
            <img style="float: right; margin-top:-15%; max-width:20%; max-height:30%; margin-right:10%"
                src="{{ $pp_size }}" alt="">
        </div>
    </header>
    <div class="container">
        <div class="top-part">
            <p><a class="bold">Name: {{ $resume->full_name }}<br></a>
                Current Address: {{ $resume->ward }}, {{ $resume->district }}, Nepal </p>
        </div>
        <div class="objective-section">
            <h4 class="underline">Objective</h4>
            <p class="objective-para">To Work in Challenging assignment for an organization by applying my conceptual
                analytical skill that
                helps in growth and achieving the goals of the organization.</p>
        </div>
        <div class="personal-details">
            <h4 class="underline">Personal Details</h4>
            <p>
                <span style="display: inline-block; width: 150px;">Name</span><span class="max-content-span">:
                    {{ $resume->full_name }}</span> <br>
                <span style="display: inline-block; width: 150px;">Father’s Name</span><span class="max-content-span">:
                    {{ $resume->father_name }}</span> <br>
                <span style="display: inline-block; width: 150px;">Date of Birth</span><span class="max-content-span">:
                    {{ $resume->dob }}</span> <br>
                <span style="display: inline-block; width: 150px;">Marital Status</span><span class="max-content-span">:
                    {{ $resume->marital_status }}</span> <br>
                <span style="display: inline-block; width: 150px;">Weight</span><span class="max-content-span">:
                    {{ $reume->weight ?? '55' }} kg</span> <br>
                <span style="display: inline-block; width: 150px;">Height</span><span class="max-content-span">:
                    {{ $resume->height ?? '5.6' }} inch</span> <br>
                <span style="display: inline-block; width: 150px;">Language</span><span class="max-content-span">:
                    English, Hindi & Nepali</span>
                <br>
                <span style="display: inline-block; width: 150px;">Gender</span><span class="max-content-span">:
                    {{ $resume->gender ?? 'Male' }}</span> <br>
                <span style="display: inline-block; width: 150px;">Nationality</span><span class="max-content-span">:
                    Nepalese</span> <br>
            </p>
        </div>
        <div class="passport-details">
            <h4 class="underline">Passport Details</h4>
            <p>
                <span style="display: inline-block; width: 150px;">Passport No.</span><span class="max-content-span">:
                    {{ $resume->passport_number }}</span> <br>
                <span style="display: inline-block; width: 150px;">Date of Issue</span><span class="max-content-span">:
                    {{ $resume->issued_at }}</span> <br>
                <span style="display: inline-block; width: 150px;">Date of Expiry</span><span class="max-content-span">:
                    {{ $resume->expiry_date }}</span><br>
            </p>
        </div>
        <div class="education-section">
            <h4 class="underline">Education</h4>
            <p style="margin-left:3%">SLC Passed</p>
        </div>
        <div class="experience-section">
            <h4 class="underline">Work Experience</h4>
            <ul>
                <li style="font-variant: small-caps;">
                    <p>Worked as<span class="bold">{{ $resume->worked_as }}</span>for
                        {{ $resume->years_of_experience ?? '2' }} years in
                        <span class="bold">{{ $resume->worked_at ?? 'Nepal' }}.</span>
                    </p>.
                </li>
            </ul>
        </div>
        <div class="declaration-section">
            <h4 class="underline">Declaration</h4>

            <ul>
                <li>
                    I hereby declare that all the details written in this CV are True, Compete and correct to the best
                    of my knowledge and belief.
                </li>
            </ul>
        </div>
    </div>

</body>

</html>
