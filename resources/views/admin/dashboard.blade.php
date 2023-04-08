@extends('layout.layout')



@section('content')

<div class="flex flex-col items-center gap-10">
    <div
      class="w-[100%] max-w-[1440px] h-[360px] bg-white rounded-2xl items-center flex flex-col max-xl:h-[300px] max-lg:h-[260px]"
    >
      <img
        class="w-[192px] my-5 max-2xl:w-[180px] max-xl:w-[160px] max-lg:w-[145px] max-sm:w-[130px]"
        src="/asset/chcc-vector-logo.png"
        alt="chcc-logo"
      />

      <h1
        class="text-[45px] font-medium text-blu max-2xl:text-[40px] max-2xl:mt-5 max-2xl:text-[24px] max-xl:text-[26px] max-lg:text-[24px] max-lg:mt-3 max-sm:text-[20px]"
      >
        Concepcion Holy Cross College Inc.
      </h1>
    </div>

    <div
      class="flex w-[100%] h-[100%] max-w-[1440px] gap-5 max-xl:flex-col"
    >
      <div
        class="w-[100%] max-w-[705px] h-[100%] max-h-[400px] px-[53px] py-5 rounded-2xl bg-blu max-xl:max-w-none"
      >
        <h1
          class="text-white font-bold text-[33px] max-2xl:text-[28px] max-sm:text-[24px]"
        >
          Mission
        </h1>

        <p
          class="text-white text-[18px] font-medium py-3 text-justify max-2xl:text-[16px] max-sm:text-[14px]"
        >
          Concepcion Holy Cross College is an institution for academic
          and values formation offering relevant, learner-centered and
          values-oriented programs that produces competent persons of
          character in the service of society
        </p>
      </div>

      <div
        class="w-[100%] max-w-[705px] px-[53px] py-5 rounded-2xl bg-lightblu max-xl:max-w-none"
      >
        <h1
          class="text-blu font-bold text-[33px] max-2xl:text-[28px] max-sm:text-[24px]"
        >
          Vision
        </h1>

        <p
          class="text-blu text-[18px] font-medium py-3 text-justify max-2xl:text-[16px] max-sm:text-[14px]"
        >
          To become a God-centered learning institution, focused on
          holistic education that form and educates individuals, to
          become conscious, competent, compassionate, and committed
          person towards the development of a just and humane society
        </p>
      </div>
    </div>
  </div>

@endsection

