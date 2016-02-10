<?php
	class Mail{
		public static function Inscription($customer, $password){
			$emailAdresse = $customer->getEmail();
			$subject = 'Votre mot de passe Algobreizh';

			if (strtoupper(substr(PHP_OS,0,3)=='WIN')) { 
			  $eol="\r\n"; 
			} elseif (strtoupper(substr(PHP_OS,0,3)=='MAC')) { 
			  $eol="\r"; 
			} else { 
			  $eol="\n"; 
			};

			$headers = 'From: Team Algobreizh <no-reply@algobreizh.com>'.$eol; 
			$headers .= 'Reply-To: Team Algobreizh <no-reply@algobreizh.com>'.$eol;
			$mime_boundary=md5(time()); 
			$headers .= 'MIME-Version: 1.0'.$eol; 
			$headers .= "Content-Type: multipart/related; boundary=\"".$mime_boundary."\"".$eol;

			$content = 'Bonjour,'.$eol;
			$content .= 'suite à votre demande commerciale auprès de notre plateforme de commande en ligne, nous avons le plaisir de vous faire parvenir vos codes d\'accès au site Algobreizh.'.$eol;
			$content .= 'vous pouvez vous connecter grâce à ce code.'.$eol;
			$content .= 'votre mot de passe :'.$password.$eol;
			$content .= 'Cordialement,'.$eol;
			$content .= 'l\'Équipe Algobrezih'.$eol;

			return mail($emailAdresse, $subject, $content, $headers);
		}
	};