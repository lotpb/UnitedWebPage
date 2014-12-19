<?php

// NateMail 3.0.15 by Nate Baldwin, www.mindpalette.com - copyright 2007 (last updated November 20, 2007)
@$suppress = error_reporting(0);
unset($recipients);
$badIPs = array();

// -------------------------------------------------------------------------------------------------------------------------------
//   START USER-EDITABLE SETTINGS...
// -------------------------------------------------------------------------------------------------------------------------------

	// LIST OF EMAIL RECIPIENTS...
	$recipients[0] = "Sales@eunitedws.com";
	$recipients[1] = "pbalsamo@optonline.net";
	$recipients[2] = "email_address_here";
	$recipients[3] = "email_address_here";
	$recipients[4] = "email_address_here";
	$recipients[5] = "email_address_here";
	$recipients[6] = "email_address_here";
	$recipients[7] = "email_address_here";
	$recipients[8] = "email_address_here";
	$recipients[9] = "email_address_here";

// ...add as many "$recipients" lines as you need, just give each address a different number inside the [brackets]

// OPTIONAL SETTINGS -------------------------------------------------------------------------------------------------------------
	
	$dateFormat = 1;  	// see options listed below (1, 2 or 3)...
	
	/*
	Date/Time Formatting Options (enter the key number, 1 - 3)...
	1 = "January 4, 2004 @ 6:00 pm";
	2 = "2004-01-04 @ 18:00";
	3 = "4 January 2004, 18:00";
	*/
	
	$replaceUnderscores = true; 	// enter true or false - changes underscores to spaces in field names if true
	$initialCaps = true; 			// enter true or false - capitalizes the first letter of every word in field names if true
	$serverTimeOffset = 0; 			// number of hours to add or subtract from server time to get your local time (-1, +2, 0, etc.)
	$doubleSpaceEmail = true;		// true to double space between fields in email message. false for single space.
	unset($referrerCheck);
	$referrerCheck = true;			// make sure form is on same server as script (recommended - to avoid hacking)
	
	// Styling for Thank You / Confirmation page (in CSS)...
	
	// Page background color and styling for <body> <div> <td> <p>...
	$pageStyle = 'background-color: white';
	
	// Main page text...
	$MPinfo = 'color: black; font-size: 13px; font-family: Verdana, Arial, Helvetica, sans-serif';
	
	// Form field names and values...
	$MPFieldNames = 'color: black; font-weight: bold; font-size: 12px; font-family: Verdana, Arial, Helvetica, sans-serif';
	$MPFieldValues = 'color: #00327d; font-style: normal; font-size: 12px; font-family: Verdana, Arial, Helvetica, sans-serif';
	
	// Headline (Thank You) text...
	$MPthankyou = 'color: #00327d; font-size: 36px; font-family: "Times New Roman", Times, Georgia, serif';
	
	// Sub-Head (sent from and date/time text)...
	$MPsubhead = 'color: #7d8287; font-size: 11px; font-family: Verdana, Arial, Helvetica, sans-serif';
	
	// Error message text...
	$MPerror = 'color: #c80019; font-size: 13px; font-family: Verdana, Arial, Helvetica, sans-serif';
	$MPerrorlist = 'color: #c80019; font-size: 12px; font-family: Verdana, Arial, Helvetica, sans-serif';
	
	// JavaScript back to form text...
	$MPsmall = 'color: black; font-size: 10px; font-family: Verdana, Arial, Helvetica, sans-serif';
	
	// Text links (back to home)...
	$MPlink = 'color: #00327d; font-size: 13px; font-family: Verdana, Arial, Helvetica, sans-serif; text-decoration: none';
	
	// Text link rollovers...
	$MPlink_hover = 'color: #0093ff; font-size: 13px; font-family: Verdana, Arial, Helvetica, sans-serif; text-decoration: underline';
	
	// Credit text...
	$MPcredit = 'color: #7d8287; font-size: 9px; font-family: Verdana, Arial, Helvetica, sans-serif';

// the following optional settings determine the confirmation message the visitors see after a successful submission -------------

	// Thank you / confirmation title...
	$confirmMsgTitle = "Thank You!";
	
	// Thank you / confirmation message text...
	// NOTE: do not change the "[message recipient]" text (though it can be moved)
	// the "[message recipient]" text will be replaced by either the recipient email address, or
	// the value of the "recipient_name" form field. If you want neither, just delete the "[message recipient]" text.
	$confirmMsgText = "Below is the information you submitted to [message recipient]:";

