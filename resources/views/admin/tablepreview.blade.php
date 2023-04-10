@extends('layout.layout')



@section('content')
    <div class="flex flex-col py-5 px-5 gap-4 md:px-10 xl:flex-row items-center">

        <h1 class="text-blacky font-semibold" style="font-size: clamp(1.1875rem, 0.9375rem + 0.625vw, 1.6875rem);">Excel file
            info</h1>
    </div>

    <form action="{{ route('registerStudent') }}" method="post" class="relative">
        @csrf

        <div class="w-full h-fit pb-28 overflow-x-auto px-3 lg:px-10 xl:px-10 overflow-y-hidden">

            <table id="dataTable"
                class=" table-auto text-center w-[1920px] max-lg:w-[1280px] max-sm:w-[900px] text-lg xl:w-full whitespace-nowrap"
                style="font-size: clamp(0.875rem, 0.75rem + 0.3125vw, 1.125rem); ">
                <thead>
                    <tr class="space-y-3 pl-5">
                        <th class="pl-5">Number</th>
                        <th class="text-left pl-5">Student No.</th>
                        <th class="text-left pl-5">Last Name</th>
                        <th class="text-left pl-5">First Name</th>
                        <th class="text-left pl-5">Middle Name</th>
                        <th class="text-left pl-5">Sex</th>
                        <th class="text-left pl-5">Year</th>
                        <th class="text-left pl-5">Course</th>
                        <th class="text-left pl-5">Section</th>
                    </tr>
                </thead>

                <tbody class="space-y-6 border text-left">

                    @php $headings = 0; @endphp
                    @foreach ($students->rows() as $student)
                        @if ($headings != 0 && $headings != 1)
                            <tr class="border bg-tablebg">
                                <td class="py-2 text-center">
                                    {{ $loop->iteration - 2 }}
                                </td>

                                <td class="pl-5">{{ $student[0] }} <input type="hidden" name="studentno[]"
                                        value="{{ $student[0] }}"></td>

                                <td class="pl-5">{{ $student[1] }} <input type="hidden" name="lastname[]"
                                        value="{{ $student[1] }}"></td>

                                <td class="pl-5">{{ $student[2] }} <input type="hidden" name="firstname[]"
                                        value="{{ $student[2] }}"></td>

                                <td class="pl-5">{{ $student[3] }} <input type="hidden" name="middlename[]"
                                        value="{{ $student[3] }}"></td>

                                <td class="pl-5">{{ $student[5] }} <input type="hidden" name="sex[]"
                                        value="{{ $student[5] }}"></td>

                                <td class="pl-5">{{ substr($student[10], 0, 1) }} <input type="hidden" name="year[]"
                                        value="{{ substr($student[10], 0, 1) }}"></td>

                                <td class="pl-5">{{ $student[8] }} <input type="hidden" name="course[]"
                                        value="{{ $student[8] }}"></td>

                                <td class="pl-5">{{ $student[10] }} <input type="hidden" name="section[]"
                                        value="{{ $student[10] }}"></td>

                            </tr>
                        @endif
                        @php $headings++; @endphp
                    @endforeach

                </tbody>
            </table>
        </div>
        <button
            class="absolute top-0 right-0 mr-[2%] mt-[-3.5rem] py-2 rounded-xl px-2 placeholder:text-sm w-[100px] lg:py-3 lg:w-[150px] bg-blu text-white hover:bg-sky-700">Submit</button>
        {{-- <button class="absolute top-0 right-0 mr-[5%] mt-[-3rem]">submit</button> --}}
    </form>
@endsection
