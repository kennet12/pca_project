<? if(!$this->util->detect_mobile()) {  ?>
<div id="shopify-section-161079254244596451" class="shopify-section index-section nov-section-blog">
   <div data-section-id="161079254244596451" class="distance" data-section-type="nov-slick">
      <div class="container">
         <div class="title_block text-center">
            <span><?=$website['need_to_know']?></span>
         </div>
         <div class="grid--view-items row nov-slick-carousel" 
            data-autoplay="true" 
            data-autoplayTimeout="6000" 
            data-loop="false" 
            data-margin="30" 
            data-dots="false" 
            data-nav="true" 
            data-row="1" 
            data-items="3" 
            data-items_lg_tablet="3" 
            data-items_tablet="2" 
            data-items_mobile="1">
            <? foreach($contents as $content) { ?>
            <div class="item col">
               <div class="article--listing blog-grid-item text-center">
                  <a href="<?=site_url("{$alias['new']}/{$content->{$prop['category_alias']}}/{$content->{$prop['alias']}}")?>" class="article__list-image-container">
                  <img class="w-100 article__list-image lazyload new-image" data-src=".<?=$content->thumbnail?>" alt="<?=$content->{$prop['title']}?>">
                  </a>
                  <div class="media-body">
                     <div class="article__title mb-5">
                        <a href="<?=site_url("{$alias['new']}/{$content->{$prop['category_alias']}}/{$content->{$prop['alias']}}")?>" class="limit-content-1-line"><?=$content->{$prop['title']}?></a>
                     </div>
                     <div class="article__info">
                        <div class="article_cs">
                           <span class="article__author">
                           <i class="zmdi zmdi-account-o"></i>
                          Nguyên Anh Fruit
                           </span>
                           <span class="article__date">
                           <i class="zmdi zmdi-calendar-note"></i>
                           <span class="time"><?=date($website['format_date'],strtotime($content->created_date))?> </span>
                           </span>
                        </div>
                     </div>
                     <div class="article__excerpt">
                     <?=character_limiter(strip_tags($content->{$prop['description']}),150)?>
                     </div>
                  </div>
               </div>
            </div>
            <? } ?>
         </div>
      </div>
   </div>
   <style>
      #shopify-section-161079254244596451 .distance {
      padding-top: 95px;
      padding-bottom: 95px;
      }
   </style>
</div>
<? } ?>