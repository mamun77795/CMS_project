<?php

namespace App\Modules\Customer\Http\Controllers;

use App\Exports\CustomersExport;
use App\Http\Controllers\Controller;
use HelperOne;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class FilterController extends Controller
{
    public $data;


    public function filterCustomer(Request $request)
    {
        $district = $request->district;
        $thana = $request->thana;
        $blood_group = $request->blood_group;

        if ($district == null && $thana == null && $blood_group != null) {
            $filter_blood = DB::select("select * from customers where blood_group='$blood_group'");
            $this->data = $filter_blood;
            return response()->json($filter_blood);
        }
        if ($district != null && $thana == null && $blood_group != null) {
            $filter_blood = DB::select("select * from customers where district='$district' and blood_group='$blood_group'");
            $this->data = $filter_blood;
            return response()->json($filter_blood);
        }
        if ($thana != null && $district != null && $blood_group != null) {
            $filter_blood = DB::select("select * from customers where district='$district' and thana='$thana' and blood_group='$blood_group'");
            $this->data = $filter_blood;
            return response()->json($filter_blood);
        }
        if ($district != null && $thana == null && $blood_group == null) {
            $filter_district = DB::select("select * from customers where district='$district'");
            $this->data = $filter_district;
            return response()->json($filter_district);
        }
        if ($district != null && $thana != null && $blood_group == null) {
            $filter_thana = DB::select("select * from customers where district='$district' and thana='$thana'");
            $this->data = $filter_thana;
            return response()->json($filter_thana);
        }
    }

    public function downloadExportxl(Request $request)
    {

        $district = $request->district;
        $thana = $request->thana;
        $blood_group = $request->blood_group;

        if ($district == null && $thana == null && $blood_group != null) {
            $filter_blood = DB::select("select * from customers where blood_group='$blood_group'");
            $this->data = $filter_blood;
            return Excel::download(new CustomersExport($this->data), 'customers.xlsx');
        }
        if ($district != null && $thana == null && $blood_group != null) {
            $filter_blood = DB::select("select * from customers where district='$district' and blood_group='$blood_group'");
            $this->data = $filter_blood;
            return Excel::download(new CustomersExport($this->data), 'customers.xlsx');
        }
        if ($thana != null && $district != null && $blood_group != null) {
            $filter_blood = DB::select("select * from customers where district='$district' and thana='$thana' and blood_group='$blood_group'");
            $this->data = $filter_blood;
            return Excel::download(new CustomersExport($this->data), 'customers.xlsx');
        }
        if ($district != null && $thana == null && $blood_group == null) {
            $filter_district = DB::select("select * from customers where district='$district'");
            $this->data = $filter_district;
            return Excel::download(new CustomersExport($this->data), 'customers.xlsx');
        }
        if ($district != null && $thana != null && $blood_group == null) {
            $filter_thana = DB::select("select * from customers where district='$district' and thana='$thana'");
            $this->data = $filter_thana;
            return Excel::download(new CustomersExport($this->data), 'customers.xlsx');
        }

        if ($district == null && $thana == null && $blood_group == null) {
            
            $allData = DB::select("select * from customers");
            $this->data = $allData;
            return Excel::download(new CustomersExport($this->data), 'customers.xlsx');
        }
    }
}
