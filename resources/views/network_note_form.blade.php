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
        <div class="col-md-4 mb-5">
            <div class="card shadow-sm">
                <div class="card-body">

                    <form action="{{route("network_notes_create", $id)}}" method="POST" enctype="multipart/form-data">
                        @csrf


                        <div class="form-group">
                            <label for="equipment_number">رقم المعدة</label>
                            <input value="{{old('equipment_number')}}" name="equipment_number" id="equipment_number" class="form-control shadow-sm">
                        </div>
                        <div class="form-group">
                            <label for="type">نوع الملاحظة</label>
                            <select name="type" id="type" class="form-select shadow-sm">
                                <option @if(old('type') == '') selected @endif value=""></option>
                                <option @if(old('type') == 'عطل') selected @endif value="عطل">عطل</option>
                                <option @if(old('type') == 'تعدي') selected @endif value="تعدي">تعدي</option>
                                <option @if(old('type') == 'حالة خطرة') selected @endif value="حالة خطرة">حالة خطرة</option>
                            </select>
                        </div>

                        <div id="type_div1" class="form-group mb-3 mt-1">
                            <select name="type1" id="type1" class="form-select shadow-sm">
                                <option @if(old('type1') == 'جمبر') selected @endif value="جمبر">جمبر</option>
                                <option @if(old('type1') == 'مرابط') selected @endif value="مرابط">مرابط</option>
                                <option @if(old('type1') == 'كيبل LT') selected @endif value="كيبل LT">كيبل LT</option>
                                <option @if(old('type1') == 'كيبل HT') selected @endif value="كيبل HT">كيبل HT</option>
                                <option @if(old('type1') == 'هات كيبل LT') selected @endif value="هات كيبل LT">هات كيبل LT</option>
                                <option @if(old('type1') == 'هات كيبل HT') selected @endif value="هات كيبل HT">هات كيبل HT</option>
                                <option @if(old('type1') == 'صندوق لحام LT') selected @endif value="صندوق لحام LT">صندوق لحام LT</option>
                                <option @if(old('type1') == 'صندوق لحام HT') selected @endif value="صندوق لحام HT">صندوق لحام HT</option>
                                <option @if(old('type1') == 'عمود مائل') selected @endif value="عمود مائل">عمود مائل</option>
                                <option @if(old('type1') == 'عمود ساقط') selected @endif value="عمود ساقط">عمود ساقط</option>
                                <option @if(old('type1') == 'عمود متئاكل') selected @endif value="عمود متئاكل">عمود متئاكل</option>
                                <option @if(old('type1') == 'موصلات مرتخية') selected @endif value="موصلات مرتخية">موصلات مرتخية</option>
                                <option @if(old('type1') == 'موصلات منقطعة') selected @endif value="موصلات منقطعة">موصلات منقطعة</option>
                                <option @if(old('type1') == 'اشجار ') selected @endif value="اشجار ">اشجار </option>
                                <option @if(old('type1') == 'قاطع') selected @endif value="قاطع">قاطع</option>
                                <option @if(old('type1') == 'آخرى') selected @endif value="آخرى">آخرى</option>
                            </select>
                        </div>
                        <div id="type_div2" class="form-group mb-3 mt-1">
                            <select name="type2" id="type2" class="form-select shadow-sm">
                                <option @if(old('type2') == 'عائق') selected @endif value="عائق">عائق</option>
                                <option @if(old('type2') == 'سرقة معدة') selected @endif value="سرقة معدة">سرقة معدة</option>
                                <option @if(old('type2') == 'تعدي على شبكة') selected @endif value="تعدي على شبكة">تعدي على شبكة</option>
                                <option @if(old('type2') == 'تعدي على معدة') selected @endif value="تعدي على معدة">تعدي على معدة</option>
                                <option @if(old('type2') == 'آخرى') selected @endif value="آخرى">آخرى</option>
                            </select>
                        </div>
                        <div id="type_div3" class="form-group mb-3 mt-1">
                            <select name="type3" id="type3" class="form-select shadow-sm">
                                <option @if(old('type3') == 'منخفضة') selected @endif value="منخفضة">منخفضة</option>
                                <option @if(old('type3') == 'متوسطة') selected @endif value="متوسطة">متوسطة</option>
                                <option @if(old('type3') == 'عالية') selected @endif value="عالية">عالية</option>
                                <option @if(old('type3') == 'آخرى') selected @endif value="آخرى">آخرى</option>
                            </select>
                        </div>

                        <script>
                            $('#type_div1').hide();
                            $('#type_div2').hide();
                            $('#type_div3').hide();
                            var mo = jQuery('#type');
                            var mov = this.value;
                            mo.change(function() {
                                $('#type_div1').hide();
                                $('#type_div2').hide();
                                $('#type_div3').hide();
                                if ($(this).val() == 'عطل') {
                                    $('#type_div1').show();
                                }
                                if ($(this).val() == 'تعدي') {
                                    $('#type_div2').show();
                                }
                                if ($(this).val() == 'حالة خطرة') {
                                    $('#type_div3').show();
                                }
                            });
                        </script>
                        <div class="form-group">
                            <label for="content">الملاحظة</label>
                            <textarea required value="{{old('content')}}" name="content" id="content" class="form-control shadow-sm"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="location">إحداثيات</label>
                            <input value="{{old('location')}}" name="location" id="location" class="form-control shadow-sm">
                        </div>
                        <div class="form-group">
                            <label for="photos">صور</label>
                            <input type="file" value="{{old('photos')}}"  name="photos[]" id="test" class="form-control shadow-sm" multiple>
                        </div>

                        <div class="py-5 text-center">
                            <button type="submit" class="btn btn-success shadow-sm">اضافة الملاحظة</button>
                            <a href="{{route('networks')}}" class="btn btn-danger">عودة</a>
                        </div>
                        
                    </form>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection
