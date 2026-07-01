<?php
/**
 * Template Name: Daam Koto Homepage
 * The front page template
 */
get_header();
?>
<!-- LOGO BAR -->
<!-- <div class="dk-logo-bar">
    <a href="<?php echo home_url(); ?>" class="dk-logo-link">
        <?php
        $custom_logo_id = get_theme_mod('custom_logo');
        if ($custom_logo_id) {
            echo wp_get_attachment_image($custom_logo_id, 'full', false, array('class' => 'dk-logo-img'));
        } else {
        ?>
        <div class="dk-logo-text-wrap">
            <div class="dk-logo-main">Daam Koto?</div>
            <div class="dk-logo-bn">দাম কতো?</div>
        </div>
        <?php } ?>
    </a>
</div> -->

<div class="dk-mobile-header">
    <a href="<?php echo home_url(); ?>" class="dk-mobile-logo">
        <span class="dk-mobile-logo-en">Daam Koto?</span>
        <span class="dk-mobile-logo-bn">দাম কতো?</span>
    </a>
    <button class="dk-burger" id="dkBurger" aria-label="Menu">
        <span></span>
        <span></span>
        <span></span>
    </button>
</div>

<!-- MOBILE NAV DRAWER -->
<nav class="dk-mobile-nav" id="dkMobileNav">
    <a href="<?php echo get_permalink(wc_get_page_id('shop')); ?>">Shop</a>
    <a href="<?php echo get_permalink(wc_get_page_id('shop')); ?>?orderby=popularity">Women</a>
    <a href="#">Sale</a>
    <a href="<?php echo get_page_link(get_page_by_title('About Us')); ?>">About Us</a>
    <a href="<?php echo get_page_link(get_page_by_title('Contact Us')); ?>">Contact Us</a>
</nav>


<!-- ANNOUNCEMENT BAR -->
<div class="dk-announcement-bar">
    Handcrafted for your story &nbsp;✦&nbsp; Free delivery inside Chittagong on orders ৳999+ &nbsp;✦&nbsp; Pay with bKash
</div>

<!-- HERO SECTION -->
<section class="dk-hero">
    <div class="dk-hero-left">
        <div class="dk-hero-eyebrow">
            <div class="dk-eyebrow-line"></div>
            <span class="dk-eyebrow-text">Handcrafted since 2020</span>
        </div>
        <div class="dk-hero-bn">দাম কতো?</div>
        <div class="dk-hero-en">Style for every woman.<br>Price for every pocket.</div>
        <div class="dk-hero-rule"></div>
        <div class="dk-hero-sub">
            Premium women's clothing made with care.<br>
            Because great fashion shouldn't cost a fortune.
        </div>
        <div class="dk-hero-btns">
            <a href="<?php echo get_permalink(wc_get_page_id('shop')); ?>" class="dk-btn-primary">Shop Now →</a>
            <a href="<?php echo get_permalink(wc_get_page_id('shop')); ?>" class="dk-btn-ghost">View Collection</a>
        </div>
    </div>
    <div class="dk-hero-right">
    <div class="dk-hero-badge">
        <div class="dk-badge-text">Made<br>in BD</div>
    </div>

    <!-- PRODUCT SLIDER -->
    <div class="dk-hero-slider" id="dkSlider">
        <?php
        $hero_products = wc_get_products(array(
            'limit'   => 5,
            'orderby' => 'date',
            'order'   => 'DESC',
            'status'  => 'publish',
        ));

        $first = true;
        foreach ($hero_products as $product) :
            $img_url   = get_the_post_thumbnail_url($product->get_id(), 'large');
            $price     = $product->get_price();
            $name      = $product->get_name();
            $permalink = $product->get_permalink();
            $active    = $first ? 'active' : '';
            $first     = false;
        ?>
        <div class="dk-slide <?php echo $active; ?>"
             data-price="৳<?php echo number_format($price, 0); ?>"
             data-name="<?php echo esc_attr($name); ?>"
             data-link="<?php echo esc_url($permalink); ?>">
            <?php if ($img_url) : ?>
                <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($name); ?>" />
            <?php else : ?>
                <div class="dk-slide-no-img"></div>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
    </div>

    <!-- DOTS -->
    <div class="dk-slider-dots" id="dkDots">
        <?php
        $i     = 0;
        $first = true;
        foreach ($hero_products as $product) :
            $active = $first ? 'active' : '';
            $first  = false;
        ?>
        <button class="dk-slider-dot <?php echo $active; ?>" data-index="<?php echo $i; ?>"></button>
        <?php $i++; endforeach; ?>
    </div>

    <!-- PRICE CARD — updates with slider -->
    <div class="dk-hero-price-card" id="dkPriceCard">
        <div class="dk-price-label" id="dkProductName">
            <?php if (!empty($hero_products)) echo esc_html($hero_products[0]->get_name()); ?>
        </div>
        <div class="dk-price-val" id="dkProductPrice">
            <?php if (!empty($hero_products)) echo '৳' . number_format($hero_products[0]->get_price(), 0); ?>
        </div>
        <a href="<?php if (!empty($hero_products)) echo esc_url($hero_products[0]->get_permalink()); ?>" class="dk-price-btn" id="dkProductLink">View →</a>
    </div>
