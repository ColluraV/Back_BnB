@extends('layouts.app')
@section('content')
    <h2>Message test</h2>

    @dump($mails)
    @foreach ($mails as $test)
        <div style="border: 1px solid red">/*/*/*/*/*/*/*/*/*/*/*</div>
        @foreach ($test->messages as $message)
            <h5>{{$message->name}}</h5>
            <p>{{$message->email}}</p>
            <p>{{$message->text}}</h3>
            <p>{{$message->created_at}}</p>
            <form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger h-100">Elimina</button>
            </form>
        @endforeach
    @endforeach
@endsection
