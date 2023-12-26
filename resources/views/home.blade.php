@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card shadow-sm">
            @if (auth()->user()->role == 'admin')
                <div class="card-body row text-center justify-content-center">
                    @php
                        $feeders = App\Models\Feeder::all()->count();
                        $adapters = App\Models\Adapter::all()->count();
                        $counters = App\Models\Counter::all()->count();

                        $today_adapters = App\Models\Adapter::whereDate('created_at', Carbon\Carbon::today())->get()->count();
                        $today_counters = App\Models\Counter::whereDate('created_at', Carbon\Carbon::today())->get()->count();
                    @endphp
                    <div class="col-12 mb-5">
                        <a href="{{route('feeders')}}" class="btn btn-primary">مسح العدادات/المحولات</a>
                        <a href="{{route('networks')}}" class="btn btn-primary">مسح الشبكات/المعدات</a>
                    </div>
                    <div class="col-md-6">
                
                        <h3>احصائيات عامة</h3>
                        <hr>
                        <p>عدد المغذيات <b>{{$feeders}}</b></p>
                        <p>عدد المحولات <b>{{$adapters}}</b></p>
                        <p>عدد العدادات<b>{{$counters}}</b></p>
                        <br>
                        <hr>
                        <br>
                        <p>عدد المحولات المضافة اليوم <b>{{$today_adapters}}</b></p>
                        <p>عدد العدادات المضافة اليوم <b>{{$today_counters}}</b></p>
                        {{-- <a href="{{route('log')}}" class="btn btn-primary mb-2">السجل</a> --}}
                        <a href="{{route('users')}}" class="btn btn-primary mb-2">إدارة المستخدمين</a>
                    </div>
                    {{-- <div class="col-12">
                        <a href="{{route('export_feeders')}}" class="btn btn-success mb-2">استخراج xlsx المغذيات</a> 
                        <a href="{{route('export_adapters')}}" class="btn btn-success mb-2">استخراج xlsx المحولات</a> 
                        <a href="{{route('export_counters')}}" class="btn btn-success mb-2">استخراج xlsx العدادات</a> 
                    </div> --}}
                </div>
            @endif
            <div class="card-body row text-center justify-content-center">
                @php
                    $feeders = App\Models\Feeder::where('user_id', auth()->id())->count();
                    $adapters = App\Models\Adapter::where('user_id', auth()->id())->count();
                    $counters = App\Models\Counter::where('user_id', auth()->id())->count();
                @endphp
                <div class="col-md-6">
                    <h3>احصائياتك</h3>
                    <hr>
                    <p>عدد المغذيات <b>{{$feeders}}</b> <a href="{{route('export_feeders')}}" class="btn-link mb-2">استخراج xlsx</a> </p>
                    <p>عدد المحولات <b>{{$adapters}}</b> <a href="{{route('export_adapters')}}" class="btn-link mb-2">استخراج xlsx</a> </p>
                    <p>عدد العدادات<b>{{$counters}}</b> <a href="{{route('export_counters')}}" class="btn-link mb-2">استخراج xlsx</a> </p>
                </div>
                <div class="col-12">
                    {{-- <a href="{{route('export_all')}}" class="btn btn-success">استخراج xlsx الكل</a>  --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
