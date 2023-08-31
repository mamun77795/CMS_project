<?php

namespace App\Imports;

use App\Models\Customer;
use App\Modules\Customer\Models\Customer as ModelsCustomer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;

class CustomersImport implements ToModel, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        
        return new ModelsCustomer([
            'first_name' => $row[0],
            'last_name' => $row[1],
            'email' => $row[2],
            'phone' => $row[3],
            'street' => $row[4],
            'thana' => $row[5],
            'district' => $row[6],
            'post_code' => $row[7],
            'blood_group' => $row[8],
            'reference' => $row[9],
            'created_by' => $row[10],
            'updated_by' => $row[11],
            'deleted_by' => $row[12],
            'created_at' => $row[13],
            'updated_at' => $row[14],
        ]);
    }

    public function rules(): array
    {
        return [
            // 'first_name' => 'required|string|max:255',
            // 'last_name' => 'required|string|max:255',
            // 'email' => 'required|email|unique:customers',
            // 'phone' => 'required|string|max:11',
            // 'street' => 'required|string|max:255',
            // 'thana' => 'required|string|max:255',
            // 'district' => 'required|string|max:255',
            // 'post_code' => 'nullable|string|max:10',
            // 'blood_group' => 'nullable|string|max:10',
            // 'reference' => 'nullable|string|max:255',
            // 'created_by' => 'nullable|string|max:255',
            // 'updated_by' => 'nullable|string|max:255',
            // 'deleted_by' => 'nullable|string|max:255',
            // 'created_at' => 'nullable|date',
            // 'updated_at' => 'nullable|date',
        ];
    }
}
