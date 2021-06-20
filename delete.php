<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
#myDIV {
  width: 100%;
  padding: 50px 0;
  text-align: center;
  background-color: lightblue;
  margin-top: 20px;
}

#myDIV-2 {
  width: 100%;
  padding: 50px 0;
  text-align: center;
  background-color: lightblue;
  margin-top: 20px;
}

#myDIV-3 {
  width: 100%;
  padding: 50px 0;
  text-align: center;
  background-color: lightblue;
  margin-top: 20px;
}
</style>
</head>
<body onload="myFunction()">



<button onclick="myFunction()">Requests</button>
<button onclick="myFunction2()">Add</button>
<button onclick="myFunction3()">Delete</button>

<div id="myDIV">
Requests page content here
</div>

<div id="myDIV-2">
Add doctor content here
</div>

<div id="myDIV-3">
Delete doctor content here
</div>



<script>
function myFunction() {
  var x = document.getElementById("myDIV");
  var y = document.getElementById("myDIV-2");
  var z = document.getElementById("myDIV-3");
  y.style.display = "none";
  z.style.display ="none";
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {

  }
}

function myFunction2() {
  var x = document.getElementById("myDIV-2");
  var y = document.getElementById("myDIV");
  var z = document.getElementById("myDIV-3");
  y.style.display ="none";
  z.style.display ="none";
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {

  }
}

function myFunction3() {
  var x = document.getElementById("myDIV-3");
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

</body>
</html>
