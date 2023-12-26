@extends('layouts.app')

<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- #region datatables files -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" />
<script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="text-center py-2">
            <a href="{{route('networks')}}" class="btn btn-danger">عودة</a>
        </div>
    </div>
    <div class="row justify-content-center">
        <table id="example" class="table table-striped" style="width:100%; direction: rtl">
            <thead>
                <tr>
                    <th>#</th>
                    <th>نوع المعدة</th>
                    <th>عدد المعدات</th>
                    <th>الإجرائات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($types as $item)
                    @php
                        // $adapters = App\Models\Adapter::where('feeder_id', $item->id)->count();
                    @endphp
                    <tr class="text-center">
                        <th>{{$item->id}}</th>
                        <th>{{$item->type}}</th>
                        <th>{{\App\Models\Equipment::where('user_id', auth()->id())->where('equipment_type', $item->type)->where('feeder_id', $feeder_id)->get()->count()}}</th>
                        <td>
                            <a href="{{route('equipment', [$item->id, $feeder_id])}}" class="btn btn-success">المعدات</a>
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
