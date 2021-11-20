<?php require_once('check_login.php');
include('head.php');
include('header.php');
include('sidebar.php');
include('connect.php');
if (isset($_POST['medicine-sub'])) {
    $med = $_POST['med'];
    $med_rep = str_replace('/\s+/', '+', $med);

    $ch = curl_init();
    $url = 'https://api.fda.gov/drug/event.json?api_key=4E4mbOg6MXYVaHvDlnzm1aeF5Xf5I249k1wRf7Ps&search=patient.drug.openfda.generic_name:"' . $med . '"+patient.drug.openfda.brand_name:"' . $med . '"&limit=2';

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $data = curl_exec($ch);

    if ($err = curl_error($ch)) {
        echo "<p>" . $err . "</p>";
    } else {
        $result = json_decode($data, true);
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

                <div class="container page-body">
                    <div class="row med-search-res">
                        <div class="col-sm-12 mb-3">
                            <input type="text" id="myFilter" class="form-control" onkeyup="filterMedicines()" placeholder="Filter..." />
                        </div>
                    </div>
                    <div class="row med-search-res" id="myItems">
                        <div class="col-sm-12 mb-3">
                            <?php
                            foreach ($result["results"] as $res) {
                                $reaction = array();
                                foreach ($res["patient"]["reaction"] as $reac) {
                                    array_push($reaction, $reac["reactionmeddrapt"]);
                                }

                                $drugs_list = array();

                                foreach ($res["patient"]["drug"] as $drg) {
                                    $drug_info = array();

                                    if (array_key_exists("medicinalproduct", $drg)) {
                                        array_push($drug_info, $drg["medicinalproduct"]);
                                    } else {
                                        array_push($drug_info, null);
                                    }

                                    if (array_key_exists("dosagetext", $drg)) {
                                        array_push($drug_info, $drg["dosagetext"]);
                                    } else {
                                        array_push($drug_info, null);
                                    }

                                    if (array_key_exists("drugindication", $drg)) {
                                        array_push($drug_info, $drg["drugindication"]);
                                    } else {
                                        array_push($drug_info, null);
                                    }

                                    if (array_key_exists("openfda", $drg)) {
                                        $fda = $drg["openfda"];

                                        if (array_key_exists("brand_name", $fda)) {
                                            $med_arr = array();
                                            if (count($fda["brand_name"]) > 4) {
                                                for ($i = 0; $i < 4; $i++) {
                                                    array_push($med_arr, $fda["brand_name"][$i]);
                                                }
                                            } else {
                                                foreach ($fda["brand_name"] as $val) {
                                                    array_push($med_arr, $val);
                                                }
                                            }

                                            array_push($drug_info, $med_arr);
                                        } else {
                                            array_push($drug_info, null);
                                        }

                                        if (array_key_exists("generic_name", $fda)) {
                                            $med_arr = array();
                                            if (count($fda["generic_name"]) > 4) {
                                                for ($i = 0; $i < 4; $i++) {
                                                    array_push($med_arr, $fda["generic_name"][$i]);
                                                }
                                            } else {
                                                foreach ($fda["generic_name"] as $val) {
                                                    array_push($med_arr, $val);
                                                }
                                            }

                                            array_push($drug_info, $med_arr);
                                        } else {
                                            array_push($drug_info, null);
                                        }

                                        if (array_key_exists("manufacturer_name", $fda)) {
                                            $med_arr = array();
                                            if (count($fda["manufacturer_name"]) > 4) {
                                                for ($i = 0; $i < 4; $i++) {
                                                    array_push($med_arr, $fda["manufacturer_name"][$i]);
                                                }
                                            } else {
                                                foreach ($fda["manufacturer_name"] as $val) {
                                                    array_push($med_arr, $val);
                                                }
                                            }

                                            array_push($drug_info, $med_arr);
                                        } else {
                                            array_push($drug_info, null);
                                        }

                                        if (array_key_exists("product_type", $fda)) {
                                            $med_arr = array();
                                            if (count($fda["product_type"]) > 4) {
                                                for ($i = 0; $i < 4; $i++) {
                                                    array_push($med_arr, $fda["product_type"][$i]);
                                                }
                                            } else {
                                                foreach ($fda["product_type"] as $val) {
                                                    array_push($med_arr, $val);
                                                }
                                            }

                                            array_push($drug_info, $med_arr);
                                        } else {
                                            array_push($drug_info, null);
                                        }

                                        if (array_key_exists("route", $fda)) {
                                            $med_arr = array();
                                            if (count($fda["route"]) > 4) {
                                                for ($i = 0; $i < 4; $i++) {
                                                    array_push($med_arr, $fda["route"][$i]);
                                                }
                                            } else {
                                                foreach ($fda["route"] as $val) {
                                                    array_push($med_arr, $val);
                                                }
                                            }

                                            array_push($drug_info, $med_arr);
                                        } else {
                                            array_push($drug_info, null);
                                        }

                                        if (array_key_exists("pharm_class_epc", $fda)) {
                                            $med_arr = array();
                                            if (count($fda["pharm_class_epc"]) > 4) {
                                                for ($i = 0; $i < 4; $i++) {
                                                    array_push($med_arr, $fda["pharm_class_epc"][$i]);
                                                }
                                            } else {
                                                foreach ($fda["pharm_class_epc"] as $val) {
                                                    array_push($med_arr, $val);
                                                }
                                            }

                                            array_push($drug_info, $med_arr);
                                        } else {
                                            array_push($drug_info, null);
                                        }
                                    } else {
                                        for ($i = 0; $i < 6; $i++) {
                                            array_push($drug_info, null);
                                        }
                                    }

                                    array_push($drugs_list, $drug_info);
                                }

                                $drugs_list = array_intersect_key($drugs_list, array_unique(array_map('serialize', $drugs_list)));

                                $mod = json_encode($drugs_list, true);
                                $jfile = fopen("result.json", "w") or die("Unable to open file!");
                                fwrite($jfile, $mod);
                                fclose($jfile);

                                foreach ($drugs_list as $card_cnt) {
                                    if (count(array_filter($card_cnt, function ($x) {
                                        return !empty($x);
                                    })) >= 4) {
                            ?>
                                        <div class="card">

                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $card_cnt[0]; ?></h5>
                                                <hr>
                                                <p class="card-text">Dosage: <?php
                                                                                if ($card_cnt[1]) {
                                                                                    echo $card_cnt[1];
                                                                                }
                                                                                ?></p>
                                                <p class="card-text">Indication: <?php
                                                                                    if ($card_cnt[2]) {
                                                                                        echo $card_cnt[2];
                                                                                    }
                                                                                    ?></p>
                                                <p class="card-text">Brand Name: <?php
                                                                                    if ($card_cnt[3]) {
                                                                                        foreach ($card_cnt[3] as $val) {
                                                                                            echo '<span class="label label-primary">'.$val.'</span>'. "\n";
                                                                                        }
                                                                                    }
                                                                                    ?></p>
                                                <p class="card-text">Generic Name: <?php
                                                                                    if ($card_cnt[4]) {
                                                                                        foreach ($card_cnt[4] as $val) {
                                                                                            echo '<span class="label label-primary">'.$val.'</span>'. "\n";
                                                                                        }
                                                                                    }
                                                                                    ?></p>
                                                <p class="card-text">Manufacturer Name: <?php
                                                                                        if ($card_cnt[5]) {
                                                                                            foreach ($card_cnt[5] as $val) {
                                                                                                echo '<span class="label label-primary">'.$val.'</span>'. "\n";
                                                                                            }
                                                                                        }
                                                                                        ?></p>
                                                <p class="card-text">Product Type: <?php
                                                                                    if ($card_cnt[6]) {
                                                                                        foreach ($card_cnt[6] as $val) {
                                                                                            echo '<span class="label label-primary">'.$val.'</span>'. "\n";
                                                                                        }
                                                                                    }
                                                                                    ?></p>
                                                <p class="card-text">Route: <?php
                                                                            if ($card_cnt[7]) {
                                                                                foreach ($card_cnt[7] as $val) {
                                                                                    echo '<span class="label label-primary">'.$val.'</span>'. "\n";
                                                                                }
                                                                            }
                                                                            ?></p>
                                                <p class="card-text">Pharmacy Class: <?php
                                                                                        if ($card_cnt[8]) {
                                                                                            foreach ($card_cnt[8] as $val) {
                                                                                                echo '<span class="label label-primary">'.$val.'</span>'. "\n";
                                                                                            }
                                                                                        }
                                                                                        ?></p>

                                            </div>
                                        </div>
                            <?php
                                    }
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="#">
        </div>
    </div>
</div>
<?php include('footer.php'); ?>
<script>
    function filterMedicines() {
        var input, filter, cards, cardContainer, h5, title, i;
        input = document.getElementById("myFilter");
        filter = input.value.toUpperCase();
        cardContainer = document.getElementById("myItems");
        cards = cardContainer.getElementsByClassName("card");
        for (i = 0; i < cards.length; i++) {
            title = cards[i].querySelector(".card-body h5.card-title");
            if (title.innerText.toUpperCase().indexOf(filter) > -1) {
                cards[i].style.display = "";
            } else {
                cards[i].style.display = "none";
            }
        }
    }
</script>