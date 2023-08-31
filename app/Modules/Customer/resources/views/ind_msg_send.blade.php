@extends('layout.erp.app')

@section('page')
<div class="container m-4" style="font-size: 0.9rem;">
    <div class="row">
        <div class="col-md-11 bg-light p-5" style="border-radius: 10px; border:2px solid orange;">
        <div style="font-size: 1.5rem; position: absolute;  top: -20px; left: 40%; background-color: #fff; padding: 0 5px; font-weight: bold;" class="text-center">
            Message Box
        </div>
            <form class="form col-md-12" action="" method="POST">
                @csrf
                @method('post')
                <textarea name="message" id="" class="form-control" rows="10"></textarea>
                <div class="col-md-12 d-flex justify-content-center">
                    <input type="submit" class="btn btn-secondary mt-2" value="Send">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection