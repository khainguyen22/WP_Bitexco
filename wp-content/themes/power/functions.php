<?php
define('THEME_URL', get_stylesheet_directory());
define('CORE', THEME_URL . "/core");
define("POWER", "POWER");
require_once(CORE . "/init.php");



if (!function_exists('theme_enqueue_styles')) {
    function theme_enqueue_styles()
    {
        wp_enqueue_style('style-bootstrap', get_stylesheet_directory_uri() . '/access/css/bootstrap.css', array(), false);
        wp_enqueue_style('style-font-awesome', get_stylesheet_directory_uri() . '/access/css/font-awesome.min.css', array(), false);
        wp_enqueue_style('style-lightgallery', get_stylesheet_directory_uri() . '/access/css/lightgallery.css', array(), false);
        wp_enqueue_style('style-lightslider', get_stylesheet_directory_uri() . '/access/css/lightslider.min.css', array(), false);
        wp_enqueue_style('style-slick', get_stylesheet_directory_uri() . '/access/css/slick.min.css', array(), false);
        wp_enqueue_style('git-css', get_stylesheet_directory_uri() . '/access/css/index.css', array(), false);
        // wp_enqueue_style('style-css', get_stylesheet_directory_uri() . '/access/styles/index.css', array(), false);
        wp_enqueue_style('custom.css', get_stylesheet_directory_uri() . '/access/styles/custom.css', array(), false);
        wp_enqueue_script('script-jquery', get_template_directory_uri() . '/access/js/jquery.min.js', array('jquery'), 1.1, false);
        wp_enqueue_script('script-slick', get_template_directory_uri() . '/access/js/slick.min.js', array('jquery'), 1.1, false);
        wp_enqueue_script('bootstrap-min', get_template_directory_uri() . '/access/js/bootstrap.min.js', array('jquery'), 1.1, false);
        wp_enqueue_script('bootstrap-bundle', get_template_directory_uri() . '/access/js/bootstrap.bundle.min.js', array('jquery'), 1.1, false);
        wp_enqueue_script('carousel-slick', get_template_directory_uri() . '/access/js/carousel-slick.min.js', array('jquery'), 1.1, false);
        wp_enqueue_script('lightslider', get_template_directory_uri() . '/access/js/lightslider.js', array('jquery'), 1.1, false);
        wp_enqueue_script('fancybox', get_template_directory_uri() . '/access/js/fancybox.umd.js', array('jquery'), 1.1, false);
        wp_enqueue_script('lightgallery-min', get_template_directory_uri() . '/access/js/lightgallery.min.js', array('jquery'), 1.1, false);
        wp_enqueue_script('lightgallery', get_template_directory_uri() . '/access/js/lightgallery.js', array('jquery'), 1.1, false);
        wp_enqueue_script('popper', get_template_directory_uri() . '/access/js/popper.min.js', array('jquery'), 1.1, false);
        wp_enqueue_script('script-function', get_template_directory_uri() . '/access/js/functions.js', array('jquery'), 1.1, false);
        wp_enqueue_script('script-tuyen-dung', get_template_directory_uri() . '/access/js/tuyen-dung.js', array('jquery'), 1.1, false);
        wp_enqueue_script('script-lich-su-phat-trien', get_template_directory_uri() . '/access/js/lich-su-phat-trien.js', array('jquery'), 1.1, false);
        wp_enqueue_script('quan-he-co-dong', get_template_directory_uri() . '/access/js/quan-he-co-dong.js', array('jquery'), 1.1, false);
        wp_enqueue_script('site-map', get_template_directory_uri() . '/access/js/site-map.js', array('jquery'), 1.1, false);
    }
}
add_action('init', 'theme_enqueue_styles');
function add_additional_class_on_li($classes, $item, $args)
{
    if (isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);
function add_menuclass($ulclass)
{
    return preg_replace('/<a /', '<a class="nav-item-link"', $ulclass);
}
add_filter('wp_nav_menu', 'add_menuclass');


function your_custom_menu_item($items, $args)
{
    if ($args->theme_location == 'primary_menu') {
        $items .= '<li class="nav-item nav-item-icon-search">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <ellipse cx="9.16667" cy="9.16667" rx="6.66667" ry="6.66667" stroke="white"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M13.75 14.1318L17.9167 18.2985" stroke="white" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <svg class="close-button" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                viewBox="0 0 20 20" fill="none">
                                <path d="M4.16729 15.8327L15.8335 4.1665" stroke="#2B3F6C" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M4.16729 4.16729L15.8335 15.8335" stroke="#2B3F6C" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </li>';
        $items .= ' <li class="nav-item ">
                            <span class="header-mobile-menu-icon " id="header-mobile-menu-icon">
                                <span class="burger" id="burger">
                                    <span class="burger-line"></span>
                                    <span class="burger-line"></span>
                                    <span class="burger-line"></span>
                                </span>
                            </span>
                        </li>';
    }
    return $items;
}
add_filter('wp_nav_menu_items', 'your_custom_menu_item', 10, 2);



if (!function_exists('specia_setup')) :
    function specia_setup()
    {
        /*
	 * Make theme available for translation.
	 */
        load_theme_textdomain('specia', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
	 * Let WordPress manage the document title.
	 */
        add_theme_support('title-tag');

        /*
	 * Enable support for Post Thumbnails on posts and pages.
	 */
        add_theme_support('post-thumbnails');

        add_image_size('videos-thumbnail', 100, 100, true);

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'primary_menu' => esc_html__('Primary Menu', 'specia'),
            'category_menu' => esc_html__('Category Menu', 'specia'),
        ));

        /*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        //Add selective refresh for sidebar widget
        add_theme_support('customize-selective-refresh-widgets');

        //Add custom logo support
        add_theme_support('custom-logo');

        /*
	 * WooCommerce Plugin Support
	 */
        add_theme_support('woocommerce');

        /*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
        add_editor_style(array('css/editor-style.css', specia_google_font()));
    }
endif;
add_action('after_setup_theme', 'specia_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 */
function specia_content_width()
{
    $GLOBALS['content_width'] = apply_filters('specia_content_width', 1170);
}
add_action('after_setup_theme', 'specia_content_width', 0);

/**
 * All Styles & Scripts.
 */
require_once get_template_directory() . '/inc/enqueue.php';

/**
 * Bootstrap Nav Walker.
 */
if (!class_exists('specia_nav_walker')) {
    require_once get_template_directory() . '/inc/specia-nav-walker.php';
}

/**
 * Implement the Custom Header feature.
 */
require_once get_template_directory() . '/inc/custom-header.php';

/**
 * Called Breadcrumb
 */
require_once get_template_directory() . '/inc/breadcrumb/breadcrumb.php';

/**
 * Sidebar.
 */
require_once get_template_directory() . '/inc/sidebar/sidebar.php';

/**
 * Widgets.
 */
require_once get_template_directory() . '/inc/widget/widget_feature.php';

/**
 * Custom template tags for this theme.
 */
require_once get_template_directory() . '/inc/template-tags.php';

/**
 * Load Jetpack compatibility file.
 */
require_once get_template_directory() . '/inc/jetpack.php';

/**
 * Load Sanitization file.
 */
require_once get_template_directory() . '/inc/sanitization.php';

/**
 * Called all the Customize file.
 */
require_once(get_template_directory() . '/inc/customize/specia-customizer.php');

/**
 * widget to b??i vi???t m???i
 */
class Sidebar_Post extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
            'sidebar_post',
            'B??i vi???t theo danh m???c',
            array('description'  =>  'Widget hi???n th??? b??i vi???t m???i theo danh m???c')
        );
    }
    function form($instance)
    {
        $default = array(
            'title' => 'Ti??u ????? ',
            'post_number' => 5,
            'addclass' => '',
            'select' => ''
        );
        $instance = wp_parse_args((array) $instance, $default);
        $title = esc_attr($instance['title']);
        $select = esc_attr($instance['select']);
        $post_number = esc_attr($instance['post_number']);
        $addclass = esc_attr($instance['addclass']);
        echo '<p>Nhp ti??u ????? <input type="text" class="widefat" name="' . $this->get_field_name('title') . '" value="' . $title . '"/></p>';
        echo '<p>S??? l?????ng b??i vi???t hi???n th??? <input type="number" class="widefat" name="' . $this->get_field_name('post_number') . '" value="' . $post_number . '" placeholder="' . $post_number . '" max="30" /></p>';
?>
        <!-- Category Select Menu -->
        <p>
            <select id="<?php echo $this->get_field_id('select'); ?>" name="<?php echo $this->get_field_name('select'); ?>" class="widefat" style="width:100%;">
                <?php foreach (get_terms('category', 'parent=0&hide_empty=0') as $term) { ?>
                    <option <?php selected($instance['select'], $term->term_id); ?> value="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></option>
                <?php } ?>
            </select>
        </p>
        <select name="<?php echo $this->get_field_name('addclass'); ?>" id="<?php echo $this->get_field_id('addclass'); ?>">
            <option <?php selected('post-style-1', $instance['addclass']); ?> value="post-style-1">Style 1 Image Left</option>
            <option <?php selected('post-style-2', $instance['addclass']); ?> value="post-style-2">Style 2 Image Right</option>
            <option <?php selected('post-style-3', $instance['addclass']); ?> value="post-style-3">Style 3 Image Center</option>
            <option <?php selected('post-style-4', $instance['addclass']); ?> value="post-style-4">Style 4 Image Top</option>
        </select>
        <?php
    }
    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['select'] = strip_tags($new_instance['select']);
        $instance['post_number'] = strip_tags($new_instance['post_number']);
        $instance['addclass'] = strip_tags($new_instance['addclass']);
        return $instance;
    }
    function widget($args, $instance)
    {
        extract($args);
        $title = apply_filters('widget_title', $instance['title']);
        $post_number = $instance['post_number'];
        $select = $instance['select'];
        $addclass = $instance['addclass'];
        echo $before_widget;
        echo $before_title . $title . $after_title;
        $sidebar_post = new WP_Query('posts_per_page=' . $post_number . '&orderby=date&cat=' . $select . '');
        if ($sidebar_post->have_posts()) :
            echo '<ul class="sidebar-post ' . $addclass . '">';
            while ($sidebar_post->have_posts()) :
                $sidebar_post->the_post(); ?>
                <li>
                    <div class="img-sidebarpost">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail(); ?></a>
                    </div>
                    <div class="name-sidebarpost">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                        <span class="post-time"><i class="far fa-calendar-alt"></i> <?php the_time('d,m,Y') ?></span>
                    </div>
                </li>
        <?php endwhile;
            echo "</ul>";
        endif;
        echo $after_widget;
    }
}
add_action('widgets_init', 'create_sidebarpost_widget');
function create_sidebarpost_widget()
{
    register_widget('Sidebar_Post');
}

