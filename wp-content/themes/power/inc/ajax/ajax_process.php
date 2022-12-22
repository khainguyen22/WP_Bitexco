<?php
if (!function_exists('ajax_script_process')) {
	function ajax_script_process()
	{
		wp_enqueue_script('ajax-script', get_template_directory_uri() . '/inc/ajax/ajax_process.js', array('jquery'), false, false);
		wp_localize_script('ajax-script', 'ajaxObject1', array('ajaxurl' => admin_url('admin-ajax.php')));
	};
	add_action('wp_enqueue_scripts', 'ajax_script_process');
}

function fillter_post_ajax()
{
	$paged = (isset($_POST['data_page'])) ? $_POST['data_page'] : '';
	$slug = (isset($_POST['data_slug'])) ? $_POST['data_slug'] : '';
	$name = (isset($_POST['data_name'])) ? $_POST['data_name'] : '';
	$location = (isset($_POST['data_location'])) ? $_POST['data_location'] : '';
	$company = (isset($_POST['data_company'])) ? $_POST['data_company'] : '';
	$type = (isset($_POST['data_type'])) ? $_POST['data_type'] : '';
	header("Content-Type: text/html");
	$args = array(
		'suppress_filters' => true,
		'posts_per_page' => 2,
		'paged' => '1',
		'post_type' => 'post',
		'category_name' =>  $slug,
		"s" =>   $name,
		'meta_query' => array(
			'relation' => 'AND',
			array(
				'key' => 'company',
				'value' => $company,
				'compare' => 'LIKE'
			),
			array(
				'key' => 'type',
				'value' => $type,
				'compare' => 'LIKE'
			),
			array(
				'key' => 'location',
				'value' => $location,
				'compare' => 'LIKE'
			),
		)
	);

	$loop = new WP_Query($args);
	$out = '';
	if ($loop->have_posts()) :  while ($loop->have_posts()) : $loop->the_post();
			$featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
			$the_permalink = get_the_permalink(get_the_ID());
			$the_title = get_the_title(get_the_ID());
			$the_excerpt = get_the_excerpt(get_the_ID());
			$the_date = get_the_date();
			$the_tags = get_the_tag_list('', ', ');
			$out .= '
				<div class="custom-post d-flex ">
					<img src="' . $featured_img_url . '" alt="' . $the_title . '" class="img-banner">
					<div class="content ">
						<span class="tag tag-name">' . $the_tags . '</span>
						<h6> <a href="' . $the_permalink . '">' . $the_title . '</a></h6>
						<p class="size-text-16">' . $the_excerpt . '</p>
						<span class="tag tag-calender">
							<span class="text">' . $the_date . '</span>
						</span>
					</div>
				</div>';


		endwhile;
	endif;
	$pagination = paginate_links(array(
		'base'         => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
		'total'        => $loop->max_num_pages,
		'current'      => 1,
		'format'       => '?paged=%#%',
		'show_all'     => false,
		'type'         => 'plain',
		'end_size'     => 1,
		'mid_size'     => 0,
		'prev_next'    => true,
		'prev_text'    => sprintf('<i></i> %1$s', __('
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M15 5L9.66939 11.2191C9.2842 11.6684 9.2842 12.3316 9.66939 12.7809L15 19" stroke="#2B3F6C" stroke-width="1.5" stroke-linecap="round"></path>
								</svg>
								<span>Trước</span>
		
				', POWER)),
		'next_text'    => sprintf('%1$s <i></i>', __('
				<span>Sau</span>
		
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M9 19L14.3306 12.7809C14.7158 12.3316 14.7158 11.6684 14.3306 11.2191L9 5" stroke="#2B3F6C" stroke-width="1.5" stroke-linecap="round"></path>
						</svg>
				', POWER)),
		'add_args'     => false,
		'add_fragment' => '',
	));
	wp_reset_postdata();
	echo $out . '|' . $pagination;
	die;
}
add_action('wp_ajax_nopriv_fillter_post_ajax', 'fillter_post_ajax');
add_action('wp_ajax_fillter_post_ajax', 'fillter_post_ajax');


// Navigation Action
function post_nav_action()
{
	$paged = $_POST['paged'];
	$name = (isset($_POST['data_name'])) ? $_POST['data_name'] : '';
	$location = (isset($_POST['data_location'])) ? $_POST['data_location'] : '';
	$company = (isset($_POST['data_company'])) ? $_POST['data_company'] : '';
	$type = (isset($_POST['data_type'])) ? $_POST['data_type'] : '';
	$args = [
		'post_type' => 'post',
		'posts_per_page' => 2,
		'paged' => $paged,
		'tax_query' => [
			[
				'taxonomy' => 'category',
				'field' => 'slug',
				'terms' => 'hoat-dong-xa-hoi'
			]
		],
		"s" =>   $name,
		'meta_query' => array(
			'relation' => 'AND',
			array(
				'key' => 'company',
				'value' => $company,
				'compare' => 'LIKE'
			),
			array(
				'key' => 'type',
				'value' => $type,
				'compare' => 'LIKE'
			),
			array(
				'key' => 'location',
				'value' => $location,
				'compare' => 'LIKE'
			),
		)
	];
	$query = new WP_Query($args);

	echo render2($query, $paged);
	die;
}
add_action('wp_ajax_nopriv_post_nav_action', 'post_nav_action');
add_action('wp_ajax_post_nav_action', 'post_nav_action');


function render2($query, $paged = 1)
{
	$pagination = paginate_links(array(
		'base'         => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
		'total'        => $query->max_num_pages,
		'current'      => max($paged, get_query_var('paged')),
		'format'       => '?paged=%#%',
		'show_all'     => false,
		'type'         => 'plain',
		'end_size'     => 1,
		'mid_size'     => 0,
		'prev_next'    => true,
		'prev_text'    => sprintf('<i></i> %1$s', __('
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M15 5L9.66939 11.2191C9.2842 11.6684 9.2842 12.3316 9.66939 12.7809L15 19" stroke="#2B3F6C" stroke-width="1.5" stroke-linecap="round"></path>
						</svg>
						<span>Trước</span>

		', POWER)),
		'next_text'    => sprintf('%1$s <i></i>', __('
		<span>Sau</span>

				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M9 19L14.3306 12.7809C14.7158 12.3316 14.7158 11.6684 14.3306 11.2191L9 5" stroke="#2B3F6C" stroke-width="1.5" stroke-linecap="round"></path>
				</svg>
		', POWER)),
		'add_args'     => false,
		'add_fragment' => '',
	));

	ob_start();

	if ($query->have_posts()) : ?>
		<?php while ($query->have_posts()) : $query->the_post();
			$featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>
			<div class="custom-post d-flex ">
				<img src="<?php echo $featured_img_url ?>" alt="<?php echo the_title() ?>" class="img-banner">
				<div class="content ">
					<span class="tag tag-name"><span class="text"><?php echo get_the_tag_list('', ', ') ?></span> </span>
					<h6> <a href="<?php echo get_the_permalink() ?>"><?php echo the_title() ?></a></h6>
					<p class="size-text-16"><?php echo get_the_excerpt() ?></p>
					<span class="tag tag-calender">
						<span class="text"><?php echo get_the_date() ?></span>
					</span>
				</div>
			</div>
		<?php endwhile; ?>

	<?php else : ?>
		<div class="no-item-found">
			<h3><?php _e("Không có thông tin nào được tìm thấy, vui lòng thử lại", POWER) ?></h3>
		</div>
<?php endif;
	wp_reset_postdata();
	$shareholder_info = ob_get_contents();
	ob_end_clean();
	return $shareholder_info . "|" . $pagination;
}
