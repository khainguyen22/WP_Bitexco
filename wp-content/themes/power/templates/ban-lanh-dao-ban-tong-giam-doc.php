<?php

/**
Template Name: Ban lãnh đạo - Ban tổng giám đốc
 **/
$banner = get_field('banner_ban_lanh_dao', 'option');
$navigation = '';
if ($banner) {
    $navigation = $banner['navigation'];
}
$ban_tong_giam_doc =  get_field('ban_tong_giam_doc', 'option');
$ban_tong_giam_doc_banner = '';
$ban_tong_giam_doc_operating = '';
$ban_tong_giam_doc_member = '';
$ban_tong_giam_doc_member_person = '';
if ($ban_tong_giam_doc) {
    $ban_tong_giam_doc_banner = $ban_tong_giam_doc['banner'];
    $ban_tong_giam_doc_operating = $ban_tong_giam_doc['operating'];
    $ban_tong_giam_doc_member = $ban_tong_giam_doc['member'];
    $ban_tong_giam_doc_member_person = $ban_tong_giam_doc_member['person'];
}
$other_info = get_field('other_info_ban_lanh_dao', 'option');
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REDIRECT_URL]";

get_header();
?>
<div class="ban-lanh-dao">
    <section class="banner" style='background-image:url("<?php echo $banner['background']; ?>")'>
        <div class="container">
            <div class="content">
                <span class="divider"></span>
                <h3><?php echo isset($banner['title']) ? $banner['title'] : ""; ?></h3>
                <p><?php echo isset($banner['description']) ? $banner['description'] : ""; ?></p>
            </div>
            <div class="navigation">
                <ul>
                    <?php if ($navigation) : ?>
                        <?php foreach ($navigation as $key => $value) : ?>
                            <li class="<?php echo $actual_link == $value['link'] ? 'active' : '' ?>"> <a href="<?php echo $value['link']; ?>"><?php echo $value['label']; ?></a></li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </section>
    <div class="main">
        <div class="container">
            <div class="wrap-head">
                <h3><?php echo isset($ban_tong_giam_doc_banner['title']) ? $ban_tong_giam_doc_banner['title'] : ""; ?></h3>
                <p><?php echo isset($ban_tong_giam_doc_banner['description']) ? $ban_tong_giam_doc_banner['description'] : ""; ?></p>
            </div>
            <span class="divider-section"></span>
            <div class="content">
                <?php if ($ban_tong_giam_doc_operating) : ?>
                    <?php foreach ($ban_tong_giam_doc_operating as $key => $value) : ?>
                        <div class="person d-flex">
                            <div class="image">
                                <img src="<?php echo $value['image']; ?>" alt="person">
                            </div>
                            <div class="info">
                                <p class="position"><?php echo $value['position']; ?></p>
                                <h6 class="name"><?php echo $value['name']; ?></h6>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                <span class="divider-section"></span>
                <div class="wraper-member">
                    <h5 class="title"><?php echo isset($ban_tong_giam_doc_member['title']) ? $ban_tong_giam_doc_member['title'] : ""; ?></h5>
                    <div class="member">
                        <?php if ($ban_tong_giam_doc_member_person) : ?>
                            <?php foreach ($ban_tong_giam_doc_member_person as $key => $value) : ?>
                                <div class="person d-flex">
                                    <div class="image">
                                        <img src="<?php echo $value['image']; ?>" alt="person">
                                    </div>
                                    <div class="info">
                                        <h6 class="name"><?php echo $value['name']; ?></h6>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
<?php
get_footer();
?>