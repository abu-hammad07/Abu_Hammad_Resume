<?php
session_start();
include_once '../include/database.php';

$obj = new Database();

if (isset($_SESSION['login']) === true && $_SESSION['roleType'] === 'Manager') {
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
                                    <th class="fs-4" colspan="14">User Deatails</th>
                                </tr>
                                <tr>
                                    <th>S.No</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Username</th>
                                    <th>User Type</th>
                                    <th>Branch Locator</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            <tbody id="data-table">';

                                // Execute the query
                            
                                $obj->select('users', '*', null, null, null, null);
                                $result = $obj->getResult();

                                if ($result > 0) {
                                    // $no = 1;
                                    foreach ($result as $item) {
                                        $createdDate = date('d/m/Y ', strtotime($item['createdDate']));
                                        $html .= '<tr>';
                                        $html .= '<td>' . $item['uID'] . '</td>';
                                        $html .= '<td>' . $item['fullName'] . '</td>';
                                        $html .= '<td>' . $item['email'] . '</td>';
                                        $html .= '<td>' . $item['username'] . '</td>';
                                        $html .= '<td>' . $item['roleType'] . '</td>';
                                        $html .= '<td>' . $item['branchLocator'] . '</td>';
                                        $html .= "<td>$createdDate</td>";
                                        $html .= '</tr>';
                                    }
                                } else {
                                    // $html .= '<tr><td class="text-danger" colspan="35">Data not found</td></tr>';
                                    $_SESSION['uID_error'] = "Data not found";
                                    header('location:users-management.php');
                                    exit;
                                }

                                // Close the HTML table
                                $html .= '</tbody></table>';

                                // Set the appropriate headers for Excel download
                                header('Content-Type: application/vnd.ms-excel');
                                header('Content-Disposition: attachment; filename=user-Details.xls');
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