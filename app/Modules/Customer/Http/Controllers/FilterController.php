<?php

namespace App\Modules\Customer\Http\Controllers;

use App\Exports\CustomersExport;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use HelperOne;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class FilterController extends Controller
{
    public $data;

    public $district;
    public $thana;
    public $blood_group;


    public function filterCustomer(Request $request)
    {
        $this->district = $request->district;
        $this->thana = $request->thana;
        $this->blood_group = $request->blood_group;

        $this->ConditionValue();

        return response()->json($this->data);
    }

    public function downloadExportxl(Request $request)
    {

        $this->district = $request->district;
        $this->thana = $request->thana;
        $this->blood_group = $request->blood_group;

        $this->ConditionValue();

        if(isset($_POST['btn_excel'])){
            return Excel::download(new CustomersExport($this->data), 'customers.xlsx');
        }
        if(isset($_POST['btn_pdf'])){
            $data = $this->data;
            $pdf  = Pdf::loadView('Customer::exportpdf', compact('data'));
            return $pdf->download('customers.pdf');
        }
    }

    public function ConditionValue(){
        if ($this->district == null && $this->thana == null && $this->blood_group == null) {
            $filter = DB::select("select * from customers");
            $this->data = $filter;
        }

        if ($this->district == null && $this->thana == null && $this->blood_group != null) {
            $filter_blood = DB::select("select * from customers where blood_group='$this->blood_group'");
            $this->data = $filter_blood;
        }
        if ($this->district != null && $this->thana == null && $this->blood_group != null) {
            $filter_blood = DB::select("select * from customers where district='$this->district' and blood_group='$this->blood_group'");
            $this->data = $filter_blood;
        }
        if ($this->thana != null && $this->district != null && $this->blood_group != null) {
            $filter_blood = DB::select("select * from customers where district='$this->district' and thana='$this->thana' and blood_group='$this->blood_group'");
            $this->data = $filter_blood;
        }
        if ($this->district != null && $this->thana == null && $this->blood_group == null) {
            $filter_district = DB::select("select * from customers where district='$this->district'");
            $this->data = $filter_district;
        }
        if ($this->district != null && $this->thana != null && $this->blood_group == null) {
            $filter_thana = DB::select("select * from customers where district='$this->district' and thana='$this->thana'");
            $this->data = $filter_thana;
        }

        if ($this->district == null && $this->thana == null && $this->blood_group == null) {
            
            $allData = DB::select("select * from customers");
            $this->data = $allData;
        }
    }
}
