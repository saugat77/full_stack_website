    <div class="mt-4" id="demand-section">
        <div style="background-color: white !important; width: 100%; display: flex; justify-content: space-between; ">
            <!-- Previous Button -->
            <div>
                <a class="carousel-control-prev-icon" href="#myCarousel" role="button" data-slide="prev" aria-hidden="true"
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
                        @foreach ($demands->chunk(3) as $chunk)
                            <div class="carousel-item py-5 {{ $loop->first ? 'active' : '' }}">
                                <div class="card-deck border-dark mb-3">
                                    @foreach ($chunk as $demand)
                                        <div class="col-sm-4 card fixed-size-card">
                                            <img class="card-img-top" src="{{ $demand->image ?? null }}"
                                                alt="Card image cap">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $demand->description }}</h5>
                                                <p class="card-text">{{ $demand->content }}</p>
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
