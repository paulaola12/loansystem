<?php
include_once "classes/borrowerclass.php";

    $id = $_POST['delete_id'];
    // echo $id;
    
    $type = new Borrow();
    $delete = $type -> delete($id);

    if($delete){
            echo '<div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong> Deleted : data deleted successfully </strong>
                 </div>';
    }
        else
        {
            echo '<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong> fail to delete data </strong>
                  </div>' ;
        }
    
?>