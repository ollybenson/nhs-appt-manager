<?php
header("Content-type:application/json");
date_default_timezone_set('Europe/London');

function returnDate($interval,$isSub = 0) {
	$startDate = new DateTime(date("Y-m-d",strtotime('next tuesday')));
	if ($isSub) $startDate->sub(new DateInterval($interval));
		else $startDate->add(new DateInterval($interval));
		
	if ($startDate->format("w")==6) $startDate->sub(new DateInterval("P1D"));
	if ($startDate->format("w")==0) $startDate->add(new DateInterval("P1D"));
	return $startDate->format('c');
	}

$array = array(
	'olly' => array (
		'person' => array('name' => 'Olly',
				'nhsNumber' =>'426 555 6789'),
		'appointments' => array(
			1=> array(
				'when' => array(
					'arriveBefore' => 20,
					'dateTime' =>  returnDate("PT11H40M"),
					'duration' => '30'),
				'what' => array(
					'simpleName' => 'Echocardiogram',
					'moreInfoURL' => 'https://www.nhs.uk/conditions/echocardiogram/'),
				'who' => array(
					'role' => 'sonographer',
					'orgName' => 'Barts Health NHS Trust'),
				'where' => array(
					'venueName' => 'St Bartholomew\'s Hospital',
					'department' => 'Clinic 5',
					'address' => array('2nd Floor','King George V Wing','St Bartholomew\'s Hospital'),
					'postcode' => 'EC1A 7BE'),
				'meta' => array(
					'type' => 'outpatientAppointment',
					'hospitalNumber' => 6789123,
					'dateIssued' => returnDate("P90D",1),
					'dateUpdated' => returnDate("P90D",1),
					'orgType' => 'acute',
					'orgId' => 'BARTS',
					'clinicId' => 'US Cardiac Echo Complex Congenital'),			
				'referredBy' => 'your doctor',
				'amend' => array(
					'telephone' => '02037658154'),
				'transport' => array(
					'telephone' => '03300416767',
					'bookBefore' => '48'),
				'notices' => array(
					'warnings' => array('dna'),
					'during' => array(
						'Please note that personal property remais your responsibility at all times. You may be asked to remove jewellery or other valuabeles during your examination. Please keep them with you at all times and make sure that you have them when you leave the examination rooom.',
						'You are welcome to bring a friend or relative with you.  Pleae note that if you are bringing young children you must bring another adult to look after them while you are having your examinsation.',
						'As part of a shared service agreement with other NHS organisations in the area, your radiology images and records may be shared with relevant organisation as part of determining and providing your care.  If you have any concerns about this, please ask for more information from a member of staff.'
						)
					)
				),
			2=> array(
				'when' => array(
					'dateTime' =>  returnDate("P21DT14H30M"),
					),
				'what' => array(
					'simpleName' => 'Cardiology',
					),
				'who' => array(
					'personName' => 'Dr Richard Schilling',
					'orTeam' => true,
					'orgName' => 'Barts Health NHS Trust'),
				'where' => array(
					'venueName' => 'St Bartholomew\'s Hospital',
					'department' => 'Clinic 5',
					'address' => array('2nd Floor','King George V Wing','St Bartholomew\'s Hospital'),
					'postcode' => 'EC1A 7BE'),
				'meta' => array(
					'type' => 'outpatientAppointment',
					'hospitalNumber' => 6789123,
					'dateIssued' => returnDate("P45D",1),
					'dateUpdated' => returnDate("P15D",1),
					'orgType' => 'acute',
					'orgId' => 'BARTS',
					'clinicId' => 'GUCH and Non-Invasive Clinic'),			
				'amend' => array(
					'telephone' => array('02034655855','02037658154')),
				'transport' => array(
					'telephone' => '03300416767',
					'bookBefore' => '48'),
				'notices' => array(
					'warnings' => array('late','dna'),
					'before' => array('medicines','letter'),
					'during' => array('details')
					)
				),
			3=> array(
				'when' => array(
					'dateTime' =>  returnDate("P45DT10H15M"),
					),
				'what' => array(
					'simpleName' => 'Pacing clinic',
					'about' => 'Our team will ensure your pacemaker, defibrilator or loop recorder is working well for you and your condition.'),
				'who' => array(
					'role' => 'cardiac physiologist',
					'orgName' => 'Barts Health NHS Trust'),
				'where' => array(
					'venueName' => 'St Bartholomew\'s Hospital',
					'department' => 'Clinic 5',
					'address' => array('2nd Floor','King George V Wing','St Bartholomew\'s Hospital'),
					'postcode' => 'EC1A 7BE'),
				'meta' => array(
					'type' => 'outpatientAppointment',
					'hospitalNumber' => 6789123,
					'dateIssued' => returnDate("P60D",1),
					'dateUpdated' => returnDate("P35D",1),
					'orgType' => 'acute',
					'orgId' => 'BARTS',
					'clinicId' => 'Device Clinic'),			
				'referredBy' => null,
				'amend' => array(
					'telephone' => array('02034655855','02037658154')),
				'transport' => array(
					'telephone' => '03300416767',
					'bookBefore' => '48'),
				'notices' => array(
					'warnings' => array('late'),
					'before' => array('medicines'),
					)
				),
			4=> array(
				'when' => array(
					'dateTime' => returnDate("P14DT09H40M"),
					),
				'what' => array(
					'simpleName' => 'GP Appointment',
					'about' => 'This is for a medicines review.',
					),
				'who' => array(
					'personName' => 'Dr Ali Muhammad',
					'role' => 'GP',
					'orgName' => 'Albert Road Medical Practice'),
				'where' => array(
					'venueName' => 'Albert Road Medical Practice',
					'address' => array('72 Albert Road','Rugby','Warwickshire'),
					'postcode' => 'CV21 2DT'),
				'meta' => array(
					'type' => 'appointment',
					'dateIssued' => returnDate("P3D",1),
					'dateUpdated' => returnDate("P3D",1),
					'orgType' => 'primary'),			
				'amend' => array(
					'telephone' => '01788456789')
				),
			5=> array(
				'when' => array(
					'dateTime' => returnDate("P28D")),
				'what' => array(
					'simpleName' => 'Prescription ready',
					'about' => 'Bisprolol 7.5mg x 60 will be available for collection',
					),
				'who' => array(
					'orgName' => 'Boots Pharmacy'),
				'where' => array(
					'venueName' => 'Boots Pharmacy',
					'address' => array('Rugby Central','High Street','Rugby','Warwickshire'),
					'postcode' => 'CV21 2WE'),
				'meta' => array(
					'type' => 'reminder',
					'hospitalNumber' => null,
					'dateIssued' => returnDate("P220D",1),
					'dateUpdated' => returnDate("P110D",1),
					'orgType' => 'pharmacy',
					)
				),		
			6=> array(
				'when' => array(
					'dateTime' => date('c',strtotime (date('Y').'-10-01')),
					'notDateSpecific' => true),
				'what' => array(
					'simpleName' => 'Get your flu jab',
					'about' => 'As you are at higher risk of being affected by flu, the Chief Medical Officer recommends you get a flu jab.',
					'moreInfoURL' => 'https://www.nhs.uk/conditions/vaccinations/flu-influenza-vaccine/'),
				'who' => array(
					'orgName' => 'NHS England'),
				'meta' => array(
					'type' => 'advice',
					'dateIssued' => date('Y').'-01-01',
					'dateUpdated' => date('Y').'-01-01',
					'orgType' => 'national'
					)
				),
			),
		),
	'jamie' => array (
		'person' => array('name' => 'Jamie',
				'nhsNumber' =>'576 123 9753'),
		'appointments' => array(
			1=> array(
				'when' => array(
					'arriveBefore' => 15,
					'dateTime' =>  returnDate('P33DT12H05M'),
					),
				'what' => array(
					'simpleName' => 'Opthamology',
					),
				'who' => array(
					'role' => 'opthamologist',
					'orgName' => 'Coventry and Warwickshire University Hospitals Trust'),
				'where' => array(
					'venueName' => 'Coventry University Hospital',
					'department' => 'Room 57',
					'address' => array('Clifford Bridge Rd', 'Coventry'),
					'postcode' => 'CV2 2DX'),
				'meta' => array(
					'type' => 'outpatientAppointment',
					'hospitalNumber' => 234242,
					'dateIssued' => returnDate('P33D',1),
					'dateUpdated' => returnDate('P33D',1),
					'orgType' => 'acute',
					'orgId' => 'COV',
					'clinicId' => 'Paedatric opthamologist'),			
				'amend' => array(
					'telephone' => '024 7696 4000'),
				'transport' => array(
					'telephone' => '024 7696 4000',
					'bookBefore' => '72'),
				'notices' => array(
					'warnings' => array('dna'),
					'before' => NULL,
					'after' => NULL
					)
				)
			)
		),
	'jessica' => array (
		'person' => array('name' => 'Jessica',
				'nhsNumber' =>'973 456 2454'),
		'appointments' => array(
			1=> array(
				'when' => array(
					'dateTime' => returnDate('P72DT16H50M'),
					),
				'what' => array(
					'simpleName' => 'Health Visitor review',
					'about' => 'A 9 month review on progress.',
					),
				'who' => array(
					'personName' => 'Lisa Smithson',
					'role' => 'Health Vistor',
					'orgName' => 'Rugby Community Health Centre'),
				'where' => array(
					'venueName' => 'Rugby Community Health Centre',
					'department' => 'Child Health Team',
					'address' => array('Hillmorton Road','Rugby','Warwickshire'),
					'postcode' => 'CV21 3VT'),
				'meta' => array(
					'type' => 'appointment',
					'dateIssued' => returnDate('P14D',1),
					'dateUpdated' => returnDate('P12D',1),
					'orgType' => 'primary'
					),			
				'amend' => array(
					'telephone' => '01788676768')
				)
			)
		)
	);

$who = strtolower($_SERVER['QUERY_STRING']);
if (array_key_exists($who,$array)) {
	echo json_encode($array[$who], JSON_PRETTY_PRINT);
	}
?>
