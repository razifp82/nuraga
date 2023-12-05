
<div>
  <h2>Data Organisasi</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">ID</th>
        <th class="text-center">Nama Organisasi</th>
        <th class="text-center">Password</th>
        <th class="text-center">Ketua Organisasi</th>
        <th class="text-center">Sosmed</th>
        <th class="text-center">Deskripsi</th>
        <th class="text-center">Username</th>
        <th class="text-center">Email</th>
        <th class="text-center">Status</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $sql="SELECT * from organisasi";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$row["nama_organisasi"]?></td>
      <td><?=$row["password"]?></td>      
      <td><?=$row["ketua_organisasi"]?></td> 
      <td><?=$row["social_media"]?></td>     
      <td><?=$row["deskripsi_organisasi"]?></td>
      <td><?=$row["username"]?></td>
      <td><?=$row["email"]?></td>      
      <td><?=$row["status"]?></td> 
      <td><button class="btn btn-primary" style="height:40px" onclick="itemEditForm('<?=$row['id_organisasi']?>')">Edit</button></td>
      <td><button class="btn btn-danger" style="height:40px" onclick="itemDelete('<?=$row['id_organisasi']?>')">Delete</button></td>
      </tr>
      <?php
            $count=$count+1;
          }
        }
      ?>
  </table>


   