<?php
  session_start();
  include_once "partials/header.php";
  include_once "classes/borrowerclass.php";
  include_once "classes/planclass.php";
  include_once "classes/loantypewrite.php";
  $type1 = new Borrow();
  $result = $type1 -> fetch_borrowers();
  $type1 = new Plan();
  $response = $type1 -> loanplan();
  $type1 = new LoanT();
  $loant = $type1 -> loantype();
  // echo "<pre>";
  // print_r($response);
  // echo "</pre>";
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
                <div class="col-10 bodyshape">
                    <h1 class="text-center"><b>Loans</b></h1>

                      <!-- Session start -->
                      <?php if(isset($_SESSION['editprocess'])){?>

                        <div id="show" class="alert alert-success" role="alert">
                          <?php echo $_SESSION['editprocess']?>
                        </div>

                        <?php unset($_SESSION['editprocess'])?>

                      <?php }; ?>
                      <!-- Session end -->
                        <!-- Session start -->
                      <?php if(isset($_SESSION['loanerror'])){?>

                        <div id="show" class="alert alert-success" role="alert">
                          <?php echo $_SESSION['loanerror']?>
                        </div>

                        <?php unset($_SESSION['loanerror'])?>

                      <?php }; ?>
                      <!-- Session end -->

                    <div class="card text-center">
                        <div class="card-header">
                          <ul class="nav nav-pills card-header-pills">
                            <!-- <li class="nav-item">
                              <a class="nav-link active mx-3" href="#">Active</a>
                            </li> -->
                            <button type="button" class="btn btn-green text-white" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                              <b>Create New Application</b>
                            </button>
                            <!-- modal -->
                              <!-- Button trigger modal -->

                            <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel"></h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-12">

                                  <form action="process/loanprocess.php" method="post">
                                    <input type="hidden" name="random" value='<?php echo random_int(1000, 9999)?>'>
                                    <div class="my-2">
                                      <label class="h5 text-color" style="margin-left: -370px"><b>Borrower</b></label>
                                      <select name="borrower" class="form-select" id="floatingSelectDisabled" aria-label="Floating label disabled select example" >
                                      <option value = '0'>Select Borrower</option>
                                      <?php foreach($result as $resul){?>
                                      <option value = '<?php echo $resul['id']?>'><?php echo $resul["firstname"];?> <?php echo $resul["lastname"];?> Tax ID|<?php echo $resul["tax_id"];?></option>
                                      <?php } ?>
                                      </select>
                                    </div>

                                    <div class="my-2">
                                      <label for="exampleFormControlInput1" class="h5 text-color" style="margin-left: -350px"><b>Loan Plans</b></label>
                                      <select name="loan_plans" class="form-select" id="floatingSelectDisabled" aria-label="Floating label disabled select example">
                                        <option selected>Select Loan Plans</option>
                                        <?php foreach($response as $respo){?>
                                        <option value="<?php echo $respo['id']?>"><?php echo $respo['months']?> Years [<?php echo $respo['interest_percentage']?>%, <?php echo $respo['penalty_rate']?>%]</option>
                                        <?php } ?>
                                      </select>
                                    </div>

                                    <div class="my-2">
                                      <label class="h5 text-color" style="margin-left: -358px"><b>Loan Type</b></label><br>
                                      <select name="loan_type" class="form-select" id="floatingSelectDisabled" aria-label="Floating label disabled select example">
                                        <option selected>Select Loan Type</option>
                                        <?php foreach($loant as $loan){?>
                                        <option value="<?php echo $loan['id']?>"><?php echo $loan['type_name']?></option>
                                        <?php } ?>
                                      </select>
                                    </div>

                                    <div class="my-2">
                                      <label class=" h5 text-color" style="margin-left: -330px"><b>Loan Amount</b></label>
                                      <input name="loan_amount" type="number" class="form-control" placeholder="Enter Loan Amount">
                                    </div>
          
                                    <div class="my-2">
                                      <label  class="h5 text-color"  style="margin-left: -378px"><b>Purpose</b></label>
                                      <textarea name="loan_purpose" class="form-control" style="height: 100px" placeholder="Purpose"></textarea>
                                    </div>

                                    <div class="col-12 mt-2 mb-3">
                                    <button  name="btn" class="btn btn-primary" data-bs-dismiss="modal" >Save</button>
                                    </div>

                                  </form>
                                  
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                            <!-- modal end -->
                            <!-- <li class="nav-item">
                              <a class="nav-link" href="#">Link</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                            </li> -->
                          </ul>
                         
                        </div>
                        <div id="message"></div>
                        <div class="card-body" id="fetch">
                           
                        </div>       
                      </div>
                </div>
                <!-- card body ends here -->
                <!-- body ends here -->
                <?php
 include_once "partials/footer.php"
?>
            </div>
        </div>
        <!-- body 2 -->

<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">

  var testing = document.getElementById("show");
  setTimeout(function(){
    testing.style.display = "none";
  }, 3000)
  
  // fetch data from Database

function fetch(){
 $.ajax({
  url: 'loanlist_table.php',
  type: 'POST',
  success: function(response){
   $('#fetch').html(response)
  }
 })

}
fetch();

$(document).on('click','#delete',function(e){
  e.preventDefault();
  // alert('we are here')
  if(window.confirm('Are you sure you want to delete Data?')){

  var ket = $(this).attr('value');
  //  alert(ket)
  $.ajax({
    url: 'delete.php',
    type: 'POST',
    data: {delete_id: ket},
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
