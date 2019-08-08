<!DOCTYPE html>
<html lang="vi">

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


    <link rel="stylesheet" href="{{asset('css/frontend_css/index.css')}}">

    <link rel="stylesheet" href="{{asset('css/frontend_css/style.css')}}">

    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>

    <script type="text/javascript" src="{{asset("js/frontend_js/index.js")}}"></script>






    <script type="text/javascript" src="{{asset('save-to-pdf/plugin.js')}}"></script>

</head>


<body>
    <div class="container">
        <div class="box">
            <div class="header">
                <div class="row">
                    <div class="col-sm-8 offset-sm-1">
                            <h4 style="line-height: 55px">{{$cstLB->nameApp}}</h4>
                    </div>

                        @if(Auth::check())
                            <div class="dropdown">
                                <button type="button" class="btn-info dropdown-toggle" data-toggle="dropdown">
                                    {{Auth::user()->name}}
                                </button>
                                <div class="dropdown-menu">
                                    @if($language == "vi")
                                        <a class="dropdown-item border-bottom" href="{{route("syllabus")}}">Đã lưu</a>
                                        <a class="dropdown-item" href="{{asset('/logout')}}">Đăng xuất</a>
                                    @else
                                        <a class="dropdown-item border-bottom" href="{{route("syllabus")}}">Saved</a>
                                        <a class="dropdown-item" href="{{asset('/logout')}}">Logout</a>
                                    @endif


                                </div>
                            </div>
                        @else
                        <div class="btn-group">
                            @if($language == "vi")
                                <button type="button" class="btn-light login" style="line-height: 12px;width: 120px"><a href="{{asset('/login')}}">Đăng nhập</a></button>
                                <button type="button" class="btn-light login" style="line-height: 12px;width: 100px"><a href="{{asset('/register')}}">Đăng kí</a></button>
                            @elseif($language == "en")
                                <button type="button" class="btn-light login"><a href="{{asset('/login')}}">Login</a></button>
                                <button type="button" class="btn-light login"><a href="{{asset('/register')}}">Register</a></button>
                            @endif
                        </div>
                        @endif

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
                                {{$cstLB->l1}}
                            </div>
                            <p id="descriptionTemplate" class="text-primary">
                            </p>
                        </div>

                        <ul class="levels">
                            @if($language == "vi")
                                @foreach($levels as $level)
                                <li><a id="{{$level->idLevel}}">Mức {{$level->idLevel}}:{{$level->nameLevel}}</a></li>
                                @endforeach
                            @else
                                @foreach($levels as $level)
                                    <li><a id="{{$level->idLevel}}">Level {{$level->idLevel}}:{{$level->nameLevel}}</a></li>
                                @endforeach
                            @endif
                        </ul>


                        <div id="descriptionLevel" class="text-primary descLevel">

                        </div>

                    </div>
                    <div class="bottom-left">
                        <div class="left-bottom">
                            <div class="title-bottom">
                                @if($language == "vi")
                                    <p id="title" class="text-primary">Động từ hành động cho câu lệnh ILO</p>
                                    <p id="desTitle" class="text-primary">Chọn và nhấp vào các động từ hành động cho câu lệnh ILO của bạn</p>

                                @else
                                    <p id="title" class="text-primary">Action verbs for ILO statements</p>
                                    <p id="desTitle" class="text-primary">Select and click on the action verbs for your ILO statement</p>
                                @endif

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
                            @if($language == "vi")
                                <p id="example" class="text-primary">Thí dụ</p>
                                <p id="descExample" class="text-primary">Khi hoàn thành thành công lớp học / chương trình này, sinh viên / sinh viên tốt nghiệp sẽ có thể</p>
                                <ul id="listExample" class="text-primary">
                                    <li>Liệt kê các bước để phân tích nhiệm vụ.</li>
                                    <li>Kể tên các triệu chứng của bệnh Parkinson.</li>
                                    <li>Xác định thuật ngữ 'tiến bộ' như được sử dụng bởi các chiến lược gia quân sự.</li>
                                </ul>
                            @else
                                <p id="example" class="text-primary">Examples</p>
                                <p id="descExample" class="text-primary">On successful completion of this class/programme,students/graduates will be able to</p>
                                <ul id="listExample" class="text-primary">
                                    <li>List the steps for task analysis.</li>
                                    <li>Name the symptoms for Parkinson Disease.</li>
                                    <li>Define the term 'progress' as used by military strategists.</li>
                                </ul>
                            @endif

                        </div>


                    </div>
                </div>
                <div class="col-sm-6 col-right">
                    <div class="text-head">

                            <h4>{{$cstLB->title}}</h4>
                            <i>{{$cstLB->des}}</i>

                    </div>
                    <form action="{!! url('save') !!}" method="post" enctype="multipart/form-data" id="print">
                        <!-- form Begin -->
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}" />

                        <div class="text-box">
                            <div class="btn-info" style="color: antiquewhite">
                                <div class="head-outcome">
                                        {{$cstLB->r1}}
                                </div>

                            </div>
                           <!-- <div id="box-outcome" style="height: 80% !important;" name="textboxvalue"></div>-->
                            <textarea id="boxoutcome" style="margin-top: -15px;color: white" class="bg-info" name="textboxvalue"></textarea>
                            <!-- <textarea id="boxoutcome1" style="color: white;display: none;visibility: hidden" class="bg-info" name="textboxvalue"></textarea> -->
                        </div>

                        <div class="outcome">
                            <div class="bg-info" style="color: antiquewhite">
                                <div class="head-outcome">
                                    {{$cstLB->r2}}
                                    <span class="click-outcome"><i class="fas fa-angle-down"></i></span>
                                </div>

                                <textarea id="boxoutcome2" style="color: white" class="bg-info" name="textboxvalue1"></textarea>
                                <!-- <textarea id="boxoutcome21" style="color: white;display: none;visibility: hidden" class="bg-info" name="textboxvalue1"></textarea> -->


                            </div>
                        </div>

                        <div class="teaching">
                            <div class="bg-info" style="color:antiquewhite">
                                <div class="head-outcome">
                                    {{$cstLB->r3}}
                                    <span class="click-teaching"><i class="fas fa-angle-down"></i></span>
                                </div>
                                <textarea id="boxteaching" style="color: white" class="bg-info" name="textboxvalue2"></textarea>
                                <!-- <textarea id="boxteaching1" style="color: white;display: none;visibility: hidden" class="bg-info" name="textboxvalue2"></textarea> -->

                            </div>
                        </div>
                    @if(Auth::check())
                        <div class="save">
                            @if($language == "vi")
                                <input type="submit" href="{{route("save")}}" class="btn-light" value="Lưu">
                            @else
                                <input type="submit" href="{{route("save")}}" class="btn-light" value="Save">
                            @endif
                        </div>


                    @endif
                    </form>
                    <div class="copy-print">
                        @if($language == "vi")
                            <input type="submit" id="copy" class="btn-light" value="Sao chép">
                            <input type="submit" onclick="exportHTML();" class="btn-light" value="Tải xuống">

                        @else
                            <input type="submit" id="copy" class="btn-light" value="copy">
                            <input type="submit" onclick="exportHTML()" class="btn-light" value="Download">

                        @endif
                    </div>
                    <div class="tutorial">
                        @if($language == "vi")
                            <a class="btn-light" target="_blank" href="{{route('tutorial')}}">Hướng dẫn</a>
                        @else
                            <a class="btn-light" target="_blank" href="{{route('tutorial')}}">Tutorial</a>
                        @endif
                    </div>
        </div>
        <div class="bg-cover">

        </div>
        <div id="box-copy" class="box-copy">
            <div class="bg-info copy-head">
                @if($language == "vi")
                    <h5>Đề cương</h5>
                @else
                    <h5>My Syllabus</h5>
                @endif

                <a id="close"><i class="fas fa-times"></i></a>
            </div>
            <div class="copy-result">
                <div class="copy-ilo">
                    <div class="bg-info text-light">
                        @if($language == "vi")
                            <p>Kết quả học tập dự định</p>
                        @else
                            <p>Intended Learning Outcomes</p>
                        @endif

                    </div>
                    <div class="text-copy-ilo">

                    </div>
                </div>
                <div class="copy-oba">
                    <div class="bg-info text-light">
                        @if($language == "vi")
                            <p>Đánh giá dựa trên kết quả</p>
                        @else
                            <p>Outcome-based Assessment</p>
                        @endif
                    </div>
                    <div class="text-copy-oba"></div>
                </div>
                <div class="copy-tla">
                    <div class="bg-info text-light">
                        @if($language == "vi")
                            <p>Dạy và học</p>
                        @else
                            <p>Teaching and Learning</p>
                        @endif
                    </div>
                    <div class="text-copy-tla"></div>
                </div>
            </div>
        </div>

                <div class="btn-group language">
                    <button type="button" class="btn-info">Language</button>
                    <button type="button" class="btn-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{route('language','en')}}">English</a>
                        <a class="dropdown-item" href="{{route('language','vi')}}">Vietnamese</a>
                    </div>
                </div>

            </div>

        </div>
    </div>
