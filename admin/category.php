<?php 

include('includes/header.php');
include('../middleware/adminMiddleware.php');

?>

<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-header">
               <h4>Categories</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Delete</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $category = getAll("categories");
                            if(mysqli_num_rows($category)>0)
                            {
                                foreach($category as $item)
                                {
                                    ?>

                                        <tr>
                                            <td><?= $item['id']; ?></td>
                                            <td><?= $item['name']; ?></td>
                                            <td>
                                                <img src="../uploads/<?= $item['image']; ?>" width="50px" height="50px" alt="<?= $item['image']; ?>">    
                                            </td>
                                            <td>
                                                <?= $item['status']=='0'? "Visible":"Hidden" ?>
                                            </td>
                                            <td>
                                                <a href="edit-category.php?id=<?= $item['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                                
                                            </td>
                                            <td>
                                            <form action="code.php" method="post">
                                                    <input type="hidden" name="category_id" value="<?= $item['id']; ?>">
                                                    <button type="submit" class="btn btn-danger btn-sm" name="delete_category_btn">Delete</button>
                                                </form>
                                            </td>
                                        </tr>

                                    <?php

                                }
                            }
                            else{
                                echo "No record found";
                            }
                        ?>
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php');?>