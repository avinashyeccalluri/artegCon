<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/app.css">
    <title>Get entries</title>
</head>

<body>
    <section>
        <div class="container">
            <h1>{{$category->category}} entries</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>No of persons</th>
                        <th>Cost</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($entries as $entry)
                    <tr>
                        <td scope="row">{{$entry->sub_category}}</td>
                        <td>{{$entry->np_of_labours}}</td>
                        <td>{{$entry->fair}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</body>

</html>