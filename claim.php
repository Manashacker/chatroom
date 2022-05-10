<?php
$room = $_POST['room'];


if(strlen($room)>25 or strlen($room)<3)
{
  $message = "Please Choose a name between 3 to 25 letters";
  echo '<script language="javascript">';
  echo 'alert("'.$message.'");';
  echo 'window.location="http://localhost/chatroom/";';
  echo '</script>';
}

else if(!ctype_alnum($room)){
  $message = "Please enter an alpha numeric room name";
  echo '<script language="javascript">';
  echo 'alert("'.$message.'");';
  echo 'window.location="http://localhost/chatroom/"';
  echo '</script>';
}
else {
  include 'db_connect.php';
}
$sql = "SELECT * FROM `rooms` WHERE roomname = '$room'";
$result = mysqli_query($conn, $sql);
if ($result)
{
    if (mysqli_num_rows($result) > 0)
    {
      $message = "Please enter a different room name . This room is already taken";
      echo '<script language="javascript">';
      echo 'alert("'.$message.'");';
      echo 'window.location="http://localhost/chatroom/"';
      echo '</script>';
    }

    else
    {
      $sql = "INSERT INTO `rooms` ( `roomname`, `stime`) VALUES ( '$room', current_timestamp);";
      if (mysqli_query($conn, $sql))
      {
        $message = "Yor room is ready";
        echo '<script language="javascript">';
        echo 'alert("'.$message.'");';
        echo 'window.location="http://localhost/chatroom/rooms.php?roomname= '.$room.'";';
        echo '</script>';
      }
    }
}
else
{
  echo "Error :".mysqli_error($conn);
}

?>