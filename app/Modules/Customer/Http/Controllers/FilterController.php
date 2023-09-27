<?php

namespace App\Modules\Customer\Http\Controllers;

use App\Exports\CustomersExport;
use App\Http\Controllers\Controller;
use App\Mail\MarriageAnniversary;
use App\Mail\MyCustomEmail;
use App\Mail\WishMail;
use App\Models\District;
use App\Models\Division;
use App\Models\Mail as ModelsMail;
use App\Models\Thana;
use App\Modules\Customer\Models\BloodGroup;
use App\Modules\Customer\Models\Customer;
use App\Modules\Customer\Models\Message;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class FilterController extends Controller
{
    public $data;
    public $division;
    public $district;
    public $thana;
    public $district_id;
    public $thana_id;
    public $blood_group;
    public $blood_group_id;

    public function filterCustomer(Request $request)
    {
        $this->district = $request->district_id;
        $this->thana = $request->thana_id;
        $this->blood_group = $request->blood_group;
        $this->district_id = $request->district_id;
        $this->thana_id = $request->thana_id;
        $this->blood_group_id = $request->blood_group_id;
        $this->ConditionValue();
        $district_id = $this->district_id;
        $thana_id = $this->thana_id;
        $blood_group_id = $this->blood_group_id;
        $districts = District::all();
        $thanas = DB::select("select * from thanas where district_id='$this->district'");
        $blood_groups = BloodGroup::all();
        $customers = $this->data;
        return view('Customer::index', compact('customers', 'districts', 'district_id', 'thanas', 'thana_id', 'blood_groups', 'blood_group_id'));
    }

    public function downloadExportxl(Request $request)
    {
        $this->district = $request->district_id;
        $this->thana = $request->thana_id;
        $this->blood_group = $request->blood_group_id;

        $this->ConditionValue();

        if (isset($_POST['btn_excel'])) {
            return Excel::download(new CustomersExport($this->data), 'customers.xlsx');
        }
        if (isset($_POST['btn_pdf'])) {
            $data = $this->data;
            $pdf  = Pdf::loadView('Customer::exportpdf', compact('data'));
            return $pdf->download('customers.pdf');
        }
    }

    public function ConditionValue()
    {
        if ($this->district == null && $this->thana == null && $this->blood_group == null) {
            $filter = DB::select("select * from customer_view");
            $this->data = $filter;
        }

        if ($this->district == null && $this->thana == null && $this->blood_group != null) {
            $filter_blood = DB::select("select * from customer_view where blood_group_id='$this->blood_group'");
            $this->data = $filter_blood;
        }
        if ($this->district != null && $this->thana == null && $this->blood_group != null) {
            $filter_blood = DB::select("select * from customer_view where district_id='$this->district' and blood_group_id='$this->blood_group'");
            $this->data = $filter_blood;
        }
        if ($this->thana != null && $this->district != null && $this->blood_group != null) {
            $filter_blood = DB::select("select * from customer_view where district_id='$this->district' and thana_id='$this->thana' and blood_group_id='$this->blood_group'");
            $this->data = $filter_blood;
        }
        if ($this->district != null && $this->thana == null && $this->blood_group == null) {
            $filter_district = DB::select("select * from customer_view where district_id='$this->district'");
            $this->data = $filter_district;
        }
        if ($this->district != null && $this->thana != null && $this->blood_group == null) {
            $filter_thana = DB::select("select * from customer_view where district_id='$this->district' and thana_id='$this->thana'");
            $this->data = $filter_thana;
        }

        if ($this->district == null && $this->thana == null && $this->blood_group == null) {

            $allData = DB::select("select * from customer_view");
            $this->data = $allData;
        }
    }




    public $alldistricts = [];
    public $allthana = [];
    public $ids = [];
    public $dids = [];
    public $tids = [];
    public $request;

    public function getDivision()
    {

        $divisions = Division::all();
        $districts = District::all();
        $thanas = Thana::all();
        $blood_groups = BloodGroup::all();
        $ids = $this->ids;

        return view('Customer::message_send', compact('divisions', 'ids', 'blood_groups'));
    }

    public $customers = [];
    public function getDistricts(Request $request)
    {
        $customers = [];
        $this->request = $request;
        $divisions = Division::all();
        $districts = District::all();
        $thanas = Thana::all();
        if (!isset($request['district-checkboxes'])) {
            $this->doWork1();
        }

        if (isset($request['district-checkboxes']) && !isset($request['thana-checkboxes'])) {
            $this->doWork1();
            $options = $request['district-checkboxes'];
            foreach ($options as $did) {
                $thanas = DB::select("select * from thanas where district_id='$did'");
                array_push($this->allthana, $thanas);
                array_push($this->dids, $did);
                $customer = DB::select("select * from customer_view where district_id='$did'");
                array_push($customers, $customer);
            }
        }

        $refs = [];

        if (isset($request['reference-checkboxes']) && !isset($request['blood-checkboxes']) && !isset($request['district-checkboxes'])) {
            $options3 = $request['reference-checkboxes'];
            foreach ($options3 as $ref) {
                $customer = DB::select("select * from customer_view where reference='$ref'");
                array_push($customers, $customer);
                array_push($refs, $ref);
            }
            $this->dids = [];
        }
        $bloods = [];
        if (isset($request['blood-checkboxes']) && !isset($request['reference-checkboxes'])) {
            $options4 = $request['blood-checkboxes'];
            foreach ($options4 as $blood) {
                $customer = DB::select("select * from customer_view where blood_group_id='$blood'");
                array_push($customers, $customer);
                array_push($bloods, $blood);
            }
            $this->dids = [];
        }



        if (isset($request['thana-checkboxes'])) {
            $this->doWork1();
            $options = $request['district-checkboxes'];
            foreach ($options as $did) {
                $thanas = DB::select("select * from thanas where district_id='$did'");
                array_push($this->allthana, $thanas);
                array_push($this->dids, $did);
            }

            $options2 = $request['thana-checkboxes'];
            foreach ($options2 as $tid) {
                array_push($this->tids, $tid);
            }
        }


        $dob = "";

        if (isset($request['dob'])) {

            $today = Carbon::now();
            $currentDay = $today->day;
            $currentMonth = $today->month;

            $customer = DB::table('customers')
                ->select('*')
                ->where(DB::raw('DAY(date_of_birth)'), '=', $currentDay)
                ->where(DB::raw('MONTH(date_of_birth)'), '=', $currentMonth)
                ->get();

            array_push($customers, $customer);

            $dob = $request['dob'];
        }

        $m_day = "";

        if (isset($request['m_day'])) {

            $today = Carbon::now();
            $currentDay = $today->day;
            $currentMonth = $today->month;

            $customer = DB::table('customers')
                ->select('*')
                ->where(DB::raw('DAY(marriage_date)'), '=', $currentDay)
                ->where(DB::raw('MONTH(marriage_date)'), '=', $currentMonth)
                ->get();

            array_push($customers, $customer);

            $m_day = $request['m_day'];
        }

        $districts = $this->alldistricts;
        $thanas = $this->allthana;
        $ids = $this->ids;
        $dids = $this->dids;
        $tids = $this->ids;

        $totals = 0;
        foreach ($customers as $customer) {
            $totals += count($customer);
        }

        if (isset($request['send_button'])) {
            $all_phone = [];
            $total_sent_sms = 0;
            $failed_sms = 0;
            $sms = $request->message;
            $sms_type = "";
            $failed_person_id = "";
            foreach ($customers as $customer) {
                foreach ($customer as $c_all) {
                    $customer_phone = $c_all->phone;
                    if ($customer_phone != null) {
                        $total_sent_sms += 1;
                        if ($request->sms_type == "non-masking") {
                            sendSMS($sms, $customer_phone);
                        }
                        if ($request->sms_type == "masking") {
                            array_push($all_phone, $customer_phone);
                        }
                    } else {
                        $failed_sms += 1;
                        $failed_person_id .= $c_all->id . ", ";
                    }
                }
            }

            $message = new Message();
            $message->message = $request->message;
            $message->total_sms = $totals;
            $message->sent_total = $total_sent_sms;
            $message->sending_failed = $failed_sms;
            $message->failed_person_id = $failed_person_id;
            $message->sender_email = Session::get('sess_email');
            if ($request->sms_type == "non-masking") {
                $message->sms_type = "Non-Masking";
            } else {
                $message->sms_type = "Masking";
            }
            $message->save();

            if ($request->sms_type == "non-masking") {
                $sms_type = "Non-Masking";
                return 'Your SMS sent successfully! ' . $sms;
            }
            if ($request->sms_type == "masking") {
                $sms_type = "Masking";
                return $all_phone;
            }
        }


        if (isset($request['send_mail'])) {

            $total_mail = 0;
            $sent_email = 0;
            $failed_mail = 0;
            $failed_m_person_id = 0;
            $all_email = [];

            foreach ($customers as $customer) {
                $total_mail += count($customer);
                foreach ($customer as $c_all) {
                    $customer_email = $c_all->email;
                    if ($customer_email != null) {
                        $sent_email += 1;
                        array_push($all_email, $customer_email);
                    } else {
                        $failed_mail += 1;
                        $failed_m_person_id .= $c_all->id . ", ";
                    }
                }
            }

            $mail = new ModelsMail();
            if ($request->hasFile('attachement')) {
                $image = $request->file('attachement');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move('photo', $imageName);
                $mail->attachement = $imageName;
            }
            $mail->heading = $request->subject;
            $mail->body = $request->body;
            $mail->total_mail = $total_mail;
            $mail->sent_mail = $sent_email;
            $mail->failed_mail = $failed_mail;
            $mail->failed_person_id = $failed_m_person_id;
            $mail->sender = Session::get('sess_email');
            $mail->save();

            $emails = ModelsMail::all();

            foreach ($customers as $customer) {
                foreach ($customer as $c_all) {
                    $customer_email = $c_all->email;
                    if ($customer_email != null) {
                       $emailcustom = new MyCustomEmail();
                       //$emailcustom = new WishMail();
                       //$emailcustom = new MarriageAnniversary();
                        Mail::to($customer_email)->send($emailcustom);
                    }
                }
            }

            return "Email successfully sent...";

        }

        $blood_groups = BloodGroup::all();
        $references = Customer::select('reference')->distinct()->get();

        if ($request['send'] == "message") {
            return view('Customer::message_send', compact('divisions', 'districts', 'references', 'thanas', 'ids', 'dids', 'tids', 'blood_groups', 'refs', 'bloods', 'totals', 'dob', 'm_day'));
        }
        if ($request['send'] == "email") {
            return view('Customer::mail_send', compact('divisions', 'districts', 'references', 'thanas', 'ids', 'dids', 'tids', 'blood_groups', 'refs', 'bloods', 'totals', 'dob', 'm_day'));
        }
    }

    public function doWork1()
    {
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
