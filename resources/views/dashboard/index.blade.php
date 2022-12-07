@extends('layouts.default')

@section('content')
    <div class="container">
        <h4>Location of users on the map</h4>
        <hr>
        <div class="row">
            <div class="col-lg-3" style="height:500px;overflow-y: auto">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active text-center" aria-current="true">
                        LIST USERS
                    </a>
                    @foreach($myUsers as $user)
                        <a href="{{ route('user.show', $user->id) }}" class="list-group-item list-group-item-action">{{ $user->name }}</a>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-9">
                map
            </div>
        </div>
    </div>
@endsection
