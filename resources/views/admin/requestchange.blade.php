@extends('layout.layout')



@section('content')
    <div class="flex flex-col justify-between items-center w-[100%] my-5 gap-3 xl:items-start">
        <h1 class="text-[28px] font-bold text-blu max-lg:text-[20px] max-2xl:text-[23px] max-sm:text-[20px]">
            Change of Grades Request
        </h1>

        <p class="mb-5 text-gray-500">1st Sem S.Y 2022 - 2023</p>

        <input
            class="py-3 w-[100%] border-2 border-blu text-sm md:text-base lg:text-lg font-medium rounded-lg text-left px-10"
            type="text" id="searchInput" class="border-2 border-gray-400 p-2 rounded-md"
            placeholder="Search who you looking for.." />
    </div>

    <div class="bg-white rounded-xl overflow-x-auto pb-5">
        <table class="table-auto text-center w-[700px] text-lg md:w-full">
            <thead class="mt-10 font-bold text-sm md:text-base lg:text-lg font-medium">
                <tr>
                    <th class="pt-8 pb-8">No.</th>
                    <th class="pt-8 pb-8">First Name</th>
                    <th class="pt-8 pb-8">Last Name</th>
                    <th class="pt-8 pb-8">M.I</th>
                    <th class="pt-8 pb-8">Department</th>
                    <th class="pt-8 pb-8">Action</th>
                </tr>
            </thead>

            <tbody class="space-y-6 text-center font-regular text-sm md:text-base lg:text-lg font-medium">
                @foreach ($faculties as $faculty)
                    <tr class="space-y-5">
                        <td class="pb-4 pt-2">{{ $loop->iteration }}</td>
                        <td class="pb-4 pt-2">{{ $faculty->firstname }}</td>
                        <td class="pb-4 pt-2">{{ $faculty->lastname }}</td>
                        <td class="pb-4 pt-2">{{ $faculty->middlename }}</td>
                        <td class="pb-4 pt-2">{{ $faculty->department }}</td>
                        <td class="pb-4 pt-2">
                            <a class="text-blu" href="{{ route('admin.request.list', $faculty->id) }}">view</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection

@section('script')
@endsection
