 <div id="sidebar-menu">
                       

                        

                        <ul>
                            <li class="menu-title">Navigation</li>
<?php
                        $group      = user_group('id');
                        $main_menu  = $this->db->query("SELECT a.* FROM tbl_menu a JOIN tbl_menugroup b ON b.menu_id = a.id and b.group_id = '".$group."' WHERE a.parent = '0' AND a.status = 'Y' ORDER BY a.id ASC");
                        foreach ($main_menu->result() as $main) {
                            $sub_menu = $this->db->query("SELECT a.* FROM tbl_menu a JOIN tbl_menugroup b ON b.menu_id = a.id and b.group_id = '".$group."' WHERE a.parent = '".$main->id."' AND a.status = 'Y' ORDER BY a.id ASC");
                            
                            if($sub_menu->num_rows() > 0){
                                echo '<li class="has_sub">
                                    <a href="javascript:void(0);" class="waves-effect" data-target="#submenu_'.$main->id.'" id="menu-'.$main->class.'"><i class="'.$main->icon.' mr-20"></i><span>'.$main->title.'</span><span class="menu-arrow"></span></a>
                                        <ul id="submenu_'.$main->id.'" class="list-unstyled">';
                                        foreach($sub_menu->result() as $sub){
                                            echo '
                                                <li>
                                                    <a href="'.base_url($sub->link).'" id="sub-'.$sub->class.'">'.$sub->title.'</a>
                                                </li>
                                            ';
                                        }
                                        echo '</ul>
                                    </li>';
                            }else{
                                echo '
                                    <li>
                                        <a href="'.base_url($main->link).'" id="menu-'.$main->class.'"><div class="pull-left"><i class="'.$main->icon.' mr-20"></i><span class="right-nav-text">'.$main->title.'</span></div><div class="clearfix"></div></a>
                                    </li>
                                ';
                            }  
                        }  
                    ?>
                </ul>
            </div>