</div>
</section>

<!-- TICKER -->
<div class="dk-ticker">
    <span class="dk-ticker-inner">
        New Arrivals <span class="dk-acc">✦</span>
        Handcrafted with Love <span class="dk-acc">✦</span>
        bKash Payment <span class="dk-acc">✦</span>
        
        Easy Returns <span class="dk-acc">✦</span>
        দাম কতো? <span class="dk-acc">✦</span>
        Made in Chittagong <span class="dk-acc">✦</span>
        Premium Quality <span class="dk-acc">✦</span>
        New Arrivals <span class="dk-acc">✦</span>
        Handcrafted with Love <span class="dk-acc">✦</span>
        bKash Payment <span class="dk-acc">✦</span>
        
        Easy Returns <span class="dk-acc">✦</span>
        দাম কতো? <span class="dk-acc">✦</span>
        Made in Chittagong <span class="dk-acc">✦</span>
        Premium Quality <span class="dk-acc">✦</span>
    </span>
</div>

<!-- CATEGORIES -->
<section class="dk-section">
    <div class="dk-section-head">
        <div>
            <div class="dk-section-eyebrow">Browse</div>
            <div class="dk-section-title">Shop by <em>category</em></div>
        </div>
        <a href="<?php echo get_permalink(wc_get_page_id('shop')); ?>" class="dk-view-all">All products →</a>
    </div>
    <div class="dk-cat-grid">
        <?php
        $categories = get_terms(array(
            'taxonomy'   => 'product_cat',
            'hide_empty' => false,
            'number'     => 6,
            'exclude'    => array(get_option('default_product_cat')),
        ));
        $cat_classes = array('dk-cat-bg-1', 'dk-cat-bg-2', 'dk-cat-bg-3');
        if (!empty($categories) && !is_wp_error($categories)) :
            foreach ($categories as $i => $cat) :
                $cat_link  = get_term_link($cat);
                $thumbnail = get_term_meta($cat->term_id, 'thumbnail_id', true);
                $img_url   = $thumbnail ? wp_get_attachment_url($thumbnail) : '';
        ?>
        <div class="dk-cat-card <?php echo $cat_classes[$i % 3]; ?>">
            <?php if ($img_url) : ?>
                <img class="dk-cat-img" src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($cat->name); ?>" />
            <?php endif; ?>
            <div class="dk-cat-overlay"></div>
            <a href="<?php echo esc_url($cat_link); ?>" class="dk-cat-label"><?php echo esc_html($cat->name); ?></a>
        </div>
        <?php endforeach; else : ?>
        <div class="dk-cat-card dk-cat-bg-1"><div class="dk-cat-overlay"></div><span class="dk-cat-label">New Arrivals</span></div>
        <div class="dk-cat-card dk-cat-bg-2"><div class="dk-cat-overlay"></div><span class="dk-cat-label">Kurtis</span></div>
        <div class="dk-cat-card dk-cat-bg-3"><div class="dk-cat-overlay"></div><span class="dk-cat-label">On Sale</span></div>
        <?php endif; ?>
    </div>
