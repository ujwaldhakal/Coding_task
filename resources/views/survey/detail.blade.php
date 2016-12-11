@extends('master')
@section('content')
    <h1>{{Request::segment(3)}} Details</h1>
    <table class="table table-striped">
        <thead>
        <tr>
           @foreach($fillable as $field)
               <th>{{$field}}</th>
               @endforeach
        </tr>
        </thead>
        <tbody>
      <tr>
          @foreach($csvData as $detail)
          <td>{{$detail}}</td>
              @endforeach
      </tr>
        </tbody>
    </table>
@endsection