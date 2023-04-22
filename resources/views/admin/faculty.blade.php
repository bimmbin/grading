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
                        placeholder="Enter your Last name" pattern="[A-Za-z -]+" required>

                    <label class="font-semibold" for="firstname">First Name</label>
                    <input class="rounded border-blu border py-2 px-3" type="text" id="firstname" name="firstname"
                        placeholder="Enter your First name" pattern="[A-Za-z -]+" required>

                    <label class="font-semibold" for="middlename">Middle Initial</label>
                    <input class="rounded border-blu border py-2 px-3" maxlength="1" type="text" id="middlename"
                        name="middlename" placeholder="Enter your Middle Initial" pattern="[A-Za-z -]+" required>

                    <label class="font-semibold" for="employeeno">Employee Number</label>
                    <input class="rounded border-blu border py-2 px-3" type="number" id="employeeno" name="employeeno"
                        placeholder="Enter your employee no.">


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

        <input class="py-1 w-[100%] border-2 border-blu text-sm md:text-base lg:text-md rounded text-left px-10 self-end sm:w-[30%]" 
                   type="text" id="searchInput" placeholder="Search">
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

                            <button class="ml-3 underline text-blu"
                                onclick="editStudent(

                                        '{{ $faculty->employeeno }}',
                                        '{{ $faculty->lastname }}',
                                        '{{ $faculty->firstname }}',
                                        '{{ $faculty->middlename }}',
                                        '{{ $faculty->department }}',
                                        '{{ $faculty->id }}',

                                        )">
                                Edit
                            </button>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

        <div class="absolute left-0 top-0 w-[100vw] h-[100vh] flex flex-col justify-center items-center hidden"
            id="editDiaglogBox">
            <div class="absolute z-50 bg-white py-5 px-5 rounded-lg ">
                
                <form action="{{ route('admin.editfaculty') }}" method="post" class="flex justify-center items-center">
                    @csrf

                    <div class="flex max-sm:flex-col items-center">
                        <div
                            class="flex w-[53rem] max-sm:w-full  flex-wrap gap-2 justify-center items-center max-sm:flex-col">


                            <div class="flex flex-col max-sm:w-full">
                                <label for="a" class="font-semibold text-sm">Employee No.</label>
                                <input type="text"
                                    class="w-[150px] max-sm:w-full border border-gray-300 py-2 px-3 text-lg rounded-md"
                                    id="a" placeholder="Employee No." name="employeeno">
                            </div>

                            <div class="flex flex-col">
                                <label for="b" class="font-semibold text-sm">Lastname</label>
                                <input type="text"
                                    class="w-[150px] max-sm:w-full border border-gray-300 py-2 px-3 text-lg rounded-md"
                                    id="b" placeholder="Lastname" name="lastname">
                            </div>

                            <div class="flex flex-col">
                                <label for="c" class="font-semibold text-sm">First Name</label>
                                <input type="text"
                                    class="w-[150px] max-sm:w-full border border-gray-300 py-2 px-3 text-lg rounded-md"
                                    id="c" placeholder="First Name" name="firstname">
                            </div>

                            <div class="flex flex-col">
                                <label for="d" class="font-semibold text-sm">Middle Initial</label>
                                <input type="text"
                                    class="w-[150px] max-sm:w-full border border-gray-300 py-2 px-3 text-lg rounded-md"
                                    id="d" placeholder="Middle Initial" name="middlename">
                            </div>


                            <div class="flex flex-col">
                                <label for="e" class="font-semibold text-sm">Department</label>

                                <input type="text"
                                    class="w-[150px] max-sm:w-full border border-gray-300 py-2 px-3 text-lg rounded-md"
                                    id="e" placeholder="Department" name="department">
                            </div>

                            <input type="hidden" id="f" name="id">
                        </div>

                        <div class="flex flex-col gap-2  max-sm:w-full  max-sm:mt-2">
                            <span type="submit" id="cancelBtn"
                                class=" w-[100px] max-sm:w-full bg-gray-400 hover:bg-gray-500 py-2 px-3 text-lg rounded-md text-white text-center cursor-pointer flex-1 flex items-center justify-center">Cancel</span>
                            <button type="submit"
                                class=" w-[100px] max-sm:w-full bg-blu hover:bg-blue-400 py-2 px-3 text-lg rounded-md text-white flex-1">Save</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="absolute bg-black opacity-60 w-[100vw] h-[100vh] z-20" id="bgBlack"></div>

        </div>

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

    function editStudent(a,b,c,d,e,f) {
    document.getElementById("editDiaglogBox").classList.toggle("hidden");


    document.getElementById("a").value = a;
    document.getElementById("b").value = b;
    document.getElementById("c").value = c;
    document.getElementById("d").value = d;
    document.getElementById("e").value = e;
    document.getElementById("f").value = f;
    };

    document.querySelector("#bgBlack").addEventListener("click", function () {

    document.getElementById("editDiaglogBox").classList.toggle("hidden");
    });

    document.querySelector("#cancelBtn").addEventListener("click", function () {

    document.getElementById("editDiaglogBox").classList.toggle("hidden");
    });
@endsection
