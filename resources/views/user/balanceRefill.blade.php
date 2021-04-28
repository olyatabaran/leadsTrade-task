@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h2>Welcome, {{ $user->name }}</h2>
                <h4>Balance Refill</h4>
                <form method="POST" action="{{ route('user.refillAction') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="balance" class="form-label">Enter the amount</label>
                        <input type="number" step="0.01" class="form-control" id="balance" name="balance">
                    </div>
                    <button type="submit" class="btn btn-primary mb-3">Submit</button>
                </form>
            </div>
            <div class="col-3">
                <h3>Current balance: {{ $user->balance ? $user->balance : 0}}</h3>
            </div>
            <div class="col-3">
                <h3><a href="{{ route('user.invite') }}">Invite person</a> </h3>
            </div>
            <a href="{{ route('logout') }}">Logout</a>
        </div>
    </div>
@endsection