</body>



<script>

    CKEDITOR.replace('boxoutcome');
    CKEDITOR.replace('boxoutcome2');
    CKEDITOR.replace('boxteaching');
    CKEDITOR.disableAutoInline = true;
    CKEDITOR.config.width = '100%';
    CKEDITOR.config.enterMode = CKEDITOR.ENTER_BR;
    CKEDITOR.config.shiftEnterMode = CKEDITOR.ENTER_P;
    CKEDITOR.config.resize_enabled = false;
    CKEDITOR.config.height = "120px";

</script>

<script>
    function exportHTML(){
        var header = "<html xmlns:o='urn:schemas-microsoft-com:office:office' "+
            "xmlns:w='urn:schemas-microsoft-com:office:word' "+
            "xmlns='http://www.w3.org/TR/REC-html40'>"+
            "<head><meta charset='utf-8'><title>Export HTML to Word Document with JavaScript</title></head><body>";
        var footer = "</body></html>";
        //var sourceHTML = header+document.getElementById("source-html").innerHTML+footer;
        var sourceHTML = header+"<h3 style='color:red'>Kết quả học tập dự định</h3>"+CKEDITOR.instances.boxoutcome.getData()+"<h3 style='color:red'>Đánh giá dựa trên kết quả</h3>"+CKEDITOR.instances.boxoutcome2.getData()+"<h3 style='color:red'>Dạy và học</h3>"+CKEDITOR.instances.boxteaching.getData()+footer;

        var source = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(sourceHTML);
        var fileDownload = document.createElement("a");
        document.body.appendChild(fileDownload);
        fileDownload.href = source;
        fileDownload.download = 'document.doc';
        fileDownload.click();
        document.body.removeChild(fileDownload);
    }
