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
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body px-5">

                    @foreach ($notes as $note)
                        <div class="form-group">
                            <b>{{\App\Models\User::find($note->user_id)->name}}</b>
                            <p>{{$note->type}}</p>
                            <p>{{$note->location}}</p>
                            <p>{{$note->content}}</p>
                            @foreach (explode('*/***/*',$note->photos) as $pic)
                                    @if($pic == '')
                                        @continue
                                    @endif
                                    <a target="_blank" href="{{asset('/storage/uploads/'.$pic)}}"><img src="{{asset('/storage/uploads/'.$pic)}}" alt="" width="100"></a>
                            @endforeach
                            @if($note->user_id == auth()->id() || auth()->user()->role == 'admin')
                                <a href="{{route('network_notes_destroy', $note->id)}}" class="btn btn-danger">حذف</a>
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
