@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h4>User Map</h4>
            </div>
            <div class="col-lg-6 text-end">
                <button type="button" class="btn btn-warning">Edit User</button>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-3" style="height:500px;overflow-y: auto">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active text-center" aria-current="true">
                        USER DATA
                    </a>
                    <br/>
                    <b>Name</b> {{ $user->name }}
                    <hr>
                    <b>Phone</b> {{ $user->phone }}
                    <hr>
                    <b>Email</b> {{ $user->email }}
                    <hr>
                    <b>CPF</b> {{ $user->cpf }}
                    <br/><br/>
                    <a href="#" class="list-group-item list-group-item-action active text-center" aria-current="true">
                        ADDRESS DATA
                    </a>
                    <br/>
                    <b>CEP</b> {{ $user->address->code }}
                    <hr>
                    <b>Street</b> {{ $user->address->street }}, {{ $user->address->number }}
                    <hr>
                    <b>Bairro</b> {{ $user->address->city }}
                    <hr>
                    <b>State</b> {{ $user->address->state }} / {{ $user->address->uf }}
                    <hr>
                    <b>District</b> {{ $user->address->district }}
                </div>
            </div>
            <div class="col-lg-9">
                MAP
            </div>
        </div>
    </div>
@endsection

