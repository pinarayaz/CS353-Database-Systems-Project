<?php
include "config.php";
 if(isset($_POST['submit_but'])){

$uname = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];


 if ($uname != "" && $password != "" && $email != "" ){

        //$uname=strtolower($uname);
        //does it exists in the database

 		$sql_check = "select count(*) as cntUser from general_user where lower(username)='".$uname."'";

 		 $result = mysqli_query($con,$sql_check);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count == 0){


 		$id=0;
        $sql_query = "insert into general_user (id, password, email, username) VALUES ( '".$id."',
        	'".$password."',  '".$email."' , '".$uname."' )";

        $result = mysqli_query($con,$sql_query);

        //added to general now add to user
        $sql_User = "select id as choose from general_user where username='".$uname."'";

        $result1 = mysqli_query($con,$sql_User);
        $row1 = mysqli_fetch_array($result1);

        //id
        $count1 = $row1['choose'];
        //echo $count1;
        //insert to user
        $sql_query2 = "insert into editor (id) VALUES ('".$count1."' )";
   $result2 = mysqli_query($con,$sql_query2);
 		header('Location: login.php');
 	}
 	else {
      		echo '<script language="javascript">alert("Already Registered")</script>';
      
      }
      }
      
}
       
?>


<!DOCTYPE html>
<html lang="en">

<head>
   <title>CodeInt - Editor Sign Up</title>
</head>

<body>
    <div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Editor Registration</h2>
                    <form method="POST">
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="UserName" name="username">
                        </div>
                      
                        <div class="input-group">
                            <input class="input--style-3" type="email" placeholder="Email" name="email">
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="password" placeholder="Password" name="password">
                        </div>

                        <div class="p-t-10">

                       <input type="submit" class="btn btn--pill btn--green" id="submit_but" 
            		name = "submit_but" value= "SIGN UP"/>

                           
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>



</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
<style >
	
/* ==========================================================================
   #FONT
   ========================================================================== */
/*//////////////////////////////////////////////////////////////////
[ FONT ]*/

@font-face {
  font-family: Poppins-Regular;
  src: url('../fonts/poppins/Poppins-Regular.ttf'); 
}

@font-face {
  font-family: Poppins-Medium;
  src: url('../fonts/poppins/Poppins-Medium.ttf'); 
}

@font-face {
  font-family: Poppins-Bold;
  src: url('../fonts/poppins/Poppins-Bold.ttf'); 
}

@font-face {
  font-family: Poppins-SemiBold;
  src: url('../fonts/poppins/Poppins-SemiBold.ttf'); 
}




/*//////////////////////////////////////////////////////////////////
[ RESTYLE TAG ]*/

/* ==========================================================================
   #GRID
   ========================================================================== */
.row {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-flex-wrap: wrap;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
}

.row-space {
  -webkit-box-pack: justify;
  -webkit-justify-content: space-between;
  -moz-box-pack: justify;
  -ms-flex-pack: justify;
  justify-content: space-between;
}

.col-2 {
  width: -webkit-calc((100% - 60px) / 2);
  width: -moz-calc((100% - 60px) / 2);
  width: calc((100% - 60px) / 2);
}

@media (max-width: 767px) {
  .col-2 {
    width: 100%;
  }
}

/* ==========================================================================
   #BOX-SIZING
   ========================================================================== */
/**
 * More sensible default box-sizing:
 * css-tricks.com/inheriting-box-sizing-probably-slightly-better-best-practice
 */
