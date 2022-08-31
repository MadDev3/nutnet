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
<body class="text-center h-100">
<main class="row align-items-center col-3 m-auto">
    <a class="w-100 mt-2 btn btn-success" href="/">На главную</a>
    <form method="post" action="/registration/check" class="mt-5">
        @csrf
        <h1 class="h3 mb-3 fw-normal">Please sign up</h1>

        <div class="form-floating mb-2">
            <input name="username" type="text" class="form-control" id="floatingUser" placeholder="user228">
            <label for="floatingUser">Username</label>
        </div>
        <div class="form-floating mb-2">
            <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating mb-2">
            <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign up</button>
        <a class="w-100 mt-2 btn btn-success" href="/login">Войдите</a>
    </form>
</main>
</body>
</html>
