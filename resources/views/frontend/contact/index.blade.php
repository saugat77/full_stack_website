@extends('frontend.layouts.main')
@section('content')
    <style>
        .contact-box {
            width: 500px;
            margin-top: 60vh !important;
            margin-bottom: -40vh;
            background-color: white;
            box-shadow: 0 0 20px 0 #999;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            position: relative;
        }

        footer {
            margin-top: -20%;
        }

        #button {
            float: right;
        }
    </style>
    <div class="container contact-box" style="margin: 7%">
        <h1 class="text-center mt-2 ">Contact Us</h1>
        <h3 class="text-center">If You Have Any Query, Feel Free To Contact Us</h3>
        <form action="{{ route('send.message') }}" method="POST">
            @csrf
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <p>Message has been Saved Successfully.</p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="form-group">
                <label for="inputAddress">Name</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}" id="inputAddress"
                    placeholder="Full Name">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="inputEmail4">Email</label>
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" id="inputEmail4"
                    placeholder="Email">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="inputAddress">Contact Number</label>
                <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" id="inputAddress"
                    placeholder="Contact Number">
                @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="inputAddress">Address</label>
                <input type="text" class="form-control" name="address" value="{{ old('address') }}" id="inputAddress"
                    placeholder="Address">
                @error('address')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="inputAddress">Description</label>
                <textarea type="text" class="form-control" name="description" id="inputAddress" placeholder="Description">{{ old('description') }}</textarea>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group row ">
                <div class="col mb-2">
                    <button type="submit" class="btn btn-primary float-right">Send Message</button>
                </div>
            </div>
        </form>
    </div>
@endsection
