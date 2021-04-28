@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h2>Invite person</h2>
                <form method="POST" action="{{ route('user.inviteAction') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Enter email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <button type="submit" class="btn btn-primary mb-3">Submit</button>
                </form>
            </div>
            <div class="col-3">
                <h3><a href="{{ route('user.balanceRefill') }}">Return Back</a> </h3>
            </div>
        </div>
    </div>

@endsection
