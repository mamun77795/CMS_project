<?php

namespace App\Modules\Customer\Http\Controllers;

use App\Exports\CustomersExport;
use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Division;
use App\Models\Thana;
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




    public $alldistricts = [];
    public $allthana = [];
    public $ids = [];
    public $dids = [];
    public $request;

    public function getDivision()
    {

        $divisions = Division::all();
        $districts = District::all();
        $thanas = Thana::all();
        $ids = $this->ids;
        return view('Customer::message_send', compact('divisions', 'ids'));
    }

    public function getDistricts(Request $request)
    {
        $this->request = $request;
        $divisions = Division::all();
        //$districts = District::all();
        $thanas = Thana::all();
        if (!isset($request['district-checkboxes'])) {
            $this->doWork1();
        }

        if (isset($request['district-checkboxes'])) {
            $this->doWork1();

            $options = $request['district-checkboxes'];
            foreach ($options as $did) {
                $thanas = DB::select("select * from thanas where district_id='$did'");
                array_push($this->allthana, $thanas);
                array_push($this->dids, $did);
            }
        }

        $districts = $this->alldistricts;
        $thanas = $this->allthana;
        $ids = $this->ids;
        $dids = $this->dids;
        $ids = $this->ids;
        // return $request;
        return view('Customer::message_send', compact('divisions', 'districts', 'thanas', 'ids', 'dids'));
    }

    public function doWork1(){
        if (isset($this->request['division-checkboxes'])) {
            $options = $this->request['division-checkboxes'];
            foreach ($options as $id) {
                $districts = DB::select("select * from districts where division_id='$id'");
                array_push($this->alldistricts, $districts);
                array_push($this->ids, $id);
            }
        }
    }
}
