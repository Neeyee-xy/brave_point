<?php
use App\Models\User;
$users=User::where('user_type','Client')->orderBy('id','DESC')->get();;
?>
<link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
   <link rel="stylesheet" href="/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  
   <style type="text/css">
     .responsive_img{
      max-height: 140px;
      max-width: 100%;
     }
     #test_list th{
white-space: nowrap;
     }
     .btn{
      margin-top: 5px!important;
     }
   </style>
 <table id="test_list" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S/n</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                <?php
                $no=0;
foreach ($users as $user) {
$no++;
echo"<tr>";

echo "<td>".$no."</td>";

echo "<td>".$user->name."</td>";

echo "<td>".$user->email."</td>";
echo "<td>".$user->phone."</td>";

echo '<td><div class="btn-group">
                    
                    <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                     <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 40 40"><g fill="currentColor"><path d="M23.112 9.315a3.113 3.113 0 1 1-6.226.002a3.113 3.113 0 0 1 6.226-.002"/><circle cx="20" cy="19.999" r="3.112"/><circle cx="20" cy="30.685" r="3.112"/></g></svg>
                    </button>
                    <div class="dropdown-menu" role="menu" style="">
                      <button class="dropdown-item delete_user" href="#" user_id="'.$user->id.'"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M7 21q-.825 0-1.412-.587T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.587 1.413T17 21zM17 6H7v13h10zM9 17h2V8H9zm4 0h2V8h-2zM7 6v13z"/></svg> Delete</button>
                      <a class="dropdown-item edit_user" href="/admin/users/clients/edit/'.$user->id.'" user_id=""><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" fill-rule="evenodd" d="M5 20h14a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2m-1-5L14 5l3 3L7 18H4zM15 4l2-2l3 3l-2.001 2.001z"/></svg> Edit</a>
                    </div>
                  </div></td>';


  // code...
echo "</tr>";
}


                ?>
                  
                 
                </tbody>
                 <tfoot>
                  <tr>
                    <th>S/n</th>
                    <th>Name</th>
                    <th>Icon</th>
                    <th>Action</th>  
                  </tr>
                  </tfoot>
                </table>
              </table>
     

 <script src="/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/plugins/jszip/jszip.min.js"></script>
<script src="/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script type="text/javascript">
  
 $(function() {

   $("#test_list").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "ordering":false,
      "buttons": [ "csv", "excel", "pdf",]
    }).buttons().container().appendTo('#test_list_wrapper .col-md-6:eq(0)');


    });
  </script>