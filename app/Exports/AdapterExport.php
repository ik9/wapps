<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AdapterExport implements FromCollection, WithHeadings
{
    protected $data;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($data)
    {
        $this->data = $data;
    }
    public function collection()
    {
        return collect($this->data);
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings() :array
    {
        return [
            'الإسم',
            'الرقم الوظيفي',
            'المنطقة',
            'المحطة',
            'رقم المغذي',
            'رقم المحول',
            'سعة المحول',
            'جهد المحول',
            'نوع المحول',
            'تاريخ الانشاء',
            'وقت الانشاء',
            'الملاحظات'
        ];
    }
}
