<div class="col-span-3 light-grey-bg py-3">
    <h2 class="text-center mt-0">Filter competitions</h2>
    <form method="get" action="/competitions" class="merton-filters md:flex justify-center max-w-5xl mx-auto">
    <?php get_template_part( 'src/templates/generic/filter-set', null, [
        'tax'   => 'cluster', 
        'label' => 'Categories'
    ] ) ?>
    <?php 
    //get_template_part( 'src/templates/generic/filter-set', null, [
        // 'tax'                   => 'category', 
        // 'label'                 => 'Categories', 
        // 'query_param_override'  => 'category_name'
   // ] ) 
   ?>
    </form>
</div>


