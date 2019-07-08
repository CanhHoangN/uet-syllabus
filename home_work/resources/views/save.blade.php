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
                    <h4>Confirm</h4>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-9">
                <form action="{{asset('/confirmsave')}}" method="post" enctype="multipart/form-data">
                    <!-- form Begin -->
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                    <div class="text-box">
                        <label id="TAL">Name syllabus: </label>
                        <textarea class="textbox" name="name" id="" cols="95%" rows="1" placeholder="Enter name syllabus."></textarea>

                        <label id="ILO">Intended Learning Outcomes</label>
                        <textarea class="textbox" name="text1" id="" cols="95%" rows="5">{{$data['textboxvalue']}}</textarea>

                        <label id="OBA">Outcome-based Assessment</label>
                        <textarea class="textbox" name="text2" id="" cols="95%" rows="5">{{$data['textboxvalue1']}}</textarea>

                        <label id="TAL">Teaching and Learning.</label>
                        <textarea class="textbox" name="text3" id="" cols="95%" rows="5">{{$data['textboxvalue2']}}</textarea>

                        <input type="submit" class="btn-outline-warning" value="Confirm">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>