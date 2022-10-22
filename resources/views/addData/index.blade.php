<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/app.css">
    <title>Add Data</title>
</head>

<body>
    <section>
        <div class="container">
            <div class="row">
                <table class="table-responsive dt-responsive">
                    <tr>
                        <th scope="col">
                            Category
                        </th>
                    </tr>
                    <tbody>
                        @foreach($labourTypes as $labourType)
                        <tr>
                            <th scope="row">
                                <a href="{{route('web.add_data.get', $labourType->id)}}">{{$labourType->category}}</a>
                            </th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</body>

</html>