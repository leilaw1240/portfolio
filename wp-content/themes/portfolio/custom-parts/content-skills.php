<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//$skills = get_post_meta(get_the_ID(), 'my-skills',true);
$animations = array('fadeInLeft','fadeInRight','fadeInTop','fadeInBottom');
//echo '<pre>';
//print_r($skills);exit;
$skills = get_terms( array(
    'taxonomy' => 'project_tag',
    'hide_empty' => false,
) );
?>
<section class="colorlib-skills" data-section="skills">
    <div class="colorlib-narrow-content">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
                <span class="heading-meta">My Specialty</span>
                <h2 class="colorlib-heading animate-box">My Skills</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
                <p>The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. She packed her seven versalia, put her initial into the belt and made herself on the way.</p>
            </div>
            <?php if(!empty($skills)){ foreach($skills as $skill){ ?>
            
            <div class="col-md-6 animate-box" data-animate-effect="<?php echo $animations[rand(0, sizeof($animations))]; ?>">
                <div class="progress-wrap">
                    <h3><?php echo strtoupper($skill->name) ?></h3>
                </div>
            </div>
            <?php }}else{ ?>
            <div class="animate-box" data-animate-effect="fadeInTop">
                <div class="col-md-12 btn btn-info">No Skill Found</div>
            </div>
            <?php } ?>
             
        </div>
    </div>
</section>