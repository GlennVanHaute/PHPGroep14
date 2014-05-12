<header class="span8" id="top-header">
<nav class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="nav-collapse">
                <?php 
                wp_nav_menu(array(
                    'menu' => 'Top menu',
                    'menu_class' => 'nav'
                ));
                ?>
                <ul class="nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Categories <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                        <?php 
                        $args = array(
                            'exclude'   =>'1',
                            'orderby'   =>'name',
                            'order'     => 'ASC'
                        );
                        foreach(get_categories($args) as $category): ?>
                            <li><a href="<?php echo get_category_link($category->term_id); ?>" title="Category: <?php echo $category->name; ?>"><?php echo $category->name; ?></a></li>
                        <?php endforeach; ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('title'); ?> - Back to the homepage">
    <hgroup class="row-fluid">
        <?php if(is_single()):?>
            <h2 class="like-h1">My blog</h2>
        <?php else: ?>
            <h1>My blog</h1>
        <?php endif; ?>
        <h2>Bla bla bla</h2>
    </hgroup>
</a>
</header>