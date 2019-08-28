<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$experience = get_post_meta(get_the_ID(), 'my-experience', true);
$animations = array('fadeInLeft', 'fadeInRight', 'fadeInTop', 'fadeInBottom');
?>
<section class="colorlib-experience" data-section="experience">
    <div class="colorlib-narrow-content">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
                <span class="heading-meta">Experience</span>
                <h2 class="colorlib-heading animate-box">Work Experience</h2>
            </div>
        </div>
        <div class="row">
            <?php if (!empty($experience)) { ?>
                <div class="col-md-12">
                    <div class="timeline-centered">
                        <?php foreach ($experience as $exp) { ?>
                            <article class="timeline-entry animate-box" data-animate-effect="<?php echo $animations[rand(0, sizeof($animations))]; ?>">
                                <div class="timeline-entry-inner">
                                    <div class="timeline-icon color-1">
                                        <i class="icon-pen2"></i>
                                    </div>
                                    <div class="timeline-label">
                                        <h2><a href="#"><?php echo $exp[0]; ?></a> <span><?php echo $exp[1]; ?>-<?php echo $exp[2]; ?></span></h2>
                                        <!--<p>Tolerably earnestly middleton extremely distrusts she boy now not. Add and offered prepare how cordial two promise. Greatly who affixed suppose but enquire compact prepare all put. Added forth chief trees but rooms think may.</p>-->
                                    </div>
                                </div>
                            </article>
                        <?php } ?>
 
                    </div>
                </div>
            <?php } else { ?>

                <div class="animate-box" data-animate-effect="fadeInTop">
                    <div class="col-md-12 btn btn-info">No Work Found</div>
                </div>
            <?php } ?>

        </div>
    </div>
</section>

