{{-- Profile view --}}

@section('pageTitle', 'Профиль')
@section('contentTitle', 'Настройки профиля')

@section('breadcrumb')
    <li><a href="#">Home</a></li>
    <li class="active">Профиль</li>
@stop

@extends('layouts.user.profile')

@section('userContent')
    <div class="row">
        <div class="col-md-6">
            <h4 class="text-center">Информация о пользователе</h4>
            <hr>
            <div class="media">
                <div class="media-left">
                    <a href="#">
                        <img src="http://dummyimage.com/100x100/ccc/fff.jpg" class="img-circle">
                    </a>
                </div>
                <div class="media-body">
                    <p><strong>Изменить фотографию</strong></p>
                    <small>Минимальный размер 100х100</small>
                </div>
                <div class="media-right">
                    <input type="file">
                </div>
            </div>
            <div class="form-group">
                <label>Имя</label>
                <input type="text" class="form-control" value="{{Auth::user()->name}}">
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Новый пароль</label>
                    <input type="password" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label>Повторить пароль</label>
                    <input type="password" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" value="{{Auth::user()->email}}">
            </div>

            <label>Телефон</label>
            <div class="input-group">
                <span class="input-group-addon">+7</span>
                <input type="text" class="form-control" value="{{Auth::user()->phone}}">
            </div>
            <div class="form-group"><br>
                <button class="btn btn-primary">Обновить</button>
            </div>
        </div>
        <div class="col-md-6">
            <h4 class="text-center">Дополнительная информация</h4>
            <hr>
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Область</label>
                    <select name="" id="" class="form-control">
                        <option value="1">1</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Город</label>
                    <select name="" id="" class="form-control">
                        <option value="1">1</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Обновить</button>
            </div>
        </div>
    </div>
@stop