@extends('master')
@section('content')
  <h1>Survey List</h1>
 <h3> <a href="{{$route}}">Add Survey</a></h3>
    <table id="surveyTable" class="table-striped">
        <thead>
        <tr>
       @foreach($surveyList['0'] as $title)
           <th>{{$title}}</th>
           @endforeach
           <th>Action</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            @foreach($surveyList['0'] as $title)
                <th>{{$title}}</th>
            @endforeach
            <th>Action</th>
            <?php unset($surveyList['0'])?>
        </tr>
        <tbody>
    @foreach($surveyList as $list)
        <tr>

            <td>{{$list[0]}}</td>
            <td>{{$list[1]}}</td>
            <td>{{$list[2]}}</td>
            <td>{{$list[3]}}</td>
            <td>{{$list[4]}}</td>
            <td>{{$list[5]}}</td>
            <td>{{$list[6]}}</td>
            <td>{{$list[7]}}</td>
            <td>{{$list[8]}}</td>
            <td><a href="{{route('surveyDetail',$list['3'])}}">View Details</a></td>

        </tr>
        @endforeach
        </tbody>
        </tfoot>
    </table>
@endsection
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/datatable.min.css')}}"/>
@endpush
@push('scripts')
<script type="text/javascript" src="{{asset('assets/js/datatable.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#surveyTable').DataTable();
    });
</script>
@endpush
