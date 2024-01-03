<?php 
include '../config/connect.php';

if(isset($_POST['displayLandlord'])){
    $table='<table class="table table-hover align-items-center mb-0" id="landlordView">
    <thead>
      <tr>
        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">name</th>
        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Phone No</th>
        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">email</th>
        
        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">operations</th>
      </tr>
    </thead>
    <tbody>';

    $sql = "SELECT * FROM landlords";
    $result = mysqli_query($con, $sql);
    $number=1;

    while ($row=mysqli_fetch_assoc($result)) {

        $id = $row['id'];
        $name = $row['name'];
        $phone = $row['phone_number'];
        $email = $row['email'];
        // $properties = $row['number_of_properties'];
        $table .= '
        <tr>
        <td scope="row" class="text-center">' . $number . '</td>
        <td class="text-center">' . $name . '</td>
        <td class="text-center">' . $phone . '</td>
        <td class="text-center">' . $email . '</td>
        <td class="text-center"><button class="btn btn-success btn-sm my-2" onclick="getLandlordDetails('.$id.')"><i class="material-icons opacity-10 fs-5">edit</i></button>
<button class="btn btn-danger btn-sm my-2" onclick="deleteLandlord('.$id.')"><i class="material-icons opacity-10 fs-5">delete</i></button>
</td>
      </tr>
      ';
      $number++;
    }
    $table .= " </tbody></table>";
    echo $table;
}

?>

<!-- Include jQuery and DataTables scripts -->
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.colVis.min.js"></script>


<!-- Initialize DataTables on your table -->
<script>
          var table = $('#landlordView').DataTable({
            lengthChange: false,
        "pageLength": 30,
        buttons: ['copy', 'excel', 'pdf', 'colvis']
    });

    table.buttons().container()
        .appendTo('#landlordView_wrapper .col-md-6:eq(0)')
</script>
