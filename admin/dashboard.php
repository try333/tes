<?php 
error_reporting(0);
require_once("../config.php");
require_once("../auth.php"); 

if(isset($_GET['delpdf'])){
    $uid=$_SESSION["user"]["id"];
    // menyiapkan query
    $sql = "DELETE FROM filepdf WHERE namafile='$_GET[delpdf]' ";
    $stmt = $db->prepare($sql);
    // bind parameter ke query
    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute();
    unlink('../pdf_files/'.$_GET['delpdf']);
}
if(isset($_GET['delpdf1'])){
    // menyiapkan query
    $sql1 = "DELETE FROM users WHERE username='$_GET[delpdf1]' ";
    $stmt1 = $db->prepare($sql1);
    // bind parameter ke query
    // eksekusi query untuk menyimpan ke database
    $saved1 = $stmt1->execute();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Admin</title>
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body class="bg-light">
<?php
include('header.php');
?>
<ul class="nav nav-tabs">
    <li><a data-toggle="tab" href="#home">Home</a></li>
    <li><a data-toggle="tab" href="#menu1">Organisir User</a></li>
    <li><a data-toggle="tab" href="#menu2">Organisir File</a></li>
  </ul>
<div class="tab-content">
    <div id="home" class="tab-pane fade in active">
        <div class="panel panel-default">
                <div class="panel-body" style="text-align: center;">
                    <h1>Selamat Datang di Dashboard Admin</h1>
    </div>
</div>
</div>
</div>
<div class="tab-content">
    <div id="menu1" class="tab-pane fade <?php if(isset($_GET['srchpdf1']) OR isset($_GET['delpdf1']))echo ' in active' ?>">
<div class="panel panel-default">
    <div class="panel-body">
        <div class="col-md-3">
  <form class="navbar-form" role="search" method="GET">
    <div class="input-group add-on">
      <input class="form-control" placeholder="Cari" name="srchpdf1" id="srch-term" type="text">
      <div class="input-group-btn">
        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
      </div>
    </div>
  </form>
    </div>
    <?php
    if(isset($_GET['srchpdf1'])){
        $tableheader1 = false;
    $query1 = "SELECT * FROM users WHERE name LIKE '%".$_GET['srchpdf1']."%' ORDER BY id DESC";
    $sth1 = $db->prepare($query1);

    if(!$sth1->execute()) {
        die('Error');
    }

    echo "<table width='100%' class='table table-hover'>";
        echo "<tr>
        <thead>
        <th>#</th>
        <th>USERNAME</th>
        <th>NAMA</th>
        <th>EMAIL</th>
        <th>ACTION</th>
        </thead>
        </tr><tbody>";
    $i1=1;
    while($row1 = $sth1->fetch(PDO::FETCH_ASSOC)) {
        
        echo "<tr><td>".$i1."</td>
            <td>".$row1['username']."</td>
            <td>".$row1['name']."</td>
            <td>".$row1['email']."</td>
            <td><a href='?delpdf1=".$row1['username']."'><span class='btn btn-danger'>Delete</span>

            </td>
        </tr>";
        $i1++;
    }
    echo "</tbody></table>";
}else{
    $tableheader1 = false;
    $query1 = "SELECT * FROM users ORDER BY id DESC";
    $sth1 = $db->prepare($query1);

    if(!$sth1->execute()) {
        die('Error');
    }

    echo "<table width='100%' class='table table-hover'>";
        echo "<tr>
        <thead>
        <th>#</th>
        <th>USERNAME</th>
        <th>NAMA</th>
        <th>EMAIL</th>
        <th>ACTION</th>
        </thead>
        </tr><tbody>";
    $i1=1;
    while($row1 = $sth1->fetch(PDO::FETCH_ASSOC)) {
        
        echo "<tr><td>".$i1."</td>
            <td>".$row1['username']."</td>
            <td>".$row1['name']."</td>
            <td>".$row1['email']."</td>
            <td><a href='?delpdf1=".$row1['username']."'><span class='btn btn-danger'>Delete</span>

            </td>
        </tr>";
        $i1++;
    }
    echo "</tbody></table>";
}    ?>
</div>
</div>
<!--
MENU 1 -------- MENU 2
-->
</div>
    <div id="menu2" class="tab-pane fade <?php if(isset($_GET['srchpdf']) OR isset($_GET['delpdf']))echo ' in active' ?>">
<div class="panel panel-default">
    <div class="panel-body">
        <div class="col-md-3">
  <form class="navbar-form" role="search" method="GET">
    <div class="input-group add-on">
      <input class="form-control" placeholder="Cari" name="srchpdf" id="srch-term" type="text">
      <div class="input-group-btn">
        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
      </div>
    </div>
  </form>
    </div>
    <?php
    if(isset($_GET['srchpdf'])){
        $tableheader = false;
    $uid=$_SESSION["user"]["id"];
    $query = "SELECT filepdf.id, filepdf.judul, filepdf.user_id, filepdf.namafile, users.name FROM filepdf, users WHERE filepdf.user_id=users.id AND filepdf.judul LIKE '%".$_GET['srchpdf']."%' ORDER BY id DESC";
    $sth = $db->prepare($query);

    if(!$sth->execute()) {
        die('Error');
    }

    echo "<table width='100%' class='table table-hover'>";
        echo "<tr>
        <thead>
        <th>#</th>
        <th width='60%'>JUDUL</th>
        <th>NAMA</th>
        <th>ACTION</th>
        </thead>
        </tr><tbody>";
    $i=1;
    while($row = $sth->fetch(PDO::FETCH_ASSOC)) {
        
        echo "<tr><td>".$i."</td>
            <td>".$row['judul']."</td>
            <td>".$row['name']."</td>
            <td><a target='_blank' href='../viewpdf.php?vwpdf=".$row['namafile']."'><span class='btn btn-primary'><span class=''>View</span></span></a>
                <a href='?delpdf=".$row['namafile']."'><span class='btn btn-danger'>Delete</span>

            </td>
        </tr>";
        $i++;
    }
    echo "</tbody></table>";
}else{
    $tableheader = false;
    $uid=$_SESSION["user"]["id"];
    $query = "SELECT filepdf.id, filepdf.judul, filepdf.user_id, filepdf.namafile, users.name FROM filepdf, users WHERE filepdf.user_id=users.id ORDER BY id DESC";
    $sth = $db->prepare($query);

    if(!$sth->execute()) {
        die('Error');
    }

    echo "<table width='100%' class='table table-hover'>";
        echo "<tr>
        <thead>
        <th>#</th>
        <th width='60%'>JUDUL</th>
        <th>NAMA</th>
        <th>ACTION</th>
        </thead>
        </tr><tbody>";
    $i=1;
    while($row = $sth->fetch(PDO::FETCH_ASSOC)) {
        
        echo "<tr><td>".$i."</td>
            <td>".$row['judul']."</td>
            <td>".$row['name']."</td>
            <td><a target='_blank' href='../viewpdf.php?vwpdf=".$row['namafile']."'><span class='btn btn-primary'><span class=''>View</span></span></a>
                <a href='?delpdf=".$row['namafile']."'><span class='btn btn-danger'>Delete</span>

            </td>
        </tr>";
        $i++;
    }
    echo "</tbody></table>";
}    ?>
</div>
</div>

</div>
            <!--?php for($i=0; $i < 6; $i++){ ?>
            <div class="card mb-3">
                <div class="card-body">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis veritatis nemo ad recusandae labore nihil iure qui eum consequatur, officiis facere quis sunt tempora impedit ullam reprehenderit facilis ex amet!
                </div>
            </div>
            <--?php } ?>-->
            

</div>

<script src="../dist/js/bootstrap.min.js"></script>
</body>
</html>