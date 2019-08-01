@extends('layouts.admin_layouts.admin_design')
@section('content')
<div id="content">
    <div id="content-header">
        <h2 class="text-center lead">Edit Constrain Label </h2>
        <div class="show-alert">
        </div>
    </div>
    <div id="container" style="padding-left: 20px">
        <div class="top">

            <textarea style="width: 30%" name="nameApp" id="nameApp" rows="2">{{ $lb->nameApp }}</textarea>

        </div>
        <div class="mid">
            <div class="left">
                <div class="l1">

                    <textarea style="width: 80%" name="l1" id="l1" rows="1">{{ $lb->l1 }}</textarea>

                </div>
            </div>
            <div class="right">
                <div class="title">
                    <div class="value">

                        <textarea style="width: 50%" name="title" id="title" rows="1">{{ $lb->title }}</textarea>

                    </div>
                    <div class="desc">
                        <textarea style="width: 80%" name="des" id="des" rows="1">{{ $lb->des }}</textarea>

                    </div>
                </div>
                <div class="r">

                    <textarea style="width: 50%" name="r1" id="r1" rows="1">{{ $lb->r1 }}</textarea>
                </div>
                <div class="r">
                    <textarea style="width: 50%" name="r2" id="r2" rows="1">{{ $lb->r2 }}</textarea>


                </div>
                <div class="r">

                    <textarea style="width: 50%" name="r3" id="r3" rows="1">{{ $lb->r3 }}</textarea>
                </div>
            </div>
        </div>
        <div class="save">
            <button class="btn btn-primary" id="save">save</button>
            <a href="{{asset('/admin/dashboard')}}" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
        </div>
    </div>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            $('#save').click(function(e) {
                e.preventDefault();
                e.stopPropagation();
                var url = '{{url("/admin/editedConstraintLB")}}';
                console.log(url);
                $.ajax({
                    type: 'POST',
                    url: url,
                    dataType: "json",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        nameApp: $('#nameApp').val(),
                        l1: $('#l1').val(),
                        title: $('#title').val(),
                        des: $('#des').val(),
                        r1: $('#r1').val(),
                        r2: $('#r2').val(),
                        r3: $('#r3').val()
                    }
                }).done(function() {
                    alert("Update Successfully!")
                    //window.location.reload();
                    console.log("ok sended");
                });

            });
        });
    </script>

</div>
@endsection