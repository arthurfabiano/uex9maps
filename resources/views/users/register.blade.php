<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v4.2.1
* @link https://coreui.io
* Copyright (c) 2022 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->
<html lang="en">
<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>CoreUI Free Bootstrap Admin Template</title>
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('assets/favicon/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('assets/favicon/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/favicon/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/favicon/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/favicon/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/favicon/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('assets/favicon/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets/favicon/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/favicon/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/favicon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/favicon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/favicon/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('assets/favicon/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendors styles-->
    <link rel="stylesheet" href="{{ asset('vendors/simplebar/css/simplebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendors/simplebar.css') }}">
    <!-- Main styles for this application-->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- We use those styles to show code examples, you should remove them in your application.-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/prismjs@1.23.0/themes/prism.css">
    <link href="{{ asset('css/examples.css') }}" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        // Shared ID
        gtag('config', 'UA-118965717-3');
        // Bootstrap ID
        gtag('config', 'UA-118965717-5');
    </script>
</head>
<body>
<div class="bg-light min-vh-100 d-flex flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mb-4 mx-4">
                    <form action="{{ route('user.store') }}" method="POST">
                        @csrf
                        <div class="card-body p-4">
                            <h1>Register</h1>
                            <p class="text-medium-emphasis">Create your account</p>
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <svg class="icon">
                                      <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                                    </svg>
                                </span>
                                <input class="form-control" type="text" name="name" placeholder="Your Name" required>
                                @error('name'){{ $message }}@enderror
                            </div>
                            <div class="input-group mb-3"><span class="input-group-text">
                                <svg class="icon">
                                  <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-list-numbered-rtl"></use>
                                </svg></span>
                                <input class="form-control cpf" id="cpf" type="text" name="cpf" placeholder="cpf" required>
                            </div>
                            <div class="input-group mb-3"><span class="input-group-text">
                                <svg class="icon">
                                  <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-phone"></use>
                                </svg></span>
                                <input class="form-control phone" id="phone" type="text" name="phone" placeholder="Your number Phone" required>
                            </div>

                            <div class="input-group mb-3"><span class="input-group-text">
                                <svg class="icon">
                                  <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-envelope-closed"></use>
                                </svg></span>
                                <input class="form-control mycep" id="mycep" type="text" name="mycep" placeholder="Your CEP" required>
                            </div>

                            <div class="input-group mb-3"><span class="input-group-text">
                                <svg class="icon">
                                  <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-envelope-open"></use>
                                </svg></span>
                                <input class="form-control" type="text" name="email" placeholder="Email" required>
                            </div>
                            <div class="input-group mb-3"><span class="input-group-text">
                                <svg class="icon">
                                  <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
                                </svg></span>
                                <input class="form-control" type="password" name="password" placeholder="Password" required>
                            </div>
                            <div class="input-group mb-4"><span class="input-group-text">
                                <svg class="icon">
                                  <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
                                </svg></span>
                                <input class="form-control" type="password" name="repeat_password" placeholder="Repeat password" required>
                            </div>

                            <input type="text" name="cep" id="cep">
                            <input type="text" name="endereco" id="endereco">
                            <input type="text" name="complemento" id="complemento">
                            <input type="text" name="bairro" id="bairro">
                            <input type="text" name="cidade" id="cidade">
                            <input type="text" name="uf" id="uf">
                            <input type="text" name="ddd" id="ddd">

                            <button class="btn btn-block btn-success" type="submit">Create Account</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- CoreUI and necessary plugins-->
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('vendors/@coreui/coreui/js/coreui.bundle.min.js') }}"></script>
<script src="{{ asset('vendors/simplebar/js/simplebar.min.js') }}"></script>
<script>
    $('.cpf').mask('000.000.000-00');
    $('.phone').mask('(00) 0000-0000');
    $('.mycep').mask('00000.000');

    $(document).on('blur', '#mycep', function() {
        const cep = $(this).val();
        const cepClear = cep.replace(/[^\d]+/g,'');
        $.ajax({
            url: 'https://viacep.com.br/ws/'+ cepClear +'/json/',
            method: 'GET',
            datatype: 'json',
            success: function(data) {
                if(data.erro) alert('Address not found!');
                $('#cep').val(data.cep);
                $('#endereco').val(data.logradouro);
                $('#complemento').val(data.complemento);
                $('#bairro').val(data.bairro);
                $('#cidade').val(data.localidade);
                $('#uf').val(data.uf);
                $('#ddd').val(data.ddd);
            },
            error: function(data) {
                alert('CEP not found');
            }
        });
    });
</script>

</body>
</html>
