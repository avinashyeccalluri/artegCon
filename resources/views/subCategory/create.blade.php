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
            <form action="{{route('web.sub_category.store')}}" method="post">
                {{csrf_field()}}
                <input type="text" name="project_id" value="{{$project_id}}" hidden>
                <input type="text" name="parent_id" value="{{$category_id}}" hidden>
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="form-group col-6">
                        <label for="sub_category">Enter the labor type</label>
                        <input type="text" class="form-control" name="category" id="sub_category" required>
                    </div>
                </div>
                <div class="row d-flex justify-content-center align-items-center my-5">
                    <div class="col-6 d-flex justify-content-center align-items-center">
                        <button type="submit" class="btn btn-primary btn-lg">Add Sub category</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>

</html>