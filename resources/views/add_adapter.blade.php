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

                    <form action="{{route("add_adapter", $feeder_id)}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="adapter_number">رقم المحول</label>
                            <input type="number" required value="{{old('adapter_number')}}" name="adapter_number" id="adapter_number" class="form-control shadow-sm">
                        </div>
                        <div class="form-group">
                            <label for="adapter_size">سعة المحول</label>
                            <select name="adapter_size" id="adapter_size" class="form-select shadow-sm">
                                <option @if(old('adapter_size') == '') selected @endif value=""></option>
                                <option @if(old('adapter_size') == '100') selected @endif value="100">100</option>
                                <option @if(old('adapter_size') == '200') selected @endif value="200">200</option>
                                <option @if(old('adapter_size') == '300') selected @endif value="300">300</option>
                                <option @if(old('adapter_size') == '500') selected @endif value="500">500</option>
                                <option @if(old('adapter_size') == '1000') selected @endif value="1000">1000</option>
                                <option @if(old('adapter_size') == '1500') selected @endif value="1500">1500</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="adapter_voltage">جهد المحول</label>
                            <select name="adapter_voltage" id="adapter_voltage" class="form-select shadow-sm">
                                <option @if(old('adapter_voltage') == '') selected @endif value=""></option>
                                <option @if(old('adapter_voltage') == '110/220') selected @endif value="110/220">110/220</option>
                                <option @if(old('adapter_voltage') == '220/400') selected @endif value="220/400">220/400</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="adapter_type">نوع المحول</label>
                            <select name="adapter_type" id="adapter_type" class="form-select shadow-sm">
                                <option @if(old('adapter_type') == '') selected @endif value=""></option>
                                <option @if(old('adapter_type') == 'هوائي') selected @endif value="هوائي">هوائي</option>
                                <option @if(old('adapter_type') == 'أرضي') selected @endif value="أرضي">أرضي</option>
                            </select>
                        </div>

                        <div class="py-5 text-center">
                            <button type="submit" class="btn btn-success shadow-sm">التالي</button>
                            <a href="{{route('adapters', $feeder_id)}}" class="btn btn-danger">عودة</a>
                        </div>
                        
                    </form>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection
