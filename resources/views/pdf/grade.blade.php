@extends('layout.layout')



@section('content')
    <div class="absolute top-0 left-0 h-[100vh] w-[100vw] bg-white">
        <div class="w-[1080px] mx-auto">


            <div class="w-full">
                <h1 class="text-center">CONCEPCION HOLY CROSS COLLEGE, INC.</h1>
                <h1 class="text-center text-xl">CONCEPCION HOLY CROSS COLLEGE, INC.</h1>
                <h1 class="text-center mb-5">Concepcion, Tarlac</h1>

                <h1 class="text-center uppercase font-semibold mb-10">office of the registrar</h1>

                <h1 class="text-center uppercase text-xl font-semibold mb-10">Copy of Grades</h1>
            </div>
            <div class="w-full mb-5">
                <h1 class="">Name: </h1>
                <h1 class="">Course: </h1>
            </div>
            <div class="w-full">
                <h1 class="text-center font-medium">1st Semester, 2021-2022</h1>
                <table class="w-full border border-black">
                    <thead>
                        <tr>
                            <th class="border border-black">CODE</th>
                            <th class="border border-black">DESCRIPTIVE TITLE</th>
                            <th class="border border-black">GRADES</th>
                            <th class="border border-black">UNITS</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($users as $user) --}}
                        <tr>
                            <td class="border border-black">ASDASD</td>
                            <td class="border border-black">ASDASD</td>
                            <td class="border border-black">ASDASD</td>
                            <td class="border border-black">ASDASD</td>
                        </tr>
                        <tr>
                            <td class="border border-black">ASDASD</td>
                            <td class="border border-black">ASDASD</td>
                            <td class="border border-black">ASDASD</td>
                            <td class="border border-black">ASDASD</td>
                        </tr>
                        <tr>
                            <td class="border border-black">ASDASD</td>
                            <td class="border border-black">ASDASD</td>
                            <td class="border border-black">ASDASD</td>
                            <td class="border border-black">ASDASD</td>
                        </tr>
                        <tr>
                            <td class="border border-black">ASDASD</td>
                            <td class="border border-black">ASDASD</td>
                            <td class="border border-black">ASDASD</td>
                            <td class="border border-black">ASDASD</td>
                        </tr>
                      
                        {{-- @endforeach --}}
                    </tbody>
                </table>
                <h1 class="text-center mt-10">Issued this 11th day of July, 2022 for whatever purpose it may serve</h1>
            </div>
            <div class="w-full mt-20">
                <h1 class="text-right">AGAPE AGAPE AGAPE AGAPE</h1>
                <h1 class="text-right">College Registrar</h1>
            </div>
            <div class="w-full mt-10">
                <h1 class="text-left">NOT VALID WITHOUT SEAL</h1>
                <h1 class="text-left">OR WITH ERASURE OR ALTERATION</h1>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
