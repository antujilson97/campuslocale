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
            $date=date ("Y-m-d H:i:s");
            $_SESSION["end_time"]=date("Y-,-d H:i:s", strtotime($date."+$_SESSION[exam_time] minutes"));
            
    ?>

    <div class="row" style="...">
      <div class="col-lg-6 col-lg-push-3" style="...">
<?php
$correct=0;
$wrong=0;

if(isset($_SESSION["answer"]))
{
    for($i=1;$i<=sizeof($_SESSION["answer"]);$i++)
    {
        $answer="";
        $res=mysqli_query($con,"SELECT * from questions where category='$_SESSION[exam_category]' &&question_no=$i");
        while($row=mysqli_fetch_array($res))
        {
          $answer=$row["answer"];
        }
        if(isset($_SESSION["answer"][$i]))
        {
            if($answer==$_SESSION["answer"][$i])
            {
                $correct=$correct+1;
            }
            else{
                $wrong=$wrong+1;
            }
        }
        else{
            $wrong=$wrong+1;
        }
    }

}
$count=0;
$res=mysqli_query($con,"SELECT * from questions where category='$_SESSION[exam_category]'");
$count=mysqli_num_rows($res);
$wrong=$count-$correct;
echo "<br>"; echo "<br>";
echo "<center>";
echo "Total Questions=".$count;
echo "<br>";
echo "Correct Answer=".$correct;
echo "<br>";
echo "Wrong Answer=".$wrong;
echo "<br>";
echo "</center";
?>
</div>
</div>

<?php
if(isset($_SESSION["exam_start"]))
{
    $date=date ("Y-m-d");
    mysqli_query($con,"INSERT into exam_results(id,email,exam_type,total_question,correct_answer,wrong_answer,exam_time)values(NULL,'$_SESSION[email]','$_SESSION[exam_category]','$count','$correct','$wrong','$date')");
}
if(isset($_SESSION["exam_start"]))
{
    unset($_SESSION["exam_start"])
    ?>
    <script type="text/javascript">
        window.location.href= window.location.href;
        </script>
        <?php
}
?>

