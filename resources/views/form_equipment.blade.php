@extends('layouts.app')

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
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">

                    <form action="{{route("equipment.post", [$type_id,$feeder_id])}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- stable --}}
                        <div class="form-group">
                            <label for="feeder_number">رقم المغذي</label>
                            <input type="text" disabled value="{{$feeder_number}}" class="form-control shadow-sm">
                        </div>
                        <div class="form-group">
                            <label for="station">المحطة</label>
                            <input type="text" disabled value="{{$station}}" class="form-control shadow-sm">
                        </div>
                        <div class="form-group">
                            <label for="type">نوع المعدة</label>
                            <input type="text" disabled value="{{$type}}" class="form-control shadow-sm">
                        </div>

                        <div class="form-group">
                            <label for="number">رقم المعدة</label>
                            <input type="number" required value="{{old('number')}}" name="number" id="number" class="form-control shadow-sm">
                        </div>
                        <div class="form-group">
                            <label for="serial_number">الرقم التسلسلي</label>
                            <input type="text" value="{{old('serial_number')}}" name="serial_number" id="serial_number" class="form-control shadow-sm">
                        </div>
                        <div class="form-group">
                            <label for="manufacture_company">الشركة المصنعة</label>
                            <input type="text" value="{{old('manufacture_company')}}" name="manufacture_company" id="manufacture_company" class="form-control shadow-sm">
                        </div>
                        <div class="form-group">
                            <label for="location">الإحداثيات</label>
                            <input type="text" required value="{{old('location')}}" name="location" id="location" class="form-control shadow-sm">
                        </div>

                        <div class="form-group">
                            <label for="photos">صور</label>
                            <input type="file" value="{{old('photos')}}"  name="photos[]" id="test" class="form-control shadow-sm" multiple>
                        </div>

                        <div class="py-5 text-center">
                            <button type="submit" class="btn btn-success shadow-sm">حفظ</button>
                            <a href="{{route('equipment', [$type_id,$feeder_id])}}" class="btn btn-danger">عودة</a>
                        </div>
                        
                    </form>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection
