<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset('css/index.css')}}">

    <script type="text/javascript" src="{{asset("js/index.js")}}"></script>
</head>
<body>
    <div class="container">
        <div class="box">
            <div class="row">
                <div class="col-sm-6 offset-1">
                    <h4>OBE Syllabus Builder</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-left">
                    <div class="row">
                        <div class="col-sm-12">
                            @foreach($templates as $template)
                                <button id="{{$template->idTemplate}}" class="btn-primary">{{$template->nameTemplate}}</button>
                            @endforeach

                        </div>
                    </div>
                    <div class="row top-left">
                        <div class="col-sm-12">
                            <div class="text">
                                <div class="text-primary" style="font-size: 15px">
                                    Bloom's Taxonomy of Cognitive Outcomes
                                </div>
                                <div id="descriptionTemplate" class="text-primary" style="font-size: 12px">

                                </div>
                            </div>
                            <ul>
                                @foreach($levels as $level)
                                    <li><a id="{{$level->idLevel}}">Level {{$level->idLevel}}:{{$level->nameLevel}}</a></li>
                                @endforeach
                             <!--   <li><a href="#">Level 6:Creating</a></li>
                                <li><a href="#">Level 5:Evaluating</a></li>
                                <li><a href="#">Level 4:Analysing</a></li>
                                <li><a href="#">Level 3:Applying</a></li>
                                <li><a href="#">Level 2:Understanding</a></li>
                                <li><a href="#">Level 1:Remembering</a></li> -->
                            </ul>
                            <div class="text" style="font-size: 10px">
                                <div id="descriptionLevel" class="text-info" style="font-size: 10px">
                                    Level 1: After class or programme,learner will be able to: Retrieve relevant knowledge from long-term memory
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row bottom-left">
                        <div class="col-sm-5">
                                <div class="text">
                                    <p class="text-primary" style="font-size: 15px">Action verbs for ILO statements</p>
                                    <i class="text-info">Select and click on the action verbs for your ILO statement</i>
                                </div>
                                <select id="listMethod" class="custom-select" multiple size="6" style="width: 120px">
                                    @foreach($methods as $method)
                                        <option value="{{$method->nameMethod}}">{{$method->nameMethod}}</option>
                                    @endforeach

                                </select>

                        </div>
                        <div class="col-sm-7">
                            <div class="text">
                                <p class="text-primary" style="font-size: 15px">Examples</p>
                                <i class="text-primary" >On successful completion of this class / programme,students/graduates will be able to</i>
                                <ul class="text-primary">
                                    <li>List the steps for task analysis.</li>
                                    <li>Name the symptoms for Parkinson Disease.</li>
                                    <li>Define the term 'progress' as used by military strategists.</li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-right">
                    <div class="text-head">
                        <h4>My Syllabus</h4>
                        <i>Click and type your  syllabus here.</i>
                    </div>

                    <div class="text-box">
                        <div class="btn-info">
                            <p>Intended Learning Outcomes</p>
                        </div>
                        <textarea  id="box-outcome" style="margin-top: -15px;color: white" class="bg-info" name="text-box-value"></textarea>
                    </div>
                    
                    <div class="outcome">
                        <div class="bg-danger">
                            Outcome-based Assessment
                            <span class="click-outcome"><i  class="fas fa-angle-down"></i></span>
                            <textarea id="box-outcome-2" class="bg-danger out-text" ></textarea>

                        </div>
                    </div>

                    <div class="teaching">
                        <div class="bg-success">
                            Teaching and Learning
                            <span class="click-teaching"><i class="fas fa-angle-down"></i></span>
                            <textarea id="box-teaching" class="bg-success teach-text"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>
<script>
    $(document).ready(function(){
        var template = 1;
        var _level = 1;
        $("#1").click(function () {
            $(".top-left").css({
                border : "3px solid darkred"
            });
            $(".bottom-left").css({
                border : "3px solid darkred"
            });
            $(".top-left ul").css({
                marginTop : "10%"
            });
            $("#descriptionTemplate").text("");
            $(".text-box").removeClass("text-box-1");
            $(".out-text").removeClass('show-out-text');
            $(".text-box").removeClass("text-box-2");
            $(".teach-text").removeClass("show-teaching");
        });
        $("#2").click(function () {
            $(".top-left").css({
                border : "3px solid orange"
            });
            $(".bottom-left").css({
                border : "3px solid orange"
            });
            $(".top-left ul").css({
                marginTop : "1%"
            });
            $("#descriptionTemplate").text("Decide and click on the cognitive level of your learning outcomes");
            $(".teach-text").removeClass("show-teaching");
            $(".text-box").removeClass("text-box-2");
            $(".text-box").addClass("text-box-1");
            $(".out-text").addClass('show-out-text');
        });
        $("#3").click(function () {
            $(".top-left").css({
                border : "3px solid #20c997"
            });
            $(".bottom-left").css({
                border : "3px solid #20c997"
            });
            $(".top-left ul").css({
                marginTop : "1%"
            });
            $("#descriptionTemplate").text("Decide and click on the cognitive level of your learning outcomes");
            $(".text-box").addClass("text-box-1");
            $(".out-text").addClass('show-out-text');
            $(".text-box").addClass("text-box-2");
            $(".teach-text").addClass("show-teaching");
        });
        $("button").click(function () {
           template = $(this).attr("id");
            var linkMethod = "method".concat("/",template,"/",_level);
            $.ajax({
                url : linkMethod,
                method : 'get',
                success : function (data) {
                    $("#listMethod").empty();

                    for (var k in data) {
                        $('#listMethod').append($('<option>',
                            {
                                value: data[k].nameMethod,
                                text : data[k].nameMethod
                            }));
                    }

                }
            })
        });


        $("ul li a").click(function () {
            var level = $(this).attr("id");
            var link =  "level/".concat(level);
            _level = $(this).attr("id");
            $.ajax({
                url : link,
                method : 'get',
                success : function (data) {
                    var text = "Level ".concat(level,": ",data.desc);
                    $("#descriptionLevel").text(text);
                },
                error : function () {
                    alert("error");
                }
            });
            var linkMethod = "method".concat("/",template,"/",_level);
            //alert(linkMethod);
            $.ajax({
                url : linkMethod,
                method : 'get',
                success : function (data) {
                    $("#listMethod").empty();

                    for (var k in data) {
                        $('#listMethod').append($('<option>',
                            {
                                value: data[k].nameMethod,
                                text : data[k].nameMethod
                            }));
                    }

                }
            })


        });
        var count = 0;
        $("#listMethod").click(function () {
            count++;
            var currentVal = $("#box-outcome").val();
            var curBoxCome = $("#box-outcome-2").val();
            var curTeaching = $("#box-teaching").val();
            var text = $( "#listMethod option:selected" ).text();
            var val = $("#listMethod").val();
            if(count == 1){

                if(template == 1){
                    $("#box-outcome").val(text);
                }
                else if(template == 2){
                    $("#box-outcome-2").val(text);
                }else{
                    $("#box-teaching").val(text);
                }

            }else{
                if(template == 1){
                    $("#box-outcome").val(currentVal+"\n"+text);
                }
                else if(template == 2){

                    $("#box-outcome-2").val(curBoxCome+"\n"+text);
                }else{

                    $("#box-teaching").val(curTeaching+"\n"+text);
                }


            }

        });



    });
</script>
</html>
