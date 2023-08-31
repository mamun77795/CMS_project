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
        <div class="col-md-6 d-flex justify-content-end">
            <h6 class="mt-4">Download:</h6>
            <a href="{{route('exportxl')}}" class="mt-3 ml-1"><img src="{{asset('assets/dist/img/xlicon.png')}}" style="height: 25px; width:25px;"/></a>
            <a href="{{route('generatePdf')}}" class="mt-3 ml-1"><img src="{{asset('assets/dist/img/pdficon.png')}}" style="height: 25px; width:25px;"/></a>
        </div>
    </div>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Customer Information</th>
                <th>Address</th>
                <th>Additional Info</th>
                <th >Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $customer)
                <tr>
                    <td>
                        <b>First Name: </b>{{$customer->first_name}} <br>
                        <b>Last Name: </b>{{$customer->last_name}} <br>
                        <b>Email: </b>{{$customer->email}} <br>
                        <b>Phone: </b>{{$customer->phone}}
                    </td>
                    <td>
                        <b>Street: </b>{{$customer->street}} <br>
                        <b>Thana: </b>{{$customer->thana}} <br>
                        <b>District: </b>{{$customer->district}} <br>
                        <b>Post Code: </b>{{$customer->post_code}}
                    </td>
                    <td>
                        <b>Blood Group: </b>{{$customer->blood_group}} <br>
                        <b>Reference: </b>{{$customer->reference}} <br>
                    </td>
                    <td style="display: flex;" >
                    <a href="{{route('customers.edit', $customer->id)}}" ><button class="border-white text-primary"><i class="fas fa-edit"></i></button></a>                 
                        <form action="{{route('customers.destroy', $customer->id)}}" method="post">
                            @csrf                          
                            @method('delete')
                            <!-- <input type="submit" class="btn btn-danger" value="Delete"> -->
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