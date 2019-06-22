<!--
/**
 * Created by Hassan Abdella.
 * Date: 02/05/2019
 */-->
 
<style>
    .userbox {
        background: #fff none repeat scroll 0 0;
        box-shadow: 0 0 1px;
        padding: 20px;
        margin-bottom: 20px;

    }
    .img{
        height: 100px;
        width: 100px;
    }
    .grid-container1 {
        border: 2px solid green;
        border-radius: 5px;
      display: grid;
      grid-template-columns: auto auto auto auto auto auto;
      grid-gap: 10px;
      padding: 10px;
      margin: 10px;
    }

    .grid-container1 > div {

      /*text-align: center;*/
      padding: 20px 0;
    }

</style>
<br>
<div class="container">
    <?php
    if (isset($_REQUEST['searchUser'])) {
        $searchUser=$_REQUEST['searchText'];
        $d = mysqli_query($con, "SELECT * FROM doctors WHERE name LIKE '%$searchUser%'");
        $num = mysqli_num_rows($d);
        while($num>0) {
            $result = mysqli_fetch_assoc($d);
            $id=$result['id'];
            $name = $result['name'];
            $specialization = $result['specialization'];
            $info=$result['info'];
            $mobile=$result['phones'];
            $fees=$result['fees'];
            $address=$result['location_text'];
            $working_time=$result['working_time'];
            $file_name=$result['file_name'];
            $file_ext=$result['file_ext'];
            $img=$file_name.'.'.$file_ext;
            $select="";
            


            $sql_doc=mysqli_query($con,"SELECT * FROM available_dates WHERE doctor_id = $id ORDER BY date ASC, time ASC");
            if(mysqli_num_rows($sql_doc)){
                $select= '<select name="select">';
                while($rs=mysqli_fetch_array($sql_doc)){
                $select.='<option value="'.$rs['id'].'">'."Day: ".$rs['date']." time ".$rs['time'].'</option>';
                }
            }
            $select.='</select>';
            echo"
            <div class='grid-container1'>
               <div class='item1'>
                    <img src='img/Doctors/$img' class='img'>
                </div><br>
                <div>
                    <div><span style=' font-weight:bold'> Doctor: </span>".$name."</div>
                    <div><span style=' font-weight:bold'>Specialization: </span>".$specialization."</div>
                    <div><span style=' font-weight:bold'>Informations: </span>".$info."</div>
                </div>
                <div class='column'>
                    <div><span style=' font-weight:bold'>Location: </span>".$address."</div>
                    <div><span style=' font-weight:bold'>Phone: </span>".$mobile."</div>
                    <div><span style=' font-weight:bold'>Fees: </span>".$fees."</div>
                </div>
                <div class='column'>
                    <div><span style=' font-weight:bold'>Working Time : </span>".$working_time."</div>
                    <div><span style=' font-weight:bold'>Available Dates: </span>".$select."</div>
                </div>
            </div>";
            $num--;
            $select="";

        }
    }
    ?>
</div>