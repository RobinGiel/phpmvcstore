<?php require APPROOT . '/views/inc/header.php'; ?>
    <a href="<?php echo URLROOT; ?>/products" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
    <div class="card card-body bg-light mt-5">
        <h2>Add Product</h2>
        <p>Add a new product with this form </p>
        <form enctype="multipart/form-data" action="<?php echo URLROOT; ?>/products/add" method="post">
        <div class="form-group">
            <label for="name">Product name: <sup>*</sup></label>
            <input type="text" name="name" class="form-control form-control-lg
            <?php echo(!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name']; ?>">
            <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
        </div>
        <div class="form-group">
            <label for="description">Product description: <sup>*</sup></label>
            <textarea name="description" class="form-control form-control-lg
            <?php echo(!empty($data['description_err'])) ? 'is-invalid' : ''; ?>"> <?php echo $data['description']; ?></textarea>
            <span class="invalid-feedback"><?php echo $data['description_err']; ?></span>
        </div>
        <div class="form-group">
            <label for="price">Price: <sup>*</sup></label>
             <input type="number" min="0" step="0.01" data-number-to-fixed="2" data-number-stepfactor="100" name="price" class="form-control form-control-lg
            <?php echo(!empty($data['price_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['price']; ?>">
            <span class="invalid-feedback"><?php echo $data['price_err']; ?></span>
        </div>
        <div class="form-group">
            <label for="category">Category: <sup>*</sup></label>
      <select name="category" class="custom-select mr-sm-2 form-control form-control-lg <?php echo(!empty($data['category_err'])) ? 'is-invalid' : ''; ?>" id="inlineFormCustomSelect">
        <option selected>Choose...</option>
    <?php foreach($data['category'] as $category) : ?>
        <option value="<?php echo $category->categoryId; ?>"><?php echo $category->categoryName; ?></option>
<?php endforeach; ?>
      </select>
            <span class="invalid-feedback"><?php echo $data['category_err']; ?></span>
        </div>
        <div class="form-group">
            <label for="img">Product Image: <sup>*</sup></label>
            <input type="file" name="img" class="form-control form-control-lg
            <?php echo(!empty($data['img_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['img']; ?>">
            <span class="invalid-feedback"><?php echo $data['img_err']; ?></span>
        </div>
        <input type="submit" class="btn btn-success" value="Submit">
        </form>
    </div>


<?php require APPROOT . '/views/inc/footer.php'; ?>