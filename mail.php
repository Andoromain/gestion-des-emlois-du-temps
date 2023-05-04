<?php
require('phpmailer/class.phpmailer.php');
 if(isset($_POST["reponse"])){
    
 
$mail = new PHPMailer();
$mail->Host = 'mail.facmedfianar.mg';
$mail->SMTPAuth   = true;
$mail->Port = 587; // Par défaut
 
// Authentification
$mail->Username = "facmedfi@facmedfianar.mg";
$mail->Password = "ax05X3LPFav![3";
 
// Expéditeur
$mail->SetFrom('facmedfi@facmedfianar.mg', 'Faculté de Medecine CHU Tambohobe Fianarantsoa');
// Destinataire
$mail->AddAddress($_POST["email"]);
// Objet
$mail->Subject = 'Notification';
$mail->Debugoutput = 'html';
$mail->IsHTML(true);

$mail->AddEmbeddedImage('assets/img/univ.jpg','logoUniv', 'univ.jpg');
$mail->AddEmbeddedImage('assets/img/faclogo.jpg','logoFac', 'logoFac.jpg');

$mail->Body ='
    <div class="row" style="display: flex;flex-wrap: wrap;margin-left:20%;">
        <div class="col-md-6" style="font-family: -apple-system,BlinkMacSystemFont;font-size: 1rem;font-weight: 400;line-height: 1.5;color:#212529;text-align: left;position: relative;width: 100%;min-height: 1px;padding-right: 15px;padding-left: 15px;flex: 0 0 50%;max-width: 75%;min-width:50%;">
            <div class="serviceBox green" style="font-family: -apple-system,BlinkMacSystemFont;font-size: 1rem;font-weight: 400;line-height: 1.5;color:#212529;padding: 10px 0 30px;text-align: center;background:rgba(242,242,242,0.58);">
                <div class="service-icon" style="height: 60px;background: #27284f;padding: 10px 10px;"><img style="width: 40px;float: right;border-radius:20px;border-style: none;" src="cid:logoUniv" ><img src="cid:logoFac" style="width: 40px;float: left;border-radius:20px;border-style: none;">
                    <h3 style="font-family: initial;color: #CED0D0;padding-top: 6px;z-index: 2;font-size: 1.75rem;margin-bottom: .5rem;font-weight: 500;margin-top: 0;line-height: 1.2;">Faculté de Médecine Fianarantsoa</h3>
                </div>
                <div class="service-content" style="z-index: 4;padding: 0 50px;color:#6c6060;">
                    <h3 style="margin-bottom: .5rem;font-family: inherit;font-weight: 500;line-height: 1.2;color: inherit;font-size: 22px;text-transform: uppercase;">Notification de Votre &nbsp;compte</h3>
                    <hr style="box-sizing: content-box;overflow: visible;"><br>
                    <p style="font-size: 14px;text-align: justify;margin-top: 0;margin-bottom: 1rem;font-family: -apple-system,BlinkMacSystemFont;font-weight: 400;line-height: 1.5;">'.$_POST["reponse"].'</p>
                </div>
                <div><a href="https://www.facmedfianar.mg" style="font-size: 11px;text-decoration: underline;color: #007bff;background-color: transparent;">Visiter notre site</a><span>&nbsp; | &nbsp;</span><a href="https://www.facmedfianar.mg/loginEnseignant.php" style="font-size: 11px;text-decoration: underline;color: #007bff;background-color: transparent;">entrer sur votre compte</a><span>&nbsp; | &nbsp;</span><a href="#" style="font-size: 11px;text-decoration: underline;color: #007bff;background-color: transparent;">Aide ?</a>
                    <p style="font-size: 10px;margin-top: 0;margin-bottom: 1rem;">copyrigtht&nbsp;<i class="icon ion-at">@</i>&nbsp;&nbsp;facmedfianar  2020&nbsp;</p>
                </div>
            </div>
        </div>
    </div>';
// Envoi du mail avec gestion des erreurs
if(!$mail->Send()) {
  echo 'Erreur : ' . $mail->ErrorInfo;
} else {
  echo 'Message envoyé !';
} 
  }
?>