<?php 
    include_once('config.php'); // Connect to DB...
    include_once('header.php'); 
?>
<!-- Start Wensite -->
<div class="container">
    <h1><b>User Search</b></h1>
    <form class="form-vertical" method="POST">
    <div class="form-group">
      <label class="control-label col-md-2" for="user">User:</label>
      <div class="col-sm-2">
        <input type="text" class="form-control" id="user" placeholder="Type User..." name="user">
      </div>
    </div>
    <br>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
      <br>
        <button type="submit" id="btnSearch" name="btnSearch" class="btn btn-default">Search</button>
      </div>
    </div>
  </form>

  <br><br>
  <h3><b>Bot User List</b></h3>
  <br>
  <div class="row">
  <div id="results" name="results">
<?php
    // Start Pagination... 
    // Does the Page # Exist yet?
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }

    $records_per_page = 5; // Set Max # of Users to return...
    $offset = ($page-1) * $records_per_page; // Config the offset for pagination...

    $totals_sql = "SELECT COUNT(*) FROM bots";
    $result = mysqli_query($conn,$totals_sql);
    $rows = mysqli_fetch_array($result)[0];
    $total_pages = ceil($rows / $records_per_page);

    $sql = "SELECT * FROM bots LIMIT $offset, $records_per_page"; // Get Records of Bots to Display...
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
    </div>
</div>

<script>
$("button").click(function(){ // Upon Search Request...
    // Build Data to Send...
    var frmData = {
        'name': $('input[name=user]').val() // Store variable for submission
    };

    // Process Request...
    $.ajax({
        type: "POST",
        url: "users.php", 
        data: frmData
    })
    .done(function(result) {
         $("#results").html(result);
    })
    .fail(function() {
        $("#results").html("Sorry, it appears an issue occured. Please try again shortly...");
    });

    $('form').submit(function(event) {
        event.preventDefault(); // Prevent normal form submission...
    });
});
</script>

<?php 
    include_once ('footer.php');
?>