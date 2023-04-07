@extends('layout.layout')



@section('content')

    <div class="w-full flex flex-col items-center">
        <div class="w-4/12 max-lg:w-6/12 max-sm:w-11/12 bg-blu p-6 rounded-lg">

            @if (session('status'))
                <div class="bg-red-500 p-4 rounded-lg mb-6 text-white text-center">
                    {{ session('status') }}
                </div>
            @endif


            <form action="{{ route('login') }}" method="post">
                @csrf

                <div class="mb-4">
                    <label for="username" class="sr-only">Email</label>
                    <input type="text" name="username" id="email" placeholder="Username"
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('username') border-red-500 @enderror"
                        value="{{ old('email') }}">


                    @error('username')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <div class="mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password"
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror"
                        value="">

                    @error('password')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="bg-white text-black px-4 py-3 rounded font-medium w-full">login</button>
            </form>
        </div>
    </div>
@endsection

