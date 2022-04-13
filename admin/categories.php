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
                    // if (isset($_POST['add_category'])) {
                    //     $category_name = $_POST['category_name'];
                    //     $sql = "INSERT INTO `categories` (cat_name) VALUES (:cat_name)";
                    //     $result = $conn->prepare($sql);
                    //     $result->bindParam(':cat_name', $cat_name);
                    //     $result->execute();
                    //     if ($result) {
                    //         echo "<div class='alert alert-success'>Category Added Successfully</div>";
                    //     } else {
                    //         echo "<div class='alert alert-danger'>Category Not Added</div>";
                    //     }
                    // }

                                // Kategorileri ekleme 
                                // Kategorinin önyüzden veritabanına eklenmesi

                    if (isset($_POST["add_category"])) {
                        $category_name = $_POST["category_name"];
                    }
                    if (!empty($category_name) ) {
                        $sql = "INSERT INTO categories (cat_name) VALUES (:category_name)";
                        $result = $conn->prepare($sql);
                        $result->bindParam(':category_name', $category_name);
                        $result->execute();
                        if ($result) {
                            echo "<div class='alert alert-success'>Category Added Successfully</div>";
                        } else {
                            echo "<div class='alert alert-danger'>Category Not Added</div>";
                        }
                    }

                    //Kategori sil
                            // if(isset($_POST["delete_category"])){
                            //     $category_id = $_POST["category_id"];
                            //     $sql = "DELETE FROM categories WHERE id = :category_id";
                            //     $result = $conn->prepare($sql);
                            //     $result->bindParam(':category_id', $category_id);
                            //     $result->execute();
                            //     if($result){
                            //         echo "<div class='alert alert-success'>Category Deleted Successfully</div>";
                            //     }else{
                            //         echo "<div class='alert alert-danger'>Category Not Deleted</div>";
                            //     }
                            // }

                    ?>


                    <?php
                    $sql = "SELECT * FROM categories ORDER BY id DESC";
                    $result = $conn->prepare($sql);
                    $result->execute();

                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        // $categories[] = $row;
                        $category_id = $row['id'];
                        $category_name = $row['cat_name'];

                        echo "<tr>
                    <td>{$category_id}</td>
                    <td>{$category_name}</td>
                    <td>

                    <div class='btn-group' data-toggle='buttons'>
                        <form action='' method='post'>
                            <input type='hidden' name='category_id' value='{$category_id}'>
                            <button type='submit' class='btn btn-danger' name='delete_category'>Delete</button>
                        </form>
                        
                    <button class='btn btn-primary' name='add-category' data-toggle='modal' data-target='#modalAdding'> Add Category </button> 
                 
                    <button class='btn btn-warning'  name='edit-category' data-toggle='modal' data-target='#modalEditing'> Edit Category </button>
                  
                    


                   
                    
                    </div>
                  </div>
                    </td>
                </tr>
                
               ";
                    } 
                    
                    if (isset($_POST['delete_category'])) {
                        $category_did = $_POST['category_id'];
                         $sql = "DELETE FROM categories WHERE id = :category_id";
                        $result = $conn->prepare($sql);
                     $result->bindParam(':category_id', $category_did);
                         $result->execute(); }
                    
                    
                    ?>

                    <?php
                    

                    ?>

                                                              <!--MODAL SECTION -->
                                                              <!--Add Category Modal -->
                    <div class="modal fade" id="modalAdding" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Yeni bir kategori ekleyin</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?php $_?>" method="POST">
                                        <div class="form-group">
                                            <label for="category_name">Kategori Adı</label>
                                            <input type="text" class="form-control" id="category_name" name="category_name">
                                        </div>
                                        <button type="submit" class="btn btn-primary" name="add_category">Ekle</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                                    <button type="button" class="btn btn-primary">Kaydet</button> -->
                                </div>
                            </div>
                        </div>
                    </div>

                </tbody>
            </table>
            <?php include "./components/admin_footer.php"; ?>
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
            <script src="js/lightbox-plus-jquery.js"></script>
            <script src="js/owl.carousel.min.js"></script>
            <script src="js/main.js"></script>

            <?php {
                /**
                 * 
                 * 
                 */
            }

            ?>