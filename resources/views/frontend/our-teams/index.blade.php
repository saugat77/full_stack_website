@extends('frontend.layouts.main')
@section('content')
    <style>
        footer {
            position: relative;
            /* Other necessary styles */
        }

        .images-our-teams {
            position: relative;
        }

        .card {
            /* Set a fixed height for the cards (optional) */
            height: 400px;
            /* Adjust as needed */

            /* Ensure contents don't overflow */
            overflow: hidden;
        }

        .card img.card-img-top {
            /* Set a fixed size for the images */
            width: 100%;
            height: 100%;
            /* Set the height as desired */

            /* Prevent image distortion */
            object-fit: cover;
        }

        .card {
            object-fit: cover;
        }

        .card-title {
            /* Add styles to make card titles visible */
            color: #333;
            /* Set a color suitable for visibility */
            font-size: 18px;
            /* Adjust the font size as needed */
            margin-bottom: 10px;
            /* Optional: Add spacing between title and content */
        }

        .card-caption {
            /* Add styles to the image caption */
            text-align: center;
            /* Align the caption text */
            margin-top: 10px;
            /* Add spacing between image and caption */
            font-style: italic;
            /* Optional: Style the caption text */
            color: #666;
            /* Optional: Set a color for the caption text */
            font-size: 14px;
            /* Optional: Adjust the font size */
        }
    </style>
    <section class="container" style="">
        <div class="our-team">
            <h1>Our Teams</h1>
            <p>
                Kantipur Overseas Services Pvt. Ltd. has its network in many countries in the world and has been supplying
                several manpower to many multinational companies all around the globe. KOS has highly qualified recruitment
                managers with years of overseas experiences test the candidates in knowledge. The company keeps on updated
                databank of candidates for almost all categories so as to personally approve its short listed candidates as
                per the job description and you can have a close look of it’s style of work by your representative whenever
                required. KOS, with a well trained team of efficient staffs.
            </p>
            <div class="images-our-teams">
                <div class="card-deck mb-3">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('assets/images/team/1.jpg') }}" alt="Card image cap">
                        <p class="card-caption">Caption for Image 1</p>
                    </div>
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('assets/images/team/2.jpeg') }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Card title that wraps to a new line</h5>
                            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                                additional content. This content is a little bit longer.</p>
                        </div>
                    </div>
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('assets/images/team/3.jpg') }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                additional content. This card has even longer content than the first to show that equal
                                height action.</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Last updated 3 mins ago</small>
                        </div>
                    </div>
                </div>
                <div class="card-deck">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('assets/images/team/4.jpg') }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                additional content. This content is a little bit longer.</p>
                        </div>
                    </div>
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('assets/images/team/5.jpg') }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This card has supporting text below as a natural lead-in to additional
                                content.</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Last updated 3 mins ago</small>
                        </div>
                    </div>
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('assets/images/team/6.jpg') }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                additional content. This card has even longer content than the first to show that equal
                                height action.</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Last updated 3 mins ago</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
