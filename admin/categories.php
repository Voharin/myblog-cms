<?php include "../admin/components/admin_header.php"; ?>
<?php include "./components/admin_navbar.php"; ?>
<div id="wrapper">
   
     <?php include "./components/admin_sidebar.php"; ?> 
 
 


<div id="content-wrapper">
    <div class="container-fluid">
        <h1>Welcome to Admin Page</h1>
        <hr>

        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Category Name</th>
                    <th>Add - Edit - Delete</th>
                </tr>
            </thead>
            <tbody>

            <?php
            $sql = "SELECT * FROM categories";
            $result = $conn->prepare($sql);
            $result->execute();

            while($row = $result->fetch(PDO::FETCH_ASSOC)){
                // $categories[] = $row;
                $category_id = $row['id'];
                $category_name = $row['cat_name'];

                    echo "<tr>
                    <td>{$category_id}</td>
                    <td>{$category_name}</td>
                    <td>
                        <div class='dropdown'>
                            <button class='btn btn-danger dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                Actions
                            </button>
                            <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                                <a class='dropdown-item' data-toggle='modal' data-target='#edit_modal' href='#'>Edit</a>
                                <div class='dropdown-divider'></div>
                                <a class='dropdown-item' href='#'>Delete</a>
                                <div class='dropdown-divider'></div>
                                <a class='dropdown-item' data-toggle='modal' data-target='#add_modal'>Add</a>
                            </div>
                        </div>
                    </td>
                </tr>";

            }
    
    ?>
            
                <div id="edit_modal" class="modal fade">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="post">
                                    <div class="form-group">

                                        <input value="" type="text" class="form-control" name="category_namex">
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="category_id" value="">
                                        <input type="submit" class="btn btn-primary" name="edit_category" value="Edit Category">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </tbody>
        </table>

        <div id="add_modal" class="modal fade">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" name="category_name">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" name="add_category" value="Add Category">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
            <?php include "./components/admin_footer.php"; ?>

