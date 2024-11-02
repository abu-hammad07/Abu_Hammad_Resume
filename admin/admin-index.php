<?php
session_start();
include_once 'include/database.php';

$obj = new Database();

// Start customer voucher redeem (page->customer)
if (isset($_GET['customerRedeemID'])) {
    // Sanitize the incoming ID to prevent SQL injection
    $redemID = mysqli_real_escape_string($obj->getMysqli(), $_GET['customerRedeemID']);

    // Retrieve the current status value
    $obj->select('customers', 'cID, isDiscountAvial', null, "cID = '{$redemID}'");
    $result = $obj->getResult();

    // Check if a result is returned
    if (empty($result)) {
        $_SESSION['customer_error'] = "Customer not found.";
        header('Location: customers.php');
        exit();
    }

    $currentStatusValue = $result[0]['isDiscountAvial'];

    // Check if the voucher is already redeemed
    if ($currentStatusValue === 'No') {
        $_SESSION['customer_error'] = "Customer voucher already redeemed.";
        header('Location: customers.php');
        exit();
    }

    // Determine the new status value
    $newStatusValue = ($currentStatusValue === 'Yes') ? 'No' : 'Yes';
    // Pakistan Standard Time
    $voucherUseAt = new DateTime('now', new DateTimeZone('Asia/Karachi'));
    $voucherUseAt = $voucherUseAt->format('Y-m-d H:i:s'); // format the date and time as desired


    // Create an array with the new status value
    $updateData = [
        "isDiscountAvial" => $newStatusValue,
        "voucherUseAt" => $voucherUseAt,
        "validaty" => 'No'
    ];

    // Update the status in the 'customers' table
    $obj->update('customers', $updateData, "cID = '{$redemID}'");

    // Set a session message to confirm the update
    $_SESSION['customer_success'] = 'Customer voucher redeemed successfully! At: ' . $voucherUseAt;

    // Redirect back to the customers management page
    header('Location: customers.php');
    exit();
}
// End customer voucher redeem (page->customer)


// Start overview voucher redeem (page->overview)

if (isset($_GET['redemID'])) {
    // Sanitize the incoming ID to prevent SQL injection
    $redemID = mysqli_real_escape_string($obj->getMysqli(), $_GET['redemID']);

    // Retrieve the current status value
    $obj->select('customers', 'cID, isDiscountAvial', null, "cID = '{$redemID}'");
    $result = $obj->getResult();

    // Check if a result is returned
    if (empty($result)) {
        $_SESSION['customer_error'] = "Customer not found.";
        header('Location: overview.php');
        exit();
    }

    $currentStatusValue = $result[0]['isDiscountAvial'];

    // Check if the voucher is already redeemed
    if ($currentStatusValue === 'No') {
        $_SESSION['customer_error'] = "Customer voucher already redeemed.";
        header('Location: overview.php');
        exit();
    }

    // Determine the new status value
    $newStatusValue = ($currentStatusValue === 'Yes') ? 'No' : 'Yes';
    // Pakistan Standard Time
    $voucherUseAt = new DateTime('now', new DateTimeZone('Asia/Karachi'));
    $voucherUseAt = $voucherUseAt->format('Y-m-d H:i:s'); // format the date and time as desired

    // Create an array with the new status value
    $updateData = [
        "isDiscountAvial" => $newStatusValue,
        "voucherUseAt" => $voucherUseAt,
        "validaty" => 'No'
    ];

    // Update the status in the 'customers' table
    $obj->update('customers', $updateData, "cID = '{$redemID}'");

    // Set a session message to confirm the update
    $_SESSION['customer_success'] = 'Customer voucher redeemed successfully! At: ' . $voucherUseAt;

    // Redirect back to the customers management page
    header('Location: overview.php');
    exit();
}
// End overview voucher redeem (page->overview)



