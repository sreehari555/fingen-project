@extends('layouts.app')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>mark List</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('marks.create') }}">Add marks</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   <?php $i=0 ; ?>
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Maths</th>
            <th>Science</th>
            <th>History</th>
            <th>Term</th>
            <th>Total mark</th>
            <th>Time</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($marks as $student)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{  $student->student->name }}</td>
            <td>{{  $student->maths }}</td>
            <td>{{ $student->science }}</td>
            <td>{{ $student->history }}</td>
            <td>{{ $student->term_id }}</td>
            <?php $total= $student->maths+$student->science+$student->history; ?>
            <td> <?=$total?> </td>
           <?php $date =$student->created_at ;
$your_date = date("Y-m-d", strtotime($date)); ?>
            <td>{{ $your_date }}</td>
            <td>
                <form action="{{ route('marks.destroy',$student->id) }}" method="POST">
   
                   
    
                    <a class="btn btn-primary" href="{{ route('marks.edit',$student->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
 
      
@endsection