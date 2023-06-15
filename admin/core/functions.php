<?php

//common functions start here

function fetch($sql){
    $sql -> execute();
    $row=$sql->fetch(PDO::FETCH_ASSOC);
    return $row;
}

function fetchAll($sql){
    $sql -> execute();
    $rows=[];
    while ($row=$sql->fetch(PDO::FETCH_ASSOC)){
        array_push($rows,$row);
    }
    return $rows;
}

function checkPassword($password,$original_password=""){
    if($password!=""){
        $sPass=password_hash($password,PASSWORD_DEFAULT);
        return $sPass;
    }
    else{
        return $original_password;
    }
}

function imageFilter($files,$original_image=""){
    if ($files['tmp_name']!="") {
        $file_name = $files['name'];
        $file_size = $files['size'];
        $file_tmp = $files['tmp_name'];
        $file_type = $files['type'];
        $f_ext = explode("/", $file_type);
        $file_ex = strtolower(end($f_ext));
        $extension = array("jpeg", "png", "jpg", "gif");
        if (in_array($file_ex, $extension) == FALSE) {
            $errors[] = "Please Upload the valid file type";
        } else if ($file_size > 2097152) {
            $errors[] = "File size is too big";
        } else if (empty($errors) == TRUE) {
            move_uploaded_file($file_tmp, "images/" . $file_name);
            return $file_name;
        }
        else {
            print_r($errors);
        }
    }
    else {
        return $file_name=$original_image;
    }
}

function imageFilterRegistration($files,$original_image=""){
    if ($files['tmp_name']!="") {
        $file_name = $files['name'];
        $file_size = $files['size'];
        $file_tmp = $files['tmp_name'];
        $file_type = $files['type'];
        $f_ext = explode("/", $file_type);
        $file_ex = strtolower(end($f_ext));
        $extension = array("jpeg", "png", "jpg", "gif");
        if (in_array($file_ex, $extension) == FALSE) {
            $errors[] = "Please Upload the valid file type";
        } else if ($file_size > 2097152) {
            $errors[] = "File size is too big";
        } else if (empty($errors) == TRUE) {
            move_uploaded_file($file_tmp, "images/" . $file_name);
            return $file_name;
        }
        else {
            print_r($errors);
        }
    }
    else {
        return $file_name="default.png";
    }
}

//common functions start here
