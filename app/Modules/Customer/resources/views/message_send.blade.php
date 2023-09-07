@extends('layout.erp.app')

@section('page')
<div class="container m-4" style="font-size: 0.9rem;">
    <div class="row">
        <div class="col-md-11 bg-light p-5" style="border-radius: 10px; border:2px solid orange;">
            <div style="font-size: 1.5rem; position: absolute;  top: -20px; left: 40%; background-color: #fff; padding: 0 5px; font-weight: bold;" class="text-center">
                Message Box
            </div>
            <div class="col-md-12 d-flex">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 row">
                        <div class="col-md-12">
                                <h6>Division</h6>
                                <form action=""  method="">
                                    <div id="checkbox-division">
                                    @foreach($divisions as $division)
                                    <input type="checkbox" name="division[]" class="check-division" value="{{$division->id}}"> {{$division->name}} <br>
                                    @endforeach
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-12">
                                <h6>District</h6>
                                <form action="" method="">
                                    <div id="checkbox-district">
                                    <input type="checkbox" name="district[]" class="unique-district" id="check-district" value="Dhaka"> Dhaka <br>
                                    </div>
                                    <!-- @foreach($districts as $district)
                                    <input type="checkbox" name="district[]" class="check-district" id="check-district" value="{{$district->name}}"> {{$district->name}} <br>
                                    @endforeach -->
                                </form>
                            </div>
                            <div class="col-md-12">
                                <h6>Thana</h6>
                                <form action=""  method="">
                                    <div id="checkbox-thana">

                                    </div>
                                </form>
                            </div>
                        </div>
                        <form class="form col-md-6" action="{{route('downloadExportxl')}}" method="POST">
                            @csrf
                            @method('post')
                            <input type="hidden" id="district_input" value="" name="district">
                            <input type="hidden" id="thana_input" value="" name="thana">
                            <input type="hidden" id="blood_group_input" value="" name="blood_group">
                            <textarea name="message" class="form-control" rows="10"></textarea>
                            <div class="col-md-12 d-flex justify-content-center">
                                <button type="submit" name="send-button" class="btn btn-secondary mt-2">Send</button>
                            </div>
                        </form>
                    </div>
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
        var selectedDistrict = []
        var fhtml=""
        var selectedDivision = []
        var dhtml=""

        var itemValue = ""

        $(".check-division").on("change", function() {
            selectedDivision = []
            dhtml=""
            updateSelectedDivisions();
            
        });

        function updateSelectedDivisions() {
            
            $(".check-division:checked").each(function() {
                selectedDivision.push($(this).val());
            });
            selectedDivision.forEach(item => {
                $.ajax({
                    url: `http://localhost/new-project/public/filter_division`,
                    method: "POST",
                    data: {
                        'division': item
                    },
                    success: function(data) {
                        console.log(data);
                        data.forEach(item => {
                            itemValue+=item.name;
                            dhtml+= `<input type="checkbox" name="district[]" class="unique-district" value="${item.name}"> ${item.name} <br>`
                            $('#checkbox-district').html(dhtml);
                        })
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
                
            })
        }

        $(".unique-district").on("click", function() {
            selectedDistrict = []
            fhtml=""

            updateSelectedItems();
            
        });

        function updateSelectedItems() {
            $(".unique-district:checked").each(function() {
                selectedDistrict.push($(this).val());
            });
            selectedDistrict.forEach(item => {
                $.ajax({
                    url: `http://localhost/new-project/public/filter_customer`,
                    method: "POST",
                    data: {
                        'district': item
                    },
                    success: function(data) {
                        allData = data;
                        //$('#district_input').val(district);
                        data.forEach(item => {
                            // console.log(item);
                            fhtml+= `<input type="checkbox" name="district[]" class="thana" value="${item.thana}"> ${item.thana} <br>`
                            $('#checkbox-thana').html(fhtml);
                        })
                    },
                    error: function(xhr, status, error){
                        console.error(error);
                    }
                });
                
            })
        }
    })
</script>
@endsection