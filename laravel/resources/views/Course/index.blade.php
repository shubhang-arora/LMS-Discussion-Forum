@extends('app')

@section('content')

    <h1>Courses</h1>

    <hr/>

    <course>
        @foreach($courses as $course)
            <a href="{{action('QuestionsController@CourseQuestions',$course->id)}}">{{$course->course_name}}:<b>{{$course->course_id}}</b></a>
            <br>
            <hr>
        @endforeach
    </course>
@stop