<?php
 include "classes/planclass.php";

 $type2 = new plan();
 $rows = $type2 -> read();
//  print_r($result);
?>
<table class="table table-dark table-striped-columns" id="myTable">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Plan</th>
                                    <th scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php
                                   $i = 1;
                                   
                                   if(!empty($rows))
                                   {
                                    foreach ($rows as $row){
                                   
                                    ?>
                                  <tr>
                                    <td><p><b><?php echo $row['id']?></b></p></td>

                                    <td>
                                        <p>Years/Months: <?php echo $row['months']?></p><br>
                                        <p>Interest: <?php echo $row['interest_percentage']?>%</p><br>
                                        <p>Penalty-rate: <?php echo $row['penalty_rate']?>%</p><br>
                                    </td>
                                    <td>
                                      <a href="editplan.php?id=<?php echo $row['id']?>" class="h4 mx-2"><i class="fa-solid fa-pen-to-square"></i></a>
                                      <a id="delete" value="<?php echo $row['id']?>" class="h4"><i class="fa-solid fa-trash"></i></a>
                                          <!-- Button trigger modal -->
                                              <!-- Modal -->
                                              <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                      ...
                                                    </div>
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-primary">Submit</button>
                                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                    </td>
                                  </tr>
                                  <?php
                                    }
                                } 
                                  ?>
                                </tbody>
                              </table>
                              <div class="pagination-container">
                              <ul class="pagination" id="pagination"></ul>
                              </div>
<script type="text/javascript" src="jquery.js"></script>


<script>
$(document).ready(function() {
    var table = $('#myTable');
    var tbody = table.find('tbody');
    var rows = tbody.find('tr');
    var numRows = rows.length;
    var numPerPage = 1; // Number of rows per page

    // Calculate the number of pages
    var numPages = Math.ceil(numRows / numPerPage);

    // Generate the pagination links
    var pagination = $('#pagination');
    for (var i = 1; i <= numPages; i++) {
        pagination.append('<li class="page-item"><a class="page-link" href="#">' + i + '</a></li>');
    }

    // Initially, display the first page
    displayPage(1);

    // Function to display a specific page
    function displayPage(pageNum) {
        tbody.find('tr').hide();
        var startIndex = (pageNum - 1) * numPerPage;
        var endIndex = Math.min(startIndex + numPerPage, numRows);
        rows.slice(startIndex, endIndex).show();
    }

    // Handle pagination link clicks
    pagination.find('a').click(function() {
        var page = parseInt($(this).text());
        displayPage(page);
        $(this).parent().addClass('active').siblings().removeClass('active');
    });
});


</script>

