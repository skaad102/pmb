<?php
// +-------------------------------------------------+
// � 2002-2004 PMB Services / www.sigb.net pmb@sigb.net et contributeurs (voir www.sigb.net)
// +-------------------------------------------------+
// $Id: enter_localisation.inc.php,v 1.23 2017-11-30 14:33:09 dgoron Exp $

if (stristr($_SERVER['REQUEST_URI'], ".inc.php")) die("no access");

require_once($class_path."/map/map_location_home_page_controler.class.php");

if (!$opac_nb_localisations_per_line) $opac_nb_localisations_per_line=6;
print "<div id=\"location\">";
print "<h3><span>".$msg["l_browse_title"]."</span></h3>";
print "<div id='location-container'>";
print "<div id='uk-container'>";

if($opac_view_filter_class){
	$requete="select idlocation, location_libelle, location_pic, css_style from docs_location where location_visible_opac=1 
	  and idlocation in(". implode(",",$opac_view_filter_class->params["nav_sections"]).")  order by location_libelle ";
}
else
	$requete="select idlocation, location_libelle, location_pic, css_style from docs_location where location_visible_opac=1 order by location_libelle ";

$resultat=pmb_mysql_query($requete);
if (pmb_mysql_num_rows($resultat)>1) {
	print "<div class='mt-5 mb-2 uk-child-width-1-3@m uk-grid-small uk-grid-match' uk-grid>";
	$npl=0;
	while ($r=pmb_mysql_fetch_object($resultat)) {
		if($opac_map_activate==1 || $opac_map_activate==3) {
        	$ids[] = $r->idlocation;
            $tab_locations[$r->idlocation]["id"] = $r->idlocation;
            $tab_locations[$r->idlocation]['libelle'] = $r->location_libelle;
            $tab_locations[$r->idlocation]['code_champ'] = 90;
            $tab_locations[$r->idlocation]['code_ss_champ'] = 4;
            $tab_locations[$r->idlocation]['url'] = "./index.php?lvl=section_see";
            $tab_locations[$r->idlocation]['param'] = "&location=" . $r->idlocation . ($r->css_style?"&opac_css=" . $r->css_style:""); 
            $tab_locations[$r->idlocation]['flag_home_page'] = true;
        } else {  

			
			if ($r->location_pic) $image_src = $r->location_pic ;
				else  $image_src = get_url_icon("bibli-small.png");
			print "<a class='uk-link-toggle' href='./index.php?lvl=section_see&location=".$r->idlocation.($r->css_style?"&opac_css=".$r->css_style:"")."'>
                    <div class='uk-card uk-card-default uk-card-body'>
                        <h3 class='uk-card-title'>".$r->location_libelle."</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
						<div data-src=".$image_src." data-srcset=".$image_src." data-sizes='' uk-img></div>
                    </div>
                </a>";
			$npl++;
        }
	}
    if($opac_map_activate==1 || $opac_map_activate==3) {
    	print '<tr><td>' . map_location_home_page_controler::get_map_location_home_page( $ids, $tab_locations, array(), array()) . '</td></tr>';     
    }
	if ($npl!=0) {
		while ($npl<$opac_nb_localisations_per_line) {
			print "<td></td>";
			$npl++;
		}
		print "</tr>";
	}
	print "</div>";
} else {
	if (pmb_mysql_num_rows($resultat)) {
		$location=pmb_mysql_result($resultat,0,0);
		$requete="select idsection, section_libelle, section_pic from docs_section, exemplaires where expl_location=$location and section_visible_opac=1 and expl_section=idsection group by idsection order by section_libelle ";
		$resultat=pmb_mysql_query($requete);
		print "<div class='mt-5 mb-2 uk-child-width-1-3@m uk-grid-small uk-grid-match' uk-grid>";
		$npl=0;
		while ($r=pmb_mysql_fetch_object($resultat)) {

			
			if ($r->section_pic) $image_src = $r->section_pic ;
				else  $image_src = get_url_icon("rayonnage-small.png");
			print "<a class='uk-link-toggle' href='./index.php?lvl=section_see&location=".$location."&id=".$r->idsection."'>
					<div class='uk-card uk-card-default uk-card-body'>
						<div class='uk-inline'>
							<img src=".$image_src." alt=''>
							<div class='uk-overlay uk-overlay-default uk-position-bottom'>
								<h3 class='uk-card-title'>".$r->section_libelle."</h3>
							</div>
						</div>
					</div>
				</a>";
			$npl++;
		}
		print "</div>";
	}
}
print "</div>";
print "</div>";
print "</div>";
?>