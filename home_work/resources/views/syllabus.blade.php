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
<div class="content_box">
    <div class="left_bar">
        <ul class=" nav-tabs--vertical nav" role="navigation">
            @foreach($syllabuses as $syl)
                <li class="nav-item">
                    <a href="{{$syl->nameSyllabus}}" id="{{$syl->idSyllabus}}" class="nav-link active" data-toggle="tab" role="tab" aria-controls="{{$syl->nameSyllabus}}">{{$syl->nameSyllabus}}</a>
                </li>
            @endforeach

        </ul>
    </div>
    <div class="right_bar row ">
        <div class="intended col-sm-4">
            <div class="head">
                Intended Learning Outcomes
            </div>
            <div class="text-copy-ilo">
                @if($firstSyllabus->intended == null)
                    <i>Danh sách rỗng</i>
                @else
                    <?php
                        $arr = (explode("\r\n",$firstSyllabus->intended));
                        foreach ($arr as $el){
                            echo $el;
                            echo "<br>";
                        }
                    ?>

                @endif
            </div>
        </div>
        <div class="outcome col-sm-4">
            <div class="head">
                Outcome-based Assessment
            </div>
            <div class="text-copy-oba">
                @if($firstSyllabus->OutcomeBased == null)
                    <i>Danh sách rỗng</i>
                @else
                    <?php
                    $arr = (explode("\r\n",$firstSyllabus->OutcomeBased));
                    foreach ($arr as $el){
                        echo $el;
                        echo "<br>";
                    }
                    ?>
                @endif
            </div>
        </div>
        <div class="teaching col-sm-4">
            <div class="head">
                Teaching and Learning
            </div>
            <div class="text-copy-tla">
                @if($firstSyllabus->Teaching == null)
                    <i>Danh sách rỗng</i>
                @else
                    <?php
                    $arr = (explode("\r\n",$firstSyllabus->Teaching));
                    foreach ($arr as $el){
                        echo $el;
                        echo "<br>";
                    }
                    ?>
                @endif
            </div>
        </div>
    </div>
</div>

   <!-- <div class="container">
        <div class="box">
            <div class="header">
                <div class="col-sm-6 offset-sm-4">
                    <h3 style="color: white">List Syllabuses</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <select class="form-control" multiple name="title" id="idsyl">
                    @foreach($syllabuses as $syl)
                    <option value="{{$syl->idSyllabus}}">{{$syl->nameSyllabus}}</option>
                    @endforeach
                </select>

            </iv>
        </div>
        <div class="row content" style="margin-top: 5%" >
            <div class="col-md-9">
                <div class="copy-result">
                    <div class="copy-ilo">
                        <div class="bg-success text-light">
                            <p>Intended Learning Outcomes</p>
                        </div>
                        <div class="text-copy-ilo">

                        </div>
                    </div>
                    <div class="copy-oba">
                        <div class="bg-info text-light">
                            <p>Outcome-based Assessment</p>
                        </div>
                        <div class="text-copy-oba"></div>
                    </div>
                    <div class="copy-tla">
                        <div class="bg-danger text-light">
                            <p>Teaching and Learning Activities</p>
                        </div>
                        <div class="text-copy-tla"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>-->
</body>
<script>
    $(document).ready(function() {

            $("li a").click(function() {
                $(".text-copy-tla").empty();
                $(".text-copy-oba").empty();
                $(".text-copy-ilo").empty();

                var id = $(this).attr('id');
                $.get("ajax/content/"+id, function(data) {
                    for(var i in data.intended){
                        if(data.intended[i]!="\n")
                        {
                            $(".text-copy-ilo").append(data.intended[i]);
                        }else{
                            $(".text-copy-ilo").append("<br>");
                        }


                    }
                    //--------------------------------------------------------
                    for(var i in data.OutcomeBased){
                        if(data.OutcomeBased[i]!="\n")
                        {
                            $(".text-copy-oba").append(data.OutcomeBased[i]);
                        }else{
                            $(".text-copy-oba").append("<br>");
                        }


                    }
                    //--------------------------------------------------------------
                    for(var i in data.Teaching){
                        if(data.Teaching[i]!="\n")
                        {
                            $(".text-copy-tla").append(data.Teaching[i]);
                        }else{
                            $(".text-copy-tla").append("<br>");
                        }


                    }
                });

            });



    });
</script>

</html>
