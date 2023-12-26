@extends('layouts.app')


<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- #region datatables files -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" />
<script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<!-- #endregion -->

@section('content')
<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="text-center py-2">
            <a href="{{route('feeders')}}" class="btn btn-danger">عودة</a>
            <a href="{{route('adapter', $feeder_id)}}" class="btn btn-success">اضافة محول</a>
        </div>
    </div>
    <div class="row justify-content-center mt-5">

        {{-- @foreach($adapters as $item)
            @php
                $counters = App\Models\Counter::where('adapter_id', $item->id)->count();
            @endphp
            <div class="col-lg-4 col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h3>المحول {{$item->adapter_number}}</h3>
                        <hr>
                        <p>سعة المحول <b>{{$item->adapter_size}}</b></p>
                        <p>جهد المحول <b>{{$item->adapter_voltage}}</b></p>
                        <p>نوع المحول <b>{{$item->adapter_type}}</b></p>
                        <p>عدد المحولات <b>{{$counters}}</b></p>
                        <a href="{{route('counters', [$feeder_id,$item->id])}}" class="btn btn-success">العدادات</a>
                        <a href="{{route('delete_adapter', $item->id)}}" class="btn btn-danger">حذف</a>
                    </div>
                </div>
            </div>
        @endforeach --}}

        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>رقم المحول</th>
                    <th>سعة المحول</th>
                    <th>جهد المحول</th>
                    <th>نوع المحول</th>
                    <th>عدد العدادات</th>
                    <th>الإجرائات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($adapters as $item)
                    @php
                        $counters = App\Models\Counter::where('adapter_id', $item->id)->count();
                    @endphp
                    <tr class="text-center">
                        <th>{{$item->adapter_number}}</th>
                        <td>{{$item->adapter_size}}</td>
                        <td>{{$item->adapter_voltage}}</td>
                        <td>{{$item->adapter_type}}</td>
                        <td>{{$counters}}</td>
                        <td>
                            <a href="{{route('counters', [$feeder_id,$item->id])}}" class="btn btn-success">العدادات</a> 
                            <a type="button" href="{{route('notes.show', ['adapter', $item->id])}}" class="btn btn-sm btn-warning">
                                {{\App\Models\Note::where('type', 'adapter')->where('type_id', $item->id)->get()->count()}}
                                الملاحظات</a>
                            @if (auth()->user()->role == 'admin')
                                <a href="{{route('delete_adapter', $item->id)}}" class="btn btn-danger">حذف</a>
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
