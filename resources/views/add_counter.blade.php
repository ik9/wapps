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

                    <form action="{{route("add_counter", [$feeder_id,$adapter_id])}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="counter_number">رقم العداد</label>
                            <input type="text" minlength="16" maxlength="16" required value="{{old('counter_number')}}" name="counter_number" id="counter_number" class="form-control shadow-sm">
                        </div>
                        <div class="form-group">
                            <label for="subscribe_number">رقم الإشتراك</label>
                            <input type="text"  required value="{{old('subscribe_number')}}" name="subscribe_number" id="subscribe_number" class="form-control shadow-sm">
                        </div>
                        <div class="form-group">
                            <label for="cutter_size">سعة القاطع</label>
                            <input type="number" required value="{{old('cutter_size')}}" name="cutter_size" id="cutter_size" class="form-control shadow-sm">
                        </div>
                        <div class="form-group">
                            <label for="current_meter_reading">القرائة الحالية للعداد</label>
                            <input type="number" required value="{{old('current_meter_reading')}}" name="current_meter_reading" id="current_meter_reading" class="form-control shadow-sm">
                        </div>
                        <div class="form-group">
                            <label for="counter_coordinates">إحداثيات العداد</label>
                            <input type="text" required value="{{old('counter_coordinates')}}" name="counter_coordinates" id="counter_coordinates" class="form-control shadow-sm">
                        </div>


                        {{-- google map script --}}
                        <script>
                            function initMap() {
                                // Initialize the map
                                const map = new google.maps.Map(document.getElementById('map-container'), {
                                    center: { lat: 0, lng: 0 }, // Set initial map center
                                    zoom: 15 // Set initial zoom level
                                });
                        
                                // Add a marker to the map
                                const marker = new google.maps.Marker({
                                    map: map,
                                    position: { lat: 0, lng: 0 }, // Set initial marker position
                                    draggable: true // Allow the user to drag the marker
                                });
                        
                                // Update the input field with the marker position when the marker is dragged
                                google.maps.event.addListener(marker, 'dragend', function (event) {
                                    document.getElementById('counter_coordinates').value = event.latLng.lat() + ',' + event.latLng.lng();
                                });
                            }
                        </script>

                        <div class="form-group">
                            <label for="counter_picture">صور للعداد</label>
                            <input type="file" value="{{old('counter_picture')}}" required name="counter_picture[]" id="test" class="form-control shadow-sm" multiple>
                        </div>
                        <div class="form-group">
                            <label for="counter_class">فئة العداد</label>
                            <select name="counter_class" id="counter_class" class="form-select shadow-sm">
                                <option @if(old('counter_class') == '') selected @endif value=""></option>
                                <option @if(old('counter_class') == 'سكني') selected @endif value="سكني">سكني</option>
                                <option @if(old('counter_class') == 'تجاري') selected @endif value="تجاري">تجاري</option>
                                <option @if(old('counter_class') == 'زراعي') selected @endif value="زراعي">زراعي</option>
                                <option @if(old('counter_class') == 'حكومي') selected @endif value="حكومي">حكومي</option>
                                <option @if(old('counter_class') == 'خيري') selected @endif value="خيري">خيري</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="counter_status">حالة العداد</label>
                            <select name="counter_status" id="counter_status" class="form-select shadow-sm">
                                <option @if(old('counter_status') == '') selected @endif value=""></option>
                                <option @if(old('counter_status') == 'سليم') selected @endif value="سليم">سليم</option>
                                <option @if(old('counter_status') == 'عطلان') selected @endif value="عطلان">عطلان</option>
                                <option @if(old('counter_status') == 'مفصول') selected @endif value="مفصول">مفصول</option>
                                <option @if(old('counter_status') == 'عائق') selected @endif value="عائق">عائق</option>
                                <option @if(old('counter_status') == 'تم الفصل') selected @endif value="تم الفصل">تم الفصل</option>
                                <option @if(old('counter_status') == 'مباشر') selected @endif value="مباشر">مباشر</option>
                                <option @if(old('counter_status') == 'عبث تعدي') selected @endif value="عبث تعدي">عبث تعدي</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="property_condition">حالة العقار</label>
                            <select name="property_condition" id="property_condition" class="form-select shadow-sm">
                                <option @if(old('property_condition') == '') selected @endif value=""></option>
                                <option @if(old('property_condition') == 'سليم') selected @endif value="سليم">سليم</option>
                                <option @if(old('property_condition') == 'مهجور صالح للإستخدام') selected @endif value="مهجور صالح للإستخدام">مهجور صالح للإستخدام</option>
                                <option @if(old('property_condition') == 'مهجور غير صالح للإستخدام') selected @endif value="مهجور غير صالح للإستخدام">مهجور غير صالح للإستخدام</option>
                                <option @if(old('property_condition') == 'العقار مزال') selected @endif value="العقار مزال">العقار مزال</option>
                            </select>
                        </div>

                        <div id="property_div" class="form-group mb-3 mt-1">
                            <label for="property_picture">ارفاق صور للعقار (مهجور غير صالح للإستخدام)</label>
                            <input type="file" value="{{old('property_picture')}}" name="property_picture[]" id="property_picture" class="form-control shadow-sm" multiple>
                        </div>

                        <script>
                            $('#property_div').hide();
                            var mo = jQuery('#property_condition');
                            var mov = this.value;
                            mo.change(function() {
                                if ($(this).val() == 'مهجور غير صالح للإستخدام') {
                                    $('#property_div').show();
                                } else {
                                    $('#property_picture').val('')
                                    $('#property_div').hide();
                                }
                            });
                        </script>
                        @if(old('property_picture') == 'مهجور غير صالح للإستخدام') <script>$('#property_div').show();</script> @endif



                        <div class="form-group">
                            <label for="danger_q">هل يوجد تعدي</label>
                            <br>
                            <select name="danger_q" id="danger_q" class="form-select shadow-sm">
                                <option @if(old('danger_q') == 'لا') selected @endif value="لا">لا</option>
                                <option @if(old('danger_q') == 'نعم') selected @endif value="نعم">نعم</option>
                            </select>
                        </div>
                        <div id="danger_div" class="form-group">
                            <label for="danger_file">ارفاق صورة لحالة التعدي</label>
                            <input type="file" value="{{old('danger')}}" name="danger[]" id="danger_file" class="form-control shadow-sm" multiple>
                            <br>
                            <label for="danger_type">نوع التعدي</label>
                            <select name="danger_type" id="danger_type" class="form-select shadow-sm">
                                <option @if(old('danger_type') == '') selected @endif value=""></option>
                                <option @if(old('danger_type') == 'توصيل مباشر') selected @endif value="توصيل مباشر">توصيل مباشر</option>
                                <option @if(old('danger_type') == 'عبث') selected @endif value="عبث">عبث</option>
                                <option @if(old('danger_type') == 'عائق') selected @endif value="عائق">عائق</option>
                            </select>
                        </div>

                        <script>
                            $('#danger_div').hide();
                            var mo = jQuery('#danger_q');
                            var mov = this.value;
                            mo.change(function() {
                                if ($(this).val() == 'نعم') {
                                    $('#danger_div').show();
                                } else {
                                    $('#danger_file').val('')
                                    $('#danger_div').hide();
                                }
                            });
                        </script>
                        @if(old('danger_q') == 'نعم') <script>$('#danger_div').show();</script> @endif

                        <div class="py-5 text-center">
                            <button type="submit" class="btn btn-success shadow-sm">حفظ</button>
                            <a href="{{route('counters', [$feeder_id, $adapter_id])}}" class="btn btn-danger">عودة</a>
                        </div>
                        
                    </form>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection
