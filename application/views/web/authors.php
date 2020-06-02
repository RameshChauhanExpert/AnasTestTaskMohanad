<!DOCTYPE html>
<html lang="en">
  <?php error_reporting(0); include 'header.php'; ?>
<body>

<?php include 'nav.php'; ?>

<div class="container-fluid"><br>

  <div class="container">
    

  
    <div class="row">  
    <div class="col-md-12 text-center">
      <h3>Author: <?= $this->uri->segment(2)==0 ? 'GUEST' : GetForeignKey('authors','id',$this->uri->segment(2),'name');?></h3>
    </div>    
   
    <?php if($articles ): foreach($articles as $key): ?>
    <div class="row">
      <div class="col-md-4 text-right">
        <img src="<?= site_url('assets/uploads/articles/'.$key['image']);?>" class="img-block">
        <div class="div-overlay">
          <span><i class="fa fa-eye"></i>: 12</span> <br> <span><i class="fa fa-comment-o"></i>: 22</span> <br> <span><i class="fa fa-clock-o"></i>: <?= date('d-M-Y',strtotime($key['created_at'])); ?></span>
          </div>
        </div>
      <div class="col-md-8">
        <h3><?= $key['title'];?></h3>
        <p>By <a href="<?= site_url('authors/'.$key['authors']); ?>"><?= $key['authors'] == 0 ? 'GUEST' : GetForeignKey('authors','id',$key['authors'],'name');?></a></p>
        <p><?= $key['content']; ?></p>
      </div>
    </div>
    <br>
   <?php endforeach; else: ?>
   <p>No more articles</p>
   <?php endif; ?>   
      
    </div>

  </div>
</div>



<?php include 'footer.php'; ?>
</body>
</html>
