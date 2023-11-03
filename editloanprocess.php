<?php
session_start();
  include_once "partials/header.php";
  include "classes/planclass.php";
  include "classes/loantypewrite.php";
  include_once "classes/loans.php";
  $type1 = new Plan();
  $response = $type1 -> loanplan();
  $type1 = new LoanT();
  $loant = $type1 -> loantype();

  if(isset($_GET['id'])){
    $id = $_GET['id'];
    // echo $id;
    $type1 = new Loans();
    $result = $type1 -> fetch_details($id);
    // echo '<pre>';
    // print_r($result);
    // echo '</pre>';  
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
                    <h1 class="text-center">Edit Plan</h1>
                    <div class="card text-center">
                        <div class="card-header">
                          <ul class="nav nav-pills card-header-pills">
                            Edit Page
                          </ul>
                         
                        </div>
                        <div class="card-body">
                    <div class="mx-5">
                        <form action="process/editloan.php" method="post">
                            <input name="id" type="hidden" value="<?php echo $result['borrower_id']?>"/>
                            <div class="row my-3"> 
                                <div class="col-5">
                                    <label class=""> First Name</label>
                                    <input name="firstname" value="<?php echo $result['firstname']?>"  class="form-control" Disabled>
                                      </select>
                                </div>
                                <div class="col-5">
                                    <label class=""> Last Name</label>
                                    <input name="lastname" value="<?php echo $result['lastname']?>" type="text" class="form-control" Disabled >
                                </div>
                            </div>

                            <div class="row my-3"> 
                                <div class="col-5">
                                    <label class=""> Loan plan</label>
                                    <select name="loanplan" class="form-select" id="floatingSelectDisabled" aria-label="Floating label disabled select example">
                                        <option value="0">Select Loan Plans</option>
                                        <?php foreach($response as $respo){?>
                                        <option value="<?php echo $respo['id']?>"><?php echo $respo['months']?> Years [<?php echo $respo['interest_percentage']?>%, <?php echo $respo['penalty_rate']?>%]</option>
                                        <?php } ?>
                                      </select>
                                </div>
                                <div class="col-5">
                                <label><b>Loan Type</b></label>
                                <select name="loantype" class="form-select" id="floatingSelectDisabled" aria-label="Floating label disabled select example">
                                        <option value="0">Select Loan Type</option>
                                        <?php foreach($loant as $loan){?>
                                        <option value="<?php echo $loan['id']?>"><?php echo $loan['type_name']?></option>
                                        <?php } ?>
                                      </select>    
                                </div>
                            </div>
                            
                            <div class="col-10">
                                      <label class="text-color">Loan Amount</label>
                                      <input name="amount" value="<?php echo $result['amount']?>" type="number" class="form-control">
                                    </div>

                            <div class="row my-3"> 
                                <div class="col-10">
                                <label class=""> Purpose</label>
                                <textarea name="purpose" class="form-control" style="height: 50px"><?php echo $result['purpose']?></textarea>
                                </div>
                            </div>

                            <div class="row my-3"> 
                                <div class="col-10">
                                <label class=""> Authorise</label>
                                <select name="authorise" class="form-control" style="height: 50px">
                                  <option>For Approval</option>
                                  <option value="1">Approved</option>
                                  <option value="2">Released</option>
                                  <option value="3">Complete</option>
                                  <option value="4">Denied</option>
                                </select>
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-10">
                                    <button name="btn" class="text-center btn btn-primary btn-lg" >Save</button>
                                </div>
                            </div>
                        </form>
                  </div>
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