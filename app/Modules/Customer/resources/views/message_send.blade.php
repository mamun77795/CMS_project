@extends('layout.erp.app')

@section('page')
<div class="container m-4" style="font-size: 0.9rem;">
    <div class="row">
        <div class="col-md-11 bg-light p-5" style="border-radius: 10px; border:2px solid orange;">
            <div style="font-size: 1.5rem; position: absolute;  top: -20px; left: 40%; background-color: #fff; padding: 0 5px; font-weight: bold;" class="text-center">
                Message Box
            </div>
            <div class="col-md-12">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <form id="myForm" class="col-md-12" method="GET" action="{{route('getDistricts')}}">
                                @csrf
                                <div>
                                    <h5 style="color:orange;">Divisions</h5>
                                    @foreach($divisions as $division)
                                    <label>
                                        <input type="checkbox" name="division-checkboxes[]" class="checkbox-division ml-2 mr-1" data-filter="division" value="{{$division->id}}" @if($ids !=null) @foreach($ids as $id) @if($id==$division->id) checked @endif @endforeach @endif >{{ $division->name }}
                                    </label>
                                    @endforeach
                                </div>
                                <div>
                                    <h5 style="color:orange;">Districts</h5>
                                    @if(isset($districts))
                                    @foreach($districts as $districtss)
                                    @foreach($districtss as $district)
                                    <label>
                                        <input type="checkbox" name="district-checkboxes[]" class="checkbox-district ml-2 mr-1" data-filter="district" value="{{ $district->id }}" @if($dids !=null) @foreach($dids as $did) @if($did==$district->id) checked @endif @endforeach @endif><span>{{ $district->name }}</span>
                                    </label>
                                    @endforeach
                                    <br>
                                    @endforeach
                                    @endif
                                </div>
                            </form>

                            <div class="col-md-12">
                                <h5 style="color:orange;">Thanas</h5>
                                @if(isset($thanas))
                                @foreach($thanas as $thanass)
                               
                                @foreach($thanass as $thana)
                                <label>
                                    <input type="checkbox" name="thana-checkboxes[]" class="checkbox-thana ml-2 mr-1" data-filter="district" value="{{ $thana->id }}"><span>{{ $thana->name }}</span>
                                </label>
                                @endforeach
                                <br>
                                @endforeach
                                @endif
                            </div>
                        </div>
                        <form class=" col-md-6" action="{{route('downloadExportxl')}}" method="POST">
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
    $(document).ready(function() {
        $('.checkbox-division').change(function() {
            $('#myForm').submit();
        });

        $('.checkbox-district').change(function() {
            $('#myForm').submit();
        });

    });
</script>

<script>
    $(function() {
        var district = ""
        var thana = ""
        var blood_group = ""
        var allData = ""
        var selectedDistrict = []
        var fhtml = ""
        var selectedDivision = []
        var dhtml = ""

        var itemValue = ""

        $(".check-division").on("change", function() {
            selectedDivision = []
            dhtml = ""
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
                            itemValue += item.name;
                            dhtml += `<input type="checkbox" name="district[]" class="unique-district" value="${item.name}"> ${item.name} <br>`
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
            fhtml = ""

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
                            fhtml += `<input type="checkbox" name="district[]" class="thana" value="${item.thana}"> ${item.thana} <br>`
                            $('#checkbox-thana').html(fhtml);
                        })
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });

            })
        }
    })
</script>
@endsection