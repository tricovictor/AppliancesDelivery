@extends('layouts.all')

@section('title', 'Articulo')

@section('content')

@if(count($errors) > 0)

	<div class="alert alert-danger" role="alert">
		<ul>
			@foreach($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
		</ul>
	</div>	


@endif


<script>
    jQuery(document).ready(function(){
    	jQuery("#formID").validationEngine('attach');
	});
</script>

    {!! Form::open(['route' => 'cart.store', 'method' => 'POST', 'files' => true, 'id'=>'formID']) !!}

	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-3">
			<div class="form-group">
                <img src="{{ $article->image }}" class="rounded float-left " height="200" width="200" alt="">
			</div>
		</div>
		<div class="col-md-3">
            <ul>
                @foreach($qualities as $quality)
                    @if($quality->articles_id == $article->id)
                        <li>{{ $quality->item }} : {{ $quality->description }}</li> 
                    @endif
                @endforeach
            </ul>
          </div>
				{!! Form::text('article_id', $article->id,['class' =>'form-control hidden']) !!}
	</div>

	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-3">
			<div class="form-group">
				{!! Form::label('description',$article->description) !!}
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				{!! Form::label('price', '€',['class' =>'mylabel', 'disabled']) !!}
				{!! Form::label('price',$article->price,['class' =>'mylabel', 'disabled']) !!}
			</div>
		</div>
		<div class="col-md-3">
		</div>
	</div>
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-3">	
		    <div class="form-group">
        		<a class="btn-lg btn-default" href="{{ route('home') }}"><i class="fa fa-backward" aria-hidden="true"></i></a>
			</div>
		</div>
		<div class="col-md-3">	
		    <div class="form-group">
				{!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
			</div>
		</div>

	</div>

	{!! Form::close() !!}



@endsection