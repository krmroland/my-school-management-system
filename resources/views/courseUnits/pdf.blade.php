<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $courseUnit->name }}</title>
    <style>
       .page-break {
        page-break-after: always;
        }
    </style>
</head>
<body>
    <h1>
        {{ $courseUnit->name }}

       
    </h1>
    <h3>For : {{ auth()->user()->name }}</h3>
    <div class="page-break"></div>
    @foreach ($courseUnit->notes as $notes)
    
        <h1>{{ $notes->date }}</h1>
        <div style="font-size: 1.25em;">
            {!! $notes->contents !!}
        </div>
        <div class="page-break"></div>
    @endforeach
</body>
</html>