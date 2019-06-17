@extends('layouts.all')
@section('title','Friends')

@section('content')

@if(Session::has('message'))
<div class="alert alert-warning alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    {{Session::get('message')}}
</div>
@endif

{!! Form::model(Request::All() ,['route' => 'users.index', 'method' => 'GET']) !!}

<p class="navbar-text navbar-right">
        <div class="row">
            <div class="col-md-8"></div>
            <div class="col-md-3">
                {!! Form::text('namesearch',null ,['class' =>'form-control', 'placeholder' => 'Search name']) !!}
            </div>
            <div class="col-md-1">
                <div class="input-group">
                    <span class="input-group-btn">
                    {!! Form::submit('Search', ['class' => 'btn btn-default']) !!}</span>
                </div>
            </div>
        </div>
</p>
{{Form::close()}}

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Add or Remove</th>
                <th></th>
                </tr>
        </thead>
        <tbody>
                @foreach ($users as $user)
            <tr>

                @if($user->id != Auth::user()->id)
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                    {{ $friendok = false }}
                    @foreach($friends as $friend)
                        @if($friend->friend_id == $user->id)
                            <label class="hidden">{{ $friendok = true }} </label>
                        @endif
                    @endforeach
                    @if($friendok != true)
                        <a class="btn btn-success" href="{{route('user.destroy', $user->id)}}" title="No Friend" onclick="return confirm('Add your friend?')" role="button"><i class="fas fa-hand-point-right"></i></a>
                    @else
                        <a class="btn btn-danger" href="{{route('user.destroy', $user->id)}}" title="Friend" onclick="return confirm('Remove your friend')" role="button"><i class="fas fa-hand-point-down"></i></i></a>
                    @endif
                    </td>
                <td>
                    <label class="hidden"> {{ $cartOK = false }}</label>
                    @foreach($carts as $cart)
                        @if($cart->user_id == $user->id and $friendok == true )
                            <label class="hidden">{{ $cartOK = true }}</label>
                        @endif
                    @endforeach
                    @if($cartOK == true )
                        <a class="btn btn-primary" href="{{ route('cart.showFriend', $user->id) }}" title="View your cart" role="button"><i class="fas fa-eye"></i></i></a>
                    @endif
                @endif
            </td>
            </tr>
                @endforeach
        </tbody>
    </table>



@endsection