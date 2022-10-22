<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/app.css">
    <title>Category List</title>
</head>

<body>
    <div class="container">
        <table class="table-responsive dt-responsive">
            <tr>
                <th scope="col">
                    Category
                </th>
            </tr>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <th scope="row">
                        <a href="{{route('web.sub_category.get', $category->id)}}">{{$category->category}}</a>
                    </th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>