</script>
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
        @if(\Illuminate\Support\Facades\Auth::check())
        @if(\App\User::where('id',\Illuminate\Support\Facades\Auth::id())->value('email_verified_at') == null)
            @if($language == "vi")
                alert("Vui lòng xác minh tài khoản trước sử dụng chức năng, mục xác nhận có thể nằm trong thưc mục spam!");
            @else
                alert("Please verify the previous account using the function, the confirmation item may be in the spam folder");
             @endif
        @endif
        @endif
        @if(session('emptySyllabus'))
            @if($language == "vi")
                alert('Hiện tại giáo trình đang rỗng, vui lòng chọn hoặc nhập thêm !');
            @else
                alert('Currently the list is empty, please enter !');
            @endif
        @endif
        @if(session('empty'))
             @if($language == "vi")
                alert('Hiện tại chưa có giáo trình nào được lưu !');
            @else
                alert("Your syllabus is empty !");
            @endif

        @endif
        @if(session('success'))
            @if($language == "vi")
                alert('Lưu thành công !');
            @else
                alert('success !');
            @endif
        @endif
        var n = 0;
        $("button#1").addClass("btn1");
        n = 0;
        var template = 1;
        var _level = 1;
        var _link = "level/".concat(_level);
        $.ajax({
            url: _link,
            method: 'get',
            async:true,
            success: function(data) {
                    @if($language == "vi")
                    var text = "Mức ".concat(_level, ": ", data.desc);
                    $("#descriptionLevel").text(text);
                    @else
                    var text = "Level ".concat(_level, ": ", data.desc);
                    $("#descriptionLevel").text(text);
                    @endif

            },
            error: function() {
                alert("error");
            }
        });
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
                $("#descriptionTemplate").text("");

                @if($language == "vi")
                $("#descExample").text("Khi hoàn thành thành công lớp học / chương trình này, sinh viên / sinh viên tốt nghiệp sẽ có thể");
                @else
                $("#descExample").text("On successful completion of this class / programme,students/graduates will be able to");
                @endif
                $(".custom-select").removeClass("listMethod-2");
                $(".custom-select").removeClass("listMethod-3");
                $("button#2").removeClass("btn2");
                $("button#3").removeClass("btn3");
                $("button#1").addClass("btn1");
            } else if (template == 2) {

                $("#listExample").empty();
                $(".top-left").css({
                    border: "3px solid #273c75"
                });
                $(".bottom-left").css({
                    border: "3px solid #273c75"
                });
                @if($language == "vi")
                $("#descriptionTemplate").text("Quyết định và nhấp vào cấp độ nhận thức về kết quả học tập của bạn");
                @else
                $("#descriptionTemplate").text("Decide and click on the cognitive level of your learning outcomes");
                @endif

                $(".custom-select").removeClass("listMethod-3");
                $(".custom-select").addClass("listMethod-2");
                $("button#1").removeClass("btn1");
                $("button#3").removeClass("btn3");
                $("button#2").addClass("btn2");

            } else if (template == 3) {
                $("#listExample").empty();
                $(".top-left").css({
                    border: "3px solid #273c75"
                });
                $(".bottom-left").css({
                    border: "3px solid #273c75"
                });
                @if($language == "vi")
                $("#descriptionTemplate").text("Quyết định và nhấp vào cấp độ nhận thức về kết quả học tập của bạn");
                @else
                $("#descriptionTemplate").text("Decide and click on the cognitive level of your learning outcomes");
                @endif
                $(".custom-select").removeClass("listMethod-2");
                $(".custom-select").addClass("listMethod-3");
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
                    @if($language == "vi")
                    var text = "Mức ".concat(_level, ": ", data.desc);
                    $("#descriptionLevel").text(text);
                        @else
                    var text = "Level ".concat(_level, ": ", data.desc);
                    $("#descriptionLevel").text(text);
                    @endif
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
            n++;
            count++;
            var text = $("#listMethod option:selected").text();
            if(template == 1){
                if(n == 1){
                    var check = CKEDITOR.instances.boxoutcome.getData();
                    if(check == ""){
                        console.log("null boxoutcome");
                        CKEDITOR.instances['boxoutcome'].insertText(text);
                    }else{
                        CKEDITOR.instances['boxoutcome'].insertText("\n"+text);
                    }


                }
                else{


                    CKEDITOR.instances['boxoutcome'].insertText("\n"+text);
                }

            }
            else if(template == 2){
                if(n == 1){
                    var check = CKEDITOR.instances.boxoutcome2.getData();
                    if(check == ""){
                        CKEDITOR.instances['boxoutcome2'].insertText(text);
                    }else{
                        CKEDITOR.instances['boxoutcome2'].insertText("\n"+text);
                    }
                }else{
                    CKEDITOR.instances['boxoutcome2'].insertText("\n"+text);
                }

            }
            else if(template == 3){
                if(n == 1){
                    var check = CKEDITOR.instances.boxteaching.getData();
                    if(check == ""){
                        CKEDITOR.instances['boxteaching'].insertText(text);
                    }else{
                        CKEDITOR.instances['boxteaching'].insertText("\n"+text);
                    }

                }else{
                    CKEDITOR.instances['boxteaching'].insertText("\n"+text);
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
            var list = CKEDITOR.instances.boxoutcome.getData();

            $(".text-copy-ilo").html(list);


            var list2 = CKEDITOR.instances.boxoutcome2.getData();

            $(".text-copy-oba").html(list2);

            var list3 = CKEDITOR.instances.boxteaching.getData();

            $(".text-copy-tla").html(list3);



        });
        $(".bg-cover,a[id='close']").click(function() {
            $(".box-copy").removeClass("show-box-copy");
            $(".bg-cover").removeClass("show-bg-cover");
        });



    });
</script>

</html>
