@extends('layout.erp.app')

@section('page')

<div class="container mt-4">
    <a href="{{route('customers.index')}}" class="btn border-warning text-secondary mb-2 mt-2">Manage Customer</a>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Customer Information</th>
                <th>Address</th>
                <th>Additional Info</th>
                <th>Deleted By</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($records as $customer)
                <tr>
                    <td>
                        <b>First Name: </b>{{$customer->first_name}} <br>
                        <b>Last Name: </b>{{$customer->last_name}} <br>
                        <b>Email: </b>{{$customer->email}} <br>
                        <b>Phone: </b>{{$customer->phone}}
                    </td>
                    <td>
                        <b>Street: </b>{{$customer->street}} <br>
                        <b>Thana: </b>{{$customer->thana_id}} <br>
                        <b>District: </b>{{$customer->district_id}} <br>
                        <b>Post Code: </b>{{$customer->post_code}}
                    </td>
                    <td>
                        <b>Blood Group: </b>{{$customer->blood_group_id}} <br>
                        <b>Reference: </b>{{$customer->reference}} <br>
                    </td>
                    <td>
                        <a href="{{route('person', $customer->deleted_by)}}">
                            {{$customer->deleted_by}}
                        </a>
                    </td>
                    <td style="display: flex;">
                        <a href="{{route('reStore', $customer->id)}}" ><button class="border-white text-secondary"><i class="fas fa-trash-restore"></i></button></a>
                        <form action="{{route('forceDelete', $customer->id)}}" method="post">
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