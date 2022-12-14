<?php

/**
Template Name: Ban lãnh đạo - Ban kiểm soát
 **/
$banner = get_field('banner_ban_lanh_dao', 'option');
$navigation = '';
if ($banner) {
    $navigation = $banner['navigation'];
}
$ban_kiem_soat =  get_field('ban_kiem_soat', 'option');
$ban_kiem_soat_banner = '';
$ban_kiem_soat_operating = '';
$ban_kiem_soat_member = '';
$ban_kiem_soat_member_person = '';
if ($ban_kiem_soat) {
    $ban_kiem_soat_banner = $ban_kiem_soat['banner'];
    $ban_kiem_soat_operating = $ban_kiem_soat['operating'];
    $ban_kiem_soat_member = $ban_kiem_soat['member'];
    $ban_kiem_soat_member_person = $ban_kiem_soat_member['person'];
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
                <h3><?php echo isset($ban_kiem_soat_banner['title']) ? $ban_kiem_soat_banner['title'] : ""; ?></h3>
                <p><?php echo isset($ban_kiem_soat_banner['description']) ? $ban_kiem_soat_banner['description'] : ""; ?></p>
            </div>
            <span class="divider-section"></span>
            <div class="content">
                <?php if ($ban_kiem_soat_operating) : ?>
                    <?php foreach ($ban_kiem_soat_operating as $key => $value) : ?>
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
                    <h5 class="title"><?php echo isset($ban_kiem_soat_member['title']) ? $ban_kiem_soat_member['title'] : ""; ?></h5>
                    <div class="member">
                        <?php if ($ban_kiem_soat_member_person) : ?>
                            <?php foreach ($ban_kiem_soat_member_person as $key => $value) : ?>
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