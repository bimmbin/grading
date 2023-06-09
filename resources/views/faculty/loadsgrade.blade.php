@extends('layout.layout')



@section('content')
    <div class="flex flex-col justify-between items-center w-[100%] my-5 gap-3 xl:items-start">
        <h1 class="text-[28px] font-bold text-blu max-lg:text-[20px] max-2xl:text-[23px] max-sm:text-[20px]">
            Submitted Grades
        </h1>

        <p class="mb-5 text-gray-500">1st Sem S.Y 2022 - 2023</p>

        <input class="py-1 w-[100%] border border-blu text-sm md:text-base rounded text-left px-5 self-end sm:w-[30%]" 
        type="text" id="searchInput" placeholder="Search">
    </div>

    <div class="bg-white rounded-xl overflow-x-auto pb-5">
        @if (Auth::user()->role === 'faculty')
        <table class="table-auto text-center w-[700px] text-lg md:w-full">
            <thead class="mt-10 font-bold text-sm md:text-base lg:text-lg font-medium">
                <tr>
                    <th class="pt-8 pb-8">No.</th>
                    <th class="pt-8 pb-8">Code</th>
                    <th class="pt-8 pb-8">Description</th>
                    <th class="pt-8 pb-8">Department</th>
                    <th class="pt-8 pb-8">Section</th>
                    <th class="pt-8 pb-8">Status</th>
                    <th class="pt-8 pb-8">Action</th>
                </tr>
            </thead>

            <tbody class="space-y-6 text-center font-regular text-sm md:text-base lg:text-lg font-medium">

                @foreach ($loads as $load)
                    <tr class="space-y-5">
                        <td class="pb-4 pt-2">{{ $loop->iteration }}</td>
                        <td class="pb-4 pt-2">{{ $load->subject->subject_code }}</td>
                        <td class="pb-4 pt-2">{{ $load->subject->subject_description }}</td>
                        <td class="pb-4 pt-2">{{ $load->section->section_name }}</td>
                        <td class="pb-4 pt-2">{{ $load->profile->department }}</td>
                        <td class="pb-4 pt-2">{{ $load->status }}</td>
                        <td class="pb-4 pt-2">
                            <a class="text-blu" href="{{ route('faculty.grades-view', $load->id) }}">view</a>
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
        @endif

        @if (Auth::user()->role === 'admin')
        <table class="table-auto text-center w-[700px] text-lg md:w-full">
            <thead class="mt-10 font-bold text-sm md:text-base lg:text-lg font-medium">
                <tr>
                    <th class="pt-8 pb-8">No.</th>
                    <th class="pt-8 pb-8">Code</th>
                    <th class="pt-8 pb-8">Description</th>
                    <th class="pt-8 pb-8">Department</th>
                    <th class="pt-8 pb-8">Section</th>
                    <th class="pt-8 pb-8">Status</th>
                    <th class="pt-8 pb-8">Action</th>
                </tr>
            </thead>

            <tbody class="space-y-6 text-center font-regular text-sm md:text-base lg:text-lg font-medium">

                @foreach ($loads->where('status', 'posted') as $load)
                    <tr class="space-y-5">
                        <td class="pb-4 pt-2">{{ $loop->iteration }}</td>
                        <td class="pb-4 pt-2">{{ $load->subject->subject_code }}</td>
                        <td class="pb-4 pt-2">{{ $load->subject->subject_description }}</td>
                        <td class="pb-4 pt-2">{{ $load->section->section_name }}</td>
                        <td class="pb-4 pt-2">{{ $load->profile->department }}</td>
                        <td class="pb-4 pt-2">{{ $load->status }}</td>
                        <td class="pb-4 pt-2">
                            <a class="text-blu" href="{{ route('admin.request-list', $load->id) }}">view</a>
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
        @endif
    </div>
@endsection

@section('script')
@endsection
