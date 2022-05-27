<div id="countdowntimer" style="display:block;"></div>

<script type="text/javascript">
    setInterval(function ()
    {
       timer();
    },1000);
                        function timer(exam_category)
                        {
                            var xmlhttp=new XMLHttpRequest();
                            xmlhttp.onreadystatechange=function()
                            {
                                if(xmlhttp.readyState==4 &&  xmlhttp.status==200)
                                {
                                   
                                   if(xmlhttp.responseText=="00:00:01")
                                   {
                                       window.location="result.php";
                                   }
                                docunent.getElementById("countdowntimer").innerHTML=xmlhttp.responseText;
                            }

                            };
                            xmlhttp.open("GET","forajax/load_timer.php,true);
                            xmlhttp.send(null);
                        }
                    </script>