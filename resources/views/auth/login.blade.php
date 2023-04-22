@extends('layout.layout')



@section('content')
<div class="bg-center bg-cover bg-repeat h-screen" style="background-image: url('/asset/landing-page-img.png');">
    <div class="flex flex-col justify-center items-center gap-6">
        <h1 class="font-bold text-white mt-14 mb-5 text-center md:text-lg lg:text-2xl"><span class="text-white">Automated Grading System</span> of
            Concepcion Holy Cross 
           College Inc.</h1>


        <div class="w-4/12 max-lg:w-6/12 max-sm:w-11/12 bg-white py-6 px-3 rounded-lg xl:px-6">

            @if (session('status'))
                <div class="bg-red-500 p-4 rounded-lg mb-6 text-white text-center">
                    {{ session('status') }}
                </div>
            @endif


            <form action="{{ route('login') }}" method="post">
                @csrf

                <div class="mb-4">
                    <h1 class="font-bold text-white mb-3 text-2xl"><span class="text-blu">Sign in</h1>

                    <label for="username" class="text-blu text-xs">Email</label>
                    <input type="text-sm " name="username" id="email" placeholder="Username"
                        class="border-2 w-full mt-1 p-2 rounded-lg @error('username') border-red-500 @enderror"
                        value="{{ old('email') }}">


                    @error('username')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <div class="mb-4">
                    <label for="password" class="text-blu text-xs">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password"
                        class="border-2 w-full mt-1 p-2 rounded-lg @error('password') border-red-500 @enderror"
                        value="">

                    @error('password')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="bg-blu text-white px-4 py-2 rounded w-full hover:opacity-70">login</button>
            </form>
        </div>
    </div>
</div>
@endsection

