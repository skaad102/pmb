<?php
// +-------------------------------------------------+
// � 2002-2004 PMB Services / www.sigb.net pmb@sigb.net et contributeurs (voir www.sigb.net)
// +-------------------------------------------------+
// $Id: liste_prets.inc.php,v 1.11 2019-08-02 10:49:22 dgoron Exp $

if (stristr($_SERVER['REQUEST_URI'], ".inc.php")) die("no access");

require_once($class_path."/pdf/reader/loans/lettre_reader_loans_group_PDF.class.php");

// popup d'impression PDF pour lettres de retard par groupe
// re�oit : liste des groupes coch�s $coch_groupe

header("Content-Type: application/pdf");
$lettre_reader_loans_group_PDF = lettre_reader_loans_group_PDF::get_instance('reader/loans');
$lettre_reader_loans_group_PDF->doLettre($id_groupe);
$ourPDF = $lettre_reader_loans_group_PDF->PDF;
$ourPDF->OutPut();

?>