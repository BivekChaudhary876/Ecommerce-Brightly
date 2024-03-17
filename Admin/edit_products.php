<div class="container mt-5 mb-4">
    <h1 class="text-center">Edit Product</h1>
    <form action="" method="post" enctype="multipart/form-data">
    <div class="form-outline w-50 m-auto">
        <label for="product_title" class="form-lable"> Product Title </label>
        <input type="text" id="product_title" name="product_title" class="form-control">
    </div>
    <div class="form-outline w-50 m-auto mb-4">
        <label for="product_description" class="form-lable"> Product Description </label>
        <input type="text" id="product_description" name="product_description" class="form-control">
    </div>
    <div class="form-outline w-50 m-auto mb-4">
        <label for="product_keywords" class="form-lable"> Product Keywords </label>
        <input type="text" id="product_keywords" name="product_keywords" class="form-control" required="required">
    </div>

    <div class="form-outline w-50 m-auto mb-4">
    <label for="product_category" class="form-lable"> Product Categories</label>
        <select name="product_category" class="form-select">

            <option value="">1</option>
            <option value="">2</option>
            <option value="">3</option>
            <option value="">4</option>
            <option value="">5</option>
        </select>

    </div>
    <div class="form-outline w-50 m-auto mb-4">
    <label for="product_brands" class="form-lable"> Product Brands</label>
        <select name="product_brands" class="form-select">

            <option value="">1</option>
            <option value="">2</option>
            <option value="">3</option>
            <option value="">4</option>
            <option value="">5</option>
        </select>

    </div>

    <div class="form-outline w-50 m-auto mb-4">
    <label for="product_image1" class="form-lable"> Product Image1</label>
    <div class="d-flex">
        <input type ="" id="product_image1" name="product_image1" class="form-control w-90 m-auto" required="required">
        <img src="./product_images/apple.jpg" alt="" class="product_img">
    </div>
</div>
    <div class="form-outline w-50 m-auto mb-4">
    <label for="product_image2" class="form-lable"> Product Image2</label>
    <div class="d-flex">
        <input type ="" id="product_image2" name="product_image2" class="form-control w-90 m-auto" required="required">
        <img src="./product_images/mango.jpg" alt="" class="product_img">
    </div>
</div>
    <div class="form-outline w-50 m-auto mb-4">
    <label for="product_image3" class="form-lable"> Product Image3</label>
    <div class="d-flex">
        <input type ="" id="product_image3" name="product_image3" class="form-control w-90 m-auto" required="required">
        <img src="./product_images/mango1.jpg" alt="" class="product_img">
    </div>
</div>
    <div class="form-outline w-50 m-auto mb-4">
        <label for="product_price" class="form-lable"> Product Price </label>
        <input type="text" id="product_price" name="product_price" class="form-control" required="required">
    </div>
<div class="text-center">
    <input type="submit" name="edit_product" name="edit_product" value="update product"
    class="btn btn-info px-3 mb-3">
</div>


    
</form>

</div>
