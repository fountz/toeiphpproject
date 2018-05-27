<?php
session_start();
if($_SESSION["role"]!="admin"){
  echo '<script type="text/javascript">
        window.location.href = "index.php"
    </script>';
}
 include 'conn.php';
 $flag=2;
 $de=0;
 if(!empty($_GET["de"])) $de=$_GET["de"];
 if(isset($_POST["submit"])){
   $email=$_POST["email"];
   $pass=$_POST["pass"];
   $sname=$_POST["sname"];
   $lname=$_POST["lname"];
   $phone=$_POST["phone"];
   $role=$_POST["role"];
   $flag=0;
   $sql = "SELECT * FROM users";
   $result = mysqli_query($conn, $sql);
   while($row = mysqli_fetch_assoc($result)) {
     if($row["email"]==$email)$flag=1;
  }
  if($flag==0){
    $sql = "INSERT INTO users (email, password, sname, lname, phone, role) VALUES ('".$email."','".$pass."','".$sname."','".$lname."','".$phone."','".$role."')";
    $query = mysqli_query($conn,$sql);
  }
 }
 if(isset($_POST["subedit"])){
   $email=$_POST["email"];
   $pass=$_POST["pass"];
   $sname=$_POST["sname"];
   $lname=$_POST["lname"];
   $phone=$_POST["phone"];
   $role=$_POST["role"];
   $flag=3;

    $sql = "UPDATE users SET password='$pass', sname='$sname', lname='$lname', phone='$phone', role='$role' WHERE email='$email'";
    $query = mysqli_query($conn,$sql);

 }

$sql = "SELECT *  FROM  users WHERE role != 'admin' ";
$result = mysqli_query($conn, $sql);
 ?>

 <!doctype html>
 <html lang="en">
   <head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" >
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css" >
     <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" >
     <title>admin</title>
   </head>
   <body>
     <!-- navbar -->
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
     <a class="navbar-brand" href="#"><img src="pics/bar.png" width="20"> ระบบจัดการพนักงาน</a>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
     </button>
     <div class="collapse navbar-collapse" id="navbarSupportedContent">
       <ul class="navbar-nav mr-auto">
         <button class="btn btn-outline-success my-2 my-sm-0" type="button" data-toggle="modal" data-target="#addemp">เพิ่มพนักงาน</button>
       </ul>
         <a href="index.php"><button class="btn btn-outline-danger my-2 my-sm-0" type="submit">ออกจากระบบ</button></a>
     </div>
   </nav>
   <div class="container">
     <?php
     if($flag==0) echo '<br><div class="alert alert-success alert-dismissible">
     <button type="button" class="close" data-dismiss="alert">×</button>
     <strong>สำเร็จ!</strong> เพิ่มข้อมูลพนักงานเรียบร้อย
   </div>';
    else if($flag==1) echo '<br><div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>ผิดพลาด!</strong> อีเมลล์ไม่ถูกต้องหรือมีการใช้ไปแล้ว
  </div>';
  else if($flag==3) echo '<br><div class="alert alert-primary alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>สำเร็จ!</strong> แก้ไขข้อมูลพนักงานเรียบร้อย
