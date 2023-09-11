<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <tbody>
            <?php
   
    $link = mysqli_connect("localhost", "root", "", "nongnghiep");
 
    // Kểm tra kết nối
    if ($link === false) {
        die("ERROR: Không thể kết nối. " . mysqli_connect_error());
    }
 
    // Thực hiện câu lệnh SELECT
    $nhietdo = $_POST['UIDresult'];
    echo $nhietdo;
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    echo "The time is " . date("h:i:sa");
    foreach (timezone_abbreviations_list() as $abbr => $timezone) {
        foreach ($timezone as $val) {
            if (isset($val['timezone_id'])) {
                var_dump($abbr, $val['timezone_id']);
            }
        }
    }
    echo "Today is " . date("d/m/Y") . "<br>";    
    echo "Today is " . date("d.m.Y") . "<br>";    
    echo "Today is " . date("d-m-Y") . "<br>";    
    echo "Today is " . date("l");  

        
    


   


if ($link->connect_error) {
    die("Database Connection failed: " . $conn->connect_error);
}



$gio=date("h:i:sa");
$ngay= date('Y-m-d'); 




$query_chitiet = "SELECT * FROM tbl_diemdanh";

$query_chitiet = mysqli_query($link,$query_chitiet);
       $i=0;
while ($row = mysqli_fetch_array($query_chitiet)) {
     
            if($row['admin_maso']==$_POST['UIDresult'] && $row['admin_time']==$ngay){
                $d=$row['diemdanh_id'];
                $k=$row['admin_maso'];
                $z=$row['admin_time'];
                $m=$row['admin_day'];
                $i++;
            }

   
        }

 if(!empty($_POST['UIDresult'])&&$i<=1)
{
   
    $nhietdo = $_POST['UIDresult'];
    echo $nhietdo;
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    echo "The time is " . date("h:i:sa");
    foreach (timezone_abbreviations_list() as $abbr => $timezone) {
        foreach ($timezone as $val) {
            if (isset($val['timezone_id'])) {
                var_dump($abbr, $val['timezone_id']);
            }
        }
    }
    echo "Today is " . date("d/m/Y") . "<br>";    
    echo "Today is " . date("d.m.Y") . "<br>";    
    echo "Today is " . date("d-m-Y") . "<br>";    
    echo "Today is " . date("l");  
    "<br>";
    echo
    $gio=date("h:i:sa");
    $ngay= date('Y-m-d'); 

    if($i==0){
        $sql = "INSERT INTO tbl_diemdanh (admin_maso,admin_time,admin_day)  VALUES ('".$nhietdo."','".$ngay."','".$gio."')";

    }else{
    $sql = "UPDATE tbl_diemdanh SET admin_arive='$gio' WHERE diemdanh_id=$d";}
    
 // $sql = "INSERT INTO tbl_diemdanh (admin_maso,admin_time,admin_day)  VALUES ('".$nhietdo."','".$d."','".$gio."')";
//    $sql = "INSERT INTO tbl_diemdanh (admin_arive) Where(admin_id,'49') VALUES ('".$nhietdo."')";

    if ($link->query($sql) === TRUE) {
        echo "cap nhat thanh cong";
        echo $nhietdo;
       
    } else {
        echo '<pre>';
        print_r($nhietdo);
        echo"phan tri truyen";
        echo '</pre>';
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}else{
    echo "khong co du lieu";
    echo '<pre>';
        print_r($nhietdo);
        echo"phan tri truyen";
        echo '</pre>';
}



?>
</tbody>
</table>
</body>

</html>