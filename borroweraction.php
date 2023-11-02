<?php
include_once "classes/borrowerclass.php";
$type1 = new Borrow();
$rows = $type1 -> fetch_type_data();
// print_r($data);

if(isset($_GET["id"])){
  $id = $_GET["id"];
  // echo $id;

  $type1 = new LoanT();
  $result = $type1 -> fetch_details($id);
}

?>

<table class="table table-dark table-striped-columns" id="myTable">
                                <colgroup>
                                    <col width="15%">
                                    <col width="25%">
                                    <col width="20%">
                                    <col width="20%">
                                    <col width="20%">
                                </colgroup>
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Borrowers</th>
                                    <th scope="col">Current Loan</th>
                                    <th scope="col">Next Payment Schedule</th>
                                    <th scope="col">Action</th>
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
                                    <td>
                                      <p><b><?php echo $row['id'] ?></b></p>
                                    </td>
                                    <td>
                                    <p>Name: <b><?php echo $row['firstname'] ?></b></p>
                                    <p>Address: <b><?php echo $row['address'] ?></b></p>
                                    <p>Contact: <b><?php echo $row['contact_no'] ?> </b></p>
                                    <p>Email: <b><?php echo $row['email'] ?></b></p>
                                    <p>Tax ID: <b><?php echo $row['tax_id'] ?></b></p>
                                    </td>
                                    <td>Current Loan:None</td>
                                    <td>Next Payment Schedule" None</td>
                                    <td>
                    
                                    <a href="editborrower.php?id=<?php echo $row ["id"]?>" class="h4 mx-2"  data-bs-target="#staticBackdrop"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a id="delete" value="<?php echo $row ['id']?>" class="h4 btn btn-primary"><i class="fa-solid fa-trash"></i></a>
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
    var numPerPage = 1; // Number of rows per page

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