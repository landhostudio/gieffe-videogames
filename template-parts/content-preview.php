<article class="posts-item">
  <a rel="bookmark" href="<?php the_permalink(); ?>">
    <?php the_post_thumbnail('medium'); ?>
    <h3><?php the_title(); ?></h3>
    <?php the_excerpt(); ?>
    <div class="posts-meta">
      <?php
        $timeSemantic = get_the_time('c');
        $timePlain = get_the_date();
      ?>
      <time datetime="<?php echo $timeSemantic; ?>"><?php echo $timePlain; ?></time>
      <ul>
        <?php
          $categories = get_the_category();
          foreach ($categories as $category) {
            echo '<li>' . $category->name . '</li>';
          }
        ?>
      </ul>
    </div>
  </a>
</article>
