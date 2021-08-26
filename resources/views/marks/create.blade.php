@extends('layouts.app')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add Marks</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('students.index') }}"> Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('marks.store') }}" method="POST">
    @csrf
  
     <div class="row">
       
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>Student:</strong>
            <select name="student">
            <?php foreach($students as $student)
            {?>
         <option value="<?=$student->id?>"><?=$student->name?></option>
            <?php } ?>
    </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>Term:</strong>
            <select name="term">
            <?php foreach($terms as $term)
            {?>
         <option value="<?=$term->name?>"><?=$term->name?></option>
            <?php } ?>
    </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>mark in maths:</strong>
                <input type="text" name="markmath" class="form-control" placeholder="mark">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>mark in science:</strong>
                <input type="text" name="markscience" class="form-control" placeholder="mark">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>mark in history:</strong>
                <input type="text" name="markshistory" class="form-control" placeholder="mark">
            </div>
        </div>

        
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection