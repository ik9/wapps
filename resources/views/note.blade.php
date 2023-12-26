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

                    <form action="{{route("notes.create", [$type, $id])}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="note">الملاحظة</label>
                            <textarea required value="{{old('note')}}" name="note" id="note" class="form-control shadow-sm"></textarea>
                        </div>

                        <div class="py-5 text-center">
                            <button type="submit" class="btn btn-success shadow-sm">اضافة الملاحظة</button>
                            <a href="{{route($type.'s', $params)}}" class="btn btn-danger">عودة</a>
                        </div>
                        
                    </form>

                </div>
            </div>
        </div>
        <br><br><br><hr><br><br><br>
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body px-5">

                    @foreach ($notes as $note)
                        <div class="form-group">
                            <b>{{\App\Models\User::find($note->user_id)->name}}</b>
                            <p>{{$note->content}}</p>
                            @if($note->user_id == auth()->id() || auth()->user()->role == 'admin')
                                <a href="{{route('notes.destroy', $note->id)}}" class="btn btn-danger">حذف</a>
                            @endif
                        </div>
                        <hr>
                    @endforeach

                </div>
            </div>
        </div>

    </div>
</div>
@endsection
