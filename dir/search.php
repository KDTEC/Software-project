<?php require_once('check_login.php');
include('head.php');
include('header.php');
include('sidebar.php');
include('connect.php');
if (isset($_POST['medicine-sub'])) {
    $med = $_POST['med'];
    $med_rep = str_replace('/\s+/', '+', $med);
    $url = 'https://api.fda.gov/drug/event.json?api_key=4E4mbOg6MXYVaHvDlnzm1aeF5Xf5I249k1wRf7Ps&search=patient.drug.openfda.generic_name:"'.$med_rep.'"&limit=5'; //'"+patient.drug.openfda.brand_name:'.$med_rep.
    $ch = curl_init($url);
    curl_exec($ch);
    if (!curl_errno($ch)) {
        $info = curl_getinfo($ch);
        // $result = $info["results"];
        $json = json_decode($info, true);
        $jfile = fopen("result.json", "w") or die("Unable to open file!");
        fwrite($jfile, $json);
        fclose($jfile);
    }
    curl_close($ch);
}
?>

<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-header">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <div class="d-inline">
                                    <h2>You Searched For: <?php echo $med; ?></h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="dashboard.php"> <i class="feather icon-home"></i> </a>
                                    </li>
                                    <li class="breadcrumb-item"><a>Prescription</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Search Medicine</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="medicine-search">
                    <form action="search.php" method="post">
                        <input type="search" name="med" id="form1" class="form-control" placeholder="Search Medicine..." />
                        <button type="submit" name="medicine-sub" class="med-sub">
                            <i class="feather icon-search"></i>
                        </button>
                    </form>
                </div>

                <div class="page-body">
                    <?php
                    ?>
                </div>

            </div>
        </div>

        <div id="#">
        </div>
    </div>
</div>
<?php include('footer.php'); ?>