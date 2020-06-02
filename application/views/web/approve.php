<!DOCTYPE html>
<html lang="en">
<head>
  <title>Approve Articles</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h1>For Admin Use Only</h1>
  

  <table class="table">
    <tr>
      <th>Title</th>
      <th>Date</th>
      <th>Select Author</th>
      <th>Action</th>
    </tr>
    <?php foreach($articles as $article){ ?>
    <form action="<?= site_url('Web/approve_article');?>" method="post">
      <input type="hidden" value="<?= $article['id']; ?>" name="id">
    <tr>
      <td><?= $article['title'];?></td>
      <td><?= $article['created_at'];?></td>
      <td><select class="form-control" name="authors">
        <option value="">As a GUEST</option>
        <?php foreach($authors as $auth){ ?>

        <option value="<?= $auth['id'];?>"><?= $auth['name'];?></option>
        <?php } ?>
      </select></td>
      <td><input type="submit" value="Approve" class="btn btn-success"></td>
    </tr>
    <?php } ?>
  </form>
  </table>
</div>

</body>
</html>
