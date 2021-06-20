<?php
include('navbarmain.php');

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Register Now</title>
<link rel="stylesheet" href="style.css">
<script type="text/javascript">
function myname()
 {
 var n=document.getElementById("fname");
 var letter=/^[A-Za-z]+$/;
 if(n.value == "")
 {
   document.getElementById("consid").innerHTML = "<span>Please enter a valid name</span>";
       //txt1.focus();
       return false;
 }
 else if(!n.value.match(letter))
 {
   document.getElementById("consid").innerHTML = "<span class='error'>This is not a valid name. Please try again</span>";
      document.getElementById("fname").value="";
       return false;
 }
 else if(n.value.match(letter))
 {
     document.getElementById("consid").innerHTML = "<span class='error'></span>";
     return true;
 }
 }

 function lname1()
  {
  var n=document.getElementById("lname");
  var letter=/^[A-Za-z]+$/;
  if(n.value == "")
  {
    document.getElementById("consid").innerHTML = "<span>Please enter a valid name</span>";
        //txt1.focus();
        return false;
  }
  else if(!n.value.match(letter))
  {
    document.getElementById("consid1").innerHTML = "<span class='error'>This is not a valid name. Please try again</span>";
       document.getElementById("lname").value="";
        return false;
  }
  else if(n.value.match(letter))
  {
      document.getElementById("consid1").innerHTML = "<span class='error'></span>";
      return true;
  }
  }

  function myemail()
  {
  var n=document.getElementById("email");
  var e=/\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  if(n.value == "")
  {
    document.getElementById("consid2").innerHTML = "<span class='error'>Please enter a valid email Address</span>";
    //inputEmail.focus();
        return false;
  }
  else if(!n.value.match(e))
  {
    document.getElementById("consid2").innerHTML = "<span class='error'>This is not a valid email address. Please try again :</span>";
    //inputEmail.focus();
    //document.getElementById("inputEmail").value="";
        return false;
  }
  else if(n.value.match(e))
    {
      document.getElementById("consid2").innerHTML = "<span class='Success'></span>";

          return true;
    }
  }
  function myphno()
  {
  var n4=document.getElementById("phno");
  var p=/^([789][0-9]{9})+$/;
  if(n4.value == "")
  {
    document.getElementById("consid3").innerHTML = "<span class='error'>Please enter a valid Phone number</span>";
    //phno.focus();
        return false;
  }
  if(!n4.value.match(p))
  {
  document.getElementById("consid3").innerHTML = "<span class='error'>This is not a valid Phone number. Please try again</span>";
  document.getElementById("phno").value="";
      return false;
  }
  else if(n4.value.match(p))
    {
      document.getElementById("consid3").innerHTML = "<span class='error'></span>";
          return true;
    }
  }
  function mypassword()
  {
  var n6=document.getElementById("pwd");
  var ps=/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W]).{6,}/;
  if(n6.value == "")
  {
    document.getElementById("consid4").innerHTML = "<span class='error'>Please enter a valid password</span>";
   // txt7.focus();
        return false;
  }
  if(!n6.value.match(ps))
  {
  document.getElementById("consid4").innerHTML = "<span class='error'>This is not a valid Password. Please try again</span>";
     document.getElementById("pwd").value="";
      return false;
  }
  else if(n6.value.match(ps))
    {
      document.getElementById("consid4").innerHTML = "<span class='error'></span>";
          return false;
    }
  }
  function mycpassword()
  {
  var n7=document.getElementById("pwd");
  var n8=document.getElementById("cpwd");
  //var pc=/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W]).{6,}/;
  if(n8.value == "")
  {
    document.getElementById("consid5").innerHTML = "<span class='error'>Please enter a valid password</span>";
    //txt7.focus();
        return false;
  }
  if(n7.value==n8.value)
  {

  document.getElementById("consid5").innerHTML = "<span class='error'>Password MAtch</span>";
      return false;
  }
  else {
  document.getElementById("consid5").innerHTML = "<span class='error'> Password Missmatch</span>";
  document.getElementById("pwd").value="";
  document.getElementById("cpwd").value="";
     // txt8.focus();
      return false;
  }
  }


</script>

  </head>
  <body>


    <section>
<form action="registeraction.php" method="POST">

      <div class="main-register">
          <p class="sign" align="center">Join Now</p>
          <br>
          <form class="form2">
            <input class="un fname " type="text" id="fname"  name="fname" placeholder="First Name" onblur="myname()" required>
            <span id = "consid"></span>
            <input class="un lname" type="text" id="lname"  name="lname" placeholder="Last Name" onblur="lname1()" required>
            <span id = "consid1"></span>
<div class="clearfix"></div>

            <input class=" un-reg full-field" type="date"  name="dob" placeholder="Enter your Date of Birth" required>
            <input class=" un-reg full-field" type="text"  name="email" id="email" placeholder="Enter your Email Id" onblur="myemail()" >
            <span id="consid2"></span>
            <input class=" un-reg full-field" type="text"  name="mobile" id="phno" placeholder="Enter your Mobile Number" required onblur="myphno()">
            <span id="consid3"></span>

                <div class="un-reg full-field" style="padding:1%; ">


                <input  type="radio"  name="gender" id="male" value="MALE" required >
                <label  for="male">Male</label>

                <input  type="radio"  name="gender" id="female" value="FEMALE" required >
                <label for="male">Female</label>
                </div>






            <input class=" un-reg full-field" type="text"  name="address" placeholder="Enter your Address" required>
            <input class=" un-reg full-field" type="password"  name="password" id="pwd" required placeholder="Set a password" onblur="mypassword()">
            <span id="consid4"></span>
            <input class=" un-reg full-field" type="password" required id="cpwd" name="password" placeholder="Confirm your password" onblur="mycpassword()">
            <span id="consid5"></span>

            <br>
            <input type="submit" name="submit" value="REGISTER" class="submit-reg">
</form>
<br><br>
<div class="terms">
    <span>Already have an account?</span> <a href="login.php">LogIn</a> <br>
  <span>By Signing up, I agree to</span> <a href="#">Terms & Conditions</a>
</div>

          </div>
    </section>
  </body>
</html>

 <?php
include('footer.html');
  ?>
