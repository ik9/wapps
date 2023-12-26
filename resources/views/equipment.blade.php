@extends('layouts.app')

<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- #region datatables files -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" />
<script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="text-center py-2">
            <a href="{{route('network', $feeder_id)}}" class="btn btn-danger">عودة</a>
            <a href="{{route('equipment.form', [$type_id, $feeder_id])}}" class="btn btn-success">اضافة معدة</a>
        </div>
    </div>
    <div class="row justify-content-center">
        <table id="example" class="table table-striped" style="width:100%; direction: rtl">
            <thead>
                <tr>
                    <th>المحطة</th>
                    <th>رقم المغذي</th>
                    <th>نوع المعدة</th>
                    <th>رقم المعدة</th>
                    <th>الرقم التسلسلي</th>
                    <th>الشركة المصنعة</th>
                    <th>الإحداثي</th>
                    <th>صور</th>
                    <th>الإجرائات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($equipments as $item)
                    @php
                        $feeder = \App\Models\Feeder::find($item->feeder_id);
                    @endphp
                    <tr class="text-center">
                        <td>{{$feeder->feeder_number}}</td>
                        <td>{{$feeder->station}}</td>
                        <td>{{$item->equipment_type}}</td>
                        <td>{{$item->number}}</td>
                        <td>{{$item->serial_number}}</td>
                        <td>{{$item->manufacture_company}}</td>
                        <td>{{$item->location}}</td>
                        <td>
                            @foreach (explode('*/***/*',$item->photos) as $pic)
                                    @if($pic == '')
                                        @continue
                                    @endif
                                    <a target="_blank" href="{{asset('/storage/uploads/'.$pic)}}"><img src="{{asset('/storage/uploads/'.$pic)}}" alt="" width="40"></a>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{route('delete_equipment', [$item->id])}}" class="btn btn-danger">حذف</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>



    </div>
</div>
<script>

    new DataTable('#example', {
        responsive: true,
        paging: false,
        scrollX: true,
        scrollY: 800,
    });

    // $(document).ready( function () {
    //     $('#myTable').DataTable();
    // } );

</script>
@endsection
