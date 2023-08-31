@extends('layout.erp.app')

@section('page')

<div class="container mt-4">
    <a href="{{route('users.create')}}" class="btn btn-success mb-2 mt-2">Add User</a>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Photo</th>
                @if(Session::get('sess_role_id') == 1)
                <th>Action</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->mobile}}</td>
                    <td>
                        <img style="height: 70px; width: 70px;" src="{{asset('photo')}}/{{$user->photo}}" />
                    </td>
                    @if(Session::get('sess_role_id') == 1)
                    <td style="display: flex;">
                        <a href="{{route('users.edit',$user->id)}}" class="btn btn-secondary">Edit</a>
                        <form action="{{route('users.destroy',$user->id)}}" method="post">
                            @csrf                          
                            @method('delete')
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </form>
                    </td>
                    @endif
                </tr>
            @endforeach
            <!-- Add more rows here -->
        </tbody>
    </table>
</div>

@endsection