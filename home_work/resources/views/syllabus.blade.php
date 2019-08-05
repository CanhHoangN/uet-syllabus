<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Saved</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>

    <link rel="stylesheet" href="{{asset('css/frontend_css/syllabus.css')}}">
    <link rel="stylesheet" href="{{asset('css/frontend_css/syllabustest.css')}}">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="name col-sm-8">
                @if($language == "vi")
                Danh sách
                @else
                List Syllabuses
                @endif
            </div>
            <div class="btn-group col-md-4">
                @if($language == "vi")
                <button type="button" class="btn" id="edit">Sửa</button>
                @else
                <button type="button" class="btn" id="edit">Edit</button>
                @endif
                <div id="myModal" class="modal">
                    <!-- Modal content -->
                    <form action="{!! url('edit') !!}" method="post" enctype="multipart/form-data">
                        <!-- form Begin -->
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                        <div class="modal-content">
                            <div class="modal-header">
                                @if($language == "vi")
                                <h2>Chỉnh sửa</h2>
                                @else
                                <h2>Edit</h2>
                                @endif

                                <span class="close">&times;</span>
                            </div>
                            <div class="copy">
                                <div class="texttitle text-light">
                                    <p>{{$lb->r1}}</p>
                                </div>
                                <div class="copy-ilo">
                                    <textarea name="_ilo" style="width: 100%; height: 5em" id="replace_ilo" class="text_replace_ilo"></textarea>
                                </div>

                            </div>
                            <div class="copy">
                                <div class="texttitle text-light">
                                    <p>{{$lb->r2}}</p>

                                </div>
                                <div class="copy-oba">
                                    <textarea name="_oba" style="width: 100%; height: 5em" id="replace_oba" class="text_replace_oba"></textarea>
                                </div>

                            </div>
                            <div class="copy">
                                <div class="texttitle text-light">
                                    <p>{{$lb->r3}}</p>

                                </div>
                                <div class="copy-tla">
                                    <textarea name="_tla" style="width: 100%; height: 5em" id="replace_tla" class="text_replace_tla"></textarea>
                                </div>

                            </div>
                            <textarea name="idsyl" style="display:none" id='idsyllabus'></textarea>
                            <div class="modal-footer">
                                @if($language == "vi")
                                <input type="submit" id="save" value="Lưu">
                                @else
                                <input type="submit" id="save" value="Save">
                                @endif

                            </div>
                        </div>
                    </form>

                </div>

                <form action="{!! url('delete') !!}" id="formdl" method="post" enctype="multipart/form-data">
                    <!-- form Begin -->
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                    <textarea name="idsyl_dl" style="display:none; height: 0px; width: 0px" id='idsyllabus_dl' required></textarea>
                    @if($language == "vi")
                    <input type="submit" id="delete" value="Xoá">
                    @else
                    <input type="submit" id="delete" value="Delete">
                    @endif

                </form>
                @if($language == "vi")
                <input type="submit" onclick="exportHTML();" class="btn-light" value="Tải xuống">
                @else
                <input type="submit" onclick="exportHTML();" class="btn-light" value="Export">
                @endif


                @if($language == "vi")
                <button><a href="{{url('/')}}" class="homebtn">Trang chủ</a></button>
                @else
                <button><a href="{{url('/')}}" class="homebtn">Home</a></button>
                @endif


            </div>
        </div>
        <div class="left_bar">
            <ul class="nav-tabs--vertical nav" role="navigation">
                @foreach($syllabuses as $syl)
                <li class="nav-item">
                    <a href="{{$syl->nameSyllabus}}" id="{{$syl->idSyllabus}}" class="nav-link active" data-toggle="tab" role="tab" aria-controls="{{$syl->nameSyllabus}}">{{$syl->nameSyllabus}}</a>
                </li>
                @endforeach
            </ul>
            <div class=paginate>{{$syllabuses->links()}}</div>
        </div>
        <div class="right_bar row ">
            <div class="intended col-sm-4">
                <div class="head" id="lbILO">
                    {{$lb->r1}}
                </div>
                <div class="text-copy-ilo" id="ilo">
                    @if($firstSyllabus->intended == null)
                    <i>Danh sách rỗng</i>
                    @else
                    <?php
                    $arr = (explode("\r\n", $firstSyllabus->intended));
                    foreach ($arr as $el) {
                        echo $el;
                    }
                    ?>

                    @endif
                </div>
            </div>
            <div class="outcome col-sm-4">
                <div class="head" id="lbOBA">
                    {{$lb->r2}}
                </div>
                <div class="text-copy-oba" id="oba">
                    @if($firstSyllabus->OutcomeBased == null)
                    <i>Danh sách rỗng</i>
                    @else
                    <?php
                    $arr = (explode("\r\n", $firstSyllabus->OutcomeBased));
                    foreach ($arr as $el) {
                        echo $el;
                        echo "<br>";
                    }
                    ?>
                    @endif
                </div>
            </div>
            <div class="teaching col-sm-4">
                <div class="head" id="lbTLA">
                    {{$lb->r3}}
                </div>
                <div class="text-copy-tla" id="tla">
                    @if($firstSyllabus->Teaching == null)
                    <i>Danh sách rỗng</i>
                    @else
                    <?php
                    $arr = (explode("\r\n", $firstSyllabus->Teaching));
                    foreach ($arr as $el) {
                        echo $el;
                        echo "<br>";
                    }
                    ?>
                    @endif
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    CKEDITOR.replace("replace_ilo");
    CKEDITOR.replace("replace_oba");
    CKEDITOR.replace("replace_tla");
    CKEDITOR.disableAutoInline = true;
    CKEDITOR.config.width = '100%';
    CKEDITOR.config.resize_enabled = false;
    CKEDITOR.config.height = "100px";
    CKEDITOR.config.line_height = '1px';
