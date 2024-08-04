@extends('frontend.layouts.alternate')
@section('content')
    <section class="container" style="p-4">
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
