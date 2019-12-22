<?php
$data = array();
get_action($data);

function get_action(&$data){
    $function = 'view';
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
        $function = $action;
    }
    $function($data); 
}

function view(&$data) {
    $data['student_data'] = m_get_data();
    // var_dump($data['student_data']);die();
    $data['page'] = "students/view";
}

function add(&$data) {
    $data['class_data'] = get_class_data();
    $data['subject_data'] = get_subject_data();
    $data['page'] = "students/add";
}

function form_data(&$data) {
    $add_data = student_add_data($_POST);
    if($add_data) {
        $action = "view";
    }else {
        $action = "add";
    }
    header("Location: index.php?action=$action");
}

function delete(&$data){
    $delete_data = m_delete_data($_POST);
    if($delete_data) {
        $action = "view";
    }else {
        echo "Can not delete data from database";
    }
    header("Location: index.php?action=$action");
}




function detail(&$data) {
    //code here
    $data['student'] = m_detail();
    $data['page'] = "students/detail";
}


function edit(&$data) {
    //code here
    $data['student'] = m_detail();
    $data['page'] = "students/edit";
}

function edit_data(&$data) {
    //code here
    $update_data = m_update_data($_POST);
    if($update_data) {
        $action = "view";
    }else {
        echo "can not edit data";
    }
    header("Location: index.php?action=$action");
}
