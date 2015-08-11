@extends('app')

@section('content')

    <h1>Courses</h1>

    <hr/>

    <course>
        @foreach($courses as $course)

            {{$course->course_id}}
            <br>
            {{$course->course_name}}
            <br>
            <br>
            <br>
        @endforeach
    </course>
@stop