<html>
<head>
  <title>TODO</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body >
  <?php
  $server="localhost";
  $username="dayscholars";
  $password="password";
  $database = "mydatabase";

  /* Create database  connection with correct username and password*/
  $connect= new mysqli($servername,$username,$password,$database);

  /* Check the connection is created properly or not */
  if($connect->connect_error)

      echo "Connection error:" .$connect->connect_error;
      else
      {
      }/* echo "Connection is created successfully";*/
  if(isset($_POST['submit']))
  {
  $textarea=$_POST['textarea'];

/*  echo $textarea;*/



  $sql = "INSERT INTO todo (todotask,date,checked) VALUES ('$textarea', CURRENT_TIME(),0)";
  $query=mysqli_query($connect,$sql);
}


    /*$sq = "UPDATE todo SET checked=1 where ";
    $d= mysqli_query($connect, $sq);


mysqli_select_db($connect,$database);
  if (mysqli_query($connect,$sql))
  {
      echo "New record created successfully";
  }
  else
  {
      echo "Error: " . $sql . "<br>" . $connect->error;
  }
*/

?>
<div class="container">
  <div class="container-fluid " >
  <div class=" row " style="height:100px;">
   <div class="col mh-100 align-self-center ">
      <h1 class="text-center " style="color:blue;"> TO DO</h1>
    </div>
  </div>
</div>
<br/>
<div class="container">
<form method="post" action="">
  <div class="form-row">
      <div class="col">
        <div class="input-group mb-3">
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="1" placeholder="text here" name="textarea"></textarea>
  <div class="input-group-append">

    <button type="submit" class="btn btn-danger btn-lg" rows="1" name="submit">Add task</button>
  </div>
</div>
</div>
</div>
</form>
</div>


<br/>
<div class="container " style="height:100%;border:none;">

  <div class="row" style="height:100%;">
    <div class="col border border-0" style="color:blue;"><h3>TO DO</h3>
      <form method="post">
      <table border="1" style="width:100%;">

        <?php
      $result = mysqli_query( $connect,"SELECT id,todotask,date FROM `todo` WHERE checked=0 ORDER BY date DESC");
      if (mysqli_num_rows($result)>0)
      {
    // Read the records
    while($row =mysqli_fetch_array($result))
     {
       $id=$row['id'];


/* echo "<tr >  <td style="width:75%;">" . $row["todotask"]. "</td>";

              <?php
    $qry2=mysqli_query($conn,"SELECT tname,date,status FROM tbltasks WHERE status=0");
    if(mysqli_num_rows($qry2)>0)
    {
        while($row=mysqli_fetch_array($qry2))
        {
  ?>

   <li class="list-group-item d-flex justify-content-between align-items-center">
    <?php echo $row['tname']; ?>
     <small><?php echo $row['date']; ?></small>
     <div class="input-group-append">
     <input type="checkbox" id="chkTodo">
     </div>
   </li>
   <?php }} ?>
  </ul>
        */

         ?>
<tr>
  <td  class="d-none"><input type="hidden" Value="<?php  echo $id ?>" name="hiddenfield"></td>


  <td style="width:55%;height:100px;">
    <?php
    echo "<p>".$row['date']."</p>";
echo "<p>". $row['todotask']."</p>";
     ?>
</td>
          <td style="width:25%;" style="align:center;">
            <!-- Button to Open the Modal -->
<button type="button"  class="btn btn-secondary " style=""><a href="update.php?id=<?php echo $row[id];?>">done</a></button>

</td>
</tr>
<?php
}
} ?>
</table>
</form>
</div>

    <div class="col border border-0" style="color:blue;"><h3>DONE</h3>
      <form method="post">
      <table border="1" style="width:100%;">
        <?php
      $resul = mysqli_query( $connect,"SELECT id,todotask,date FROM `todo` WHERE checked=1 ORDER BY date DESC");
      if (mysqli_num_rows($resul)>0)
      {
    // Read the records
    while($ro =mysqli_fetch_array($resul))
     {


/* echo "<tr >  <td style="width:75%;">" . $row["todotask"]. "</td>";

              <?php
    $qry2=mysqli_query($conn,"SELECT tname,date,status FROM tbltasks WHERE status=0");
    if(mysqli_num_rows($qry2)>0)
    {
        while($row=mysqli_fetch_array($qry2))
        {
  ?>

   <li class="list-group-item d-flex justify-content-between align-items-center">
    <?php echo $row['tname']; ?>
     <small><?php echo $row['date']; ?></small>
     <div class="input-group-append">
     <input type="checkbox" id="chkTodo">
     </div>
   </li>
   <?php }} ?>
  </ul>
        */

         ?>
<tr>
<td  class="d-none"><input type="hidden" Value="<?php  echo $id ?>" name="hiddenfield"></td>
  <td style="width:55%;height:100px;">
    <?php
    echo "<p>".$ro['date']."</p>";
echo "<p>". $ro['todotask']."</p>";
     ?>
   </td>

          <td style="width:25%;">
            <!-- Button to Open the Modal -->
<button type="button" class="btn btn-warning float-right btn-lg"><a href="updat.php?id=<?php echo $ro[id];?>" ><p color="black">done</p></a></button>
</td>
</tr>
<?php
}
} ?>
</table>
  </form>
        </div>

      </div>
    </div>


</div>
</body>
</html>
