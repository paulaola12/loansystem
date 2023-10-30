<?php
session_start();
  include_once "partials/header.php";
  include "classes/loantypewrite.php";
  if(isset($_GET["id"])){
    $id = $_GET["id"];
    echo $id;
    $type1 = new LoanT();
    $result = $type1 -> fetch_details($id);
  }
?>
        <!-- body -->
        <div>
                    <!-- side bar start -->
                    <?php
                      include_once "partials/sidebar.php"
                    ?>
                    <!-- side bar ends -->
                    <!-- body starts here -->
                    <!-- card body -->
                    
                <div class="col-10 bg-light bodyshape mt-3">
                    <h1 class="text-center">Loan Plan</h1>
                    <!-- session -->
                        <!-- pop up -->
                        <?php if(isset($_SESSION["add_error"])){?>

                            <div id="show" class="alert alert-success" role="alert">
                                      <?php echo $_SESSION["add_error"]?>
                                  </div>
                                  <!-- ends here -->

                                  <?php unset($_SESSION["add_error"])?>
                              <?php }?>
                    <!-- session end -->
                    <!-- session -->
                        <!-- pop up -->
                        <?php if(isset($_SESSION["edit"])){?>

                        <div id="show" class="alert alert-success" role="alert">
                                  <?php echo $_SESSION["edit"]?>
                              </div>
                              <!-- ends here -->

                              <?php unset($_SESSION["edit"])?>
                          <?php }?>
                        <!-- session end -->
                    <div class="card text-center">
                        <div class="card-header">
                          <ul class="nav nav-pills card-header-pills">
                              <!-- modal -->
                                                            <!-- Button trigger modal -->
                              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                Add New Loan Types
                              </button>

                              <!-- Modal -->
                              <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h1 class="modal-title fs-5" id="staticBackdropLabel">Loan Types</h1>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    
                                    <div class="modal-body">
                                     <form action="process/newloan.php" method="post">
                                     <div class="form-group">
                                          <label class="type-move">Type</label>
                                          <textarea name="loan_type" id="type" cols="30" rows="2" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                          <label class="type-move2">Description</label>
                                          <textarea name="loan_desc" id="description" cols="30" rows="2" class="form-control"></textarea>
                                        </div> 
                                        <button name="btn" class="mt-3 mb-2">Submit</button>
                                     </form>
                                  </div>
                                </div>
                              </div> 
                              <!-- modal end -->
                          </ul>
                         
                        </div>
                        <div id="message"></div>
                        <!-- USING AJAX CALL TO fTECH FROM ACTION PAGE -->
                        <div class="card-body" id="fetch">
                            
                        </div>

                        <!-- ends -->
                                   <!-- pagination -->
                          <!-- <nav aria-label="Page navigation example pagination">
                            <ul class="pagination justify-content-end">
                              <li class="page-item disabled">
                                <a class="page-link">Previous</a>
                              </li>
                              <li class="page-item"><a class="page-link" href="#">1</a></li>
                              <li class="page-item"><a class="page-link" href="#">2</a></li>
                              <li class="page-item"><a class="page-link" href="#">3</a></li>
                              <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                              </li>
                            </ul>
                          </nav>
                          pagination ends -->
                          
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

  var testing = document.getElementById("show");
  setTimeout(function(){
    testing.style.display = "none";
  }, 3000)

  //limisiting testuing

   //Fetch All Records

     function fetch(){
 
       $.ajax({
           url: 'action.php',
           type: 'post',
           success: function(response){
               $('#fetch').html(response);
           }
       });
   }
           
     fetch();

   //testing
   
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