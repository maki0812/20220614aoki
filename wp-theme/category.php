<?php get_header(); ?>

<main>

  <div class="firstview_category">
    <h1 class="firstview-ttl_category"><?php single_cat_title(); ?></h1>
  </div>
  <div class="container">
    <article class="content">
      <div class="flex__item">
        <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post(); ?>
            <div class="blog__warp">
              <a href="<?php the_permalink(); ?>" class="magazine-colum">
                <div class="news__img">
                  <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail(); ?>
                  <?php else : ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/img/no-images.png" alt="no-img">
                  <?php endif; ?>
                </div>
                <div class="blog__content">
                  <h3 class="blog__ttl">
                    <?php
                    if (mb_strlen($post->post_title, 'UTF-8') > 30) {
                      $title = mb_substr($post->post_title, 0, 30, 'UTF-8');
                      echo $title . '…';
                    } else {
                      echo $post->post_title;
                    }
                    ?>
                  </h3>
                  <div class="tag">
                    <p class="bolg__date"><?php echo get_the_date('Y-m-d'); ?></p>
                  </div>
                </div>
            </div>
          <?php endwhile; ?>
        <?php else : ?>
          <!-- 投稿が無い場合の処理 -->
          <p>投稿が見つかりません。</p>
        <?php endif; ?>
      </div>
    </article>
    <?php get_sidebar(); ?>
</main>
<?php get_footer(); ?>