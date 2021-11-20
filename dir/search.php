<?php require_once('check_login.php');
include('head.php');
include('header.php');
include('sidebar.php');
include('connect.php');
if (isset($_POST['medicine-sub'])) {
    $med = $_POST['med'];
    $med_rep = str_replace('/\s+/', '+', $med);

    $ch = curl_init();
    $url = 'https://api.fda.gov/drug/event.json?api_key=4E4mbOg6MXYVaHvDlnzm1aeF5Xf5I249k1wRf7Ps&search=patient.drug.openfda.generic_name:"' . $med . '"+patient.drug.openfda.brand_name:"' . $med . '"&limit=3';

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $data = curl_exec($ch);

    if ($err = curl_error($ch)) {
        echo "<p>" . $err . "</p>";
    } else {
        $result = json_decode($data, true);
        $route = $result['results'][0]['patient']['drug'][0]['openfda']['route'][0];
        $jfile = fopen("search-result.json", "w") or die("Unable to open file!");
        fwrite($jfile, $data);
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
                    echo $route;
                    ?>
                </div>

            </div>
        </div>

        <div id="#">
        </div>
    </div>
</div>
<?php include('footer.php'); ?>