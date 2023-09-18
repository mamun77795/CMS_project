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
                                <label name="date_of_birth">Date Of Birth</label>
                                <?php if ($customer != '') {
                                    $date_of_birth = date('Y-m-d', strtotime($customer->date_of_birth));
                                } ?>
                                <input type="text" name="date_of_birth" class="datepicker form-control" value="<?php if (isset($date_of_birth)) {
                                                                                                        echo $date_of_birth;
                                                                                                    } ?>">
                                
                            </div>
                            <div class="form-group">
                                <label for="blood_group_id">Blood Group</label>
                                <select name="blood_group_id" id="" class="form-control">
                                    <option value="">Select</option>
                                    @foreach($blood_groups as $blood_group)
                                    <option value="{{$blood_group->id}}" @if($customer !='' ) @if($customer->blood_group_id == $blood_group->id) selected @endif @endif >{{$blood_group->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label name="marriage_date">Marriage Date</label>
                                <?php if ($customer != '') {
                                    $marriage_date = date('Y-m-d', strtotime($customer->marriage_date));
                                } ?>
                                <input type="text" name="marriage_date" class="datepicker form-control" value="<?php if (isset($marriage_date)) {
                                                                                                        echo $marriage_date;
                                                                                                    } ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label name="spouse_name">Spouse Name</label>
                                <input type="text" name="spouse_name" class="form-control" value="@if($customer != ''){{ $customer->spouse_name }}@endif">
                            </div>
                            <div class="form-group">
                                <label name="children">Children</label>
                                <input type="text" name="children" class="form-control" value="@if($customer != ''){{ $customer->children }}@endif">
                            </div>
                            <div class="form-group">
                                <label for="street">Street Address:</label>
                                <input class="form-control" type="text" id="street" name="street" value="@if($customer != ''){{ $customer->street }}@endif">
                            </div>
                            <div class="form-group">
                                <label for="thana">Thana</label>
                                <select name="thana_id" id="" class="form-control">
                                    <option value="">Select</option>
                                    @foreach($thanas as $thana)
                                    <option value="{{$thana->id}}" @if($customer !='' ) @if($customer->thana_id == $thana->id) selected @endif @endif >{{$thana->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="district">District</label>
                                <select name="district_id" id="" class="form-control">
                                    <option value="">Select</option>
                                    @foreach($districts as $district)
                                    <option value="{{$district->id}}" @if($customer !='' ) @if($customer->district_id == $district->id) selected @endif @endif >{{$district->name}}</option>
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
@section('script')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(document).ready(function() {
        $(".datepicker").datepicker();
    });
</script>
@endsection