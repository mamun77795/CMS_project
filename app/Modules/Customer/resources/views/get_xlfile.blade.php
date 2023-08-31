@extends('layout.erp.app')

@section('page')

<div class="container pt-4">
    <form action="{{route('importxl')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="excel_file">
        <button type="submit" class="btn btn-secondary border-warning">Import Excel</button>
    </form>
</div>

@endsection