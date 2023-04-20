<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Change of Request</title>
    <link rel="icon" type="image/x-icon" href="/asset/chcc-vector-logo.png" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap"
        rel="stylesheet" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        pops: "'Poppins', sans-serif",
                    },
                    colors: {
                        blu: "#0038FF",
                        grayish: "#626262",
                        lightblu: "#D3DDFF",
                        lightgreeny: "#1EF868",
                        thebg: "#F3F6FF",
                    },
                },
            },
        };
    </script>

    <style>
        .burger-menu {
            position: relative;
            display: inline-block;
        }

        .burger-menu input[type="checkbox"] {
            display: none;
        }

        .burger-menu label {
            display: block;
            width: 30px;
            height: 30px;
            position: relative;
            cursor: pointer;
        }

        .burger-menu label span {
            display: block;
            width: 100%;
            height: 3px;
            background-color: #333;
            position: absolute;
            top: 50%;
            transition: transform 0.3s ease;
        }

        .burger-menu label span:nth-child(1) {
            margin-top: 10px;
        }

        .burger-menu label span:nth-child(2) {
            display: none;
        }

        .burger-menu label span:nth-child(3) {
            margin-bottom: 10px;
        }

        .burger-menu input[type="checkbox"]:checked+label span:nth-of-type(1) {
            transform: rotate(200deg);
        }

        .burger-menu input[type="checkbox"]:checked+label span:nth-of-type(2) {
            transform: scale(0);
        }

        .burger-menu input[type="checkbox"]:checked+label span:nth-of-type(3) {
            transform: rotate(-200deg);
        }

        .burger-content {
            display: none;
            position: absolute;
            left: 0;
            width: auto;
            margin-top: 50px;
            height: 450px;
        }

        .burger-menu input[type="checkbox"]:checked+label+.burger-content {
            display: block;
            animation: slide-down 0.3s ease;
        }

        .burger-content a {
            text-decoration: none;
        }

        ::-webkit-scrollbar {
            display: none;
        }

        @keyframes slide-down {
            from {
                transform: translateX(-100%);
            }

            to {
                transform: translateX(0);
            }
        }

        input[type=number]::-webkit-outer-spin-button,
        input[type=number]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
</head>

