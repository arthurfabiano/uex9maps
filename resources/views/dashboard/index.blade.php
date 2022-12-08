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
                        <a href="{{ route('user.show', $user->id) }}" class="list-group-item list-group-item-action">
                            <b>Nome:</b> {{ $user->name }}<br/>
                            <b>Tel:</b> {{ $user->phone }}<br/>
                            <b>CPF:</b> {{ $user->cpf }}</p>
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-9">
                <div id="map"></div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ asset('js/mapUsers.js') }}"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPlj6A5TSLaAUNc3Ud8v7xqtInckvI9Ug&callback=dataUsersMap&v=weekly"
        defer
    ></script>
@endpush
