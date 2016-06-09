<?php


function checkStringIntegrity($string) {
	
	if(!is_array($string)) {
		$string = to_utf8($string);
		$string = trim($string);
		$string = strip_tags($string);

		$string = nl2br($string);
			
		if(get_magic_quotes_gpc()) 
			$string = stripslashes($string);
	} else {
		foreach($string as $k => $champ) {
			$string[$k] = checkStringIntegrity($champ);
		}
	}
	return $string;
}	

//Transforme un texte en utf8

function to_utf8($string) {
	// est-ce que c'est de l'utf-8 ?
	if (preg_match('!!u', $string)) {
   		// this is utf-8
   		return $string;
	}	else 	{
		return utf8_encode($string);
	   // definitely not utf-8
	}
}

function time_local($timestamp = '') {
	if($timestamp=='')
		$timestamp = time();
	$heure = 0;
	return $timestamp+(3600*$heure);
}

// return true si la valeure est un timestamp unix
function isValidTimestamp($timestamp)
{
    return ((string) (int) $timestamp === $timestamp) 
        && ($timestamp <= PHP_INT_MAX)
        && ($timestamp >= ~PHP_INT_MAX)
        && ($timestamp > 0); // + de 01/01/1970
}

function affiche_date($timestamp,$type='affiche-mois') {
	
	
		switch($type) {
			case 'JJ/MM/AA' :
				return to_utf8(strftime("%d/%m/%Y, %H:%M", $timestamp)); 
			case 'JJ/MM/AAAA HH:MM:SS' :
				return to_utf8(strftime("%d/%m/%Y %H:%M:%S", $timestamp)); 
			case 'JJ/MM/AAAA' :
				return to_utf8(strftime("%d/%m/%Y", $timestamp)); 
			case 'affiche-mois':
				return to_utf8(strftime("%d/%m/%Y à %H:%M", $timestamp)); 
		}
	
}

function affiche_date_mysql($timestamp) {
	return AffDate(strtotime($timestamp));
}

function prer($var,$return = FALSE,$pass=false) {
		if($return==FALSE) {
			echo '<pre>';
			print_r($var,$return);
			echo '</pre>';
		} else {
			$r = '<pre>';
			$r .= print_r($var,TRUE);
			$r .= '</pre>';
			return $r;
		}
	
}

function AffDate($date)
{
	$date_a_comparer = new DateTime();
	$date_a_comparer->setTimestamp($date);
	
	$date_actuelle = new DateTime();
	$date_actuelle->setTimestamp(time_local());
	
	$intervalle = $date_a_comparer->diff($date_actuelle);

	$ans = $intervalle->format('%y');
	$mois = $intervalle->format('%m');
	$jours = $intervalle->format('%d');
	$heures = $intervalle->format('%h');
	$minutes = $intervalle->format('%i');
	$secondes = $intervalle->format('%s');

	if ($ans != 0)
	{
		$relative_date =  $ans . ' ' . _('an') . (($ans > 1) ? 's' : '');
		if ($mois >= 6) $relative_date .= ' ' . _('et demi');
	}
	elseif ($mois != 0)
	{
		$relative_date =  $mois . ' ' . _('mois');
		if ($jours >= 15) $relative_date .= ' ' . _('et demi');
	}
	elseif ($jours != 0)
	{
		$relative_date =  $jours . ' ' . _('jour') . (($jours > 1) ? 's' : '');
	}
	elseif ($heures != 0)
	{
		$relative_date =  $heures . ' ' . _('heure') . (($heures > 1) ? 's' : '');
	}
	elseif ($minutes != 0)
	{
		$relative_date =  $minutes . ' ' . _('minute') . (($minutes > 1) ? 's' : '');
	}
	else
	{
		$relative_date =  ' ' . _('quelques secondes');
	}

	$final = '';
	
	if ($date_a_comparer > $date_actuelle)
	{
		$final = sprintf(_('dans %s'),$relative_date);
	}
	else
	{
		$final = sprintf(_('il y a %s'),$relative_date);
	}

	return $final;
}