<body class="font-pops">
    <section class="flex bg-thebg">
        <!-- leftcolumn -->
        @auth
            <div class="bg-darkblue flex flex-col items-center relative w-[400px] bg-white h-auto max-md:hidden">

                <a href="{{ route('dashboard') }}" class="flex-col flex items-center my-[30px]">
                    <img class="w-[89px]" src="/asset/chcc-vector-logo.png" alt="logo" />
                    <h1 class="text-[20px] text-center text-blu font-medium mt-2 max-lg:text-[18px]">
                        Concepcion Holy Cross
                        <br />
                        College Inc.
                    </h1>
                </a>

                <ul class="flex flex-col items-center my-12">

                    @if (Auth::user()->role === 'admin')
                        <li
                            class="w-[224px] flex gap-3 border-b-2 gap-5 items-center pb-4 hover:border-blu cursor-pointer hover:text-blu hover:font-medium max-xl:pl-6 mt-5">
                            <img class="w-[25px] h-[25px] max-md:w-5 max-md:h-5" src="/asset/icon-list.png"
                                alt="" />
                            <a class="text-[18px] max-xl:text-[16px] max-md:text-[14px]"
                                href="{{ route('admin.faculty') }}">Faculty List</a>
                        </li>

                        <li
                            class="w-[224px] flex gap-3 border-b-2 gap-5 items-center pb-4 hover:border-blu cursor-pointer hover:text-blu hover:font-medium max-xl:pl-6 mt-5">
                            <img class="w-[25px] h-[25px] max-md:w-5 max-md:h-5" src="/asset/icon-list.png"
                                alt="" />
                            <a class="text-[18px] max-xl:text-[16px] max-md:text-[14px]"
                                href="{{ route('admin.studentlist') }}">Student List</a>
                        </li>

                        <li
                            class="w-[224px] flex gap-3 border-b-2 gap-5 items-center pb-4 hover:border-blu cursor-pointer hover:text-blu hover:font-medium max-xl:pl-6 mt-5">
                            <img class="w-[25px] h-[25px] max-md:w-5 max-md:h-5" src="/asset/icon-list.png"
                                alt="" />
                            <a class="text-[18px] max-xl:text-[16px] max-md:text-[14px]"
                                href="{{ route('admin.subject') }}">Subject
                                & Section</a>
                        </li>

                        <li
                            class="w-[224px] flex gap-3 border-b-2 gap-5 items-center pb-4 hover:border-blu cursor-pointer hover:text-blu hover:font-medium max-xl:pl-6 mt-5">
                            <img class="w-[25px] h-[25px] max-md:w-5 max-md:h-5" src="/asset/icon-grades.png"
                                alt="" />
                            <a class="text-[18px] max-xl:text-[16px] max-md:text-[14px]"
                                href="{{ route('admin.grade') }}">Grades</a>
                        </li>
                    @endif

                    @if (Auth::user()->role === 'student')
                        <li
                            class="w-[224px] flex gap-3 border-b-2 gap-5 items-center pb-4 hover:border-blu cursor-pointer hover:text-blu hover:font-medium max-xl:pl-6 mt-5">
                            <img class="w-[25px] h-[25px] max-md:w-5 max-md:h-5" src="/asset/icon-grades.png"
                                alt="" />
                            <a class="text-[18px] max-xl:text-[16px] max-md:text-[14px]"
                                href="{{ route('student.grade') }}">Grades</a>
                        </li>

                        <li
                            class="w-[224px] flex gap-3 border-b-2 gap-5 items-center pb-4 hover:border-blu cursor-pointer hover:text-blu hover:font-medium max-xl:pl-6 mt-5">
                            <img class="w-[25px] h-[25px] max-md:w-5 max-md:h-5" src="/asset/icon-setting.png"
                                alt="" />
                            <a class="text-[18px] max-xl:text-[16px] max-md:text-[14px]" href="#">Settings</a>
                        </li>

                        <li
                            class="w-[224px] flex gap-3 border-b-2 gap-5 items-center pb-4 hover:border-blu cursor-pointer hover:text-blu hover:font-medium max-xl:pl-6 mt-5">
                            <img class="w-[25px] h-[25px] max-md:w-5 max-md:h-5" src="/asset/icon-about.png"
                                alt="" />
                            <a class="text-[18px] max-xl:text-[16px] max-md:text-[14px]" href="#">About</a>
                        </li>
                    @endif

                    @if (Auth::user()->role === 'faculty')
                        <li
                            class="w-[224px] flex gap-3 border-b-2 gap-5 items-center pb-4 hover:border-blu cursor-pointer hover:text-blu hover:font-medium max-xl:pl-6 mt-5">
                            <img class="w-[25px] h-[25px] max-md:w-5 max-md:h-5" src="/asset/icon-list.png"
                                alt="" />
                            <a class="text-[18px] max-xl:text-[16px] max-md:text-[14px]"
                                href="{{ route('faculty.loads', Auth::user()->profile->id) }}">Loads</a>
                        </li>

                        <li
                            class="w-[224px] flex gap-3 border-b-2 gap-5 items-center pb-4 hover:border-blu cursor-pointer hover:text-blu hover:font-medium max-xl:pl-6 mt-5">
                            <img class="w-[25px] h-[25px] max-md:w-5 max-md:h-5" src="/asset/icon-grades.png"
                                alt="" />
                            <a class="text-[18px] max-xl:text-[16px] max-md:text-[14px]"
                                href="{{ route('faculty.loads-grades', Auth::user()->profile->id) }}">Grades</a>
                        </li>

                        <li
                            class="w-[224px] flex gap-3 border-b-2 gap-5 items-center pb-4 hover:border-blu cursor-pointer hover:text-blu hover:font-medium max-xl:pl-6 mt-5">
                            <img class="w-[25px] h-[25px] max-md:w-5 max-md:h-5" src="/asset/icon-setting.png"
                                alt="" />
                            <a class="text-[18px] max-xl:text-[16px] max-md:text-[14px]" href="#">Settings</a>
                        </li>

                        <li
                            class="w-[224px] flex gap-3 border-b-2 gap-5 items-center pb-4 hover:border-blu cursor-pointer hover:text-blu hover:font-medium max-xl:pl-6 mt-5">
                            <img class="w-[25px] h-[25px] max-md:w-5 max-md:h-5" src="/asset/icon-about.png"
                                alt="" />
                            <a class="text-[18px] max-xl:text-[16px] max-md:text-[14px]" href="#">About</a>
                        </li>
                    @endif
                    {{-- <li
                        class="w-[224px] flex gap-3 border-b-2 gap-5 items-center pb-4 hover:border-blu cursor-pointer hover:text-blu hover:font-medium max-xl:pl-6 mt-5">
                        <img class="w-[25px] h-[25px] max-md:w-5 max-md:h-5" src="/asset/icon-setting.png" alt="" />
                        <a class="text-[18px] max-xl:text-[16px] max-md:text-[14px]" href="#">Settings</a>
                    </li>

                    <li
                        class="w-[224px] flex gap-3 border-b-2 gap-5 items-center pb-4 hover:border-blu cursor-pointer hover:text-blu hover:font-medium max-xl:pl-6 mt-5">
                        <img class="w-[25px] h-[25px] max-md:w-5 max-md:h-5" src="/asset/icon-about.png" alt="" />
                        <a class="text-[18px] max-xl:text-[16px] max-md:text-[14px]" href="#">About</a>
                    </li> --}}
                </ul>

                <!-- <button class="bg-blu text-white text-[18px] font-medium w-[167px] h-[50px] rounded-lg cursor-pointer absolute bottom-0 hover:bg-red-400">Log out</button> -->
            </div>

            <!-- right-column -->

        @endauth
        <div class="w-screen h-screen overflow-y-scroll mx-5 pb-10 max-xl:h-screen max-lg:h-screen">
            <!-- header -->
            <header
                class="flex w-[100%] max-w-[1920px] bg-thebg items-center justify-between py-[50px] px-[70px] max-2xl:px-[0px]">
                <div class="burger-menu hidden max-md:block">
                    <input type="checkbox" id="burger-toggle" />
                    <label for="burger-toggle">
                        <span></span>
                        <span></span>
                        <span></span>
                    </label>
                    <div class="burger-content bg-white border border-blu">
                        <ul class="flex flex-col items-center my-5 gap-2">
                            @auth

                                @if (Auth::user()->role === 'admin')
                                    <li
                                        class="w-[224px] flex items-center gap-3 py-3 hover:border-blu cursor-pointer hover:font-medium hover:text-blu max-xl:pl-6 border-l-2 hover:border-l-14">
                                        <img class="w-[25px] h-[25px] max-md:w-5 max-md:h-5" src="/asset/icon-list.png"
                                            alt="" />
                                        <a class="text-[18px] max-xl:text-[16px] max-md:text-[14px]"
                                            href="{{ route('admin.faculty') }}">Faculty List</a>
                                    </li>

                                    <li
                                        class="w-[224px] flex items-center gap-3 py-3 hover:border-blu cursor-pointer hover:font-medium hover:text-blu max-xl:pl-6 border-l-2 hover:border-l-14 mt-2">
                                        <img class="w-[25px] h-[25px] max-md:w-5 max-md:h-5" src="/asset/icon-list.png"
                                            alt="" />
                                        <a class="text-[18px] max-xl:text-[16px] max-md:text-[14px]"
                                            href="{{ route('admin.studentlist') }}">Student
                                            List</a>
                                    </li>

                                    <li
                                        class="w-[224px] flex items-center gap-3 py-3 hover:border-blu cursor-pointer hover:font-medium hover:text-blu max-xl:pl-6 border-l-2 hover:border-l-14 mt-2">
                                        <img class="w-[25px] h-[25px] max-md:w-5 max-md:h-5" src="/asset/icon-list.png"
                                            alt="" />
                                        <a class="text-[18px] max-xl:text-[16px] max-md:text-[14px]"
                                            href="{{ route('admin.subject') }}">Faculty
                                            List</a>
                                    </li>

                                    <li
                                        class="w-[224px] flex items-center gap-3 py-3 hover:border-blu cursor-pointer hover:font-medium hover:text-blu max-xl:pl-6 border-l-2 hover:border-l-14 mt-2">
                                        <img class="w-[25px] h-[25px] max-md:w-5 max-md:h-5" src="/asset/icon-list.png"
                                            alt="" />
                                        <a class="text-[18px] max-xl:text-[16px] max-md:text-[14px]"
                                            href="{{ route('admin.grade') }}">Grade
                                            List</a>
                                    </li>
                                @endif

                                @if (Auth::user()->role === 'student')
                                    <li
                                        class="w-[224px] flex items-center gap-3 py-3 hover:border-blu cursor-pointer hover:font-medium hover:text-blu max-xl:pl-6 border-l-2 hover:border-l-14 mt-2">
                                        <img class="w-[25px] h-[25px] max-md:w-5 max-md:h-5" src="/asset/icon-list.png"
                                            alt="" />
                                        <a class="text-[18px] max-xl:text-[16px] max-md:text-[14px]"
                                            href="{{ route('student.grade') }}">Grades</a>
                                    </li>
                                @endif
                                @if (Auth::user()->role === 'faculty')
                                    <li
                                        class="w-[224px] flex items-center gap-3 py-3 hover:border-blu cursor-pointer hover:font-medium hover:text-blu max-xl:pl-6 border-l-2 hover:border-l-14 mt-2">
                                        <img class="w-[25px] h-[25px] max-md:w-5 max-md:h-5" src="/asset/icon-list.png"
                                            alt="" />
                                        <a class="text-[18px] max-xl:text-[16px] max-md:text-[14px]"
                                            href="{{ route('faculty.loads', Auth::user()->profile->id) }}">Loads</a>
                                    </li>
                                    <li
                                        class="w-[224px] flex items-center gap-3 py-3 hover:border-blu cursor-pointer hover:font-medium hover:text-blu max-xl:pl-6 border-l-2 hover:border-l-14 mt-2">
                                        <img class="w-[25px] h-[25px] max-md:w-5 max-md:h-5" src="/asset/icon-list.png"
                                            alt="" />
                                        <a class="text-[18px] max-xl:text-[16px] max-md:text-[14px]"
                                            href="{{ route('faculty.loads-grades', Auth::user()->profile->id) }}">Grades</a>
                                    </li>
                                @endif
                            @endauth
                            @auth
                                <li>
                                    <a href="" class="p-3">{{ auth()->user()->username }}</a>
                                </li>
                                <li>
                                    <form action="{{ route('logout') }}" method="post" class="p-3 inline">
                                        @csrf
                                        <button type="submit">Logout</button>
                                    </form>
                                </li>
                            @endauth

                            @guest
                                <li>
                                    <a href="{{ route('login') }}" class="p-3">Login</a>
                                </li>
                                <li>
                                    <a href="{{ route('register') }}" class="p-3">Register</a>
                                </li>
                            @endguest
                        </ul>

                    </div>
                </div>

                <a href="grades.html"
                    class="text-[28px] font-bold text-blu max-lg:text-[20px] max-2xl:text-[23px] max-sm:text-[20px]">
                    Grades
                </a>

                <div class="flex items-center gap-5">
                    <img class="w-[57px] h-[57px] max-lg:w-[40px] max-lg:h-[40px] max-2xl:w-[45px] max-2xl:h-[45px] max-sm:h-[35px] max-sm:w-[35px]"
                        src="/asset/user-profile.png" alt="user-profile" />

                    <div class="flex gap-3 items-center">
                        <!-- online status -->
                        <div class="w-5 h-5 bg-lightgreeny rounded-full max-lg:w-4 max-lg:h-4 max-sm:w-4 max-sm:h-4">
                        </div>
                        @auth
                            <span
                                class="text-blu text-[20px] font-medium max-lg:text-[16px] max-2xl:text-[18px] max-sm:text-[16px]">Status:{{ auth()->user()->role }}
                            </span>

                        @endauth

                        <ul class="flex items-center max-md:hidden text-red-500">
                            @auth
                                <li>
                                    <a href="" class="p-3">{{ auth()->user()->username }}</a>
                                </li>
                                <li>
                                    <form action="{{ route('logout') }}" method="post" class="p-3 inline">
                                        @csrf
                                        <button type="submit">Logout</button>
                                    </form>
                                </li>
                            @endauth

                            @guest
                                <li>
                                    <a href="{{ route('login') }}" class="p-3">Login</a>
                                </li>
                                <li>
                                    <a href="{{ route('register') }}" class="p-3">Register</a>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </header>





            <!-- right-content -->
            <main class="w-[100%] max-w-[1920px] h-[100%]">

                @yield('content')

            </main>
        </div>
    </section>
</body>

</html>

<script>
    @yield('script')

    $(document).ready(function() {
        // Listen for keyup event on search input
        $("#searchInput").on("keyup", function() {
            var value = $(this).val().toLowerCase(); // Get the search value and convert to lowercase
            $("tbody tr").filter(function() {
                // Loop through each table row
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -
                    1); // Show/hide row based on search value
            });
        });
    });
</script>
