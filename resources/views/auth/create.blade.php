<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/app.css">
    <title>Login</title>
</head>

<body>
    <form action="{{route('web.auth.user.store')}}" method="post">
        {{csrf_field()}}
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="form-group col-6">
                    <label for="usr">Name:</label>
                    <input type="text" class="form-control" name="name" id="usr">
                </div>
            </div>
            <div class="row d-flex justify-content-center align-items-center">
                <div class="form-group col-6">
                    <label for="usr">User name:</label>
                    <input type="text" class="form-control" name="user_name" id="usr">
                </div>
            </div>
            <div class="row d-flex justify-content-center align-items-center">
                <div class="form-group col-6">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" name="password" id="pwd">
                </div>
            </div>
            <div class="row d-flex justify-content-center align-items-center">
                <div class="form-group col-6">
                    <label for="pwd">Confirm Password</label>
                    <input type="password" class="form-control" id="pwd">
                </div>
            </div>
            <div class="row d-flex justify-content-center align-items-center my-5">
                <div class="col-6 d-flex justify-content-center align-items-center">
                    <button type="submit" class="btn btn-primary btn-lg">Sign up</button>
                </div>
            </div>
        </div>
    </form>
</body>

</html>