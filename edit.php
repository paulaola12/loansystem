<?php
  include_once "partials/header.php";
  include "classes/loantypewrite.php";
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $type1 = new LoanT();
    $result = $type1 -> fetch_details($id);
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
                <div class="col-6 bodyshape">
                    <h1 class="text-center mb-4"><b>Edit Loan Type</b></h1>
                    <div class="card text-center">
                        <div class="card-header">
                          <ul class="nav nav-pills card-header-pills">
                            
                          </ul>
                         
                        </div>
                    <div class="" style="margin-left: 80px">
                        <div class="card-body">
                        <form action="process/editprocess.php" method="post">
                            <input name="ida" type="hidden" value="<?php echo $result['id']?>"/>
                            <div class="row my-3"> 
                                <div class="col-10">
                                    <label class="h5 mb-2 mt-2"> Form Type</label>
                                    <input name="loan_type" id="type" class="form-control" value="<?php echo $result['type_name']?>"/>
                                </div>
                            </div>
                            <div class="row my-3"> 
                                <div class="col-10">
                                    <label class="h5 mb-2 mt-2"> Description</label>
                                    <textarea name="description" id="type" cols="30" rows="2" class="form-control"><?php echo $result['type_name']?></textarea>
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
                </div>
                <!-- card body ends here -->
                <!-- body ends here -->
            </div>
        </div>
        <!-- body 2 -->
<?php
 include_once "partials/footer.php"
?>