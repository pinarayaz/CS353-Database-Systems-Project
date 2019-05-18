<?php
include "config.php";
$user_id = 3;#$_SESSION["Id"];
$sql = "SELECT contest_id  FROM coding_contest WHERE contest_id =(SELECT max(contest_id) FROM coding_contest)";
                                $result2 = mysqli_query($con, $sql);
                                $row = mysqli_fetch_assoc($result2);
                                $contest_id = implode(",", $row);
                                echo $contest_id;
 $sql = "INSERT INTO contest_user (id, contest_id) VALUES ('".$user_id."', '".$contest_id."')";
        $result = mysqli_query($con, $sql);
      
      echo "hello";
    $view = "CREATE VIEW 'contest_table' as select title as title, question as question, contest_id as contest_id from
   contest_question  Natural JOIN coding_challenge ";
   
     
echo "hello";

    $myview = mysqli_query($con, $view);
      echo $myview;
    $current = "select * from contest_table where contest_id = '".$contest_id."'";

    $final = mysqli_query($con, $current);
    
    while($row = $final->fetch_assoc()) {
        $question = $row["question"];
        echo $question;
        $title = $row["title"];
        echo $title;
        $test_case = $row["test_case"];
    }



if(isset($_POST['save'])){
    if(isset($_POST['answer']) && isset($_POST['pl'])) {
        $answer = $_POST['answer'];
        $pl = $_POST['pl'];
        $sql = "INSERT INTO saved VALUES ('$challenge_id', '$user_id', '$answer')";
        $result = mysqli_query($con, $sql);
        if($result == 1){
            echo "<script type='text/javascript'>alert('Your answer is saved.');</script>";
        }
        else{
            $sql = "DELETE FROM saved WHERE challenge_id = '$challenge_id' AND user_id = '$user_id'";
            $result = mysqli_query($con, $sql);
            $sql = "INSERT INTO saved VALUES ('$challenge_id', '$user_id', '$answer')";
            $result = mysqli_query($con, $sql);
            if($result == 1){
                echo "<script type='text/javascript'>alert('Your new answer is saved.');</script>";
            }
        }
    }
    else{
        echo "Don't leave blank fields.";
    }
}
if(isset($_POST['submit'])){
    if(isset($_POST['answer']) && isset($_POST['pl'])) {
        $answer = $_POST['answer'];
        $pl = $_POST['pl'];
        $sql = "INSERT INTO submit VALUES ('$user_id', '$challenge_id','$pl', '$answer')";
        $result = mysqli_query($con, $sql);
        if($result == 1){
            echo "<script type='text/javascript'>alert('Your answer is submitted.');</script>";
        }
        else{
            $sql = "DELETE FROM submit WHERE challenge_id = '$challenge_id' AND user_id = '$user_id'";
            $result = mysqli_query($con, $sql);
            $sql = "INSERT INTO submit VALUES ('$user_id', '$challenge_id','$pl', '$answer')";
            $result = mysqli_query($con, $sql);
            if($result == 1){
                echo "<script type='text/javascript'>alert('Your new answer is submitted.');</script>";
            }
        }
    }
    else{
        echo "Don't leave blank fields.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="styles/w3.css">
	<title>CodeInt - Solve Challenge</title>
	<style>
	/* width */
	::-webkit-scrollbar {
	  width: 20px;
	}
	/* Track */
	::-webkit-scrollbar-track {
	  box-shadow: inset 0 0 5px grey; 
	  border-radius: 10px;
	}
	 
	/* Handle */
	::-webkit-scrollbar-thumb {
	  background: purple; 
	  border-radius: 10px;
	}
	/* Handle on hover */
	::-webkit-scrollbar-thumb:hover {
	  background: #000; 
	}
	</style>
</head>
<body>
    <div class="w3-container">
        <img src="images/codeint.png" class="w3" style="padding:10px; width:15%; margin: auto;">
    </div>
    

	<div class="w3-container" style="width: 100%; display: inline-block;">
		<p><h2 style="font-weight: bold; text-align: center; width: 100%;"><?php echo $title ?></h2>

		<div class="w3-container" style="display: inline-block; width: 30%; height: 500px;">
			<div style="width: 90%; height: 300px; border: 1px solid grey; margin: 10%; ">Question: <?php echo $question ?> </div>
			<div style="width: 90%; height: 120px; border: 1px solid grey; margin: 10%;">
                <?php
                $sql = "SELECT test_case FROM test_cases WHERE challenge_id = '$challenge_id'";
                $result = mysqli_query($con, $sql);
                if (mysqli_num_rows($result) > 0) {
                    echo "Test Case:";
                    while($row = mysqli_fetch_assoc($result)) {
                        echo " ".$row["test_case"]." ";
                    }
                }
                else {
                    echo "0 test cases";
                }
                ?>
            </div>
		</div>
        <form method = "post" style="width: 40%; height: 500px; text-align: center; padding:10px; margin: auto; display: inline-block; padding-top: 2%; padding-right: 10%;">
            <select name="pl">
                <option hidden selected disabled=>Programming Languages</option>
                <option value="Java">Java</option>
                <option value="C++">C++</option>
            </select>
            <br> <br>
            <input class="w3-input w3-border" style="height: 80%; width: 130%;" name="answer" type="text" id="answer">
            <input class="w3-button w3-purple w3-round-large" type="submit" name = "submit" value = "Submit">   
        </form>




    </div>
</body>
</html>