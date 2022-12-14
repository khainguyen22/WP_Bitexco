<?php

/**
Template Name: Các công ty thành viên   
 **/
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$banner = get_field('banner_company_member', 'option');
$other_info = get_field('other_info_company_member', 'option');
$args = array(
    'post_type'    => 'company-member',
    'paged' => (get_query_var('paged') ? get_query_var('paged') : 1),
);
$the_query_post = new WP_Query($args);

get_header();
?>
<section class="banner list" style='background-image:url("<?php echo $banner['background']; ?>")'>
    <div class="container">
        <div class="content">
            <span class="divider"></span>
            <h3><?php echo isset($banner['title']) ? $banner['title'] : ""; ?></h3>
            <p><?php echo isset($banner['description']) ? $banner['description'] : ""; ?></p>
        </div>
    </div>
</section>
<section class="filter-post-section">
    <div data-include="small-filter-post" class="filter-post-container">
        <div class="small-form-filter">
            <form action="">
                <div class="form-filter-search">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <circle cx="11" cy="11" r="8" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></circle>
                        <path d="M16.5 16.958L21.5 21.958" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                    <input type="text" placeholder="Tìm kiếm">
                </div>
                <div class="form-filter-area">
                    <select name="location" id="filter-location">
                        <?php if ($the_query_post->have_posts()) : ?>
                            <?php while ($the_query_post->have_posts()) : $the_query_post->the_post(); ?>
                                <option value="<?php echo get_field("location"); ?>"><?php echo get_field("location"); ?></option>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="button-submit">
                    <button type="submit" class="btn btn-search btn-submit">Tìm kiếm</button>
                </div>
                <div class="button-reset">
                    <button class="btn btn-search btn-reset">Đặt lại</button>
                </div>
            </form>
        </div>
        <div class="filter-content">
            <?php if ($the_query_post->have_posts()) : ?>
                <?php while ($the_query_post->have_posts()) : $the_query_post->the_post();
                    $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>
                    <div class="filter-item">
                        <div class="filter-image  hover-zoom hover-zoom-img">
                            <a href="<?php the_permalink() ?>">
                                <img src="<?php echo $featured_img_url ?>" alt="<?php echo the_title() ?>">
                            </a>
                        </div>
                        <div class="item-content">
                            <div class="content-title">
                                <h6> <a href="<?php the_permalink() ?>"><?php echo the_title() ?></a></h6>
                            </div>
                            <span class="tag tag-location location">
                                <span><?php echo get_field("location"); ?></span>
                            </span>
                            <span class="tag tag-wattage wattage">
                                <span><?php echo get_field("wattage"); ?>MW</span>
                            </span>
                            <span class="tag tag-phone phone">
                                <span><?php echo get_field("phone"); ?></span>
                            </span>
                            <span class="tag tag-factory factory">
                                <span><?php echo get_field("factory"); ?>Nhà máy</span>
                            </span>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <div class="filter-navigation">
            <nav aria-label="Page navigation example">
                <nav aria-label="Page navigation example">
                    <?php
                    global $wp_query;
                    $custom_query = '';
                    if ($custom_query) $main_query = $custom_query;
                    else $main_query = $wp_query;
                    $paged = ($paged) ? $paged : get_query_var('paged');
                    $big = 999999999;
                    $total = isset($main_query->max_num_pages) ? $main_query->max_num_pages : '';
                    if ($total > 1) echo '<ul class="pagination justify-content-center custom-pagination">';
                    echo paginate_links(array(
                        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                        'format' => '?paged=%#%',
                        'current' => max(1, $paged),
                        'total' => $total,
                        'mid_size' => '3',
                        'prev_text'    => __('<li class="page-item pagination-prev">Trước</li>', 'Bitexco'),
                        'next_text'    => __('<li class="page-item pagination-next">Sau</li>', 'Bitexco'),
                    ));
                    if ($total > 1) echo '</ul>';
                    ?>
                </nav>
            </nav>
            <nav aria-label="Page navigation example" class="mobile">
                <nav aria-label="Page navigation example">
                    <?php
                    global $wp_query;
                    $custom_query = '';
                    if ($custom_query) $main_query = $custom_query;
                    else $main_query = $wp_query;
                    $paged = ($paged) ? $paged : get_query_var('paged');
                    $big = 999999999;
                    $total = isset($main_query->max_num_pages) ? $main_query->max_num_pages : '';
                    if ($total > 1) echo '<ul class="pagination justify-content-center custom-pagination">';
                    echo paginate_links(array(
                        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                        'format' => '?paged=%#%',
                        'current' => max(1, $paged),
                        'total' => $total,
                        'mid_size' => '3',
                        'prev_text'    => __('<li class="page-item pagination-prev">Trước</li>', 'Bitexco'),
                        'next_text'    => __('<li class="page-item pagination-next">Sau</li>', 'Bitexco'),
                    ));
                    if ($total > 1) echo '</ul>';
                    ?>
                </nav>
            </nav>
        </div>

    </div>
</section>
<section class="other-information">
    <div class="other-container">
        <div class="other-content">
            <div class="other-content hover-zoom">
                <?php if ($other_info) : ?>
                    <?php foreach ($other_info as $value) : ?>
                        <a href="<?php echo $value['link']; ?>" class="hydro-electric-news" style="background-image:url('<?php echo $value['image']; ?>')"><span class="text"><?php echo $value['text']; ?></span> </a>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php
get_footer();
?>