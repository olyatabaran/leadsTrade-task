@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h4>Invitation from {{ $user->email }}</h4>
                <br>
                <h5><a href="{{ route('register', ['email' => $email]) }}">Click Here</a></h5>
            </div>
        </div>
    </div>
@endsection
