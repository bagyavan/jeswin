<?php
include('adminheader.php');
 ?>


 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Admin Home</title>


     <link rel="stylesheet" href="../style.css">
     <link rel="stylesheet" href="adminstyle.css">


   </head>

   <body>
     <section>
       <div class="alert-msg-success">
         <?php
           if (isset($_SESSION['login'])) {
             echo $_SESSION['login'];
             unset($_SESSION['login']);
           }
          ?>
       </div>
     <div class="wrapper-admin">

       <div class="square-box">
         <li> <a href="#" onclick="myFunction()">Requests  </a> </li>
       </div>
       <div class="square-box">
         <li> <a href="#" onclick="myFunction2()">Add Doctor  </a> </li>
       </div>

       <div class="square-box">
         <li> <a href="#" onclick="myFunction4()">Add Specialisation  </a> </li>
       </div>
       <div class="square-box">
         <li> <a href="adminmore.php" >More..</a> </li>
       </div>


       <script>

        function pageloader(){
          var str= window.location.href
          var url = new URL(str);
          var param = url.searchParams.get("section");

          switch (param) {
            case null:
                    myFunction();

              break;

            case "specialisation":
                    myFunction4();
                break;
            case "add_doc":
                    myFunction2();
              break;


            default:

          }
        }

       function myFunction() {
         var x = document.getElementById("myDIV");
         var y = document.getElementById("myDIV-2");

         var a = document.getElementById("myDIV-4");
         y.style.display = "none";

         a.style.display="none";
         if (x.style.display === "none") {
           x.style.display = "block";
         } else {

         }
       }

       function myFunction2() {
         var x = document.getElementById("myDIV-2");
         var y = document.getElementById("myDIV");

         var a = document.getElementById("myDIV-4");
         y.style.display ="none";

         a.style.display="none";
         if (x.style.display === "none") {
           x.style.display = "block";
         } else {

         }
       }

    

       function myFunction4() {
         var x = document.getElementById("myDIV-4");
         var y = document.getElementById("myDIV");
         var z = document.getElementById("myDIV-2");

         y.style.display ="none";
         z.style.display ="none";

         if (x.style.display === "none") {
           x.style.display = "block";
         } else {

         }
       }
       </script>

     </div>


     </section>

     <div id="myDIV" class="request-contents">
     <?php

      include('adminmodules/requests.php');


      ?>


     </div>

     <div id="myDIV-2" class="add-doctor-contents">
       <?php
        include('adminmodules/add_doc.php');

        ?>
     </div>



<!--Speciality contents starts here -->

     <div id="myDIV-4" class="spec-doctor-contents">

       <?php
        include('adminmodules/add_spl.php');

        ?>



     </div>
<!--Speciality contents ends here -->

   </body>

   <script>
   pageloader();

   </script>
 </html>
