<!DOCTYPE html>
<html lang="en">

<head>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>MainPage</title>
    <style>
        @media screen and (max-width: 768px) {
            .w3-container {
                width: 100%;
            }
        }
        @media screen and (min-width: 768px) {
            .w3-container {
                width: 700px;
                margin: 0 auto;
            }
        }
    </style>

</head>

<body>
    @if (session('save'))
    <script>
        alert("Success");
    </script>
    @endif
    @if (session('error'))
    <script>
        alert("Failed");
    </script>
    @endif
        <header class="w3-center w3-padding w3-light-blue">
            <h2>Subject Lists</h2>
        </header>
        <div>
            <button class="w3-button w3-round w3-right w3-light-blue w3-margin" onclick="document.getElementById('newsubject').style.display= 'block';return false;">New Subject</button>
        </div>
        <div class="w3-padding" style='max-width:1000px;margin:auto'>
             <table class="w3-table w3-striped w3-bordered w3-light-green">
             <thead>
                <th>No</th>
                <th>Subject ID</th>
                <th>Subject Title</th>
                <th>Subject Description</th>
                <th>Subject Price</th>
                <th>Total Learning Hours</th>
                <th>Operations</th>
             </thead>
             @foreach ($listSubjects as $listSubjects)
             <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $listSubjects->id}}</td>
                <td>{{ $listSubjects->subject_title}}</td>
                <td>{{ $listSubjects->subject_description}}</td>
                <td>{{ $listSubjects->subject_price}}</td>
                <td>{{ $listSubjects->total_learning_hours}}</td>
                <td>
                    <div class="w3-cell">
                        <form method="post" action="{{route('markDelete',$listSubjects->id)}}" accept-charset="UTF-8" onsubmit="return confirm('Delete?');">
                            {{csrf_field()}}
                            <button class="w3-button w3-round w3-block" type="submit">
                                <i class="fa fa-trash"> </i></button>
                        </form>
                    </div>
                    <div class="w3-cell">
                        <button class="w3-button w3-round w3-block" onclick="document.getElementById('{{$loop->iteration}}').style.display='block';return false;"><i class="fa fa-pencil-square-o"> </i>
                        </button>
                    </div>
                    <div id="{{$loop->iteration}}" class="w3-modal w3-animate-opacity">
                        <div class="w3-modal-content w3-round" style="width:500px">
                            <header class="w3-row w3-red"> <span onclick="document.getElementById('{{$loop->iteration}}').style.display='none'" class="w3-button w3-display-topright w3-small">&times;</span>
                                <h4 class="w3-margin-left">Update Subject Form</h4>
                            </header>
                            <div class="w3-padding">
                                <form method="post" action="{{route('markUpdate',$listSubjects->id)}}">
                                    {{csrf_field()}}
                                    <p><input class="w3-input w3-round w3-border" type="text" name="subjecttitle" placeholder="Subject Title" value ="{{ $listSubjects->subject_title}}"></p>
                                    <p><input class="w3-input w3-round w3-border" type="text" name="subjectdescription" placeholder="Subject Description" value ="{{ $listSubjects->subject_description}}"></p>
                                    <p><input class="w3-input w3-round w3-border" type="number" name="subjectprice" placeholder="Price" step="any" value ="{{ $listSubjects->subject_price}}"></p>
                                    <p><input class="w3-input w3-round w3-border" type="number" name="totallearninghours" placeholder="Total Learning Hours" value ="{{ $listSubjects->total_learning_hours}}"></p>
                                    </textarea></p>
                                    <button class="w3-button w3-red w3-round" type="submit">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
            </table>  
        </div>
        <footer class="w3-footer w3-center w3-light-blue">MYTUTOR COPYRIGHT</footer>
    
    <div id="newsubject" class="w3-modal w3-animate-opacity">
        <div class="w3-modal-content w3-round" style="width:500px">
            <header class="w3-row w3-red"> <span onclick="document.getElementById
     ('newsubject').style.display='none'" class="w3-button w3-display-topright w3-small">&times;</span>
                <h4 class="w3-margin-left">New Subject Form</h4>
            </header>
            <div class="w3-padding">
                <form method="post" action="{{route('savesubject', $listSubjects->id)}}" accept-charset="UTF-8" onsubmit="return confirm('Confirm to add this subject?');">
                    {{csrf_field()}}
                    <p><input class="w3-input w3-round w3-border" type="text" name="subjecttitle" placeholder="Subject Title"></p>
                    <p><input class="w3-input w3-round w3-border" type="text" name="subjectdescription" placeholder="Subject Description"></p>
                    <p><input class="w3-input w3-round w3-border" type="number" name="subjectprice" placeholder="Price" step="any"></p>
                    <p><input class="w3-input w3-round w3-border" type="number" name="totallearninghours" placeholder="Total Learning Hours"></p>
                    </textarea></p>
                    <button class="w3-button w3-red w3-round" type="submit">Add</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>