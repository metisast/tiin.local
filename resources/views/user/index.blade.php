@section('pageTitle', 'Profile')

@extends('layouts.user.profile')

@section('userContent')
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-12">
                    <div class="thumbnail">
                        <div class="media">
                            <div class="media-left">
                                <a href="{{route('user::profile.products.show', $product->id)}}" class="thumbs">
                                    <img class="media-object" src="/images/products-images/thumbs/{{$product->image()->name}}">
                                </a>
                            </div>
                            <div class="media-body">
                                <a href="{{route('user::profile.products.show', $product->id)}}">{{ $product->title }}</a>
                                <p>{{ $product->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
@stop
