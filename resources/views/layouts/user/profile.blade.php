@section('breadcrumb')
    <li><a href="#">Home</a></li>
    <li class="active">Активность</li>
@stop

@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2" id="left">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h4 class="text-center">Навигация</h4>
                    <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a href="{{route('user::index')}}">Активность</a></li>
                        <li><a href="{{route('user::profile.products.create')}}">Продать</a></li>
                        <li><a href="{{ route('user::auctionCreate') }}">Подать аукцион</a></li>
                        <li><a href="{{route('user::user')}}">Профиль</a></li>
                        <li><a href="/logout">Выход</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-10" id="right">
            <ol class="breadcrumb text-right">
                @yield('breadcrumb')
            </ol>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>@yield('contentTitle', 'Активность')</h3>
                            <hr>
                        </div>
                    </div>

                    @yield('userContent', 'Test')

                </div>
            </div>
        </div>
    </div>
</div>
@stop