</script>
<script>
    $(document).ready(function() {

        $("li a").click(function() {
            $(".text-copy-tla").empty();
            $(".text-copy-oba").empty();
            $(".text-copy-ilo").empty();

            var id = $(this).attr('id');
            $.get("ajax/content/" + id, function(data) {
                if (data.intended == null) {
                    $(".text-copy-ilo").append("<i>" + "Danh sách rỗng");
                }
                $(".text-copy-ilo").append(data.intended);
                // for (var i in data.intended) {
                //     if (data.intended[i] != "\nz") {
                //         $(".text-copy-ilo").append(data.intended[i]);
                //     } else {
                //         $(".text-copy-ilo").append("<br>");
                //     }


                // }
                //--------------------------------------------------------
                if (data.OutcomeBased == null) {
                    $(".text-copy-oba").append("<i>" + "Danh sách rỗng");
                }
                $(".text-copy-oba").append(data.OutcomeBased);
                // for (var i in data.OutcomeBased) {

                //     if (data.OutcomeBased[i] != "\n") {
                //         $(".text-copy-oba").append(data.OutcomeBased[i]);
                //     } else {
                //         $(".text-copy-oba").append("<br>");
                //     }


                // }
                //--------------------------------------------------------------
                if (data.Teaching == null) {
                    $(".text-copy-tla").append("<i>" + "Danh sách rỗng");
                }
                $(".text-copy-tla").append(data.Teaching);
                // for (var i in data.Teaching) {

                //     if (data.Teaching[i] != "\n") {
                //         $(".text-copy-tla").append(data.Teaching[i]);
                //     } else {
                //         $(".text-copy-tla").append("<br>");
                //     }


                // }
            });

        });



    });
</script>
<script>
    var title = $('.nav-item a:first-child').attr('aria-controls');
    var lbILO = $('#lbILO').text();
    var lbOBA = $('#lbOBA').text();
    var lbTLA = $('#lbTLA').text();
    $(document).ready(function () {
       $('.nav-item a').click(function () {
           title =  ($(this).attr('aria-controls'));
       });
    });
    function exportHTML() {
        var header = "<html xmlns:o='urn:schemas-microsoft-com:office:office' " +
            "xmlns:w='urn:schemas-microsoft-com:office:word' " +
            "xmlns='http://www.w3.org/TR/REC-html40'>" +
            "<head><meta charset='utf-8'><title>title</title></head><body>";
        var footer = "</body></html>";
        //var sourceHTML = header+document.getElementById("source-html").innerHTML+footer;
        var sourceHTML = header+"<h1 style='text-align: center'>"+title+"</h1>"+ "<h3 style='color:red'>"+lbILO+"</h3>" + document.getElementById("ilo").innerHTML + "<h3 style='color:red'>"+lbOBA+"</h3>" + document.getElementById("oba").innerHTML + "<h3 style='color:red'>"+lbTLA+"</h3>" + document.getElementById("tla").innerHTML + footer;

        var source = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(sourceHTML);
        var fileDownload = document.createElement("a");
        document.body.appendChild(fileDownload);
        fileDownload.href = source;
        fileDownload.download = title.concat('.doc');
        fileDownload.click();
        document.body.removeChild(fileDownload);
    }
