<?php
  require_once('./lib/db.php');
  require_once('./lib/searchfns.php');

  if(isset($_POST['partnumber'])) {
    // call partnumber search
    $searchResults = partnumberSearch();
    
    /* $searchResults data structure:
    *  array(
    *    'searchString' => 'partnumberString',
    *    'PN-123-456' => array(
    *        'categories' => array(
    *            'category1' => array(
    *                'brands' => array(
    *                    'brandID1' => 'brandName1',
    *                    'brandID2' => 'brandName2'
    *                )
    *            ),
    *            'c
    *                    
    *
    *    'vendors' => array(
    *        'vendorID1' => array(
    *            'partMatches' => array(
    *                'partID1' => array(
    *                    'categories' => array(
    *                        'category1' => 1,
    *                        'category2' => 1
    *                    ),
    *                    'brands' => array(
    *                        'brandID1' => 'brandName1',
    *                        'brandID2' => 'brandName2'
    *                    ),
    *                    partnumberVal1
    *                
    *
    
    
  }
?>
