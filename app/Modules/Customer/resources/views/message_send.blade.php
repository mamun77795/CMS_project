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
                        <form id="myForm" class="row" method="POST" action="{{route('getDistricts')}}">
                            @csrf
                            @method('post')
                            <div class="col-md-6">
                                <div>
                                    <h5 class="text-white"><span class="bg-success pl-1 pr-1 mt-2 mb-2">Filter For sending</span></h5>
                                    @foreach($divisions as $division)
                                    <label>
                                        <input type="checkbox" name="division-checkboxes[]" class="checkbox-division ml-2 mr-1" data-filter="division" value="{{$division->id}}" @if($ids !=null) @foreach($ids as $id) @if($id==$division->id) checked @endif @endforeach @endif >{{ $division->name }}
                                    </label>
                                    @endforeach
                                </div>
                                <div>
                                    @if(isset($districts))
                                    <h5><span class="text-success pl-2 pr-1 mt-2 mb-2">District</span></h5>
                                    @foreach($districts as $districtss)
                                    @foreach($districtss as $district)
                                    <label>
                                        <input type="checkbox" id="district_id" name="district-checkboxes[]" class="checkbox-district ml-2 mr-1" data-filter="district" value="{{ $district->id }}" @if($dids !=null) @foreach($dids as $did) @if($did==$district->id) checked @endif @endforeach @endif><span>{{ $district->name }}</span>
                                    </label>
                                    @endforeach
                                    <br>
                                    @endforeach
                                    @endif
                                </div>

                                <!-- <div>
                                    @if(isset($thanas))
                                    <h5 style="color:orange;">Thanas</h5>
                                    @foreach($thanas as $thanass)
                                    <div>
                                        @if(isset($districts))
                                        @foreach($districts as $districtss)
                                        @foreach($districtss as $district)
                                        @if($dids !=null) @if(end($dids)==$district->id)
                                        <label>
                                            <input type="checkbox" id="thana_id" name="all_thana" class="checkbox-thana ml-2 mr-1" data-filter="thana" value="{{ $district->id }}"><span>All</span>
                                        </label>
                                        @endif @endif
                                        @endforeach
                                        <br>
                                        @endforeach
                                        @endif
                                    </div>
                                    @foreach($thanass as $thana)
                                    <label>
                                        <input type="checkbox" name="thana-checkboxes[]" class="checkbox-thana ml-2 mr-1" data-filter="thana" value="{{ $thana->id }}"><span>{{ $thana->name }}</span>
                                    </label>
                                    @endforeach
                                    <br>
                                    @endforeach
                                    @endif
                                    </div> -->


                                
                                <div>
                                    <h5 class="text-white"><span class="bg-success pl-1 pr-1 mt-2 mb-2">Reference</span></h5>
                                    @foreach($references as $reference)
                                    <label>
                                        <input type="checkbox" name="reference-checkboxes[]" class="checkbox-reference ml-2 mr-1" data-filter="reference" value="{{$reference->reference}}" @if(isset($refs)) @foreach($refs as $ref) @if($ref==$reference->reference) checked @endif @endforeach @endif><span>{{$reference->reference}}</span>
                                    </label>
                                    @endforeach
                                </div>
                                <div>
                                    <h5 class="text-white"><span class="bg-success pl-1 pr-1 mt-2 mb-2">Blood Group</span></h5>
                                    @foreach($blood_groups as $blood_group)
                                    <label>
                                        <input type="checkbox" name="blood-checkboxes[]" class="checkbox-blood ml-2 mr-1" data-filter="blood_group" value="{{$blood_group->id}}" @if(isset($bloods)) @foreach($bloods as $blood) @if($blood==$blood_group->id) checked @endif @endforeach @endif><span>{{$blood_group->name}}</span>
                                    </label>
                                    @endforeach
                                </div>
                                <div>
                                    <h5 class="text-white"><span class="bg-success pl-1 pr-1 mt-2 mb-2">Special day wish</span></h5>
                                    <label>
                                        <input type="checkbox" id="dob" name="dob" class="checkbox-district ml-2 mr-1" data-filter="dob" value="dob" @if(isset($dob)) @if($dob == "dob") checked @endif @endif><span>Birthday</span>
                                    </label>
                                    <label>
                                        <input type="checkbox" id="m_day" name="m_day" class="checkbox-district ml-2 mr-1" data-filter="m_day" value="m_day" @if(isset($m_day)) @if($m_day == "m_day") checked @endif @endif><span>Marriage anniversary</span>
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-6">
                                <h5 class="mt-3"><span class="text-white bg-green pl-1 pr-1 mt-2 mb-2">Totol Person:</span> @if(isset($totals)) <b class="text-success">{{$totals}}</b> @endif</h5>
                                <span class="mr-2"><b>SMS Type:</b></span>
                                <select name="sms_type" class="mb-3 mt-2 p-1 pl-2">
                                    <option value="masking">Masking</option>
                                    <option value="non-masking">Non-Masking</option>
                                </select>
                                <textarea name="message" class="form-control" rows="5" required></textarea>
                                <div class="col-md-12 d-flex justify-content-center">
                                    <input type="hidden" name="send" value="message">
                                    <button type="submit" name="send_button" class="btn btn-secondary mt-2">Send</button>
                                </div>
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

        $('.checkbox-reference').change(function() {
            $('#myForm').submit();
        });

        $('.checkbox-blood').change(function() {
            $('#myForm').submit();
        });

        $('.dob').change(function() {
            $('#myForm').submit();
        });

        $('.m_date').change(function() {
            $('#myForm').submit();
        });
    });
</script>

@endsection