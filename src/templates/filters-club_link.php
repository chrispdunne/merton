<div class="col-span-3 light-grey-bg py-3">
    <h2 class="text-center mt-0">Filter club links</h2>
    <form method="get" action="/club-links" class="merton-filters md:flex justify-center max-w-5xl mx-auto">
    <?php get_template_part( 'src/templates/generic/filter-set', null, [
        'tax'   => 'sport', 
        'label' => 'Sports'
    ] ) ?>

    </form>
</div>