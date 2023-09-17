@extends('layout.erp.app')

@section('page')
<div class="container mt-4">
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Subject</th>
                <th>Description</th>
                <th>Attachement</th>
                <th>Report</th>
                <th>Failed Person Id</th>
                <th>Sender</th>
                <th>Date and Time</th>
            </tr>
        </thead>
        <tbody id="tbody">
            @foreach($mails as $mail)
            <tr>
                <td>
                    {{$mail->heading}}
                </td>
                <td>{{$mail->body}}</td>
                <td>
                    <img src="{{asset('photo')}}/{{$mail->attachement}}" alt="" style="height:100px; width: 100px;"/>
                </td>
                <td>
                    Target: {{$mail->total_mail}} <br>
                    Sent: {{$mail->sent_mail}} <br>
                    Failed: {{$mail->failed_mail}} <br>
                </td>
                <td>
                    Failed Ids: 
                    {{$mail->failed_person_id}}
                </td>
                <td>
                    {{$mail->sender}}
                </td>
                <td>
                    {{$mail->created_at}}
                </td>
            </tr>
            @endforeach
            <!-- Add more rows here -->
        </tbody>
    </table>
</div>
@endsection