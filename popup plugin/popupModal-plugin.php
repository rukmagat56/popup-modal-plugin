 <?php
  /*
  Plugin Name: popup box plugin
  Plugin uri: www.pop-plugin.com
    Description: This popup is used for popup modal which show three random posts.
    Version: 1.0.0
    Requires at least: 4.0 
    requires php: 5.0
    author: Sunder Kandel
    Author uri:https://github.com/rukmagat56
    License: General public license
    License URI: www.general.com
    text domain:popup
    domain path:/languages


 */

  //--------------------------------------------commom usage------------------------- 
  //  plugins_url( 'myscript.js', __FILE__ );

  // add_filter(
  //     'show_admin_bar','__return_false'
  // );

  ?>
 <?php

  function popup_scripts()
  {
    //wp_enqueue_script('scripts', plugins_url('/assets/js/myscript.js', __FILE__));
    wp_enqueue_style('styless', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css', array(), '5.3', 'all');
    wp_enqueue_script('cdmm', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js', array(), '5.3', true);
    wp_enqueue_script('cdd', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js', array(), '3.6', true);
  }
  add_action('wp_enqueue_scripts', 'popup_scripts');


  add_theme_support('post-thumbnails');

  function popup_show()
  {
    // checking condition for pages
    if (is_page('sample-page') || is_page('contact')) {
  ?>
     <script>
       function popup_modal() {
         var popup_modal_show = sessionStorage.getItem('alreadyShow'); //getting value from session storage
         if (popup_modal_show != 'already shown') //checking for the value
         {
           const popup_box_modal = new bootstrap.Modal('.popup_modals');
           popup_box_modal.show();
           sessionStorage.setItem('alreadyShow', 'already shown'); //setting key and value for sessionStorage
         }
       }
       setTimeout(popup_modal, 3000);

       function popup_exit_intent() {
         var popup_modal_show = sessionStorage.getItem('alreadyShow');
         if (popup_modal_show != 'already shown') {
           const popup_box_modal = new bootstrap.Modal('.popup_modals'); //calling for modal class
           popup_box_modal.show(); //using 
           sessionStorage.setItem('alreadyShow', 'already shown');
         }
       }
       window.addEventListener('mouseout', popup_exit_intent);
     </script>

     <div class="popup_modals modal" id="modal_one" tabindex="-1">
       <div class="modal-dialog">
         <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title">Posts</h5>
             <button type="button" class="close btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
           </div>
           <div class="modal-body">
             <?php
              $args = array(
                'post_type'              => 'post',
                'posts_per_page'  => 2,
                'orderby'            => 'rand', //used to get random post each time
              );
              $post = get_posts($args); //reteriving post from database 
              foreach ($post as $posts) {
              ?>
               <div class="card mt-3">
                 <div class="card-body">
                   <!-- reteriving post titles -->
                   <h3 class="card-title"><?php echo $posts->post_title; ?>
                   </h3>
                   <?php if (get_the_post_thumbnail($posts->ID)) {
                      //reteriving post feature image
                    ?> <?php echo get_the_post_thumbnail($posts->ID); ?>
                 </div>
               <?php } 
                ?>
               <p class="card-text"><?php echo get_the_excerpt($posts->ID);
                                    ?></p>
               <a href="<?php echo get_post_permalink($posts->ID);
                        ?>" class="btn btn-primary">read more</a> <!-- getting permalink for the post -->

               </div>
           </div>
         <?php
              }
          ?>
         </div>
         <div class="modal-footer">
           <button type="button" class="close btn btn-secondary" data-bs-dismiss="modal">Close</button>
         </div>
       </div>
     </div>
     </div>
     </div>
 <?php
    }
  }
  add_action('wp_footer', 'popup_show');
