<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$animations = array('fadeInLeft','fadeInRight','fadeInTop','fadeInBottom');
?>
<section class="colorlib-about" data-section="about">
    <div class="colorlib-narrow-content">
        <div class="row">
            <div class="col-md-12">
                <div class="row row-bottom-padded-sm">
                    <div class="col-md-12">
                        <div class="about-desc">
                            <span class="heading-meta animate-box" data-animate-effect="fadeInRight">About Us</span>
                            <div class="animate-box" data-animate-effect="fadeInLeft">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>
