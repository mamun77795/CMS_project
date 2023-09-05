@extends('layout.erp.app')

@section('page')
<div class="container m-4" style="font-size: 0.9rem;">
    <div class="row">
        <div class="col-md-12">

        </div>
        <div class="col-md-11 bg-light p-5" style="border-radius: 10px; border:2px solid orange;">
            <div style="font-size: 1.5rem; position: absolute;  top: -20px; left: 40%; background-color: #fff; padding: 0 5px; font-weight: bold;" class="text-center">
                Message Box
            </div>
            <div class="col-md-12">

                <div class="d-flex justify-content-center">
                    <h5>Filter:</h5>
                    <select name="district" id="district" class="ml-1 mr-1">
                        <option value="">District</option>
                        @foreach($customers as $customer)
                        <option value="{{$customer->district}}">{{$customer->district}}</option>
                        @endforeach
                    </select>
                    <select name="thana" id="thana" class="ml-1 mr-1">
                        <option>Thana</option>
                    </select>
                    <select name="blood_group" id="blood_group" class="ml-1 mr-1">
                        <option value="">Blood Group</option>
                        @foreach($customers as $customer)
                        <option value="{{$customer->blood_group}}">{{$customer->blood_group}}</option>
                        @endforeach
                    </select>
                </div>

            </div>
            <form class="form col-md-6" action="{{route('smsProcess')}}" method="POST">
                @csrf
                @method('post')
                <textarea name="message" id="" class="form-control" rows="10"></textarea>
                <div class="col-md-12 d-flex justify-content-center">
                    <input type="submit" class="btn btn-secondary mt-2" value="Send">
                </div>
            </form>
            <div class="col-md-6">
                <h5></h5>
            </div>
        </div>
    </div>
</div>
@endsection