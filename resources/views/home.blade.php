@extends('layouts.main')

@section('content')
<!-- Show Tasks -->

<div class="container">
    <div class="row">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">
                    Your Tasks 

                    <div class="btn-group pull-right">
                        <button type="button" class="btn  btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Select Tasks<span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">

                            <li><a href="/">All Task</a></li>
                            <li><a href="/completed">Completed</a></li>
                            <li><a href="/incomplete">Incompleted</a></li>
                        </ul>
                    </div>
                </div>        
            </div>
            <div class="panel-body">


                @if($flash = session('message'))
                <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>{{$flash}}</strong>
                </div>  
                @endif

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
                            <td><a href="/edit/{{$task->id}}"><i class="btn {{$task->iscomplete ? 'btn-default' : 'btn-warning'}} fa fa-check">{{$task->iscomplete ? 'Completed' : 'Incomplete'}}</i></a>
                            </td>
                            <td> <a href="delete/{{$task->id}}"><button type="button" class="btn btn-danger"><span class="fa fa-trash">&nbsp</span></button> </a>
                            </tr>
                        </tbody>
                        @endforeach
                        @else
                        <tbody>
                            <tr class="">

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