<?php
use Illuminate\Support\Facades\Auth;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container pt-4">
    <div class="mb-4">
        @if(!empty($response))
            {{ $response }}
        @endif
        @if(Auth::check())
            <a href="/logout" class="btn btn-danger">Выйти</a>
        @else
            <a href="/login" class="btn btn-secondary">Войти</a>
        @endif

        <a href="/registration" class="btn btn-success">Регистрация</a>
    </div>
    <a href="/edit" class="btn btn-primary">Создать альбом</a>
    <div class="row mt-2">
        @foreach($albums as $album)
            <div class="card m-2" style="width: 18rem;">
                <img src="{{ $album->image }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h4 class="card-title">{{ $album->name }}</h4>
                    <h5 class="card-title">{{ $album->singer }}</h5>
                    <p class="card-text">{{ $album->description }}</p>
                    <a href="/delete/{{$album->id}}" class="btn btn-danger">Удалить</a>
                    <a href="/edit/{{$album->id}}" class="btn btn-primary">Редактировать</a>
                </div>
            </div>
        @endforeach
    </div>
</div>

</body>
</html>
