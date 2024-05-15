
<div class="right_box">
    <div class="products_box">
    <?php if($Flash_message == TRUE) : ?>
    <div class="alert alert-success" role="alert">
        <strong>Product Uplaoded Successfully</strong>
    </div>
    <?php endif; ?>
        <h3>Add Products</h3>
        <form class="login_form" action="<?php echo base_url('/admin/inser_product') ?>" method="POST" enctype="multipart/form-data">
            <select class="login_formele" name="fk_catid">
                <option value="volvo">Products Category</option>
                <!-- This Category comes by ProductController's index method  from category table -->
                <?php foreach($categories as $key => $value): ?>
                <option value="<?= $value['id'] ;?>">
                    <?= $value['cat_name'] ;?>
            </option>
                <?php endforeach; ?>
            </select>
            <input type="text" placeholder="Products Name" name="product_name" class="login_formele" required="">
            <input type="text" placeholder="MRP" name="MRP" class="login_formele" required="">
            <input type="text" placeholder="Selling Price" name="selling_price" class="login_formele" required="">
            <input type="text" placeholder="Quantity" name="qty" class="login_formele" required="">
            <input type="file" placeholder="Choose Product Image" name="product_image" class="login_formele" required="">
        
            <textarea  id="editor"  cols="30" rows="10" placeholder="Description" name="product_desc"></textarea>
            <div class="login_btnsc">
                <button type="submit" class="login_btn">Submit</button>
            </div>
        </form>
    </div>
</div>

<script>
                        ClassicEditor
                                .create( document.querySelector( '#editor' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );
                </script>