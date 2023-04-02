@extends('layout.layout')



@section('content')
    <div class="flex flex-col w-[100%] my-5 gap-3 md:items-start whitespace-nowrap">
        <div class="flex">
            <button id="create-account-btn" class="bg-blu px-7 py-3 text-center text-white rounded hover:bg-opacity-70">
                Create Account
            </button>


            <div class="flex w-full p-10 flex-col gap-5 lg:flex-row overflow-x-hidden">

                <form action="{{ route('previewTable') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input class="border-none" style="font-size: clamp(1.1875rem, 0.9375rem + 0.625vw, 1.6875rem);"
                        type="file" name="file">
                    <button type="submit" class="">Upload</button>
                </form>

            </div>
        </div>

        <!-- The popup -->
        <div id="create-account-popup"
            class="fixed top-0 left-0 w-full h-full flex items-center justify-center bg-black bg-opacity-50 hidden">
            <div class="bg-white p-8 rounded w-[500px] md:w-[600px]">
                <h1 class="text-2xl font-bold text-blu text-center mb-4">
                    Create Faculty Account
                </h1>
                <div class="flex flex-col gap-4">
                    <label class="font-semibold" for="name">Last Name</label>
                    <input class="rounded border-blu border py-2 px-3" type="text" id="name" name="name" />

                    <label class="font-semibold" for="name">First Name</label>
                    <input class="rounded border-blu border py-2 px-3" type="text" id="name" name="name" />

                    <label class="font-semibold" for="name">Middle Initial</label>
                    <input class="rounded border-blu border py-2 px-3" type="text" id="name" name="name" />

                    <label class="font-semibold" for="name">Department</label>
                    <input class="rounded border-blu border py-2 px-3" type="text" id="name" name="name" />

                    <label class="font-semibold" for="email">Email</label>
                    <input class="rounded border-blu border py-2 px-3" type="email" id="name" name="name" />

                    <label class="font-semibold" for="password">Password</label>
                    <input class="rounded border-blu border py-2 px-3" type="password" id="name" name="name" />
                </div>
                <div class="flex justify-end mt-4">
                    <button id="cancel-btn" class="bg-gray-400 px-6 py-2 rounded text-white mr-4 hover:bg-opacity-70">
                        Cancel
                    </button>
                    <button id="create-btn" class="bg-blu px-6 py-2 rounded text-white hover:bg-opacity-70">
                        Create
                    </button>
                </div>
            </div>
        </div>

        <input
            class="py-3 w-[100%] border-2 border-blu text-sm md:text-base lg:text-lg font-medium rounded-lg text-left px-10"
            type="text" id="searchInput" class="border-2 border-gray-400 p-2 rounded-md"
            placeholder="Search who you looking for.." />
    </div>

    <div class="bg-white rounded-xl overflow-x-auto pb-5">
        <table class="table-auto text-center w-[1920px] text-lg xl:w-full">
            <thead class="mt-10 font-bold text-sm md:text-base lg:text-lg font-medium">
                <tr>
                    <th class="pt-8 pb-8">No.</th>
                    <th class="">Student No.</th>
                    <th class="">First Name</th>
                    <th class="">Last Name</th>
                    <th class="">Middle Name</th>
                    <th class="">Sex</th>
                    <th class="">Year</th>
                    <th class="">Course</th>
                    <th class="">Section</th>
                </tr>
            </thead>

            <tbody class="space-y-6 text-center font-regular text-sm md:text-base lg:text-lg font-medium">
                @foreach ($students as $student)
                    <tr class="space-y-5">
                        <td class="pb-4 pt-2">{{ ($students->currentPage() - 1) * $students->perPage() + $loop->iteration }}</td>
                        <td class="">{{ $student->studentno }}</td>
                        <td class="">{{ $student->firstname }}</td>
                        <td class="">{{ $student->lastname }}</td>
                        <td class="">{{ $student->middlename }}</td>
                        <td class="">{{ $student->sex }}</td>
                        <td class="">{{ $student->year }}</td>
                        <td class="">{{ $student->course }}</td>
                        <td class="">{{ $student->section }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $students->links() }}
    </div>
@endsection


@section('script')
    const createAccountBtn = document.getElementById("create-account-btn");
    const createAccountPopup = document.getElementById("create-account-popup");

    // Show the popup when the button is clicked
    createAccountBtn.addEventListener("click", () => {
    createAccountPopup.classList.remove("hidden");
    });

    // Hide the popup when the cancel button is clicked
    const cancelBtn = document.getElementById("cancel-btn");
    cancelBtn.addEventListener("click", () => {
    createAccountPopup.classList.add("hidden");
    });

    // Hide the popup when the create button is clicked
    const createBtn = document.getElementById("create-btn");
    createBtn.addEventListener("click", () => {
    createAccountPopup.classList.add("hidden");
    });
@endsection
