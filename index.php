<html>
<body>

<h1>Results:</h1>
<?php

require_once 'utmAppend.php';




// args that start with ?
//     urls that contain ?
//     urls that contain #
//     urls that have no ? or #
// args that start with #
//     urls that contain ?
//     urls that contain #
//     urls that have no ? or #
// args that start with something else
//     urls that have both ? and #
//     urls that have no ? or #
//     urls that contain ? and no #
//     urls that contain # and no ?

// // =============================================================================================================
// // =============================================================================================================
// // =============================================================================================================
// //               Testing begins now!
// // =============================================================================================================
// // =============================================================================================================
// // =============================================================================================================

$testArgs = array(
    'hasQuestion' => "?utm_source=testUrl&utm_medium=testMedium",
    'hasHash' => "#utm_source=testUrl&utm_medium=testMedium",
    'none' => "utm_source=testUrl&utm_medium=testMedium")
;

$testUrls = array(
    'hasQuestion' => "http://www.elefant.ro/fashion/filter?subcategorie:ceasuri-38/categorie-produs:accesorii-4/sex:femei-2/ordoneaza:sales/pret:19.9:149.9",
    'hasHash' => "http://www.elefant.ro/oferte-speciale#m_cd_11656",
    'hasBoth' => "http://www.elefant.ro/fashion/filter?subcategorie:ceasuri-38/categorie-produs:accesorii-4/sex:femei-2/ordoneaza:sales/pret:19.9:149.9#awesomeUtm=ceva",
    'none' => "http://www.elefant.ro"
);

foreach ($testUrls as $key => $url) {
    foreach ($testArgs as $k => $arg) {
        echo $url;
        echo "<br />";
        echo "<br />";
        echo $arg;
        echo "<br />";
        echo "<br />";
        $build = utmAppend::build($url, $arg);
        echo "result: <a href='". $build."'>".$build.'</a>';
        echo "<br />";
        echo "<hr />";
        echo "<br />";
        echo "<br />";
        echo "<br />";
    }
}

?>

  <h1>How to check?</h1>
  <ol>
  <li>Right click and enter Inspect elements</li>
  <li>Acccess Resources tab</li>
  <li>Access cookies</li>
  <li>Select current domain</li>
  <li>Look after a cookie called (name) "__utmz"</li>
  <li>Notice if value has a string like utmcsr and utmccn with values from utms build by this script</li>
  </ol>
</body>