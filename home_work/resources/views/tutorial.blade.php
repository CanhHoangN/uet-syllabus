<!doctype html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>Hướng dẫn</title>
</head>
<style>
    body{
        font-family: 'Open Sans', sans-serif;
    }
    h4:before{
        content: "#";
        margin-right: 10px;
        font-size: 28px;
        color: #f4645f;
        opacity: .6;
    }
    h4{
        color: #525252;
        opacity: .8;
    }
    .description{
        font-style: italic;
        margin-bottom: 15px;
        background: hsla(0,0%,93%,.35);
        border-radius: 3px;
        padding: 10px;
        -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.125);
        box-shadow: 0 1px 1px rgba(0,0,0,.125);
    }
    img{
        margin-bottom: 20px;
    }
    .head:before{
        content: "*";
        margin-right: 1px;
        font-size: 28px;
        color: #f4645f;
        opacity: .6;
    }
    .head{
        font-size: 25px;
        color: #525252;
    }

    h5{

    }
    .content{
        margin-left:22px;
    }
    .head-tutorial {

    }

    .underline {
        border-bottom: 1px solid #252525;
        opacity: .3;
    }


    .dir a{
        color:#f4645f;

    }
    .dir:before{
        content: "#";
        margin-right: 10px;
        font-size: 20px;
        color: #f4645f;
        opacity: .6;
    }
    .in-dir a{
        margin-left: 5%;
        color: #f4645f;
    }
    .in-dir a:before{
        content: "#";
        margin-right: 10px;
        font-size: 15px;
        color: #f4645f;
        opacity: .6;
    }
    .head-tutorial h2{
        letter-spacing: 2px;
    }
    .content-tutorial{
        margin-top: 5%;
    }
</style>
<body>
    <div class="container">
        <div class="head-tutorial">
            <h2>Hướng dẫn sử dụng</h2>
            <div class="dir">
                <a href="#login">Đăng nhập, đăng kí tài khoản</a>
                <div class="in-dir">
                    <a href="#register">Đăng kí</a>
                    <br>
                    <a href="#login1">Đăng nhập</a>
                </div>
            </div>
            <div class="dir">
                <a href="#index">Soạn đề cương</a>
            </div>
            <div class="dir">
                <a href="#copy-print">Sao chép,in xuất file pdf</a>
                <div class="in-dir">
                    <a href="#copy">Sao chép</a>
                    <br>
                    <a href="#print">In xuất</a>
                </div>
            </div>
            <div class="dir">
                <a href="#save">Lưu trữ đề cương</a>
            </div>
            <div class="underline">

            </div>
        </div>
        <div class="content-tutorial">
            <div id="#login" class="login">
                <h4>Đăng nhập, đăng kí tài khoản</h4>
                <div class="content">
                    <div id="register" class="register-content">
                        <div class="head">
                            Đăng kí
                        </div>
                        <div class="description">
                            Đăng kí tài khoản để có thể giúp thầy cô lưu trữ, chỉnh sửa đề cương một cách thuận tiện nhất.
                        </div>
                        <p class="register">
                            Đầu tiên thầy hãy chọn "button" với tên "đăng kí" ở phía trên góc phải để có thể đăng kí được tài khoản sử dụng, và nhập theo đúng form đăng kí.
                            <div class="img-register">
                                <img width="450px" src="{{asset('images/register.png')}}" alt="">
                            </div>
                            <p>Sau khi đăng kí thành công thầy cô sẽ được chuyển hướng về trang chủ, và bây giờ thầy cô đã có thể lựa chọn,và soạn đề cương.</p>
                            <p>Lưu ý rằng: Khi đăng kí xong sẽ có 1 mail gửi về để có thể xác nhận được tài khoản.</p>
                            <div class="img-email">
                                <img width="450px" src="{{asset('images/email.png')}}" alt="">
                            </div>


                        </div>
                    </div>

                    <div id="login1" class="login-content">
                        <div class="head">
                            Đăng nhập
                        </div>
                        <div class="description">
                            Đăng nhập tài khoản để lưu trữ, sử dụng các chức năng của website
                        </div>
                        <div class="login">
                            <p>Để đăng nhập thầy cô vui lòng chọn vào "button" với tên "đăng nhập" ở góc trên cùng phía trái</p>
                        </div>
                        <div class="img-login">
                            <img width="450px" src="{{asset('images/login.png')}}" alt="">
                        </div>
                            <p>Sau khi đăng nhập thành công sẽ được chuyển hướng tới trang chủ.</p>
                    </div>
                </div>
            </div>
            <div id="index" class="index">
                <h4>Soạn đề cương</h4>
                <div class="content">
                    <div class="description">
                        Đây là giao diện chính để có thể giúp thầy cô soạn đề cương, ở phía bên trái là các phần mà thầy cô có thể chọn để soạn đề cương
                        với gồm 3 phần chính "ILO","OBA","TLA" tương ứng bên phải là các ô hiện thi kết quả chọn theo thứ tự thứ trên xuống.
                    </div>
                    <div class="img-index">
                        <img width="450px" src="{{asset('images/index.png')}}" alt="">
                    </div>
                    <p>Sau khi soạn xong đề cương thầy cô có thể chọn vào nút "Lưu" ở phần dưới để có thể lưu trữ được đề cương đã soạn, và trước khi lưu lại đề cương
                        thì thầy cô sẽ có bước nhỏ đó là xác nhận lại về đề cương để xem đã đúng với ý mình hay chưa và có một lưu ý nhỏ là tên đề cương lưu trữ sẽ là không được trùng nhau.</p>
                </div>


            </div>
        <div id="copy-print" class="copy-print">
                <h4>Sao chép,in xuất file pdf</h4>
                <div class="content">
                    <div id="copy" class="copy">
                        <div class="head">Sao chép</div>
                        <div class="description">
                            Đây là phần có thể giúp thầy cô sao chép ra những lựa chọn mà mình đã soạn ở đề cương.
                        </div>
                        Thầy cô vui lòng chọn "sao chép" ở phần dưới sau khi chọn sẽ hiện lên nội dụng mà mình đã chọn.
                        <div class="copy-img">
                            <img width="450px" src="{{asset('images/copy.png')}}" alt="">
                        </div>
                    </div>
                    <div id="print" class="print">
                        <div class="head">In xuất</div>
                        <div class="description">
                            Đầy là phần giúp thầy cô in ra được nội dung của đề cương.
                        </div>
                        <p>Thầy cô vui lòng chọn "in" ở phần dưới sau khi chọn sẽ hiện lên nội dụng để chon lựa trước khi muốn in ra.</p>
                        <div class="img-print">
                            <img width="450px" src="{{asset('images/print.png')}}" alt="">
                        </div>
                    </div>
                </div>

            </div>
            <div id="save" class="save">
                <h4>Lưu trữ đề cương</h4>
                <div class="content">
                    <div class="description">
                        Đây là phần giúp thầy cô có thể lưu trữ được những đề cương đã soạn.
                    </div>
                    <p>Thầy cô vui lòng chọn "lưu" ở phần dưới sau khi chọn sẽ hiện lên hội dung, cũng có thể sửa đôỉ trực tiếp trước khi thầy cô xác nhận muốn lưu trữ.</p>
                    <div class="img-save">
                        <img width="450px" src="{{asset('images/save.png')}}" alt="">
                    </div>
                    <p>Thầy cô lưu ý răng là tên của đề cương phải khác nhau.</p>
                </div>

            </div>

        </div>
    </div>
</body>
</html>
