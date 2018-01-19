@extends('layouts.app')
@section('content')
<div class="container-fluid">
     <course-units-component 
            :data-course-units="{{ $courseUnits }}"
    ></course-units-component>
</div>
@endsection