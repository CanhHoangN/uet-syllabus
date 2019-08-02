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

    <link rel="stylesheet" href="{{asset('css/backend_css/syllabus.css')}}">
    <link rel="stylesheet" href="{{asset('css/backend_css/syllabustest.css')}}">
</head>

<body style="    background: linear-gradient(to right, #2C5364, #203A43, #0F2027);" >

<div class="container-fluid" style="background: linear-gradient(to right, #2C5364, #203A43, #0F2027);">
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
</body>
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
            Swal.fire("Please select a syllabus.");
        }
    }

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
            Swal.fire("Please select a syllabus.");
        }
    }
</script>
</html>