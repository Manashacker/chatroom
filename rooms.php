<?php
$roomname = $_GET['roomname'];
include 'db_connect.php';

$sql = "SELECT * FROM `rooms` WHERE roomname = '$roomname'";

$result = mysqli_query($conn, $sql);
if($result)
    {
        if(mysqli_num_rows($result) ==1)
        {
            $message = "This room does not exist. Try creating a new one";
            echo '<script language="javascript">';
            echo 'alert("'.$message.'");';
            echo 'window.location="http://localhost/chatroom/"';
            echo '</script>';
        }
    }
else
{
    echo "Error :".mysqli_error($conn);
}


?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<style>
body {
  margin: 0 auto;
  max-width: 800px;
  padding: 0 20px;
}

.container {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}

.darker {
  border-color: #ccc;
  background-color: #ddd;
}

.container::after {
  content: "";
  clear: both;
  display: table;
}

.container img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

.container img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}

.time-right {
  float: right;
  color: #aaa;
}

.time-left {
  float: left;
  color: #999;
}
</style>
<style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      .container {
    max-width: 960px;
  }
  
  /*
   * Custom translucent site header
   */
  
  .site-header {
    background-color: rgba(0, 0, 0, .85);
    -webkit-backdrop-filter: saturate(180%) blur(20px);
    backdrop-filter: saturate(180%) blur(20px);
  }
  .site-header a {
    color: #8e8e8e;
    transition: color .15s ease-in-out;
  }
  .site-header a:hover {
    color: #fff;
    text-decoration: none;
  }
  
  /*
   * Dummy devices (replace them with your own or something else entirely!)
   */
  
  .product-device {
    position: absolute;
    right: 10%;
    bottom: -30%;
    width: 300px;
    height: 540px;
    background-color: #333;
    border-radius: 21px;
    transform: rotate(30deg);
  }
  
  .product-device::before {
    position: absolute;
    top: 10%;
    right: 10px;
    bottom: 10%;
    left: 10px;
    content: "";
    background-color: rgba(255, 255, 255, .1);
    border-radius: 5px;
  }
  
  .product-device-2 {
    top: -25%;
    right: auto;
    bottom: 0;
    left: 5%;
    background-color: #e5e5e5;
  }
  
  .anyclass{
      height: 350px;
      overflow-y: scroll;

  }
  /*
   * Extra utilities
   */
  
  .flex-equal > * {
    flex: 1;
  }
  @media (min-width: 768px) {
    .flex-md-equal > * {
      flex: 1;
    }
  }
    </style>

</head>
<body>
<div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
                
                  <span class="fs-4">Manas portal</span>
                </a>
          
                <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
                  <a class="me-3 py-2 text-dark text-decoration-none" href="#">Home</a>
                  <a class="me-3 py-2 text-dark text-decoration-none" href="#">About</a>
                  <a class="me-3 py-2 text-dark text-decoration-none" href="#">Facts</a>
                  <a class="py-2 text-dark text-decoration-none" href="#">World</a>
                </nav>
              </div>

<h2>Chat Messages - <?php echo $roomname; ?></h2>
<div class="container">
<div class="anyclass">
  
</div>
</div>



<input type="text" class = "form-control" name = "usermsg" id="usermsg" placeholder="Write Message"  >
<br>
<button type="button" class="btn btn-outline-info" name = "submitmsg" id = "submitmsg">Send</button>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
<script type="text/javascript">
setInterval(runFunction, 1000);
function runFunction()
{
  $.post("htcont.php", {room:'<?php echo $roomname?>'},
  function(data, status)
  {
    document.getElementsByClassName('anyclass')[0].innerHTML = data;
  }
  
  )
}



var input = document.getElementById("usermsg");


input.addEventListener("keypress", function(event) {
  
  if (event.key === "Enter") {
   
    event.preventDefault();
    
    document.getElementById("submitmsg").click();
  }
});
    $("#submitmsg").click(function(){
      var clientmsg = $("#usermsg").val();
  $.post("postmsg.php", {text: clientmsg, room:'<?php echo $roomname?>', ip:'<?php echo $_SERVER['REMOTE_ADDR'] ?>'},
  function(data, status){
    document.getElementsByClassName('anyclass')[0].innerHTML = data;});
    $("#usermsg").val("");
    return false;
  });

    

</script>
</body>
</html>
