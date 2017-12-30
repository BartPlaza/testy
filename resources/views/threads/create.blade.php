@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create thread</div>

                <div class="panel-body">
                   <form method="POST" action="/threads">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="title">
                        </div>
                        <div class="form-group">
                            <label for="body">Body</label>
                            <textarea class="form-control" name="body" id="body" placeholder="body" rows="5"></textarea>
                        </div>
                        <button type="submit" class="btn btn-default" dusk="thread-create">Publish</button>
                   </form> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection