<?php
session_start();
  include_once "partials/header.php";
  include "classes/planclass.php";

  if(isset($_GET['id'])){
    $id = $_GET['id'];
    // echo $id;
    $datar = new plan();
    $result = $datar -> fetch_loan($id);
//     print_r($result);
  }
?>
        <!-- body -->
        <div>
                    <!-- side bar starts -->
                    <?php
                      include_once "partials/sidebar.php"
                    ?>
                   <!-- side bar ends -->
                    <!-- body starts here -->
                    <!-- card body -->
                <div class="col-1"></div>
                <div class="col-7 bg-light bodyshape mt-3">
                <?php if(isset($_SESSION["plan_update"])){?>

                    <div id="show" class="alert alert-success" role="alert">
                            <?php echo $_SESSION["plan_update"]?>
                        </div>
                        <!-- ends here -->

                        <?php unset($_SESSION["plan_update"])?>
                    <?php }?>
                    <!-- session end -->
                    <h1 class="text-center">Edit Plan</h1>
                    <div class="card text-center">
                        <div class="card-header">
                          <ul class="nav nav-pills card-header-pills">
                            Edit Page
                          </ul>
                         
                        </div>
                        <div class="card-body">
                        <form action="process/edittype.php" method="post">
                            <input name="id" type="hidden" value="<?php echo $result['id']?>"/>
                            <div class="row my-3"> 
                                <div class="col-5">
                                    <label class=""> Borrower</label>
                                    <select name="borrower" class="form-select" id="floatingSelectDisabled" aria-label="Floating label disabled select example" >
                                      <option value = '0'>Select Borrower</option>
                                      <?php foreach($result as $resul){?>
                                      <option value = '<?php echo $resul['id']?>'><?php echo $resul["firstname"];?> <?php echo $resul["lastname"];?> Tax ID|<?php echo $resul["tax_id"];?></option>
                                      <?php } ?>
                                      </select>
                                </div>
                                <div class="col-5">
                                    <label class=""> Loan Plans</label>
                                    <select name="loan_plans" class="form-select" id="floatingSelectDisabled" aria-label="Floating label disabled select example">
                                        <option selected>Select Loan Plans</option>
                                        <?php foreach($response as $respo){?>
                                        <option value="<?php echo $respo['id']?>"><?php echo $respo['months']?> Years [<?php echo $respo['interest_percentage']?>%, <?php echo $respo['penalty_rate']?>%]</option>
                                        <?php } ?>
                                      </select>
                                </div>
                            </div>

                            <div class="row my-3"> 
                                <div class="col-5">
                                    <label class=""> Loan Type</label>
                                    <select name="loan_type" class="form-select" id="floatingSelectDisabled" aria-label="Floating label disabled select example">
                                        <option selected>Select Loan Type</option>
                                        <?php foreach($loant as $loan){?>
                                        <option value="<?php echo $loan['id']?>"><?php echo $loan['type_name']?></option>
                                        <?php } ?>
                                      </select>
                                </div>
                                <div class="col-5">
                                <label><b>Loan Amount</b></label>
                                      <input name="loan_amount" type="number" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                                </div>
                            </div>

                            <div class="row my-3"> 
                                <div class="col-10">
                                <label class=""> Loan Type</label>
                                <textarea name="loan_purpose" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 50px"></textarea>
                                </div>
                            </div>
                            <hr>
                            <!-- calculation here -->
                               <?php
                               $loanAmount = 10000; // Initial loan amount
                               $annualInterestRate = 5; // Annual interest rate (5%)
                               $loanTermMonths = 24; // Loan term in months
                               $penaltyAmount = 50; // Penalty amount (a fixed fee, for example) 
                               
                               "Monthly Interest Rate";
                               $monthlyInterestRate = ($annualInterestRate / 12) / 100;
                                
                               "Monthly Payment";
                               $monthlyPayment = ($loanAmount * $monthlyInterestRate) / (1 - pow(1 + $monthlyInterestRate, -$loanTermMonths));
                                
                               "Total Payable Amount";
                               $totalInterestPaid = ($monthlyPayment * $loanTermMonths) - $loanAmount;
                               $totalPayableAmount = $loanAmount + $totalInterestPaid + $penaltyAmount;

                               "Penalty Amount";
                               $penaltyAmount = 50; // Example penalty amount

                               ?>
                            <!-- calculation ends here -->
                            <div class="row">
                                <div class="col-4">
                                    <?php echo "we are here"?>
                                </div>
                                <div class="col-3">
                                    <?php echo "we are here"?>
                                </div>
                                <div class="col-3">
                                    <?php echo "we are here"?> 
                                </div>
                            </div>

                            <div class="row my-3">
                                <div class="col-8">
                                    <button name="btn" class="text-center btn btn-primary btn-lg" >Save</button>
                                </div>
                            </div>
                    </form>
                        </div>
                       
                          
                      </div>
                </div>
                <!-- card body ends here -->
                <!-- body ends here -->
            </div>
        </div>
        <!-- body 2 -->
<?php
 include_once "partials/footer.php"
?>