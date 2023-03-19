@extends('layout.layout')



@section('content')

    welcome user 


    <div class="flex w-full p-10 flex-col gap-5 lg:flex-row overflow-x-hidden">

     
            
        <form action="{{ route('previewTable') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input class="border-none" style="font-size: clamp(1.1875rem, 0.9375rem + 0.625vw, 1.6875rem);" type="file"
                name="file">
            <button type="submit"
                class="">Upload</button>
        </form>

    </div>

@endsection