// Start searching customer(Overview)
function searchCustomerOverview($searchType, $search)
{
    $obj = new Database();

    // Secure the input values
    $search = mysqli_real_escape_string($obj->getMysqli(), $search);
    $searchType = mysqli_real_escape_string($obj->getMysqli(), $searchType);

    // Base SQL query
    $sql = "SELECT * FROM `customers`";

    // Add conditions based on the search type
    if (!empty($search)) {
        if ($searchType === 'voucherCode') {
            $sql .= " WHERE voucherCode LIKE '%$search%'";
        } elseif ($searchType === 'cName') {
            $sql .= " WHERE cName LIKE '%$search%'";
        } elseif ($searchType === 'phoneNumber') {
            $sql .= " WHERE cPhoneNumber LIKE '%$search%'";
        }

    }

    // Execute the query
    $result = mysqli_query($obj->getMysqli(), $sql);

    // Initialize the data variable
    $data = '';

    // Loop through the results
    foreach ($result as $row) {
        $isAvailable = $row['isDiscountAvial'] === 'Yes';

        // Construct the HTML for each row
        $data .= '
            <tr>
                <td>' . $row['cName'] . '</td>
                <td>' . $row['cEmail'] . '</td>
                <td>' . $row['cPhoneNumber'] . '</td>
                <td>' . $row['voucherCode'] . '</td>
                <td>' . $row['createdAt'] . '</td>
                <td>' . $row['expireAt'] . '</td>
                <td>' . $row['percentageDiscount'] . '</td>
                <td>
                    <p class="members-box ' . ($isAvailable ? 'background-light-success text-center b-light-success font-success' : 'background-light-danger text-center b-light-danger font-danger') . '">
                        ' . ($isAvailable ? 'Is Avail' : 'Voucher is redeemed') . '
                    </p>
                </td>
                <td>
                    <ul class="action">
                        ' . ($isAvailable ? '
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="">
                            <label class="form-check-label"></label>
                        </div>
                        <li class="me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Redeem Points">
                            <a href="admin-index.php?redemID=' . $row['cID'] . '" class="text-danger">
                                <i class="fa fa-check-square-o fs-5"></i>
                            </a>
                        </li>' : '
                        <p class="members-box background-light-success text-center b-light-success font-success">' . $row['voucherUseAt'] . '</p>'
        ) . '
                    </ul>
                </td>
            </tr>
        ';
    }

    // If no data was found, display a message
    if (empty($data)) {
        $data = '
            <tr>
                <td colspan="9" class="fw-semibold bg-light-warning text-warning text-center">There are no matching data in the database. ' . htmlspecialchars($search) . '</td>
            </tr>
        ';
    }

    return $data;
}

// End searching customer(Overview)

// Start searching customer(Overview)
function searchCustomer($searchType, $search)
{
    $obj = new Database();

    // Secure the input values
    $search = mysqli_real_escape_string($obj->getMysqli(), $search);
    $searchType = mysqli_real_escape_string($obj->getMysqli(), $searchType);

    // Base SQL query
    $sql = "SELECT * FROM `customers`";

    // Add conditions based on the search type
    if ($searchType === 'voucherCode') {
        $sql .= " WHERE voucherCode LIKE '%$search%'";
    } elseif ($searchType === 'cName') {
        $sql .= " WHERE cName LIKE '%$search%'";
    } elseif ($searchType === 'phoneNumber') {
        $sql .= " WHERE cPhoneNumber LIKE '%$search%'";
    }

    // Execute the query
    $result = mysqli_query($obj->getMysqli(), $sql);

    // Initialize the data variable
    $data = '';

    // Loop through the results
    foreach ($result as $row) {
        $isAvailable = $row['isDiscountAvial'] === 'Yes';

        // Construct the HTML for each row
        $data .= '
            <tr>
                <td>' . $row['cName'] . '</td>
                <td>' . $row['cEmail'] . '</td>
                <td>' . $row['cPhoneNumber'] . '</td>
                <td>' . $row['voucherCode'] . '</td>
                <td>' . $row['createdAt'] . '</td>
                <td>' . $row['expireAt'] . '</td>
                <td>' . $row['percentageDiscount'] . '</td>
                <td>
                    <p class="members-box ' . ($isAvailable ? 'background-light-success text-center b-light-success font-success' : 'background-light-danger text-center b-light-danger font-danger') . '">
                        ' . ($isAvailable ? 'Is Avail' : 'Voucher is redeemed') . '
                    </p>
                </td>
                <td>
                    <ul class="action">
                        ' . ($isAvailable ? '
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="">
                            <label class="form-check-label"></label>
                        </div>
                        <li class="me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Redeem Points">
                            <a href="admin-index.php?redemID=' . $row['cID'] . '" class="text-danger">
                                <i class="fa fa-check-square-o fs-5"></i>
                            </a>
                        </li>' : '
                        <p class="members-box background-light-success text-center b-light-success font-success">' . $row['voucherUseAt'] . '</p>'
        ) . '
                    </ul>
                </td>
            </tr>
        ';
    }

    // If no data was found, display a message
    if (empty($data)) {
        $data = '
            <tr>
                <td colspan="9" class="fw-semibold bg-light-warning text-warning text-center">There are no matching data in the database. ' . htmlspecialchars($search) . '</td>
            </tr>
        ';
    }

    return $data;
}

// End searching customer(Overview)






if (isset($_POST['action'])) {
    $action = $_POST['action'];

    // filter searching customer(Overview)
    if ($action == 'search-overview') {
        $searchType = $_POST['searchType'];
        $search = $_POST['search'];

        $result = searchCustomerOverview($searchType, $search);

        $response = ['data' => $result];
        echo json_encode($response);
    }

    // filter searching customer(customers)
    if ($action == 'search-customers') {
        $searchType = $_POST['searchType'];
        $search = $_POST['search'];

        $result = searchCustomer($searchType, $search);

        $response = ['data' => $result];
        echo json_encode($response);
    }



}

