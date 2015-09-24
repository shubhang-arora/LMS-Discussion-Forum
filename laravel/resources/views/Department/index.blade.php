@extends('app')

@section('content')
    <h1>Departments</h1>
    <hr>
    @foreach($schools as $school)
        <article>
            <h3>{{$school->school_name}}</h3>
            @foreach($departments as $department)
                @if($department->schools_id==$school->id)
                    <article>
                        {{$department->department_name}}
                        <br>
                    </article>
                @endif
            @endforeach
            <br>
        </article>
    @endforeach

@endsection