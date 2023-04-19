@extends('layout.layout')



@section('content')
    <div class="flex flex-col justify-between items-center w-[100%] my-5 gap-3">

        {{-- <form class="flex justify-center mt-10 text-sm w-[80%]">
      <select class="w-[100%] h-16 py-3 border-2 border-blue-800 rounded-lg px-3 cursor-pointer"
        name="selectOption" id="selectOption">
        <option class="text-center py-2 text-base" value="--Select Semester--">
          --Select Semester--
        </option>

        <option class="bg-blue-800 text-white text-lg" value="1">
          1st Sem S.Y 2021 - 2022
        </option>
        <option class="bg-blue-800 text-white text-lg" value="2">
          2nd Sem S.Y 2021 - 2022
        </option>
        <option class="bg-blue-800 text-white text-lg" value="3">
          1st Sem S.Y 2022 - 2023
        </option>
        <option class="bg-blue-800 text-white text-lg" value="4">
          2nd Sem S.Y 2022 - 2023
        </option>
      </select>
    </form> --}}
        @if (session('message'))
            <div class="bg-red-500 p-4 rounded-lg mb-2 text-lg text-white text-center">
                {{ session('message') }}
            </div>
            @if (session('message2'))
                <div class="bg-red-400 p-4 rounded-lg mb-1 text-white text-center">
                    {{ session('message2') }}
                </div>
            @endif
            @if (session('message3'))
                <div class="bg-red-400 p-4 rounded-lg text-white text-center">
                    {{ session('message3') }}
                </div>
            @endif
        @endif

        <div id="report-popup" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-500 bg-opacity-75 hidden">
            <form action="{{ route('faculty.generategrade') }}" method="post" enctype="multipart/form-data"
                class="bg-white rounded-lg px-5 py-8 w-full h-fit flex flex-col sm:flex-row sm:items-center sm:w-fit">
                @csrf
                <input class="text-black mb-3 sm:mb-0" type="file" name="file" />
                <input type="hidden" id="load-id" name="loading_id">
                <button class="bg-blu text-sm px-4 py-2 rounded text-white hover:opacity-70">
                    Upload
                </button>
            </form>
        </div>

    </div>

    <div class="flex items-center gap-5">
        <h1 class="text-[28px] my-5 font-bold text-blu max-lg:text-[20px] max-2xl:text-[23px] max-sm:text-[20px]">
            Select from your Subject loads
        </h1>
        @if (!$hasgrade)
            <button onclick="generate()" class="bg-blu px-7 py-3 text-center text-white rounded hover:bg-opacity-70">
                Generate
            </button>
        @endif
    </div>


    <div class="bg-white rounded-xl overflow-x-auto pb-5">
        <table class="table-auto text-center w-[700px] text-lg md:w-full">
            <thead class="mt-10 font-bold text-sm md:text-base lg:text-lg font-medium">
                <tr>
                    <th class="pt-8 pb-8">No.</th>
                    <th class="pt-8 pb-8">Code</th>
                    <th class="pt-8 pb-8">Description</th>
                    {{-- <th class="pt-8 pb-8">Year</th> --}}
                    <th class="pt-8 pb-8">Section</th>
                </tr>
            </thead>

            <tbody class="space-y-6 text-center font-regular text-sm md:text-base lg:text-lg font-medium">

                @foreach ($loads as $load)
                    <tr class="space-y-5">
                        <td class="pb-4 pt-2">{{ $loop->iteration }}</td>
                        <td class="pb-4 pt-2">{{ $load->subject->subject_code }}</td>
                        <td class="pb-4 pt-2">{{ $load->subject->subject_description }}</td>
                        {{-- <td class="pb-4 pt-2"></td> --}}
                        <td class="pb-4 pt-2">{{ $load->section->section_name }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection

@section('script')
    const reportPopup = document.getElementById("report-popup");
    const reportForm = document.querySelector("#report-popup form");

    const generateBtns = document.querySelectorAll("#generate-btn");

    function generate() {

    reportPopup.classList.toggle("hidden");
    }


    reportPopup.addEventListener("click", function (event) {
    if (event.target === reportPopup) {
    reportPopup.classList.toggle("hidden");
    }
    });
@endsection
