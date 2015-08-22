@extends('app')

@section('content')

    <h1>Courses</h1>

    <hr/>

    <course>
        @foreach($courses as $course)



            {{$course->course_name}}:<b>{{$course->course_id}}</b>
            <br>
            <br>
            <br>
        @endforeach
    </course>
@stop