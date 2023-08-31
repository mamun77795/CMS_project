@extends('layout.erp.app')

@section('page')

<div class="container mt-4">
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Photo</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->mobile }}</td>
                    <td>
                        <img src="{{asset('photo')}}/{{$user->photo}}" style="height: 70px; width: 70px;"/>
                    </td>
                </tr>
            <!-- Add more rows here -->
        </tbody>
    </table>
</div>

@endsection