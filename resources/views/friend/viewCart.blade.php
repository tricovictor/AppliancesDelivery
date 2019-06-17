@extends('layouts.all')
@section('title', 'My cart')

@section('content')

@if(Session::has('message'))
<div class="alert alert-warning alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    {{Session::get('message')}}
</div>
@endif

@if($carts->count() > 0)
    <table class="table">
        <thead>
            <tr>
                <th>Description</th>
                <th></th>
                <th>Price</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach($carts as $cart)
    
                    <td>{{$cart->article->description}}</td>
                    <td>
                    @foreach($qualities as $quality)
                        @if($quality->articles_id == $cart->article->id)
                            <li>{{ $quality->item }} : {{ $quality->description }}</li> 
                        @endif
                    @endforeach                        
                    </td>
                    <td>{{$cart->article->price}}</td>
                    <td>
                <img src="{{ $cart->article->image }}" class="rounded float-left " height="200" width="200" alt="">
                        
                    </td>
                    <td><a class="btn btn-success" href="{{route('article.addMycart', $cart->article->id)}}" onclick="return confirm('Add to my cart?')" role="button"><i class="fa fa-cart-arrow-down fa-2x" aria-hidden="true"></i> Add to my cart</a></td>

            </tr>
                @endforeach
        </tbody>
    </table>

    <div class="form-group">
        <div class="col-md-3">
            <a class="btn-lg btn-default" href="{{ route('home') }}"><i class="fa fa-backward" aria-hidden="true"></i></a>
        </div>
        <div class="col-md-6"></div>
        <div class="col-md-3">
        </div>
    </div>

@else 
    <div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        No tiene articulos en el carrito
    </div>

@endif

@endsection

