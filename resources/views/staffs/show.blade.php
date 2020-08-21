@extends('bootstrap-theme')

@section('content')
<h1>Covid19 #{{ $staffs->id }}</h1>
<table class="table table-sm" style="width:50%">
    <tbody>
        <tr><th> ID </th><td>{{ $staffs->id }}</td></tr>
        <tr><th> Name  </th><td> {{ $staffs->Name }} </td></tr>
        <tr><th> Age   </th><td> {{ $staffs->Age }} </td></tr>
        <tr><th> Salary   </th><td> {{ $staffs->Salary }} </td></tr>
        <tr><th> Phone   </th><td> {{ $staffs->Phone }} </td></tr>
  
    </tbody>
</table>
@endsection