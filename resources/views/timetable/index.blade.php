@extends('layouts.app')
@section('content')
<div class="container-fluid">

    <timetable-component 
        :intake="{{ $intake }}"
    ></timetable-component>
</div>
  
@endsection