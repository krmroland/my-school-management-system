@extends('layouts.app')
@section('content')
 <notes-component :course-units="{{ $courseUnits }}"></notes-component>
@endsection