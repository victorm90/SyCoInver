<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">

    <!-- Website CSS style -->
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">

    <!-- Website Font style -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

    @vite(['resources/css/estilo.css', 'resources/js/app.js'])

    <title>SysInveC</title>
</head>

<body>
    <div class="container">
        <div class="row main">
            <div class="panel-heading">
                <div class="text-center">
                    <img src="/imagen/log4.png" class="img-responsive img-circle img-thumbnail" width="150"
                        alt="Eniun">
                </div>
            </div>
            <div class="panel-title text-center">
                <h1 class="text-primay text-roboto">SysInveC</h1>
            </div>
            <div class="form-container">
                <x-validation-errors class="mb-4 text-center text-danger" />
                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-center text-green-600 dark:text-green-400">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="main-login main-center">
                    <form method="POST" action="{{ route('login') }}" class="form-horizontal">
                        @csrf
                        <div class="form-group">
                            <label for="usuario" class="cols-sm-2 control-label"
                                value="{{ __('usuario') }}">Usuario</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa"
                                            aria-hidden="true"></i></span>
                                    <input class="form-control" viewBox="0 0 20 20" id="usuario" type="text"
                                        name="usuario" :value="old('usuario')" required autofocus
                                        autocomplete="username" />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="cols-sm-2 control-label"
                                value="{{ __('Password') }}">Contraseña</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock fa-lg"
                                            aria-hidden="true"></i></span>
                                    <input type="password" class="form-control" name="password" id="password"
                                        placeholder="Enter your Password" />
                                </div>
                            </div>
                        </div>
                        <div class="block mt-8">
                            <label for="remember_me" class="flex items-center">
                                <x-checkbox id="remember_me" name="remember" />
                                <span
                                    class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                            </label>
                        </div>
                        <div class="form-group ">
                            <button type="submit" class="btn btn-primary btn-lg btn-block login-button">Iniciar
                                Sesión</button>
                        </div>
                        {{-- @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                            <div class="mt-4">
                                <x-label for="terms">
                                    <div class="flex items-center">
                                        <x-checkbox name="terms" id="terms" required />
                                        <div class="ms-2">
                                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                'terms_of_service' =>
                                                    '<a target="_blank" href="' .
                                                    route('terms.show') .
                                                    '" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">' .
                                                    __('Terms of Service') .
                                                    '</a>',
                                                'privacy_policy' =>
                                                    '<a target="_blank" href="' .
                                                    route('policy.show') .
                                                    '" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">' .
                                                    __('Privacy Policy') .
                                                    '</a>',
                                            ]) !!}
                                        </div>
                                    </div>
                                </x-label>
                            </div>
                        @endif --}}
                    </form>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="assets/js/bootstrap.js"></script>
</body>

</html>
