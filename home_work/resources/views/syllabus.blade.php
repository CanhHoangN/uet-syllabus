<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="{{asset('css/frontend_css/syllabus.css')}}">
</head>

<body>
    <div class="container">
        <div class="box">
            <div class="header">
                <div class="col-sm-6 offset-sm-3">
                    <h4>List Syllabuses</h4>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-3">
                <select class="form-control" name="title" id="idsyl">
                    @foreach($syllabuses as $syl)
                    <option value="{{$syl->idSyllabus}}">{{$syl->nameSyllabus}}</option>
                    @endforeach
                </select>
                <!-- <ul class="list-group">
                    @foreach($syllabuses as $syl)
                        <li class="list-group-item list-group-item-info" id="idsyl"><a id="{{$syl->idSyllabus}}">{{$syl->nameSyllabus}}</a></li>
                    @endforeach
                </ul> -->
            </div>
            <div class="col-md-9">
                <div class="text-box" id="content">
                    <!-- @foreach($syllabuses as $syl)
                    {!!$syl->content!!}
                    @endforeach -->
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    $(document).ready(function() {
        $("#idsyl").change(function() {
            var id = $(this).val();
            $.get("ajax/content/"+id, function(data) {
                $("#content").html(data);
            });
        });
    });
</script>

</html>