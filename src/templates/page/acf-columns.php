
<?php $columns = $args['column'];
$col_count = count( $columns );
if ( $columns && !is_wp_error( $columns ) && $col_count > 0 )  { ?>
    <div class="max-w-7xl mx-auto my-12">
    <div class="grid gap-12 px-12 grid-cols-<?php echo $col_count ?>">
    <?php foreach ( $columns as $key => $column ) { ?>
        <div class="col-<?php echo $key ?> <?php echo $column['background_color']?>-bg flex text-center flex-col justify-center pb-4">
            <?php if ( $column['link'] ) : ?>
            <a href="<?php echo $column['link'] ?>">
            <?php endif; //link ?>

            <?php if ( $column['image'] ) : ?>
                <div 
                    class="h-60 bg-cover mb-4"
                    style="background-image:url('<?php echo $column['image']['url'] ?>')"
                >
                </div>
            <?php endif; //image ?>
            <?php if ( $column['title'] ) : ?><h4 class="font-bold text-4xl mb-4"><?php echo $column['title'] ?></h4><?php endif; //title ?>
            <?php if ( $column['text'] ) : ?><p><?php echo $column['text'] ?></p><?php endif; //text ?>

            <?php if ( $column['link'] ) : ?>
            </a>
            <?php endif; //link ?>
        </div>
    <?php } ?>
    </div>
    </div>
<?php } 
