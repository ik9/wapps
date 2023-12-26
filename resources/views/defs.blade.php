@extends('layouts.app')

@section('content')
<div class="container" style="direction: rtl">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>البيانات</h3></div>

                <div class="card-body">
                    <form action="{{route('update_defs')}}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="name">الأسم</label>
                            <input type="text" value="{{auth()->user()->name}}" name="name" id="name" class="form-control shadow-sm">
                        </div>
                        <div class="form-group">
                            <label for="job_number">الرقم الوظيفي</label>
                            <input type="text" value="{{auth()->user()->job_number}}" name="job_number" id="job_number" class="form-control shadow-sm">
                        </div>
                        <div class="form-group">
                            <label for="center">المركز</label>
                            <select name="center" id="center" class="form-select shadow-sm">
                                <option @if(auth()->user()->center == '') selected @endif value=""></option>
                                <option @if(auth()->user()->center == 'الليث') selected @endif value="الليث">الليث</option>
                                <option @if(auth()->user()->center == 'أضم') selected @endif value="أضم">أضم</option>
                                <option @if(auth()->user()->center == 'الشمال') selected @endif value="الشمال">الشمال</option>
                                <option @if(auth()->user()->center == 'الجنوب') selected @endif value="الجنوب">الجنوب</option>
                                <option @if(auth()->user()->center == 'الشرق') selected @endif value="الشرق">الشرق</option>
                            </select>
                        </div>

                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-success shadow-sm">تحديث</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
