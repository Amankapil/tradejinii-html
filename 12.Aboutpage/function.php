<?php
/**
 * Recommended way to include parent theme styles.
 * (Please see http://codex.wordpress.org/Child_Themes#How_to_Create_a_Child_Theme)
 *
 */  

add_action( 'wp_enqueue_scripts', 'oceanwp_child_style' );
				function oceanwp_child_style() {
					wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
					wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style') );
				}

 function tradejini_custom_scripts() {
  wp_enqueue_script( 'custom-js', get_stylesheet_directory_uri() . '/js/custom.js', array( 'jquery' ),'',true );
  wp_enqueue_script( 'journy-js', get_stylesheet_directory_uri() . '/js/journy.js', array( 'jquery' ),'',true );
 }
 add_action( 'wp_enqueue_scripts', 'tradejini_custom_scripts' );
                
/**
 * Your code goes below.
 */
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {
	$filetype = wp_check_filetype( $filename, $mimes );
	return [
		'ext'             => $filetype['ext'],
		'type'            => $filetype['type'],
		'proper_filename' => $data['proper_filename']
	];
  
  }, 10, 4 );
  
  function cc_mime_types( $mimes ){
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
  }
  add_filter( 'upload_mimes', 'cc_mime_types' );
  
  function fix_svg() {
	echo '<style type="text/css">
		  .attachment-266x266, .thumbnail img {
			   width: 100% !important;
			   height: auto !important;
		  }
		  </style>';
  }
add_action( 'admin_head', 'fix_svg' );

