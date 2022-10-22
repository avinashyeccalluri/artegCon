<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/app.css">
    <title>Categories</title>
</head>

<body>

    <section>
        <!-- <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-3">
                    <a class="btn btn-primary" href="{{route('web.auth.list.index')}}" role="button">View categories</a>
                </div>
                <div class="col-3">
                    <a class="btn btn-primary" href="{{route('web.auth.categories.get')}}" role="button">Add Categories</a>
                </div>
                <div class="col-3">
                    <a class="btn btn-primary" href="{{route('web.add_data')}}" role="button">Add entries</a>
                </div>
            </div>
        </div> -->
        <div class="container">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Add entries</th>
                        <th>View Entries</th>
                        <th>View labour types</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td scope="row">{{$category->category}}</td>
                        <td>
                            <a href="{{route('web.add_data.get', ['project_id'=> $project_id, 'category_id' => $category->id])}}">Add Entries</a>
                        </td>
                        <td>
                            <a href="{{route('web.get_entries', ['project_id'=> $project_id, 'category_id' => $category->id])}}">View Entries</a>
                        </td>
                        <td>
                            <a href="{{route('web.sub_category.get', ['project_id'=>$project_id, 'category_id'=>$category->id])}}">View labour types</a>
                                
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div class="container">
                    <div class="row">
                        <div class="col-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                            </svg>
                            <a href="{{route('web.auth.categories.get', $project_id)}}">
                                Add Category
                            </a>
                        </div>
                    </div>
                </div>
    </section>

</body>

</html>