<?php 
global $wpdb;
$all_authors=$wpdb->get_results(
$wpdb->prepare("select * from ".my_authors_table()." ORDER by id DESC",""),ARRAY_A
);
// print_r($all_books);
 ?>
<div class="container">
	<div class="">
		<div class="alert alert-info">
			<h4>Author List Page</h4>
		</div>
	<div class="panel panel-primary">
  <div class="panel-heading">Author List</div>
  <div class="panel-body">
		<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>s.n</th>
                <th>Name</th>
                <th>Facebook link</th>
                <th>About</th>
                <th>Created at</th>
                <th>Action</th>
            </tr>
              
        </thead>
        <tbody>
        	<?php if(count($all_authors)> 0){
                $i=1;
                foreach ($all_authors as $key => $value) {
                    ?>
                    <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $value['name']; ?></td>
                <td><?php echo $value['fb_link']; ?></td>
                <td><?php echo $value['about']; ?></td>
                <td><?php echo $value['created_at']; ?></td>
                <td>
                    
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