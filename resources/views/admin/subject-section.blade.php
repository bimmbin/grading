@extends('layout.layout')



@section('content')
    <div class="flex flex-col w-[100%] my-5 gap-3 md:items-start">
        <div class="flex flex-col gap-8">
            <form action="{{ route('admin.createsection') }}" method="post" enctype="multipart/form-data">
                @csrf
                <h1 class="text-sm lg:text-lg mb-3 font-bold text-blu">
                    Upload section with students
                </h1>

                <input type="file" name="file" id="" />

                <button class="mt-3 bg-blu text-white px-3 py-1 rounded hover:opacity-70">
                    Upload
                </button>
            </form>

            <form action="{{ route('admin.createsubject') }}" method="post" enctype="multipart/form-data">
                @csrf
                <h1 class="text-sm lg:text-lg mb-3 font-bold text-blu">
                    Upload Subject
                </h1>

                <input type="file" name="file" id="" />

                <button class="mt-3 bg-blu text-white px-3 py-1 rounded hover:opacity-70">
                    Upload
                </button>
            </form>
        </div>

        {{-- <input
            class="py-3 w-[100%] mt-5 border-2 border-blu text-sm md:text-base lg:text-lg font-medium rounded-lg text-left px-10"
            type="text" id="searchInput" class="border-2 border-gray-400 p-2 rounded-md"
            placeholder="Search who you looking for.." /> --}}
    </div>
    <div class="flex flex-col gap-2 xl:flex-row">
        <div class="w-full mt-5">
            <h1 class="text-[28px] mb-3 font-bold text-blu max-lg:text-[20px] max-2xl:text-[23px] max-sm:text-[20px]">
                List of Section
            </h1>
            <div class="bg-white rounded-xl overflow-x-auto pb-5">
                <table class="table-auto text-center w-[700px] text-lg md:w-full">
                    <thead class="mt-10 font-bold text-sm md:text-base lg:text-lg font-medium">
                        <tr>
                            <th class="pt-8 pb-8">No.</th>
                            <th class="pt-8 pb-8">Section</th>
                            {{-- <th class="pt-8 pb-8">Action</th> --}}
                        </tr>
                    </thead>

                    <tbody class="space-y-6 text-center font-regular text-sm md:text-base lg:text-lg font-medium">
                        @foreach ($sections as $section)
                            <tr class="space-y-5">
                                <td class="pb-4 pt-2">{{ $loop->iteration }}</td>
                                <td class="pb-4 pt-2">{{ $section->section_name }}</td>
                                {{-- <td class="pb-4 pt-2">
                                    <a class="text-blu hover:opacity-70" href="sub-sec-view.html">view</a>
                                </td> --}}
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

        <div class="w-full mt-5">
            <h1 class="text-[28px] mb-3 font-bold text-blu max-lg:text-[20px] max-2xl:text-[23px] max-sm:text-[20px]">
                List of Subject
            </h1>
            <div class="bg-white rounded-xl overflow-x-auto pb-5">
                <table class="table-auto text-center w-[700px] text-lg md:w-full">
                    <thead class="mt-10 font-bold text-sm md:text-base lg:text-lg font-medium">
                        <tr>
                            <th class="pt-8 pb-8">No.</th>
                            <th class="pt-8 pb-8">Code</th>
                            <th class="pt-8 pb-8">Description</th>
                        </tr>
                    </thead>

                    <tbody class="space-y-6 text-center font-regular text-sm md:text-base lg:text-lg font-medium">
                        @foreach ($subjects as $subject)
                            <tr class="space-y-5">
                                <td class="pb-4 pt-2">{{ $loop->iteration }}</td>
                                <td class="pb-4 pt-2">{{ $subject->subject_code }}</td>
                                <td class="pb-4 pt-2">{{ $subject->subject_description }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- <form action="{{ route('admin.createsection') }}" method="post" enctype="multipart/form-data" class="mt-10">
    @csrf
    <h1>section</h1>
    <input class="border-none" style="font-size: clamp(1.1875rem, 0.9375rem + 0.625vw, 1.6875rem);"
        type="file" name="file">
    <button type="submit" class="">Upload</button>
</form>



<form action="{{ route('admin.createsubject') }}" method="post" enctype="multipart/form-data" class="mt-48">
    @csrf
    <h1>subject</h1>
    <input class="border-none" style="font-size: clamp(1.1875rem, 0.9375rem + 0.625vw, 1.6875rem);"
        type="file" name="file">
    <button type="submit" class="">Upload</button>
</form> --}}
@endsection
