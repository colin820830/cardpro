<?php

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

$target = $_GET['term'];

// Either an IP or a domain.
$ldaphost = "sygms.syc.com.tw"; $ldapport = 389; 

// Username used to connect to the server
$username = "info2@syc.com.tw";

// Password of the user.
$password = "info5230";

$binddn = "uid=".$username.",o=local,dc=ldap"; 

$ldap_conn = ldap_connect($ldaphost, $ldapport) or die("Could not connect to $ldaphost"); 

ldap_set_option($ldap_conn, LDAP_OPT_PROTOCOL_VERSION, 3) or die ("Could not set LDAP Protocol version");

if ($ldap_conn) { 
	ldap_set_option($ldap_conn, LDAP_OPT_REFERRALS, 0);
    ldap_set_option($ldap_conn, LDAP_OPT_SIZELIMIT, 2000);
    ldap_set_option($ldap_conn, LDAP_OPT_PROTOCOL_VERSION, 3);

    $ldapbind = ldap_bind($ldap_conn, $binddn, $password); 
    

    if ($ldapbind) {
        
        $ldaptree ="ou=All_User, o=address, dc=ldap";

        //$filter= "(&(postaladdress=Amsterdam)(uid=a*)(!(shadowexpire=1)))";
        $filter= "(|(mail=*".$target."*)(sn=*".$target."*))";	
		$justthese = array("ou", "sn", "mail");

		$result = ldap_search($ldap_conn,$ldaptree,$filter ,$justthese) or die ("Error in search query: ".ldap_error($ldap_conn));
        $data = ldap_get_entries($ldap_conn, $result);

        
        $outp = "[";

        for ($i=0; $i<$data["count"]; $i++) {
        	$name = substr($data[$i]["sn"][0],0,strrpos($data[$i]["sn"][0]," "));
        	$mail = $data[$i]["mail"][0];

			if ($outp != "[") {$outp .= ",";}
				//$outp .= '{"label":"'.$name.'  ''.$mail.'",';
				$outp .= '{"label":"'.$name.' '.$mail.'",';
				$outp .= '"value":"'. $mail.'"}';
		}

		$outp .="]";
    }
}   

ldap_close($ldap_conn);

echo($outp);

?>