add_filter('wp_get_attachment_image_attributes', function ($attr) {
    if (isset($attr['class'])  && 'custom-logo' === $attr['class'])
        $attr['class'] = 'custom-logo navbar-brand';

    return $attr;
});

/*text editer*/
function ilc_mce_buttons($buttons)
{
    array_push(
        $buttons,
        "backcolor",
        "anchor",
        "hr",
        "sub",
        "sup",
        "fontselect",
        "fontsizeselect",
        "fontfamilyselect",
        "alignjustify",
        "cleanup"
    );
    return $buttons;
}
add_filter("mce_buttons_2", "ilc_mce_buttons");
/*excerpt editer*/
function the_excerpt_max_charlength($charlength)
{
    $excerpt = get_the_excerpt();
    $charlength++;

    if (mb_strlen($excerpt) > $charlength) {
        $subex = mb_substr($excerpt, 0, $charlength - 5);
        $exwords = explode(' ', $subex);
        $excut = - (mb_strlen($exwords[count($exwords) - 1]));
        if ($excut < 0) {
            echo mb_substr($subex, 0, $excut);
        } else {
            echo $subex;
        }
        echo '...';
    } else {
        echo $excerpt;
    }
}

if (!function_exists('specia_logo')) {
    function specia_logo()
    { ?>
        <?php
        global $c5_options;
        if ($c5_options['logo-on'] == 0) :
        ?>
            <?php if (function_exists('the_custom_logo')) : the_custom_logo();
            endif; ?>
        <?php else : ?>
            <img src="<?php echo $c5_options['logo-image']['url'] ?>" alt="" />
        <?php endif; ?>
    <?php
    }
}

