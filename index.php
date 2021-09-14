<?php
// Load the database configuration file
include_once 'dbConfig.php';

// Get status message
if(!empty($_GET['status'])){
    switch($_GET['status']){
        case 'succ':
            $statusType = 'alert-success';
            $statusMsg = 'Inventory data has been imported successfully.';
            break;
        case 'err':
            $statusType = 'alert-danger';
            $statusMsg = 'Some problem occurred, please try again.';
            break;
        case 'invalid_file':
            $statusType = 'alert-danger';
            $statusMsg = 'Please upload a valid CSV file.';
            break;
        default:
            $statusType = '';
            $statusMsg = '';
    }
}
?>

<!-- Display status message -->
<?php if(!empty($statusMsg)){ ?>
<div class="col-xs-12">
    <div class="alert <?php echo $statusType; ?>"><?php echo $statusMsg; ?></div>
</div>
<?php } ?>

<div class="row">
    <!-- Import link -->
    <div class="col-md-12 head">
        <div class="float-right">
            <a href="javascript:void(0);" class="btn btn-success" onclick="formToggle('importFrm');"><i class="plus"></i> Import</a>
        </div>
    </div>
    <!-- CSV file upload form -->
    <div class="col-md-12" id="importFrm" style="display: none;">
        <form action="importData.php" method="post" enctype="multipart/form-data">
            <input type="file" name="file" />
            <input type="submit" class="btn btn-primary" name="importSubmit" value="IMPORT">
        </form>
    </div>

    <!-- Data list table --> 
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>InvoiceNo</th>
                <th>StockCode</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>InvoiceDate</th>
                <th>UnitPrice</th>
                <th>Customer</th>
                <th>Country</th>
            </tr>
        </thead>
        <tbody>
        <?php
        // Get inventory rows
        $result = $db->query("SELECT * FROM inventory ORDER BY InvoiceNo DESC");
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
        ?>
            <tr>
                <td><?php echo $row['InvoiceNo']; ?></td>
                <td><?php echo $row['StockCode']; ?></td>
                <td><?php echo $row['Description']; ?></td>
                <td><?php echo $row['Quantity']; ?></td>
                <td><?php echo $row['InvoiceDate']; ?></td>
                <td><?php echo $row['UnitPrice']; ?></td>
                <td><?php echo $row['Customer']; ?></td>
                <td><?php echo $row['Country']; ?></td>
            </tr>
        <?php } }else{ ?>
            <tr><td colspan="5">No item(s) found...</td></tr>
        <?php } ?>
        </tbody>
    </table>
</div>

<!-- Show/hide CSV upload form -->
<script>
function formToggle(ID){
    var element = document.getElementById(ID);
    if(element.style.display === "none"){
        element.style.display = "block";
    }else{
        element.style.display = "none";
    }
}
</script>