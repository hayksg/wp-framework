<form role="search" method="get" id="searchform" class="searchform" action="<?php echo home_url( '/' ); ?>">
    <div class="input-group">
        <input type="text" placeholder="Search for..." class="form-control" name="s" id="search" value="<?php the_search_query(); ?>">
        <span class="input-group-btn">
            <button class="btn btn-secondary" type="submit">Go!</button>
        </span>
    </div>
</form>
