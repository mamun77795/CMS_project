<?php

namespace App\Modules\Customer\Http\Controllers;

use App\Exports\CustomersExport;
use App\Http\Controllers\Controller;
use App\Imports\CustomersImport;
use App\Mail\MyCustomEmail;
use App\Models\District;
use App\Models\Division;
use App\Models\Mail as ModelsMail;
use App\Models\Thana;
use App\Models\User;
use App\Modules\Customer\Models\BloodGroup;
use App\Modules\Customer\Models\Customer;
use App\Modules\Customer\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $customers = DB::select("select * from customer_view");
        $blood_groups = BloodGroup::all();
        $districts = District::all();
        $thanas = Thana::all();

        //return $customers;
        return view('Customer::index', ['customers' => $customers, 'blood_groups' => $blood_groups, 'districts' => $districts, 'thanas' => $thanas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer = "";
        $districts = District::all();
        $thanas = Thana::all();
        $blood_groups = BloodGroup::all();

        return view('Customer::crmform', compact('customer', 'districts', 'thanas', 'blood_groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'street' => 'required',
        ]);

        $customer = new Customer();
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->street = $request->street;
        $customer->thana_id = $request->thana_id;
        $customer->district_id = $request->district_id;
        $customer->blood_group_id = $request->blood_group_id;

        $date_of_birth = $request->date_of_birth;
        $dob = date('Y-m-d', strtotime($date_of_birth));
        $customer->date_of_birth = $dob;

        $marriage_date = $request->marriage_date;
        $m_date = date('Y-m-d', strtotime($marriage_date));
        $customer->marriage_date = $m_date;
        $customer->children = $request->children;
        $customer->spouse_name = $request->spouse_name;

        $customer->created_by = "Name: " . Session::get('sess_user_name') . ", Email: " . Session::get('sess_email');
        $customer->save();

        return Redirect::route('customers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        $districts = District::all();
        $thanas = Thana::all();
        $blood_groups = BloodGroup::all();
        return view('Customer::crmform', compact('customer', 'districts', 'thanas', 'blood_groups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'street' => 'required',
        ]);

        $customer = Customer::find($customer->id);
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->street = $request->street;
        $customer->thana_id = $request->thana_id;
        $customer->district_id = $request->district_id;
        $customer->post_code = $request->post_code;
        $customer->reference = $request->reference;
        $customer->blood_group_id = $request->blood_group_id;

        $date_of_birth = $request->date_of_birth;
        $dob = date('Y-m-d', strtotime($date_of_birth));
        $customer->date_of_birth = $dob;

        $marriage_date = $request->marrage_date;
        $m_date = date('Y-m-d', strtotime($marriage_date));
        $customer->marriage_date = $m_date;
        $customer->children = $request->children;
        $customer->spouse_name = $request->spouse_name;
        $customer->updated_by = "Name: " . Session::get('sess_user_name') . ", Email: " . Session::get('sess_email');


        // $today = Carbon::now();
        // $currentDay = $today->day;
        // $currentMonth = $today->month;

        // $birthdayPeople = DB::table('your_table_name')
        //     ->select('*')
        //     ->where(DB::raw('DAY(date_of_birth)'), '=', $currentDay)
        //     ->where(DB::raw('MONTH(date_of_birth)'), '=', $currentMonth)
        //     ->get();


        $customer->save();
        return Redirect::route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        $deleted_by = Session::get('sess_email');
        //DB::table('customers')->raw(`update customers set deleted_by=$deleted_by where id=$id`);

        DB::table('customers')
            ->where('id', $id)
            ->update(['deleted_by' => $deleted_by]);

        return Redirect::route('customers.index');
    }

    public function deleted()
    {
        $records = Customer::onlyTrashed()->get();
        return view('Customer::deleted', compact('records'));
    }

    public function reStore($id)
    {
        $record = Customer::withTrashed()->find($id);
        $record->restore();
        return Redirect::route('deleted');
    }

    public function forceDelete($id)
    {
        $record = Customer::withTrashed()->find($id);
        $record->forceDelete();
        return Redirect::route('deleted');
    }

    public function person($email)
    {
        $user = User::where('email', $email)->first();
        return view('Customer::user', compact('user'));
    }

    public function getXlimport()
    {
        return view('Customer::get_xlfile');
    }

    public function importxl()
    {
        $file = request()->file('excel_file');
        $filePath = $file->store('temp');

        Excel::import(new CustomersImport, $filePath);

        return Redirect::route('customers.index');
    }

    public function messageBox()
    {
        $customers = Customer::all();
        $districts = [];
        $divisions = Division::all();
        $blood_groups = BloodGroup::all();
        $ids = [];
        $references = Customer::select('reference')->distinct()->get();
        return view('Customer::message_send', compact('customers', 'divisions', 'references', 'blood_groups'), compact('districts', 'ids'));
    }
    public function indMsgBox()
    {
        $messages = Message::all();
        return view('Customer::ind_msg_send', compact('messages'));
    }

    public function sendEmail()
    {
        $customers = Customer::all();
        $districts = [];
        $divisions = Division::all();
        $blood_groups = BloodGroup::all();
        $ids = [];
        $references = Customer::select('reference')->distinct()->get();
        return view('Customer::mail_send', compact('customers', 'divisions', 'references', 'blood_groups'), compact('districts', 'ids'));
    }

    public function emailReport()
    {
        $mails = ModelsMail::all();
        return view('Customer::email_report', compact('mails'));
    }
}
