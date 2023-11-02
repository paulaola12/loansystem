<?php
    include "classes/loans.php";
    $type1 = new Loans();
    $rows = $type1 -> fetch_loan_data();
    echo '<pre>';
    print_r($rows);
    echo '</pre>';
?>
<table class="table table-dark table-striped-columns" id="myTable">
                                <colgroup>
                                    <col width="5%">
                                    <col width="25%">
                                    <col width="30%">
                                    <col width="25%">
                                    <col width="5%">
                                    <col width="10%">
                                </colgroup>
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Borrower</th>
                                    <th scope="col">Loan Details</th>
                                    <th scope="col">Next Payment Details</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    if(!empty($rows)){
                                        foreach($rows as $row){
                                    ?>
                                  <tr>
                                    <td><?php $row['borrower_id']?></td>
                                    <td>
                                        <p>Name:<?php echo $row['firstname']?>, <?php echo $row['lastname']?></p>
                                        <p>Contact:<?php echo $row['contact_no']?></p>
                                        <p>Address:<?php echo $row['address']?> </p>
                                    </td>
                                    <td>
                                        <p>Reference:<?php $row['ref_no']?></p>
                                        <p>Loan Type:<?php echo $row['loan_type']?></p>
                                        <p>Plan:<?php echo $row['loan_months']?> Years [<?php echo $row['interest_percentage']?>%, <?php echo $row['penalty_rate']?>%]</p>
                                        <p>Amount:<?php echo $row['amount']?> </p>
                                        <?php
                                            $monthly_interest = $row['interest_percentage']/ 12 / 100;
                                            $monthlyInterest = number_format($monthly_interest, 2); // Displays 3.14
                                            
                                            $monthly_Payment = ( $row['amount']* $monthly_interest) / (1 - pow(1 + $monthly_interest, -$row['loan_months']));
                                            $monthlyPayment = number_format($monthly_Payment, 2); 

                                            $totalInterestPaid = ($monthly_Payment * $row['loan_months']) - $row['amount'];
                                            $Payable_amount = $row['amount'] + $totalInterestPaid + $row['penalty_rate'] ;
                                            $PayableAmount = number_format($Payable_amount, 2);
             
                                           ?>
                                        <p>Monthly Interest Rate:<?php echo $monthlyInterest ?> </p>
                                        <p>Monthly Payment:<?php echo $monthlyPayment ?> </p>
                                        <p>Total Payable Amount::<?php echo $PayableAmount ?></p>
                                        <p>Date Released:
                                        <?php
                                          if($row['status'] == 2){
                                            $currentDate = date('Y-m-d'); 
                                            $dateTime = new DateTime($currentDate);
                                           
                                            $date = $dateTime->format('Y-m-d');
                                            $newDate = date("F, d Y", strtotime($date));
                                            echo  $newDate;
                                          }else{
                                            echo "N/A";
                                          }
                                        ?>
                                        </p>
                                       
                                    </td>
                                    <td>
                                    <p>Next Date Released:<br>
                                    <?php
                                            if($row['status'] == 2){
                                              $currentDate = date('Y-m-d'); 
                                              $dateTime = new DateTime($currentDate);
                                            $dateTime->add(new DateInterval('P1M'));
                                            $date = $dateTime->format('Y-m-d');
                                            $newDate = date("F, d Y", strtotime($date));
                                            echo  $newDate;
                                            }   
                                        ?>
                                       </p>
                                       <p>Montly Payable Amount:<?php echo $monthlyPayment ?> </p>
                                    </td>
                                    <td>
                                    <?php if($row['status'] == 0): ?>
                                        <span class="badge badge-warning">For Approval</span>
                                      <?php elseif($row['status'] == 1): ?>
                                        <span class="badge badge-info">Approved</span>
                                      <?php elseif($row['status'] == 2): ?>
                                        <span class="badge badge-primary">Released</span>
                                      <?php elseif($row['status'] == 3): ?>
                                        <span class="badge badge-success">Completed</span>
                                      <?php elseif($row['status'] == 4): ?>
                                        <span class="badge badge-danger">Denied</span>
                                      <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="editloanprocess.php?id=<?php echo $row["borrower_id"]?>" class="h4 mx-2"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <!-- modal -->
                                          <!-- Button trigger modal -->
                                                  <!-- modal end -->
                                        <a id="delete" value="<?php echo $row['borrower_id']?>" class="h4 btn btn-primary"><i class="fa-solid fa-trash"></i></a>
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
