<?php 
global $wpdb;
$all_books=$wpdb->get_results(
$wpdb->prepare("select * from ".my_book_table()." ORDER by id DESC",""),ARRAY_A
);
// print_r($all_books);
 ?>
<div class="container">
	<div class="">
		<div class="alert alert-info">
			<h4>book List Page</h4>
		</div>
	<div class="panel panel-primary">
  <div class="panel-heading">Book List</div>
  <div class="panel-body">
		<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>s.n</th>
                <th>Name</th>
                <th>Author</th>
                <th>About</th>
                <th>Book Image</th>
                <th>Created at</th>
                <th>Action</th>
            </tr>
              
        </thead>
        <tbody>
        	<?php if(count($all_books)> 0){
        		$i=1;
        		foreach ($all_books as $key => $value) {
        			?>
        			<tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $value['name']; ?></td>
                <td><?php echo $value['author']; ?></td>
                <td><?php echo $value['about']; ?></td>
                <td><img src="<?php  echo $value['book_image']; ?>" alt="" style="height: 80px;width: 80px"></td>
                <td><?php echo $value['created_at']; ?></td>
                <td>
                	<a href="admin.php?page=book-edit&edit=<?php echo $value['id']; ?>" class="btn btn-info">Edit</a>
                	<a href="javascript:void(0)" class="btn btn-danger btnbookdelete" data-id="<?php echo $value['id']; ?>" >Delete</a>

                </td>
            </tr>
        			<?php
        		}
        	} ?>
        	
        </tbody>
        
    </table>
  </div>
</div>
	</div>
</div>