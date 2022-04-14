
<?php include "./components/admin_header.php"; ?>

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
                    <th>Portfolio Name</th>
                    <th>Portfolio Category</th>
                    <th>Small Image</th>
                    <th>Big Image</th>
                    <th>Add - Edit - Delete</th>
                </tr>
            </thead>
            <tbody>
                
            <tr>
                    <td>1</td>
                    <td>Sample Portfolio Name</td>
                    <td>Category Name</td>
                    <td>Sample Small Image</td>
                    <td>Sample Big Image</td>
                    <td>
                        <div class='dropdown'>
                            <button class='btn btn-primary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
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
                </tr>

                <div id="edit_modal" class="modal fade">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Portfolio</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label for="portfolio_name">Portfolio Name</label>
                                        <input type="text" class="form-control" name="portfolio_name">
                                    </div>
                                    <div class="form-group">
                                        <label for="portfolio_category">Portfolio  Category</label>
                                        <input type="text" class="form-control" name="portfolio_category">
                                    </div>

                                    <div class="form-group">
                                        <label for="portfolio_image_sm">Small Image</label>
                                        <input type="file" class="form-control" name="image">
                                    </div>

                                    <div class="form-group">
                                        <label for="portfolio_image_bg">Big Image</label>
                                        <input type="file" class="form-control" name="imagebg">
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="category_id" value="">
                                        <input type="submit" class="btn btn-primary" name="edit_portfolio" value="Edit Portfolio">
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
                                        <label for="portfolio_name">Product Name</label>
                                        <input type="text" class="form-control" name="portfolio_name">
                                    </div>
                                    <div class="form-group">
                                        <label for="portfolio_category">Portfolio  Category</label>
                                        <input type="text" class="form-control" name="portfolio_category">
                                    </div>

                                    <div class="form-group">
                                        <label for="portfolio_image_sm">Small Image</label>
                                        <input type="file" class="form-control" name="image">
                                    </div>

                                    <div class="form-group">
                                        <label for="portfolio_image_bg">Big Image</label>
                                        <input type="file" class="form-control" name="imagebg">
                                    </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" name="add_portfolio" value="Add Portfolio">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php include "./components/admin_footer.php"; ?>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
            <script src="js/lightbox-plus-jquery.js"></script>
            <script src="js/owl.carousel.min.js"></script>
            <script src="js/main.js"></script>
        