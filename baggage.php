<?php
//$mobile= 8130243675;
//var a =10;
$a = 1;
$b = 1111;
$b = $b-$a;
$message="OTP: str($b)";
$a=$a+1;
//samar
//$json = json_decode(file_get_contents("https://smsapi.engineeringtgr.com/send/?Mobile=8130243675&Password=S9232Q&Message=".urlencode($message)."&To=".$_GET['contacts']."&Key=sammaDixw9aMYv8RSd5h01") ,true);

//bhawna
$json = json_decode(file_get_contents("https://smsapi.engineeringtgr.com/send/?Mobile=9958190901&Password=T7845M&Message=".urlencode($message)."&To=".$_GET['contacts']."&Key=sammaOSTjf02GnLc6s7gi9wlArPvhH") ,true);
//Divyansh
//$json = json_decode(file_get_contents("https://smsapi.engineeringtgr.com/send/?Mobile=9999787021&Password=E4333P&Message=".urlencode($message)."&To=".urlencode($mobile)."&Key=divyawRvPZ9JNX5UC4i10") ,true);
if ($json["status"]==="success") {
    echo $json["msg"];
    //your code when send success
}else{
    echo $json["msg"];
    //your code when not send
}
?>
<html>
<head>
    <title> Luggage Tracking </title>
    <link rel="stylesheet" type="text/css" href="style.css"> 
    <script src="https://www.gstatic.com/firebasejs/7.16.0/firebase-app.js"></script>

<script src="https://www.gstatic.com/firebasejs/7.16.0/firebase-database.js"></script>

<script src="https://www.gstatic.com/firebasejs/7.16.0/firebase-storage.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.16.0/firebase-analytics.js"></script>


