<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirm</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="{{asset('css/frontend_css/confirm.css')}}">
</head>

<body>
    <div class="box col-sm-9">
        <div class="header">
            <h3 class="text-center">Confirm</h3>
        </div>
        <div class="content">
                <form action="{{asset('/confirmsave')}}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="nameSyllabus">Name syllabus</div>
                        <textarea class="textbox" name="name" id="" cols="95%" rows="1" placeholder="Enter name syllabus" required></textarea>

                        <div class="intended">Intended Learning Outcomes</div>
                        <textarea class="textbox" name="text1" id="" cols="95%" rows="5">{{$data['textboxvalue']}}</textarea>

                        <div class="outcome">Outcome-based Assessment</div>
                        <textarea class="textbox" name="text2" id="" cols="95%" rows="5">{{$data['textboxvalue1']}}</textarea>

                        <div class="teaching">Teaching and Learning.</div>
                        <textarea class="textbox" name="text3" id="" cols="95%" rows="5">{{$data['textboxvalue2']}}</textarea>

                        <input type="submit" class="btn-warning" value="Confirm">

                </form>
        </div>
    </div>

</body>

</html>