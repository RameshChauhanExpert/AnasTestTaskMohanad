<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand text-white" href="<?= site_url('feeds/0');?>"><i class="fa fa-flash"></i> Trending</a>
    </div>
    <ul class="nav navbar-nav">
      <!-- <li class="active"><a href="#">Home</a></li> -->
      <?php 
      $categories = GetFeaturedCategories();
      foreach($categories as $category):?>
      <?php if($this->uri->segment(1)=='authors'): ?>
        <li><a href="<?= site_url('authorfeeds/'.$category['id'].'/'.$this->uri->segment(2));?>"><b><?= $category['name']; ?></b></a></li>
      <?php else: ?>        
      <li><a href="<?= site_url('feeds/'.$category['id']);?>"><b><?= $category['name']; ?></b></a></li>
    <?php endif; ?>
      <?php endforeach; ?>
    </ul>
    <a class="btn btn-danger navbar-btn pull-right" href="<?= site_url('add-article'); ?>"><i class="fa fa-plus"></i> Add article</a>
  </div>
</nav>