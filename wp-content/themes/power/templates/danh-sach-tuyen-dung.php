<?php

/**
Template Name: Danh sách tuyển dụng  
 **/
$banner = get_field('banner_danh_sach_tuyen_dung', 'option');
$send_profile = get_field('send_profile', 'option');
$other_info = get_field('other_info_danh_sach_tuyen_dung', 'option');
$args = array(
    'post_type'    => 'vacancies',
    'paged' => (get_query_var('paged') ? get_query_var('paged') : 1),

);
$the_query_post = new WP_Query($args);
get_header();
?>
<div class="danh-sach-tuyen-dung">
    <section class="banner" style='background-image:url("<?php echo $banner['background']; ?>")'>
        <div class="container">
            <div class="content">
                <span class="divider"></span>
                <h3><?php echo isset($banner['title']) ? $banner['title'] : ""; ?></h3>
                <p><?php echo isset($banner['description']) ? $banner['description'] : ""; ?></p>
            </div>
        </div>
    </section>
    <div class="main ">
        <section class="filter-post-section">
            <div class="filter-post-container ">
                <div class="form-filter container">
                    <form action="">
                        <div class="form-filter-search d-flex">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <circle cx="11" cy="11" r="8" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M16.5 16.958L21.5 21.958" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <input type="text" placeholder="Tìm kiếm">
                        </div>

                        <div class="form-filter-field">
                            <select name="" id="">
                                <option value="">Loại hình</option>
                                <option value="">Loại hình</option>
                                <option value="">Loại hình</option>
                                <option value="">Loại hình</option>
                            </select>
                        </div>

                        <div class="button-submit">
                            <button class="btn btn-search btn-submit">Tìm kiếm</button>
                        </div>
                        <div class="button-reset">
                            <button class="btn btn-reset">Đặt lại</button>
                        </div>
                    </form>
                </div>
            </div>

        </section>
        <div class="container">
            <section class="infomation-list ">
                <div class="list ">
                    <?php if ($the_query_post->have_posts()) : ?>
                        <?php while ($the_query_post->have_posts()) : $the_query_post->the_post(); ?>
                            <div class="item d-flex flex-wrap justify-content-between <?php echo get_field("amount") > 0 ? "" : "disable"; ?>">
                                <div class="info">
                                    <p class="label ">Vị trí tuyển dụng</p>
                                    <p class="desc"><?php echo the_title(); ?></p>
                                </div>
                                <div class="info">
                                    <p class="label ">Địa điểm</p>
                                    <p class="desc"><?php echo get_field("address"); ?></p>
                                </div>
                                <div class="info">
                                    <p class="label ">Số lượng</p>
                                    <p class="desc"><?php echo get_field("amount"); ?></p>
                                </div>
                                <div class="info">
                                    <p class="label ">Hạn nộp hồ sơ</p>
                                    <p class="desc"><?php echo get_field("deadline"); ?></p>
                                </div>
                                <div class="info">
                                    <a href="<?php echo the_permalink(); ?>" class="btn btn-detail btn-detail-icon">
                                        chi tiết
                                        <svg width="16" height="10" viewBox="0 0 16 10" fill="#DAA622" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.1297 8.66927L14.1482 5.65078C14.5062 5.2928 14.5062 4.7124 14.1482 4.35442L11.1297 1.33594M13.8797 5.0026L1.04639 5.00261" stroke="#DAA622" stroke-width="1.5" stroke-linecap="round" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </section>
            <div class="filter-navigation">
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
            </div>
        </div>
        <section class="gui-ho-so container-fluid">
            <div class="row">
                <div class="col-12 col-md-6 col-left">
                    <div class="content">
                        <h4><?php echo isset($send_profile['title']) ? $send_profile['title'] : "";  ?></h4>
                        <p><?php echo isset($send_profile['description']) ? $send_profile['description'] : ""; ?></p>
                        <a href="<?php echo $send_profile['link']; ?>" class="btn btn-search text-uppercase"><?php echo isset($send_profile['button']) ? $send_profile['button'] : ""; ?></a>
                    </div>
                </div>
                <div class="col-12 col-md-6  col-right">
                    <img src="<?php echo $send_profile['image']; ?>" alt="<?php echo $send_profile['title']; ?>">
                </div>
            </div>
        </section>
        <section class="other-information">
            <div class="other-container">
                <div class="other-content hover-zoom">
                    <?php if ($other_info) : ?>
                        <?php foreach ($other_info as $value) : ?>
                            <a href="<?php echo $value['link']; ?>" class="hydro-electric-news" style="background-image:url('<?php echo $value['image']; ?>')"><span class="text"><?php echo $value['text']; ?></span> </a>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </div>
</div>
<?php
get_footer();
?>