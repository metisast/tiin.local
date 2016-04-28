{{-- Products view --}}

@section('pageTitle', 'Продать')
@section('contentTitle', 'Подать бесплатное объявление')

@section('breadcrumb')
    <li><a href="#">Home</a></li>
    <li class="active">Продать</li>
@stop

@extends('layouts.user.profile')

@section('userContent')
    <div class="row">
        <div class="col-md-offset-2 col-md-8" id="product">
            <div class="form-group">
                <label>Заголовок</label>
                <input type="text" name="title" class="form-control" form="publish">
            </div>
            <label>Рубрика</label>
            <div class="form-inline">
                <div class="form-group">
                    <div id="category">
                        {!! Helpers::select($categories, old('category_id'), 'Выберите категорию рубрики', ["class" => "form-control", "form" => "publish", "name" => "category_id"]) !!}
                    </div>
                </div>
                <div class="form-group">
                    <div id="category_sub">
                        {!! Helpers::select([], old('category_sub_id'), '', ["class" => "form-control", 'disabled' => true,  "form" => "publish", "name" => "category_sub_id"]) !!}
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group">
                <label>Описание</label>
                <textarea name="description" cols="30" rows="10" class="form-control" form="publish"></textarea>
            </div>
            <div class="form-group">
                <label>Цена</label>
                <div class="form-inline">
                    <div class="input-group">
                        <input type="text" name="price" class="form-control" form="publish">
                        <div class="input-group-addon">₸</div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Фотографии</label>
                <div class="row text-center">
                    <div class="col-md-3">
                        <span class="img-thumbnail btn-file">
                            <i class="fa fa-plus"></i><input type="file">
                        </span>
                    </div>
                    <div class="col-md-3">
                        <span class="img-thumbnail btn-file">
                            <i class="fa fa-plus"></i><input type="file">
                        </span>
                    </div>
                    <div class="col-md-3">
                        <span class="img-thumbnail btn-file">
                            <i class="fa fa-plus"></i><input type="file">
                        </span>
                    </div>
                    <div class="col-md-3">
                        <span class="img-thumbnail btn-file">
                            <i class="fa fa-plus"></i><input type="file">
                        </span>
                    </div>
                </div>
            </div>
            <hr>
            <div class="form-inline">
                <div class="form-group">
                    <div id="regions">
                        <label>Населенный пункт</label><br>
                        {!! Helpers::select($regions, old('region_id'), 'Выберите регион', ['class' => 'form-control',"form" => "publish", "name" => "region_id"]) !!}
                    </div>
                </div>
                <div class="form-group">
                    <div id="cities">
                        <label>Город</label><br>
                        {!! Helpers::select([], old('city_id'), '', ['class' => 'form-control', 'disabled' => true, "form" => "publish", "name" => "city_id"]) !!}
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group">
                <label>Контактное лицо</label>
                <p class="form-control-static">{{ Auth::user()->name }}</p>
            </div>
            <div class="form-group">
                <label>Email-адрес</label>
                <p class="form-control-static">{{ Auth::user()->email }}</p>
            </div>
            <div class="form-group">
                <label>Номер телефона</label>
                <p class="form-control-static">{{ Auth::user()->phone }}</p>
            </div>
            <hr>
            <div class="form-group">
                <input type="checkbox" form="publish" name="license" value="on" id="license">
                <label for="license"> Я согласен с правилами сервиса</label>
            </div>
            <div class="form-group">
                <button class="btn btn-default" name="preview">Предпросмотр</button>
                <button class="btn btn-primary" name="submit" form="publish" data-toggle="modal" data-target="#myModal">Опубликовать</button>
            </div>
        </div>
    </div>
    <form id="publish" data-src="{{route('user::profile.products.store')}}"></form>
@stop