@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h4>User Map</h4>
            </div>
            <div class="col-lg-6 text-end">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editUser">Edit User</button>
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
                    <b>CEP</b> {{ $user->address->cep }}
                    <hr>
                    <b>Endereço</b> {{ $user->address->endereco }}, {{ $user->address->number ?? 0 }}
                    <hr>
                    <b>Bairro</b> {{ $user->address->bairro }}
                    <hr>
                    <b>Cidade/Estado</b> {{ $user->address->cidade }} / {{ $user->address->uf }}
                </div>
            </div>
            <div class="col-lg-9">
                <div id="map"></div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="editUser" tabindex="-1" aria-labelledby="editUserLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editUserLabel">Edit User: {{ $user->name }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" action="{{ route('user.update', $user->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="col-md-6">
                            <label for="name" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                            @error('name')<label class="form-label" style="color:#e55353;">{{ $message }}</label>@enderror
                        </div>

                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                            @error('email')<label class="form-label" style="color:#e55353;">{{ $message }}</label>@enderror
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="form-label">Telefone</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}" required>
                            @error('phone')<label class="form-label" style="color:#e55353;">{{ $message }}</label>@enderror
                        </div>
                        <div class="col-md-6">
                            <label for="cpf" class="form-label">CPF</label>
                            <input type="text" class="form-control" id="cpf" name="cpf" value="{{ $user->cpf }}" required>
                            @error('cpf')<label class="form-label" style="color:#e55353;">{{ $message }}</label>@enderror
                        </div>
                        <hr class="mt-4">
                        <div class="col-8">
                            <label for="endereco" class="form-label">Endereço</label>
                            <input type="text" class="form-control" id="endereco" name="endereco" value="{{ $user->address->endereco }}" required>
                            @error('endereco')<label class="form-label" style="color:#e55353;">{{ $message }}</label>@enderror
                        </div>
                        <div class="col-2">
                            <label for="number" class="form-label">Número</label>
                            <input type="text" class="form-control" id="number" name="number" value="{{ $user->address->number }}" required>
                            @error('number')<label class="form-label" style="color:#e55353;">{{ $message }}</label>@enderror
                        </div>
                        <div class="col-2">
                            <label for="complemento" class="form-label">Complemento</label>
                            <input type="text" class="form-control" id="complemento" name="complemento" value="{{ $user->address->complemento }}">
                        </div>
                        <div class="col-md-4">
                            <label for="bairro" class="form-label">Bairro</label>
                            <input type="text" class="form-control" id="bairro" name="bairro" value="{{ $user->address->bairro }}" required>
                            @error('bairro')<label class="form-label" style="color:#e55353;">{{ $message }}</label>@enderror
                        </div>
                        <div class="col-md-4">
                            <label for="cidade" class="form-label">Cidade</label>
                            <input type="text" class="form-control" id="cidade" name="cidade" value="{{ $user->address->cidade }}" required>
                            @error('cidade')<label class="form-label" style="color:#e55353;">{{ $message }}</label>@enderror
                        </div>
                        <div class="col-md-2">
                            <label for="estado" class="form-label">Estado</label>
                            <input type="text" class="form-control" id="estado" name="estado" maxlength="2" minlength="2" value="{{ $user->address->uf }}" required>
                            @error('estado')<label class="form-label" style="color:#e55353;">{{ $message }}</label>@enderror
                        </div>
                        <div class="col-md-2">
                            <label for="cep" class="form-label">CEP</label>
                            <input type="text" class="form-control" id="cep" name="cep" value="{{ $user->address->cep }}" required>
                            @error('cep')<label class="form-label" style="color:#e55353;">{{ $message }}</label>@enderror
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" id="id_address" name="id_address" value="{{ $user->address->id }}">
                            <input type="hidden" id="id_user" name="id_user" value="{{ $user->id }}">

                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary">Save/Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ asset('js/mapUser.js') }}"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPlj6A5TSLaAUNc3Ud8v7xqtInckvI9Ug&callback=dataUserMap&v=weekly"
        defer
    ></script>
@endpush

