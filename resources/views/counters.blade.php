@extends('layouts.app')


<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- #region datatables files -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" />
<script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<!-- #endregion -->


@section('content')

<div class="container-fluid">

    <div class="text-center py-2">
        <a href="{{route('adapters', $feeder_id)}}" class="btn btn-danger">عودة</a>
        <a href="{{route('counter', [$feeder_id, $adapter_id])}}" class="btn btn-success">اضافة عداد</a>
    </div>

    <div class="row justify-content-center mt-5">

        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>رقم العداد</th>
                    <th>رقم الإشتراك</th>
                    <th>سعة القاطع</th>
                    <th>القرائة الحالية للعداد</th>
                    <th>إحداثيات العداد</th>
                    <th>صور للعداد</th>
                    <th>فئة العداد</th>
                    <th>حالة العداد</th>
                    <th>حالة العقار</th>
                    <th>صور للعقار (مهجور غير صالح للإستخدام)</th>
                    <th>هل يوجد تعدي</th>
                    <th>نوع التعدي</th>
                    <th>صور التعدي</th>
                    <th>الإجرائات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($counters as $item)
                    <tr class="text-center">
                        <th>{{$item->counter_number}}</th>
                        <td>{{$item->subscribe_number}}</td>
                        <td>{{$item->cutter_size}}</td>
                        <td>{{$item->current_meter_reading}}</td>
                        <td><a href="{{$item->counter_coordinates}}" target="_blank">{{$item->counter_coordinates}}</a></td>
                        <td>
                            @foreach (explode('*/***/*',$item->counter_picture) as $pic)
                                    @if($pic == '')
                                        @continue
                                    @endif
                                    <a target="_blank" href="{{asset('/storage/uploads/'.$pic)}}"><img src="{{asset('/storage/uploads/'.$pic)}}" alt="" width="40"></a>
                            @endforeach
                        </td>
                        <td>{{$item->counter_class}}</td>
                        <td>{{$item->counter_status}}</td>
                        <td>{{$item->property_condition}}</td>
                        <td>
                            @if($item->property_condition == 'مهجور غير صالح للإستخدام')
                                @foreach (explode('*/***/*',$item->property_picture) as $pic)
                                    @if($pic == '')
                                        @continue
                                    @endif
                                    <a target="_blank" href="{{asset('/storage/uploads/'.$pic)}}"><img src="{{asset('/storage/uploads/'.$pic)}}" alt="" width="40"></a>
                                @endforeach
                            @endif
                        </td>
                        <td>{{$item->danger_q}}</td>
                        <td>
                            {{$item->danger_type}}
                        </td>
                        <td>
                            @if($item->danger_q == 'نعم')
                                @foreach (explode('*/***/*',$item->danger) as $pic)
                                    @if($pic == '')
                                        @continue
                                    @endif
                                    <a target="_blank" href="{{asset('/storage/uploads/'.$pic)}}"><img src="{{asset('/storage/uploads/'.$pic)}}" alt="" width="40"></a>
                                @endforeach
                            @endif
                        </td>
                        <td>
                            <a type="button" href="{{route('notes.show', ['counter', $item->id])}}" class="btn btn-sm btn-warning">
                                {{\App\Models\Note::where('type', 'counter')->where('type_id', $item->id)->get()->count()}}
                                الملاحظات</a>
                            @if (auth()->user()->role == 'admin')
                                <a href="{{route('delete_counter', $item->id)}}" class="btn btn-danger">حذف</a>
                            @endif
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
        scrollY: 400
    });

    // $(document).ready( function () {
    //     $('#myTable').DataTable();
    // } );

</script>

@endsection
