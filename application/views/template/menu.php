
<?php
$lang = $this->input->cookie('language');
?>
<ul class="sidebar-menu" >  
      <?php
    $menu1 = $this->Base_model->loadToListJoin("select * from permission where position_id=" . $this->Base_model->position_id() . " and permission_enable=1 and permission_page_id_parent=11 and permission_name='Sale Order' group by permission_page_id_parent");

    foreach ($menu1 as $m1) {
        ?>  
    <li class="sub-menu">
        <a href="<?php echo site_url('table_order')?>" class="">
            <i class="fa fa-desktop"></i>
            <span >Cashier Order</span>
        </a>
    </li> 
            <?php
    }
    ?>

    <?php
    $menu = $this->Base_model->loadToListJoin("select * from permission where position_id=" . $this->Base_model->position_id() . " and permission_enable=1 and permission_control<>'0' group by permission_page_id_parent");
    foreach ($menu as $m) {
        ?>  
        
        <li class="sub-menu">
            <a href="javascript:;" class="">
                <i class="<?php echo $m->permission_class ?>"></i>
                <span ><?php echo $lang == 'kh' ? $m->permission_name_kh : $m->permission_name; ?></span>
            </a>
            <ul class="sub">
                <?php
                $curr_segment = $this->uri->segment(1);
                $curr_segment2 = $this->uri->segment(2);
                $total_ = $this->uri->total_segments();

                $curr_controller = '';
                $submenu = $this->Base_model->loadToListJoin("select * from permission where permission_page_id_parent=" . $m->permission_page_id_parent . " and position_id=" . $this->Base_model->position_id() . " and permission_control<>'0' and permission_control<>'' and permission_active=1 and permission_enable=1 order by permission_ordering");
                foreach ($submenu as $sm) {
                    list($curr_controller) = explode('/', $sm->permission_control);
                    $class_ = '';
                    if ($total_ == 2) {
                        if ($curr_segment2 == 'adjustment') {
                            $curr_segment2 = 'adjust_list';
                        } else if ($curr_segment2 == 'waste') {
                            $curr_segment2 = 'waste_list';
                        }
                        if ($sm->permission_control == $curr_segment . '/' . $curr_segment2) {
                            $class_ = 'li_active';
                        }
                        if (($curr_segment2 == 'addnew' || $curr_segment2 == 'index' || $curr_segment2 == 'search' || $curr_segment2 == 'pay' || $curr_segment2 == 'submit') && $sm->permission_control == $curr_segment) {
                            $class_ = 'li_active';
                        }
                    } elseif ($total_ == 1) {
                        if ($sm->permission_control == $curr_segment) {
                            $class_ = 'li_active';
                        }
                    } elseif ($total_ > 2) {
                        $c = explode('/', $sm->permission_control);
                        $ic = 0;
                        foreach ($c as $c1) {
                            $ic++;
                        }
                        if ($curr_controller == 'branch') {
                            $curr_controller = 'company_profile';
                        }

                        if ($curr_controller == $curr_segment && $ic != 2) {
                            $class_ = 'li_active';
                        } else if ($curr_controller == $curr_segment && ($curr_segment2 == 'addnew' || $curr_segment2 == 'index' || $curr_segment2 == 'search' || $curr_segment2 == 'pay')) {
                            $class_ = 'li_active';
                        }
                    }
                    ?>
                    <li>
                        <a class="" id="<?php echo $class_ ?>" href="<?php echo site_url($sm->permission_control); ?>"><?php echo $lang == 'kh' ? $sm->permission_name_kh : $sm->permission_name ?></a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </li>
        <?php
    }
    ?>
        <a href="http://softpointcambodia.com" target="_new">
            <li>
                <img src="<?php echo base_url('img/slideshow.gif'); ?>" width="100%" />
            </li>
        </a>
</ul>

