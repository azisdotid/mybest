@if (Route::has(['middleware' => 'cekdosen']))
<a href="{{ url('/dashboard') }}" class="default-outline-btn wow fadeInUp" data-wow-delay="0.4s" id="downloadBtn">Dashboard <i class="fa fa-angle-right ml-2"></i></a>

@endif  

<x-guest-layout>    
    <x-jet-authentication-card>
        <x-slot name="logo">
            {{-- <x-jet-authentication-card-logo /> --}}
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
        {{-- <center>
            <div class="avatar sm">
                <img src="{{ Storage::url('public/mybest_3.png') }}" class="circle" style="width:250px;height:100px;" alt="btiAdmin"/>
        </div></center> --}}
        <hr><br> 
        <form method="POST" action="{{ url('login') }}">
            @csrf

            <div>
                <x-jet-label for="username" value="{{ __('NIP Dosen / NIM Mahasiswa') }}" />
                <x-jet-input id="username" class="block mt-1 w-full" type="number" name="username" :value="old('username')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
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
    </x-jet-authentication-card>
</x-guest-layout>