// the following optional settings determine the error message the visitors see when the script finds a problem ------------------

	// error message for when "required" fields are left blank...
	// NOTE: will be followed by list of field names
	$reqErrMsg = "The following REQUIRED field(s) were left empty:";
	
	// error message for when "email_only" fields aren't valid email formats...
	// NOTE: do not change the "[email field]" text (though it can be moved) - will be replaced with offending field name
	$emailErrMsg = "The value entered for [email field] does not appear to be a valid email address.";
	
	// error message for when "numbers_only" fields contain more than just numbers...
	// NOTE: do not change the "[number field]" text (though it can be moved) - will be replaced with offending field name
	$numErrMsg = "The value entered for [number field] can only be numbers.";
	
	// error message for when "letters_only" fields contain more than just numbers...
	// NOTE: do not change the "[letter field]" text (though it can be moved) - will be replaced with offending field name
	$letterErrMsg = "The value entered for [letter field] can only be upper or lower case letters.";
	
	// error message for when "force_match" field entries do not match...
	// NOTE: will be followed by list of field names
	$matchErrMsg = "The following field values must match:";
	
	// error message for if file upload fails for attachment...
	// NOTE: do not change the "[file name]" text (though it can be moved) - will be replaced with failed file name
	$fileErrMsg = "[file_name] failed to be uploaded. Please check file and try again.";
	
	// error message for if file attachment is too large (larger than $attachmentMax size)...
	// NOTE: do not change "[file name]" or "[max size]" text (though it can be moved) - will be replaced with offending field name and max size
	$sizeErrMsg = "An attached file [file name] is over the maximum size ([max size])";
	
	// error message for if the email fails to be sent due to server error...
	$mailErrMsg = "Server Error - the form was processed successfully, but email could not be sent.";
	
	// error message in case MySQL database is down or connection info is incorrect...
	$mysqlErrMsg1 = "Error connecting to MySQL database - settings are incorrect or server is down, sorry.";
	
	// error message in case form data could not be written into the MySQL database...
	$mysqlErrMsg2 = "Error writing form information into database (server error).";
	
	// error message in case form data could not be updated the MySQL database...
	$mysqlErrMsg3 = "Error updating record in database (server error).";
	
	// error message in case form data could not be written into specified text file...
	$textErrMsg = "Form results failed to be saved to text file (server error).";

$le = "\n";		// "\n" for Linux/Unix servers, "\r\n" for Windows servers

// spam guard variables...
$MPSendIP = false;	// true to send IP address of visitor in email
$MPCheckIP = true;	// true to check IP address against blacklisted addresses (below)
$MPHideIP = true;	// true to hide the visitor IP field from the confirmation page
// reject the following IP addresses...
$badIPs[] = '';  // add as many of these lines as you need, IP address between single quotes

// form security settings (supply path to security script if entry is required)
$securityFile = "";
$securityError = "Form security error (security image mismatch or unauthorized form page).";

// -------------------------------------------------------------------------------------------------------------------------------
//   END USER-EDITABLE SETTINGS (you shouldn't have to change the rest of this PHP code, but you're welcome to try)...
// -------------------------------------------------------------------------------------------------------------------------------

// determine global variables based on PHP version...
$MPPostVars = array();
if (is_array($_POST)) $MPPostVars = $_POST;
else if (is_array($HTTP_POST_VARS)) $MPPostVars = $HTTP_POST_VARS;
$MPPostFiles = array();
if (is_array($_FILES)) $MPPostFiles = $_FILES;
else if (is_array($HTTP_POST_FILES)) $MPPostFiles = $HTTP_POST_FILES;
$MPServerVars = array();
if (is_array($_SERVER)) $MPServerVars = $_SERVER;
else if (is_array($HTTP_SERVER_VARS)) $MPServerVars = $HTTP_SERVER_VARS;

// Determine if a form has been submitted to the script yet...
$formSubmitted = false;
if (is_array($MPPostVars)) if (count($MPPostVars) > 0) $formSubmitted = true;

// Set default status for error variable...
$errors = "";
$printHTML = true;

