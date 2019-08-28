<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$terms = get_terms(array(
    'taxonomy' => 'project_tag',
    'hide_empty' => false,
        ));
$animations = array('fadeInLeft', 'fadeInRight', 'fadeInTop', 'fadeInBottom');
//echo '<pre>'; print_r($terms);exit;
?>
<section class="colorlib-work" data-section="work">
    <div class="colorlib-narrow-content">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
                <span class="heading-meta">My Work</span>
                <h2 class="colorlib-heading animate-box">Recent Work</h2>
            </div>
        </div>
        <?php if (!empty($terms)) { ?>

            <div class="row row-bottom-padded-sm animate-box" data-animate-effect="<?php echo $animations[rand(0, sizeof($animations))]; ?>">
                <div class="col-md-12">
                    <p class="work-menu">
                        <span><a href="javascript:void(0)" class="filter_projects active" data-term-id="0">All</a></span>
                        <?php foreach ($terms as $term) { ?>
                        <span><a href="javascript:void(0)" class="filter_projects" data-term-id="<?php echo $term->term_id; ?>"><?php echo strtoupper($term->name) ?></a></span> 
                        <?php } ?>
                    </p>


                </div>
            </div>
        <?php } ?>

        <div class="row projectList" >
            <?php $projects = new WP_Query(array('post_type' => 'project', 'post_status' => 'publish')); ?>
            <?php
            if ($projects->have_posts()) : while ($projects->have_posts()) : $projects->the_post();
                    $team_size = get_post_meta(get_the_ID(), 'project-team', true);
                    $client = get_post_meta(get_the_ID(), 'project-client', true);
                    $team_duration = get_post_meta(get_the_ID(), 'project-duration', true);
                    $url = get_post_meta(get_the_ID(), 'project-url', true);

                    $projectImg = get_template_directory_uri() . '/assets/images/img-1.jpg';
                    if (has_post_thumbnail()) {
                        $projectImg = get_the_post_thumbnail_url();
                    }
                    ?>
                    <div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
                        <div class="project" style="background-image: url(<?php echo $projectImg; ?>);">
                            <div class="desc">
                                <div class="con">
                                    <h3><a href="#"><?php echo the_title(); ?></a></h3>
                                    <span>Client : <?php echo!empty($client) ? $client : '--'; ?></span>
                                    <span>Team : <?php echo!empty($team_size) ? $team_size : 0; ?></span>
                                    <span>Duration: <?php echo!empty($team_duration) ? $team_duration : 0; ?></span>
                                    <span>Url: <?php echo!empty($team_duration) ? $url : '--'; ?></span>
                                    <p class="icon">
                                        <span><a href="#"><i class="icon-share3"></i></a></span>
                                        <span><a href="#"><i class="icon-eye"></i> 100</a></span>
                                        <span><a href="#"><i class="icon-heart"></i> 49</a></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
<?php else : ?>
                <div class="animate-box" data-animate-effect="fadeInTop">
                    <div class="col-md-12 btn btn-info">No Projects Found</div>
                </div>
<?php endif; ?>

        </div>
        <!--        <div class="row">
                    <div class="col-md-12 animate-box">
                        <p><a href="#" class="btn btn-primary btn-lg btn-load-more">Load more <i class="icon-reload"></i></a></p>
                    </div>
                </div>-->
    </div>
</section>


