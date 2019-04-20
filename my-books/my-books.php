<?php
/**
 * Plugin Name: My books
 * Plugin URI:  https://student-list/plugins/the-basics/
 * Description: This plugin provide Books list
 * Version:     1.0
 * Author:      Amit Gupta
 * Author URI:  https://AmitGupta.com/
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: my-books
 * Domain Path: /languages
 */

if(!defined('ABSPATH'))
    exit;
if(!defined('MY_BOOK_PLUGIN_DIR_PATH'))
    define('MY_BOOK_PLUGIN_DIR_PATH',plugin_dir_path( __file__ ));
if(!defined('MY_BOOK_PLUGIN_URL'))
    define('MY_BOOK_PLUGIN_URL',plugins_url().'/my-books');
function my_book_include_assets(){
    $slug='';
$pages_includes=array("book-list","add-new","book-edit","add-author","remove-author","add-student","remove-student","course-tracker");
$currentPage=$_GET['page'];
if(in_array($currentPage, $pages_includes)){
    //styles
    wp_enqueue_style( "bootstrap",MY_BOOK_PLUGIN_URL."/assets/css/bootstrap.min.css");
    wp_enqueue_style( "datatable",MY_BOOK_PLUGIN_URL."/assets/css/datatables.min.css");
    wp_enqueue_style( "notifybar",MY_BOOK_PLUGIN_URL."/assets/css/jquery.notifyBar.css");
    wp_enqueue_style( "style",MY_BOOK_PLUGIN_URL."/assets/css/style.css");

    //scripts
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap.min.js', MY_BOOK_PLUGIN_URL."/assets/js/bootstrap.min.js", array('jquery'), '1.0', true);
    wp_enqueue_script('jquery.validate.min.js', MY_BOOK_PLUGIN_URL."/assets/js/jquery.validate.min.js", array('jquery'), '1.0', true);
    wp_enqueue_script('datatables.min.js', MY_BOOK_PLUGIN_URL."/assets/js/datatables.min.js", array('jquery'), '1.0', true);
    wp_enqueue_script('jquery.notifyBar.js', MY_BOOK_PLUGIN_URL."/assets/js/jquery.notifyBar.js", array('jquery'), '1.0', true);
    wp_enqueue_script('script.js', MY_BOOK_PLUGIN_URL."/assets/js/script.js", array('jquery'), '1.0', true);
    wp_localize_script( "script.js", "mybookajaxurl", admin_url( 'admin-ajax.php'));
}

}
add_action( "init","my_book_include_assets");

function my_book_plugin_menu(){
    add_menu_page( "MY Book", "MY Book", "manage_options", "book-list", "my_book_list", "dashicons-book-alt", 6 );
    add_submenu_page( "book-list", "Book List", "Book List", "manage_options", "book-list", "my_book_list" );
    add_submenu_page( "book-list", "Add New", "Add New", "manage_options", "add-new", "my_book_add" );
    //extended submenus
    add_submenu_page( "book-list", "Add New Author", "Add New Author", "manage_options", "add-author", "my_author_add" );
    add_submenu_page( "book-list", "Manage Author", "Manage Author", "manage_options", "remove-author", "my_author_remove" );
    add_submenu_page( "book-list", "Add New Student", "Add New Student", "manage_options", "add-student", "my_student_add" );
    add_submenu_page( "book-list", "Manage Student", "Manage Student", "manage_options", "remove-student", "my_student_remove" );
    add_submenu_page( "book-list", "Course Tracker", "Course Tracker", "manage_options", "course-tracker", "course_tracker" );
 
    //extended submenus end
    add_submenu_page( "book-list", "", "", "manage_options", "book-edit", "my_book_update" );


}

add_action('admin_menu','my_book_plugin_menu');
function my_author_add(){
    include_once MY_BOOK_PLUGIN_DIR_PATH.'/views/add-author.php';
}
function my_author_remove(){
    include_once MY_BOOK_PLUGIN_DIR_PATH.'/views/manage-author.php';
}
function my_student_add(){
    include_once MY_BOOK_PLUGIN_DIR_PATH.'/views/add-student.php';
}
function my_student_remove(){
    include_once MY_BOOK_PLUGIN_DIR_PATH.'/views/manage-student.php';
}
function course_tracker(){
    include_once MY_BOOK_PLUGIN_DIR_PATH.'/views/course-tracker.php';
}

function my_book_list(){
    include_once MY_BOOK_PLUGIN_DIR_PATH.'/views/book-list.php';
}
function my_book_add(){
    include_once MY_BOOK_PLUGIN_DIR_PATH.'/views/add-new.php';
}
function my_book_update(){
    include_once MY_BOOK_PLUGIN_DIR_PATH.'/views/book-update.php';
}

function my_book_table(){
    global $wpdb;
    return $wpdb->prefix."my_books";//wp_my_books

}
function my_authors_table(){
    global $wpdb;
    return $wpdb->prefix."my_authors";//wp_my_books

}
function my_students_table(){
    global $wpdb;
    return $wpdb->prefix."my_students";//wp_my_books

}
function my_enrol_table(){
    global $wpdb;
    return $wpdb->prefix."my_enrol";//wp_my_books

}
function my_book_generates_table_script(){
    global $wpdb;
    require_once ABSPATH.'wp-admin/includes/upgrade.php';
    $sql="CREATE TABLE `".my_book_table()."` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(250) DEFAULT NULL,
 `author` varchar(255) DEFAULT NULL,
 `about` text,
 `book_image` text,
 `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1";
    dbDelta($sql);

    $sql1="CREATE TABLE `".my_authors_table()."` (
 `id` int(50) NOT NULL AUTO_INCREMENT,
 `name` varchar(250) DEFAULT NULL,
 `fb_link` varchar(250) DEFAULT NULL,
 `about` varchar(250) DEFAULT NULL,
 `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1";
    dbDelta($sql1);

    $sql2="CREATE TABLE `".my_students_table()."` (
 `id` int(50) NOT NULL AUTO_INCREMENT,
 `name` varchar(250) DEFAULT NULL,
 `email` varchar(250) DEFAULT NULL,
 `user_login_id` varchar(250) DEFAULT NULL,
 `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1";
    dbDelta($sql2);

    $sql3="CREATE TABLE `".my_enrol_table()."` (
 `id` int(50) NOT NULL AUTO_INCREMENT,
 `student_id` int(50) NOT NULL,
 `book_id` int(50) NOT NULL,
 `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1";
    dbDelta($sql3);
}
register_activation_hook( __FILE__, "my_book_generates_table_script" );
function drop_table_plugin_books(){
global $wpdb;
$wpdb->query(" DROP TABLE IF EXISTS ".my_book_table());
$wpdb->query(" DROP TABLE IF EXISTS ".my_authors_table());
$wpdb->query(" DROP TABLE IF EXISTS ".my_students_table());
$wpdb->query(" DROP TABLE IF EXISTS ".my_enrol_table());
}
register_deactivation_hook( __FILE__, "drop_table_plugin_books" );

function my_book_ajax_handler(){
  include_once MY_BOOK_PLUGIN_DIR_PATH.'/library/my_booklibrary.php';
    wp_die();
}
add_action("wp_ajax_mybooklibrary","my_book_ajax_handler");