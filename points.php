<?php
  $page_title = 'Add Sale';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(3);

?>
<?php include_once('layouts/header.php'); ?>
<!DOCTYPE html>
<head>
  <title></title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="libs/css/main.css" />
</head>
<body>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Points</th>
      <th scope="col">Prize</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>100</td>
      <td>Rs 50</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>500</td>
      <td>Rs 100</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>1000</td>
      <td>Gift hamper worth Rs500</td>
    </tr>
  </tbody>
</table>
<div>
      <h1>Your current point is
        <?php
        $user_id = $_SESSION['user_id'];
      $sql="SELECT attendance from users  WHERE id='$user_id'";
      $result=$db->query($sql);
      while($row=mysqli_fetch_array($result))
      {
      echo $row['attendance'];
    }
      ?></h1>
    </div>

</body>
</html>
<?php include_once('layouts/footer.php'); ?>