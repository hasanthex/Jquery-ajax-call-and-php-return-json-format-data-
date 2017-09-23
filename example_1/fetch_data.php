<?php
if(isset($_POST["sl"]))
{
 $connect = mysqli_connect("localhost", "root", "", "app_playing_field");
 $query = "SELECT * FROM customer WHERE sl = '".$_POST["sl"]."'";
 $result = mysqli_query($connect, $query);
 while($row = mysqli_fetch_array($result))
 {
  $data["name"]       = $row["name"];
  $data["address"]    = $row["address"];
  $data["position"]   = $row["position"];
  $data["email"]      = $row["email"];
  $data["contact_no"] = $row["contact_no"];
 }
 echo json_encode($data);
}
?>