</div>';
if($de==1) echo '<br><div class="alert alert-secondary alert-dismissible">
<button type="button" class="close" data-dismiss="alert">×</button>
<strong>สำเร็จ!</strong> ลบข้อมูลพนักงานเรียบร้อย
</div>';
      ?>
     <!-- กลางหน้า -->
     <br><center><h2>ข้อมูลพนักงาน</h2></center><br>
   <table id="example" class="table table-striped table-bordered" style="width:100%" align="center">
           <thead>
               <tr>
                   <th>ลำดับที่</th>
                   <th>ชื่อจริง</th>
                   <th>นามสกุล</th>
                   <th>อีเมลล์</th>
                   <th>เบอร์โทรศัพท์</th>
                   <th>ตำแหน่ง</th>
                   <th width="90">แก้ไขข้อมูล</th>
                   <th width="75">ลบข้อมูล</th>

               </tr>
           </thead>
           <tbody>
             <?php
             $i=1;
             while($row = mysqli_fetch_assoc($result)) {
       echo "<tr><td>$i</td><td>".$row["sname"]."</td><td>".$row["lname"]."</td><td>".$row["email"]."</td><td>".$row["phone"]."</td><td>".$row["role"]."</td>";
       ?><td align="center"><button class="btn btn-outline-warning btn-sm" type="button" data-toggle="modal" data-target="#editemp<?php echo $row["id"];?>">แก้ไข</button></td><td align=center><a href='deleteemp.php?id=<?php echo $row["id"] ?>'><button class='btn btn-outline-danger btn-sm' type='submit' Onclick="return confirm('ยืนยันการลบข้อมูล')">ลบ</button></a></td></tr>
       <?php
       $i++;
       ?>
       <div class="modal fade" id="editemp<?php echo $row["id"];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editemp<?php echo $row["id"];?>">แก้ไขข้อมูล</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" action="mainadmin.php">
    <div class="form-group">
      <label for="exampleFormControlInput1">Email address</label>
      <input type="email" name="email" value='<?php echo $row["email"];?>' class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" readonly>
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">Password</label>
      <input type="password" name="pass" class="form-control" id="exampleFormControlInput1" placeholder="password" required>
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">ชื่อจริง</label>
      <input type="text" name="sname" value='<?php echo $row["sname"];?>' class="form-control" id="exampleFormControlInput1" placeholder="กรอกชื่อจริง..." required>
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">นามสกุล</label>
      <input type="text" name="lname" value='<?php echo $row["lname"];?>' class="form-control" id="exampleFormControlInput1" placeholder="กรอกนามสกุล..." required>
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">เบอร์โทรศัพท์</label>
      <input type="text" name="phone" value='<?php echo $row["phone"];?>' class="form-control" id="exampleFormControlInput1" placeholder="0123456789" required>
    </div>
    <div class="form-group">
      <label for="exampleFormControlSelect1">ตำแหน่ง</label>
      <select class="form-control" id="exampleFormControlSelect1" name="role">
        <option value="ผู้จัดการ">ผู้จัดการ</option>
        <option value="พนักงาน" <?php if($row["role"]=="พนักงาน")echo "selected"; ?>>พนักงาน</option>
      </select>
    </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="subedit" class="btn btn-outline-success">บันทึกข้อมูล</button></form>
          <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">ปิด</button>
        </div>
      </div>
    </div>
  </div>
       <?php
   }
              ?>
       </table>
     </div>

 <!-- modal เพิ่มพนักงาน -->
     <div class="modal fade" id="addemp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addemp">เพิ่มข้อมูล</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="mainadmin.php">
  <div class="form-group">
    <label for="exampleFormControlInput1">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Password</label>
    <input type="password" name="pass" class="form-control" id="exampleFormControlInput1" placeholder="password" required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">ชื่อจริง</label>
    <input type="text" name="sname" class="form-control" id="exampleFormControlInput1" placeholder="กรอกชื่อจริง..." required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">นามสกุล</label>
    <input type="text" name="lname" class="form-control" id="exampleFormControlInput1" placeholder="กรอกนามสกุล..." required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">เบอร์โทรศัพท์</label>
    <input type="text" name="phone" class="form-control" id="exampleFormControlInput1" placeholder="0123456789" required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">ตำแหน่ง</label>
    <select class="form-control" id="exampleFormControlSelect1" name="role">
      <option value="ผู้จัดการ">ผู้จัดการ</option>
      <option value="พนักงาน">พนักงาน</option>
    </select>
  </div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="submit" class="btn btn-outline-success">บันทึกข้อมูล</button></form>
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">ปิด</button>
      </div>
    </div>
  </div>
</div>

     <!-- Optional JavaScript -->
     <!-- jQuery first, then Popper.js, then Bootstrap JS -->
     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" ></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" ></script>
     <script src="https://code.jquery.com/jquery-1.12.4.js" ></script>
     <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" ></script>
     <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js" ></script>
     <script>
     $(document).ready(function() {
    $('#example').DataTable();
} );
     </script>
   </body>
 </html>
