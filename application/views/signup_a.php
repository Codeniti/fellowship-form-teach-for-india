<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Apply to Teach for India</title>


    <link href=<?php echo SERVER_ROOT . "css/bootstrap.css" ?> rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
              
   
  </head>
  <body style="background-image:url('http://d2edn48kedz4vj.cloudfront.net/img/truthhopev10/11.jpg')">
    <br>
    <br>

    <div class="container">


    <br>
    <div class="container" style="background-color: rgb(255, 255, 255); opacity: 0.95;">
      

      <!--ADD THE FORM CONTENT FROM HERE DOWNWARD-->
      <div class="col-md-12">
      <div class="page-header">
        <h1 style="padding:10px;">Welcome, Amit</h1>
      </div>
      <input type="email" id="email" class="form-control" placeholder="Enter your email">
      <input type="password" id="password" class="form-control" placeholder="Password">
      <input type="password" class="form-control" placeholder="Confirm password">
      <div class="input-group">
        <span>I am a </span>
        <div class="btn-group">
          <button type="button" class="btn btn-default btn-xs">Student</button>
          <button type="button" class="btn btn-default btn-xs">Professional</button>
        </div>
      </div>
      <br>
      <div class="input-group">
        <small>To join the fellowship you must 1) be an Indian Citizen or 2) have or can attain an OCI or PIO Status.
        <br><input type="checkbox"> I understand</small>
      </div>

      <br>
      <br>
      <a id="continue" href="signup_b.html"><p class="btn btn-primary">Continue</p></a>
      <br>
      <br>
    </div>
    

    <!--<div id="myTextDiv">
      <div class="well">
        <div class="page-header">
          <h1>walks to work</h1>
        </div>
        <a href="index2.html">talk a walk >></a>
      </div>
    </div>-->

  </body>

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script>
  $( document ).ready(function() {
      //setTimeout(drop(),5000);
      $(document).on('click', '#continue', function(e) {
          e.preventDefault();
          
          var data = {};
          data.email = $('#email').val();
          data.password = $('#password').val();
          data.signup = true;
          
          $.ajax({
                type: 'POST',
                url: '<?php echo SERVER_ROOT . 'signup' ?>',
                data: data,
                dataType: 'json',
                success: function (data) {
                    
                    console.log(data);
                    
                }
        });
          
      });
    });
  </script>
 
</html>
