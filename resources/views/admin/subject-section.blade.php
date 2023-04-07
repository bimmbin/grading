@extends('layout.layout')



@section('content')

<form action="{{ route('admin.createsection') }}" method="post" enctype="multipart/form-data" class="mt-10">
    @csrf
    <h1>section</h1>
    <input class="border-none" style="font-size: clamp(1.1875rem, 0.9375rem + 0.625vw, 1.6875rem);"
        type="file" name="file">
    <button type="submit" class="">Upload</button>
</form>



<form action="{{ route('admin.createsubject') }}" method="post" enctype="multipart/form-data" class="mt-48">
    @csrf
    <h1>subject</h1>
    <input class="border-none" style="font-size: clamp(1.1875rem, 0.9375rem + 0.625vw, 1.6875rem);"
        type="file" name="file">
    <button type="submit" class="">Upload</button>
</form>


@endsection

