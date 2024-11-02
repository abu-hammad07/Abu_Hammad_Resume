<?php
session_start();
include_once '../include/database.php';

$obj = new Database();

if (isset($_SESSION['login']) === true && $_SESSION['roleType'] === 'Branch Manager') {
    $fullName = $_SESSION['fullName'];
    $username = $_SESSION['username'];
    $email = $_SESSION['email'];
    ?>

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <form action="add_company_code.php" method="post">
                <div class="row my-5">
                    <div class="col-lg-12 ">
                        <div class="card">
                            <div class="dov ">
                                <?php
                                // Create a table in HTML and set it as a variable
                                $html = '<table class="contain-table" >
                            <thead>
                                <tr>
                                    <th class="fs-4" colspan="14">Customer Username: ' . $fullName . ' </th>
                                </tr>
                                <tr>
                                    <th>S.No</th>
                                    <th>Voucher</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Created At</th>
                                    <th>Expire At</th>
                                    <th>Discount %</th>
                                    <th>Is Avail or Not</th>
                                    <th>Voucher Redeemed At</th>
                                </tr>
                            </thead>
                            <tbody id="data-table">';

                                // Execute the query
                            
                                // $obj->select('customers', '*', null, null, null, null);
                                $obj->sql("SELECT * FROM `customers` WHERE `cEmail` = '$email'");
                                $result = $obj->getResult();

                                if ($result > 0) {
                                    $no = 1;
                                    foreach ($result as $item) {
                                        $isDiscountAvial = ($item['isDiscountAvial'] === 'Yes') ? 'Available' : 'Voucher is redeemed';
                                        // check voucher is redeem or not
                                        $voucherUseAt = $item['voucherUseAt'] != null ? $item['voucherUseAt'] : 'Not redeemed';

                                        $html .= '<tr>';
                                        $html .= '<td class="font">' . $no++ . '</td>';
                                        $html .= '<td>' . $item['voucherCode'] . '</td>';
                                        $html .= '<td>' . $item['cName'] . '</td>';
                                        $html .= '<td>' . $item['cEmail'] . '</td>';
                                        $html .= '<td>' . $item['cPhoneNumber'] . '</td>';
                                        $html .= '<td>' . $item['createdAt'] . '</td>';
                                        $html .= '<td>' . $item['expireAt'] . '</td>';
                                        $html .= '<td>' . $item['percentageDiscount'] . '</td>';
                                        $html .= "<td>$isDiscountAvial</td>";
                                        $html .= "<td>$voucherUseAt</td>";
                                        $html .= '</tr>';
                                    }
                                } else {
                                    // $html .= '<tr><td class="text-danger" colspan="35">Data not found</td></tr>';
                                    $_SESSION['customer_error'] = "Data not found";
                                    header('location:customers.php');
                                    exit;
                                }

                                // Close the HTML table
                                $html .= '</tbody></table>';

                                // Set the appropriate headers for Excel download
                                header('Content-Type: application/vnd.ms-excel');
                                header("Content-Disposition: attachment; filename=customer_$username.xls");
                                echo $html;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
        <?php
} else {
    header('location:../login.php');
    exit;
}
?>