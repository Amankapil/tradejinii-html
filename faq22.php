<?php
/*
Template Name: FAQ Template
*/
get_header();
?>
 
 <section class="hero-support bg-[#F8FBF8] flex  justify-between items-start pt-60 px-80">
      <div class="left-faq">
        
   
        <div class="mainhero flex  justify-start items-center pt-2 ">
            <h1 class="heroheading">
                Support Portal
            </h1>

        </div>

        <div class="query flex mt8  justify-start items-start flex-col">
            <div class="flex items-center justify-start">

                <p class="spanq -m[30%] max-sm:ml-0 my-5 py-6 max-sm:my-0">
                    search you query here
                </p>
            </div>

            <div class="flex items-center justify-center">

<div class="faq-search" style="margin-top:00px">
    <input type="text" id="faq-search-input" placeholder="Eg: how does tradejini cube work?...">
</div>
               
                <img class="-ml-8"
                    src="./supprtsvgs/search.svg"
                    alt="">
            </div>
            <button class="loginnsupprt -ml10 mt-10  max-[1100px]:ml-0">
                search </button>
        </div>
 </div>
 
  <div class="right-faq ml-52">
         <div class="leftgneral">
                
                <div class="">



                    <div class="call mt-16 ">
                        <div class="flex">


                            <img src="https://tradejini.com/wp-content/uploads/2023/08/Group-35337.svg"
                                alt="">
                            <h1 class="cal mx-5 ">
                                Call &Trade
                            </h1>
                        </div>
                        <p class="num-faq my-7">
                          
                            
                              <a href="tel:  080-26086600">080-26086600</a>
                            <span class="slax">
                                |
                            </span>
                          
                             <a href="tel:080-40204040">080-40204040</a>
                        </p>
                    </div>
                    <div class="call mt-10 ">


                        <div class="flex">
                            <img src="https://tradejini.com/wp-content/uploads/2023/08/Vector.svg"
                                alt="">
                            <h1 class="cal mx-5 ">
                                Mail
                            </h1>
                        </div>
                        <p class="num-faq my-7 ml[15%]">
                            
                            <a href="mailto:help@tradejini.com">help@tradejini.com</a>

                          
                        </p>
                    </div>

                    <div class="call mt-16  mb-[40%] ">
                        <div class="flex">

                            <img src="https://tradejini.com/wp-content/uploads/2023/08/Vector-2.svg"
                                alt="">
                            <h1 class="cal mx-5 ">
                                Support
                            </h1>
                        </div>
                        <p class="num-faq my-7">
                            <a href="tel:080-40204020">080-40204020</a>
                          
                        </p>
                    </div>

                </div>
            </div>
    </div>


    </section>





<div class="row row-sidebar px-80 py-40" style="display:flex">
<div class="faq-sidebar">
    <aside id="secondary" class="widget-area">
    <ul class="faq-categories">
        <?php
        $faq_categories = get_terms(array(
            'taxonomy' => 'faq_category',
            'hide_empty' => false,
            'parent' => 0,
        ));

        // Find the "All" category and move it to the beginning of the array
        $all_category = null;
        foreach ($faq_categories as $index => $faq_category) {
            if ($faq_category->slug === 'all') {
                $all_category = $faq_category;
                unset($faq_categories[$index]);
                break;
            }
        }
        if ($all_category) {
            array_unshift($faq_categories, $all_category);
        }

        foreach ($faq_categories as $faq_category) {
            $category_icon = get_field('faq_category_icon', 'faq_category_' . $faq_category->term_id); // Replace with ACF field name

            echo '<li class="faq-category">';
            echo '<a href="#" class="category-toggle" data-category="' . $faq_category->slug . '">';

            // Display the category icon
            if ($category_icon) {
                echo '<img src="' . esc_url($category_icon['url']) . '" alt="' . esc_attr($faq_category->name) . '" class="category-icon" />';
            }

            echo $faq_category->name . '</a>';

            $faq_subcategories = get_terms(array(
                'taxonomy' => 'faq_category',
                'hide_empty' => false,
                'parent' => $faq_category->term_id,
            ));

            if ($faq_subcategories) {
    $reversed_subcategories = array_reverse($faq_subcategories); // Reverse the array
    echo '<ul class="faq-subcategories">';
    foreach ($reversed_subcategories as $faq_subcategory) {
        echo '<li class="faq-subcategory">';
        echo '<a href="#"  data-category="' . $faq_subcategory->slug . '">' . $faq_subcategory->name . '</a>';
        echo '</li>';
    }
    echo '</ul>';    
}
echo '</li>';
        }
        ?>
    </ul>
