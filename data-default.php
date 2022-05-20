<?php
header("Content-type:application/json");

$array = array(
	'person' => array (
		'name' => NULL,
		'nhsNumber' => NULL,
		'dateOfBirth' => NULL),
	'appointments' => array( 
		'when' => array(
			'arriveBefore' => NULL,
			'dateTime' => NULL,
			'duration' => NULL,
			'notDateSpecific' => NULL),
		'what' => array(
			'simpleName' => NULL,
			'about' => null,
			'moreInfoURL' => NULL),
		'who' => array(
			'personName' => null,
			'personURL' => null,
			'orTeam' => NULL,
			'role' => NULL,
			'roleURL' => null,
			'orgName' => NULL),
		'where' => array(
			'venueName' => NULL,
			'department' => NULL,
			'address' => NULL,
			'postcode' => NULL),
		'meta' => array(
			'type' => NULL,
			'hospitalNumber' => NULL,
			'dateIssued' => NULL,
			'dateUpdated' => NULL,
			'orgType' => NULL,
			'orgId' => NULL,
			'clinicId' => NULL),			
		'referredBy' => NULL,
		'amend' => array(
			'telephone' => NULL),
		'transport' => array(
			'telephone' => NULL,
			'bookBefore' => NULL),
		'notices' => array(
			'warnings' => NULL,
			'before' => NULL,
			'after' => NULL,
			'during' => NULL)
		)
	);
	
echo json_encode($array);
?>
