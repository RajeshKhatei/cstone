<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin{

	var $CI;
	
	function admin(){
		date_default_timezone_set('Asia/Calcutta');
		if (!class_exists("phpmailer")) {
			include('lib/class.phpmailer.php');
		}
		$this->CI =& get_instance();
	}
	function nocache() 
	{
	    header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
	    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
	    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
	    header("Cache-Control: post-check=0, pre-check=0", false);
	    header("Pragma: no-cache");
	}
	
	function convert_number_to_words($number) {
    
		$hyphen      = '-';
		$conjunction = ' and ';
		$separator   = ', ';
		$negative    = 'negative ';
		$decimal     = ' point ';
		$dictionary  = array(
			0                   => 'Zero',
			1                   => 'One',
			2                   => 'Two',
			3                   => 'Three',
			4                   => 'Four',
			5                   => 'Five',
			6                   => 'Six',
			7                   => 'Seven',
			8                   => 'Eight',
			9                   => 'Nine',
			10                  => 'Ten',
			11                  => 'Eleven',
			12                  => 'Twelve',
			13                  => 'Thirteen',
			14                  => 'Fourteen',
			15                  => 'Fifteen',
			16                  => 'Sixteen',
			17                  => 'Seventeen',
			18                  => 'Eighteen',
			19                  => 'Nineteen',
			20                  => 'Twenty',
			30                  => 'Thirty',
			40                  => 'Fourty',
			50                  => 'Fifty',
			60                  => 'Sixty',
			70                  => 'Seventy',
			80                  => 'Eighty',
			90                  => 'Ninety',
			100                 => 'Hundred',
			1000                => 'Thousand',
			1000000             => 'Million',
			1000000000          => 'Billion',
			1000000000000       => 'Trillion',
			1000000000000000    => 'Quadrillion',
			1000000000000000000 => 'Quintillion'
		);
		
		if (!is_numeric($number)) {
			return false;
		}
		
		if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
			// overflow
			trigger_error(
				'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
				E_USER_WARNING
			);
			return false;
		}
	
		if ($number < 0) {
			return $negative . $this->convert_number_to_words(abs($number));
		}
		
		$string = $fraction = null;
		
		if (strpos($number, '.') !== false) {
			list($number, $fraction) = explode('.', $number);
		}
		
		switch (true) {
			case $number < 21:
				$string = $dictionary[$number];
				break;
			case $number < 100:
				$tens   = ((int) ($number / 10)) * 10;
				$units  = $number % 10;
				$string = $dictionary[$tens];
				if ($units) {
					$string .= $hyphen . $dictionary[$units];
				}
				break;
			case $number < 1000:
				$hundreds  = $number / 100;
				$remainder = $number % 100;
				$string = $dictionary[$hundreds] . ' ' . $dictionary[100];
				if ($remainder) {
					$string .= $conjunction . $this->convert_number_to_words($remainder);
				}
				break;
			default:
				$baseUnit = pow(1000, floor(log($number, 1000)));
				$numBaseUnits = (int) ($number / $baseUnit);
				$remainder = $number % $baseUnit;
				$string = $this->convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
				if ($remainder) {
					$string .= $remainder < 100 ? $conjunction : $separator;
					$string .= $this->convert_number_to_words($remainder);
				}
				break;
		}
		
		if (null !== $fraction && is_numeric($fraction)) {
			$string .= $decimal;
			$words = array();
			foreach (str_split((string) $fraction) as $number) {
				$words[] = $dictionary[$number];
			}
			$string .= implode(' ', $words);
		}
		
		return $string;
	}
	
	function escapespecialchrs($text){
		return str_replace("'","''",$text);
	}
	
	function send($from,$fromtxt,$to,$sub,$txt){
		$CI =& get_instance();

		$CI =& get_instance();
		$CI->load->library('email');
		$config['protocol'] = 'mail';

		$config['mailtype'] = 'html';
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;
		$CI->email->initialize($config);
		$CI->email->from($from,$fromtxt);
		$CI->email->to($to);
		$CI->email->subject($sub);

		$CI->email->message($txt);
						
		$ret=$CI->email->send();
		return $ret;
	}
	
	function sendmail($from,$fromtxt,$to,$cc,$sub,$txt){		
		
		$sett=$this->CI->centahomemodel->getsettings(1);
		
		$mail = new PHPMailer();
//		
		$mail->IsSMTP(); // set mailer to use SMTP
		
//		$mail->SMTPSecure ="ssl";
//		
		$mail->Host = $sett->row()->host; // specify main and backup server
		
		$mail->Port=$sett->row()->port;
//		
		$mail->SMTPAuth = true; // turn on SMTP authentication
//		
		$mail->Username = $sett->row()->hostUsername; // SMTP username
//		
		$mail->Password = $sett->row()->hostPassword; // SMTP password
//		
		$mail->From = $from==""?$sett->row()->from:$from;
//		
		$mail->FromName = $fromtxt==""?$sett->row()->fromText:$fromtxt;
//		
		$address=explode(",",$to);
//		
		foreach ($address as $t){
			$mail->AddAddress($t); // Email on which you want to send mail
		}
		
		if($cc!=""){
			$addresscc=explode(",",$cc);
	//		
			foreach ($addresscc as $tcc){
				$mail->AddCC($tcc); 
			}
		}//		
		
		//$mail->AddReplyTo('info@photostop.in', 'Info-PhotoSTOP'); //optional
//		
		$mail->IsHTML(true);
//		
		$mail->Subject = $sub;
//		
		$mail->Body = $txt;
//		
		return $mail->Send();
		
	}
	
	function sendmailattachments($from,$fromtxt,$to,$sub,$txt,$path){
		
		$mail = new PHPMailer();
		
		$mail->IsSMTP(); // set mailer to use SMTP
		
		$mail->Host = 'mail.classictelco.com.au'; // specify main and backup server
		
		$mail->SMTPAuth = true; // turn on SMTP authentication
		
		$mail->Username = 'info@classictelco.com.au'; // SMTP username
		
		$mail->Password = 'classic123'; // SMTP password
		
		$mail->From = $from;
		
		$mail->FromName = $fromtxt;
		
		$address=explode(",",$to);
		
		foreach ($address as $t){
			$mail->AddAddress($t); // Email on which you want to send mail
		}
		
		
		$mail->AddReplyTo('info@classictelco.com.au', 'Info'); //optional
		
		$mail->IsHTML(true);
		
		$mail->Subject = $sub;
		
		$mail->Body = $txt;
		
		$mail->AddAttachment($path);
		
		return $mail->Send();
//		$this->CI =& get_instance();
//		$this->CI->load->library('email');
//		$config['protocol'] = 'smtp';
//		$config['smtp_user'] = 'info@classictelco.com.au';
//		$config['smtp_pass'] = 'classic123';
//		$config['mailtype'] = 'html';
//		$config['charset'] = 'iso-8859-1';
//		$config['wordwrap'] = TRUE;
//		$this->CI->email->initialize($config);
//		$this->CI->email->from($from,$fromtxt);
//		$this->CI->email->to($to);
//		$this->CI->email->subject($sub);
//		
//		$this->CI->email->message($txt);
//		
//		$this->CI->email->send();
//		return $this->CI->email->print_debugger();
	}
	function getCustomDate($dateFormat,$date){
		if($date!=""){
			//date_default_timezone_set('UTC');
			return mdate($dateFormat,strtotime(trim($date)));
		}else{
			return "";
		}
		
	}
	
}