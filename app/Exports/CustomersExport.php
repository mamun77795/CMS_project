<?php

namespace App\Exports;

use App\Models\Customer;
use App\Modules\Customer\Models\Customer as ModelsCustomer;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class CustomersExport implements  FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{

    //WithHeadings, ShouldAutoSize, WithStyles,
    /**
    * @return \Illuminate\Support\Collection
    */

    public $allData;
    protected $data;

    public function __construct($data)
    {
        $this->data= $data;
        
    }

    public function collection()
    {   
        if($this->data != null){
            return collect($this->data);
        }else{
            return ModelsCustomer::all();
        }
    }

    public function headings(): array
    {
        return [
            'id',
            'first_name',
            'last_name',
            'email',
            'phone',
            'street',
            'thana',
            'district',
            'post_code',
            'blood_group',
            'date_of_birth',
            'marriage_date',
            'spouse_name',
            'children',
            'reference',
            'created_by',
            'updated_by',
            'deleted_by',
            'created_at',
            'updated_at',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:' . $sheet->getHighestColumn() . '1')->applyFromArray([
            'font' => [
                'bold' => true,
            ],
        ]);
    }
    

}
