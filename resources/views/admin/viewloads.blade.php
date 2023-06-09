@extends('layout.layout')



@section('content')
    <div class="flex flex-col w-[100%] my-5 gap-3 md:items-start">
        <button id="create-account-btn" class="bg-blu px-7 py-3 text-center text-white rounded hover:bg-opacity-70">
            Assign Loads
        </button>

        <!-- The popup -->
        <div id="create-account-popup"
            class="fixed top-0 left-0 w-full h-full overflow-y-scroll flex justify-center bg-black bg-opacity-50 pt-20 hidden box-border">
            <form action="{{ route('admin.faculty.assignloads') }}"
                class="bg-white p-8 rounded h-fit w-full md:w-[60rem] flex flex-col gap-5" method="post">
                @csrf
                <h1 class="text-xl font-bold text-blu text-start mb-4">
                    Assign Loads
                </h1>
                <div class="flex flex-col md:flex-row gap-2 whitespace-nowrap">
                    <div class="w-fit py-5 px-10  border-2 rounded border-blu flex flex-col gap-5 overflow-y-auto">
                        <h1 class="text-lg font-bold text-blu text-center">
                            Subject
                        </h1>


                        <select class="py-2 border-2 border-blue-500 rounded-md max-sm:w-11/12 px-5 placeholder:text-sm w-full" name="subject_id">
                            @foreach ($subjects as $subject)
                                <option class="form-radio h-4 w-4 cursor-pointer"
                                    id="cs{{ $loop->index }}" value="{{ $subject->id }}">{{ $subject->subject_code }}
                                    {{ $subject->subject_description }}</option>
                            @endforeach
                        </select>




                        {{-- <div class="flex items-center gap-3">
                            <input class="form-radio h-4 w-4 cursor-pointer" type="radio" name="subject"
                                id="cse101" />
                            <label class="text-sm" for="cse101">asdasdas</label><br />
                        </div> --}}

                    </div>

                    {{-- <div class="w-[12.5rem] py-5 px-10  border-2 rounded border-blu flex flex-col gap-5 overflow-y-auto">
                        <h1 class="text-lg font-bold text-blu text-center">Year</h1>

                        <div class="flex items-center gap-3">
                            <input class="form-radio h-4 w-4 cursor-pointer" type="radio" name="year" id="1st-year" />
                            <label class="text-sm" for="1st-year">1st year</label><br />
                        </div>
                        <div class="flex items-center gap-3">
                            <input class="form-radio h-4 w-4 cursor-pointer" type="radio" name="year" id="1st-year" />
                            <label class="text-sm" for="1st-year">2nd year</label><br />
                        </div>
                        <div class="flex items-center gap-3">
                            <input class="form-radio h-4 w-4 cursor-pointer" type="radio" name="year" id="1st-year" />
                            <label class="text-sm" for="1st-year">3rd year</label><br />
                        </div>
                        <div class="flex items-center gap-3">
                            <input class="form-radio h-4 w-4 cursor-pointer" type="radio" name="year" id="1st-year" />
                            <label class="text-sm" for="1st-year">4th year</label><br />
                        </div>
                    </div> --}}

                    <div
                        class="w-[25rem] py-5 px-10  border-2 rounded border-blu flex flex-col gap-5 overflow-y-auto">
                        <h1 class="text-lg font-bold text-blu text-center w-full">
                            Section
                        </h1>

                        <div class="flex flex-col flex-wrap gap-3  h-[15rem]">
                            @foreach ($sections as $section)
                                <div class="flex items-center gap-3">
                                    <input class="form-radio h-5 w-5 cursor-pointer" type="checkbox" name="section_ids[]"
                                        id="scs{{ $loop->index }}" value="{{ $section->id }}" />
                                    <label class="text-md cursor-pointer"
                                        for="scs{{ $loop->index }}">{{ $section->section_name }}</label><br />
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <input type="hidden" name="faculty_id" value="{{ $faculty->id }}">

                <div class="flex justify-end mt-4">
                    <p id="cancel-btn"
                        class="bg-gray-400 px-6 py-2 rounded text-white mr-4 hover:bg-opacity-70 cursor-pointer">
                        Cancel
                    </p>
                    <button id="create-btn" class="bg-blu px-6 py-2 rounded text-white hover:bg-opacity-70">
                        Assign
                    </button>
                </div>
            </form>
        </div>

        <input class="py-1 w-[100%] border border-blu text-sm md:text-base rounded text-left px-5 self-end sm:w-[30%]"
            type="text" id="searchInput" placeholder="Search">
    </div>

    <div class="bg-white rounded-lg overflow-x-auto pb-5">
        <table class="table-auto text-center w-[700px] text-lg md:w-full">
            <thead class="mt-10 font-bold text-sm md:text-base lg:text-lg font-medium">
                <tr>
                    <th class="pt-8 pb-8">No.</th>
                    <th class="pt-8 pb-8">Code</th>
                    <th class="pt-8 pb-8">Subject</th>
                    <th class="pt-8 pb-8">Section</th>
                </tr>
            </thead>

            <tbody class="space-y-6 text-center font-regular text-sm md:text-base lg:text-lg font-medium">

                @foreach ($loads as $load)
                    <tr class="space-y-5">
                        <td class="pb-4 pt-2">{{ $loop->iteration }}</td>
                        <td class="pb-4 pt-2">{{ $load->subject->subject_code }}</td>
                        <td class="pb-4 pt-2">{{ $load->subject->subject_description }}</td>
                        <td class="pb-4 pt-2">{{ $load->section->section_name }}</td>
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
