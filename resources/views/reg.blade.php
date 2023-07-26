<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Регистрация</title>
    <link href="css/app.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row">
        <form method="POST" action="reg" style="text-align: center; margin: auto;">
            {!! csrf_field() !!}

            <div>
                Имя
                <input style="margin: 10px;" type="text" name="name" id="name">
            </div>
            <div>
                Email
                <input style="margin: 10px;" type="email" name="email" id="email">
            </div>

            <div>
                Пароль
                <input style="margin: 10px;" type="password" name="password" id="password">
            </div>


            <div>
                <button style="margin: 10px;" type="submit">Зарегистрироваться</button>
            </div>
        </form>
    </div>
</div>
<script src="js/app.js"></script>
</body>
</html>
