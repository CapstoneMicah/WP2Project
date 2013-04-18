<?php
/* Include this file to display categories to narrow search results.
*  - Not the same 'category' from 'Add a Part'
*  - Generate html links of part categories (e.g. windows, rims, brakes, engine, etc.)
*  - Links each submit search and navigate back to search results displaying category, and optionally new subcategory
*  - 
*/
session_start();
require_once('./lib/db.php');
global $mysqli;

$query = "SELECT
              partCategory.name AS category,
              partSubcategory.name AS subcategory
          FROM
              categoryConfig
              JOIN partCategory ON (categoryConfig.categoryID=partCategory.categoryID)
              LEFT JOIN partSubcategory ON (categoryConfig.subcategoryID=partSubcategory.subcategoryID)";

/* execute query and generate results from template */
?>
