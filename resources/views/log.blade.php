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

        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>الأسم</th>
                    <th>نوع المستخدم</th>
                    <th>الرقم الوظيفي</th>
                    <th>المركز</th>
                    <th>عدد المحولات</th>
                    <th>عدد العدادات</th>
                    <th>الإجرائات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($logs as $item)
                    @php
                        $adapters = App\Models\Adapter::where('user_id', $item->id)->count();
                        $counters = App\Models\Counter::where('user_id', $item->id)->count();
                    @endphp
                    <tr class="text-center">
                        <th>{{$item->name}}</th>
                        <td>{{$item->role}}</td>
                        <td>{{$item->job_number}}</td>
                        <td>{{$item->center}}</td>
                        <td>{{$adapters}}</td>
                        <td>{{$counters}}</td>
                        <td>
                            @if($item->role != 'admin')
                            <a href="{{route('user.delete', $item->id)}}" class="btn btn-danger">حذف</a>
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
