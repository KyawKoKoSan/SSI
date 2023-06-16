<?php

//common functions start here

function alert($data,$color="danger"){
    $data = strtoupper($data);
    return "    
    <div class='alert alert-dismissible alert-$color'>
      <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
      <p class='alert-heading mb-0'>$data</p>
    </div>
";
}

function redirect($location){
    header("location:$location");
}

function linkTo($location){
    echo "<script>location.href='$location'</script>";
}

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
        $securePass=password_hash($password,PASSWORD_DEFAULT);
        return $securePass;
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

//admin side functions start here

//admin accounts management start here

function admin_register(){
    $email = $_POST['email'];
    $sql = "SELECT * FROM admins WHERE email=?";
    $sq = con() -> prepare($sql);
    $sq->execute([$email]);
    $no = $sq->rowCount();
    echo $no;
    if($no>=1){
        linkTo("admin_register.php?already_exist=user");
    }else{
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $role = $_POST['role'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];
        $image = imageFilterRegistration($_FILES['image']);
        if($password == $confirmPassword){
            $sql = "INSERT INTO admins (name,email,phone,password,role,photo) VALUES (?,?,?,?,?,?)";
            $sq = con() -> prepare($sql);
            $securePass = password_hash($password,PASSWORD_DEFAULT);
            if($sq->execute(array($name,$email,$phone,$securePass,$role,$image))){
                linkTo("admin_register.php?result=success");
            }
        }
        else{
            return alert("Password do not match!!!");
        }
    }

}

function fetchAdmin($id){
    $sql = con() -> prepare("SELECT * FROM admins where id = $id");
    return fetch($sql);
}

function fetchAdmins(){
    $sql = con() -> prepare("SELECT * FROM admins");
    return fetchAll($sql);
}

function adminUpdate(){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'] ;
    $phone = $_POST['phone'] ;
    $role = $_POST['role'];
    $password = $_POST['password'];
    $original_image=$_POST['original_image'];
    $original_password=$_POST['original_password'];
    $securePass = checkPassword($password,$original_password);
    $image = imageFilter($_FILES['image'],$original_image);
    $sql = con() -> prepare("UPDATE admins SET name=?,email=?,phone=?,password=?,role=?,photo=? WHERE id=?");
    $sql->execute(array($name,$email,$phone,$securePass,$role,$image,$id));
    return $sql;
}

function adminDelete($id){
    $sql = con()->prepare("DELETE FROM admins WHERE id = ?");
    $sql -> execute([$id]);
    return $sql;
}

//admin accounts management end here

//customer management start here

function fetchCustomer($id){
    $sql = con() -> prepare("SELECT * FROM customers where id = $id");
    return fetch($sql);
}

function fetchCustomers(){
    $sql = con() -> prepare("SELECT * FROM customers");
    return fetchAll($sql);
}

function customerUpdate(){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $password = $_POST['password'];
    $original_image=$_POST['original_image'];
    $original_password=$_POST['original_password'];
    $securePass = checkPassword($password,$original_password);
    $image = imageFilter($_FILES['image'],$original_image);
    $sql = con() -> prepare("UPDATE customers SET name=?,email=?,password=?,address=?,phone=?,city=?,photo=? WHERE id=?");
    $sql->execute(array($name,$email,$securePass,$address,$phone,$city,$image,$id));
    return $sql;
}

function customerDelete($id){
    $sql = con()->prepare("DELETE FROM customers WHERE id = ?");
    $sql -> execute([$id]);
    return $sql;
}

//customer management end here


//admin side functions end here


//customer side functions start here


//customer account functions start here
function customerRegister(){
    $email = $_POST['email'];
    $sql = "SELECT * FROM customers WHERE email=?";
    $sq = con() -> prepare($sql);
    $sq->execute([$email]);
    $no = $sq->rowCount();
    echo $no;
    if ($no>=1){
        linkTo("register.php?already_exist=user");
    }
    else{
        $name = $_POST['name'] ;
        $address = $_POST['address'] ;
        $phone = $_POST['phone'] ;
        $city = $_POST['city'] ;
        $password =$_POST['password'];
        $confirmPassword =$_POST['cPassword'];
        $image = imageFilterRegistration($_FILES['image']);
        $securePass = password_hash($password,PASSWORD_DEFAULT);
        if($password == $confirmPassword){
            $sql = "INSERT INTO customers (name,email,address,phone,city,photo,password) VALUES (?,?,?,?,?,?,?)";
            $sq = con() -> prepare($sql);
            if($sq->execute(array($name,$email,$address,$phone,$city,$image,$securePass))){
                linkTo("customer_register.php?result=success");}
        }
        else{
            return alert("Password do not match!!!");}
    }
}

//customer account functions end here

//customer side functions end here
