<!DOCTYPE html>
<head>
  <?php

	$con= mysqli_connect('localhost','root','','smartmcc');

   ?>

</head>
<body>
  <?php

	$con= mysqli_connect('localhost','root','','smartmcc');
    // Check connection
    if (mysqli_connect_errno()){
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $result = mysqli_query($con,"SELECT * FROM medical_history WHERE userID = 66");
    $row = mysqli_fetch_assoc($result);
	  $history = $row['medical_history'];

    $historyJson = json_decode($history,true);

    mysqli_close($con);

    ?>

    <form method="post">

      <center> <table style="width:70%">
      </br>
      <tr>
          <td>
            <label>Martial status</label>
              <select name="MS">
                <option <?php echo ($historyJson['MS'] == 1 ? "selected" : "") ; ?>>Single</option>
                <option <?php echo ($historyJson['MS'] == 2 ? "selected" : "") ; ?>>Partenerd</option>
                <option <?php echo ($historyJson['MS'] == 3 ? "selected" : "") ; ?>>Married</option>
                <option <?php echo ($historyJson['MS'] == 4 ? "selected" : "") ; ?>>Separated</option>
                <option <?php echo ($historyJson['MS'] == 5 ? "selected" : "") ; ?>>Divorced</option>
                <option <?php echo ($historyJson['MS'] == 6 ? "selected" : "") ; ?>>Widowed</option>
              </select>
           </td>
       </tr>
       <tr>
          <td><label>Previous or referring doctor</label>
      	     <input type="text" name="PoRD" value="<?php echo htmlentities($historyJson['PoRD']); ?>"/>
           </td>
        </tr>

        <tr>
          <td>
            <label>Date of last physical exam</label>
            <input type="date" name="DoLPE" value=<?php echo $historyJson["DoLPE"]; ?>>
          </td>
        </tr>



      </table>
      <input type="submit" value="Update">
      </br>
      </center>
    </form>

    <?php

    if (!empty($_POST)){
      $MS = filter_input(INPUT_POST,'MS');
      $PoRD = filter_input(INPUT_POST,'PoRD') == "" ? NULL : filter_input(INPUT_POST,'PoRD');
      $DoLPE = filter_input(INPUT_POST,'DoLPE');




      switch ($MS) {
        case 'Single':
          $historyJson['MS'] = "1";
          break;
        case 'Partenerd':
          $historyJson['MS'] = "2";
          break;
        case 'Married':
          $historyJson['MS'] = "3";
          break;
        case 'Separated':
          $historyJson['MS'] = "4";
          break;
        case 'Divorced':
          $historyJson['MS'] = "5";
          break;
        case 'Widowed':
          $historyJson['MS'] = "6";
          break;
      }


      $historyJson['PoRD'] = $PoRD;
      $historyJson['DoLPE'] = $DoLPE;

      $jsonString = json_encode($historyJson,true);

      $conn = new mysqli ('localhost','root','','smartmcc');

      $sql = "UPDATE `medical_history` SET `medical_history` = '$jsonString'
			WHERE `medical_history`.`userID` = '66' ";
      $conn->query($sql);
      // echo $jsonString;
    }


     ?>

</body>
