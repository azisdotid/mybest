@if (Route::has(['middleware' => 'cekdosen']))
<a href="{{ url('/dashboard') }}" class="default-outline-btn wow fadeInUp" data-wow-delay="0.4s" id="downloadBtn">Dashboard <i class="fa fa-angle-right ml-2"></i></a>

@endif  
<x-guest-layout>
    
</x-guest-layout>
<!DOCTYPE html>
<html lang="en">
    <!-- BEGIN: Head -->
    <head>
        <meta charset="utf-8">
        <link href="dist/images/logo.svg" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login MyBest</title>
        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="{{ asset('assets/dist_t/css/app.css')}}" />
        <!-- END: CSS Assets-->
    </head>
    <!-- END: Head -->
    <body class="login">
        <div class="container sm:px-10">
            <div class="block xl:grid grid-cols-2 gap-4">
                <!-- BEGIN: Login Info -->
                <div class="hidden xl:flex flex-col min-h-screen">
                    <a href="" class="-intro-x flex items-center pt-5">
                        <img alt="Midone Tailwind HTML Admin Template" class="w-6" src="{{ asset('assets/img/icon1.jfif')}}">
                        <span class="text-white text-lg ml-3"> My<span class="font-medium">Best</span> </span>
                    </a>
                    
                    <div class="my-auto">
                        <img alt="Midone Tailwind HTML Admin Template" class="-intro-x w-1/2 -mt-16" src="{{ asset('assets/dist_t/images/login3.svg')}}">
                        <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                            eLearning 
                            <br>
                            Universitas Bina Sarana Informatika
                        </div>
                        <div class="-intro-x mt-5 text-lg text-white">Manage all your e-Learning accounts in one place</div>
                    </div>
                </div>
                <!-- END: Login Info -->
                <!-- BEGIN: Login Form -->
                <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                    <div class="my-auto mx-auto xl:ml-20 bg-white xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                        <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                            <x-slot name="logo">
                                {{-- <x-jet-authentication-card-logo /> --}}
                            </x-slot>
                    
                            <x-jet-validation-errors class="mb-4" />
                    
                            @if (session('status'))
                                <div class="mb-4 font-medium text-sm text-green-600">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <hr><br>
                        </h2>
                        <div class="intro-x mt-2 text-gray-500 xl:hidden text-center">MyBest | Universitas Bina Sarana Informatika | Manage all your e-Learning accounts in one place</div>
                        <div class="intro-x mt-8">
                            <form method="POST" action="{{ url('login') }}">
                                @csrf
                    
                                <div>
                                    <x-jet-label for="username" value="{{ __('NIP Dosen / NIM Mahasiswa') }}" />
                                    <x-jet-input id="username" class="block mt-1 w-full" type="number" name="username" :value="old('username')" required autofocus />
                                </div>
                    
                                <div class="mt-4">
                                    <x-jet-label for="password" value="{{ __('Password') }}" />
                                    <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                                    <x-jet-input id="verifikasi" class="block mt-1 w-full" type="hidden" name="verifikasi" value="1" />
                                </div>
                    
                               
                    
                                <div class="flex items-center justify-end mt-4">
                                     @if (Route::has('password.request'))
                                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                            {{ __('Lupa Password ?') }}
                                        </a>
                                    @endif 
                    
                                    <x-jet-button class="ml-4">
                                        {{ __('Masuk') }}
                                    </x-jet-button>
                                </div>
                            </form>
                        </div>
                        
                        <div class="intro-x mt-10 xl:mt-24 text-gray-700 text-center xl:text-left">
                            Copyright © 2020 - 2021 MyBest 
                            <br>
                            <a class="text-theme-1" href="https://www.bsi.ac.id">Universitas Bina Sarana Informatika</a>
                        </div>
                    </div>
                </div>
                <!-- END: Login Form -->
            </div>
        </div>
        <!-- BEGIN: JS Assets-->
        <script src="{{ asset('assets/dist_t/js/app.js')}}"></script>
        <!-- END: JS Assets-->
    </body>
</html>