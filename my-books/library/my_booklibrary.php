<?php 

   global $wpdb;
    if($_REQUEST['param']=="save_book"){
        $wpdb->insert(my_book_table(),array(
            "name"=>$_REQUEST['name'],
            "author"=>$_REQUEST['author'],
            "about"=>$_REQUEST['about'],
            "book_image"=>$_REQUEST['image_name']
        ));
        echo json_encode(array("status"=>1,"message"=>"Book Inserted successfully"));  
    }elseif($_REQUEST['param']=="edit_book"){
        $wpdb->update(my_book_table(),array(
            "name"=>$_REQUEST['name'],
            "author"=>$_REQUEST['author'],
            "about"=>$_REQUEST['about'],
            "book_image"=>$_REQUEST['image_name']
        ),array(
            "id"=>$_REQUEST['book_id']
        ));
        echo json_encode(array("status"=>1,"message"=>"Book updated successfully"));  

    }elseif($_REQUEST['param']=="delete_book"){
        $wpdb->delete(my_book_table(),array(
            "id"=>$_REQUEST['id']
        ));
        echo json_encode(array("status"=>1,"message"=>"Book Deleted successfully"));  

    }elseif($_REQUEST['param']=="save_author"){
        $wpdb->insert(my_authors_table(),array(
            "name"=>$_REQUEST['name'],
            "fb_link"=>$_REQUEST['fb_link'],
            "about"=>$_REQUEST['about']
        ));
        echo json_encode(array("status"=>1,"message"=>"Author Created successfully"));
    }