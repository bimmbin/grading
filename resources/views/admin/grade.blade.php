@extends('layout.layout')



@section('content')
    <div class="flex flex-col items-center gap-10">
        {{-- <form class="flex justify-center mt-20 text-sm w-[80%]">
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

        <div class="flex w-[100%] h-[100%] max-w-[1440px] gap-5 max-xl:flex-col" id="linksContainer">
            <a href="{{ route('admin.submittedgrade') }}"
                class="w-[100%] max-w-[705px] px-[53px] py-5 rounded-2xl bg-blu max-xl:max-w-none hover:opacity-70">
                <h1 class="text-[40px] font-bold text-white">
                    Submitted Grades
                </h1>
                <h2 class="text-[64px] font-bold text-white text-right text-end mt-[11rem]">
                    {{-- {{ $submittedGradesCount }} --}}
                </h2>
            </a>

            <a href="{{ route('admin.request') }}"
                class="w-[100%] max-w-[705px] px-[53px] py-5 rounded-2xl bg-lightblu max-xl:max-w-none hover:opacity-70">
                <h1 class="text-[40px] font-bold text-blu">
                    Changed of Request Grades
                </h1>
                <h2 class="text-[64px] font-bold text-blu text-right text-end mt-[7rem]">
                    {{-- 4 --}}
                </h2>
            </a>
        </div>
    </div>
@endsection

@section('script')
@endsection
