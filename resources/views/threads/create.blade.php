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
                            <label for="channel">Channel</label>
                            <select class="form-control" name="channel" id="channel" required>
                                @foreach($channels as $channel)
                                    <option value="{{$channel->id}}" {{old('channel') == $channel->id ? 'selected' : ''}}>
                                            {{$channel->name}}
                                        </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="title" value="{{old('title')}}" required>
                        </div>
                        <div class="form-group">
                            <label for="body">Body</label>
                            <textarea class="form-control" name="body" id="body" placeholder="body" rows="5" required>{{old('body')}}</textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-default" dusk="thread-create">Publish</button>
                        </div>
                        @if(Count($errors))
                        <div class="form-gorup">  
                            @foreach($errors->all() as $error)
                            <p class="alert alert-danger">{{$error}}</li>
                            @endforeach  
                        </div>
                        @endif
                   </form> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection