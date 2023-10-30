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
                                <div class="col-8">
                                    <label class=""> Plan (Months)</label>
                                    <input name="months" type="num"  class="form-control" value="<?php echo $result['months']?>"/>
                                </div>
                            </div>
                            <div class="row my-3"> 
                                <div class="col-8">
                                    <label class=""> Interest(%)</label>
                                    <input name="interest" type="num" class="form-control" value="<?php echo $result['interest_percentage']?>">
                                </div>
                            </div>
                            <div class="row my-3"> 
                                <div class="col-8">
                                    <label class=""> Monthly Over Due Payment</label>
                                    <input name="overdue" type="num" class="form-control" value="<?php echo $result['penalty_rate']?>">
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