<script>
  // Your web app's Firebase configuration
  var firebaseConfig = {
    apiKey: "AIzaSyDRuhWOjlnrYTbpmNGMHQQfWSLBJi8bv94",
    authDomain: "airport-iot.firebaseapp.com",
    databaseURL: "https://airport-iot.firebaseio.com",
    projectId: "airport-iot",
    storageBucket: "airport-iot.appspot.com",
    messagingSenderId: "916496017920",
    appId: "1:916496017920:web:7318d38c84d3fdfe1d86e5",
    measurementId: "G-9PH57XQ2XS"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  firebase.analytics();
</script>  
</head>
    <body>
    <div class="login-box">
    <img src="logo2.png" class="avatar">
        <h1>WELCOME TO LUGGAGE TRACKING PORTAL</h1>
            <form>
            <p>PNR:</p>
            <input type="text" name="username" placeholder="Enter PNR">
            <p>RFID:</p>
            <input type="text" name="RFID" placeholder="Enter RFID">
            
            <p>Flight Details:</p>
            <input type="text" name="Flight Details" placeholder="Enter Details">

            <p>Contact Number:</p>
            <input type="text" name="Contact Number" placeholder="Enter Number">

            <p>Exit Security?</p>
            <button class="button"  type="submit" value="Yes" onclick="return writeUserData();" id="security">YES</button>
           

            <!-- <input type="submit" name="submit" value="Login">
            <a href="#">Forget Password</a>    
            </form>
         -->
        <BR>

         <button class="button" type="submit" value="Save" onclick="save_user();" id="save"><B>SUBMIT</B></button>


         <button class="button" value="Update" onclick="update_user();" id="update"><B>UPDATE</B></button>

         <button class="button" value="Delete" onclick="delete_user();" id="delete"><B>DELETE</B></button>



        </div>

        <script>
            var a=1;
            var b=1111;
            b=b-a
            otp=  b;
            a=a+1;
            var t;
           function put(){
           
                var Ref = firebase.database().ref('current scan/');
                Ref.on('value', function(snapshot) {
                   t = snapshot.val();
                });
             document.getElementById('user_name').value= t;
             return false;
             }
           
           
             var tblUsers = document.getElementById('tbl_users_list');
            var databaseRef = firebase.database().ref('users/');
            var s_databaseRef = firebase.database().ref('Security/');
            var c_databaseRef = firebase.database().ref('Codes/');
            var rowIndex = 1;
           
             databaseRef.once('value', function(snapshot) {
               snapshot.forEach(function(childSnapshot) {
              var childKey = childSnapshot.key;
             var childData = childSnapshot.val();
           //  var childNo. = childSnapshot.val();
           
              //var row = tblUsers.insertRow(rowIndex);
             // var cellId = row.insertCell(0);
             // var cellName = row.insertCell(1);
             // cellId.appendChild(document.createTextNode(childKey));
              //cellName.appendChild(document.createTextNode(childData.user_name));
           
              //rowIndex = rowIndex + 1;
               });
             });
             function myFunction() {
             var btn = document.createElement("input");
             btn.setAttribute("name", "Rfid2");
             var foo= document.getElementById("user_name");
             foo.appendChild(btn);
           
           
           //  return false;
           }
             function writeUserData() {
           
               //myFunction();
               //var sid = firebase.database().ref().child('Security').push();
             var secure = document.getElementById("security").value;
             var sec = document.getElementById('user_name').value;
           
             //var x="YO 89 00 PP";
             firebase.database().ref(sec).set(
             //[x]: sec
             otp
           );
           return false;
           }
           
           
             function save_user(){
             /*  var sid = firebase.database().ref().child('Security').push();
               var secure = document.getElementById("security").value;
           
           
           
               //document.write(secure);
              if(secure== "Yes")
             {
                 var sid = firebase.database().ref().child('Security').push();
                 var user_name = document.getElementById('user_name').value;
                 var s_data= {
                   Rfid: user_name
                }
                 var s_update = {};
                 s_update['/Security/'] = s_data;
                 firebase.database().ref().update(s_data);
             }*/
           
           
             var y= document.getElementById("user_id").value;
             //var z= document.getElementById("user_id").value;
             firebase.database().ref('Codes/'+y).set(
               //[y]: otp
               otp
            );
           /*var post_data =
           {
             [y]:otp
           };
           var new_key = firebase.database().ref().child('Codes').push().key;
           var ui ={};*/
           //ui['/Codes'] = post_data;
            //firebase.database().ref().update(ui);
            //firebase.database().ref().child('Codes').push(post_data);
            //c_databaseRef.push(post_data);
              var user_name = document.getElementById('user_name').value;
           
              var uid = firebase.database().ref().child('users').push();
              //var uid =
              var pnr= document.getElementById('user_id').value;
           
             var Contact= document.getElementById('contact').value;
           
             var flight = document.getElementById('flight').value;
             var checkin = firebase.database().ref('Tag/');
             var string = "Check-in Storage";
             firebase.database().ref('Tag/'+user_name).set(
               //[y]: otp
               string
            );
           
           
           //var otp=  Math.floor(Math.random() * (+max - +min)) + +min;
           
           //otp= 1235;
           //document.write("Random Number Generated : " + random );
           
              var data = {
               Pnr: pnr,
               Rfid : user_name,
               flight: flight,
               otp: otp,
           contact: Contact
           
           
              }
              uid= pnr;
           
              var updates = {};
              updates['/users/'+ pnr] = data;
              firebase.database().ref().update(updates);
           
              alert('The user is created successfully!');
              reload_page();
             }
           
             function update_user(){
              var Rfid = document.getElementById('user_name').value;
              var Pnr = document.getElementById('user_id').value;
              //var contact= document.getElementById('contact').value;
           
              var data = {
               Pnr: Pnr,
               Rfid: Rfid,
           
              }
           
              var updates = {};
              updates['/users/' + Pnr] = data;
              firebase.database().ref().update(updates);
           
              alert('The user is updated successfully!');
           
              reload_page();
             }
           
           
           
           
             function delete_user(){
              var Pnr = document.getElementById('user_id').value;
           
              firebase.database().ref().child('/users/' + Pnr).remove();
              alert('The user is deleted successfully!');
              reload_page();
             }
           
             function reload_page(){
              window.location.reload();
             }
           
            </script>
    
    </body>
</html>