</aside>


    
</div>

<div class="faq-accordion" style="width:80%">
    <?php
    $args = array(
        'post_type' => 'faq',
        'posts_per_page' => -1,
    );
    $faq_query = new WP_Query($args);

    if ($faq_query->have_posts()) :
        $faq_items = array(); // Initialize an array to store the FAQ items
        while ($faq_query->have_posts()) : $faq_query->the_post();
            $faq_categories = get_the_terms(get_the_ID(), 'faq_category');
            $faq_classes = '';
            if ($faq_categories && !is_wp_error($faq_categories)) {
                foreach ($faq_categories as $faq_category) {
                    $faq_classes .= ' category-' . $faq_category->slug;
                    $faq_parents = get_ancestors($faq_category->term_id, 'faq_category');
                    if ($faq_parents && !is_wp_error($faq_parents)) {
                        foreach ($faq_parents as $faq_parent) {
                            $faq_classes .= ' subcategory-' . get_term($faq_parent, 'faq_category')->slug;
                        }
                    }
                }
            }
            ob_start(); // Start output buffering
            ?>
            <div class="faq-item<?php echo esc_attr($faq_classes); ?>">
                <div class="flex justify-between items-center faq-question">
                    <h3 class="head-faq"><?php the_title(); ?></h3>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M17 10L12 15L7 10H17Z" fill="black"/>
                        </svg>
                    </div>
                </div>
                <div class="faq-answer">
                    <?php the_content(); ?>
                </div>
            </div>
            <?php
            $faq_items[] = ob_get_clean(); // Store the buffered content in the array
        endwhile;

        // Loop through the array in reverse order
        for ($i = count($faq_items) - 1; $i >= 0; $i--) {
            echo $faq_items[$i]; // Output the stored content
        }

    endif;
    wp_reset_postdata();
    ?>
</div>
</div>

<?php get_footer(); ?>



<script>

jQuery(document).ready(function($) {
    // Initially hide all subcategories
    $('.faq-subcategories').hide();

    // Toggle effect for FAQ categories and subcategories
    $('.category-toggle').click(function(e) {
        e.preventDefault();
        var $categoryItem = $(this).parent('.faq-category');
        var $subcategories = $categoryItem.find('.faq-subcategories');

        if ($categoryItem.hasClass('active')) {
            $subcategories.slideUp(400); // Change the duration (in milliseconds) for closing
            $categoryItem.removeClass('active');
        } else {
            // Close previously opened subcategories
            $('.faq-category.active').not($categoryItem).removeClass('active');
            $('.faq-subcategories').not($subcategories).slideUp(400); // Change the duration (in milliseconds) for closing

            // Open current subcategories
            $subcategories.slideDown(400); // Change the duration (in milliseconds) for opening
            $categoryItem.addClass('active');
        }
    });

});



