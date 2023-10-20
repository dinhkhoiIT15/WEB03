<?php
require_once('header.php');
include_once('connect.php');
$c = new Connect();
$blink = $c->ConnectToMySQL();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $proId = $_POST['proId'];
    $proName = $_POST['proName'];
    $proCat = $_POST['proCat'];
    $originPrice = $_POST['oPrice'];
    $salePrice = $_POST['sPrice'];
    $importDate = $_POST['importDate'];
    $supplierId = $_POST['supId'];
    $employeeId = $_POST['emId'];
    $img = $_POST['img'];

    $sql = "UPDATE product SET 
            product_id = '$proId',
            product_name = '$proName',
            product_cat = '$proCat',
            origin_price = '$originPrice',
            sale_price = '$salePrice',
            date = '$importDate',
            pro_img = '$img',
            supplier_id = '$supplierId',
            employee_id= '$supplier_id'

            WHERE product_id = $proId";

    if ($blink->query($sql) === true) {
        echo "Update Successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $blink->error;
    }
}

$proId = $_GET['id'];
$sql = "SELECT * FROM product WHERE product_id = '$proId'";
$re = $blink->query($sql);
$row = $re->fetch_assoc();

?>
<div class="container">
    <form action="#" class="form form-vertical" method="POST" enctype="multipart/form-data"> <!--multipart: upload file
        <!--Product ID-->
        <div class="row mb-3">
            <div class="col-12">
                <label for="proId" class="col-sm-2" style="font-weight: bold; color:cornflowerblue">Product
                    Id</label>
                <input type="text" id="proId" name="proId" class="form-control" value="<?= $row['product_id'] ?>">
            </div>
        </div>

        <!--Product name-->
        <div class="row mb-3">
            <div class="col-12">
                <label for="proName" class="col-sm-2" style="font-weight: bold; color:cornflowerblue">Product
                    Name</label>
                <input type="text" id="proName" name="proName" class="form-control" value="" required>
            </div>
        </div>

        <!-- Product Cat  -->
        <div class="row mb-3">
            <div class="col-12">
                <label for="proCat" class="col-sm-2" style="font-weight: bold; color:cornflowerblue">Product
                    Name</label>
                <select name="proCat" id="proCat" class="form-select">
                    <option selected>Product Category</option>
                    <option value="1">Lego</option>
                    <option value="2">Rubik</option>
                </select>
            </div>
        </div>

        <!--Origin Price-->
        <div class="row mb-3">
            <div class="col-12">
                <label for="oPrice" class="col-sm-2" style="font-weight: bold; color:cornflowerblue">Origin
                    Price</label>
                <input type="text" id="oPrice" name="oPrice" class="form-control" value="" placeholder="Origin Price">
            </div>
        </div>

        <!--Sale Price-->
        <div class="row mb-3">
            <div class="col-12">
                <label for="sPrice" class="col-sm-2" style="font-weight: bold; color:cornflowerblue">Sale Price</label>
                <input type="text" id="sPrice" name="sPrice" class="form-control" value="" placeholder="Sale Price">
            </div>
        </div>

        <!--Import date-->
        <div class="row mb-3">
            <div class="col-12">
                <label for="importDate" class="col-sm-2" style="font-weight: bold; color:cornflowerblue">Import
                    date</label>
                <input type="date" id="importDate" name="importDate" class="form-control" value=""
                    placeholder="Import date">
            </div>
        </div>

        <!--Image-->
        <div class="row mb-3">
            <div class="col-12">
                <div class="form-group">
                    <label for="image-vertical" style="font-weight: bold; color: cornflowerblue">Image</label>
                    <input type="file" name="Pro_image" id="Pro_image" class="form-control" value="">
                </div>
            </div>
        </div>

        <!-- Supplier id  -->
        <div class="row mb-3">
            <div class="col-12">
                <label for="supId" class="col-sm-2" style="font-weight: bold; color:cornflowerblue">Supplier</label>
                <select name="supId" id="supId" class="form-select">
                    <option selected>Supplier</option>
                    <option value="1">Lego industry</option>
                    <option value="2">Rubik company</option>
                </select>
            </div>
        </div>

        <!-- Employee id  -->
        <div class="row mb-3">
            <div class="col-12">
                <label for="emId" class="col-sm-2" style="font-weight: bold; color:cornflowerblue">Employee</label>
                <select name="emId" id="emId" class="form-select">
                    <option selected>Employee</option>
                    <option value="1">Dinh Dinh Khoi</option>
                    <option value="2">Pham Vo Nhut Truong</option>
                </select>
            </div>
        </div>

        <!--Button-->
        <div class="row mb-3">
            <div class="col-2 ms-auto row">
                <div class="col-6 d-grid mx-auto">
                    <button type="submit" name="btnAdd" class="btn btn-warning rounded-pill">Add</button>
                </div>
                <div class="col-6 d-grid mx-auto">
                    <button type="reset" name="btnReset" class="btn btn-secondary rounded-pill">Reset</button>
                </div>
            </div>
        </div>
    </form>
</div>

<?php
require_once('footer.php');
?>