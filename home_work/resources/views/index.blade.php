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
                            <button class="btn-primary">ILO</button>
                            <button class="btn-primary">OBA</button>
                            <button class="btn-primary">TLA</button>
                        </div>
                    </div>
                    <div class="row top-left">
                        <div class="col-sm-12">
                            <div class="text">
                                <div class="text-primary" style="font-size: 15px">
                                    Bloom's Taxonomy of Cognitive Outcomes
                                </div>
                            </div>
                            <ul>
                                <li><a href="#">Level 6:Creating</a></li>
                                <li><a href="#">Level 5:Evaluating</a></li>
                                <li><a href="#">Level 4:Analysing</a></li>
                                <li><a href="#">Level 3:Applying</a></li>
                                <li><a href="#">Level 2:Understanding</a></li>
                                <li><a href="#">Level 1:Remembering</a></li>
                            </ul>
                            <div class="text" style="font-size: 10px">
                                <div class="text-light">Level 1:After class or programs, learner will be able to:</div>
                                <div class="text-light">Retrieve relevant knowledge from long-term memory</div>
                            </div>
                        </div>
                    </div>
                    <div class="row bottom-left">
                        <div class="col-sm-5">
                                <div class="text">
                                    <p class="text-primary" style="font-size: 15px">Action verbs for ILO statements</p>
                                    <i class="text-light">Select and click on the action verbs for your ILO statement</i>
                                </div>
                                <select class="custom-select" multiple size="6" style="width: 120px">
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                    <option value="3">Three</option>
                                    <option value="3">Three</option>

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
                        <textarea style="margin-top: -15px" class="bg-info" name="text-box-value"></textarea>
                    </div>
                    
                    <div class="outcome">
                        <div class="bg-danger">
                            Outcome-based Assessment
                            <span class="click-outcome"><i  class="fas fa-angle-down"></i></span>
                            <div class="before-click-outcome">
                                <textarea class="bg-danger out-text"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="teaching">
                        <div class="bg-success">
                            Teaching and Learning
                            <span class="click-teaching"><i class="fas fa-angle-down"></i></span>
                            <div class="before-click-teaching">
                                <textarea class="bg-success teach-text"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>
</html>
