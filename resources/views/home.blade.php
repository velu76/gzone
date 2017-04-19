@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Welcome to G<i>Z</i>one.</h3>
                </div>

                <div class="panel-body">                 
                @role('admin')
                    <h4>Project</h4>
                    You can set the project name here.

                    <h4>File</h4>
                    These are the files associated with the project.
                @endrole
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
