@extends('frontend.layouts.alternate')
@section('content')
    <div >
        <div id="content">
            @include('frontend.partials.content')
        </div>
        <div>
            <Welcome />
        </div>
    </div>
@endsection
