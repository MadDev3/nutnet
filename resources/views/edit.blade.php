<?php
$name = '';
$singer = '';
$description = '';
$url = '/edit/check';
$oldName = null;
$oldSinger = null;
$oldDescription = null;
$oldImage = null;
if(!empty($album)){
    $url = "/edit/$album->id/check";
    $name = $album->name;
    $singer = $album->singer;
    $description = $album->description;
    $oldName = $album->oldName;
    $oldSinger = $album->oldSinger;
    $oldDescription = $album->oldDescription;
    $oldImage = $album->oldImage;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
    <div class="container pt-5">
        <a class="btn btn-primary mb-5" href="/">Назад</a>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="post" action="{{ $url }}">
            @csrf
            <input value="{{ $name }}" id="name" name="name" class="form-control" placeholder="Название альбома" />
            @if($oldName)
                <p>Старое значение: {{ $oldName }}</p>
            @endif
            <input value="{{ $singer }}" id="singer" name="singer" class="form-control my-2" placeholder="Исполнитель" />
            @if($oldSinger)
                <p>Старое значение: {{ $oldSinger }}</p>
            @endif
            <input value="{{ $description }}" id="description" name="description" class="form-control mb-2" placeholder="Описание" />
            @if($oldDescription)
                <p>Старое значение: {{ $oldDescription }}</p>
            @endif
            @if($oldImage)
                <p>Старая обложка:</p>
                <img class="mb-2" src="{{ $oldImage }}" /><br>
            @endif

            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>
</body>
</html>
