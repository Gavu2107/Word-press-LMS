    <?php get_header(); ?>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article class="festival">
            <h1><?php the_title(); ?></h1>

            <?php if ($festival_date = get_field('festival_date')): ?>
                <p><strong>Date:</strong> <?php echo date('F j, Y', strtotime($festival_date)); ?></p>
            <?php endif; ?>

            <?php if ($festival_description = get_field('festival_description')): ?>
                <p><?php echo $festival_description; ?></p>
            <?php endif; ?>

            <?php 
            if ($festival_image = get_field('festival_image')): 
                $image_url = $festival_image['url'];
            ?>
                <img src="<?php echo esc_url($image_url); ?>" alt="<?php the_title(); ?>">
            <?php endif; ?>

            <?php if ($festival_location = get_field('festival_location')): ?>
                <p><strong>Location:</strong> <?php echo esc_html($festival_location); ?></p>
            <?php endif; ?>
        </article>
    <?php endwhile; endif; ?>

    <?php get_footer(); ?>
