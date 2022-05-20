<?php
// header("Content-type:application/json");
date_default_timezone_set('Europe/London');

$array = array(
	'olly' => array (
		'person' => array('name' => 'Olly',
				'nhsNumber' =>'426 555 6789',
				'dateOfBirth' => '1977-06-01'),
		'appointments' => array(
			1=> array(
				'when' => array(
					'arriveBefore' => 20,
					'dateTime' =>  date('c',strtotime ('2019-02-15 14:40')),
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
					'dateIssued' => '2018-12-01',
					'dateUpdated' => '2018-12-01',
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
					'dateTime' =>  date('c',strtotime ('2019-03-11 09:45')),
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
					'dateIssued' => '2018-09-01',
					'dateUpdated' => '2018-12-01',
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
					'dateTime' =>  date('c',strtotime ('2019-02-05 12:30')),
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
					'dateIssued' => '2018-11-01',
					'dateUpdated' => '2018-11-01',
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
					'dateTime' => date('c',strtotime ('2019-01-14 09:30')),
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
					'dateIssued' => '2018-12-17',
					'dateUpdated' => '2018-12-17',
					'orgType' => 'primary'),			
				'amend' => array(
					'telephone' => '01788456789')
				),
			5=> array(
				'when' => array(
					'dateTime' => date('c',strtotime ('2019-01-21'))),
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
					'dateIssued' => '2018-12-17',
					'dateUpdated' => '2018-12-17',
					'orgType' => 'pharmacy',
					)
				),		
			6=> array(
				'when' => array(
					'dateTime' => date('c',strtotime ('2019-01-01')),
					'notDateSpecific' => true),
				'what' => array(
					'simpleName' => 'Get your flu jab',
					'about' => 'As you are at higher risk of being affected by flu, the Chief Medical Officer recommends you get a flu jab.',
					'moreInfoURL' => 'https://www.nhs.uk/conditions/vaccinations/flu-influenza-vaccine/'),
				'who' => array(
					'orgName' => 'NHS England'),
				'meta' => array(
					'type' => 'advice',
					'dateIssued' => '2018-07-01',
					'dateUpdated' => '2018-07-01',
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
					'dateTime' =>  date('c',strtotime ('2019-07-19 10:00')),
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
					'dateIssued' => '2018-12-15',
					'dateUpdated' => '2018-12-16',
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
					'dateTime' => date('c',strtotime ('2019-05-31 10:30')),
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
					'dateIssued' => '2018-11-30',
					'dateUpdated' => '2018-12-05',
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
