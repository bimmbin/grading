@extends('layout.layout')



@section('content')
    <div class="flex flex-col w-[100%] my-5 gap-3 md:items-start">
        <button id="create-account-btn" class="bg-blu px-7 py-3 text-center text-white rounded hover:bg-opacity-70">
            Create Account
        </button>

        <!-- The popup -->
        <div id="create-account-popup"
            class="fixed top-0 left-0 w-full h-full flex items-center justify-center bg-black bg-opacity-50 hidden">
            <form action="{{ route('admin.createfaculty') }}" method="post"
                class="bg-white p-8 rounded w-[500px] md:w-[600px]">
                @csrf
                <h1 class="text-2xl font-bold text-blu text-center mb-4">
                    Create Faculty Account
                </h1>
                <div class="flex flex-col gap-4">
                    <label class="font-semibold" for="lastname">Last Name</label>
                    <input class="rounded border-blu border py-2 px-3" type="text" id="lastname" name="lastname"
                        placeholder="Enter your Last name" />

                    <label class="font-semibold" for="firstname">First Name</label>
                    <input class="rounded border-blu border py-2 px-3" type="text" id="firstname" name="firstname"
                        placeholder="Enter your First name" />

                    <label class="font-semibold" for="middlename">Middle Initial</label>
                    <input class="rounded border-blu border py-2 px-3" maxlength="1" type="text" id="middlename" name="middlename"
                        placeholder="Enter your Middle Initial" />

                    <label class="font-semibold" for="employeeno">Employee Number</label>
                    <input class="rounded border-blu border py-2 px-3" type="number" id="employeeno" name="employeeno"
                        placeholder="Enter your Last name" />

                    <label class="font-semibold" for="department">Department</label>
                    <select class="rounded border-blu border py-2 px-3" type="text" id="department" name="department"
                        placeholder="Enter your Last name"> 
                        <option value="BSCS">BSCS</option>
                        <option value="BSHM">BSHM</option>
                        <option value="BSC">BSC</option>
                        <option value="BEED">BEED</option>
                        <option value="BSED">BSED</option>
                    </select>

                </div>
                <div class="flex justify-end mt-4">
                    <p id="cancel-btn"
                        class="cursor-pointer bg-gray-400 px-6 py-2 rounded text-white mr-4 hover:bg-opacity-70">
                        Cancel
                    </p>
                    <button id="create-btn" class="bg-blu px-6 py-2 rounded text-white hover:bg-opacity-70">
                        Create
                    </button>
                </div>
            </form>
        </div>

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
                    <th class="pt-8 pb-8">Employee Number</th>
                    <th class="pt-8 pb-8">Last Name</th>
                    <th class="pt-8 pb-8">First Name</th>
                    <th class="pt-8 pb-8">M.I</th>
                    <th class="pt-8 pb-8">Department</th>
                    <th class="pt-8 pb-8">Action</th>
                </tr>
            </thead>

            <tbody class="space-y-6 text-center font-regular text-sm md:text-base lg:text-lg font-medium">
                @foreach ($faculties as $faculty)
                    <tr class="space-y-5">
                        <td class="pb-4 pt-2">{{ $loop->iteration }}</td>
                        <td class="pb-4 pt-2">{{ $faculty->employeeno }}</td>
                        <td class="pb-4 pt-2">{{ $faculty->lastname }}</td>
                        <td class="pb-4 pt-2">{{ $faculty->firstname }}</td>
                        <td class="pb-4 pt-2">{{ $faculty->middlename }}</td>
                        <td class="pb-4 pt-2">{{ $faculty->department }}</td>
                        <td class="pb-4 pt-2">
                            <a class="text-blu" href="{{ route('admin.faculty.loads', $faculty->id) }}">View loads</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection


@section('script')
    $(document).ready(function () {
    // Listen for keyup event on search input
    $("#searchInput").on("keyup", function () {
    var value = $(this).val().toLowerCase(); // Get the search value and convert to lowercase
    $("tbody tr").filter(function () {
    // Loop through each table row
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1); // Show/hide row based on search value
    });
    });
    });

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
@endsection
