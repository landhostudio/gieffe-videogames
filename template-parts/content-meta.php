<div class="meta">

  <?php
    $timeSemantic = get_the_time('c');
    $timePlain = get_the_date();
  ?>
  <time datetime="<?php echo $timeSemantic; ?>"><?php echo $timePlain; ?></time>
  
  <?php if ( is_single() ) : ?>
    <?php the_category(); ?>
  <?php else : ?>
    <ul class="post-categories">
      <?php
        $categories = get_the_category();
        foreach ($categories as $category) {
          echo '<li>' . $category->name . '</li>';
        }
      ?>
    </ul>
  <?php endif; ?>
  
</div>