jQuery(document).ready(function($) {
    $('.faq-question').click(function() {
        $(this).toggleClass('active');
        $(this).siblings('.faq-answer').slideToggle('fast');
    });

    function applyHighlighting(searchText) {
        $('.faq-item').each(function() {
            var questionElement = $(this).find('.faq-question .head-faq');
            var answerElement = $(this).find('.faq-answer');

            var questionText = questionElement.text();
            var answerText = answerElement.text();

            var highlightedQuestion = highlightText(questionText, searchText);
            var highlightedAnswer = highlightText(answerText, searchText);

            questionElement.html(highlightedQuestion);
            answerElement.html(highlightedAnswer);
        });
    }

    function highlightText(text, search) {
        return text.replace(new RegExp('('+escapeRegExp(search)+')', 'gi'), '<span class="highlight">$1</span>');
    }

    function escapeRegExp(text) {
        return text.replace(/[-[\]{}()*+?.,\\^$|#\s]/g, '\\$&');
    }

    $('#faq-search-input').keyup(function() {
        var searchText = $(this).val().trim(); // Trim any leading/trailing spaces

        $('.faq-item').each(function() {
            var questionText = $(this).find('.faq-question .head-faq').text();
            var answerText = $(this).find('.faq-answer').text();

            var questionMatch = questionText.toLowerCase().indexOf(searchText.toLowerCase()) !== -1;
            var answerMatch = answerText.toLowerCase().indexOf(searchText.toLowerCase()) !== -1;

            if (!questionMatch && !answerMatch) {
                $(this).fadeOut();
            } else {
                $(this).fadeIn();
                $(this).find('.faq-question').addClass('active');
                $(this).find('.faq-answer').slideDown('fast');
            }
        });

        applyHighlighting(searchText);
    });

    $('#faq-search-input').on('search', function() {
        if (!this.value) {
            $('.faq-item').fadeIn();
            $('.faq-question').addClass('active');
            $('.faq-answer').slideDown('fast');
        }
    });

    $('.faq-sidebar a').click(function(e) {
        e.preventDefault();
        var selectedCategory = $(this).data('category');

        $('.faq-item').each(function() {
            if (selectedCategory === '' || $(this).hasClass('category-' + selectedCategory) || $(this).hasClass('subcategory-' + selectedCategory)) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });

        var searchText = $('#faq-search-input').val().trim();
        applyHighlighting(searchText);
    });
});


</script>
<style>
.head-faq{
    color: #454545 !important;
font-family: Poppins;
font-size: 16px !important;
font-style: normal;
font-weight: 400;
line-height: 20.5px !important; /* 128.125% */
}

.row-sidebar{
    height:100%!important;
}

.faq-accordion{
    height:1000px!important;
    overflow-y:scroll !important;
}
.active a{
    display: flex;
    /*justify-content:space-between!important;*/
    align-items:center!important;
padding: 16.5px 20.609px 16.5px 14.268px;
align-items: center;
border-radius: 8px;
background: #118B64;

/* elevation/2 */
box-shadow: 0.9134015440940857px 0.9134015440940857px 8.220613479614258px 0px rgba(5, 5, 5, 0.05);

color: #FFF;
font-family: Poppins;
font-size: 16px;
font-style: normal;
font-weight: 400;
line-height: 20.5px; /* 128.125% */
}


.faq-category a{
    display: flex;
    /*justify-content:space-between!important;*/
    align-items:center!important;
padding: 16.5px 20.609px 16.5px 14.268px;
align-items: center;
border-radius: 8px;
/*background: #118B64;*/
box-shadow: 0.9134015440940857px 0.9134015440940857px 8.220613479614258px 0px rgba(5, 5, 5, 0.05);

color: #000;
font-family: Poppins;
font-size: 16px;
font-style: normal;
font-weight: 400;
line-height: 20.5px; /* 128.125% */
}

.faq-category a img{
   margin-right:15px!important;
    
}
.faq-subcategories a{
    color: #797979 !important;
font-family: Poppins !important;
font-size: 16px !important;
font-style: normal !important;
font-weight: 400 !important ;
line-height: 20.5px !important; /* 128.125% */
background :none!important;
box-shadow:none!important;
}
.faq-subcategories li{
    list-style:disc!important;
    padding-left:0px!important;
    margin:0px 0 !important;
}

#secondary{
    width:75%!important;
}
.right-faq {
  /*margin: 8.5rem 160px;*/
  width: 500px !important;
}

.genpera {
  width: 348px;
  height: 48px;
  left: 79px;
  top: 150px;
  font-family: "Poppins";
  font-style: normal;
  font-weight: 400;
  font-size: 16px;
  line-height: 24px;
  color: #111111;
}

.cal {
  height: 27px !important;
  font-family: "Poppins" !important;
  font-style: normal !important;
  font-weight: 600 !important;
  font-size: 18px !important;
  line-height: 27px !important ;
  text-align: center !important;
  color: #2f4858 !important;
  backdrop-filter: blur(1.75762px);
  border-bottom: 2px solid #01787b !important;
}

.slax {
  color: #01787b;
}
.num-faq {
  /*width: 307px;*/
  height: 27px;
  font-family: "Poppins";
  font-style: normal;
  font-weight: 400;
  font-size: 18px;
  line-height: 27px;
  text-align: left;
  color: #565c5b;
  backdrop-filter: blur(1.75762px);
}

.loginnsupprt {
  width: 174px;
  height: 66px;
  left: calc(50% - 174px / 2);
  top: 459px;
  background: linear-gradient(180deg, #0b224e -140%, #01787b 93.61%);
  box-shadow: 0px 0px 15.7636px rgba(56, 185, 144, 0.5);
  border-radius: 34px;
  color: #fff;
  font-family: "Poppins";
  font-style: normal;
  font-weight: 400;
  font-size: 20px;
  line-height: 150%;
  color: #ffffff;
}
.heroheading {
  height: 47px;
  left: calc(50% - 350px / 2);
  top: 219.9px;
  font-family: "Poppins";
  font-style: normal;
  font-weight: 600;
  font-size: 48px;
  line-height: 97.8%;
  text-align: center;
  color: #16637b;
}

.spanq {
  width: 260px;
  height: 30px;
  left: 363px;
  top: 317px;
  color: #3b7283;
  font-size: 16px;
  font-family: Poppins;
  font-style: normal;
  font-weight: 400;
  line-height: 20.5px;
  display: flex;
  align-items: center;
  color: #3b7283;
}

.query input {
  width: 593px;
  height: 56px;
  background: #f8fbf8;
  border-radius: 7px;
  font-size: 16px !important;
  background: #f8fbf8;
  box-shadow: 0px 8px 21px rgba(29, 29, 29, 0.06);
  border-radius: 7px;
  
}

.query input::placeholder {
color: #8F8F8F;
font-family: Poppins;
font-size: 16px;
font-style: normal;
font-weight: 400;
line-height: 20.5px; /* 128.125% */
  
}
/* Styles for the FAQ sidebar */
.faq-sidebar {
    float: left;
    width: 34%;
    /*height:1000px!important;*/
    position:sticky!important;
    top:10%!important;
}

.faq-categories {
    list-style: none;
    padding: 0;
    margin: 0;
}
.faq-category a:hover {
    color:initial!important
}
.faq-subcategories a:hover{
    color:inherit!important;
}

.faq-category {
    margin-bottom: 10px;
}

.faq-subcategories {
    list-style: none;
    padding-left: 30px;
    margin: 0;
}
    /* Styles for the FAQ accordion */
.faq-accordion .faq-item {
    /*border: 1px solid #ccc;*/
    margin-bottom: 10px;
    padding: 23px;
    border-radius: 8px;
background: #FFF;
/*display: flex;*/
padding: 16px 24px;
/*flex-direction: column;*/
/*align-items: flex-start;*/
gap: 8px;
align-self: stretch;

/* elevation/4 */
box-shadow: 0px 8px 21px 0px rgba(29, 29, 29, 0.06);
}

.faq-accordion .faq-question {
    cursor: pointer;
}

.faq-accordion .faq-answer {
    display: none;
    margin-top: 10px;
    
}
.faq-accordion .faq-answer p {
color: #454545;
font-family: Poppins;
font-size: 16px !important;
font-style: normal;
font-weight: 400;
line-height: 120.5%; /* 128.125% */
    
}



.faq-answer ul{
    padding-left:30px!important;
    list-style:disc!important;
}
.faq-answer ul li{
    /*padding-left:30px!important;*/
    /*list-style:disc!important;*/
    font-size:16px!important;
}


.faq-accordion .faq-question.active {
    font-weight: bold!important;
    font-size: 16px !important;
    font-style: normal;
    line-height: 20.5px !important;
}
.highlight {
    background-color: yellow;
    font-weight: bold;
}
#faq-category-filter {
    margin-left: 10px;
}

@media (max-width: 880px){
    
    .right-faq {
    margin:0px!important; 
    padding-left:40px!important;
    width: 100% !important;
}
    .invest-bg {
    background-image: url(https://tradejini.com/wp-content/uploads/2023/08/tablet.png);
    height: auto;
    background-repeat: no-repeat;
    background-position: center;
    background-size: 100% 100%;
    padding: 26px 30px !important;
    margin: 0px;
    /*display: flex;*/
    align-items: center;
    justify-content: space-between;
    width: 100%;
    margin: 0 auto;
}
.hero-support{
    padding: 117px 10px!important;
    flex-direction:column-reverse!important;
    justify-content:center!important;
    align-items:center!important;
}
.query input {
    width: 150%!important;
    height: 56px;
    font-size:12px!important;
    
}

.row-sidebar{
    padding:0!important;
    /*flex-direction:column!important;*/
}
.faq-sidebar {
    float: left;
    width: 100% !important;
}

.faq-accordion{
    width:90%!important;
}
.faq-sidebar {
    float: left;
    width: 34%;
    height:100%!important;
    position:relative!important;
    top:10%!important;
}


.faq-accordion .faq-item {
    padding:16px 0px !important;
}

    
}
</style>