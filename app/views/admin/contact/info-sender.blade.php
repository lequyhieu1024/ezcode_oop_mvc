@extends('admin.layout.masterLayout')
@section('content')
@php
foreach ($contacts as $row) :
    print_r($row);
endforeach
@endphp
@endsection