</section>

<!-- NEW ARRIVALS PRODUCTS -->
<section class="dk-section-alt">
    <div class="dk-section-head">
        <div>
            <div class="dk-section-eyebrow">Just dropped</div>
            <div class="dk-section-title">New <em>arrivals</em></div>
        </div>
        <a href="<?php echo get_permalink(wc_get_page_id('shop')); ?>" class="dk-view-all">View all →</a>
    </div>
    <div class="dk-product-grid">
        <?php
        $new_products = wc_get_products(array(
            'limit'   => 4,
            'orderby' => 'date',
            'order'   => 'DESC',
            'status'  => 'publish',
        ));
        if (!empty($new_products)) :
            foreach ($new_products as $product) :
                $is_on_sale = $product->is_on_sale();
                $img_url    = get_the_post_thumbnail_url($product->get_id(), 'woocommerce_single');
        ?>
        <a href="<?php echo esc_url($product->get_permalink()); ?>" class="dk-product-card">
    <div class="dk-product-img">
        <?php if ($is_on_sale) : ?>
            <span class="dk-p-badge dk-badge-sale">Sale</span>
        <?php else : ?>
            <span class="dk-p-badge dk-badge-new">New</span>
        <?php endif; ?>
        <?php if ($img_url) : ?>
            <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($product->get_name()); ?>" loading="lazy" />
        <?php endif; ?>
        <!-- Hover overlay — desktop only -->
        <div class="dk-product-hover-overlay">
            <span class="dk-hover-btn">View Product</span>
        </div>
    </div>
    <div class="dk-product-info">
        <div class="dk-product-name"><?php echo esc_html($product->get_name()); ?></div>
        <div class="dk-price-row">
            <?php if ($is_on_sale) : ?>
                <span class="dk-product-price">৳<?php echo number_format($product->get_sale_price(), 0); ?></span>
                <span class="dk-product-price-old">৳<?php echo number_format($product->get_regular_price(), 0); ?></span>
            <?php else : ?>
                <span class="dk-product-price">৳<?php echo number_format($product->get_price(), 0); ?></span>
            <?php endif; ?>
        </div>
        <?php
        if ($product->is_type('variable')) {
            $attributes = $product->get_variation_attributes();
            if (isset($attributes['attribute_pa_size'])) {
                echo '<div class="dk-size-row">';
                foreach ($attributes['attribute_pa_size'] as $size) {
                    echo '<span class="dk-size-tag">' . strtoupper(esc_html($size)) . '</span>';
                }
                echo '</div>';
            }
        }
        ?>
    </div>
</a>
        <?php endforeach; else : ?>
        <p style="color:#444;font-family:'DM Sans',sans-serif;">No products yet. Add products in WooCommerce to see them here.</p>
        <?php endif; ?>
    </div>
</section>

<!-- STORY STRIP -->
<div class="dk-story-strip">
    <div>
        <div class="dk-story-sup">Our story</div>
        <div class="dk-story-title">Handcrafted for <em>your story.</em><br>Proudly made in Chittagong.</div>
        <div class="dk-story-sub">Every piece made with love and care since 2020.</div>
    </div>
    <div class="dk-stats">
        <div class="dk-stat">
            <div class="dk-stat-num">5K+</div>
            <div class="dk-stat-label">Happy customers</div>
        </div>
        <div class="dk-stat">
            <div class="dk-stat-num">2020</div>
            <div class="dk-stat-label">Est. in CTG</div>
        </div>
        <div class="dk-stat">
            <div class="dk-stat-num">100%</div>
            <div class="dk-stat-label">Local made</div>
        </div>
    </div>
</div>

