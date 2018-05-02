<ul role="tablist" id="myTab">
    <?
      $i=0;
      $recruitment_cat = $general->categories('recruitment');
      /*foreach($recruitment_cat as $k=>$v) {
         change_language_value($recruitment_cat[$k]);
      }*/
      
      foreach($recruitment_cat as $row) {
         $i++;
         $recruitment_list_cat = $recruitment->recruitment_list_cat($row['cat_id']);
         $recruitment_list_cat_arr[] = $recruitment_list_cat;
    ?>
        <li role="presentation" class="<?=($i == 1) ? 'active':''?>" <?=($i == 1) ? 'aria-expanded="true"':''?>><a class="" href="#<?=$row['cat_alias']?>" aria-controls="<?=$row['cat_alias']?>" role="tab" data-toggle="tab"><?=$row['cat_name']?> (<?=count($recruitment_list_cat)?>) </a></li>
    <? } ?>
</ul>