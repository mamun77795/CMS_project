<?php

namespace App\Modules\Customer\Http\Controllers;

use App\Exports\CustomersExport;
use App\Http\Controllers\Controller;
use App\Modules\Customer\Models\Message;
use Barryvdh\DomPDF\Facade\Pdf;
use HelperOne;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class FilterController extends Controller
{
    public $data;
    public $division;
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

        if (isset($_POST['btn_excel'])) {
            return Excel::download(new CustomersExport($this->data), 'customers.xlsx');
        }
        if (isset($_POST['btn_pdf'])) {
            $data = $this->data;
            $pdf  = Pdf::loadView('Customer::exportpdf', compact('data'));
            return $pdf->download('customers.pdf');
        }
        if (isset($_POST['send-button'])) {
            $message = new Message();
            $message->message = $request->message;
            $message->save();

            $customers = $this->data;

            $sms = $request->message;

            foreach ($customers as $customer) {
                $customer_phone = $customer->phone;
                if ($customer_phone != null) {
                    sendSMS($sms, $customer_phone);
                }
            }
            return 'Your SMS sent successfully! ' . $sms;
        }
    }

    public function filterDivision(Request $request){
        $this->division = $request->division;
        if($this->division != null){
            $district = DB::select("select * from districts where division_id='$this->division'");
            $this->data= $district;
            return response()->json($this->data);
        }
    }


    public function ConditionValue()
    {
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