/************Custom Footer Widget**************/  
function register_widget_areas() {
	register_sidebar( array(
	  'name'          => 'Top Footer 1',
	  'id'            => 'top_footer_one',
	  'description'   => 'This widget area description',
	  'before_widget' => '<section class="footer-area footer-top-one">',
	  'after_widget'  => '</section>',
	  'before_title'  => '<h4>',
	  'after_title'   => '</h4>',
	));
	register_sidebar( array(
		'name'          => 'Top Footer 2',
		'id'            => 'top_footer_two',
		'description'   => 'This widget area description',
		'before_widget' => '<section class="footer-area footer-top-two">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	  ));
	register_sidebar( array(
		'name'          => 'Top Footer 3',
		'id'            => 'top_footer_three',
		'description'   => 'This widget area description',
		'before_widget' => '<section class="footer-area footer-top-three">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	  ));
	register_sidebar( array(
		'name'          => 'Top Footer 4',
		'id'            => 'top_footer_four',
		'description'   => 'This widget area description',
		'before_widget' => '<section class="footer-area footer-top-four">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	  ));  	
  } 
add_action( 'widgets_init', 'register_widget_areas' );
/************Search Bar In Menu**************/  
function custom_search_menu( $items, $args ) {
    return $items."<li class='menu-header-search'>".get_search_form(false)."</li><button class='menu-signup'><a href='https://pre-prod.tradejini.com/open-account/'>Sign up</a></button>";
  }
add_filter('wp_nav_menu_items','custom_search_menu', 10, 2);

// Create Shortcode to Display Teams Post Types  
function custom_create_shortcode_teams_post_type(){
    $args = array(
                    'post_type'      => 'team',
                    'posts_per_page' => '8',
                    'publish_status' => 'published',
					'orderby' => 'publish_date',
    				'order' => 'ASC'
                 );  
    $query = new WP_Query($args); 
    if($query->have_posts()) :
		$result='';
		$result .= '<div class="teams-list">';
        while($query->have_posts()) :             
            $query->the_post() ;			
			$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');              
			$result .= '<div class="teams-list-items"><div class="teams"><div class="teams-container">';
			$result .= '<img class="img-fluid brand-img" src="'.$featured_img_url.'" />';
			$result .= '<div class="teams-desc-container"><div class="team-desc"></div>';
			$result .= '<div class="team-social"><a target="_blank"  href="'. get_field("linkedin_url").'"><img src="https://tradejini.com/wp-content/uploads/2023/06/mdi_linkedin-white.svg"/></a>';
			$result .= '<a target="_blank"  href="'. get_field("twitter_link").'"><img src="https://tradejini.com/wp-content/uploads/2023/06/twitter-fill-white.svg"/></a></div>';
			$result .= '</div>';
			$result .= '</div></div>';
			$result .= '<div class="team-name">' . get_the_title() . '</div>';
			$result .= '<div class="team-pos">' . get_field("position") . '</div></div>';
        endwhile;
		$result .= '</div>';
        wp_reset_postdata();  
    endif;     
    return $result;            
}  
add_shortcode( 'teams-list', 'custom_create_shortcode_teams_post_type' );   
// shortcode code ends here
// Create Shortcode to Display Event Post Types  
function custom_create_shortcode_events_post_type(){
    $args = array(
                    'post_type'      => 'event',
                    'posts_per_page' => '4',
                    'publish_status' => 'published',
					'orderby' => 'publish_date',
    				'order' => 'ASC'
                 );  
    $query = new WP_Query($args); 
    if($query->have_posts()) :
		$output='';
		$output .= '<div class="event-container">';
        while($query->have_posts()) :             
            $query->the_post() ;			
			$output .= '<div class="eventcard"><div class="location-date"><div class="event-loc">' . get_field("location") . '</div>';
            $output .= '<div class="event-date">' . get_field("event_date") . '</div></div>';
			$output .= '<h3>' . get_the_title() . '</h3>';            
			$output .= '<p>' . get_the_excerpt() . '</p>';
            ?>
            <?php
            $posttags = get_the_tags();
            if ( $posttags ) {
                foreach( $posttags as $tag ) {
                    $output .= '<p class="post-tags" style="opacity:1"><a>'.$tag->name . '</a></p>';
                }
            } 
			$output .= '<a class="view-gallery" href="'.get_permalink().'">View Gallery</a></div>';			
        endwhile;
		$output .= '</div>';
        wp_reset_postdata();  
    endif;     
    return $output;          
}  
add_shortcode( 'events-list', 'custom_create_shortcode_events_post_type' );   
// shortcode code ends here    
/**
 * Filter the excerpt length to 18 words on single post
 *
 * @param int $length Excerpt length.
 * @return int modified excerpt length.
 */

function custom_excerpt_length( $length ) {
    if ( is_single() ) {
        return 18;
	}
    else {
        return $length;
    }
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function custom_pagination($numpages = '', $pagerange = '', $paged='') {
	if (empty($pagerange)) {
		$pagerange = 2;
	}
	global $paged;
	   if (empty($paged)) {
		$paged = 1;
	}
   if ($numpages == '') {
	  global $wp_query;
	   $numpages = $wp_query->max_num_pages;
	   if(!$numpages) {
		$numpages = 1;
	  }
  }
  $pagination_args = array(
	  'base'            => get_pagenum_link(1) . '%_%',
	  'total'           => $numpages,
	  'current'         => $paged,
	 'show_all'             => False,
	 'end_size'             => 1,
	 'mid_size'             => $pagerange,
	 'prev_next'        => true,
	 'prev_text'        => __('«' , 'swift'),
	 'next_text'        => __('»' , 'swift'),
	 'type'             => 'array',
	 'add_args'             => false,
	 'add_fragment'     => ''
	); 
	 $paginate_links = paginate_links($pagination_args);
	  echo '<div id="pagination-num"><ul>';
		 foreach ( $paginate_links as $paginate_link ) {
				echo "<li> $paginate_link </li>";
		   }
	   echo '</ul></div>';
}

// Create Shortcode to Display testimonial Post Types  
function custom_create_shortcode_testimonial_post_type(){
    $args = array(
                    'post_type'      => 'testimonial'
                 );  
    $query = new WP_Query($args); 
    if($query->have_posts()) :
		$output1='';
		$output1 .= '<div class="slick-wrapper">';
		$output1 .= '<div id="slick1">';
        while($query->have_posts()) :             
            $query->the_post() ;
			$rating = get_field('start_rating');
			$testimonial_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');	
			$output1 .='<div class="slide-item">';	
			$output1 .= '<div class="test-top-section"><img class="test-img" src="'.$testimonial_img_url.'" />';	
			$output1 .= '<div class="test-title">' . get_the_title() .'<br>'.get_field("designation").'</div></div>'; 
			for ($i = 0; $i < $rating; $i++) {
				$output1 .= "<div class='star-list'><img src='https://tradejini.com/wp-content/uploads/2023/06/start-icon.svg'></div>";
			} 			           
			$output1 .= '<div class="test-desc">' . wp_strip_all_tags(get_the_content()) . '</div>';           
			$output1 .='</div>';				
        endwhile;
        wp_reset_postdata();  
		$output1 .= '</div></div>';
    endif;     
    return $output1;          
}  
add_shortcode( 'testimonial-list', 'custom_create_shortcode_testimonial_post_type' );   
// shortcode code ends here    

// Getting the job list based on category query
add_action('wp_ajax_get_job_data', 'get_job_data');
add_action('wp_ajax_nopriv_get_job_data', 'get_job_data');
function get_job_data()
{
    global $wpdb;
     $whatever = $_POST['category'];
    ?>
    <?php
     // Define query args in a variable, it will help us to add tax query conditionally.
    
     $query_args =  array(
            'post_type'      => 'job',
            'posts_per_page' => 4,                    
            'tax_query'      => array(
                array(
                    'taxonomy' => 'job-category',
                    'field'    => 'name',
                    'terms'    => $whatever,
                ),
            ),
        );
    
    $custom_query = new WP_Query($query_args); ?>
    <?php if ($custom_query->have_posts()): ?>
        <?php
        $i = 1;
        $j = 1;
        ?>
        <!-- the loop -->
        <?php while ($custom_query->have_posts()):
            $custom_query->the_post(); ?>
            <article class="news-post-list">
                <p>
                    <storng>
                        <?php the_title();
                        echo $i . $j ?>
                    </storng>
                </p>
                <div class="job-location">
                    <?php echo get_field("job_location") ?>
                </div>
                <button class="learnmore" data-open="modal<?php echo $i ?>">Learn More</button>
                <div class="reveal" id="modal<?php echo $i ?>" data-reveal>
                    <h2>
                        <?php the_title(); ?>
                    </h2>
                    <div class="job-location">
                        <?php echo get_field("job_location") ?>
                    </div>
                    <?php the_content(); ?>
                    <h4>Are you Match?</h4>
                    <button class="applybtn" data-open="secondmodal<?php echo $j ?>">Apply Now</button>
                    <button class="close-button" data-close type="button"><span aria-hidden="true">×</span></button>
                </div>

                <div class="reveal" id="secondmodal<?php echo $j ?>" data-reveal>
                    <h3>
                        <?php the_title(); ?>
                    </h3>
                    <div class="job-location">
                        <?php echo get_field("job_location") ?>
                    </div>
                    <div id="job-ninja-form">
                        <?php echo do_shortcode('[ninja_form id=5]'); ?>
                    </div>
                    <button class="close-button" data-close type="button"><span aria-hidden="true">×</span></button>
                </div>
            </article>
            <?php
            $i++;
            $j++;
        ?>
        <?php endwhile; ?>
        <!-- end of the loop -->
    <?php else: ?>
        <p>
            <?php _e('Sorry, no posts matched your criteria.'); ?>
        </p>
    <?php endif;
    die();
}

function create_faq_post_type() {
    register_post_type('faq',
        array(
            'labels' => array(
                'name' => __('FAQs'),
                'singular_name' => __('FAQ'),
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor'),
        )
    );
}
add_action('init', 'create_faq_post_type');

function create_faq_taxonomy() {
    register_taxonomy(
        'faq_category',
        'faq',
        array(
            'label' => __('FAQ Categories'),
            'rewrite' => array('slug' => 'faq-category'),
            'hierarchical' => true,
        )
    );
}
add_action('init', 'create_faq_taxonomy');