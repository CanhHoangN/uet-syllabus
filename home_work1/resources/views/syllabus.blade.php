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

    <link rel="stylesheet" href="{{asset('css/frontend_css/syllabus.css')}}">
    <link rel="stylesheet" href="{{asset('css/frontend_css/syllabustest.css')}}">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="name">
                List Syllabuses
            </div>
            <div class="btn-group">
                <button type="button" class="btn" id="edit">Edit</button>
                <div id="myModal" class="modal">
                    <!-- Modal content -->
                    <form action="{!! url('edit') !!}" method="post" enctype="multipart/form-data">
                        <!-- form Begin -->
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2>Edit</h2>
                                <span class="close">&times;</span>
                            </div>
                            <div class="copy-ilo">
                                <div class="bg-success text-light">
                                    <p>Intended Learning Outcomes</p>
                                </div>
                                <textarea name="_ilo" style="width: 100%; height: 5em" id="replace_ilo"></textarea>
                            </div>
                            <div class="copy-oba">
                                <div class="bg-info text-light">
                                    <p>Outcome-based Assessment</p>
                                </div>
                                <textarea name="_oba" style="width: 100%; height: 5em" id="replace_oba"></textarea>
                            </div>
                            <div class="copy-tla">
                                <div class="bg-danger text-light">
                                    <p>Teaching and Learning Activities</p>
                                </div>
                                <textarea name="_tla" style="width: 100%; height: 5em" id="replace_tla"></textarea>
                            </div>
                            <textarea name="idsyl" style="display:none" id='idsyllabus'></textarea>
                            <div class="modal-footer">
                                <input type="submit" id="save" value="Save">
                            </div>
                        </div>
                    </form>

                </div>

                <form action="{!! url('delete') !!}" id="formdl" method="post" enctype="multipart/form-data">
                    <!-- form Begin -->
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                    <textarea name="idsyl_dl" style="display:none; height: 0px; width: 0px" id='idsyllabus_dl' required></textarea>
                    <input type="submit" id="delete" value="Delete">
                </form>

                <input type="submit" id="Home" value="Home">
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
                <div class="head">
                    Intended Learning Outcomes
                </div>
                <div class="text-copy-ilo" id="ilo">
                    @if($firstSyllabus->intended == null)
                    <i>Danh sách rỗng</i>
                    @else
                    <?php
                    $arr = (explode("\r\n", $firstSyllabus->intended));
                    foreach ($arr as $el) {
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
                <div class="head">
                    Teaching and Learning
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

                for (var i in data.intended) {
                    if (data.intended[i] != "\n") {
                        $(".text-copy-ilo").append(data.intended[i]);
                    } else {
                        $(".text-copy-ilo").append("<br>");
                    }


                }
                //--------------------------------------------------------
                if (data.OutcomeBased == null) {
                    $(".text-copy-oba").append("<i>" + "Danh sách rỗng");
                }
                for (var i in data.OutcomeBased) {

                    if (data.OutcomeBased[i] != "\n") {
                        $(".text-copy-oba").append(data.OutcomeBased[i]);
                    } else {
                        $(".text-copy-oba").append("<br>");
                    }


                }
                //--------------------------------------------------------------
                if (data.Teaching == null) {
                    $(".text-copy-tla").append("<i>" + "Danh sách rỗng");
                }
                for (var i in data.Teaching) {

                    if (data.Teaching[i] != "\n") {
                        $(".text-copy-tla").append(data.Teaching[i]);
                    } else {
                        $(".text-copy-tla").append("<br>");
                    }


                }
            });

        });



    });
</script>
<script>
    var modal = document.getElementById("myModal");

    var btn = document.getElementById("edit");

    var span = document.getElementsByClassName("close")[0];

    var _ilo = document.getElementById("ilo");
    var _oba = document.getElementById("oba");
    var _tla = document.getElementById("tla");

    var idsyl = document.getElementById("idsyllabus");

    var replace = document.getElementById("replace_ilo");
    var replace1 = document.getElementById("replace_oba");
    var replace2 = document.getElementById("replace_tla");

    var btnsave = document.getElementById("save");

    var btndelete = document.getElementById("delete");
    var idsyl_dl = document.getElementById("idsyllabus_dl");
    var id;
    $("li a").click(function() {
        id = $(this).attr('id');
    });

    btn.onclick = function() {
        if (Number(id) % 1 == 0) {
            modal.style.display = "block";
            replace.innerHTML = _ilo.innerHTML.replace(/<br>/g, '\n').replace('<i>Danh sách rỗng</i>', '').trim();
            replace1.innerHTML = _oba.innerHTML.replace(/<br>/g, '\n').replace('<i>Danh sách rỗng</i>', '').trim();
            replace2.innerHTML = _tla.innerHTML.replace(/<br>/g, '\n').replace('<i>Danh sách rỗng</i>', '').trim();
            idsyl.innerHTML = id.trim();
        } else {
            Swal.fire("Please select a syllabus.");
        }
    }

    btnsave.onclick = function() {
        Swal.fire(
            'Updated',
            '',
            'success'
        )
    }

    span.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    btndelete.onclick = function() {
        if (Number(id) % 1 == 0) {
            idsyl_dl.innerHTML = id.trim();
            var cf = confirm("Are you sure you want to delete this syllabus.");
            if (cf) {
                let timerInterval
                Swal.fire({
                    title: 'Auto close alert!',
                    html: 'I will close in <strong></strong> seconds.',
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
            Swal.fire("Please select a syllabus.");
        }
    }
</script>

</html>