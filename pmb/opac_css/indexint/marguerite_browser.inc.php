<?php
// +-------------------------------------------------+
// � 2002-2004 PMB Services / www.sigb.net pmb@sigb.net et contributeurs (voir www.sigb.net)
// +-------------------------------------------------+
// $Id: marguerite_browser.inc.php,v 1.14 2017-11-07 15:51:41 ngantier Exp $

if (stristr($_SERVER['REQUEST_URI'], ".inc.php")) die("no access");

$marguerite_img ="
<div>
        <div id='info-box'>
            <div class='row'>
                <div class='column c-left'>
                    <div class='block'>
                        <a target='_blank' href='index.php?lvl=indexint_see&id=!!id000!!&main=1'><img src=\"images/img/1.png\"  class='ml'></a>
                    </div>
                    <div class='block'>
                        <a target='_blank' href='index.php?lvl=indexint_see&id=!!id200!!&main=1'><img src=\"images/img/3.png\" class='ml'></a>
                    </div>
                    <div class='block'>
                        <a target='_blank' href='index.php?lvl=indexint_see&id=!!id400!!&main=1'><img src=\"images/img/5.png\" class='ml'></a>
                    </div>
                    <div class='block'>
                        <a target='_blank' href='index.php?lvl=indexint_see&id=!!id600!!&main=1'><img src=\"images/img/7.png\" class='ml'></a>
                    </div>
                    <div class='block'>
                        <a target='_blank' href='index.php?lvl=indexint_see&id=!!id800!!&main=1'><img src=\"images/img/9.png\" class='ml'></a>
                    </div>
                </div>
                <div class='column c-right'>
                    <div class='block'>
                        <a target='_blank' href='index.php?lvl=indexint_see&id=!!id100!!&main=1'><img src=\"images/img/2.png\" class='mr'></a>
                    </div>
                    <div class='block'>
                        <a target='_blank' href='index.php?lvl=indexint_see&id=!!id300!!&main=1'><img src=\"images/img/4.png\" class='mr'></a>
                    </div>
                    <div class='block'>
                        <a target='_blank' href='index.php?lvl=indexint_see&id=!!id500!!&main=1'><img src=\"images/img/6.png\" class='mr'></a>
                    </div>
                    <div class='block'>
                        <a target='_blank' href='index.php?lvl=indexint_see&id=!!id700!!&main=1'><img src=\"images/img/8.png\" class='mr'></a>
                    </div>
                    <div class='block'>
                        <a target='_blank' href='index.php?lvl=indexint_see&id=!!id900!!&main=1'><img src=\"images/img/10.png\" class='mr'></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- INFO BOX MOBILE -->
        <div id='info-box-mobile'>
            <div class='row'>
                <div class='column'>
                    <div class='block'>
                        <a target='_blank' href='index.php?lvl=indexint_see&id=!!id000!!&main=1'><img src=\"images/img/1s.png\"></a>
                    </div>
                    <div class='block'>
                        <a target='_blank' href='index.php?lvl=indexint_see&id=!!id100!!&main=1'><img src=\"images/img/2s.png\"></a>
                    </div>
                    <div class='block'>
                        <a target='_blank' href='index.php?lvl=indexint_see&id=!!id200!!&main=1'><img src=\"images/img/3s.png\"></a>
                    </div>
                    <div class='block'>
                        <a target='_blank' href='index.php?lvl=indexint_see&id=!!id300!!&main=1'><img src=\"images/img/4s.png\"></a>
                    </div>
                    <div class='block'>
                        <a target='_blank' href='index.php?lvl=indexint_see&id=!!id400!!&main=1'><img src=\"images/img/5s.png\"></a>
                    </div>
                    <div class='block'>
                        <a target='_blank' href='index.php?lvl=indexint_see&id=!!id500!!&main=1'><img src=\"images/img/6s.png\"></a>
                    </div>
                    <div class='block'>
                        <a target='_blank' href='index.php?lvl=indexint_see&id=!!id600!!&main=1'><img src=\"images/img/7s.png\"></a>
                    </div>
                    <div class='block'>
                        <a target='_blank' href='index.php?lvl=indexint_see&id=!!id700!!&main=1'><img src=\"images/img/8s.png\"></a>
                    </div>
                    <div class='block'>
                        <a target='_blank' href='index.php?lvl=indexint_see&id=!!id800!!&main=1'><img src=\"images/img/9s.png\"></a>
                    </div>
                    <div class='block'>
                        <a target='_blank' href='index.php?lvl=indexint_see&id=!!id900!!&main=1'><img src=\"images/img/10s.png\"></a>
                    </div>

                </div>
            </div>
        </div>
    </div>

<div class='uk-margin-auto-left uk-margin-auto-vertical'>
 </div>";

$rqt = " select indexint_id, indexint_comment, indexint_name from indexint where indexint_name in ('000','100','200','300','400','500','600','700','800','900') ";
$res = pmb_mysql_query($rqt, $dbh);
while($indexint=pmb_mysql_fetch_object($res)) {
	$indexint->indexint_comment = pmb_preg_replace('/\r/', ' ', $indexint->indexint_comment);
	$indexint->indexint_comment = pmb_preg_replace('/\n/', ' ', $indexint->indexint_comment);
	$marguerite_img = pmb_preg_replace("/!!".$indexint->indexint_name."!!/m", htmlentities($indexint->indexint_comment,ENT_QUOTES,$charset), $marguerite_img);
	$marguerite_img = pmb_preg_replace("/!!id".$indexint->indexint_name."!!/", $indexint->indexint_id, $marguerite_img);
	}
print preg_replace('/!!indexint_title!!/m',$msg["colors_marguerite"], $decimal_see_header);
print "<span style='text-align:center'>".$marguerite_img;
print "<div id=\"marguerite_petal_text\"></div></span><br />";
print $decimal_see_footer;
