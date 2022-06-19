<?php
/**
 * The template for displaying all front page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cotodi
 */

get_header();
?>
 
	<main id="primary" class="site-main">
        <section class="container pb-5 pt-2">
            <div id="carouselExampleDark" class="carousel carousel-dark slide overflow-hidden rounded" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="3" aria-label="Slide 4"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="10000">
                        <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/img/slider/carousel-1.png" class="d-block w-100" alt="slider">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>First slide label</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item" data-bs-interval="2000">
                        <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/img/slider/carousel-2.png" class="d-block w-100" alt="slider">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Second slide label</h5>
                            <p>Some representative placeholder content for the second slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/img/slider/carousel-3.png" class="d-block w-100" alt="slider">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Third slide label</h5>
                            <p>Some representative placeholder content for the third slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/img/slider/carousel-4.png" class="d-block w-100" alt="slider">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Third slide label</h5>
                            <p>Some representative placeholder content for the third slide.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>



        <section class="container popular-products">
           
             
            <h1 class="text-center pt-5 "> Popular Products</h1>
            <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, nemo.</p>

            <div class="pt-5 pb-5">
                <?php echo do_shortcode('[products columns=4 limit=4]'); ?>
            </div>
           
        </section>


        <section class="categories pt-5 pb-5">
            <div class="container">
                <h1 class="text-center pt-5 "> Categories</h1>
                <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, nemo.</p>

            

                <div class="row pt-5">

                    <div class="categories__col col-md-4 col-sm-12 rounded">
                        <a href="#" class="col-md-12 w-100 h-100 d-inline-block p-3 position-relative rounded overflow-hidden">
                            <img class="position-absolute top-0 bottom-0 end-0 start-0" src="<?php echo get_template_directory_uri(); ?>/img/categories/toys.png" class="" loading="lazy" alt="">
                            <h2 class="position-absolute bottom-0 start-0 end-0 mb-0 text-center bg-primary-opacity-8 text-white">toys</h2>
                        </a>
                    </div>

                    <div class="categories__col col-md-4 col-sm-12 rounded  mb-3">
                        <a href="#" class="col-md-12 w-100 h-100 d-inline-block p-3 position-relative rounded overflow-hidden">
                            <img class="position-absolute top-0 bottom-0 end-0 start-0" src="<?php echo get_template_directory_uri(); ?>/img/categories/t-shirt.png" class="" loading="lazy" alt="">
                            <h2 class="position-absolute bottom-0 start-0 end-0 mb-0 text-center bg-primary-opacity-8 text-white">Tshirt</h2>
                        </a>
                    </div>

                    <div class="categories__col col-md-4 col-sm-12 rounded  mb-3">
                        <a href="#" class="col-md-12 w-100 h-100 d-inline-block p-3 position-relative rounded overflow-hidden">
                            <img class="position-absolute top-0 bottom-0 end-0 start-0" src="<?php echo get_template_directory_uri(); ?>/img/categories/caps.png" class="" loading="lazy" alt="">
                            <h2 class="position-absolute bottom-0 start-0 end-0 mb-0 text-center bg-primary-opacity-8 text-white">caps</h2>
                        </a>
                    </div>

                </div>

                <div class="row mb-3">
                    <div class="categories__col col-md-4 col-sm-12 rounded  mb-3">
                        <a href="#" class="col-md-12 w-100 h-100 d-inline-block p-3 position-relative rounded overflow-hidden">
                            <img class="position-absolute top-0 bottom-0 end-0 start-0" src="<?php echo get_template_directory_uri(); ?>/img/categories/belt.png" class="" loading="lazy" alt="">
                            <h2 class="position-absolute bottom-0 start-0 end-0 mb-0 text-center bg-primary-opacity-8 text-white">belt</h2>
                        </a>
                    </div>

                    <div class="categories__col col-md-8 col-sm-12 rounded  mb-3">
                        <a href="#" class="col-md-12 w-100 h-100 d-inline-block p-3 position-relative rounded overflow-hidden">
                            <img class="position-absolute top-0 bottom-0 end-0 start-0" src="<?php echo get_template_directory_uri(); ?>/img/categories/appliance.webp" class="" loading="lazy" alt="">
                            <h2 class="position-absolute bottom-0 start-0 end-0 mb-0 text-center bg-primary-opacity-8 text-white">caps</h2>
                        </a>
                    </div>
                </div>

            </div>

        </section>

        <section class="container special-offers">
           
             
            <h1 class="text-center pt-5"> Special Offers</h1>
            <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, nemo.</p>

            <div class="pt-5 pb-5">
                <?php echo do_shortcode('[sale_products columns=4 limit=4]'); ?>
            </div>
           
        </section>
     

        
		 

	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();