</script>
<script>
    var modal = document.getElementById("myModal");

    var btn = document.getElementById("edit");

    var span = document.getElementsByClassName("close")[0];

    var _ilo = document.getElementById("ilo");
    var _oba = document.getElementById("oba");
    var _tla = document.getElementById("tla");

    var idsyl = document.getElementById("idsyllabus");

    var btnsave = document.getElementById("save");

    var btndelete = document.getElementById("delete");
    var btnexport = document.getElementById("export");

    var idsyl_dl = document.getElementById("idsyllabus_dl");
    var idsyl_ep = document.getElementById("idsyllabus_ep");

    var id;
    $("li a").click(function() {
        id = $(this).attr('id');
    });

    btn.onclick = function() {
        if (Number(id) % 1 == 0) {
            $.get("ajax/content/" + id, function(data) {
                console.log(data);
                CKEDITOR.instances['replace_ilo'].setData(data.intended);
                CKEDITOR.instances['replace_oba'].setData(data.OutcomeBased);
                CKEDITOR.instances['replace_tla'].setData(data.Teaching);
                $("#replace_ilo").val(data.intended);
            })
            modal.style.display = "block";
            idsyl.innerHTML = id.trim();
        } else {
            @if($language == "vi")
            Swal.fire("Vui lòng chọn một giáo trình.");
            @else
            Swal.fire("Please select a syllabus.");
            @endif
        }
    };

    btnsave.onclick = function() {

        Swal.fire(
            'Updated',
            '',
            'success'
        )
    };

    span.onclick = function() {
        modal.style.display = "none";
    };

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    };

    btndelete.onclick = function() {
        if (Number(id) % 1 == 0) {
            var cf = confirm("Are you sure you want to delete this syllabus.");
            if (cf) {
                idsyl_dl.innerHTML = id.trim();
                let timerInterval
                Swal.fire({
                    title: 'Auto close alert!',
                    html: 'I will delete in <strong></strong> seconds.',
                    timer: 500,
                    onBeforeOpen: () => {
                        Swal.showLoading()
                        timerInterval = setInterval(() => {
                            Swal.getContent().querySelector('strong')
                                .textContent = Swal.getTimerLeft()
                        }, 100)
                    },
                    onClose: () => {
                        clearInterval(timerInterval)
                    }
                }).then((result) => {
                    if (
                        // Read more about handling dismissals
                        result.dismiss === Swal.DismissReason.timer
                    ) {
                        console.log('I was closed by the timer')
                    }
                })
            }
        } else {
            @if($language == "vi")
            Swal.fire("Vui lòng chọn một giáo trình.");
            @else
            Swal.fire("Please select a syllabus.");
            @endif

        }
    };

    btnexport.onclick = function() {
        if (Number(id) % 1 == 0) {
            var cf = confirm("Are you sure you want to export this syllabus.");
            if (cf) {
                idsyl_ep.innerHTML = id.trim();
                let timerInterval
                Swal.fire({
                    title: 'Auto close alert!',
                    html: 'I will export in <strong></strong> seconds.',
                    timer: 1000,
                    onBeforeOpen: () => {
                        Swal.showLoading()
                        timerInterval = setInterval(() => {
                            Swal.getContent().querySelector('strong')
                                .textContent = Swal.getTimerLeft()
                        }, 100)
                    },
                    onClose: () => {
                        clearInterval(timerInterval)
                    }
                }).then((result) => {
                    if (
                        // Read more about handling dismissals
                        result.dismiss === Swal.DismissReason.timer
                    ) {
                        console.log('I was closed by the timer')
                    }
                })
            }
        } else {

            @if($language == "vi")
            Swal.fire("Vui lòng chọn một giáo trình.");
            @else
            Swal.fire("Please select a syllabus.");
            @endif
        }
    };
</script>

</html>
