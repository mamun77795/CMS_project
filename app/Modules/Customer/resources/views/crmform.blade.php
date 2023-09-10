@extends('layout.erp.app')

@section('page')
<div class="container m-4" style="font-size: 0.9rem;">
    <div class="row">
        <div class="col-md-11 bg-light p-5" style="border-radius: 10px; border:2px solid orange;">
        <div style="font-size: 1.5rem; position: absolute;  top: -20px; left: 25%; background-color: #fff; padding: 0 5px; font-weight: bold;" class="text-center">
            Customer Information Form
        </div>
            @if($customer == "")
            <form class="form col-md-12" action="{{route('customers.store')}}" method="POST">
                @csrf
                @else
                <form class="form col-md-12" action="{{route('customers.update', $customer->id)}}" method="POST">
                    @csrf
                    @method('put')
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="first_name">First Name:</label>
                                <input class="form-control" type="text" id="first_name" name="first_name" value="@if($customer != ''){{ $customer->first_name }}@endif">
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name:</label>
                                <input class="form-control" type="text" id="last_name" name="last_name" value="@if($customer != ''){{ $customer->last_name }}@endif">
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input class="form-control" type="email" id="email" name="email" value="@if($customer != ''){{ $customer->email }}@endif">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone:</label>
                                <input class="form-control" type="tel" id="phone" name="phone" value="@if($customer != ''){{ $customer->phone }}@endif">
                            </div>
                            <div class="form-group">
                                <label for="blood_group">Blood Group: </label>
                                <input class="form-control" type="text" id="blood_group" name="blood_group" value="@if($customer != ''){{ $customer->blood_group }}@endif">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="street">Street Address:</label>
                                <input class="form-control" type="text" id="street" name="street" value="@if($customer != ''){{ $customer->street }}@endif">
                            </div>
                            <div class="form-group">
                                <label for="thana">Thana</label>
                                <select name="thana" id="" class="form-control">
                                    @foreach($thanas as $thana)
                                        <option value="{{$thana->name}}" @if($customer != '') @if($customer->thana_id == $thana->id) selected  @endif @endif >{{$thana->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="district">District</label>
                                <select name="district" id="" class="form-control">
                                    @foreach($districts as $district)
                                        <option value="{{$district->name}}" @if($customer != '') @if($customer->district_id == $district->id) selected  @endif @endif >{{$district->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="post_code">Post Code:</label>
                                <input class="form-control" type="text" id="post_code" name="post_code" value="@if($customer != ''){{ $customer->post_code }}@endif">
                            </div>
                            <div class="form-group">
                                <label for="reference">Reference</label>
                                <input type="text" name="reference" class="form-control" id="reference" value="@if($customer != ''){{ $customer->reference }}@endif" name="reference" rows="4" cols="50" />
                            </div>
                            <!-- Submit Button -->
                            <div class="btn-group">
                            <a href="{{route('customers.index')}}" class="btn btn-danger mt-3 mb-3" style="margin-left:100%;">Cancel</a>
                            <button class="btn btn-success mt-3 mb-3" type="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
        </div>
    </div>
</div>
@endsection