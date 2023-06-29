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

function timestampFormatter($timestamp,$format="d-m-y"){
    return date($format,strtotime($timestamp));
}

function durationCalculator($duration, $format="Y-m-d"){
    $current_time = date_create(date($format));
    date_add($current_time, date_interval_create_from_date_string($duration));
    return date_format($current_time,$format);
}

//common functions start here

//admin side functions start here

//admin accounts management start here

function adminRegister(){
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

function adminLogin(){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM admins WHERE email=?";
    $sq = con() -> prepare($sql);
    $sq->execute([$email]);
    $row = $sq->fetch(PDO::FETCH_ASSOC);
    if(!$row) {
        return alert("Invalid Login");
    }
    else{
        if(!password_verify($password,$row['password'])){
            return alert("Invalid Login");
        }
        else{
            session_start();
            $_SESSION['admin_acc']=$row;
            redirect("index.php");
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

//category management start here

function categoryAdd(){
    $title = $_POST['title'];
    $admin_id = $_SESSION['admin_acc']['id'];
    $sql = "INSERT INTO categories (title,admin_id) VALUES (?,?)";
    $sq = con() -> prepare($sql);
    if($sq->execute(array($title,$admin_id))){
        linkTo("category_management.php?result=success");
    }
}

function fetchCategory($id){
    $sql = con() -> prepare("SELECT * FROM categories WHERE id = $id");
    return fetch($sql);
}

function fetchCategories(){
    $sql = con()->prepare("SELECT * FROM categories");
    return fetchAll($sql);
}

function categoryUpdate(){
    $title = $_POST['title'];
    $id = $_POST['id'];
    $sql = con()->prepare("UPDATE categories SET title=? WHERE id = ?");
    $sql -> execute(array($title,$id));
    return $sql;
}

function categoryDelete($id){
    $sql = con()->prepare("DELETE FROM categories WHERE id = ?");
    $sql -> execute([$id]);
    return $sql;
}

//category management end here

//service management start here

function serviceAdd(){
    $name = $_POST['name'];
    $category_id = $_POST['category_id'];
    $sale_price = $_POST['sale_price'];
    $description = $_POST['description'];
    $duration = $_POST['duration'];
    $policy = $_POST['policy'];
    $admin_id = $_SESSION['admin_acc']['id'];
    $image = imageFilter($_FILES['image']);
    $sql = "INSERT INTO services (name,description,sale_price,photo,duration,policy,admin_id,category_id) VALUES (?,?,?,?,?,?,?,?)";
    $sq = con() -> prepare($sql);
    if($sq->execute(array($name,$description,$sale_price,$image,$duration,$policy,$admin_id,$category_id))){
        linkTo("service_add.php?result=success");
    }
}

function fetchService($id){
    $sql = con() -> prepare("SELECT * FROM services WHERE id = $id");
    return fetch($sql);
}

function fetchServices(){
    $sql = con()->prepare("SELECT * FROM services");
    return fetchAll($sql);
}

function serviceUpdate(){
    $name = $_POST['name'];
    $category_id = $_POST['category_id'];
    $sale_price = $_POST['sale_price'];
    $description = $_POST['description'];
    $duration = $_POST['duration'];
    $policy = $_POST['policy'];
    $id = $_POST['id'];
    $original_image=$_POST['original_image'];
    $image = imageFilter($_FILES['image'],$original_image);
    $sql = con()->prepare("UPDATE services SET name=?,description=?,sale_price=?,photo=?,duration=?,policy=?,category_id=? WHERE id = ?");
    $sql -> execute(array($name,$description,$sale_price,$image,$duration,$policy,$category_id,$id));
    return $sql;
}

function serviceDelete($id){
    $sql = con()->prepare("DELETE FROM services WHERE id = ?");
    $sql -> execute([$id]);
    return $sql;
}

function fetchDuration(){
    $sql = con()->prepare("SELECT distinct duration FROM services");
    return fetchAll($sql);
}

//service management end here

//promotion management start here

function getPromoId(){
    $sql = con()->prepare("SELECT id FROM categories WHERE title='promotion'");
    $res = fetch($sql);
    return $res['id'];
}

function promotionAdd(){
    $name = $_POST['name'];
    $original_price = $_POST['original_price'];
    $sale_price = $_POST['sale_price'];
    $duration = $_POST['duration'];
    $policy = $_POST['policy'];
    $description = $_POST['description'];
    $start_date=$_POST['start_date'];
    $end_date=$_POST['end_date'];
    $admin_id = $_SESSION['admin_acc']['id'];
    $image = imageFilter($_FILES['image']);
    $promo_id = getPromoId();
    $sql = "INSERT INTO services (name,description,original_price,sale_price,photo,duration,policy,admin_id,category_id,start_date,end_date) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
    $sq = con() -> prepare($sql);
    if($sq->execute(array($name,$description,$original_price,$sale_price,$image,$duration,$policy,$admin_id,$promo_id,$start_date,$end_date))){
        linkTo("promotion_list.php");
    }
}

function fetchPromotion(){
    $today=date("Y-m-d");
    $promo_id = getPromoId();
    $sql = con()->prepare("SELECT * FROM services WHERE category_id=$promo_id AND( start_date <= '$today' AND  end_date >= '$today')");
    return fetchAll($sql);
}

function fetchPromotions(){
    $promo_id = getPromoId();
    $sql = con()->prepare("SELECT * FROM services WHERE category_id=$promo_id");
    return fetchAll($sql);
}

function promotionUpdate(){
    $name = $_POST['name'];
    $original_price = $_POST['original_price'];
    $sale_price = $_POST['sale_price'];
    $description = $_POST['description'];
    $policy = $_POST['policy'];
    $duration = $_POST['duration'];
    $id = $_POST['id'];
    $original_image=$_POST['original_image'];
    $start_date=$_POST['start_date'];
    $end_date=$_POST['end_date'];
    $image = imageFilter($_FILES['image'],$original_image);
    $sql = con()->prepare("UPDATE services SET name=?,description=?,original_price=?,sale_price=?,photo=?,duration=?,policy=?,start_date=?,end_date=? WHERE id = ?");
    $sql -> execute(array($name,$description,$original_price,$sale_price,$image,$duration,$policy,$start_date,$end_date,$id));
    return $sql;
}

//promotion management end here

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

function customerLogin(){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM customers WHERE email=?";
    $sq = con() -> prepare($sql);
    $sq->execute([$email]);
    $row = $sq->fetch(PDO::FETCH_ASSOC);
    if(!$row) {
        return alert("Invalid Login");
    }
    else{
        if(!password_verify($password,$row['password'])){
            return alert("Invalid Login");
        }
        else{
            $_SESSION['customer']=$row;
            linkTo("customer_profile.php");
        }
    }
}

//customer account functions end here

//sort by category start

function servicesByCategory($category_id,$limit='999999',$id=0){
    $promoId = getPromoId();
    if($category_id==$promoId){
        $today=date("Y-m-d");
        $promoId = getPromoId();
        $sql = con()->prepare("SELECT * FROM services WHERE category_id=$promoId AND( start_date <= '$today' AND  end_date >= '$today' )");
        return fetchAll($sql);
    }
    else{
        $sql = con()->prepare("SELECT * FROM services WHERE category_id=$category_id AND id!=$id ORDER BY id DESC LIMIT $limit");
        return fetchAll($sql);
    }
}

//sort by category end

//search feature start here
function search($searchKey){
    $searchKey=$searchKey;
    $sql = con()->prepare("SELECT * FROM services WHERE name LIKE '%$searchKey%' OR duration LIKE '%$searchKey%' OR description LIKE '%$searchKey%' ORDER BY id DESC ");
    return fetchAll($sql);
}

//search feature end here

//cart management start here
function addToCart(){
    if(isset($_SESSION['myCart'])) {
        $myItems = array_column($_SESSION['myCart'], 'id');
        if(in_array($_POST['id'], $myItems)){
            $id=$_POST['id'];
            linkTo("my_cart.php");
        }
        else{
            $id=$_POST['id'];
            $count = count($_SESSION['myCart']);
            $_SESSION['myCart'][$count]= array(
                'name'=>$_POST['name'],'description'=>$_POST['description'],'sale_price'=>$_POST['sale_price'],'duration'=>$_POST['duration'],'policy'=>$_POST['policy'],'category'=>$_POST['category'],'photo'=>$_POST['photo'],'id'=>$id
            );
            linkTo("my_cart.php");
        }
    }
    else {
        $id=$_POST['id'];
        $_SESSION['myCart'][0]= array(
            'name'=>$_POST['name'],'description'=>$_POST['description'],'sale_price'=>$_POST['sale_price'],'duration'=>$_POST['duration'],'policy'=>$_POST['policy'],'category'=>$_POST['category'],'photo'=>$_POST['photo'],'id'=>$id

        );
        linkTo("my_cart.php");
    }
}


function removeFromCart($id)
{
    foreach ($_SESSION['myCart'] as $key => $value)
    {
        if ($value['id']==$id)
        {
            unset($_SESSION['myCart'][$key]);
            $_SESSION['myCart']=array_values($_SESSION['myCart']);
            header("Location:my_cart.php");
        }
    }
}

function checkOut(){
    if(isset($_SESSION['customer'])){
        if (isset($_SESSION['myCart'])){
            $id=$_SESSION['customer']['id'];
            foreach ($_SESSION['myCart'] as $key => $value){
                $service_id=$_SESSION['myCart'][$key]['id'];
                $expired_date = durationCalculator("1 month");
                $sql = "INSERT INTO orders (customer_id,service_id,expired_date) VALUES (?,?,?)";
                $sq = con() -> prepare($sql);
                $sq->execute(array($id,$service_id,$expired_date));
            }
        }
        unset($_SESSION['myCart']);
        linkTo("customer_orders.php");
    }
    else{
        linkTo('customer_login.php');
    }
}
//cart management end here
//fetch customer Order start here
function customerOrders(){
    $id=$_SESSION['customer']['id'];
    $sql = con() -> prepare("SELECT * FROM orders where customer_id = $id");
    return fetchAll($sql);
}
//fetch customer Order end here

//viewer management start here
function insertViewRecord($userId,$postId,$device){
    $sql = "INSERT INTO viewers (customer_id,service_id,device) VALUES (?,?,?)";
    $sq = con() -> prepare($sql);
    $sq->execute(array($userId,$postId,$device));
}
//viewer management end here

//customer side functions end here
