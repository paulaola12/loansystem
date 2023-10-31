<?php
include_once "classes/payments.php";
$type2 = new Payments();
$rows = $type2 -> read();
//  echo '<pre>';
//  print_r($rows);
//  echo '</pre>';
// print_r($type);
//  if(isset($_GET["id"])){
//   $id = $_GET["id"];
//   echo $id;

//   $type1 = new LoanT();
//   $result = $type1 -> fetch_details($id);
// }

?>

<table class="table table-bordered table-hover" id="myTable">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Loan Reference No</th>
                                        <th class="text-center">Payee</th>
                                        <th class="text-center">Amount</th>
                                        <th class="text-center">Penalty</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $i = 1;
                                    
                                    if (!empty($rows))
                                    {
                                        foreach($rows as $row)
                                        {
                                    ?>
                                    
                                    <tr>

                                        <td class="text-center">
                                        <p><b><?php echo $row['id'] ?></b></p> 
                                        </td>
                                        <td class="">
                                             <p>Loan Reference No: <b></b></p>
                                        </td>
                                        <td class="">
                                             <p>Type Name: <b><?php echo $row['payee'] ?> </b></p>
                                        </td>
                                        <td class="">
                                             <p>Type Name: <b><?php echo $row['amount'] ?> </b></p>
                                        </td>
                                        <td class="">
                                             <p>Type Name: <b><?php echo $row['penalty'] ?> </b></p>
                                        </td>
                                        <td>
                                      <a href="" class="h4 mx-2"  data-bs-target="#staticBackdrop"><i class="fa-solid fa-pen-to-square"></i></a>
                                      <a id="" value="<?php echo $row ['id']?>" class="h4 btn btn-primary"><i class="fa-solid fa-trash"></i></a>
                                    
                                            
                                    </td>
                                    </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <div class="pagination-container">
                            <ul class="pagination" id="pagination"></ul>
                            </div> 

<script type="text/javascript" src="jquery.js"></script>


<script>
$(document).ready(function() {
    var table = $('#myTable');
    var tbody = table.find('tbody');
    var rows = tbody.find('tr');
    var numRows = rows.length;
    var numPerPage = 3; // Number of rows per page

    // Calculate the number of pages
    var numPages = Math.ceil(numRows / numPerPage);

    // Generate the pagination links
    var pagination = $('#pagination');
    for (var i = 1; i <= numPages; i++) {
        pagination.append('<li class="page-item"><a class="page-link" href="#">' + i + '</a></li>');
    }

    // Initially, display the first page
    displayPage(1);

    // Function to display a specific page
    function displayPage(pageNum) {
        tbody.find('tr').hide();
        var startIndex = (pageNum - 1) * numPerPage;
        var endIndex = Math.min(startIndex + numPerPage, numRows);
        rows.slice(startIndex, endIndex).show();
    }

    // Handle pagination link clicks
    pagination.find('a').click(function() {
        var page = parseInt($(this).text());
        displayPage(page);
        $(this).parent().addClass('active').siblings().removeClass('active');
    });
});


</script>
