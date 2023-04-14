@extends('layout.layout')



@section('content')
    <div class="flex flex-col justify-between items-center w-[100%] my-5 gap-3 xl:items-start">

        <h1 class="text-[28px] capitalize font-bold text-blu max-lg:text-[20px] max-2xl:text-[23px] max-sm:text-[20px]">
            {{ $loading->status }}
        </h1>
        <h1 class="text-[28px] font-bold text-blu max-lg:text-[20px] max-2xl:text-[23px] max-sm:text-[20px]">
            {{ $loading->subject->subject_description }} ({{ $loading->subject->subject_code }})
        </h1>

        <div class="flex items-center justify-between w-full">
            <p class="text-gray-500 text-thebg">1st Sem S.Y 2022 - 2023</p>

            @if (count($grades) !== 0)
                @if ($loading->status !== 'posted')
                    <div class="flex gap-5">
                        <form action="#">
                            <button class="bg-blu hover:bg-blue-700 text-white py-2 px-4 rounded cursor-pointe">Save</button>
                        </form>


                        <button id="generate-report-btn" class="bg-blu px-5 text-white h-[40px] rounded hover:opacity-70">
                            Submit
                        </button>

                    </div>
                    
                    <form action="{{ route('faculty.grade-posted', $loading->id) }}" id="report-popup"
                        class="fixed inset-0 z-50 flex items-center justify-center bg-gray-500 bg-opacity-75 hidden" method="post">
                        @csrf
                        <div class="bg-white rounded-lg p-8 w-[500px] h-[250px] relative">
                            <h1 class="font-bold text-blu pb-10 text-center"
                                style="font-size: clamp(1.25rem, 0.625rem + 0.9375vw, 1.75rem)">
                                Are you sure do you want to submit this sheet?
                            </h1>
                            <div class="flex gap-7 items-center justify-center">
        
                                <span id="close-btn"
                                    class="text-center text-sm cursor-pointer bg-gray-400 hover:bg-gray-300 text-white font-bold py-3 px-7 rounded">
                                    Close
                                </span>
        
        
                                <button
                                    class="text-center text-sm cursor-pointer bg-blue-700 hover:bg-blue-500 text-white font-bold py-3 px-7 rounded">
                                    Yes
                                </button>
        
        
                            </div>
                        </div>
                    </form>
                @endif
            @endif


          
        </div>

        <input
            class="py-3 w-[100%] border-2 border-blu text-sm md:text-base lg:text-lg font-medium rounded-lg text-left px-10"
            type="text" id="searchInput" class="border-2 border-gray-400 p-2 rounded-md"
            placeholder="Search who you looking for.." />

    </div>

    <table class="table-auto text-center w-[700px] text-lg md:w-full">
        <thead class="mt-10 font-bold text-sm md:text-base lg:text-lg font-medium bg-tablehead">
            <tr>
                <th class="pt-8 pb-8">No.</th>
                <th class="pt-8 pb-8">Last name</th>
                <th class="pt-8 pb-8">First name</th>
                <th class="pt-8 pb-8">M.I</th>
                <th class="pt-8 pb-8">Year & Section</th>
                <th class="pt-8 pb-8">Prelim</th>
                <th class="pt-8 pb-8">Midterm</th>
                <th class="pt-8 pb-8">Final</th>
                <th class="pt-8 pb-8">Final Average</th>
                <th class="pt-8 pb-8">Equivalent</th>
            </tr>
        </thead>

        <tbody class="text-center font-regular text-sm md:text-base lg:text-lg font-medium">

            @foreach ($grades as $grade)
                <tr class="space-y-5 bg-white">
                    <td class="pb-4 pt-4">{{ $loop->iteration }}</td>
                    <td class="pb-4 pt-4">{{ $grade->profile->lastname }}</td>
                    <td class="pb-4 pt-4">{{ $grade->profile->firstname }}</td>
                    <td class="pb-4 pt-4">{{ $grade->profile->middlename }}</td>
                    <td class="pb-4 pt-4">{{ $grade->profile->section->section_name }}</td>
                    <td class="pb-4 pt-4">{{ $decryptedgrades[$loop->index]['prelim'] }}</td>
                    <td class="pb-4 pt-4">{{ $decryptedgrades[$loop->index]['midterm'] }}</td>
                    <td class="pb-4 pt-4">{{ $decryptedgrades[$loop->index]['finals'] }}</td>
                    <td class="pb-4 pt-4">{{ $decryptedgrades[$loop->index]['fg'] }}</td>
                    <td class="pb-4 pt-4">{{ $decryptedgrades[$loop->index]['ng'] }}</td>
                </tr>
            @endforeach


        </tbody>
    </table>
    </div>
@endsection

@section('script')
    const generateReportBtn = document.getElementById("generate-report-btn");
    const reportPopup = document.getElementById("report-popup");
    const viewGradesBtn = document.getElementById("view-grades-btn");
    const viewLoadsBtn = document.getElementById("view-loads-btn");
    const closeBtn = document.getElementById("close-btn");

    generateReportBtn.addEventListener("click", () => {
    reportPopup.classList.remove("hidden");
    });

    closeBtn.addEventListener("click", () => {
    reportPopup.classList.add("hidden");
    });

    const editButtons = document.querySelectorAll(".edit-button");

    editButtons.forEach(function (editButton) {
    editButton.addEventListener("click", function () {
    const buttonText = editButton.textContent;
    if (buttonText === "edit") {
    editButton.textContent = "save";
    editButton.style.color = "green";
    } else {
    editButton.textContent = "edit";
    editButton.style.color = "blue";
    }
    });
    });

    const closeButton = document.getElementById("close-btn");
    closeButton.addEventListener("click", () => {
    // Add code here to close the modal or perform any other desired action
    });
@endsection
