@extends('layouts.main')

@section('content')
<!-- Show Tasks -->
<div class="container">
    <div class="row">
        <div class="panel panel-info">
                <div class="panel-heading">
                        <h2 class="panel-title">Your Tasks</h2>
                </div>
                <div class="panel-body">
                        
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Task</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                        @if(!$tasks->isempty() )    
                            @foreach($tasks as $task)
                            <tbody>
                                <tr>

                                    <td> 
                                        {{$task->content}} 
                                    </td>
                                    @if($task->iscomplete)
                                        <td><a href="edit/{{$task->id}}" class="btn btn-default"><span class="fa fa-check">&nbsp Completed</span></a></td>
                                    @else
                                        <td><a href="edit/{{$task->id}}" class="btn btn-warning "><span class="fa fa-warning">&nbsp Incomplete</span></a></td>
                                    @endif
                                    <td> <a href="delete/{{$task->id}}"><button type="button" class="btn btn-danger"><span class="fa fa-trash">&nbsp</span></button> </a>
                                </tr>
                            </tbody>
                            @endforeach
                        @else
                        <tbody>
                            <tr class="center-block">
                                    
                                    <div class=" alert alert-danger">
                                        <strong>Empty!</strong> 0 Task Available ...
                                    </div>
                
                            </tr>
                        </tbody>
                        @endif
                        </table>
                     
                       
                        
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Show Task -->

<!-- Add Task -->
<div class="container">
    <div class="row">
        <div class="panel panel-info">
            <div class="panel-heading">
                    <h3 class="panel-title">New Task</h3>
            </div>
            <div class="panel-body">
            
            <form action="/new" method="POST" class="form-horizontal" role="form">
                    {{csrf_field()}}
                    
                    <div class="form-group">
                            <textarea placeholder="Enter New Task" name="task" class="form-control" id="new" cols="30" rows="5" ></textarea>
                    </div>

                    <div class="form-group">
                            <button type="submit" class="btn btn-primary form-control">save</button>
                    </div>

            </form>
            </div>
        </div>
    </div>
</div>
<!-- /Add Task -->
@endsection