html {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

* {
  padding: 0;
  margin: 0;
}

*, *:before, *:after {
  -webkit-box-sizing: inherit;
  -moz-box-sizing: inherit;
  box-sizing: inherit;
}

/* ==========================================================================
   #RESET
   ========================================================================== */
/**
 * A very simple reset that sits on top of Normalize.css.
 */
body,
h1, h2, h3, h4, h5, h6,
blockquote, p, pre,
dl, dd, ol, ul,
figure,
hr,
fieldset, legend {
  margin: 0;
  padding: 0;
}

/**
 * Remove trailing margins from nested lists.
 */
li > ol,
li > ul {
  margin-bottom: 0;
}

/**
 * Remove default table spacing.
 */
table {
  border-collapse: collapse;
  border-spacing: 0;
}

/**
 * 1. Reset Chrome and Firefox behaviour which sets a `min-width: min-content;`
 *    on fieldsets.
 */
fieldset {
  min-width: 0;
  /* [1] */
  border: 0;
}

button {
  outline: none;
  background: none;
  border: none;
}

/* ==========================================================================
   #PAGE WRAPPER
   ========================================================================== */
.page-wrapper {
  min-height: 100vh;
}

body {
	font-family: Poppins-Regular, sans-serif;
  font-weight: 400;
  font-size: 14px;
}

h1, h2, h3, h4, h5, h6 {
  font-weight: 400;
}

h1 {
  font-size: 36px;
}

h2 {
  font-size: 30px;
}

h3 {
  font-size: 24px;
}

h4 {
  font-size: 18px;
}

h5 {
  font-size: 15px;
}

h6 {
  font-size: 13px;
}

/* ==========================================================================
   #BACKGROUND
   ========================================================================== */
.bg-blue {
  background: #2c6ed5;
}

.bg-red {
  background: #fa4251;
}

.bg-gra-01 {
  background: -webkit-gradient(linear, left bottom, left top, from(#fbc2eb), to(#a18cd1));
  background: -webkit-linear-gradient(bottom, #fbc2eb 0%, #a18cd1 100%);
  background: -moz-linear-gradient(bottom, #fbc2eb 0%, #a18cd1 100%);
  background: -o-linear-gradient(bottom, #fbc2eb 0%, #a18cd1 100%);
  background: linear-gradient(to top, #fbc2eb 0%, #a18cd1 100%);
}

/* ==========================================================================
   #SPACING
   ========================================================================== */
.p-t-100 {
  padding-top: 100px;
}

.p-t-180 {
  padding-top: 180px;
}

.p-t-20 {
  padding-top: 20px;
}

.p-t-10 {
  padding-top: 10px;
}

.p-t-30 {
  padding-top: 30px;
}

.p-b-100 {
  padding-bottom: 100px;
}

/* ==========================================================================
   #WRAPPER
   ========================================================================== */
.wrapper {
  margin: 0 auto;
}

.wrapper--w960 {
  max-width: 960px;
}

.wrapper--w780 {
  max-width: 780px;
}

.wrapper--w680 {
  max-width: 680px;
}

/* ==========================================================================
   #BUTTON
   ========================================================================== */
.btn {
  display: inline-block;
  line-height: 40px;
  padding: 0 33px;
 	font-family: Poppins-Regular, sans-serif;
  cursor: pointer;
  color: #fff;
  -webkit-transition: all 0.4s ease;
  -o-transition: all 0.4s ease;
  -moz-transition: all 0.4s ease;
  transition: all 0.4s ease;
  font-size: 18px;
}

.btn--radius {
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
}

.btn--pill {
  -webkit-border-radius: 20px;
  -moz-border-radius: 20px;
  border-radius: 20px;
}

.btn--green {
  background: #AE13AE;
}

.btn--green:hover {
  background: #	#660066;
}


/* ==========================================================================
   #FORM
   ========================================================================== */
input {
  outline: none;
  margin: 0;
  border: none;
  -webkit-box-shadow: none;
  -moz-box-shadow: none;
  box-shadow: none;
  width: 100%;
  font-size: 14px;
  font-family: inherit;
}

.input-icon {
  position: absolute;
  font-size: 18px;
  color: #ccc;
  right: 8px;
  top: 50%;
  -webkit-transform: translateY(-50%);
  -moz-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  -o-transform: translateY(-50%);
  transform: translateY(-50%);
  cursor: pointer;
}

.input-group {
  position: relative;
  margin-bottom: 33px;
  border-bottom: 1px solid rgba(255, 255, 255, 0.2);
}

.input--style-3 {
  padding: 5px 0;
  font-size: 16px;
  color: #ccc;
  background: transparent;
}

.input--style-3::-webkit-input-placeholder {
  /* WebKit, Blink, Edge */
  color: #ccc;
}

.input--style-3:-moz-placeholder {
  /* Mozilla Firefox 4 to 18 */
  color: #ccc;
  opacity: 1;
}

.input--style-3::-moz-placeholder {
  /* Mozilla Firefox 19+ */
  color: #ccc;
  opacity: 1;
}

.input--style-3:-ms-input-placeholder {
  /* Internet Explorer 10-11 */
  color: #ccc;
}

.input--style-3:-ms-input-placeholder {
  /* Microsoft Edge */
  color: #ccc;
}



/* ==========================================================================
   #TITLE
   ========================================================================== */
.title {
  font-size: 24px;
  color: #fff;
  font-weight: 400;
  margin-bottom: 36px;
}

/* ==========================================================================
   #CARD
   ========================================================================== */
.card {
  overflow: hidden;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
  background: #fff;
}

.card-3 {
  background: #000;
  -webkit-border-radius: 10px;
  -moz-border-radius: 10px;
  border-radius: 10px;
  -webkit-box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
  -moz-box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
  box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
  width: 100%;
  display: table;
}

.card-3 .card-heading {
  background: url("images/editor.png") 
  center /cover no-repeat;
  display: table-cell;
  width: 50%;
}

.card-3 .card-body {
  padding: 57px 65px;
  padding-bottom: 65px;
  display: table-cell;
}

@media (max-width: 767px) {
  .card-3 {
    display: block;
  }
  .card-3 .card-heading {
    display: block;
    width: 100%;
    padding-top: 400px;
    background-position: center center;
  }
  .card-3 .card-body {
    display: block;
    width: 100%;
    padding: 37px 30px;
    padding-bottom: 45px;
  }
}



</style>
