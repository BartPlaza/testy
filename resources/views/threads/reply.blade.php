<div class="panel panel-default">
    <div class="panel-heading level">
        {{$reply->user->name}} said {{$reply->created_at->diffForHumans()}}
    	<form action="/replies/{{$reply->id}}/favorits" method="POST">
    		{{csrf_field()}}
    		
    		<button type="submit" class="btn btn-default" {{$reply->isFavorited() ? 'disabled' : ''}}>
    			{{$reply->favorites()->count()}} Favorit</button>
    	</form>
    </div>
    <div class="panel-body">
        {{$reply->body}}
    </div>
</div>