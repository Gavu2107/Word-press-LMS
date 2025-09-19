<?php get_header(); ?>

<h1>Festivals</h1>

<?php if (have_posts()) : ?>
    <div class="festival-list">
        <?php while (have_posts()) : the_post(); ?>
            <div class="festival-item">
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                <p><strong>Date:</strong> <?php the_field('festival_dateFestival_Date'); ?></p>
                <p><strong>Location:</strong> <?php the_field('location'); ?></p>

                <?php if (get_field('featured_image')): 
                    $image = get_field('featured_image'); ?>
                    <img src="<?php echo esc_url($image['sizes']['medium']); ?>" 
                         alt="<?php echo esc_attr($image['alt']); ?>" />
                <?php endif; ?>
            </div>
        <?php endwhile; ?>
    </div>
<?php else : ?>
    <p>No festivals found.</p>
<?php endif; ?>

<?php get_footer(); ?>
