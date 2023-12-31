<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FeederExport implements FromCollection, WithHeadings
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
            'المحطة',
            'رقم المغذي',
        ];
    }
}
