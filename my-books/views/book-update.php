<?php wp_enqueue_media(); 
$book_id=isset($_GET['edit'])?intval($_GET['edit']):0; 
global $wpdb;
$book_details=$wpdb->get_row(
        $wpdb->prepare(
                "select * from ".my_book_table(). " where id=%d ", $book_id),ARRAY_A
      );
?>

<div class="container">
	<div class="">
		<div class="alert alert-info">
			<h4>Book Update page</h4>
		</div>
		<div class="panel panel-primary">
  <div class="panel-heading">Update Book</div>
  <div class="panel-body">
<form class="form-horizontal" action="javascript:void(0)" id="frmEditBook" method="post">
  <input type="hidden" name="book_id" value="<?php echo $book_id; ?>">
  <div class="form-group">
    <label class="control-label col-sm-2" for="name">Name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name" placeholder="Enter Name" required name="name" value="<?php echo $book_details['name']; ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="author">Author:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="author" placeholder="Enter author" required name="author" value="<?php echo $book_details['author']; ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="about">About:</label>
    <div class="col-sm-10">
      <textarea class="form-control" id="about" placeholder="Enter about" name="about"><?php echo $book_details['about']; ?></textarea> 
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="image">Upload Book Image</label>
    <div class="col-sm-10">
      <input type="button" class="btn btn-info" id="btn-upload" value="Upload Image">
      <span id="show-image">
        <img src="<?php echo $book_details['book_image']; ?>" alt="" style="height: 80px;width: 80px;">
      </span>
      <input type="hidden" name="image_name" id="image_name" value="<?php echo $book_details['book_image']; ?>">
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Update</button>
    </div>
  </div>
</form>
  </div>
</div>
	</div>
</div>