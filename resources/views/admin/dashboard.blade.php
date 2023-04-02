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
          Lorem Ipsum is simply dummy text of the printing and
          typesetting industry. Lorem Ipsum has been the industry's
          standard dummy text ever since the 1500s, when an unknown
          printer took a galley of type and scrambled it to make a type
          specimen book. It has survived not only five centuries, but
          also the leap into electronic typesetting, remaining
          essentially unchanged. It was popularised in the 1960s with
          the release of Letraset sheets containing Lorem Ipsum
          passages.
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
          Lorem Ipsum is simply dummy text of the printing and
          typesetting industry. Lorem Ipsum has been the industry's
          standard dummy text ever since the 1500s, when an unknown
          printer took a galley of type and scrambled it to make a type
          specimen book. It has survived not only five centuries, but
          also the leap into electronic typesetting, remaining
          essentially unchanged. It was popularised in the 1960s with
          the release of Letraset sheets containing Lorem Ipsum
          passages.
        </p>
      </div>
    </div>
  </div>
    
@endsection


{{-- 
<div class="flex w-full p-10 flex-col gap-5 lg:flex-row overflow-x-hidden">

     
            
    <form action="{{ route('previewTable') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input class="border-none" style="font-size: clamp(1.1875rem, 0.9375rem + 0.625vw, 1.6875rem);" type="file"
            name="file">
        <button type="submit"
            class="">Upload</button>
    </form>

</div> --}}
