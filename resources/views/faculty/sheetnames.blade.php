@extends('layout.layout')



@section('content')
    <div class="flex flex-col justify-between items-center w-[100%] my-5 gap-3">
        <form class="flex justify-center mt-10 text-sm w-[80%]">
            <select class="w-[100%] h-16 py-3 border-2 border-blue-800 rounded-lg px-3 cursor-pointer" name="selectOption"
                id="selectOption">
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
        </form>

        <div id="report-popup" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-500 bg-opacity-75">
            <form action="{{ route('faculty.generategrade') }}" method="post" enctype="multipart/form-data"
                class="bg-white rounded-lg px-10 py-8 w-auto max-w-max h-fit flex flex-col sm:items-center">
                @csrf
                <h1 class="text-black text-xl mb-4 font-bold text-center lg:text-2xl">
                    Choose Worksheet
                </h1>

                <div
                    class="w-[100%] py-5 px-10 h-full max-h-[600px] border-2 rounded border-blu flex flex-col gap-5 overflow-y-auto">
                    <div class="flex flex-col justify-self-start gap-5">

                        @php
                            $iterate = 0;
                        @endphp
                        @foreach ($sheetnames as $sheetname)
                            @if ($iterate > 4)
                                <div class="flex items-center gap-3">
                                    <input class="form-radio h-6 w-6 cursor-pointer md:h-5 md:w-5" type="radio"
                                        name="sheet" value="{{ $loop->index }}" id="{{ $loop->index }}sheet" />
                                    <label class="cursor-pointer text-sm text-blu font-medium md:text-md lg:text-lg"
                                        for="{{ $loop->index }}sheet">{{ $sheetname }}</label><br />
                                </div>
                            @endif
                            @php
                                $iterate++;
                            @endphp
                        @endforeach

                        <input type="hidden" name="file" value="{{ $file }}">

                    </div>
                </div>
                <button class="bg-blu mt-2 text-sm w-full py-2 rounded text-white hover:opacity-70">
                    Generate
                </button>
            </form>
        </div>
    </div>

    <h1 class="text-[28px] my-5 font-bold text-blu max-lg:text-[20px] max-2xl:text-[23px] max-sm:text-[20px]">
        Select from your Subject loads
    </h1>

    <div class="bg-white round ed-xl overflow-x-auto pb-5">
        <table class="table-auto text-center w-[700px] text-lg md:w-full">
            <thead class="mt-10 font-bold text-sm md:text-base lg:text-lg font-medium bg-tablehead">
                <tr>
                    <th class="pt-8 pb-8">No.</th>
                    <th class="pt-8 pb-8">Code</th>
                    <th class="pt-8 pb-8">Description</th>
                    <th class="pt-8 pb-8">Year</th>
                    <th class="pt-8 pb-8">Section</th>
                    <th class="pt-8 pb-8">Action</th>
                </tr>
            </thead>
            <tbody class="text-center font-regular text-sm md:text-base lg:text-lg font-medium">
                <tr class="bg-white">
                    <td class="pb-4 pt-2">1</td>
                    <td class="pb-4 pt-2">CSE101</td>
                    <td class="pb-4 pt-2">Elective 1</td>
                    <td class="pb-4 pt-2"></td>
                    <td class="pb-4 pt-2">2A</td>
                    <td class="text-blu underline cursor-pointer hover:opacity-70" id="generate-btn">
                        Generate
                    </td>
                </tr>

                <tr class="bg-white">
                    <td class="pb-4 pt-2">1</td>
                    <td class="pb-4 pt-2">CSE101</td>
                    <td class="pb-4 pt-2">Elective 1</td>
                    <td class="pb-4 pt-2"></td>
                    <td class="pb-4 pt-2">2A</td>
                    <td class="text-blu underline cursor-pointer hover:opacity-70" id="generate-btn">
                        Generate
                    </td>
                </tr>

                <tr class="bg-white">
                    <td class="pb-4 pt-2">1</td>
                    <td class="pb-4 pt-2">CSE101</td>
                    <td class="pb-4 pt-2">Elective 1</td>
                    <td class="pb-4 pt-2"></td>
                    <td class="pb-4 pt-2">2A</td>
                    <td class="text-blu underline cursor-pointer hover:opacity-70" id="generate-btn">
                        Generate
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection

@section('script')
@endsection
