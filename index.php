<?php
  include_once "partials/header.php";
  include_once "classes/loans.php";
  include_once "classes/payments.php";
  include_once "classes/borrowerclass.php";
  include_once "classes/planclass.php";
  $type = new Loans();
  $response = $type -> active();
  $data = new Payments();
  $today = $data -> pay_today();
  $type1 = new Borrow();
  $borrower = $type1 -> borrowers();
  $type1 = new Plan();
  $plans = $type1 -> current_plans();
  print_r($plans)
  // print_r($today);
  // print_r($response)
  // $rest = $response['actyive_loan'];
  // echo $rest
?>
        <div>
           <!-- side bar -->
           <?php
            include_once "partials/sidebar.php"
           ?>
           <!-- side bar end -->
           <div class="col-9 bodyshape">

            <div style="background-color:#7FB685; margin: 3px 10px 0px 35px; height: 400px; width: 100%">
               <div class="row">
                <div class="col-12" style="height: 240px;margin-top: 85px;margin-left:50px">
                     <!-- section 1 -->
                     <div class="row">
                        <div class="col-2 bg-dark mx-2">
                          <div class="row">
                            <div class="col-12" style="height:160px;">
                            <p class="text-white mt-4 mx-1" style="font-size:20px">Active Loans<i class="fa-solid fa-table-list mx-2"></i></p><br>
                            <?php
                            foreach($response as $respo){
                             $carrista = $respo['active_loan'];
                             }
                             ?>
                            <p class="text-white text-center" style="font-size:21px; margin-top:-10px"><?php echo $carrista?></p>
                          </div>
                            <div class="col bg-white" style="height: 70px;">
                            <div class="text-center mt-2">
                            <a  href="loans.php" style="text-decoration:none; color:black; font-size:19px"><b>View Active Loans</b></a>
                            </div>
                            </div>
                          </div>
                        </div>
                      <!-- section 2-->
                        <div class="col-2 bg-danger mx-2">
                          <div class="row">
                            <div class="col-12" style="height:160px;">
                            <p class="text-white" style="font-size:20px;margin-top:20px">Payments Today<i class="fa-solid fa-money-bill" style="font-size:10px"></i></p><br>
                             <?php
                              foreach($today as $toda){
                                $payment_today = $toda['total_amount'];
                              }
                             ?>
                            <p class="text-white text-center" style="font-size:21px; margin-top:-10px"><?php echo $payment_today?></p>
                            </div>
                            <div class="col bg-white" style="height: 70px;">
                            <div class="text-center mt-2">
                            <a  href="payments.php" style="text-decoration:none; color:black; font-size:19px"><b>View Payments</b></a>
                            </div>
                            </div>
                          </div>
                        </div>
                        <!-- section 3-->
                        <div class="col-2 bg-danger mx-2">
                          <div class="row">
                            <div class="col-12" style="height:160px;">
                            <p class="text-white mt-4 mx-3" style="font-size:18px">Borrowers<i class="fa-solid fa-user mx-2"></i></p><br>
                            <?php
                            foreach($borrower as $borrow){
                              $active_borrower = $borrow['active_borrowers'];
                            }
                            ?>
                            <p class="text-white text-center" style="font-size:21px; margin-top:-10px"><?php echo $active_borrower?></p>
                            </div>
                            <div class="col bg-white" style="height: 70px;">
                            <div class="text-center mt-2">
                            <a  href="borrowers.php" style="text-decoration:none; color:black; font-size:19px"><b>View Borrowers</b></a>
                            </div>
                            </div>
                          </div>
                        </div>
                         <!-- section 3-->
                         <div class="col-2 bg-warning mx-2 ">
                          <div class="row">
                            <div class="col-12" style="height:160px;">
                            <p class="text-white mt-4 mx-1" style="font-size:18px">Current Plans<i class="fa-solid fa-user mx-1"></i></p><br>
                            <?php
                            foreach($plans as $plan){
                             $pan = $plan['current_plans'];
                             }
                             ?>
                            <p class="text-white text-center" style="font-size:21px; margin-top:-10px"><?php echo $pan ?></p>
                          </div>
                            <div class="col bg-white" style="height: 70px;">
                            <div class="text-center mt-2">
                            <a  href="loans.php" style="text-decoration:none; color:black; font-size:18px"><b>View Current Plans</b></a>
                            </div>
                            </div>
                          </div>
                        </div>
                      <!-- section 4 -->
                        <div  class="col-2 bg-dark mx-2">
                          <div class="row">
                            <div class="col-12" style="height:160px;">
                            <p class="text-white mt-4 " style="font-size:17px">Total Receivables<i class="fa-solid fa-user mx-1"></i></p><br>
                            <p class="text-white text-center" style="font-size:19px; margin-top:-10px">6</p>
                            </div>
                            <div class="col bg-white" style="height: 70px;">
                            <div class="text-center mt-2">
                            <a  href="plans.php" style="text-decoration:none; color:black; font-size:19px"><b>View Currentt plans</b></a>
                            </div>
                            </div>
                          </div>
                        </div>

                      </div>

                </div>
               </div>
               <!-- next column -->
               <!-- background -->
          </div> 
          <!-- background ends -->
               

          </div>
                                



           <?php
              include_once "partials/footer.php"
              ?>
         
        <!-- body 2 -->
        <!-- footer -->   

