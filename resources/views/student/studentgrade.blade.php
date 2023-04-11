@extends('layout.layout')

@section('content')
    <div class="flex flex-col items-center gap-10">
        {{-- <h1 class="text-[28px] font-bold text-blu max-lg:text-[20px] max-2xl:text-[23px] max-sm:text-[20px]">
            CHOOSE SEMESTER TO GENERATE COG
        </h1>

        <form class="flex justify-center text-sm w-[80%]">
            <select class="w-[100%] h-16 py-3 border-2 border-blue-800 rounded-lg px-3 cursor-pointer" name="selectOption"
                id="selectOption">
                <option class="text-center py-2 text-base" value="--Select Semester--">
                    --Select Semester--
                </option>

                <option class="bg-blue-800 text-white text-lg" value="1">
                    1st Sem S.Y 2021 - 2022
                </option>
                <option class="bg-blue-800 text-white text-lg" value="2">
                    2nd Sem S.Y 2021 - 2022
                </option>
                <option class="bg-blue-800 text-white text-lg" value="3">
                    1st Sem S.Y 2022 - 2023
                </option>
                <option class="bg-blue-800 text-white text-lg" value="4">
                    2nd Sem S.Y 2022 - 2023
                </option>
            </select>
        </form> --}}

        <div class="overflow-x-auto w-full flex flex-col gap-2" id="linksContainer">
            <div class="flex items-center gap-2 self-start">
                <div class="w-5 h-5 bg-red-800 rounded-full max-lg:w-4 max-lg:h-4 max-sm:w-4 max-sm:h-4"></div>
                <h2>Posted</h2>
            </div>

            <table class="table-auto text-center w-[1920px] bg-white text-lg xl:w-full">
                <thead class="mt-10 font-bold text-sm md:text-base lg:text-lg font-medium">
                    <tr class="border-y border-blu">
                        <th class="pt-8 pb-8 border-x border-blu">Code.</th>
                        <th class="pt-8 pb-8 border-x border-blu">Description</th>
                        <th class="pt-8 pb-8 border-x border-blu">Prelim</th>
                        <th class="pt-8 pb-8 border-x border-blu">Midterm</th>
                        <th class="pt-8 pb-8 border-x border-blu">Finals</th>
                        <th class="pt-8 pb-8 border-x border-blu">Final Average</th>
                        <th class="pt-8 pb-8 border-x border-blu">Numerical Grade</th>
                        <th class="pt-8 pb-8 border-x border-blu">Remarks</th>
                    </tr>
                </thead>

                <tbody class="space-y-6 text-center font-regular text-sm md:text-base lg:text-lg font-medium">

                    @foreach ($grades as $grade)
                        <tr class="border-y border-blu">
                            <td class="pb-4 pt-4 border-x border-blu">{{ $grade->loading->subject->subject_code }}</td>
                            <td class="pb-4 pt-4 border-x border-blu">{{ $grade->loading->subject->subject_description }}</td>
                            <td class="pb-4 pt-4 border-x border-blu">{{ $decryptedgrades[$loop->index]['prelim'] }}</td>
                            <td class="pb-4 pt-4 border-x border-blu">{{ $decryptedgrades[$loop->index]['midterm']}}</td>
                            <td class="pb-4 pt-4 border-x border-blu">{{ $decryptedgrades[$loop->index]['finals'] }}</td>
                            <td class="pb-4 pt-4 border-x border-blu">{{ $decryptedgrades[$loop->index]['fg']}}</td>
                            <td class="pb-4 pt-4 border-x border-blu">{{ $decryptedgrades[$loop->index]['ng'] }}</td>
                            <td class="pb-4 pt-4 border-x border-blu">{{ $decryptedgrades[$loop->index]['remarks'] }}</td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('script')
@endsection
