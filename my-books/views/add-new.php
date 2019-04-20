
<?php wp_enqueue_media(); ?>

<div class="container">
	<div class="">
		<div class="alert alert-info">
			<h4>Book Add Page</h4>
		</div>
		<div class="panel panel-primary">
  <div class="panel-heading">Add New Book</div>
  <div class="panel-body">
<form class="form-horizontal" action="javascript:void(0)" id="frmAddBook">
  <div class="form-group">
    <label class="control-label col-sm-2" for="name">Name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" required id="name" placeholder="Enter Name" name="name">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="author">Author:</label>
    <div class="col-sm-10">
      <select name="author" id="author" class="form-control">
        <option value="-1">-- choose author --</option>

              <?php 
global $wpdb;
$all_authors=$wpdb->get_results(
$wpdb->prepare("select id, name from ".my_authors_table()." ORDER by id DESC",""),ARRAY_A
);
foreach ($all_authors as $key => $value) {
  ?>
        <option value="<?php echo $value['name']; ?>"><?php echo $value['name'];  ?></option>

  <?php
}
 ?>

      </select>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="about">About:</label>
    <div class="col-sm-10">
      <textarea class="form-control" id="about" required placeholder="Enter about" name="about"></textarea> 
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="image">Upload Book Image</label>
    <div class="col-sm-10">
      <input type="button" class="btn btn-info" id="btn-upload" value="Upload Image">
      <span id="show-image"></span>
      <input type="hidden" name="image_name" id="image_name">
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Submit</button>
    </div>
  </div>
</form>
  </div>
</div>
	</div>
</div>