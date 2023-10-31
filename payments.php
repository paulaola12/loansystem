<?php
  include_once "partials/header.php";
  include_once "classes/loans.php";
  $type1 = new Loans();
  $result = $type1 -> ref();
  // echo '<pre>';
  // print_r($result);
  // echo '</pre>';

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
                <div class="col-10 bg-light bodyshape mt-3">
                    <h1 class="text-center">Payments List</h1>
                    <div class="card text-center">
                        <div class="card-header">
                          <ul class="nav nav-pills card-header-pills">
                           <!-- modal -->
                            <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Launch static
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">New Payments</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form action="process/paymentprocess.php" method="post">
            <div class="">
              <label class="">Loan Reference Number</label><br>
              <select class="col-7" name="ref">
                <option></option>
                <?php foreach($result as $resul){?>
                  <option ><?php echo $resul['ref_no']?></option>
                <?php }?>

              </select>
            </div>

            <div class="">
              <label class="">Payee Name</label><br>
              <input class="col-7" type="text" name="payee">
            </div>

            <div class="">
              <label class="">Amount</label><br>
              <input class="col-7" type="number" name="amount">
            </div>

            <div class="">
              <label class="">Penalty</label><br>
              <input class="col-7" type="number" name="penalty">
            </div>
            <button name="btn" class="btn btn-primary my-3" data-bs-dismiss="modal">Save</button>
        </form>

      </div>
  
    </div>
  </div>
</div>
                           <!-- modal ends -->
                          </ul>
                         
                        </div>
                        <div class="card-body" id="fetch">
                           
                        </div>
                                   <!-- pagination -->
                          <nav aria-label="Page navigation example pagination">
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
                          <!-- pagination ends -->
                          
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
           url: 'paymentlist.php',
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