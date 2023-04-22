@extends('layout.layout')



@section('content')
<div class="w-full flex flex-col items-center">
    <div class="w-4/12 max-lg:w-6/12 max-sm:w-11/12 bg-blu p-6 rounded-lg">
        <form action="" method="post">
            @csrf
            <div class="mb-4">
                <label for="username" class="sr-only">Name</label>
                <input type="text" name="username" id="username" placeholder="Username"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('username') border-red-500 @enderror"
                    value="{{ old('username') }}">


            </div>


            {{-- <div class="mb-4">
                <label for="email" class="sr-only">Email</label>
                <input type="text" name="email" id="email" placeholder="Your email"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email') border-red-500 @enderror"
                    value="{{ old('email') }}">

            </div> --}}

            <div class="mb-4">
                <label for="password" class="sr-only">Password</label>
                <input type="password" name="password" id="password" placeholder="Choose a password"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror"
                    value="">
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="sr-only">Password again</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    placeholder="Repeat your password"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password_confirmation') border-red-500 @enderror"
                    value="">


            </div>
            <input type="hidden" name="role" id="role" value="admin">
            <button type="submit" class="bg-white text-black px-4 py-3 rounded font-medium w-full">Register</button>
        </form>
    </div>
</div>
    
@endsection

