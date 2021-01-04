<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
    <style>
        #login1{
            display:none;
            
        }
        .col1{
            
            border:ridge;
            
            padding-bottom:20px;
        }
        .r1{
            padding-top:10%;
        }
    </style>
</head>
<body>
    
    <div class="row r1">
    <div class="col-sm-5">
    </div>
    <div class="col-sm-3 col1">
    <h3 class="text-center text-muted">Login</h3>
    <form id="login">
    
    <input type="email" name="email" class="form-control" placeholder="enter email address" id="email">
    <br>
    <input type="submit" name="submit" value="send otp" class="form-control btn btn-danger">
    </form>
    <form id="login1">
    
    <input type="otp" name="otp" class="form-control" placeholder="enter otp" id="otp">
    <br>
    <input type="submit" name="submit" value="verify" class="form-control btn btn-danger">
    </form>
    </div>
    <div class="col-sm-4">
    </div>
</body>
</html>


<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script>

$(document).ready(function(){

    $('#login').submit(function(e){
        e.preventDefault();

        var a=$('#email').val();
        if(a=="")
        {
            alert("please enter email address");
        }
        else{
                $.ajax({
            type:'POST',
            url:'generate.php',
            data:$(this).serialize(),
            success:function(data){
                console.log(data);
                $('#login').css('display','none');
                $('#login1').css('display','block');
            }
        })
        }
    })
    $('#login1').submit(function(e){
        e.preventDefault();

        var a=$('#otp').val();
        if(a=="")
        {
            alert("please enter email address");
        }
        else{
                $.ajax({
            type:'POST',
            url:'check.php',
            data:$(this).serialize(),
            success:function(data){
                console.log(data);
                if(data=='right otp')
                {
                    alert("right otp");
                $('#login').css('display','block');
                $('#login1').css('display','none');
                }
            }
        })
        }
    })
    
})
</script>

