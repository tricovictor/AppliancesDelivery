@extends('layouts.all')
@section('title', 'Woow')

@section('content')

@if(Session::has('message'))
<div class="alert alert-warning alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    {{Session::get('message')}}
</div>
@endif
{!! Form::model(Request::All() ,['route' => 'articles.index', 'method' => 'GET']) !!}

<p class="navbar-text navbar-right">
        <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-3">
                {!! Form::text('searchdescription',null ,['class' =>'form-control', 'placeholder' => 'Search description']) !!}
            </div>
            <div class="col-md-3">
                <div class="input-group">
                   {!! Form::select('order',['' =>'Order by', 'price' => 'Price', 'description' => 'Description' ],
                    null, ['class' => 'form-control']) !!}
                    <span class="input-group-btn">
                    {!! Form::submit('Send', ['class' => 'btn btn-default']) !!}</span>
                </div>
            </div>
        </div>
</p>
{{Form::close()}}


@foreach($articles as $article)

{!! Form::model(Request::all(),['route' => ['cart.viewItem', $article], 'method' => 'POST', 'files' => true, 'id'=>'formID']) !!}

    <div class="col-md-6 panel panel-default" >
        <div class="row">
            <div class="col-md-4">
                <img src="{{ $article->image }}" class="rounded float-left " height="200" width="200" alt="">
            </div>
            <div class="col-md-8">
                <ul>
                    @foreach($qualities as $quality)
                        @if($quality->articles_id == $article->id)
                            <li>{{ $quality->item }} : {{ $quality->description }}</li> 
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row">
        @if(Auth::user() != null) 
            <a class="btn-lg btn-success myicon" href="#" onclick="addCart({{$article->id}})" role="button"><i class="fa fa-cart-plus" aria-hidden="true"></i></a>
        @endif
            <div class="col-md-8">
                <h4>{{ $article->description }}</h4>
            </div>
            <div class="col-md-4">
                    <h3 class="mylabel"><i class="fas fa-euro-sign"></i>{{ $article->price }}</h3>
            </div> 
        </div>   
    </div>

{!! Form::text('article_id', null, ['class'=>'hidden', 'id'=>'article_id']) !!}
{!! Form::submit('Enviar al carrito', ['class' => 'btn btn-primary hidden', 'id'=>'btnEnviar']) !!}
{!! Form::close() !!}

@endforeach

{!! $articles->render() !!}
 

<script type="text/javascript">
    function addCart(e)
    {
        $('#article_id').val(e);
        $('#btnEnviar').click();
    }

</script>

@endsection


