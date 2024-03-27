<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<!-- Netpub Banner - IAB 728x90 -->
<script type="text/javascript">{ let s = document.createElement("script"); s.setAttribute("async", true); s.setAttribute("src", "https://fstatic.netpub.media/static/2732195bd87625475e0868faa6c05381.min.js?"+Date.now()); document.querySelector("head").appendChild(s); }</script>
<ins class="adv-2732195bd87625475e0868faa6c05381" data-sizes-desktop="300x50,320x100,320x50,468x60,678x60" data-sizes-mobile="200x200,250x250,300x250,300x50,320x100,320x50,360x100,360x50,678x60" data-slot="1"></ins>
	<header class="entry-header mb-4">
		<?php the_title( sprintf( '<h1 class="entry-title text-2xl lg:text-5xl font-extrabold leading-tight mb-1">', esc_url( get_permalink() ) ), '</h1>' ); ?>
		<time datetime="<?php echo get_the_date( 'c' ); ?>" itemprop="datePublished" class="text-sm text-gray-700"><?php echo get_the_date(); ?></time>
	</header>

	<div class="entry-content">
		<?php the_content(); ?>

		<?php
			wp_link_pages(
				array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'tailpress' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
					'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'tailpress' ) . ' </span>%',
					'separator'   => '<span class="screen-reader-text">, </span>',
				)
			);
		?>
	</div>
<!-- Netpub Banner - IAB 728x90 -->
<script type="text/javascript">{ let s = document.createElement("script"); s.setAttribute("async", true); s.setAttribute("src", "https://fstatic.netpub.media/static/2732195bd87625475e0868faa6c05381.min.js?"+Date.now()); document.querySelector("head").appendChild(s); }</script>
<ins class="adv-2732195bd87625475e0868faa6c05381" data-sizes-desktop="300x50,320x100,320x50,468x60,678x60" data-sizes-mobile="200x200,250x250,300x250,300x50,320x100,320x50,360x100,360x50,678x60" data-slot="1"></ins>
</article>
