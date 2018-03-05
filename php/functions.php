<?php
    function print_nice($arr){
            echo "<pre>";
            print_r($arr);
            echo "</pre>";
    }
    function generateRandomPassword(){
        $factory = new RandomLib\Factory;
        $generator = $factory->getGenerator(new SecurityLib\Strength(SecurityLib\Strength::HIGH));
        $randomString = $generator->generateString(32, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/!#$%&()* +,-.:;<=>?@[\]^_`{|}~[]{}<>');
        return $randomString;
    }
    function getReceiverAuxFunction($email, $name){
        $gen_array = array();
        for($i=0; $i<sizeof($email); $i++){
            $pers_array = array();
            $pers_array['receiver_email'] = $email[$i];
            $pers_array['receiver_name'] = $name[$i];
            array_push($gen_array,$pers_array);
        }
        return $gen_array;
    }
    function getReceiverForMail($email, $name){
        if(!is_array($email) && !is_array($name)){
            $gen_array = array();
            $pers_array = array();
            $pers_array['receiver_email'] = $email;
            $pers_array['receiver_name'] = $name;
            array_push($gen_array,$pers_array);
            return $gen_array;
        }else if(!is_array($email) || !is_array($name)){
            return "Error: one of the parameters is an array, and the other not!";
        }else{
            if(sizeof($email) !== sizeof($name)){
                return "Error: both parameters are arrays, but one has more values than the other!";
            }else{
                return getReceiverAuxFunction($email, $name);
            }
        }
    }
    function createEmailHTMLBody($message){
        $body = "<!DOCTYPE html>"
                . "<html>"
                    . "<head>"
                        . "<style>"
                                . "h1{color:magenta}"
                        . "</style>"
                    . "</head>"
                    . "<body>"
                        . $message
                    . "</body>"
                . "</html>";
        return $body;
    }
	function sendMailWithoutName($to, $subject, $message, $from = false){
		require_once(__DIR__.'/../vendor/phpmailer/phpmailer/PHPMailerAutoload.php');

        $mail = new PHPMailer;

        //$mail->SMTPDebug = 3;                // Enable verbose debug output
        $mail->isSMTP();                       // Set mailer to use SMTP
        $mail->SMTPAuth = true;                // Enable SMTP authentication
        $mail->Host = SMTP_SERVER;             // Specify main and backup SMTP servers
        $mail->Username = SMTP_USERNAME;       // SMTP username
        $mail->Password = SMTP_PASS;           // SMTP password
        //$mail->SMTPSecure = SMTP_ENCRYPTION;   // Enable TLS encryption, `ssl` also accepted
        $mail->Port = SMTP_PORT;               // TCP port to connect to
        $mail->isHTML(true);                   // Set email format to HTML
		$mail->SMTPOptions = array(
			'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true
			)
		);
		$mail->addAddress($to);
        ($from?$mail->setFrom($from['sender_email'], $from['sender_name']):$mail->setFrom('no-reply@kiwiagency.ro', 'Echipa Kiwi'));
        $mail->Subject = ($subject != ''?$subject:'Subiect Implicit');
        $body = createEmailHTMLBody($message);
        $mail->Body    = $body;
        $mail->AltBody = $message;

        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
            return false;
        } else {
            return true;
        }
	}
    function sendMail($to, $subject, $message, $from = false, $cc=false, $bcc=false){
		require_once(__DIR__.'/../vendor/phpmailer/phpmailer/PHPMailerAutoload.php');

        $mail = new PHPMailer;

        //$mail->SMTPDebug = 3;                // Enable verbose debug output
        $mail->isSMTP();                       // Set mailer to use SMTP
        $mail->SMTPAuth = true;                // Enable SMTP authentication
        $mail->Host = SMTP_SERVER;             // Specify main and backup SMTP servers
        $mail->Username = SMTP_USERNAME;       // SMTP username
        $mail->Password = SMTP_PASS;           // SMTP password
        //$mail->SMTPSecure = SMTP_ENCRYPTION;   // Enable TLS encryption, `ssl` also accepted
        $mail->Port = SMTP_PORT;               // TCP port to connect to
        $mail->isHTML(true);                   // Set email format to HTML
		$mail->SMTPOptions = array(
			'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true
			)
		);

        if(sizeof($to)==1){
            $mail->addAddress($to[0]['receiver_email'], $to[0]['receiver_name']);     // Add a recipient
        }else if(sizeof($to)>1){
            foreach($to as $receiver){
                $mail->addAddress($receiver['receiver_email'], $receiver['receiver_name']);
            }
        }else{
            return false;
        }
        ($from?$mail->setFrom($from['sender_email'], $from['sender_name']):$mail->setFrom('no-reply@kiwiagency.ro', 'Echipa Kiwi'));
        if($cc) {$mail->addCC($cc);}
        if($bcc) {$mail->addBCC($bcc);}
        $mail->Subject = ($subject != ''?$subject:'Subiect Implicit');
        $body = createEmailHTMLBody($message);
        $mail->Body    = $body;
        $mail->AltBody = $message;

        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
            return false;
        } else {
            return true;
        }
    }
//    $to = getReceiverForMail('alex@kiwiagency.ro', 'CoAmA');
//    $subject = "testing";
//    $message = "testing message<br />merry <h1>Christmas</h1>";
//    sendMail($to, $subject, $message);
    function sterializeString($string){
        $new_string = strtolower($string);
        $new_string = str_replace(" ", "_", $new_string);
        return $new_string;
    }
    function unsterializeString($string){
        $new_string = ucfirst($string);
        $new_string = str_replace("_", " ", $new_string);
        return $new_string;
    }
    function sendMessagesToManuNumbers($user_id,$list_id,$message,$device){
        require_once 'php/classes/SmsGateway.php';
        require_once 'php/classes/Contact.php';
        $Contact = new Contact($user_id, $list_id);
        $contacts = $Contact->getContacts();
        $SmS = new SmsGateway(SMS_GATEWAY_EMAIL, SMS_GATEWAY_PASSWORD);
        foreach($contacts as $contact){
            $SmS->sendMessageToManyNumbers($contact['contact_nr'], $message, $device, $options=[]);
        }
    }