<!-- CUSTOMER REVIEWS -->
<section class="dk-section">
    <div class="dk-section-head">
        <div>
            <div class="dk-section-eyebrow">What they say</div>
            <div class="dk-section-title">Customer <em>reviews</em></div>
        </div>
    </div>
    <div class="dk-reviews-grid">
        <div class="dk-review-card">
            <div class="dk-stars">★★★★★</div>
            <div class="dk-review-text">The quality is amazing! I ordered a kurti and it arrived beautifully packaged. The fabric feels premium and the fit is perfect.</div>
            <div class="dk-review-author">
                <div class="dk-review-avatar dk-av-1">R</div>
                <div>
                    <div class="dk-review-name">Riya Akter</div>
                    <div class="dk-review-location">Chittagong</div>
                </div>
                <div class="dk-review-verified">✓ Verified</div>
            </div>
        </div>
        <div class="dk-review-card">
            <div class="dk-stars">★★★★★</div>
            <div class="dk-review-text">Absolutely love Daam Koto! The prices are so reasonable and the clothes look exactly like the photos. Delivery was super fast!</div>
            <div class="dk-review-author">
                <div class="dk-review-avatar dk-av-2">N</div>
                <div>
                    <div class="dk-review-name">Nusrat Jahan</div>
                    <div class="dk-review-location">Dhaka</div>
                </div>
                <div class="dk-review-verified">✓ Verified</div>
            </div>
        </div>
        <div class="dk-review-card">
            <div class="dk-stars">★★★★★</div>
            <div class="dk-review-text">Best online clothing shop! The packaging feels like receiving a gift. The embroidery work on my dress is absolutely stunning.</div>
            <div class="dk-review-author">
                <div class="dk-review-avatar dk-av-3">S</div>
                <div>
                    <div class="dk-review-name">Sumaiya Islam</div>
                    <div class="dk-review-location">Sylhet</div>
                </div>
                <div class="dk-review-verified">✓ Verified</div>
            </div>
        </div>
    </div>
</section>

<!-- PACKAGING -->
<section class="dk-section-alt">
    <div>
        <div class="dk-section-eyebrow">The experience</div>
        <div class="dk-section-title">Every order is <em>a gift</em></div>
    </div>
    <div class="dk-pack-grid">
        <div class="dk-pack-card">
            <div class="dk-pack-icon">
                <svg viewBox="0 0 24 24" fill="none"><rect x="2" y="7" width="20" height="15" rx="1" stroke="#fff" stroke-width="1.5"/><path d="M2 7L12 1L22 7" stroke="#fff" stroke-width="1.5" fill="none"/></svg>
            </div>
            <div class="dk-pack-title">Custom Packaging</div>
            <div class="dk-pack-desc">Every order wrapped in our signature tissue paper with the Daam Koto seal.</div>
        </div>
        <div class="dk-pack-card">
            <div class="dk-pack-icon">
                <svg viewBox="0 0 24 24" fill="none"><rect x="4" y="2" width="16" height="20" rx="1" stroke="#fff" stroke-width="1.5"/><line x1="8" y1="8" x2="16" y2="8" stroke="#fff" stroke-width="1"/><line x1="8" y1="12" x2="16" y2="12" stroke="#fff" stroke-width="1"/><line x1="8" y1="16" x2="12" y2="16" stroke="#fff" stroke-width="1"/></svg>
            </div>
            <div class="dk-pack-title">Hang Tag Included</div>
            <div class="dk-pack-desc">Premium black hang tag with care instructions on every single garment.</div>
        </div>
        <div class="dk-pack-card">
            <div class="dk-pack-icon">
                <svg viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="9" stroke="#fff" stroke-width="1.5"/><path d="M8 12L11 15L16 9" stroke="#fff" stroke-width="1.5"/></svg>
            </div>
            <div class="dk-pack-title">Fast Delivery</div>
            <div class="dk-pack-desc">1–3 days inside Chittagong. 3–7 days anywhere in Bangladesh.</div>
        </div>
    </div>
</section>

