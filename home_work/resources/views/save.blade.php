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

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">




    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>



    <link rel="stylesheet" href="{{asset('css/frontend_css/confirm.css')}}">
</head>

<body>
    <div class="box col-sm-9">
        <div class="header">
            @if($language == "vi")
            <h3 class="text-center">Xác nhận</h3>
            @else
            <h3 class="text-center">Confirm</h3>
            @endif
            
        </div>
        <div class="content">
            <form action="{{asset('/confirmsave')}}" method="post" enctype="multipart/form-data">
                @csrf
                @if($language == "vi")
                <div class="nameSyllabus">Tên đề cương</div>
                <textarea class="textbox" name="name" id="check" cols="95%" rows="1" placeholder="Nhập tên giáo trình" required></textarea>
                @else
                <div class="nameSyllabus">Name syllabus</div>
                <textarea class="textbox" name="name" id="check" cols="95%" rows="1" placeholder="Enter name syllabus" required></textarea>
                @endif

                <div id="nameajax"></div>
                <div class="intended">{{$lb->r1}}</div>
                <textarea class="textbox" name="text1" id="tlosave" cols="95%" rows="5">{{$data['textboxvalue']}}</textarea>

                <div class="outcome">{{$lb->r2}}</div>
                <textarea class="textbox" name="text2" id="obasave" cols="95%" rows="5">{{$data['textboxvalue1']}}</textarea>

                <div class="teaching">{{$lb->r3}}</div>

                <textarea class="textbox" name="text3" id="tlasave" cols="95%" rows="5">{{$data['textboxvalue2']}}</textarea>

                @if($language == "vi")
                <input id="checkresult" type="submit" class="btn-info" value="Xác nhận">
                @else
                <input id="checkresult" type="submit" class="btn-info" value="Confirm">
                @endif


            </form>
        </div>
    </div>

</body>
<script>
    CKEDITOR.replace('tlosave');
    CKEDITOR.replace('obasave');
    CKEDITOR.replace('tlasave');
    CKEDITOR.disableAutoInline = true;
    CKEDITOR.config.width = '100%';
    CKEDITOR.config.resize_enabled = false;
    CKEDITOR.config.height = "120px";
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#check').keyup(function() {
            let name = $(this).val();
            $.ajax({
                url: 'check',
                method: 'get',
                data: {
                    name: $(this).val()
                },
                success: function(data) {
                    $('#nameajax').html(data);
                    console.log(data);
                    if (data == 'Name already in use.') {
                        $('#checkresult').html('<div class="spinner-border text-danger btn-warning type="submit"></div>');

                        $('#checkresult').prop('disabled', true);
                    } else {
                        $('#checkresult').prop('disabled', false);
                    }
                }
            });
        });
    });
</script>


</html>