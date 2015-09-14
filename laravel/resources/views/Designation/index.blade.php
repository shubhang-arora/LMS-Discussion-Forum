@extends('app')

@section('content')
    <h1>Designations</h1>
    <hr>
    @foreach($designations as $designation)
        <article>
            {{$designation->designation}}
            <br>
        </article>
    @endforeach
@endsection