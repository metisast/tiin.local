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
        <div class="col-md-offset-2 col-md-8">
            <div class="form-group">
                <label>Заголовок</label>
                <input type="text" name="title" class="form-control">
            </div>
            <div class="form-group">
                <label>Рубрика</label>
                <div class="row">
                    <div class="col-md-6" id="category">
                        {!! Helpers::select($categories, 0, 'Выберите рубрику', ["class" => "form-control"]) !!}
                    </div>
                    <div class="col-md-6" id="category_sub">
                        {!! Helpers::select([], 0, '', ["class" => "form-control", 'disabled' => true]) !!}
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Описание</label>
                <textarea name="description" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label>Фотографии</label>
                <div class="row text-center">
                    <div class="col-md-3">
                        <span class="img-thumbnail btn-file upload-1">
                            <i class="fa fa-plus"></i><input type="file">
                        </span>
                    </div>
                    <div class="col-md-3">
                        <span class="img-thumbnail btn-file upload-2">
                            <i class="fa fa-plus"></i><input type="file" name="image2">
                        </span>
                    </div>
                    <div class="col-md-3">
                        <span class="img-thumbnail btn-file upload-3">
                            <i class="fa fa-plus"></i><input type="file" name="image3">
                        </span>
                    </div>
                    <div class="col-md-3">
                        <span class="img-thumbnail btn-file upload-4">
                            <i class="fa fa-plus"></i><input type="file" name="image4">
                        </span>
                    </div>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6" id="regions">
                        <label>Населенный пункт</label>
                        {!! Helpers::select($regions, 0, 'Выберите регион', ['class' => 'form-control']) !!}
                    </div>
                    <div class="col-md-6" id="cities">
                        <label>Город</label>
                        {!! Helpers::select([], 0, '', ['class' => 'form-control', 'disabled' => true]) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Контактное лицо</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label>Email-адрес</label>
                    <input type="text" name="email" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label>Номер телефона</label>
                <input type="text" name="phone" class="form-control">
            </div>
            <hr>
            <div class="form-group">
                <label>
                    <input type="checkbox"> Я согласен с правилами сервиса
                </label>
            </div>
            <div class="form-group">
                <button class="btn btn-default" name="preview">Предпросмотр</button>
                <button class="btn btn-primary" name="submit">Опубликовать</button>
            </div>
        </div>
    </div>
@stop