@extends('layouts.main')

@section('content')
        <form action="/compute" method="POST" role="form">
    
        <legend>Form title</legend>

            {{csrf_field()}}

        <div class = "form-group">
            <label for="">First Number</label>
            <input type="text" name="n1" class="form-control" id="" placeholder="Input First Number">

        </div>
        
        <div class="form-group">
        <label for="">Second Number</label>
            <input type="text" name="n2" class="form-control" id="" placeholder="Input Second Number">
        </div>
    
    
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection