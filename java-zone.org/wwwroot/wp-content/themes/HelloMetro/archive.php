﻿<?php get_header(); ?>
<div id="roll"><div title="回到顶部" id="roll_top"></div><div title="转到底部" id="fall"></div></div>
<div id="content">
<div class="main">
<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
<ul <?php post_class(); ?> id="post-<?php the_ID(); ?>">
<li>
<div class="post_date">
<span class="date_ym"><?php the_time('Y') ?>.<?php echo date('m',get_the_time('U'));?></span>
<span class="date_d"><?php the_time('d') ?></span>
</div>
<div class="article">
<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="详细阅读 <?php the_title_attribute(); ?>"><?php the_title(); ?></a><span class="new"><?php include('includes/new.php'); ?></span></h2>
<div class="infotop">
<span class="info-category-icon"><?php the_category(', ') ?></span>
<span class="info-view-icon">超过<?php if(function_exists(the_views)) { the_views();}?>围观</span>
<span class="info-comment-icon"><?php comments_popup_link ('0条评论','1条评论','%条评论'); ?></span>
</div>
<div class="thumbnail_box">
<div class="thumbnail">
<a href="<?php the_permalink() ?>" rel="bookmark" target="_blank" title="<?php the_title(); ?>">
<?php $thumb_img = has_post_thumbnail() ? get_the_post_thumbnail( $post->ID, array(140, 100), array('alt' => trim(strip_tags( $post->post_title )),'title'=> trim(strip_tags( $post->post_title ))) ) : get_post_img( 140, 100, 2);?>   
<?php echo $thumb_img;?> 
</a></div>
</div>

<div class="entry_post">
<span><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 300,"..."); ?></span>
<div class="clear"></div>
<div class="infobot">
<span class="info-user-icon">来源：<?php $custom_fields = get_post_custom_keys($post_id);  
if (!in_array ('copyright', $custom_fields)) : ?>
本站原创 
<?php else: ?>  
<?php $custom = get_post_custom($post_id);
$custom_url=$custom['copyrighturl'] ;  
$custom_value = $custom['copyright']; ?>  
<a target="_blank" href="<?php echo $custom_url[0] ?>" ><?php echo $custom_value[0] ?></a>
<?php endif; ?>
</span>
<span class="info-tag-icon"><?php the_tags('标签：', ', ', ''); ?></span>
</div>
<div class="readmore"><a href="<?php the_permalink() ?>" title="详细阅读 <?php the_title(); ?>" rel="bookmark" style="opacity: 1; " target="_blank">阅读全文</a></div>
</div></li></ul><div class="clear"></div>
		<?php endwhile; ?>
		<?php endif; ?> 
<div class="navigation"><?php pagination($query_string); ?></div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>