<!-- BKASH BAR -->
<div class="dk-bkash-bar">
    <div>
        <div class="dk-bkash-title">Pay with <span>bKash</span> — instantly.</div>
        <div class="dk-bkash-sub">No card. No hassle. Checkout in seconds.</div>
    </div>
    <a href="<?php echo get_permalink(wc_get_page_id('checkout')); ?>" class="dk-bkash-btn">Pay with bKash →</a>
</div>

<!-- FOOTER -->
<footer class="dk-footer">
    <div class="dk-footer-top">
        <div>
            <div class="dk-footer-logo-en">Daam Koto?</div>
            <div class="dk-footer-logo-bn">দাম কতো?</div>
            <div class="dk-footer-desc">
                Handcrafted for your story.<br>
                <span>দাম কতো?</span> — Because price matters.<br>
                Based in Chittagong, Bangladesh.
            </div>
            <div class="dk-footer-socials">
                <a href="https://www.facebook.com/daamkoto001/" target="_blank" class="dk-footer-social">
                    <svg viewBox="0 0 24 24" fill="none"><path d="M18 2H15C13.67 2 12.4 2.53 11.46 3.46C10.53 4.4 10 5.67 10 7V10H7V14H10V22H14V14H17L18 10H14V7C14 6.73 14.11 6.48 14.29 6.29C14.48 6.11 14.73 6 15 6H18V2Z" stroke="#888070" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </a>
                <a href="https://www.instagram.com/daamkotoofficial/" target="_blank" class="dk-footer-social">
                    <svg viewBox="0 0 24 24" fill="none"><rect x="2" y="2" width="20" height="20" rx="5" stroke="#888070" stroke-width="1.5"/><circle cx="12" cy="12" r="4" stroke="#888070" stroke-width="1.5"/><circle cx="17.5" cy="6.5" r="1" fill="#888070"/></svg>
                </a>
                <a href="#" class="dk-footer-social">
                    <svg viewBox="0 0 24 24" fill="none"><path d="M21 11.5C21 16.75 16.75 21 11.5 21C10.18 21 8.93 20.7 7.8 20.17L3 21L4.33 16.47C3.5 15.25 3 13.93 3 11.5C3 6.25 7.25 2 12.5 2C16.5 2 19.92 4.4 21 11.5Z" stroke="#888070" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </a>
            </div>
        </div>
        <div>
            <div class="dk-footer-col-title">Shop</div>
            <ul class="dk-footer-links">
                <li><a href="<?php echo get_permalink(wc_get_page_id('shop')); ?>">New arrivals</a></li>
                <li><a href="<?php echo get_permalink(wc_get_page_id('shop')); ?>">Women</a></li>
                <li><a href="<?php echo get_permalink(wc_get_page_id('shop')); ?>">Sale</a></li>
                <li><a href="<?php echo get_permalink(wc_get_page_id('shop')); ?>">All products</a></li>
            </ul>
        </div>
        <div>
            <div class="dk-footer-col-title">Help</div>
            <ul class="dk-footer-links">
                <li><a href="#">Delivery policy</a></li>
                <li><a href="#">Return policy</a></li>
                <li><a href="#">Size guide</a></li>
                <li><a href="#">Contact us</a></li>
            </ul>
        </div>
        <div>
            <div class="dk-footer-col-title">About</div>
            <ul class="dk-footer-links">
                <li><a href="#">Our story</a></li>
                <li><a href="#">Packaging</a></li>
                <li><a href="#">Reviews</a></li>
                <li><a href="#">Track order</a></li>
            </ul>
        </div>
    </div>
    <div class="dk-footer-bottom">
        <div class="dk-footer-copy">© <?php echo date('Y'); ?> Daam Koto. All rights reserved. Made with care in Chittagong.</div>
        <div class="dk-pay-row">
            <div class="dk-pay-tag bk">bKash</div>
            <div class="dk-pay-tag">COD</div>
            <div class="dk-pay-tag">SSL</div>
            <div class="dk-pay-tag am">দাম কতো?</div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html> 