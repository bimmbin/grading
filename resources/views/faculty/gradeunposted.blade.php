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
                        {{-- <form action="#">
                            <button class="bg-blu hover:bg-blue-700 text-white py-2 px-4 rounded cursor-pointe">Save</button>
                        </form> --}}


                        <button id="generate-report-btn" class="bg-blu px-5 text-white h-[40px] rounded hover:opacity-70">
                            Submit
                        </button>

                    </div>

                    <form action="{{ route('faculty.grade-posted', $loading->id) }}" id="report-popup"
                        class="fixed inset-0 z-50 flex items-center justify-center bg-gray-500 bg-opacity-75 hidden"
                        method="post">
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
                @if ($loading->status == 'posted' && !$loading->requestchange()->exists())
                    <button id="generate-report-btn"
                        class="bg-blu px-5 text-white text-sm h-[40px] rounded-lg hover:opacity-70">
                        Change of Grade Request
                    </button>

                    <div id="report-popup"
                        class="fixed inset-0 z-50 flex items-center justify-center bg-gray-500 bg-opacity-75 hidden">
                        <form action="{{ route('faculty.requestchange') }}" method="post"
                            class="bg-white rounded-lg p-8 w-[600px] h-fit relative">
                            @csrf
                            <h1 class="font-bold text-blu pb-10 text-center"
                                style="font-size: clamp(1.5rem, 0.375rem + 1.5625vw, 2.25rem);">
                                Remarks
                            </h1>
                            <textarea class="border border-gray-400 w-full py-2 px-3" name="remarks" id="" cols="30" rows="10"
                                placeholder="input your remarks here..."></textarea>
                            <input type="hidden" name="loading_id" value="{{ $loading->id }}">
                            <div class="flex flex-col gap-3 items-center justify-between">
                                <div>
                                    <button
                                        class="text-center cursor-pointer bg-blu mt-5 text-white hover:bg-gray-400 text-gray-800 font-bold py-2 px-7 rounded">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                @endif
            @endif



        </div>

        <input class="py-1 w-[100%] border border-blu text-sm md:text-base rounded text-left px-5 self-end sm:w-[30%]"
            type="text" id="searchInput" placeholder="Search">

    </div>

    <table class="table-auto text-center w-[700px] text-lg md:w-full">
        <thead class="mt-10 font-bold text-sm md:text-base lg:text-lg font-medium bg-tablehead">
            <tr>
                <th class="pt-8 pb-8">No.</th>
                <th class="pt-8 pb-8">Last name</th>
                <th class="pt-8 pb-8">First name</th>
                <th class="pt-8 pb-8">Middle Name</th>
                <th class="pt-8 pb-8">Section</th>
                <th class="pt-8 pb-8">Prelim</th>
                <th class="pt-8 pb-8">Midterm</th>
                <th class="pt-8 pb-8">Final</th>
                <th class="pt-8 pb-8">Final Average</th>
                {{-- <th class="pt-8 pb-8">Equivalent</th> --}}
                <th class="pt-8 pb-8">Remarks</th>
                @if ($loading->status !== 'posted')
                    <th class="pt-8 pb-8">Action</th>
                @endif
            </tr>
        </thead>

        <tbody class="text-center font-regular text-sm md:text-base lg:text-lg font-medium">

            @foreach ($grades as $grade)
                @php
                    $average = ($decryptedgrades[$loop->index]['prelim'] + $decryptedgrades[$loop->index]['midterm'] + $decryptedgrades[$loop->index]['finals']) / 3;
                    
                    $remarks = '';
                    if (intval($average) >= 0 && intval($average) <= 74) {
                        $remarks = 'Failed';
                    } elseif (intval($average) >= 75 && intval($average) <= 100) {
                        $remarks = 'Passed';
                    }
                @endphp
                <tr class="space-y-5 bg-white">
                    <td class="pb-4 pt-4">{{ $loop->iteration }}</td>
                    <td class="pb-4 pt-4">{{ $grade->profile->lastname }}</td>
                    <td class="pb-4 pt-4">{{ $grade->profile->firstname }}</td>
                    <td class="pb-4 pt-4">{{ $grade->profile->middlename }}</td>
                    <td class="pb-4 pt-4">{{ $grade->profile->section->section_name }}</td>
                    <td class="pb-4 pt-4">{{ $decryptedgrades[$loop->index]['prelim'] }}</td>
                    <td class="pb-4 pt-4">{{ $decryptedgrades[$loop->index]['midterm'] }}</td>
                    <td class="pb-4 pt-4">{{ $decryptedgrades[$loop->index]['finals'] }}</td>
                    <td class="pb-4 pt-4">{{ intval($average) }}</td>
                    {{-- <td class="pb-4 pt-4">{{ $decryptedgrades[$loop->index]['ng'] }}</td> --}}
                    <td class="pb-4 pt-4">{{ $remarks }}</td>

                    @if ($loading->status !== 'posted')
                        <td class="pb-4 pt-4">

                            <button class="underline text-blu"
                                onclick="editStudent(

                                        '{{ $decryptedgrades[$loop->index]['prelim'] }}',
                                        '{{ $decryptedgrades[$loop->index]['midterm'] }}',
                                        '{{ $decryptedgrades[$loop->index]['finals'] }}',
                                        '{{ $decryptedgrades[$loop->index]['fg'] }}',
                                        '{{ $decryptedgrades[$loop->index]['ng'] }}',
                                        '{{ $decryptedgrades[$loop->index]['remarks'] }}',
                                        '{{ $grade->profile->lastname }}',
                                        '{{ $grade->profile->firstname }}',
                                        '{{ $grade->profile->middlename }}',
                                        '{{ $grade->profile->section->section_name }}',
                                        '{{ $grade->id }}',
                                        
                                        )">
                                Edit
                            </button>
                        </td>
                    @endif
                </tr>
            @endforeach


        </tbody>
    </table>

    <div class="absolute left-0 top-0 w-[100vw] h-[100vh] flex flex-col justify-center items-center hidden"
        id="editDiaglogBox">
        <div class="absolute z-50 bg-white py-5 px-5 rounded-lg max-sm:mt-[12rem]">

            <form action="{{ route('faculty.editgrade') }}" method="post" class="flex justify-center items-center">
                @csrf

                <div class="flex max-sm:flex-col items-center w-full">
                    <div class="flex w-[53rem] max-sm:w-full  flex-wrap gap-2 justify-center items-center max-sm:flex-col">

                        <div class="flex flex-col max-sm:w-full">
                            <label for="g" class="font-semibold text-sm">Lastname</label>
                            <input type="text" class="cursor-default w-[200px] max-sm:w-full py-2 text-lg" id="g"
                                placeholder="Student No" name="studentno" disabled="true">
                        </div>

                        <div class="flex flex-col max-sm:w-full">
                            <label for="h" class="font-semibold text-sm">Firstname</label>
                            <input type="text" class="w-[200px] max-sm:w-full py-2 text-lg" id="h"
                                placeholder="Student No" name="studentno" disabled="true">
                        </div>

                        <div class="flex flex-col max-sm:w-full">
                            <label for="i" class="font-semibold text-sm">Middlename</label>
                            <input type="text" class="w-[200px] max-sm:w-full py-2 text-lg" id="i"
                                placeholder="Student No" name="studentno" disabled="true">
                        </div>

                        <div class="flex flex-col max-sm:w-full">
                            <label for="j" class="font-semibold text-sm">Section</label>
                            <input type="text" class="w-[200px] max-sm:w-full py-2 text-lg" id="j"
                                placeholder="Student No" name="studentno" disabled="true">
                        </div>

                        <div class="flex flex-col max-sm:w-full">
                            <label for="a" class="font-semibold text-sm">Prelim</label>
                            <input type="text"
                                class="w-[120px] max-sm:w-full border border-gray-300 py-2 px-3 text-lg rounded-md"
                                id="a" placeholder="Prelim" name="prelim">
                        </div>

                        <div class="flex flex-col">
                            <label for="b" class="font-semibold text-sm">Midterm</label>
                            <input type="text"
                                class="w-[120px] max-sm:w-full border border-gray-300 py-2 px-3 text-lg rounded-md"
                                id="b" placeholder="Midterm" name="midterm">
                        </div>

                        <div class="flex flex-col">
                            <label for="c" class="font-semibold text-sm">Final</label>
                            <input type="text"
                                class="w-[120px] max-sm:w-full border border-gray-300 py-2 px-3 text-lg rounded-md"
                                id="c" placeholder="Final" name="final">
                        </div>

                        <div class="flex flex-col hidden">
                            <label for="d" class="font-semibold text-sm">Final Average</label>
                            <input type="text"
                                class="w-[120px] max-sm:w-full border border-gray-300 py-2 px-3 text-lg rounded-md"
                                id="d" placeholder="Final Average" name="fg">
                        </div>


                        <div class="flex flex-col hidden">
                            <label for="e" class="font-semibold text-sm">Equivalent</label>

                            <input type="text"
                                class="w-[120px] max-sm:w-full border border-gray-300 py-2 px-3 text-lg rounded-md"
                                id="e" placeholder="Equivalent" name="ng">
                        </div>

                        <div class="flex flex-col hidden">
                            <label for="f" class="font-semibold text-sm">Remarks</label>
                            <input type="text"
                                class="w-[120px] max-sm:w-full border border-gray-300 py-2 px-3 text-lg rounded-md"
                                id="f" placeholder="Remarks" name="remarks">
                        </div>

                        <input type="hidden" id="k" name="id">
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

    function editStudent(a,b,c,d,e,f,g,h,i,j,k) {
    document.getElementById("editDiaglogBox").classList.toggle("hidden");


    document.getElementById("a").value = a;
    document.getElementById("b").value = b;
    document.getElementById("c").value = c;
    document.getElementById("d").value = d;
    document.getElementById("e").value = e;
    document.getElementById("f").value = f;
    document.getElementById("g").value = g;
    document.getElementById("h").value = h;
    document.getElementById("i").value = i;
    document.getElementById("j").value = j;
    document.getElementById("k").value = k;
    };

    document.querySelector("#bgBlack").addEventListener("click", function () {

    document.getElementById("editDiaglogBox").classList.toggle("hidden");
    });

    document.querySelector("#cancelBtn").addEventListener("click", function () {

    document.getElementById("editDiaglogBox").classList.toggle("hidden");
    });
@endsection
