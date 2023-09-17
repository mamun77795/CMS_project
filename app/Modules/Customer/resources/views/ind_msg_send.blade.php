@extends('layout.erp.app')

@section('page')
<div class="container mt-4">
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Message</th>
                <th>Report</th>
                <th>Failed Person Id</th>
                <th>Type</th>
                <th>Sender</th>
                <th>Date and Time</th>
            </tr>
        </thead>
        <tbody id="tbody">
            @foreach($messages as $message)
            <tr>
                <td>
                    {{$message->message}}
                </td>
                <td>
                    Target: {{$message->total_sms}} <br>
                    Sent: {{$message->sent_total}} <br>
                    Failed: {{$message->sending_failed}} <br>
                </td>
                <td>
                    Failed Ids: 
                    {{$message->failed_person_id}}
                </td>
                <td>
                    {{$message->sms_type}}
                </td>
                <td>
                    <a href="{{route('person', $message->sender_email)}}">
                        {{$message->sender_email}}
                    </a>
                </td>
                <td>
                    {{$message->created_at}}
                </td>
            </tr>
            @endforeach
            <!-- Add more rows here -->
        </tbody>
    </table>
</div>
@endsection