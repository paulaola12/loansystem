<?php
    include_once "classes/loans.php";
    $type1 = new Loans();
    $rows = $type1 -> fetch_loan_data();
    //  print_r($rows);
?>
<table class="table table-dark table-striped-columns">
                                <colgroup>
                                    <col width="10%">
                                    <col width="25%">
                                    <col width="25%">
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
                                        <p>Reference Number:<?php $row['ref_no']?></p>
                                        <p>Loan Type:<?php echo $row['loan_type']?></p>
                                        <p>Plan:<?php echo $row['loan_months']?> Years [<?php echo $row['interest_percentage']?>%, <?php echo $row['penalty_rate']?>%]</p>
                                        <p>Amount:<?php echo $row['amount']?> </p>
                                    </td>
                                    <td>
                                        <?php
                                            // $currentDate = date('Y-m-d'); // The format 'Y-m-d' represents Year-Month-Day
                                            // // Convert the current date to a DateTime object
                                            // $dateTime = new DateTime($currentDate);
                                            // // Add a month to the date
                                            // $dateTime->add(new DateInterval('P1M')); // P1M represents "1 month"
                                            // // Format and display the new date
                                            // $newDate = $dateTime->format('Y-m-d');
                                            // echo "Date After Adding a Month: $newDate";   
                                        ?>
                                       
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
                                        <a href="editloanprocess.php?=<?php ?>" class="h4 mx-2"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <!-- modal -->
                                          <!-- Button trigger modal -->
                                                  <!-- modal end -->
                                        <a href="" class="h4"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                  </tr>
                                  <?php       
                                    }
                                 }
                                  ?>
                                </tbody>
                              </table>