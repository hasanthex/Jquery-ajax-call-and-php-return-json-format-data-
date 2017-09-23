<?php
    $connect = mysqli_connect("localhost", "root", "", "app_playing_field");
    $query   = "SELECT * FROM customer ORDER BY name ASC";
    $result  = mysqli_query($connect, $query);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>JSON DATA</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <br><br>
    <div class="container">

    <!--Employee List-->
    <div class="row">
    <h4><u>Using Ajax & PHP Get Data From JSON Format</u></h4><br>
    <div class="col-md-2">Select Employee </div>
    <div class="col-md-4">
     <select name="employee_list" id="employee_list" class="form-control">
      <option value="">Select Employee</option>
      <?php
           while($row = mysqli_fetch_array($result))
           {
            echo '<option value="'.$row["sl"].'">'.$row["name"].'</option>';
           }
           ?>
        </select>
      </div>
        <div class="col-md-4">
          <button type="button" name="search" id="search" class="btn btn-info">Search</button>
        </div>
    </div>
      <!--./Employee List-->
      <br><br><br>

      <!--Data Table -->
      <div class="table-responsive" id="employee_details" style="display:none">
       <table class="table table-bordered">
        <tr>
         <td width="10%" align="right"><b>Name</b></td>
         <td width="90%"><span id="employee_name"></span></td>
        </tr>
        <tr>
         <td width="10%" align="right"><b>Country</b></td>
         <td width="90%"><span id="employee_country"></span></td>
        </tr>

        <tr>
         <td width="10%" align="right"><b>Designation</b></td>
         <td width="90%"><span id="employee_position"></span></td>
        </tr>
        <tr>
         <td width="10%" align="right"><b>Mailing Address</b></td>
         <td width="90%"><span id="employee_email"></span></td>
        </tr>
        <tr>
         <td width="10%" align="right"><b>Contact No.</b></td>
         <td width="90%"><span id="employee_contact"></span></td>
        </tr>
       </table>
       </div>
      <!--./Data Table -->
    </div>
  </body>
</html>

<script>
    $(document).ready(function(){
       $('#search').click(function(){
          var emp_id = $('#employee_list').val();
          if(emp_id !=''){
            $.ajax({
                url: 'fetch_data.php',
                method: 'POST',
                data: {sl:emp_id},
                dataType: "JSON",
                success:function(data){
                    $('#employee_details').css("display","block");
                    $('#employee_name').text(data.name);
                    $('#employee_country').text(data.address);
                    $('#employee_position').text(data.position);
                    $('#employee_email').text(data.email);
                    $('#employee_contact').text(data.contact_no);
                }
            })
          }
          else{
            alert('Please Select Employee First');
              $('#employee_details').css("display","none");
          }
       });
    });
</script>