/* Count view post
**/
function postview_set($postID)
{
    $count_key  = 'postview_number';
    $count      = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

function postview_get($postID)
{
    $count_key  = 'postview_number';
    $count      = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return '0 ' . __('L?????t xem', 'shtheme');
    }
    return $count . ' ' . __('L?????t xem', 'shtheme');
}

add_filter('use_block_editor_for_post', '__return_false');

/**
 * Rename product data tabs
 */
add_filter('woocommerce_product_tabs', 'woo_rename_tabs', 98);
function woo_rename_tabs($tabs)
{

    $tabs['description']['title'] = __('Th??ng tin s???n ph???m');
    // Rename the description

    $tabs['attrib_desc_tab'] = array(
        'title'     => __('Th??ng s??? k??? thu???t', 'woocommerce'),
        'priority'  => 100,
        'callback'  => 'woo_attrib_desc_tab_content'
    );
    return $tabs;
}
function woo_attrib_desc_tab_content()
{
    // The new tab content
    echo $variable = get_field('thong-so-ky-thuat');
}
/* t???o single category */
add_filter('single_template', 'check_for_category_single_template');
function check_for_category_single_template($t)
{
    foreach ((array) get_the_category() as $cat) {
        if (file_exists(TEMPLATEPATH . "/single-{$cat->slug}.php")) return TEMPLATEPATH . "/single-{$cat->slug}.php";
        if ($cat->parent) {
            $cat = get_the_category_by_ID($cat->parent);
            if (file_exists(TEMPLATEPATH . "/single-{$cat->slug}.php")) return TEMPLATEPATH . "/single-{$cat->slug}.php";
        }
    }
    return $t;
}

