<?php

function getContacts($search) {
	$contacts = [
		[
			'first_name' => 'Matthew',
			'last_name' => 'Richardson',
			'username' => 'matthew.richardson',
			'email' => 'matthew.richardson@tnc.com'
		],
		[
			'first_name' => 'Jeff',
			'last_name' => 'Myers',
			'username' => 'jeff.myers',
			'email' => 'jeff.myers@tnc.com'
		],
		[
			'first_name' => 'Jamie',
			'last_name' => 'Brown',
			'username' => 'jamie.brown',
			'email' => 'jamie.brown@tnc.com'
		],
		[
			'first_name' => 'Randy',
			'last_name' => 'Umphlet',
			'username' => 'randy.umphlet',
			'email' => 'randy.umphlet@tnc.com'
		],
		[
			'first_name' => 'Johnny',
			'last_name' => 'Test',
			'username' => 'johnny.test',
			'email' => 'johnny.test@tnc.com'
		],
	];
	$search = strtolower($search);
	if ($search == 'all') {
		return $contacts;
	} else {
		$contact = [];
		foreach($contacts as $key => $person) {
			foreach ($person as $key2 => $info) {
				if (strpos($info, $search) !== FALSE) {
					$contact[] = $person;
					break;
				}
			}
		}
		return $contact;
	}

}