if ($formSubmitted == true) {
	
	// Validate form security if required...
	if ($securityFile) {
		if (file_exists($securityFile)) {
			require_once($securityFile);
			if (!$MPFS->SecurityCheck()) $errors .= $securityError."<br>$le";
			} else $errors .= "Could not locate form security script file.<br>$le";
		}

	// Adjust the server time and build selected date/time text format...
	$adjustedTime = time() + ($serverTimeOffset * 3600);
	if ($dateFormat == 2)
		$dateTime = date("Y-m-d @ H:i", $adjustedTime);
		else if ($dateFormat == 3) $dateTime = date("d F Y, H:i", $adjustedTime);
		else $dateTime = date("F j, Y @ g:i a", $adjustedTime);

// -------------------------------------------------------------------------------------------------------------------------------
//   DECLARE CUSTOM FUNCTIONS...
// -------------------------------------------------------------------------------------------------------------------------------
	
	// Build function for making form field names more readable...
	function MPAdjustFields($thisField) {
		global $replaceUnderscores;
		global $initialCaps;
		if ($replaceUnderscores == true) $thisField = str_replace("_", " ", $thisField);
		if ($initialCaps == true) $thisField = ucwords($thisField);
		return $thisField;
		}
	
	// Build function for comparing referring server to script server...
	function MPCompareServers($thisURL) {
		$thisURL = str_replace("http://", "", $thisURL);
		$thisURL = str_replace("https://", "", $thisURL);
		$thisURL = str_replace("www.", "", $thisURL);
		if ($thisURL != "") $urlArray = explode("/", $thisURL);
		return $urlArray[0];
		}
	
	// Build function for converting array submissions into comma-separated strings, up to 2 levels...
	function MPFixArrays($thisValue) {
		if (is_array($thisValue)) {
			for ($n=0; $n<count($thisValue); $n++) {
				if (isset($thisValue[$n])) {
					if (is_array($thisValue[$n])) $thisValue[$n] = implode(", ", $thisValue[$n]);
					}
				}
			$thisValue = implode(", ", $thisValue);
			}
		return $thisValue;
		}
	
	// Build function for sending form data to redirect page via query string...
	function MPParseRedirectData($thisString) {
		$thisString = stripslashes($thisString);
		$thisString = str_replace("&", "and", $thisString);
		$thisString = str_replace("=", "equals", $thisString);
		$thisString = str_replace("\r\n", "<br>", $thisString);
		$thisString = str_replace("\n", "<br>", $thisString);
		$thisString = str_replace("\r", "<br>", $thisString);
		$thisString = rawurlencode($thisString);
		return $thisString;
		}
	
	// Build function for writing form field names and values into HTML...
	function MPNameValueHTML($thisPair, $fieldCSS, $valueCSS) {
		$thisFieldName = "";
		$thisFieldValue = "";
		if (substr($fieldCSS, 0, 1) == ".") $fieldCSS = substr($fieldCSS, 1);
		if (substr($valueCSS, 0, 1) == ".") $valueCSS = substr($valueCSS, 1);
		if ($thisPair['value'] != "") {
			$thisFieldName = MPAdjustFields(stripslashes($thisPair['key']));
			$thisFieldName = htmlspecialchars($thisFieldName);
			$thisFieldName = str_replace(" ", "&nbsp;", $thisFieldName);
			$thisFieldName = "<span class=\"".$fieldCSS."\">$thisFieldName:</span>";
			$thisFieldValue = stripslashes($thisPair['value']);
			$thisFieldValue = htmlentities($thisFieldValue);
			$thisFieldValue = str_replace("\r\n", "<br>", $thisFieldValue);
			$thisFieldValue = str_replace("\n", "<br>", $thisFieldValue);
			$thisFieldValue = str_replace("\r", "<br>", $thisFieldValue);
			$thisFieldValue = "<span class=\"".$valueCSS."\">$thisFieldValue</span>";
			}
		return array($thisFieldName, $thisFieldValue);
		}
	
	// Build function for writing field name/values into redirect page...
	function MPRedirectHTML($fieldCSS, $valueCSS) {
		global $displayArray;
		if (is_array($displayArray)) {
			if (count($displayArray) > 0) {
				$printHTML = "<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\">$le";
				for ($n=0; $n<count($displayArray); $n++) {
					if ($displayArray[$n]['value'] != "") {
						$htmlPair = MPNameValueHTML($displayArray[$n], $fieldCSS, $valueCSS);
						$printHTML .= "<tr>$le<td align=\"right\" valign=\"top\" nobreak>".$htmlPair[0]."&nbsp;&nbsp;</td>$le";
						$printHTML .= "<td align=\"left\" valign=\"top\">".$htmlPair[1]."</td>$le<tr>$le";
						}
					}
				if ($printHTML != "<table width=\"450\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">$le") {
					$printHTML .= "</table>$le";
					print($printHTML);
					}
				}
			}
		}
	
	// Build function alias for incorrect instructions...
	function redirectHTML($fieldCSS, $valueCSS) {
		MPRedirectHTML($fieldCSS, $valueCSS);
		}
	
	// Build function for adding slashes regardless of "magic quotes"...
	function MPAddSlashes($thisString) {
		$thisString = stripslashes($thisString);
		$thisString = addslashes($thisString);
		return $thisString;
		}
	
	// Build regular expression to check for valid email addresses and number fields...
	$emailPattern = "^[A-Z0-9._-]+@[A-Z0-9._-]+\.[A-Z]{2,4}$";
	$numberPattern = "^[0-9.]+$";
	$letterPattern = "^[A-Za-z]+$";
	
// -------------------------------------------------------------------------------------------------------------------------------
//   TRY TO MAKE SURE WE'RE NOT GETTING HIJACKED...
// -------------------------------------------------------------------------------------------------------------------------------

	unset($recipientString);
	unset($MPSubject);
	unset($MPEmailBody);
	unset($headers);
	unset($formServer);
	unset($thisServer);
	$formServer = isset($MPServerVars['HTTP_REFERER']) ? MPCompareServers($MPServerVars['HTTP_REFERER']) : "";
	$thisServer = isset($MPServerVars['HTTP_HOST']) ? MPCompareServers($MPServerVars['HTTP_HOST']) : "";
	if ($formServer != "" AND $thisServer != "" AND $formServer != $thisServer AND $referrerCheck == true)
		$errors .= "Error receiving form contents - your form must be on the same server as the script.<br>";

// -------------------------------------------------------------------------------------------------------------------------------
//   IMPORT AND PROCESS FORM...
// -------------------------------------------------------------------------------------------------------------------------------

	// Import special formatting fields if used...
	$recipient = (isset($MPPostVars['recipient'])) ? $MPPostVars['recipient'] : "";
	$subject = (isset($MPPostVars['subject'])) ? $MPPostVars['subject'] : "";
	$required = (isset($MPPostVars['required'])) ? $MPPostVars['required'] : "";
	$redirect = (isset($MPPostVars['redirect'])) ? $MPPostVars['redirect'] : "";
	$redirect_type = (isset($MPPostVars['redirect_type'])) ? $MPPostVars['redirect_type'] : "query";
	$sort = (isset($MPPostVars['sort'])) ? $MPPostVars['sort'] : "";
	$exclude = (isset($MPPostVars['exclude'])) ? $MPPostVars['exclude'] : "";
	$exclude_display = (isset($MPPostVars['exclude_display'])) ? $MPPostVars['exclude_display'] : "";
	$exclude_email = (isset($MPPostVars['exclude_email'])) ? $MPPostVars['exclude_email'] : "";
	$force_match = (isset($MPPostVars['force_match'])) ? $MPPostVars['force_match'] : "";
	$recipient_name = (isset($MPPostVars['recipient_name'])) ? $MPPostVars['recipient_name'] : "";
	$sender_name = (isset($MPPostVars['sender_name'])) ? $MPPostVars['sender_name'] : "";
	$sender_email = (isset($MPPostVars['sender_email'])) ? $MPPostVars['sender_email'] : "";
	$numbers_only = (isset($MPPostVars['numbers_only'])) ? $MPPostVars['numbers_only'] : "";
	$letters_only = (isset($MPPostVars['letters_only'])) ? $MPPostVars['letters_only'] : "";
	$email_only = (isset($MPPostVars['email_only'])) ? $MPPostVars['email_only'] : "";
	$uppercase = (isset($MPPostVars['uppercase'])) ? $MPPostVars['uppercase'] : "";
	$lowercase = (isset($MPPostVars['lowercase'])) ? $MPPostVars['lowercase'] : "";
	$link_text = (isset($MPPostVars['link_text'])) ? $MPPostVars['link_text'] : "";
	$link_url = (isset($MPPostVars['link_url'])) ? $MPPostVars['link_url'] : "";
	
	// Attempt to detect and eliminate spamming attempts...
	if (isset($evilFound)) unset($evilFound);
	function MPSeeNoEvil($string) {
		$results = true;
		$string = trim(strtolower($string));
		$string = stripslashes($string);
		$string = str_replace("\r\n", "[evil]", $string);
		$string = str_replace("\r", "[evil]", $string);
		$string = str_replace("\n", "[evil]", $string);
		$string = str_replace("bcc:", "[evil]", $string);
		$string = str_replace("cc:", "[evil]", $string);
		if (stristr($string, '[evil]') !== false) $results = false;
		return $results;
		}
	if (!MPSeeNoEvil($subject)) $errors .= "This submission appears to be a spamming attempt.<br>$li";
	if (!MPSeeNoEvil($recipient_name)) $errors .= "This submission appears to be a spamming attempt.<br>$li";
	if (isset($MPPostVars[$sender_name])) if (!MPSeeNoEvil($MPPostVars[$sender_name]))
		$errors .= "This submission appears to be a spamming attempt.<br>$li";
	if (isset($MPPostVars[$sender_email])) if (!MPSeeNoEvil($MPPostVars[$sender_email]))
		$errors .= "This submission appears to be a spamming attempt.<br>$li";
	$ip = (isset($MPServerVars['REMOTE_ADDR'])) ? $MPServerVars['REMOTE_ADDR'] : '';
	if ($MPSendIP) $MPPostVars['visitor_IP'] = $ip;
	if ($MPCheckIP) {
		if (in_array($ip, $badIPs))
			$errors .= "This IP address ($ip) has been blacklisted due to spamming attempts.<br>$li";
		}
	if ($MPHideIP) {
		if ($exclude_display == '') $exclude_display = 'visitor_IP';
			else $exclude_display .= ', visitor_IP';
		}
	
	// Verify the "recipient" field...
	if ($recipient == "") {
		if ($write_to_mysql == "" AND $write_to_file == "")
			$errors .= "No \"recipient\" field was included, or the \"recipient\" value was empty.<br>$le";
		} else {
		$recipKeys = explode(",", $recipient);
		$recipientArray = array();
		for ($n=0; $n<count($recipKeys); $n++) {
			$thisRecipKey = $recipKeys[$n];
			if ($thisRecipKey != '') {
				$thisRecipValue = $recipients[$thisRecipKey];
				if ($thisRecipValue == "" OR $thisRecipValue == "email_address_here" OR $thisRecipValue == "address@yourdomain.com")
					$errors .= "No email address was found in the recipients list with key number \"$thisRecipKey\"<br>$le";
					else $recipientArray[] = $thisRecipValue;
				}
			}
		if (count($recipientArray) < 1)
			$errors .= "No \"recipient\" field was included, or the \"recipient\" value was empty.<br>$le";
		}
	
	// Verify "required" fields if specified...
	if ($required != "") {
		$reqErrors = "";
		$requiredFields = explode(",", $required);
		for ($n=0; $n<count($requiredFields); $n++) {
			$tempName = trim($requiredFields[$n]);
			$last2Chars = substr($tempName, (strlen($tempName)-2), 2);
			if ($last2Chars == "[]") $tempName = substr($tempName, 0, (strlen($tempName)-2));
			$thisReqField = $tempName;
			$fieldValid = false;
			if (isset($MPPostVars[$thisReqField])) {
				if ($MPPostVars[$thisReqField] != "") $fieldValid = true;
				} else if (isset($MPPostFiles[$thisReqField])) {
				if (is_uploaded_file($MPPostFiles[$thisReqField]['tmp_name'])) $fieldValid = true;
				}
			if ($fieldValid == false) $reqErrors .= "<li><span class=\"MPerrorlist\">".MPAdjustFields($thisReqField)."</span></li>$le";
			}
		if ($reqErrors != "") $errors .= $reqErrMsg."<ul class=\"MPerrorlist\">".$reqErrors."&nbsp;</ul>";
		}
	
	// Convert field values to uppercase if specified...
	if ($uppercase != "") {
		$ucFields = explode(",", $uppercase);
		for ($n=0; $n<count($ucFields); $n++) {
			$tempName = trim($ucFields[$n]);
			$last2Chars = substr($tempName, (strlen($tempName)-2), 2);
			if ($last2Chars == "[]") $tempName = substr($tempName, 0, (strlen($tempName)-2));
			if (isset($MPPostVars[$tempName])) {
				$tempValue = strtoupper($MPPostVars[$tempName]);
				$MPPostVars[$tempName] = $tempValue;
				}
			}
		}
	
	// Convert field values to lowercase if specified...
	if ($lowercase != "") {
		$lcFields = explode(",", $lowercase);
		for ($n=0; $n<count($lcFields); $n++) {
			$tempName = trim($lcFields[$n]);
			$last2Chars = substr($tempName, (strlen($tempName)-2), 2);
			if ($last2Chars == "[]") $tempName = substr($tempName, 0, (strlen($tempName)-2));
			if (isset($MPPostVars[$tempName])) {
				$tempValue = strtolower($MPPostVars[$tempName]);
				$MPPostVars[$tempName] = $tempValue;
				}
			}
		}
	
	// Verify formatting for email fields if specified...
	if ($email_only != "") {
		$emailFields = explode(",", $email_only);
		for ($n=0; $n<count($emailFields); $n++) {
			$tempName = trim($emailFields[$n]);
			$last2Chars = substr($tempName, (strlen($tempName)-2), 2);
			if ($last2Chars == "[]") $tempName = substr($tempName, 0, (strlen($tempName)-2));
			if (isset($MPPostVars[$tempName])) {
				$thisTest = $MPPostVars[$tempName];
				if (!eregi($emailPattern, $thisTest)) 
					$errors .= str_replace("[email field]", MPAdjustFields($tempName), $emailErrMsg)."<br>";
				}
			}
		}
	
	// Verify formatting for number fields if specified...
	if ($numbers_only != "") {
		$numberFields = explode(",", $numbers_only);
		for ($n=0; $n<count($numberFields); $n++) {
			$tempName = trim($numberFields[$n]);
			$last2Chars = substr($tempName, (strlen($tempName)-2), 2);
			if ($last2Chars == "[]") $tempName = substr($tempName, 0, (strlen($tempName)-2));
			if (isset($MPPostVars[$tempName])) {
				$thisTest = str_replace(",", "", $MPPostVars[$tempName]);
				if (!eregi($numberPattern, $thisTest)) 
					$errors .= str_replace("[number field]", MPAdjustFields($tempName), $numErrMsg)."<br>";
					else $MPPostVars[$tempName] = $thisTest;
				}
			}
		}
	
	// Verify formatting for letter fields if specified...
	if ($letters_only != "") {
		$letterFields = explode(",", $letters_only);
		for ($n=0; $n<count($letterFields); $n++) {
			$tempName = trim($letterFields[$n]);
			$last2Chars = substr($tempName, (strlen($tempName)-2), 2);
			if ($last2Chars == "[]") $tempName = substr($tempName, 0, (strlen($tempName)-2));
			if (isset($MPPostVars[$tempName])) {
				$thisTest = $MPPostVars[$tempName];
				if (!eregi($letterPattern, $thisTest)) 
					$errors .= str_replace("[letter field]", MPAdjustFields($tempName), $letterErrMsg)."<br>";
				}
			}
		}
	
	// Compare "force_match" fields if specified...
	if ($force_match != "") {
		$allFound = true;
		$matchFields = explode(";", $force_match);
		for ($n=0; $n<count($matchFields); $n++) {
			$tempName = trim($matchFields[$n]);
			$matchFields[$n] = $tempName;
			if ($matchFields[$n] != "") {
				$thisMatchField = trim($matchFields[$n]);
				$thisMatchField = explode(",", $thisMatchField);
				$fieldsMatch = true;
				$matchTest = "";
				for ($i=0; $i<count($thisMatchField); $i++) {
					if ($thisMatchField[$i] != "") {
						$tempName = trim($thisMatchField[$i]);
						$last2Chars = substr($tempName, (strlen($tempName)-2), 2);
						if ($last2Chars == "[]") $tempName = substr($tempName, 0, (strlen($tempName)-2));
						$thisMatchField[$i] = trim($tempName);
						$tempField = $thisMatchField[$i];
						if ($matchTest == "") $matchTest = $MPPostVars[$tempField];
							else {
							$tempValue = (isset($MPPostVars[$tempField])) ? $MPPostVars[$tempField] : "";
							if ($tempValue != $matchTest) $fieldsMatch = false;
							}
						}
					}
				if ($fieldsMatch == false AND is_array($thisMatchField)) {
					$tempString = implode(", ", $thisMatchField);
					$errors .= $matchErrMsg."<br><span class=\"MPerrorlist\">".MPAdjustFields($tempString)."</span><br>";
					}
				}
			}
		}
	
	// Verify and process "sort" field if specified...
	if ($sort != "") {
		$formArray = "";
		$x = 0;
		$sortArray = explode(",", $sort);
		for ($n=0; $n<count($sortArray); $n++) {
			$tempName = trim($sortArray[$n]);
			$last2Chars = substr($tempName, (strlen($tempName)-2), 2);
			if ($last2Chars == "[]") $tempName = substr($tempName, 0, (strlen($tempName)-2));
			$thisPair["key"] = $tempName;
			if (isset($MPPostVars[$thisPair["key"]])) {
				$thisPair["value"] = stripslashes(MPFixArrays($MPPostVars[$thisPair["key"]]));
				$formArray[$x] = $thisPair;
				$x++;
				}
			}
			
		// If no sort order was specified, bring in all form fields in the default order...
		} else {
		reset($MPPostVars);
		$n = 0;
		while($thisPair = each($MPPostVars)) {
			$thisPair["value"] = stripslashes(MPFixArrays($thisPair["value"]));
			$formArray[$n] = $thisPair;
			$n++;
			}
		}
		
	// Strip out "exclude" field names from $formArray...
	$excludeFields = "recipient,redirect,redirect_type,required,sort,exclude,subject,exclude_display,sender_name,sender_email,";
	$excludeFields .= "exclude_email,force_match,recipient_name,write_to_file,force_format,uppercase,lowercase,link_text,link_url,";
	$excludeFields .= "write_to_mysql,mysql_table,mysql_update_field,mysql_update_value,numbers_only,letters_only,email_only,SubmitButtonName,Submit,captcha_entered,captcha_encoded";
	if ($exclude != "") $excludeFields .= ",$exclude";
	$excludeArray = explode(",", $excludeFields);
	$tempArray = array();
	for ($n=0; $n<count($formArray); $n++) {
		$formArray[$n]['key'] = trim($formArray[$n]['key']);
		$excludeHits = false;
		for ($i=0; $i<count($excludeArray); $i++) {
			$tempName = trim($excludeArray[$i]);
			$last2Chars = substr($tempName, (strlen($tempName)-2), 2);
			if ($last2Chars == "[]") $tempName = substr($tempName, 0, (strlen($tempName)-2));
			$excludeArray[$i] = $tempName;
			if ($formArray[$n]['key'] == $excludeArray[$i]) $excludeHits = true;
			}
		if ($excludeHits == false) $tempArray[] = $formArray[$n];
		}
	$formArray = $tempArray;
		
	// Strip out "exclude_display" fields if specified and build display array...
	if ($exclude_display != "") {
		$displayArray = array();
		$exDisArray = explode(",", $exclude_display);
		for ($n=0; $n<count($formArray); $n++) {
			$formArray[$n]['key'] = trim($formArray[$n]['key']);
			$excludeHits = false;
			for ($i=0; $i<count($exDisArray); $i++) {
				$tempName = trim($exDisArray[$i]);
				$last2Chars = substr($tempName, (strlen($tempName)-2), 2);
				if ($last2Chars == "[]") $tempName = substr($tempName, 0, (strlen($tempName)-2));
				$exDisArray[$i] = $tempName;
				if ($formArray[$n]['key'] == $exDisArray[$i]) $excludeHits = true;
				}
			if ($excludeHits == false) $displayArray[] = $formArray[$n];
			}
		} else $displayArray = $formArray;
	
	// Strip out "exclude_email" fields if specified and build email array...
	if ($exclude_email != "") {
		$emailArray = array();
		$exEmailArray = explode(",", $exclude_email);
		for ($n=0; $n<count($formArray); $n++) {
			$formArray[$n]['key'] = trim($formArray[$n]['key']);
			$excludeHits = false;
			for ($i=0; $i<count($exEmailArray); $i++) {
				$tempName = trim($exEmailArray[$i]);
				$last2Chars = substr($tempName, (strlen($tempName)-2), 2);
				if ($last2Chars == "[]") $tempName = substr($tempName, 0, (strlen($tempName)-2));
				$exEmailArray[$i] = $tempName;
				if ($formArray[$n]['key'] == $exEmailArray[$i]) $excludeHits = true;;
				}
			if ($excludeHits == false) $emailArray[] = $formArray[$n];
			}
		} else $emailArray = $formArray;
	
	// If no subject was specified, set it to the default...
	$MPSubject = ($subject == "") ? "Web Form Submission" : stripslashes($subject);
	$headers = "MIME-Version: 1.0$le";
	$headers .= "Content-Type: text/plain; charset=\"iso-8859-1\"$le";
	$headers .= "Content-Transfer-Encoding: 7bit";
	
	if ($errors == "") {
	
		// Send out email if recipients were found...
		if ($recipient != "") {
			$recipientString = implode(", ", $recipientArray);
			$MPEmailBody = "The following information was submitted on $dateTime:$le$le";
			$MPEmailBody .= "-------------------------------------------------------$le$le";
			$emailSepChars = ($doubleSpaceEmail == true) ? "$le$le" : "$le";
			$emailNameVals = "";
			for ($n=0; $n<count($emailArray); $n++) {
				if ($emailArray[$n]['value'] != "") {
					$thisFieldName = MPAdjustFields(stripslashes($emailArray[$n]['key']));
					$thisFieldValue = stripslashes($emailArray[$n]['value']);
					$emailNameVals .= $thisFieldName.": ".$thisFieldValue.$emailSepChars;
					}
				}
			$MPEmailBody .= $emailNameVals;
			$MPEmailBody .= "-------------------------------------------------------$le $le";
			$MPSender = "";
			$sender_email = (isset($MPPostVars[$sender_email])) ? $MPPostVars[$sender_email] : "";
			if ($sender_email != "") $sender_email = (eregi($emailPattern, $sender_email)) ? $sender_email : "";
			$sender_name = (isset($MPPostVars[$sender_name])) ? $MPPostVars[$sender_name] : "";
			if ($sender_email != "") {
				$MPSender = ($sender_name != "") ? stripslashes($sender_name)." <".stripslashes($sender_email).">" : stripslashes($sender_email);
				}
			if ($MPSender != "") $MPSender = "From: $MPSender$le";
			if ($MPForceSender != "") $MPSender = "From: $MPForceSender$le";
			$headers = $MPSender.$headers;
			@$mailStatus = mail($recipientString, $MPSubject, $MPEmailBody, $headers);
			if (!$mailStatus) $errors .= $mailErrMsg."<br>";
			}
		
		// Redirect if specified, adding query string to URL with form results for extraction...
		if ($redirect != "") {
			$printHTML = false;
			if ($redirect_type == "include") {
				include("$redirect");
				} else if ($redirect_type == "query") {
				$queryArray = "";
				$q = 0;
				for ($n=0; $n<count($displayArray); $n++) {
					if ($displayArray[$n]['value'] != "") {
						$queryPair = MPParseRedirectData($displayArray[$n]['key'])."=".MPParseRedirectData($displayArray[$n]['value']);
						if ($queryPair != "=") {
							$queryArray[$q] = $queryPair;
							$q++;
							}
						}
					}
				$redirectPage = "Location: $redirect";
				if (is_array($queryArray)) $redirectPage .= "?".implode("&", $queryArray);			
				header($redirectPage);
				exit;
				} else {
				header("Location: $redirect");
				exit;
				}
			}
		}
	}

