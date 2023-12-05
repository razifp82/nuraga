<div id="validasiBtn" >
  <h2>Validasi Akun</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID.</th>
        <th>Nama Organisasi</th>
        <th>ketua organisasi</th>
        <th>Social Media</th>
        <th>Deskripsi Organisasi</th>
        <th>Email</th>
        <th class="text-center" colspan="2">Action</th> 
        foreach (approve_data->result() as $approve)

$status = "<span style='font-size:10;' class='label label-success'>Telah
Disetujui</span>";
if($approve->status=='belum disetujui')$status = "
<a href='approve_f/disetujui/$approve->nomor' class='btn btn-success btn-sm'
data-popup='tooltip' data-placement='top' title='Disetujui'><i class='fa fa-check'
aria-hidden='true'></i></a>

<a href='approve_f/ditolak/$approve->nomor' class='btn btn-danger btn-sm'
data-popup='tooltip' data-placement='top' title='Ditolak Data'><i class='fa
fa-times' aria-hidden='true'></i></a>";
else if($approve->status=='ditolak')$status = "<span style='font-size:10;'
class='label label-danger'>Ditolak</span>";

     </tr>
    </thead>
     <?php
      include_once "../config/dbconnect.php";
      $sql="SELECT * from organisasi";
      $result=$conn-> query($sql);
      
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
       <tr>
          <td><?=$row["id_organisasi"]?></td>
          <td><?=$row["nama_organisasi"]?></td>
          <td><?=$row["ketua_organisasi"]?></td>
          <td><?=$row["social_media"]?></td>
          <td><?=$row["deskripsi_organisasi"]?></td>
          <td><?=$row["email"]?></td>
          
           
              
        
        </tr>
    <?php
        } 
        }
      
    ?>
     
  </table>
   
</div>
<!-- Modal -->
<div class="modal fade" id="viewModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          
          <h4 class="modal-title">Order Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="order-view-modal modal-body">
        
        </div>
      </div><!--/ Modal content-->
    </div><!-- /Modal dialog-->
  </div>
<script>
     //for view order modal  
    $(document).ready(function(){
      $('.openPopup').on('click',function(){
        var dataURL = $(this).attr('data-href');
    
        $('.order-view-modal').load(dataURL,function(){
          $('#viewModal').modal({show:true});
        });
      });
    });
 </script>