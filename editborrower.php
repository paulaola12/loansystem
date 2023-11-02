<?php
  include_once "partials/header.php";
  include "classes/borrowerclass.php";
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $type1 = new Borrow();
    $result = $type1 -> fetch_details($id);
    print_r($result);
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
                <div class="col-7 bodyshape ">
                    <h1 class="text-center">Edit Borrower Details</h1>
                    <div class="card text-center">
                        <div class="card-header">
                          <ul class="nav nav-pills card-header-pills">
                            
                          </ul>
                         
                        </div>
                        <div class="card-body">
                          <div style="margin-left: 45px">
                                <form action="process/editborrowerprocess.php" method="post">
                                    <input name="id" type="hidden" value="<?php echo $result['id']?>"/>
                                    <div class="row my-3"> 
                                        <div class="col-10">
                                            <label class="h5"> Last Name</label>
                                            <input name="lastname" type="text" class="form-control" value="<?php echo $result['lastname']?>"/>
                                        </div>
                                    </div>
                                    <div class="row my-3"> 
                                        <div class="col-10">
                                            <label class="h5">First Name</label>
                                            <textarea name="firstname" type="text" cols="30" rows="2" class="form-control"><?php echo $result['firstname']?></textarea>
                                        </div>
                                    </div>
                                    <div class="row my-3"> 
                                        <div class="col-10">
                                            <label class="h5"> Middle Name</label>
                                            <input name="middlename" type="text" class="form-control" value="<?php echo $result['middlename']?>"/>
                                        </div>
                                    </div>
                                    <div class="row my-3"> 
                                        <div class="col-10">
                                            <label class="h5"> Address</label>
                                            <input name="address" type="text" class="form-control" value="<?php echo $result['address']?>"/>
                                        </div>
                                    </div>
                                    <div class="row my-3"> 
                                        <div class="col-10">
                                            <label class="h5"> Contact</label>
                                            <input name="contact_no" type="text" class="form-control" value="<?php echo $result['contact_no']?>"/>
                                        </div>
                                    </div>
                                    <div class="row my-3"> 
                                        <div class="col-10">
                                            <label class="h5"> Email</label>
                                            <input name="email"  type="email" class="form-control" value="<?php echo $result['email']?>"/>
                                        </div>
                                    </div>
                                    <div class="row my-3"> 
                                        <div class="col-10">
                                            <label class="h5"> Tax ID</label>
                                            <textarea name="tax_id" type="number" cols="30" rows="2" class="form-control"><?php echo $result['tax_id']?></textarea>
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