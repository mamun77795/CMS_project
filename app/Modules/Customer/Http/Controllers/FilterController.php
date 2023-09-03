<?php

namespace App\Modules\Customer\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FilterController extends Controller
{
    public function filterCustomer(Request $request)
    {

        $district = $request->district;
        $thana = $request->thana;
        $blood_group = $request->blood_group;

        if ($district != null || $thana != null || $blood_group != null) {

            if ($district == null && $thana == null) {
                $filter_blood = DB::select("select * from customers where blood_group='$blood_group'");
                return response()->json($filter_blood);
            }
            if ($thana != null && $blood_group != null) {
                $filter_blood = DB::select("select * from customers where district='$district' blood_group='$blood_group'");
                return response()->json($filter_blood);
            }
            if ($thana != null && $district != null && $blood_group != null) {
                $filter_blood = DB::select("select * from customers where district='$district' and thana='$thana' and blood_group='$blood_group'");
                return response()->json($filter_blood);
            }

            if ($district != null && $thana == null) {
                $filter_district = DB::select("select * from customers where district='$district'");
                return response()->json($filter_district);
            }
            if ($district != null && $thana != null) {
                $filter_thana = DB::select("select * from customers where district='$district' and thana='$thana'");
                return response()->json($filter_thana);
            }
        }
    }
}
