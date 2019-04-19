<section id="mu-slider">
    <?php
    foreach($slideData as $slide){
    ?>
    <!-- Start single slider item -->
    <div class="mu-slider-single">
      <div class="mu-slider-img">
        <figure>
            <img src="<?=base_url('slider_images/'.$slide['image_link']);?>" alt="img">
        </figure>
      </div>
      <div class="mu-slider-content">
        <h4><?=$slide['h_four']?></h4>
        <span></span>
        <h2><?=$slide['h_two']?></h2>
        <p><?=substr($slide['description'],0,70)?></p>
        <a href="<?=$slide['link']?>" class="mu-read-more-btn">Read More</a>
      </div>
    </div>
    <?php } ?>
  </section>