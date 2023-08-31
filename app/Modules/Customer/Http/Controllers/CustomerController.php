<?php

namespace App\Modules\Customer\Http\Controllers;

use App\Exports\CustomersExport;
use App\Http\Controllers\Controller;
use App\Imports\CustomersImport;
use App\Mail\MyCustomEmail;
use App\Models\User;
use App\Modules\Customer\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
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
        $customers = Customer::all();
        return view('Customer::index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer = "";
        return view('Customer::crmform', compact('customer'));
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
            'thana' => 'required',
            'district' => 'required',
            'post_code' => 'required',
            'reference' => 'required',
            'blood_group' => 'required',
        ]);

        $customer = new Customer();
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->street = $request->street;
        $customer->thana = $request->thana;
        $customer->district = $request->district;
        $customer->blood_group = $request->blood_group;
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
        return view('Customer::crmform', compact('customer'));
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
            'thana' => 'required',
            'district' => 'required',
            'blood_group' => 'required',
        ]);

        $customer = Customer::find($customer->id);
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->street = $request->street;
        $customer->thana = $request->thana;
        $customer->district = $request->district;
        $customer->post_code = $request->post_code;
        $customer->reference = $request->reference;
        $customer->blood_group = $request->blood_group;
        $customer->updated_by = "Name: " . Session::get('sess_user_name') . ", Email: " . Session::get('sess_email');
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

    public function exportxl()
    {
        return Excel::download(new CustomersExport, 'customers.xlsx');
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

    public function generatePdf()
    {
        $data = Customer::all();

        $pdf  = Pdf::loadView('Customer::exportpdf', compact('data'));

        return $pdf->download('customers.pdf');
    }


    public function SmsProcess(){

        $customers = Customer::all();

        $sms = "This is test SMS from Elite Paint new software";

        foreach ($customers as $customer) {
            $customer_phone = $customer->phone;
            sendSMS($sms, $customer_phone);
               
        }
        return 'SMS sent successfully!';
    }


    public function sendEmail()
    {
        
        $customers = Customer::all();

        foreach ($customers as $customer) {
            $mailaddress = $customer->email;
            $this->mailAddress($mailaddress);
               
        }

        return 'Email sent successfully!';
    }


    public function mailAddress($mailaddress){
        $email = new MyCustomEmail;
        Mail::to($mailaddress)->send($email);
    }
    
}
