@extends('layout.layout')



@section('content')
<div class="flex absolute w-full top-0 left-0">
    <div class="bg-blu text-white h-screen w-full bg-cover hidden xl:block xl:flex flex-col items-center px-[62px] pt-[73px] gap-[20px] 2xl:justify-center 2xl:pt-0" style="background-image: url('/asset/login-bg-svg.svg');">
        <img class="xl:w-[350px]" src="/asset/login-logo-white.svg" alt="CHCC-Logo">

        <h1 class="font-semibold text-[25px]">Concepcion Holy Cross College Inc.</h1>

        <p class="text-[17px] text-center">Introducing our automated grading system - a cutting-edge solution that is revolutionizing the way we evaluate student work. With our system, you can say goodbye to the tedious task of manually grading assignments and hello to a more efficient and effective way of evaluating student performance.</p>
    </div>


        <div class="bg-white w-full h-screen relative items-center flex flex-col xl:justify-center">

            @if (session('status'))
                <div class="bg-red-500 p-4 rounded-lg mb-6 text-white text-center">
                    {{ session('status') }}
                </div>
            @endif

            <div class="">
                <div class="flex justify-center mt-[60px] xl:mt-[1px] xl:w-[352px] xl:justify-start">
                <img class="sm:w-[279px] xl:hidden" src="/asset/login-logo-blue.svg" alt="CHCC-Logo">
                <img class="hidden xl:block" src="/asset/login-flash-vector.svg" alt="Flash-Vector">
            </div>

            <div class="sm:w-[352px] sm:text-left">
                <h2 class="font-semibold text-[22px] text-center mt-[19px] sm:text-[25px] xl:text-[27px] xl:text-left">Login</h2>
                <p class="text-[12px] font-medium text-center mt-[8px] text-grayish sm:text-[13px] xl:text-[14px] xl:font-thin xl:text-left">Please log in using your account and password.</p>
            </div>

            <form class="mt-5 flex flex-col w-full justify-center gap-[19px] px-[12px] sm:w-[352px] sm:px-0" action="{{ route('login') }}" method="post">
                @csrf


                <div class="flex flex-col">
                    <label for="username" class="text-blu text-[12px] sm:text-[13px] mb-1">Account*</label>
                    <input class="border border-gray-400 rounded h-[43px] px-[16px] text-[11px] sm:text-[12px] xl:h-[46px] xl:text-[13px] rounded-lg @error('username') border-red-500 @enderror" type="text" placeholder="Registerd account" value="{{ old('username') }}" name="username">

                    @error('username')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                
                <div class="flex flex-col">
                    <label for="password" class="text-blu text-[12px] sm:text-[13px] mb-1">Password*</label>
                    <input class="border border-gray-400 rounded h-[43px] px-[16px] text-[11px] sm:text-[12px] xl:h-[46px] xl:text-[13px] rounded-lg @error('password') border-red-500 @enderror" type="password" placeholder="Password" value="{{ old('password') }}" name="password">

                    @error('password')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button class="text-white bg-blu mt-[-5px] h-[42px] rounded hover:opacity-70 text-[12px] sm:text-[13px] xl:text-[14px]">Login</button>

                <div class="flex gap-2 text-[12px] justify-center sm:text-[13px] xl:w-[352px] xl:justify-start">
                    {{-- <h3 class="font-medium">Not registered yet?</h3> <a class="font-medium text-blu hover:opacity-70" href="{{ route('register') }}">Register</a> --}}
                </div>

                
            </form>
            
        </div>
        <div class="bg-blu h-full w-full bg-center bg-cover mt-[116px] xl:hidden" style="background-image: url('/asset/login-graph-svg.svg');">
        </div>
    </div>
</div>
@endsection

