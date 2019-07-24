<?php
// chek settingan tampilan menu
$setting = $this->db->get_where('tbl_setting', array('id_setting' => 1))->row_array();
if ($setting['value'] == 'ya') {
    // cari level user
    $id_user_level = $this->session->userdata('id_user_level');
    $sql_menu = "SELECT * 
            FROM tbl_menu 
            WHERE id_menu in(select id_menu from tbl_hak_akses where id_user_level=$id_user_level) and is_main_menu=0 and is_aktif='y'";
} else {
    $sql_menu = "select * from tbl_menu where is_aktif='y' and is_main_menu=0";
}

$main_menu = $this->db->query($sql_menu)->result();

foreach ($main_menu as $menu) {
    // chek is have sub menu
    $this->db->where('is_main_menu', $menu->id_menu);
    $this->db->where('is_aktif', 'y');
    $submenu = $this->db->get('tbl_menu');
    if ($submenu->num_rows() > 0) {
        // display sub menu
        echo "<li class='nav-item'>
                        <a href='#'>
                            <i class='$menu->icon'></i> <span>" . strtoupper($menu->title) . "</span>
                            <span class='pull-right-container'>
                                <i class='fa fa-angle-left pull-right'></i>
                            </span>
                        </a>
                        <ul class='treeview-menu' style='display: none;'>";
        foreach ($submenu->result() as $sub) {
            echo "<li>" . anchor($sub->url, "<i class='$sub->icon'></i> " . strtoupper($sub->title)) . "</li>";
        }
        echo " </ul>
                    </li>";
    } else {

        echo "<li class='nav-item'>";
        echo "<a class='nav-link' href='" . $menu->url . "'>";
        echo "<i class='" . $menu->icon . "' ></i>";
        echo "<span>$menu->title</span></a>";
        echo "</li>";
    }
}
?>
</ul>
</section>
<!-- /.sidebar -->