@extends('layout.erp.app')

@section('page')

<div class="container mt-4">
    <div class="row bg-secondary mb-2">
        <div class="col-md-6 d-flex justify-content-start">
            <a href="{{route('customers.create')}}" class="btn border-warning btn-secondary mb-2 mt-2">Add</a>
            <a href="{{route('getXlimport')}}" class="btn border-warning btn-secondary ml-1 mb-2 mt-2">Import</a>
            @if(Session::get('sess_role_id') == 1)
            <a href="{{route('deleted')}}" class="btn border-warning btn-secondary ml-1 mb-2 mt-2">Deleted items</a>
            @endif
        </div>
        <form action="{{route('downloadExportxl')}}" class="col-md-6" method="post">
            @csrf
            @method('post')

            <div class="col-md-12 d-flex justify-content-end">
                <h6 class="mt-4">Download:</h6>
                <input type="hidden" id="district_input" @if(isset($district_id)) value="{{$district_id}}" @else value="" @endif name="district_id">
                <input type="hidden" id="thana_input" @if(isset($thana_id)) value="{{$thana_id}}" @else value="" @endif name="thana_id">
                <input type="hidden" id="blood_group_input" @if(isset($blood_group_id)) value="{{$blood_group_id}}" @else value="" @endif name="blood_group_id">
                <button type="submit" name="btn_excel" style="border: none; background:none;" class="mt-3 ml-1"><img src="{{asset('assets/dist/img/xlicon.png')}}" style="height: 22px; width:22px;" /></button>
                <button type="submit" name="btn_pdf" style="border: none; background:none;" class="mt-3 ml-1"><img src="{{asset('assets/dist/img/pdficon.png')}}" style="height: 22px; width:22px;" /></button>
            </div>
        </form>
    </div>
    <div class="col-md-12">
        <form id="filter_form" action="{{route('filterCustomer')}}" method="POST" >
            @csrf
            @method('POST')
        <div class="d-flex justify-content-center">
            <h5>Filter:</h5>
            <select name="district_id" id="district" class="ml-1 mr-1">
                <option value="">District</option>
                @foreach($districts as $district)
                <option value="{{$district->id}}" @if(isset($district_id)) @if($district->id == $district_id) selected @endif @endif>{{$district->name}}</option>
                @endforeach
            </select>
            <select name="thana_id" id="thana" class="ml-1 mr-1">
                <option value="">Thana</option>
                @foreach($thanas as $thana)
                <option value="{{$thana->id}}" @if(isset($thana_id)) @if($thana->id == $thana_id) selected @endif @endif>{{$thana->name}}</option>
                @endforeach
            </select>
            <select name="blood_group" id="blood_group" class="ml-1 mr-1">
                <option value="">Blood Group</option>
                @foreach($blood_groups as $blood_group)
                <option value="{{$blood_group->id}}" @if(isset($blood_group_id)) @if($blood_group->id == $blood_group_id) selected @endif @endif>{{$blood_group->name}}</option>
                @endforeach
            </select>
        </div>
        </form>
    </div>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Customer Information</th>
                <th>Address</th>
                <th>Additional Info</th>
                <th>Reference</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="tbody">
            @foreach($customers as $customer)
            <tr>
                <td>
                    <b>First Name: </b>{{$customer->first_name}}<br>
                    <b>Last Name: </b>{{$customer->last_name}}<br>
                    <b>Email: </b>{{$customer->email}}<br>
                    <b>Phone: </b>{{$customer->phone}}
                </td>
                <td>
                    <b>Street: </b>{{$customer->street}} <br>
                    <b>Thana: </b>{{$customer->thana}} <br>
                    <b>District: </b>{{$customer->district}} <br>
                    <b>Post Code: </b>{{$customer->post_code}}
                </td>
                <td>
                    <b>Blood Group: </b> {{$customer->blood_group}} <br>
                    <b>Date of Birth: </b> {{$customer->date_of_birth}} <br>
                    <b>Marriage Date: </b> {{$customer->marriage_date}} <br>
                    <b>Spouse Name: </b> {{$customer->spouse_name}} <br>
                    <b>Children: </b> {{$customer->children}} <br>
                </td>
                <td>
                  {{$customer->reference}}
                </td>
                <td style="display: flex;">
                    <a href="{{route('customers.edit', $customer->id)}}"><button class="border-white text-primary"><i class="fas fa-edit"></i></button></a>
                    <form action="{{route('customers.destroy', $customer->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="text-danger border-white"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
            <!-- Add more rows here -->
        </tbody>
    </table>
</div>

@endsection
@section('script')
<script>
    $(function() {

        $('#district').change(function() {
            $('#filter_form').submit();
        });

        $('#thana').change(function() {
            $('#filter_form').submit();
        });

        $('#blood_group').change(function() {
            $('#filter_form').submit();
        });

    })
</script>
@endsection