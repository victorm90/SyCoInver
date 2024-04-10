@extends('adminlte::page')
@section('title', 'Editar Perfil ')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-800 leading-tight text-center">{{ __('PERFIL DE USUARIO') }}</h2>
@stop

@section('content')
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        @if (Laravel\Fortify\Features::canUpdateProfileInformation())
            @livewire('profile.update-profile-information-form')

            <x-section-border />
        @endif

        @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
            <div class="mt-10 sm:mt-0">
                @livewire('profile.update-password-form')
            </div>

            <x-section-border />
        @endif

        @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
            <div class="mt-10 sm:mt-0">
                @livewire('profile.two-factor-authentication-form')
            </div>

            <x-section-border />
        @endif

        <div class="mt-10 sm:mt-0">
            @livewire('profile.logout-other-browser-sessions-form')
        </div>

        @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
            <x-section-border />

            <div class="mt-10 sm:mt-0">
                @livewire('profile.delete-user-form')
            </div>
        @endif
    </div>
@stop

@section('css')    
    <link rel="stylesheet" href="/css/admin_custom.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
@stop


