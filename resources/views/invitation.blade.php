@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h4>Invitation from {{ $user->email }}</h4>
                <br>
                <h5><a href="{{ route('register', ['token' => $email]) }}">Click Here</a></h5>
            </div>
        </div>
    </div>
@endsection
