<?php
    

    include ('functions/userfunctions.php'); 
    include ('includes/header.php'); 
 ?>
  
<div class="py-3 bg-primary">
    <div class="container">
        <h6 class="text-white"> 
            <a class="text-white" href="index.php">
                Home / 
            </a>
            <a class="text-white" href="cart.php">
                Cart
            </a>
        </h6>
    </div>

</div>
<div class="py-5">
    <div class="container">
        <div class="">

       
            <div class="row">
                <div class="col-md-12">

                    <!-- <div class="row align-items-center mt-3">
                        <div class="col-md-5">
                            <h5>Product</h5>                            
                        </div>
                        <div class="col-md-3">
                            <h5>Price</h5>                  
                        </div>
                        <div class="col-md-2">
                            <h5>Quantity</h5>                  
                        </div>
                        <div class="col-md-2">
                            <h5>Remove</h5>
                        </div>
                    </div> -->

                    <?php
                        $items = getCartItems();

                        foreach($items as $citem){
                            ?>

                            <div class="card product-data shadow-sm mb-3">
                                <div class="row align-items-center mt-3">
                                    <div class="col-md-2">
                                        <h5><b>Product Image</b></h5>
                                        <img src="uploads/<?= $citem['image'];?>" alt="image" width="80px" class="mb-3 ml-3">
                                    </div>
                                    <div class="col-md-3">
                                        <h5><b>Product Name</b></h5>
                                        <h6><?= $citem['name'];?></h6>                            
                                    </div>
                                    <div class="col-md-3">
                                        <h5><b>Price</b></h5>
                                        <h6>Rs <?= $citem['selling_price'];?></h6>                            
                                    </div>
                                    <div class="col-md-2">
                                        <h5><b>Quantity</b></h5>
                                        <div class="input-group mb-3" style="width:130px">
                                            <button class="input-group-text decrement-btn">-</button>
                                            <input type="text" class="form-control bg-white text-center input-qty" value="<?= $citem['prod_qty'];?>" disabled>
                                            <button class="input-group-text increment-btn">+</button>
                                        </div>                         
                                    </div>
                                    <div class="col-md-2">
                                        <h5><b>Remove</b></h5>
                                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash mr-2"></i>Remove</button>
                                    </div>
                                </div>
                            </div>

                            <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include ('includes/footer.php'); ?>
