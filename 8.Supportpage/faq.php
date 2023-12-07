<?php
/*
Template Name: FAQ Template
*/
get_header();
?>


<div class="faq-search" style="margin-top:200px">
    <input type="text" id="faq-search-input" placeholder="Search FAQs">
</div>




<div class="row" style="display:flex">
<div class="faq-sidebar">
    <aside id="secondary" class="widget-area">
        <ul class="faq-categories">
            <?php
            $faq_categories = get_terms(array(
                'taxonomy' => 'faq_category',
                'hide_empty' => false,
                'parent' => 0,
            ));
    
            foreach ($faq_categories as $faq_category) {
                echo '<li class="faq-category">';
                echo '<a href="#" data-category="' . $faq_category->slug . '">' . $faq_category->name . '</a>';
    
                $faq_subcategories = get_terms(array(
                    'taxonomy' => 'faq_category',
                    'hide_empty' => false,
                    'parent' => $faq_category->term_id,
                ));
    
                if ($faq_subcategories) {
                    echo '<ul class="faq-subcategories">';
                    foreach ($faq_subcategories as $faq_subcategory) {
                        echo '<li class="faq-subcategory">';
                        echo '<a href="#" data-category="' . $faq_subcategory->slug . '">' . $faq_subcategory->name . '</a>';
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
    ?>
    <div class="faq-item<?php echo esc_attr($faq_classes); ?>">
        <h3 class="faq-question"><?php the_title(); ?></h3>
        <div class="faq-answer">
            <?php the_content(); ?>
        </div>
    </div>
    <?php
        endwhile;
    endif;
    wp_reset_postdata();
    ?>
</div>
</div>
<?php get_footer(); ?>



<script>
jQuery(document).ready(function($) {
    $('.faq-question').click(function() {
        $(this).toggleClass('active');
        $(this).siblings('.faq-answer').slideToggle('fast');
    });

    $('#faq-search-input').keyup(function() {
        var searchText = $(this).val().toLowerCase();
        $('.faq-item').each(function() {
            var questionText = $(this).find('.faq-question').text().toLowerCase();
            var answerText = $(this).find('.faq-answer').text().toLowerCase();

            if (questionText.indexOf(searchText) === -1 && answerText.indexOf(searchText) === -1) {
                $(this).fadeOut();
            } else {
                
                $(this).fadeIn();
                $(this).find('.faq-question').addClass('active');
                $(this).find('.faq-answer').slideDown('fast');
                
                
                var highlightedQuestion = questionText.replace(new RegExp(searchText, 'gi'), '<span class="highlight">$&</span>');
                var highlightedAnswer = answerText.replace(new RegExp(searchText, 'gi'), '<span class="highlight">$&</span>');

                $(this).find('.faq-question').html(highlightedQuestion);
                $(this).find('.faq-answer').html(highlightedAnswer);
            }
        });
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
    });
});



</script>
<style>

/* Styles for the FAQ sidebar */
.faq-sidebar {
    float: left;
    width: 20%;
}

.faq-categories {
    list-style: none;
    padding: 0;
    margin: 0;
}

.faq-category {
    margin-bottom: 10px;
}

.faq-subcategories {
    list-style: none;
    padding-left: 20px;
    margin: 0;
}
    /* Styles for the FAQ accordion */
.faq-accordion .faq-item {
    border: 1px solid #ccc;
    margin-bottom: 10px;
    padding: 10px;
}

.faq-accordion .faq-question {
    cursor: pointer;
}

.faq-accordion .faq-answer {
    display: none;
    margin-top: 10px;
}

.faq-accordion .faq-question.active {
    font-weight: bold; /* You can customize the styling here */
}
.highlight {
    background-color: yellow;
    font-weight: bold;
}
#faq-category-filter {
    margin-left: 10px;
}
</style>