// -------------------------------------------------------------------------------------------------------------------------------
//   PRINT HTML FOR DEFAULT AND CONFIRMATION PAGES...
// -------------------------------------------------------------------------------------------------------------------------------

// if not redirecting, start printing HTML response page...
if ($printHTML == true OR $formSubmitted == false) {
	print('<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>

	<head>
		<meta http-equiv="content-type" content="text/html;charset=ISO-8859-1">
		<title>Form Results</title>
		<style type="text/css" media="screen"><!--
body, div, td, p { '.$pageStyle.' }
.MPinfo { '.$MPinfo.' }
.MPFieldNames { '.$MPFieldNames.' }
.MPFieldValues  { '.$MPFieldValues.' }
.MPthankyou   { '.$MPthankyou.' }
.MPerror { '.$MPerror.' }
.MPerrorlist { '.$MPerrorlist.' }
.MPsmall { '.$MPsmall.' }
.MPsubhead { '.$MPsubhead.' }
.MPlink   { '.$MPlink.' }
.MPlink a:link  { '.$MPlink.' }
.MPlink a:visited  { '.$MPlink.' }
.MPlink a:hover { '.$MPlink_hover.' }
.MPcredit { '.$MPcredit.' }
--></style>
	</head>

	<body>
		<div align="center">
			<table border="0" cellspacing="0" cellpadding="0">
				<tr>
		');
					
	// If there were errors, list them...
	if ($errors != "") {
		print("
					<td align=\"left\" valign=\"top\">
					<br>&nbsp;<br><span class=\"MPerror\">$errors</span><br>&nbsp;<br>
					</td>
				</tr>
				<tr>
					<td align=\"center\" valign=\"top\" class=\"MPinfo\">
					[ <span class=\"MPlink\"><a href=\"javascript:history.back();\">back to form</a></span> ]<br>
					&nbsp;<br>
					<span class=\"MPsmall\">(If JavaScript is disabled, use the back button on your browser.)</span><br>
			");
	
	// If no errors were encountered, list emailed results and home link if specified...
		} else if ($formSubmitted == true) {
		if ($recipient == "") $sentTo = "this page";
			else $sentTo = ($recipient_name != "") ? $recipient_name : $recipientString;
		$sentToMsg = str_replace("[message recipient]", $sentTo, $confirmMsgText);
		print("
			<td align=\"center\" valign=\"top\" width=\"570\">
			&nbsp;<br>
			<span class=\"MPthankyou\">$confirmMsgTitle</span><br>
			<span class=\"MPsubhead\">$sentToMsg<br>
			($dateTime)</span><hr>
			<table border=\"0\" cellspacing=\"0\" cellpadding=\"1\">
			");
		for ($n=0; $n<count($displayArray); $n++) {
			if ($displayArray[$n]['value'] != "") {
				$htmlPair = MPNameValueHTML($displayArray[$n], "MPFieldNames", "MPFieldValues");
				$thisFieldName = $htmlPair[0];
				$thisFieldValue = $htmlPair[1];
				print("<tr>$le<td align=\"right\" valign=\"top\" nobreak>".$thisFieldName."&nbsp;&nbsp;</td>$le");
				print("<td align=\"left\" valign=\"top\">".$thisFieldValue."</td>$le<tr>$le");
				}
			}
		print("</table>$le<hr>$le");
		if ($link_url != "" AND $link_url != "http://") {
			if ($link_url == "close") {
				$link_url = "javascript:self.close();";
				if ($link_text == "") $link_text = "close window";
				} else if ($link_url == "back") {
				$link_url = "javascript:history.back();";
				if ($link_text == "") $link_text = "back to form";
				} else {
				if (substr($link_url, 0, 7) != "http://") $link_url = "http://".$link_url;
				$link_text = ($link_text != "") ? $link_text : "back to home";
				}
			print("[ <span class=\"MPlink\"><a href=\"$link_url\">$link_text</a></span> ]<br>$le &nbsp;<br>$le");
			}
		} else {
		print("
			<br>&nbsp;<br><span class=\"MPthankyou\">NateMail 3.0.15 PHP Script</span><br>
			&nbsp;<br>
			[ <span class=\"MPlink\"><a href=\"http://www.mindpalette.com/scripts/formprocessing\">download page</a></span> ]<br>
			");
		}
	print('<br>
						&nbsp;<br>
						<span class="MPcredit">NateMail 3.0.15 by Nate Baldwin, www.mindpalette.com</span><br>
					</td>
				</tr>
			</table>
		</div>
	</body>

</html>');

	}

// -------------------------------------------------------------------------------------------------------------------------------
//   END OF SCRIPT!  NateMail 3.0.15 by Nate Baldwin, www.mindpalette.com - copyright 2006
// -------------------------------------------------------------------------------------------------------------------------------

?>