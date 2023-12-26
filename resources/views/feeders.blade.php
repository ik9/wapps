@extends('layouts.app')

<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- #region datatables files -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" />
<script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="text-center py-2">
            <a href="{{route('home')}}" class="btn btn-danger">عودة</a>
            {{-- <a href="{{route('feeder')}}" class="btn btn-success">اضافة مغذي</a> --}}
        </div>
    </div>
    <div class="row justify-content-center">

        {{-- @foreach($feeders as $item)
            @php
                $adapters = App\Models\Adapter::where('feeder_id', $item->id)->count();
                $counters = App\Models\Counter::where('feeder_id', $item->id)->count();
            @endphp
            <div class="col-lg-4 col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h3>المغذي {{$item->feeder_number}}</h3>
                        <hr>
                        <p>عدد المحولات <b>{{$adapters}}</b></p>
                        <p>عدد مغذيات الجهد المنخفض <b>{{$counters}}</b></p>
                        <a href="#" class="btn btn-success">استخراج xlsx</a>
                        <a href="{{route('adapters', $item->id)}}" class="btn btn-primary">تعديل</a>
                        <a href="{{route('delete_feeder', $item->id)}}" class="btn btn-danger">حذف</a>
                    </div>
                </div>
            </div>
        @endforeach --}}

        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>رقم المغذي</th>
                    <th>اسم المحطة</th>
                    <th>عدد المحولات</th>
                    <th>عدد العدادات</th>
                    <th>الإجرائات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($feeders as $item)
                    @php
                        $adapters = App\Models\Adapter::where('feeder_id', $item->id)->count();
                        $counters = App\Models\Counter::where('feeder_id', $item->id)->count();
                    @endphp
                    <tr class="text-center">
                        <th>{{$item->feeder_number}}</th>
                        <td>{{$item->station}}</td>
                        <td>{{$adapters}}</td>
                        <td>{{$counters}}</td>
                        <td>
                            <a href="{{route('adapters', $item->id)}}" class="btn btn-success">المحولات</a> 
                            <a href="{{route('export', $item->id)}}" class="btn btn-success">استخراج xlsx</a> 
                            <a type="button" href="{{route('notes.show', ['feeder', $item->id])}}" class="btn btn-sm btn-warning">
                                {{\App\Models\Note::where('type', 'feeder')->where('type_id', $item->id)->get()->count()}}
                                الملاحظات</a>
                            {{-- <a href="{{route('delete_feeder', $item->id)}}" class="btn btn-danger">حذف</a>  --}}
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
