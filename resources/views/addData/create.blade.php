<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/app.css">
    <title>Add Entries</title>
</head>

<body>
    <section>
        <div class="container">
            <form action="{{route('web.add_data.post', $category_id)}}" method="post">
                {{csrf_field()}}
                <h1>category</h1>
                <input type="text" name="category_id" id="" value="{{$category_id}}" hidden>
                <input type="text" name="project_id" id="" value="{{$project_id}}" hidden>
                @foreach($specificSubCategories as $specificSubCategories)
                <div class="row my-4 border border-3 py-4">
                    <input type="text" name="sub_category_id[]" id="" value="{{$specificSubCategories['id']}}" hidden>
                    <input type="text" name="sub_category_name[]" id="" value="{{$specificSubCategories['category']}}" hidden>
                    <div class="col-6">
                        <strong>Helper type - {{$specificSubCategories['category']}}</strong>
                    </div>
                    <div class="col-6">
                        <div class="form-outline">
                            <input type="number" id="typeNumber" class="form-control" />
                            <label class="form-label" name="no_of_labours[]" for="typeNumber" onkeypress='validate(event)'>Number of labours</label>
                        </div </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group col-3">
                            <label for="sub_category">Enter per day pay</label>
                            <input type="text" class="form-control" name="fair[]" id="sub_category" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="work_duration">Select work hours</label>
                            <select class="form-control" id="work_duration" name="work_duration[]">
                                <option>0.5</option>
                                <option>1</option>
                                <option>1.5</option>
                                <option>2</option>
                            </select>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="row d-flex justify-content-center align-items-center my-5">
                    <div class="col-6 d-flex justify-content-center align-items-center">
                        <button type="submit" class="btn btn-primary btn-lg">Update</button>
                    </div>
                </div>
            </form>
    </section>
</body>

</html>
<script>
    function validate(evt) {
  var theEvent = evt || window.event;

  // Handle paste
  if (theEvent.type === 'paste') {
      key = event.clipboardData.getData('text/plain');
  } else {
  // Handle key press
      var key = theEvent.keyCode || theEvent.which;
      key = String.fromCharCode(key);
  }
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}
</script>