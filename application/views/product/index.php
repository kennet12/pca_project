<?
if (!empty($cate)) {
   $title_cate = $cate->{$prop['name']};
} else {
   $info_cate = new stdClass();
	$info_cate->parent_id = 0;
   $categories = $this->m_product_category->items($info_cate,1,null,null,'order_num','ASC');
   $title_cate = $website['all'];
}
$user = $this->session->userdata('user');
$usd = $this->m_setting->load(1)->usd;
?>
<div class="row row-shop">
   <div class="col-md-4 col-shop">
      <div class="text-center">
         <div class="box-shop-logo">
            <img src="https://static.wixstatic.com/media/609e3c_05d2ea7e786a4131a3982486cccf7396~mv2.png/v1/fill/w_171,h_120,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/PL_Okay.png" alt="">
            <h1 class="text font-wf">PCA MEMBERSHIP</h1>
         </div>
      </div>
   </div>
   <div class="col-md-8 col-shop">
      <img class="full-width banner-shop" src="https://static.wixstatic.com/media/609e3c_1a65db42c2474af3890c03191e9b5260~mv2.jpg/v1/fill/w_1142,h_543,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/609e3c_1a65db42c2474af3890c03191e9b5260~mv2.jpg" alt="">
   </div>
</div>
<div class="page-width">
<div class="row">
         <div class="sidebar sidebar-collection col-lg-2 col-md-4 flex-xs-unordered">
            <div class="collection_vn pt-md-30 mb-md-40">
               <div class="collection_title"><?=$website['filter']?></div>
            </div>
            <div id="shopify-section-nov-sidebar" class="shopify-section">
               <div class="close-filter"><i class="zmdi zmdi-close"></i></div>
               <? for ($i=0;$i<3;$i++) { ?>
               <div class="box-filter">
                  <div class="list-filter-selected">
                     <div class="filter-item_title align-items-center">
                        <div href="<?=site_url("{$alias['product']}")?>" class="nv-ml-auto"><i class="zmdi zmdi-delete"></i><?=$website['category']?></div>
                        <span class="toggle-icon">−</span>
                     </div>
                  </div>
                  <div class="categories__sidebar sidebar-block sidebar-block__1">
                     <? if (empty($cate)) { ?>
                     <ul class="list-unstyled">
                        <li class="item mb-10"><a href="<?=site_url("{$alias['product']}")?>"><?=$website['clear_all']?></a></li>
                     <? foreach($categories as $category) {
                        $info = new stdClass();
                        $info->parent_id = $category->id;
                        $category_subs = $this->m_product_category->items($info,1);
                     ?>
                        <li class="item mb-10">
                           <a href="<?=site_url("{$alias['product']}-{$category->{$prop['alias']}}")?>" title="<?=$category->{$prop['name']}?>"><?=$category->{$prop['name']}?></a>
                           <? if(!empty($category_subs)) { ?>
                           <i class="zmdi zmdi-caret-right transition" stt="0" cls="ctrl-<?=$category->id?>"></i>
                           <ul class="list-unstyled-sub ctrl-<?=$category->id?>" style="display:none;">
                              <? foreach($category_subs as $category_sub) { 
                                 $info_child = new stdClass();
                                 $info_child->parent_id = $category_sub->id;
                                 $category_child_subs = $this->m_product_category->items($info_child,1);?>
                              <li class="item-sub mb-10">
                                 <a href="<?=site_url("{$alias['product']}-{$category_sub->{$prop['alias']}}")?>" title="<?=$category_sub->{$prop['name']}?>"><?=$category_sub->{$prop['name']}?></a>
                                 <? if(!empty($category_child_subs)) {  ?>
                                 <i class="zmdi zmdi-caret-right"></i>
                                 <ul class="childsub-item list-unstyled-sub">
                                    <? foreach($category_child_subs as $category_child_sub) { ?>
                                    <li class="item-sub">
                                       <a href="<?=site_url("{$alias['product']}-{$category_child_sub->{$prop['alias']}}")?>" title="Trái cây tươi"><?=$category_child_sub->{$prop['name']}?></a>
                                    </li>
                                    <? } ?>
                                 </ul>
                                 <? } ?>
                              </li>
                              <? } ?>
                           </ul>
                           <? } ?>
                        </li>
                     <? } ?>
                     </ul>
                     <script>
                        $('.zmdi-caret-right').click(function(e){
                           var stt = $(this).attr('stt');
                           var cls = $(this).attr('cls');
                           if (stt == '0'){
                              $(this).addClass('active');
                              $(this).attr('stt','1');
                           } else {
                              $(this).removeClass('active');
                              $(this).attr('stt','0');
                           }
                           $('.'+cls).toggle('fast');
                        })
                     </script>
                     <? } else {
                        $info = new stdClass();
                        if ($cate->parent_id == 0) {
                        $info->parent_id = $cate->id;
                        } else {
                        $info->parent_id = $cate->parent_id;
                        $cate = $this->m_product_category->load($cate->parent_id);
                        }
                        $category_subs = $this->m_product_category->items($info,1);
                     ?>
                        <div class="title-block mb-10"><?=$cate->{$prop['name']}?></div>
                        <ul class="list-unstyled-sub">
                           <? foreach($category_subs as $category_sub) { 
                              $info_child = new stdClass();
                              $info_child->parent_id = $category_sub->id;
                              $category_child_subs = $this->m_product_category->items($info_child,1);
                           ?>
                           <li class="item-sub">
                              <a href="<?=site_url("{$alias['product']}-{$category_sub->{$prop['alias']}}")?>" title="<?=$category_sub->{$prop['name']}?>"><?=$category_sub->{$prop['name']}?></a>
                              <? if(!empty($category_child_subs)) {  ?>
                              <i class="zmdi zmdi-caret-right"></i>
                              <ul class="childsub-item list-unstyled-sub">
                                 <? foreach($category_child_subs as $category_child_sub) { ?>
                                 <li class="item-sub">
                                    <a href="<?=site_url("{$alias['product']}-{$category_child_sub->{$prop['alias']}}")?>" title="Trái cây tươi"><?=$category_child_sub->{$prop['name']}?></a>
                                 </li>
                                 <? } ?>
                              </ul>
                              <? } ?>
                           </li>
                           <? } ?>
                        </ul>
                     <? } ?>
                  </div>
               </div>
               <? } ?>
               <script>
                  $('.list-filter-selected').click(function(e) {
                     let st = $(this).find('.toggle-icon').html()
                     if (st == '+')
                        $(this).find('.toggle-icon').html('−')
                     else
                        $(this).find('.toggle-icon').html('+')
                     $(this).next().toggle('fast')
                  })
               </script>
               <!-- <div id="novSidebarAjaxFilter" class="sidebar-block sidebar-block__2 ">
                  <div class="block__content">
                     <div class="list-filter">
                     <script>
                        function removeParam(key, sourceURL) {
                           var rtn = sourceURL.split("?")[0],
                              param,
                              params_arr = [],
                              queryString = (sourceURL.indexOf("?") !== -1) ? sourceURL.split("?")[1] : "";
                           if (queryString !== "") {
                              params_arr = queryString.split("&");
                              for (var i = params_arr.length - 1; i >= 0; i -= 1) {
                                 param = params_arr[i].split("=")[0];
                                 if (param === key) {
                                    params_arr.splice(i, 1);
                                 }
                              }
                              if (params_arr.length) rtn = rtn + "?" + params_arr.join("&");
                           }
                           return rtn;
                        }
                     </script>
                        <div class="filter-item filter-size">
                           <div class="filter-item_title">
                              <span>Filter size</span>
                           </div>
                           <div class="filter-item_content collapse show">
                              <ul class="list-inline">
                                 <li class="list-inline-item" data-value="small">
                                    <span class="filter-option-value">Small</span>
                                 </li>
                                 <li class="list-inline-item" data-value="medium">
                                    <span class="filter-option-value">Medium</span>
                                 </li>
                                 <li class="list-inline-item" data-value="large">
                                    <span class="filter-option-value">Large</span>
                                 </li>
                                 <li class="list-inline-item" data-value="unltra">
                                    <span class="filter-option-value">Unltra</span>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div> -->
            </div>
         </div>
         <script>
            $('.list-filter-selected').click(function (e) {

            })
            $('.zmdi-caret-right').click(function(e) {
               $(this).parents('.item-sub').find('.childsub-item').toggle('fast');
            })
         </script>
         <div class="col-lg-10 col-md-12 flex-xs-first">
            <div id="shopify-section-collection-template" class="shopify-section">
               <div data-section-id="collection-template" data-section-type="collection-template" data-panigation="12">
                  <div class="row collection-view-items view_3 grid--view-items">
                     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"></div>
                     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="box-sort-by">
                           <div class="sort-by">
                              <div class="text-right">
                                 <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" status="off" aria-haspopup="true" value="a" aria-expanded="true">
                                 <? 
                                    if(!empty($_GET['sort'])) {
                                       if ($_GET['sort'] == 'price-desc') {
                                          echo $website['price_desc'];
                                       } else if ($_GET['sort'] == 'price-asc') {
                                          echo $website['price_asc'];
                                       } else if ($_GET['sort'] == 'title-desc') {
                                          echo $website['title_desc'];
                                       } else if ($_GET['sort'] == 'title-asc') {
                                          echo $website['title_asc'];
                                       }
                                    } else {
                                       echo $website['sort_by'];
                                    }
                                    ?>
                                 </button>
                              </div>
                              <div class="dropdown-menu dropdown-menu-right text-right">
                                 <div class="drop-item active" status="sort" data-value=""><?=$website['sort_by']?></div>
                                 <div class="drop-item" status="sort" data-value="price-desc"><?=$website['price_desc']?></div>
                                 <div class="drop-item" status="sort" data-value="price-asc"><?=$website['price_asc']?></div>
                                 <div class="drop-item" status="sort" data-value="title-desc"><?=$website['title_desc']?></div>
                                 <div class="drop-item" status="sort" data-value="title-asc"><?=$website['title_asc']?></div>
                              </div>
                           </div>
                        </div>
                        <script>
                           $('.dropdown-toggle').click(function(e) {
                              let st =  $(this).attr('status')
                              if (st == 'off') {
                                 $('.dropdown-menu').css('display','inline-block')
                                 $(this).attr('status','on')
                              } else {
                                 $('.dropdown-menu').css('display','none')
                                 $(this).attr('status','off')
                              }
                           })
                           $(document).on('click', function(e) {
                              if (!$(e.target).closest($(".dropdown-toggle")).length) {
                                 $('.dropdown-menu').css('display','none')
                                 $('.dropdown-toggle').attr('status','off')
                              }
                           });
                        </script>
                        <!-- <div class="sortPagiBar d-md-flex align-items-center">
                            <div class="filter_button d-lg-none h_sidebar">
                              <i class="zmdi zmdi-format-subject"></i>
                              Filter
                           </div> -->
                           <!-- <div class="filters-toolbar__item d-flex align-items-center">
                              <div class="pagination__viewing">
                                 <?=$website['page']?> <?=$page?> - <?=$total_page?> | <?=$total?> <?=$website['product']?>
                              </div>
                              <div class="gridlist-toggle">
                                 <a href="#" id="grid-3" title="Grid View 3" data-type="view_3" class="active"><i class="zmdi zmdi-apps"></i></a>
                                 <a href="#" id="grid-2" title="Grid View 2" data-type="view_2"><i style="transform: rotate(90deg);" class="zmdi zmdi-view-module"></i></a>
                                 <a href="#" id="list" title="List View" data-type="list"><i class="zmdi zmdi-view-list"></i></a>
                              </div> -->
                              <!-- <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" value="a" aria-expanded="true"> -->
                              <? 
                              // if(!empty($_GET['sort'])) {
                              //    if ($_GET['sort'] == 'price-desc') {
                              //       echo $website['price_desc'];
                              //    } else if ($_GET['sort'] == 'price-asc') {
                              //       echo $website['price_asc'];
                              //    }
                              // } else {
                              //    echo $website['sort_by'];
                              // }
                              ?>
                              <!-- </button> -->
                              <!-- <div class="dropdown-menu dropdown-menu-right text-right">
                                 <div class="drop-item active" status="sort" data-value=""><?=$website['sort_by']?></div>
                                 <div class="drop-item" status="sort" data-value="price-desc"><?=$website['price_desc']?></div>
                                 <div class="drop-item" status="sort" data-value="price-asc"><?=$website['price_asc']?></div>
                              </div> -->
                           <!-- </div> -->
                           <script>
                              <?
                              $control = $alias['product'];
                              $control .= !empty($cate)?'/'.$cate->{$prop['alias']}:'';
                              $url = site_url("{$control}") ?>
                              $('.drop-item').click(function(e){
                                 let base_url = '<?=$url?>';
                                 let st = $(this).attr('status');
                                 let v = $(this).attr('data-value');
                                 let ob = getParams(window.location.href);

                                 let i = 0;
                                 cleanObject(ob);
                                 ob[st] = v;
                                 let page_key = '';
                                 let page_val = '';
                                 Object.entries(ob).forEach(([key,value]) => {
                                    if (key != 'trang') {
                                       if (ob[key] != '') {
                                          if (i == 0){
                                             if (ob[key] != '') base_url += '?'+key+'='+ob[key];
                                          } else {
                                             if (ob[key] != '') base_url += '&'+key+'='+ob[key];
                                          }
                                          i++;
                                       }
                                    } else {
                                       page_key = key; page_val = value;
                                    }
                                 });
                                 
                                 if (page_key != "") {
                                    if (page_val <= total_page) base_url += '&trang='+page_val;
                                    else base_url += '&trang='+total_page;
                                 }
                                 // base_url += '#list-product';
                                 window.location.href = base_url;
                              })
                           </script>
                        </div>
                     </div>
                        <div class="row">
                        <?
                        $c = count($items);
                        for ($i=0;$i<$c;$i++) {
                           if(!empty($items[$i]->thumbnail)) {
                           $price = $items[$i]->price;
                           $price_sale = $price*(1-($items[$i]->sale*0.01));
                           $typename = !empty($items[$i]->typename)?' - '.$items[$i]->typename:'';
                           if ($items[$i]->rating_cmt != '0'){
                              $point = round($items[$i]->rating_point/$items[$i]->rating_cmt,1);
                           } else {
                              $point = 0;
                           }
                        ?>
                        <div class="nov-wrapper-product col-md-3">
                           <div class="item-product">
                              <div class="thumbnail-container has-multiimage has_variants">
                                 <a href="<?=site_url($items[$i]->{$prop['alias']}.'-sp')?>">
                                    <!-- <img class="w-100 img-fluid product__thumbnail lazyload" data-src="<?=BASE_URL.str_replace('./','/',$items[$i]->thumbnail)?>" alt="<?=$items[$i]->{$prop['title']}?>"> -->
                                    <img class="w-100 product__thumbnail lazyload" data-src="https://static.wixstatic.com/media/609e3c_47a3319f60814981acf633ce3032115e~mv2.jpg/v1/fill/w_355,h_355,al_c,q_80,usm_0.66_1.00_0.01/609e3c_47a3319f60814981acf633ce3032115e~mv2.webp" alt="<?=$items[$i]->{$prop['title']}?>">
                                    
                                 </a>
                                 <a class="quick-view transition" href="<?=site_url($items[$i]->{$prop['alias']})?>">
                                    Quick View
                                 </a>
                                 <div class="badge_sale">
                                    <div class="badge badge--sale-rt">New Line Added</div>
                                    <!-- <? if ($items[$i]->sale!=0) { ?>
                                    <span class="badge badge--sale-pt">-<?=$items[$i]->sale?>%</span>
                                 <? } ?> -->
                                 </div>
                              </div>
                              <a href="<?=site_url($items[$i]->{$prop['alias']})?>">
                                 <h5>Pink with White Logo Hoody</h5>
                                 <p class="price">$27.00</p>
                              </a>
                           </div>
                        </div>
                  <? } } ?>
                     </div>
                     <!------------------------------------------------------>
                  </div>
                  <!-----pagination---->
                  <?=$pagination?>
               </div>
            </div>
         </div>
      </div>
</div>
<script>
	addLike('.btnProductWishlist');
</script>