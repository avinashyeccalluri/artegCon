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
    @php 
    $count = 0; 
    $totalCost = 0 ;
    $viewOptions = [7,15,30,45];
    $totalPersons = 0;
    @endphp
    <section>
        <div class="container">
            <div class="row">
                
            <div class="col-offset-6">
                        <div class="form-group">
                            <label for="work_duration">Select duration list</label>
                            <select class="form-control" id="work_duration" name="work_duration[]">
                                @foreach($viewOptions as $viewOption)
                                    <option value="{{$viewOption}}" @if((int)$duration == (int)$viewOption ) selected @endif>{{$viewOption}} days</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
            </div>
            <table class="table">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Category name</th>
                        <th>Fair/day</th>
                        <th>Total persons</th>
                        <th>Date</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($labourFairs as $labourFair)
                    <tr class="text-center">
                        <td scope="row">{{++$count}}</td>
                        <td>{{$labourFair['sub_category']}} - {{$labourFair['sub_category_name']}}</td>
                        <td>{{$labourFair['fair']}}</td>
                        <td>
                            @php
                            $totalPersons+= (int) $labourFair['no_of_labours'];
                            @endphp
                            {{$labourFair['no_of_labours']}}
                        </td>
                        @php
                        $date = explode("T",$labourFair['created_at'])[0]
                        @endphp
                        <td>{{(explode("-", $date))[2]}}-{{(explode("-", $date))[1]}}-{{(explode("-", $date))[0]}}</td>
                        <td>
                            @php
                            $cost = (int)$labourFair['fair'] * (int)$labourFair['no_of_labours'];
                            print_r($cost);
                            $totalCost+= $cost
                            @endphp
                        </td>
                    </tr>
                    @endforeach
                    <td class="text-center"></td>
                    <td class="text-center"></td>
                    <td class="text-center"><strong>Total persons</strong></td>
                    <td class="text-center"><strong>{{$totalPersons}}</strong></td>
                    <td class="text-center"><strong>Total cost</strong></td>
                    <td class="text-center">{{$totalCost}}</td>
                </tbody>
            </table>
            <div>
                <div class="row">
                    <a href="{{route('web.get_project_name_list')}}">Home</a>
                </div>
            </div>
        </div>
    </section>
</body>
<script>
    document.getElementById("work_duration").addEventListener("change", function(){
        var currentURL = window.location.href;
        var value = this.options[this.selectedIndex].value;
        currentURL = currentURL.split("&");
        currentURL = currentURL[0]+'&'+currentURL[1]+'&duration='+value
        window.location = currentURL
    })
</script>

</html>