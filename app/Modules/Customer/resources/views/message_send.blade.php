@extends('layout.erp.app')

@section('page')
<div class="container m-4" style="font-size: 0.9rem;">
    <div class="row">
        <div class="col-md-11 bg-light p-5" style="border-radius: 10px; border:2px solid orange;">
            <div style="font-size: 1.5rem; position: absolute;  top: -20px; left: 40%; background-color: #fff; padding: 0 5px; font-weight: bold;" class="text-center">
                Message Box
            </div>
            <div class="col-md-12 d-flex">
                <form class="form col-md-6" action="{{route('downloadExportxl')}}" method="POST">
                    @csrf
                    @method('post')
                    <input type="hidden" id="district_input" value="" name="district">
                    <input type="hidden" id="thana_input" value="" name="thana">
                    <input type="hidden" id="blood_group_input" value="" name="blood_group">
                    <textarea name="message" class="form-control" rows="10"></textarea>
                    <div class="col-md-12 d-flex justify-content-center">
                        <!-- <input type="submit" class="btn btn-secondary mt-2" value="Send"> -->
                        <button type="submit" name="send-button" class="btn btn-secondary mt-2">Send</button>
                    </div>
                </form>
                <div class="col-md-6  justify-content-center">
                    <h5>Filter:</h5>
                    <select name="district" id="district" class="ml-1 mr-1">
                        <option value="">District</option>
                        @foreach($customers as $customer)
                        <option value="{{$customer->district}}">{{$customer->district}}</option>
                        @endforeach
                    </select>
                    <select name="thana" id="thana" class="ml-1 mr-1">
                        <option value="">Thana</option>
                    </select>
                    <select name="blood_group" id="blood_group" class="ml-1 mr-1">
                        <option value="">Blood Group</option>
                        @foreach($customers as $customer)
                        <option value="{{$customer->blood_group}}">{{$customer->blood_group}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(function() {
        var district = ""
        var thana = ""
        var blood_group = ""
        var allData = ""

        $('#district').on('change', function() {
            district = this.value;
            var html = "";
            var blood_group = "";
            var tbody = "";
            $.ajax({
                url: `http://localhost/new-project/public/filter_customer`,
                method: "POST",
                data: {
                    'district': district
                },
                success: function(data) {
                    allData = data;
                    $('#district_input').val(district);
                    html += "<option value=''>Thana</option>"
                    data.forEach(item => {
                        if (district != "") {
                            html += `<option value='${item.thana}'>${item.thana}</option>`
                        }
                        $('#thana').html(html)

                    })
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });

        $('#thana').on('change', function() {
            thana = this.value;
            var html = "";
            var tbody = "";
            $.ajax({
                url: `http://localhost/new-project/public/filter_customer`,
                method: "POST",
                data: {
                    'district': district,
                    'thana': thana
                },
                success: function(data) {
                    allData = data;
                    $('#thana_input').val(thana);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        })

        $('#blood_group').on('change', function() {
            var html = "";
            var tbody = "";
            blood_group = this.value;

            $.ajax({
                url: `http://localhost/new-project/public/filter_customer`,
                method: "POST",
                data: {
                    'district': district,
                    'thana': thana,
                    'blood_group': blood_group
                },
                success: function(data) {
                    allData = data;
                    $('#blood_group_input').val(blood_group);

                    data.forEach(item => {

                    })
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        })


        // $('#send-button').on('click', function(e) {
        //     e.preventDefault();
        //     var message = $('#message').value;
        //     allData.forEach(item => {
        //         $.ajax({
        //             url: `http://localhost/new-project/public/send-sms`,
        //             method: "POST",
        //             data: {
        //                 'phone': item.phone,
        //                 'district': district,
        //                 'thana': thana,
        //                 'blood_group': blood_group,
        //                 'message': message,
        //             },
        //             success: function(data) {
        //                 console.log("successfully send");
        //             },
        //             error: function(xhr, status, error) {
        //                 console.error(error);
        //             }
        //         });
        //     })
        // })



    })
</script>
@endsection