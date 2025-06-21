<?php
if(in_array('noindex',get_sub_field('section-activity')['section-check'])){
	echo '<!--noindex-->';
}
$team_exclude = get_field('team-setting', 'option')['exclude'];

?>

	<section id="kts-team">
		<div class="container-fluid">
			<div class="team-wrap">
				<?php
				if(get_sub_field('team-items')){
					$args = array(
						'post_type' => array('team'),
						'showposts' => -1,
						'post__in' => get_sub_field('team-items'),
						'orderby' => 'post__in',
						'order' => 'ASC',
						'post__not_in' => $team_exclude,
					);
				}else{
					$args = array(
						'post_type' => array('team'),
						'showposts' => 4,
						'post__not_in' => $team_exclude,
					);
				}
				$the_query = new WP_Query( $args );
				$item_count = count($the_query->posts);
				//print("<pre>".strip_tags(print_r($the_query,true))."</pre>");

				while ( $the_query->have_posts() ) : $the_query->the_post();
					$title = get_the_title(); 
					$title_array = explode(" ", $title);
					$title_array_new = array_merge( array_slice( $title_array, 0, 1, true ), array( '<br/>' ), array_slice( $title_array, 1, null, true ) );
					$title_new = implode(' ', $title_array_new)
				?>
				<div class="item item-<?php echo $item_count; ?> autoheight">
					<div class="team">
						<div class="avatar">
							<img src="<?php echo get_field("avatar")['sizes']['team']; ?>" loading="lazy" />
						</div>
						<div class="body">
							<div class="name">
								<?php echo $title_new; ?>
							</div>
							<div class="position">
								<?php the_field('position'); ?>
							</div>
							<div class="team-contacts team-email">
								<a href="mailto:<?php echo get_field('email'); ?>"><?php echo get_field('email'); ?></a>
							</div>
							<div class="team-contacts team-phone">
								<a href="mailto:+7<?php echo substr(preg_replace('#[^\d]#', '', get_field('phone')), 1); ?>"><?php echo get_field('phone'); ?></a>
								<?php echo get_field('phone_add') ? get_field('phone_add') : ""; ?>
							</div>
						</div>
					</div>
				</div>
				<?php 
					endwhile; 
					wp_reset_query();
				?>
			</div>
			<div class="team-arrow"></div>
		</div>
	</section>
<?php
if(in_array('noindex',get_sub_field('section-activity')['section-check'])){
	echo '<!--/noindex-->';
}
?>