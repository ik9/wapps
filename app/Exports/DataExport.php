<?php
  
namespace App\Exports;
  
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
  
class DataExport implements FromCollection, WithHeadings
{
    protected $data;
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function __construct($data)
    {
        $this->data = $data;
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
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
            'رقم العداد',
            'رقم الاشتراك',
            'سعة القاطع',
            'القرائة الحالية للعداد',
            'احداثيات العداد',
            'صور للعداد',
            'فئة العداد',
            'حالة العداد',
            'حالة العقار',
            'هل يوجد تعدي',
            'نوع التعدي',
            'صور التعدي',
            'تاريخ الانشاء',
            'وقت الانشاء',
            'الملاحظات'
        ];
    }
}