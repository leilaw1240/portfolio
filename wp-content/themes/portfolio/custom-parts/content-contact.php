<?php
$user_email = get_post_meta(get_the_ID(), 'my-email', true);
$name = get_post_meta(get_the_ID(), 'my-name', true);
$address = get_post_meta(get_the_ID(), 'my-address', true);
$mobile = get_post_meta(get_the_ID(), 'my-mobile', true);
$designation = get_post_meta(get_the_ID(), 'my-designation', true);
$contactForm = get_post_meta(get_the_ID(), 'my-contact-form', true);
?>
<section class="colorlib-contact" data-section="contact">
    <div class="colorlib-narrow-content">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
                <span class="heading-meta">Get in Touch</span>
                <h2 class="colorlib-heading">Contact</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <div class="colorlib-feature colorlib-feature-sm animate-box" data-animate-effect="fadeInLeft">
                    <div class="colorlib-icon">
                        <i class="icon-globe-outline"></i>
                    </div>
                    <div class="colorlib-text">
                        <p><a href="<?php echo !empty($user_email) ? 'mailto:'.$user_email : ''; ?>"><?php echo !empty($user_email) ? $user_email : '--'; ?></a></p>
                    </div>
                </div>

                <div class="colorlib-feature colorlib-feature-sm animate-box" data-animate-effect="fadeInLeft">
                    <div class="colorlib-icon">
                        <i class="icon-map"></i>
                    </div>
                    <div class="colorlib-text">
                        <p><?php echo !empty($address) ? $address : '--'; ?></p>
                    </div>
                </div>

                <div class="colorlib-feature colorlib-feature-sm animate-box" data-animate-effect="fadeInLeft">
                    <div class="colorlib-icon">
                        <i class="icon-phone"></i>
                    </div>
                    <div class="colorlib-text">
                        <p><a href="<?php echo !empty($mobile) ? 'tel://+91'.$mobile : ''; ?>"><?php echo !empty($mobile) ? $mobile : '--'; ?></a></p>
                    </div>
                </div>
            </div>
            <?php if (!empty($contactForm)) { ?>
                <div class="col-md-7 col-md-push-1">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1 col-md-pull-1 animate-box" data-animate-effect="fadeInRight">
                            <?php echo do_shortcode( $contactForm); ?>

                        </div>

                    </div>
                </div>
            <?php } ?>

        </div>

</section>
