<!DOCTYPE html>
<html lang="en">
  <?php error_reporting(0); include 'header.php'; ?>
<body>

<?php include 'nav.php'; ?>

<div class="container-fluid"><br>
  <div class="row"> 

  <div class="col-md-3">
    
  </div>  
  
  <div class="col-md-6">     
 
  <form id="add_post_form" method="post" enctype="multipart/form-data">
    <div class="row">
      <div class="col-md-12">
        <h4>Post Article</h4>
      </div>
      
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label>Post Title</label>
          <input type="text" class="form-control" name="title" required>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label>Post Category</label>
          <select class="form-control" name="category" required>
           <?php foreach($allcategories as $allcategory):?>
           <option value="<?= $allcategory['id']; ?>"><?= $allcategory['name']; ?></option>
           <?php endforeach; ?>
          </select>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label>Post Text/Body</label>
          <textarea class="form-control" name="content" required rows="5"></textarea>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label>File Upload</label>
          <input type="file" class="form-control" name="image" id="file" required>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6 text-center">       
          <button type="submit" class="btn btn-success">Save for Admin</button>        
      </div>
      <div class="col-md-6 text-center">         
           <a href="<?= site_url(); ?>" class="btn btn-info">Back To News</a>         
      </div>
    </div>
  </form>
  </div>
  <div class="col-md-3">
    
  </div> 
  </div>
</div>



<?php include 'footer.php'; ?>
</body>
</html>
