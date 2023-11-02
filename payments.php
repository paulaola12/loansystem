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
                <div class="col-10 bodyshape ">
                    <h1 class="text-center"><b>Payments List</b></h1>
                        <!-- session -->
                        <!-- pop up -->
                        <?php if(isset($_SESSION["payments"])){?>

                    <div id="show" class="alert alert-success" role="alert">
                              <?php echo $_SESSION["payments"]?>
                          </div>
                          <!-- ends here -->

                          <?php unset($_SESSION["payments"])?>
                      <?php }?>
<!-- session end -->
                    <div class="card text-center">
                        <div class="card-header">
                          <ul class="nav nav-pills card-header-pills">
                           <!-- modal -->
                            <!-- Button trigger modal -->
<button type="button"  class="btn btn-green text-white"  data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  New Payment
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel"></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form action="process/paymentprocess.php" method="post">
            <div class="">
              <label class="" style="margin-left:-183px; font-size:19px">Loan Reference Number</label><br>
              <select class="col-10" name="ref" style="height:30px">
                <option>Please Select Ref Number</option>
                <?php foreach($result as $resul){?>
                  <option value="<?php echo $resul['id']?>"><?php echo $resul['ref_no']?></option>
                <?php }?>

              </select>
            </div>

            <div class="">
              <label class="mt-3" style="margin-left:-280px; font-size:19px" >Payee Name</label><br>
              <input class="col-10" type="text" name="payee" style="height:30px">
            </div>

            <div class="">
              <label class="mt-3" style="margin-left:-320px; font-size:19px">Amount</label><br>
              <input class="col-10" type="number" name="amount" style="height:30px">
            </div>

            <div class="">
              <label class="mt-3" style="margin-left:-320px; font-size:19px">Penalty</label><br>
              <input class="col-10" type="number" name="penalty" style="height:30px">
            </div>
            <div class="text-center">
              <button name="btn" class="btn btn-primary my-3" data-bs-dismiss="modal">Save</button>
            </div>
        </form>

      </div>
  
    </div>
  </div>
</div>
                           <!-- modal ends -->
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
    url: 'deletepay.php',
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