<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Ticketing Helpdesk - V1.0.0</title>
</head>
<body>
    <div class="container" style="margin-top:10%">
        <div class="row justify-content-md-center">
            <div class="col-lg-4">
                <img src="{{asset('img/logo.PNG')}}" alt="..." class="rounded mx-auto d-block img-thumbnail"><br>
                <form action="/login" method="POST">
                    {{ csrf_field() }}
                    <input type="email" name="email" placeholder="email" class="form-control"><br>
                    <input type="password" name="password" placeholder="password" class="form-control"><br>
                    <input type="submit" name="submit" class="btn btn-info float-right" value="login">
                </form>
            </div>
        </div>
    </div>
</body>
</html>