<section class="text-gray-600 body-font">
  <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-wrap -m-4">
      <!-- Latest Post - start -->
      <?php
      $args = array(
          'post_type'      => 'post',
          'posts_per_page' => 3, // Display only one post
          'orderby'        => 'date', // Order by date
          'order'          => 'DESC', // Show latest post first
      );

      $query = new WP_Query($args);

      if ($query->have_posts()) :
          $query->the_post();
          ?>
          <div class="p-4 md:w-1/3">
            <a href="<?php the_permalink(); ?>" class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden flex flex-col">
              <?php if (has_post_thumbnail()) : ?>
                  <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'thumbnail_720x400')); ?>" alt="<?php the_title_attribute(); ?>">
              <?php endif; ?>
              <div class="p-6">
                <h1 class="title-font text-lg font-medium text-gray-900 mb-3"><?php the_title(); ?></h1>
                <p class="leading-relaxed mb-3"><?php echo wp_trim_words(get_the_excerpt(), 15, '...'); ?></p>
              </div>
            </a>
          </div>
          <?php
          wp_reset_postdata();
      else :
          echo '<p>No posts found</p>';
      endif;
      ?>
      <!-- Latest Post - end -->
    </div>
  </div>
</section>

