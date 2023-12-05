@if (count($demands) >= 1)
    <style>
        #demand-section {
            text-transform: capitalize;
        }

        .heading {
            float: none;
            text-align: center;
            margin-top: 10px;
            display: block;
            background-color: #ff5733;
            border: 0px;
            border-radius: 50px;
            padding: 10px;
            margin: 50px 50px;
            color: white;
        }

        #carousel-container {
            margin-top: -10vh;
            width: fit-content;
            overflow: hidden;

        }
    </style>
    <h1 class="heading text-center">Demands</h1>
    <div class="container mb-4" id="demand-section">
        <div style="background-color: white !important; width: 100%; display: flex; justify-content: space-between; ">
            <!-- Previous Button -->
            <div>
                <a class="carousel-control-prev-icon" href="#myCarousel" role="button" data-slide="prev" aria-hidden="true"
                    style="width:30px;margin-left: -5%; float:left; background-color: black; height:60px; position: absolute; margin-top:10vh">
                    <span class="sr-only">Previous</span></a>
            </div>
            <!-- Next Button -->
            <div style="">
                <a class="carousel-control-next-icon" href="#myCarousel" role="button" data-slide="next"
                    aria-hidden="true"
                    style="width:30px;margin-right: -5% !important; background-color: black; height:60px; float: right;
                    position: absolute; margin-top:10vh">
                    <span class="sr-only">Next</span></a>
            </div>
        </div>
        <div class="container text-center" id="carousel-container">
            <div class="row mx-1">
                <div id="myCarousel" class="carousel slide w-100" data-ride="carousel" data-interval="3000">
                    <div class="carousel-inner" role="listbox">
                        @foreach ($demands->chunk(3) as $chunk)
                            <div class="carousel-item py-3 {{ $loop->first ? 'active' : '' }}">
                                <div class="card-deck text-white bg-light mb-3">
                                    @foreach ($chunk as $demand)
                                        <div class="col-sm-4 card fixed-size-card">
                                            <img class="h-50 card-img-top" src="{{ $demand->image ?? null }}"
                                                alt="Card image cap">
                                            <div class="card-body">
                                                <h4 class="card-title text-center">Demand:-
                                                    <span class="font-weight-bold">{{ $demand->name }}</span>
                                                </h4>
                                                <p class="card-text ">
                                                    Salary :- SR. {{ $demand->salary }} <br>
                                                    Country :- {{ $demand->country }} <br>
                                                    No. of Vacancies :- {{ $demand->number_of_people_needed }}<br>
                                                    {{ $demand->description }}
                                                </p>
                                            </div>
                                            <div class="card-footer">
                                                <small class="text-muted">{{ $demand->last_updated }}</small>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
