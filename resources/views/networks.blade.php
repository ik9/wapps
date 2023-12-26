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
        </div>
    </div>
    <div class="row justify-content-center">
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>رقم المغذي</th>
                    <th>اسم المحطة</th>
                    <th>عدد المعدات</th>
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
                        <td>0</td>
                        <td>
                            <a href="{{route('network', $item->id)}}" class="btn btn-success">المعدات</a> 
                            <a href="{{route('network_notes_show', $item->id)}}" class="btn btn-sm btn-warning">
                                {{\App\Models\NetworkNote::where('type_id', $item->id)->get()->count()}}
                                ملاحظات المسح</a>
                            <a href="{{route('network_notes_form', $item->id)}}" class="btn btn-sm btn-primary">
                                اضافة ملاحظة</a>
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
        scrollY: 800
    });

    // $(document).ready( function () {
    //     $('#myTable').DataTable();
    // } );

</script>
@endsection