add_filter('woocommerce_currency_symbol', 'change_existing_currency_symbol', 10, 2);
function change_existing_currency_symbol($currency_symbol, $currency)
{
    switch ($currency) {
        case 'VND':
            $currency_symbol = 'VN??';
            break;
    }
    return $currency_symbol;
}

add_filter('woocommerce_output_related_products_args', 'jk_related_products_args');
function jk_related_products_args($args)
{

    $args['posts_per_page'] = 8; // 4 related products
    $args['columns'] = 4; // arranged in 2 columns
    return $args;
}
global $devvn_quickbuy;
remove_action('woocommerce_single_product_summary', array($devvn_quickbuy, 'add_button_quick_buy'), 35);
/*X??a tr?????ng kh??ng c???n thi???t trong trang thanh to??n*/
add_filter('woocommerce_checkout_fields', 'custom_override_checkout_fields');
function custom_override_checkout_fields($fields)
{
    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_country']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_city']);
    unset($fields['billing']['billing_state']);
    unset($fields['billing']['billing_postcode']);
    unset($fields['billing']['billing_postcode']);
    return $fields;
}

function devvn_wc_custom_get_price_html($price, $product)
{
    if ($product->get_price() == 0) {
        if ($product->is_on_sale() && $product->get_regular_price()) {
            $regular_price = wc_get_price_to_display($product, array('qty' => 1, 'price' => $product->get_regular_price()));

            $price = wc_format_price_range($regular_price, __('Free!', 'woocommerce'));
        } else {
            $price = '<span class="amount">' . __('Contact', 'woocommerce') . '</span>';
        }
    }
    return $price;
}
add_filter('woocommerce_get_price_html', 'devvn_wc_custom_get_price_html', 10, 2);

/**
 * Ensure cart contents update when products are added to the cart via AJAX
 */
function my_header_add_to_cart_fragment($fragments)
{

    ob_start(); ?>
    <a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e('Gi??? h??ng '); ?>">
        <span><?php echo sprintf(_n('%d', '%d', WC()->cart->cart_contents_count), WC()->cart->cart_contents_count); ?></span>
        <img class="icon-carts" src="<?php bloginfo('template_directory'); ?>/images/ic-cart.png" alt="">
    </a>
<?php

    $fragments['a.cart-contents'] = ob_get_clean();

    return $fragments;
}
add_filter('woocommerce_add_to_cart_fragments', 'my_header_add_to_cart_fragment');

add_filter('woocommerce_show_page_title', '__return_false');
global $user_ID;
if ($user_ID) {
    if (!current_user_can('administrator')) {
        if (
            strlen($_SERVER['REQUEST_URI']) > 255 ||
            stripos($_SERVER['REQUEST_URI'], "eval(") ||
            stripos($_SERVER['REQUEST_URI'], "CONCAT") ||
            stripos($_SERVER['REQUEST_URI'], "UNION+SELECT") ||
            stripos($_SERVER['REQUEST_URI'], "base64")
        ) {
            @header("HTTP/1.1 414 Request-URI Too Long");
            @header("Status: 414 Request-URI Too Long");
            @header("Connection: Close");
            @exit;
        }
    }
}

