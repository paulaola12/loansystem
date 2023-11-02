<?php
session_start();
  include_once "partials/header.php";
  include "classes/payments.php";
  include_once "classes/loans.php";
  $type1 = new Loans();
  $result = $type1 -> ref();

  if(isset($_GET['id'])){
    $id = $_GET['id'];
    // echo $id;
    $type2 = new payments();
    $response = $type2 -> fetch($id);
    // print_r($response);

    // echo '<pre>';
    // print_r($result);
    // echo '</pre>';  
  }
?>
        <!-- body -->
        <div>
                    <!-- side bar starts -->
                    <?php
                      include_once "partials/sidebar.php";
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
                        <form action="process/editpayprocess.php" method="post">
                          <input name="id" type="hidden" value="<?php echo $response['id']?>"/>   

                            <div class="col-10">
                                      <label class="text-color">Payee</label>
                                      <input name="payee" value="<?php echo $response['payee']?>" class="form-control">
                             </div>
                             <hr>
                             <div class="col-10">
                                      <label class="text-color">Ref No</label>
                                   <select name="lid" class="form-control">
                                      <?php foreach($result as $resul){?>
                                    <option value="<?php echo $resul['id']?>"><?php echo $resul['ref_no']?></option>
                                    <?php }?>        
                                  </select>
                                      
                             </div> 
                            <hr>
                            <div class="row my-3">

                               <div class="col-5">
                                <p>Monthly Amount:</p> 
                                <p>Penalty:</p>    
                                <p>Payable Amount:</p>
                               </div>

                               <div class="col-5">
                               <label class="text-color">Amount</label>
                               <input name="amount" value="<?php echo $response['amount']?>" class="form-control">
                               </div>


                            </div>

                            
                                
                            

                            <div class="col-10">
                                <button name="btn" class="text-center btn btn-primary btn-lg" >Save</button>
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