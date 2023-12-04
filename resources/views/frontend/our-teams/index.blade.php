@extends('frontend.layouts.main')
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
            position: relative;
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

        .card-body {
            /* Your existing styles */
            display: block !important;
            /* Example override using !important */
            /* Other styles */
        }
    </style>
    <section class="container" style="">
        <div class="our-team">
            <h1 class="text-center mb-4">Our Teams</h1>
            <p>
                Kantipur Overseas Services Pvt. Ltd. has its network in many countries in the world and has been supplying
                several manpower to many multinational companies all around the globe. KOS has highly qualified recruitment
                managers with years of overseas experiences test the candidates in knowledge. The company keeps on updated
                databank of candidates for almost all categories so as to personally approve its short listed candidates as
                per the job description and you can have a close look of it’s style of work by your representative whenever
                required. KOS, with a well trained team of efficient staffs.
            </p>
            <div style="background-color: white !important; width: 100%; display: flex; justify-content: space-between; ">
                <!-- Previous Button -->
                <div>
                    <a class="carousel-control-prev-icon" href="#myCarousel" role="button" data-slide="prev"
                        aria-hidden="true"
                        style="margin-left: -5%; float:left; background-color: black; height:60px; position: absolute; margin-top:20%">
                        <span class="sr-only">Previous</span></a>
                </div>
                <!-- Next Button -->
                <div style="">
                    <a class="carousel-control-next-icon" href="#myCarousel" role="button" data-slide="next"
                        aria-hidden="true"
                        style="margin-right: -5% !important; background-color: black; height:60px; float: right;
                        position: absolute; margin-top:20%">
                        <span class="sr-only">Next</span></a>
                </div>
            </div>
            <div class="container text-center my-3">
                <div class="row mx-auto my-auto">
                    <div id="myCarousel" class="carousel slide w-100" data-ride="carousel" data-interval="3000">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item py-5">
                                <div class="card-deck border-dark mb-3">
                                    <div class="col-sm-4 card fixed-size-card">
                                        <img class="card-img-top" src="{{ asset('assets/images/team/1.jpg') }}"
                                            style="height: 90%" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">Lil Bahadur Pun – Chairman</h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 card fixed-size-card">
                                        <img class="card-img-top" src="{{ asset('assets/images/team/2.jpeg') }}"
                                            style="height: 85%" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">Tanka Dahal – International Marketing Director</h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 card fixed-size-card">
                                        <img class="card-img-top"
                                            src="{{ asset('assets/images/team/3.jpg') }}"style="height: 90%"
                                            alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">Prem Bahadur Budha – Director</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item py-5 active">
                                <div class="card-deck border-dark mb-3">
                                    <div class="col-sm-4 card fixed-size-card">
                                        <img class="card-img-top" src="{{ asset('assets/images/team/4.jpg') }}"
                                            style="height: 90%" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">Nabaraj Pandey – Director</h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 card fixed-size-card">
                                        <img class="card-img-top" src="{{ asset('assets/images/team/5.jpg') }}"
                                            style="height: 90%" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">Makar Bahadur Chhantyal – Director</h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 card fixed-size-card">
                                        <img class="card-img-top" src="{{ asset('assets/images/team/6.jpg') }}"
                                            style="height: 90%" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">Jagat Bahadur Gharti – Director</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
