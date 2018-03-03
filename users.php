<?php 
    include_once('config.php');
    $incoming_name = $_POST['name'];

    $sql = "SELECT * FROM bots WHERE name ='".$incoming_name."'";
    $res = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($res)){
            echo'    
            <div class="col-sm-4">
              <div class="card" style="width:400px;">
                <img class="card-img-top" src="'.$row['avatarUrl'].'" alt="Card image" style="width:175px;height:180px;">
                <div class="card-body">
                  <h4 class="card-title">'.$row['name'].'</h4>
                  <a href="#" class="btn btn-primary">Access '.$row['name'].' Control Panel</a>
                </div>
              </div>
            </div>
            ';
    }
?>