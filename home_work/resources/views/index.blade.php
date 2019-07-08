<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OBE Syllabus Builder</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset('css/frontend_css/index.css')}}">

    <link rel="stylesheet" href="{{asset('css/frontend_css/style.css')}}">


    <script type="text/javascript" src="{{asset("js/frontend_js/index.js")}}"></script>


</head>


<body>
    <div class="container">
        <div class="box">
            <div class="header">
                <div class="row">
                    <div class="col-sm-6 offset-sm-1">
                        <h4 style="line-height: 55px">OBE Syllabus Builder</h4>
                    </div>
                    <div class="col-sm-3">
                        @if(Auth::check())
                        <div class="btn-group">
                            <button type="button" class="btn-primary login"><a href='{{asset('/syllabus')}}'>{{Auth::user()->name}}</a></button>
                            <button type="button" class="btn-primary login"><a href="{{asset('/logout')}}">Logout</a></button>
                        </div>
                        @else
                        <div class="btn-group">
                            <button type="button" class="btn-primary login"><a href="{{asset('/login')}}">Login</a></button>
                            <button type="button" class="btn-primary login"><a href="{{asset('/register')}}">Register</a></button>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-left">
                    <div class="template">
                        @foreach($templates as $template)
                        <button id="{{$template->idTemplate}}" class="btn-template">{{$template->nameTemplate}}</button>
                        @endforeach
                    </div>
                    <div class="top-left">
                        <div class="title-top">
                            <div class="text-primary">
                                Bloom's Taxonomy of Cognitive Outcomes
                            </div>
                            <p id="descriptionTemplate" class="text-primary">
                            </p>
                        </div>

                        <ul class="levels">
                            @foreach($levels as $level)
                            <li><a id="{{$level->idLevel}}">Level {{$level->idLevel}}:{{$level->nameLevel}}</a></li>
                            @endforeach
                        </ul>


                        <div id="descriptionLevel" class="text-primary descLevel">
                            Level 1: After class or programme,learner will be able to: Retrieve relevant knowledge from long-term memory
                        </div>

                    </div>
                    <div class="bottom-left">
                        <div class="left-bottom">
                            <div class="title-bottom">
                                <p id="title" class="text-primary">Action verbs for ILO statements</p>
                                <p id="desTitle" class="text-primary">Select and click on the action verbs for your ILO statement</p>

                            </div>
                            <div class="method">
                                <select id="listMethod" class="custom-select" multiple size="8">
                                    @foreach($methods as $method)
                                    <option value="{{$method->nameMethod}}">{{$method->nameMethod}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="example">
                            <p id="example" class="text-primary">Examples</p>
                            <p id="descExample" class="text-primary">On successful completion of this class/programme,students/graduates will be able to</p>
                            <ul id="listExample" class="text-primary">
                                <li>List the steps for task analysis.</li>
                                <li>Name the symptoms for Parkinson Disease.</li>
                                <li>Define the term 'progress' as used by military strategists.</li>
                            </ul>
                        </div>


                    </div>
                </div>
                <div class="col-sm-6 col-right">
                    <div class="text-head">
                        <h4>My Syllabus</h4>
                        <i>Click and type your syllabus here.</i>
                    </div>
                    <form action="{!! url('save') !!}" method="post" enctype="multipart/form-data">
                        <!-- form Begin -->
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}" />

                        <div class="text-box">
                            <div class="btn-info">
                                <p>Intended Learning Outcomes</p>
                            </div>
                            <textarea id="box-outcome" style="margin-top: -15px;color: white" class="bg-info" name="textboxvalue"></textarea>
                        </div>

                        <div class="outcome">
                            <div class="bg-danger">
                                Outcome-based Assessment
                                <span class="click-outcome"><i class="fas fa-angle-down"></i></span>
                                <textarea id="box-outcome-2" class="bg-danger out-text" name="textboxvalue1"></textarea>

                            </div>
                        </div>

                        <div class="teaching">
                            <div class="bg-success">
                                Teaching and Learning
                                <span class="click-teaching"><i class="fas fa-angle-down"></i></span>
                                <textarea id="box-teaching" class="bg-success teach-text" name="textboxvalue2"></textarea>
                            </div>
                        </div>
                        <div class="copy-print">
                            <input type="submit" class="btn-outline-warning" value="Save">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="copy-print">

            <input type="submit" id="copy" class="btn-outline-warning" value="copy">
            <input type="submit" onclick="printDiv();" class="btn-outline-warning" value="print">
        </div>
        <div class="bg-cover">

        </div>
        <div id="box-copy" class="box-copy">
            <div class="bg-warning copy-head">
                My Syllabus
                <a id="close"><i class="fas fa-times"></i></a>
            </div>
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

