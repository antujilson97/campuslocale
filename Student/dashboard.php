<!---------------- Session starts form here ----------------------->
<?php  
        session_start();
        if (!$_SESSION["LoginStudent"])
        {
            header('location:../login/login.php');
        }
        if($_SESSION['LoginStudent']){
            $_SESSION['LoginAdmin'] = "";
        }
            require_once "../connection/connection.php";
            
    ?>
<!---------------- Session Ends form here ------------------------>
<!doctype html>
<html lang="en">
    <head>
        <title>Campus Locale</title>
    </head>
    <body>
        <?php include('quiz_header.php') ?>
        <?php include('../common/student-sidebar.php') ?>  

        <div class="row" style="">
            <div class="col-lg-6 col-lg-push-3" style="margin-left:300px;margin-top:05px;">
                <!--start editing-->
                <br>
                <div class="row ">
                    <br>
                    <div class="col-lg-2 col-lg-push-10">
                        <div id="current_que" style="float:left">0</div>
                        <div style="float:left">/</div>
                        <div id="total_que" style="float:left">0</div>
                    </div>
                    <div class="row">
                        <div class="col-lg-10 col-lg-push-1" style="min-height:300px; background-color:white" id="load_questions">
                    
                    </div>
                </div>
                <!--end editing-->
            </div>
            <div class="row" style="margiin-top:10px">
                        <div class="col-lg-6 col-lg-push-3" style="min-height:50px" >
                        <div class="col-lg-12 text-center">
                            <input type="button" class="btn btn-default" value="Previous" onclick="load_previous();">&nbsp;
                            <input type="button" class="btn btn-default " value="Next" onclick="load_next();">
                        </div>
    </div>
    </div>


        </div>
        <script type="text/javascript">
                        function set_exam_type_session(exam_category)
                        {
                            var xmlhttp=new XMLHttpRequest();
                            xmlhttp.onreadystatechange=function()
                            {
                                if(xmlhttp.readyState==4 &&  xmlhttp.status==200)
                                {
                                   
                                   document.getElementById("total_que").innerHTML=xmlhttp.responseText;
                                }
                            };
                            xmlhttp.open("GET","forajax/load_total_que.php",true);
                            xmlhttp.send(null);
                        }
                        var question_number="1";
                        load_questions(question_number);

                       function  load_questions(question_number)
                       {
                        document.getElementById("current_que").innerHTML=question_number;
                            var xmlhttp=new XMLHttpRequest();
                            xmlhttp.onreadystatechange=function()
                            {
                                if(xmlhttp.readyState==4 &&  xmlhttp.status==200)
                                {
                                    if(xmlhttp.responseText=="over")
                                    {
                                        window.localion="result.php";

                                    }
                                    else
                                   {
                                   document.getElementById("load_questions").innerHTML=xmlhttp.responseText;
                                   load_total_que();
                                }
                            }
                            };
                            xmlhttp.open("GET","forajax/load_questions.php?question_number="+ question_number,true);
                            xmlhttp.send(null);
                       }
                       function radioclick(radiovalue,question_number)
                       {
                           var xmlhttp=new XMLHttpRequest();
                           xmlhttp.onreadystatechange=function(){
                                if(xmlhttp.readyState==4 &&  xmlhttp.status==200)
                                {
                                   
                            }
                            };
                            xmlhttp.open("GET","forajax/save_answer_in_session.php?question_number="+ question_number,true);
                            xmlhttp.send(null);

                       }

                       
                         function load_previous()
                         {
                             if(question_number=="1")
                             {
                                 load_questions(question_number);
                             }
                             else
                             {
                                 question_number=eval(question_number)-1;
                                 load_questions(question_number);
                             }
                         }
                         function load_next()
                         {
                            question_number=eval(question_number)+1;
                                 load_questions(question_number);
                         }
                    </script> 