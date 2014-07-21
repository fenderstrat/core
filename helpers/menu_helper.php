<?php  if ( ! defined('BASEPATH')) exit ('No direct script access allowed');


function show_menu()
{
    $instance = & get_instance();
    $instance->load->model('menu_model');
    #menu
    if($instance->menu_model->all()->num_rows()=='NULL'){
        return false;
    } else {
        $getMenu = $instance->menu_model->all()->result();
        foreach ($getMenu as $row) {
            $d[$row->parent_id][]= $row;
            }
        $menu = home_menu($d);
        return $menu;
    }
}

function Home_menu($data, $parent = 0) {
    static $i = 1;
    $tab = str_repeat("\t\t", $i);
    if (isset($data[$parent])) {
        $html = "\n$tab<ul>";
        $i++;
        foreach ($data[$parent] as $v) {
            $child = home_menu($data, $v->id);
            $html .= "\n\t$tab<li>";
            $html .= '<a href="'.$v->link.'">'.$v->name.'</a>';
            //$html .= '</li>';
            if ($child) {
                $i--;
                $html .= $child;
                $html .= "\n\t$tab";
            }
            $html .= '</li>';
        }
        $html .= "\n$tab</ul>";
        return $html;
    } else {
        return false;
    }
}

function menu_showNested($parentID) {
    $instance = & get_instance();
    $instance->load->model('menu_model');

    $result = $instance->menu_model->find_parent($parentID)->result();
    $numRows = $instance->menu_model->find_parent($parentID)->num_rows();
    
    if ($numRows > 0) {
        $html = "\n";
        $html .= "<ol class='dd-list'>\n";
            foreach ($result as $row) {
                $html .= "\n";
                $urlEdit = base_url().'admin/menu/edit/'.$row->id.'/'.url_title(strtolower($row->name));
                $urlDel = base_url().'admin/menu/delete/'.$row->id.'/'.url_title(strtolower($row->name));
                $html .= "<li class='dd-item' data-id='{$row->id}'>\n";
                    $html .= "<div class='dd-handle'>{$row->name}</div>
                            <div style='position:relative;top:-30px;right:10px;'>
                                <a href='{$urlDel}' class='pull-right text-red' onclick='return pesan()'>
                                    <i class='fa fa-fw fa-trash-o'></i>
                                </a>
                                <a href='{$urlEdit}' class='pull-right text-blue' >
                                    <i class='fa fa-fw fa-edit'></i>
                                </a>
                            </div>
                            \n";
                
                    // Run this function again (it would stop running when the mysql_num_result is 0
                   $html .=  menu_showNested($row->id);
                
                $html .= "</li>
                        
                        \n";
            }
        $html .= "</ol>\n";
        return $html;
    }

}

function Admin_menu()
{
    ## Show the top parent elements from DB
    ######################################
    $instance = & get_instance();
    $instance->load->model('menu_model');

    $result = $instance->menu_model->find_parent(0)->result();
    $numRows = $instance->menu_model->find_parent(0)->num_rows();

    $newhtml = "<div class='cf nestable-lists'>\n";
        $newhtml .= "<div class='dd' id='nestableMenu'>\n\n";
            $newhtml .= "<ol class='dd-list'>\n";
                
                foreach ($result as $row) {
                    $newhtml .= "\n";
                    $urlEdit = base_url().'admin/menu/edit/'.$row->id.'/'.url_title(strtolower($row->name));
                    $urlDel = base_url().'admin/menu/delete/'.$row->id.'/'.url_title(strtolower($row->name));
                    $newhtml .= "<li class='dd-item' data-id='{$row->id}'>";
                        $newhtml .= "<div class='dd-handle'>{$row->name}</div>
                                    <div style='position:relative;top:-30px;right:10px;'>
                                        <a href='{$urlDel}' class='pull-right text-red' onclick='return pesan()'>
                                            <i class='fa fa-fw fa-trash-o'></i>
                                        </a>
                                        <a href='{$urlEdit}' class='pull-right text-blue'>
                                            <i class='fa fa-fw fa-edit'></i>
                                        </a>
                                    </div>";
                    
                    
                    $newhtml .= menu_showNested($row->id);
                    
                    $newhtml .= "</li>
                                
                    \n";
                }

            $newhtml .= "</ol>\n\n";
        $newhtml .= "</div>\n";
    $newhtml .= "</div>\n\n";
    return $newhtml;
}


/* Function to parse the multidimentional array into a more readable array 
* Got help from stackoverflow with this one:
* http://stackoverflow.com/questions/11357981/save-json-or-multidimentional-array-to-db-flat?answertab=active#tab-top
*/
function parseJsonArray($jsonArray, $parentID = 0)
{
  $return = array();
  foreach ($jsonArray as $subArray) {
     $returnSubSubArray = array();
     if (isset($subArray['children'])) {
       $returnSubSubArray = parseJsonArray($subArray['children'], $subArray['id']);
     }
     $return[] = array('id' => $subArray['id'], 'parentID' => $parentID);
     $return = array_merge($return, $returnSubSubArray);
  }

  return $return;
}

/* End of file : menu_helper.php */
/* Location : ./application/helpers/menu_helper.php */