<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$education_list = get_post_meta(get_the_ID(), 'my-education', true);
//echo '<pre>';
//print_r($education_list);exit;
?>
<section class="colorlib-education" data-section="education">
    <div class="colorlib-narrow-content">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
                <span class="heading-meta">Education</span>
                <h2 class="colorlib-heading animate-box">Education</h2>
            </div>
        </div>
        <div class="row">
            <?php if (!empty($education_list)) { ?>
                <div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
                    <div class="fancy-collapse-panel">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <?php $i = 1;
                            foreach ($education_list as $education) {
                                ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="heading<?php echo $i; ?>">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i; ?>" aria-expanded="<?php echo $i == 1 ? 'true' : 'false'; ?>" aria-controls="collapse<?php echo $i; ?>"><?php echo $education[0] ?> ( <?php echo $education[1] ?> - <?php echo $education[2] ?>)</a>
                                        </h4>
                                    </div>
                                    <div id="collapse<?php echo $i; ?>" class="panel-collapse collapse <?php echo $i == 1 ? 'in' : ''; ?>" role="tabpanel" aria-labelledby="heading<?php echo $i; ?>">
<!--                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p>Inistitute information will come here.</p>
                                                </div>
                                               
                                            </div>
                                        </div>-->
                                    </div>
                                </div>
                                <?php $i++;
                            }
                            ?>


                        </div>
                    </div>
                </div>
<?php } else { ?>
                <div class="animate-box" data-animate-effect="fadeInTop">
                    <div class="col-md-12 btn btn-info">No Skill Found</div>
                </div>
<?php } ?>

        </div>
    </div>
</section>