<?php
session_start();
  include_once "partials/header.php";
?>
        <!-- body -->
        <div>
           <!-- side bar -->
           <?php
           include_once "partials/sidebar.php"
           ?>
           <!-- side bar -->
                    <!-- body starts here -->
                    <!-- card body -->
                <div class="col-10 bg-light bodyshape mt-3">
                    <h1 class="text-center">Borrowers List</h1>
                       <!-- session -->
                        <!-- pop up -->
                        <?php if(isset($_SESSION["borrower"])){?>

                          <div id="show" class="alert alert-success" role="alert">
                                    <?php echo $_SESSION["borrower"]?>
                                </div>
                                <!-- ends here -->

                                <?php unset($_SESSION["borrower"])?>
                            <?php }?>
                          <!-- session end -->
                          <!-- session -->
                    <div class="card text-center">
                        <div class="card-header">
                          <ul class="nav nav-pills card-header-pills">

                         <!-- Modal -->
                            <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                      New Borrower
                    </button>

<!-- Modal -->
                  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <!-- form content -->
                          <div class="col-lg-12">
                            <form action="process/borrowerprocess.php" method="post">
                              <div class="row">
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label for="" class="control-label">Last Name</label>
                                    <input name="lastname" class="form-control" required >
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label for="">First Name</label>
                                    <input name="firstname" class="form-control" required="" value="">
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label for="">Middle Name</label>
                                    <input name="middlename" class="form-control" value="">
                                  </div>
                                </div>
                              </div>
                              <div class="row form-group">
                                <div class="col-md-6">
                                      <label for="">Address</label>
                                      <textarea name="address" id="" cols="30" rows="2" class="form-control" required=""></textarea>
                                </div>
                                <div class="col-md-5">
                                  <div class="">
                                    <label for="">Contact #</label>
                                    <input type="text" class="form-control" name="contact_no" value="">
                                  </div>
                                </div>
                              </div>
                              <div class="row form-group">
                                <div class="col-md-6">
                                      <label for="">Email</label>
                                      <input type="email" class="form-control" name="email" value="">
                                </div>
                                <div class="col-md-5">
                                  <div class="">
                                    <label for="">Tax ID</label>
                                    <input type="text" class="form-control" name="tax_id" value="">
                                  </div>
                                </div>
                              </div>
                              <button name="btn" class="btn btn-primary my-3">Save</button>
                            </form>
                          </div>
                        </div>
                        <!-- modal footer -->
                      </div>
                    </div>
                  </div>
                         <!-- modal end -->
                          </ul>
                         
                        </div>
                        <div id="#message"></div>
                         <!-- USING AJAX CALL TO fTECH FROM ACTION PAGE -->
                        <div class="card-body" id="fetch">
                            
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

<script type="text/javascript" src="jquery.js"></script>

<script type="text/javascript">

//limisiting testuing
var testing = document.getElementById("show");
setTimeout(function(){
 testing.style.display = "none";
}, 3000)

//Fetch All Records

  function fetch(){

    $.ajax({
        url: 'borroweraction.php',
        type: 'post',
        success: function(response){
            $('#fetch').html(response);
        }
    });
}
        
  fetch();

  //delete records
  $(document).on('click','#delete',function(e){
   e.preventDefault();
   if(window.confirm('Are you sure you want to delete data?')){
     var del = $(this).attr('value')
      // alert(del)
     $.ajax({
       url:'deleteborrower.php',
       type: 'POST',
       data: {delete_id: del},
       success: function(response){
         fetch();
       $('#message').html(response);
       }
     });
   }
   else{
     return false;
    }
  })

  




</script>