</body>
<script>
    function printDiv() {

        var divToPrint = document.getElementById('box-copy');

        var newWin = window.open('', 'Print-Window');

        newWin.document.open();

        newWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</body></html>');

        newWin.document.close();

        setTimeout(function() {
            newWin.close();
        }, 10);

    }

    $(document).ready(function() {
        $("button#1").addClass("btn1");
        var template = 1;
        var _level = 1;
        $("button.btn-template").click(function() {
            template = $(this).attr("id");
            var linkMethod = "method".concat("/", template, "/", _level);
            $.ajax({
                url: linkMethod,
                method: 'get',
                async:true,
                success: function(data) {
                    $("#listMethod").empty();

                    for (var k in data) {
                        $('#listMethod').append($('<option>', {
                            value: data[k].nameMethod,
                            text: data[k].nameMethod
                        }));
                    }

                }
            });
            var linkSuggest = "suggest".concat("/", template, "/", _level);

            $.ajax({
                url: linkSuggest,
                method: 'get',
                async:true,
                success: function(data) {
                    //alert(data.example);
                    if (template == 1) {
                        for (var k in data) {
                            $("#title").text(data[k].title);
                            $("#desTitle").text(data[k].descriptionSuggest);
                        }

                    } else {
                        for (var k in data) {
                            $("#title").text(data[k].title);
                            $("#desTitle").text(data[k].descriptionSuggest);
                            $("#descExample").text(data[k].example);
                        }
                    }




                }
            });

            if (template == 1) {
                var linkSuggests = "suggest".concat("/", template, "/", _level);

                $.ajax({
                    url: linkSuggests,
                    method: 'get',
                    async:true,
                    success: function(data) {
                        //alert(data.example);
                            $("#listExample").empty();
                            for (var i in data[0].example[0]) {

                                var list = "<li>".concat(data[0].example[0][i], "</li>");
                                // console.log(list);
                                $("#listExample").append(list);
                            }


                    }
                });
                $(".top-left").css({
                    border: "3px solid #273c75"
                });
                $(".bottom-left").css({
                    border: "3px solid #273c75"
                });
                $(".top-left ul").css({
                    marginTop: "10%"
                });
                $("#descriptionTemplate").text("");
                $(".text-box").removeClass("text-box-1");
                $(".out-text").removeClass('show-out-text');
                $(".text-box").removeClass("text-box-2");
                $(".teach-text").removeClass("show-teaching");
                $("#descExample").text("On successful completion of this class / programme,students/graduates will be able to");
                $(".custom-select").removeClass("listMethod-2");
                $(".custom-select").removeClass("listMethod-3");
                $(".example").removeClass("moveExample");
                $(".example").removeClass("moveExampleTLA");
                $("button#2").removeClass("btn2");
                $("button#3").removeClass("btn3");
                $("button#1").addClass("btn1");
            } else if (template == 2) {
                $("#listExample").empty();
                $(".top-left").css({
                    border: "3px solid orange"
                });
                $(".bottom-left").css({
                    border: "3px solid orange"
                });
                $(".top-left ul").css({
                    marginTop: "1%"
                });
                $("#descriptionTemplate").text("Decide and click on the cognitive level of your learning outcomes");
                $(".teach-text").removeClass("show-teaching");
                $(".text-box").removeClass("text-box-2");
                $(".text-box").addClass("text-box-1");
                $(".out-text").addClass('show-out-text');
                $(".custom-select").removeClass("listMethod-3");
                $(".custom-select").addClass("listMethod-2");
                $(".example").addClass("moveExample");
                $("button#1").removeClass("btn1");
                $("button#3").removeClass("btn3");
                $("button#2").addClass("btn2");

            } else if (template == 3) {
                $("#listExample").empty();
                $(".top-left").css({
                    border: "3px solid #20c997"
                });
                $(".bottom-left").css({
                    border: "3px solid #20c997"
                });
                $(".top-left ul").css({
                    marginTop: "1%"
                });
                $("#descriptionTemplate").text("Decide and click on the cognitive level of your learning outcomes");
                $(".text-box").addClass("text-box-1");
                $(".out-text").addClass('show-out-text');
                $(".text-box").addClass("text-box-2");
                $(".teach-text").addClass("show-teaching");
                $(".custom-select").removeClass("listMethod-2");
                $(".custom-select").addClass("listMethod-3");
                $(".example").addClass("moveExampleTLA");
                $("button#1").removeClass("btn1");
                $("button#2").removeClass("btn2");
                $("button#3").addClass("btn3");
            }

        });


        $("ul li a").click(function() {
            var level = $(this).attr("id");
            var link = "level/".concat(level);
            _level = $(this).attr("id");
            $.ajax({
                url: link,
                method: 'get',
                async:true,
                success: function(data) {
                    var text = "Level ".concat(level, ": ", data.desc);
                    $("#descriptionLevel").text(text);
                },
                error: function() {
                    alert("error");
                }
            });
            var linkMethod = "method".concat("/", template, "/", _level);
            //alert(linkMethod);
            $.ajax({
                url: linkMethod,
                method: 'get',
                async:true,
                success: function(data) {
                    $("#listMethod").empty();

                    for (var k in data) {
                        $('#listMethod').append($('<option>', {
                            value: data[k].nameMethod,
                            text: data[k].nameMethod
                        }));
                    }

                }
            });
            var linkSuggest = "suggest".concat("/", template, "/", level);

            $.ajax({
                url: linkSuggest,
                method: 'get',
                async:true,
                success: function(data) {
                    //alert(data.example);
                    if (template == 1) {
                        $("#listExample").empty();
                        for (var i in data[0].example[0]) {

                            var list = "<li>".concat(data[0].example[0][i], "</li>");
                            // console.log(list);
                            $("#listExample").append(list);
                        }



                    } else {
                        for (var k in data) {
                            $("#descExample").text(data[k].example);
                        }
                    }


                }
            })


        });
        var count = 0;
        $("#listMethod").click(function() {
            count++;
            var currentVal = $("#box-outcome").val();
            var curCopyIlo = $(".text-copy-ilo").val();
            var curCopyOba = $(".text-copy-oba").val();
            var curCopyTla = $(".text-copy-tla").val();
            var curBoxCome = $("#box-outcome-2").val();
            var curTeaching = $("#box-teaching").val();
            var text = $("#listMethod option:selected").text();
            var val = $("#listMethod").val();
            if (count == 1) {

                if (template == 1) {
                    $("#box-outcome").val(text);
                    //$(".text-copy-ilo").append(text + "<br>");
                } else if (template == 2) {
                    $("#box-outcome-2").val(text);
                    //$(".text-copy-oba").append(text + "<br>");
                } else {
                    $("#box-teaching").val(text);
                    //$(".text-copy-tla").val(text + "<br>");
                }

            } else {
                if (template == 1) {
                    $("#box-outcome").val(currentVal + "\n" + text);
                    //$(".text-copy-ilo").append(curCopyIlo + text + "<br>");
                } else if (template == 2) {
                    //$(".text-copy-oba").append(curCopyOba + text + "<br>");
                    if($("#box-outcome-2").val() == "")
                    {
                        $("#box-outcome-2").val(text);
                    }
                    else
                    {
                        $("#box-outcome-2").val(curBoxCome + "\n" + text);
                    }

                } else {

                    if($("#box-teaching").val() == "")
                    {
                        $("#box-teaching").val(text);
                    }
                    else
                    {
                        $("#box-teaching").val(curTeaching + "\n" + text);
                    }
                }


            }

        });
        $("input[id='copy']").click(function() {
            $(".text-copy-ilo").empty();
            $(".text-copy-oba").empty();
            $(".text-copy-tla").empty();
            $(".box-copy").addClass("show-box-copy");
            $(".bg-cover").addClass("show-bg-cover");
            //console.log($("#box-outcome").val());
            var list = $("#box-outcome").val();
            for(var i in list){
                if(list[i]!="\n")
                {
                    $(".text-copy-ilo").append(list[i]);
                }else{
                    $(".text-copy-ilo").append("<br>");
                }


            }
            var list2 = $("#box-outcome-2").val();
            for(var i in list2){
                if(list2[i]!="\n")
                {
                    $(".text-copy-oba").append(list2[i]);
                }else{
                    $(".text-copy-oba").append("<br>");
                }


            }
            var list3 = $("#box-teaching").val();
            for(var i in list3){
                if(list3[i]!="\n")
                {
                    $(".text-copy-tla").append(list3[i]);
                }else{
                    $(".text-copy-tla").append("<br>");
                }


            }
            //$(".text-copy-ilo").append($("#box-outcome").val()+"<br>");


        });
        $(".bg-cover,a[id='close']").click(function() {
            $(".box-copy").removeClass("show-box-copy");
            $(".bg-cover").removeClass("show-bg-cover");
        });



    });
</script>
</html>