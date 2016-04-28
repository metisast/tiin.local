@section('pageTitle', 'Profile')

@extends('layouts.user.profile')

@section('userContent')
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-12">
                    <div class="thumbnail">
                        <div class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object" src="..." alt="...">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Media heading</h4>
                                ...
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
@stop
