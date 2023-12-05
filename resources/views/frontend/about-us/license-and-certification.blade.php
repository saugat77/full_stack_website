@extends('frontend.layouts.main')
@section('content')
    <div class="container" style="margin: 10%">
        <h1 class="mb-2">License & Certifications:</h1>
        <div class="card-deck mb-2">
            <div class="card">
                <img class="card-img-top" src="{{ asset('assets/images/license/Licence-Nepali-Front-412x300.jpg') }}"
                    alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">License Nepali Front</h5>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="{{ asset('assets/images/license/Licence-Nepali2-Back-412x300.jpg') }}"
                    alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Licence Nepali Back</h5>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="{{ asset('assets/images/license/Saudi-ID-300x172.jpg') }}"
                    alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Saudi ID</h5>
                </div>
            </div>

        </div>
        <div class="card-deck">
            <div class="card">
                <img class="card-img-top" src="{{ asset('assets/images/license/Licence-Translate-Front-216x300.jpg') }}"
                    alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Licence Translate Front</h5>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="{{ asset('assets/images/license/Licence-Translate2-Back-218x300.jpg') }}"
                    alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Licence Translate Back</h5>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="{{ asset('assets/images/license/PAN-Registration-218x300.jpg') }}"
                    alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">PAN Registration</h5>
                </div>
            </div>

        </div>
    </div>
@endsection