?>
<?php add_action('wp_footer', 'mycustom_wp_footer');
function mycustom_wp_footer()
{
?>
    <script type="text/javascript">
        document.addEventListener('wpcf7mailsent', function(event) {
            if ('6' == event.detail.contactFormId) { // Change 123 to the ID of the form 
                jQuery('#SuccessfulForm ').modal('show'); //this is the bootstrap modal popup id
            }
            if ('12' == event.detail.contactFormId) { // Change 123 to the ID of the form 
                jQuery('#SuccessfulForm ').modal('show'); //this is the bootstrap modal popup id
            }
            if ('13' == event.detail.contactFormId) { // Change 123 to the ID of the form 
                jQuery('#SuccessfulForm ').modal('show'); //this is the bootstrap modal popup id
            }
        }, false);
    </script>
<?php  } ?>
<?php function hocwp_theme_custom_woocommerce_is_purchasable_filter($can, $product)
{
    if ('' == $product->get_price()) {
        $can = $product->exists() && ('publish' === $product->get_status() || current_user_can('edit_post', $product->get_id()));
    }

    return $can;
}

add_filter('woocommerce_is_purchasable', 'hocwp_theme_custom_woocommerce_is_purchasable_filter', 10, 2);
function hocwp_theme_wc_product_data_filter($value, $data)
{
    if (empty($value)) {
        $value = 0;
    }

    return $value;
}

add_filter('woocommerce_product_get_price', 'hocwp_theme_wc_product_data_filter', 10, 2);

function filter_press_tax_projects($query)
{
    if ($query->is_tax('type_projects') && is_tax('type_projects')) :
        $query->set('posts_per_page', 10);
        return;
    endif;
}
add_action('pre_get_posts', 'filter_press_tax_projects');

add_filter('woocommerce_product_get_price', 'hocwp_theme_wc_product_data_filter', 10, 2);

function filter_press_tax_company_member($query)
{
    if ($query->is_tax('type_company_member') && is_tax('type_company_member')) :
        $query->set('posts_per_page', 10);
        return;
    endif;
}
add_action('pre_get_posts', 'filter_press_tax_company_member');

function filter_press_tax_vacancies($query)
{
    if ($query->is_tax('type_vacancies') && is_tax('type_vacancies')) :
        $query->set('posts_per_page', 10);
        return;
    endif;
}
add_action('pre_get_posts', 'filter_press_tax_vacancies');

add_filter('woocommerce_product_get_price', 'hocwp_theme_wc_product_data_filter', 10, 2);

function filter_press_tax_news($query)
{
    if ($query->is_tax('type_news') && is_tax('type_news')) :
        $query->set('posts_per_page', 10);
        return;
    endif;
}
add_action('pre_get_posts', 'filter_press_tax_news');

function filter_press_tax_events($query)
{
    if ($query->is_tax('type_events') && is_tax('type_events')) :
        $query->set('posts_per_page', 10);
        return;
    endif;
}
add_action('pre_get_posts', 'filter_press_tax_events');

function paint_if_exist($param) {
    return isset($param) ? $param : '';
} 

// Ajax
include (get_template_directory(  ) . '/inc/ajax/genaral_ajax_process.php');
include(get_template_directory() . '/inc/ajax/ajax_process.php');

// Options
include (get_template_directory(  ) . '/inc/options.php');

// Post types
include (get_template_directory(  ) . '/inc/post-types/danh-muc-du-an-thuy-dien.php');
include (get_template_directory(  ) . '/inc/post-types/cac-cong-ty-thanh-vien.php');
include (get_template_directory(  ) . '/inc/post-types/news.php');
include (get_template_directory(  ) . '/inc/post-types/vacancies.php');
include (get_template_directory(  ) . '/inc/post-types/thong-tin-co-dong.php');
include (get_template_directory(  ) . '/inc/post-types/bao-cao-tai-chinh.php');
include (get_template_directory(  ) . '/inc/post-types/tai-lieu-co-dong.php');
include (get_template_directory(  ) . '/inc/post-types/bao-cao-thuong-nien.php');