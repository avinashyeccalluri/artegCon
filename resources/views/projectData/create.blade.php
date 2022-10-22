<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/app.css">
    <title>Document</title>
</head>

<body>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-6">

                    <form action="{{route('web.get_project_name.post')}}" method="post">
                        {{csrf_field()}}
                        <input type="text" name="user_id" id="" value="{{$user_id}}" hidden>
                        <div class="form-group">
                            <label for="usr">Project name</label>
                            <input type="text" class="form-control" name="project_name">
                        </div>
                        <div class="form-group">
                            <label for="usr">Location</label>
                            <input type="text" class="form-control" id="" name="location">
                        </div>
                        <div class="row d-flex justify-content-center align-items-center my-5">
                            <div class="col-6 d-flex justify-content-center align-items-center">
                                <button type="submit" class="btn btn-primary btn-lg">Add Project</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>