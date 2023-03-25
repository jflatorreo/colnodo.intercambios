<?php

require '../vendor/phpmailer/phpmailer/class.phpmailer.php';
require '../vendor/autoload.php';

// ok url
if(isset($_POST['ok_url'])) {
    $url= $_POST['ok_url'];
    } else {
    $url = "";
    }
    
    
    if(isset($_POST['url_img'])) {
    $url_img= $_POST['url_img'];
    } else {
    $url_img = "";
    }
    
    // informacion de publicación
    //id publicacion
    if (isset($_POST['idpublicacion'])) {
    $idpublicacion= $_POST['idpublicacion'];
    } else {
    $idpublicacion = "";
    }
    
    //numero corto de publicación  _#SITEM_ID
    if (isset($_POST['numpublicacion'])) {
    $numpublicacion= $_POST['numpublicacion'];
    } else {
    $numpublicacion = "";
    }
    
    //titulo de la publicación
    if (isset($_POST['titulopublicacion'])) {
    $titulopublicacion= $_POST['titulopublicacion'];
    } else {
    $titulopublicacion = "";
    }
    
    
    //titulo de la publicación
    if (isset($_POST['urlpublicacion'])) {
      $urlpublicacion= $_POST['urlpublicacion'];
      } else {
      $urlpublicacion = "";
      }
    
    
    // información de usuario que crea el comentario
    //correo de usuario que crea el comentario
    if (isset($_POST['correousuario'])) {
    $correousuario= $_POST['correousuario'];
    } else {
    $correousuario = "";
    }
    
    //correo de usuario que crea el comentario
    if (isset($_POST['nombreusuario'])) {
    $nombreusuario= $_POST['nombreusuario'];
    } else {
    $nombreusuario = "";
    }
    
    //id usuario que crea el comentario
    if (isset($_POST['idusuario'])) {
    $idusuario= $_POST['idusuario'];
    } else {
    $idusuario = "";
    }
    
    
    
    // información de usuario que crea la publicación
    //correo de usuario que crea la publicación
    if (isset($_POST['correopublicacion'])) {
      $correopublicacion= $_POST['correopublicacion'];
      } else {
      $correopublicacion = "";
      }
      
      //correo de usuario que crea la publicación
      if (isset($_POST['nombreusuariopub'])) {
      $nombreusuariopub= $_POST['nombreusuariopub'];
      } else {
      $nombreusuariopub = "";
      }
    
    
    // información de usuario que esta interesado
    //correo de usuario que esta interesado
    if (isset($_POST['correofertante'])) {
      $correofertante= $_POST['correofertante'];
      } else {
      $correofertante = "";
      }
      
      //correo de usuario que esta interesado
      if (isset($_POST['nombreofertante'])) {
      $nombreofertante= $_POST['nombreofertante'];
      } else {
      $nombreofertante = "";
      }
     
    
    //información del comentario (si existe)
    //si es nuevo no existe un id
    if(isset($_POST['idcomentario'])) {
      $idcomentario= $_POST['idcomentario'];
      } else {
      $idcomentario = "";
      }
    
    //comentario nuevo o respuestas a comentario N o R
    if (isset($_POST['tipocom'])) {
    $tipocom= $_POST['tipocom'];
    } else {
    $tipocom = "";
    }
    
    
    if (isset($_POST['descripcioncomentario'])) {
    $descripcioncomentario= nl2br(html_entity_decode($_POST['descripcioncomentario']));
    } else {
    $descripcioncomentario = "";
    }
    
    if (isset($_POST['texantcom'])) {
    $texantcom= nl2br(html_entity_decode($_POST['texantcom']));
    } else {
    $texantcom = "";
    }

   //echo=$tipocom;

   if($tipocom=='N'){
    
    $valormen='
    <tr>
    <td style="background:#c6d30d; padding:10px 20px;">
    <h3> Nuevo comentario sobre la publicación ' .$titulopublicacion.'</h3>
    </td>
    <tr>
    <td>
    <table width="100%" border="0" cellspacing="0" cellpadding="20">
    <tbody>
    <tr>
    <td>
    <h4 style="margin:10px 0 30px 0; color:#759E12;">Se ha registrado un nuevo comentario a su solicitud</h4>
    
    <p>Para revisar la información  por favor visita tu perfil en <a href="https://poliniza.redescomunitarias.co/" target="_blank" style="color:#F1941B; font-weight:bold;">este enlace.</a>  Recuerda ingresar con tu usuario y contraseña.</p>
    <p>Por favor no respondas a este correo.</p>
    </td>
    </tr>';
    
    $respuestacomentarioant="";
    }else{
       // echo=$respuestacomentarioant;
    $valormen='
    <tr>
    <td style="background:#c6d30d; padding:10px 20px;">
    <h3> Respuesta a su comentario sobre la publicación ' .$titulopublicacion.'</h3>
    </td>
    <tr>
    <td>
    <table width="100%" border="0" cellspacing="0" cellpadding="20">
    <tbody>
    <tr>
    <td>
    <h4 style="margin:50px 0 30px 0; color:#1a61aa;">Se ha dado respuesta a su comentario </h4>
    <p>Para revisar la información por favor <a href="'.$urlpublicacion.'" target="_blank">visite este link</a> debe antes ingresar con su nombre de usuario y contraseña.</p>
    </td>
    </tr>';
    $respuestacomentarioant='<tr>
    <td style="border-top:1px solid #DEDAD4;">
    <p><em>'.$nombreofertante.'</em></p>
    <h5>Comentario: </h5><p>'.$texantcom.'</p>
    </td>
    </tr>';
    }
    

$mensaje = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- NAME: 1 COLUMN -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Solicitud Finalizada</title>

<style type="text/css">
body,#bodyTable,#bodyCell{
height:100% !important;
margin:0;
padding:0;
width:100% !important;
}
table{
border-collapse:collapse;
}
img,a img{
border:0;
outline:none;
text-decoration:none;
}
h1,h2,h3,h4,h5,h6{
margin:0;
padding:0;
}
p{
margin:1em 0;
padding:0;
}
a{
word-wrap:break-word;
}
.ReadMsgBody{
width:100%;
}
.ExternalClass{
width:100%;
}
.ExternalClass,.ExternalClass p,.ExternalClass span,.ExternalClass font,.ExternalClass td,.ExternalClass div{
line-height:100%;
}
table,td{
mso-table-lspace:0pt;
mso-table-rspace:0pt;
}
#outlook a{
padding:0;
}
img{
-ms-interpolation-mode:bicubic;
}
body,table,td,p,a,li,blockquote{
-ms-text-size-adjust:100%;
-webkit-text-size-adjust:100%;
}
#templatePreheader,#templateHeader,#templateBody,#templateFooter{
min-width:100%;
}
#bodyCell{
padding:20px;
}
.mcnImage{
vertical-align:bottom;
}
.mcnTextContent img{
height:auto !important;
}
/*
@tab Page
@section background style
@tip Set the background color and top border for your email. You may want to choose colors that match your branding.
*/
body,#bodyTable{
/*@editable*/background-color:#1E4A49;
}
/*
@tab Page
@section background style
@tip Set the background color and top border for your email. You may want to choose colors that match your company.
*/
#bodyCell{
/*@editable*/border-top:0;
}
/*
@tab Page
@section email border
@tip Set the border for your email.
*/
#templateContainer{
/*@editable*/border:0;
}
/*
@tab Page
@section heading 1
@tip Set the styling for all first-level headings in your emails. These should be the largest of your headings.
@style heading 1
*/
h1{
/*@editable*/color:#606060 !important;
display:block;
/*@editable*/font-family:Helvetica;
/*@editable*/font-size:40px;
/*@editable*/font-style:normal;
/*@editable*/font-weight:bold;
/*@editable*/line-height:125%;
/*@editable*/letter-spacing:-1px;
margin:0;
/*@editable*/text-align:left;
}
/*
@tab Page
@section heading 2
@tip Set the styling for all second-level headings in your emails.
@style heading 2
*/
h2{
/*@editable*/color:#404040 !important;
display:block;
/*@editable*/font-family:Helvetica;
/*@editable*/font-size:26px;
/*@editable*/font-style:normal;
/*@editable*/font-weight:bold;
/*@editable*/line-height:125%;
/*@editable*/letter-spacing:-.75px;
margin:0;
/*@editable*/text-align:left;
}
/*
@tab Page
@section heading 3
@tip Set the styling for all third-level headings in your emails.
@style heading 3
*/
h3{
/*@editable*/color:#000;
display:block;
/*@editable*/font-family:Helvetica;
/*@editable*/font-size:16px;
/*@editable*/font-style:normal;
/*@editable*/font-weight:bold;
/*@editable*/line-height:125%;
/*@editable*/letter-spacing:-.5px;
margin:0;
/*@editable*/text-align:left;
}
/*
@tab Page
@section heading 4
@tip Set the styling for all fourth-level headings in your emails. These should be the smallest of your headings.
@style heading 4
*/
h4{
/*@editable*/color:#39393A;
display:block;
/*@editable*/font-family:Helvetica;
/*@editable*/font-size:16px;
/*@editable*/font-style:normal;
/*@editable*/font-weight:bold;
/*@editable*/line-height:125%;
/*@editable*/letter-spacing:normal;
margin:0;
/*@editable*/text-align:left;
}

h5{
/*@editable*/color:#39393A !important;
display:block;
/*@editable*/font-family:Helvetica;
/*@editable*/font-size:15px;
/*@editable*/font-style:normal;
/*@editable*/font-weight:bold;
/*@editable*/line-height:125%;
/*@editable*/letter-spacing:normal;
margin:0 0 0px 0;
/*@editable*/text-align:left;

}
/*
@tab Preheader
@section preheader style
@tip Set the background color and borders for your email preheader area.
*/
#templatePreheader{
/*@editable*/background-color:#FFFFFF;
/*@editable*/border-top:0;
/*@editable*/border-bottom:0;
}
/*
@tab Preheader
@section preheader text
@tip Set the styling for your email preheader text. Choose a size and color that is easy to read.
*/
.preheaderContainer .mcnTextContent,.preheaderContainer .mcnTextContent p{
/*@editable*/color:#39393A;
/*@editable*/font-family:Helvetica;
/*@editable*/font-size:11px;
/*@editable*/line-height:125%;
/*@editable*/text-align:left;
}
/*
@tab Preheader
@section preheader link
@tip Set the styling for your email header links. Choose a color that helps them stand out from your text.
*/
.preheaderContainer .mcnTextContent a{
/*@editable*/color:#606060;
/*@editable*/font-weight:normal;
/*@editable*/text-decoration:underline;
}
/*
@tab Header
@section header style
@tip Set the background color and borders for your email header area.
*/
#templateHeader{
/*@editable*/background-color:#FFFFFF;
/*@editable*/border-top:0;
/*@editable*/border-bottom:0;
}
/*
@tab Header
@section header text
@tip Set the styling for your email header text. Choose a size and color that is easy to read.
*/
.headerContainer .mcnTextContent,.headerContainer .mcnTextContent p{
/*@editable*/color:#39393A;
/*@editable*/font-family:Helvetica;
/*@editable*/font-size:15px;
/*@editable*/line-height:150%;
/*@editable*/text-align:left;
}
/*
@tab Header
@section header link
@tip Set the styling for your email header links. Choose a color that helps them stand out from your text.
*/
.headerContainer .mcnTextContent a{
/*@editable*/color:#333;
/*@editable*/font-weight:normal;
/*@editable*/text-decoration:underline;
}
/*
@tab Body
@section body style
@tip Set the background color and borders for your email body area.
*/
#templateBody{
/*@editable*/background-color:#ffffff;
/*@editable*/border-top:0;
/*@editable*/border-bottom:0;
}
/*
@tab Body
@section body text
@tip Set the styling for your email body text. Choose a size and color that is easy to read.
*/
.bodyContainer .mcnTextContent,.bodyContainer .mcnTextContent p{
/*@editable*/color:#39393A;
/*@editable*/font-family:Helvetica;
/*@editable*/font-size:14px;
/*@editable*/line-height:150%;
/*@editable*/text-align:left;
}
/*
@tab Body
@section body link
@tip Set the styling for your email body links. Choose a color that helps them stand out from your text.
*/
.bodyContainer .mcnTextContent a{
/*@editable*/color:#1a61aa;
/*@editable*/font-weight:normal;
/*@editable*/text-decoration:none;
}

.bodyContainer .mcnTextContent a:hover,
.bodyContainer .mcnTextContent a:focus
{
/*@editable*/text-decoration:underline;
}
/*
@tab Footer
@section footer style
@tip Set the background color and borders for your email footer area.
*/
#templateFooter{
/*@editable*/background-color:#FFFFFF;
/*@editable*/border-top:0;
/*@editable*/border-bottom:0;
}
/*
@tab Footer
@section footer text
@tip Set the styling for your email footer text. Choose a size and color that is easy to read.
*/
.footerContainer .mcnTextContent,.footerContainer .mcnTextContent p{
/*@editable*/color:#606060;
/*@editable*/font-family:Helvetica;
/*@editable*/font-size:11px;
/*@editable*/line-height:125%;
/*@editable*/text-align:left;
}
/*
@tab Footer
@section footer link
@tip Set the styling for your email footer links. Choose a color that helps them stand out from your text.
*/
.footerContainer .mcnTextContent a{
/*@editable*/color:#606060;
/*@editable*/font-weight:normal;
/*@editable*/text-decoration:underline;
}
@media only screen and (max-width: 480px){
body,table,td,p,a,li,blockquote{
-webkit-text-size-adjust:none !important;
}

}   @media only screen and (max-width: 480px){
body{
width:100% !important;
min-width:100% !important;
}

}   @media only screen and (max-width: 480px){
td[id=bodyCell]{
padding:10px !important;
}

}   @media only screen and (max-width: 480px){
table[class=mcnTextContentContainer]{
width:100% !important;
}

}   @media only screen and (max-width: 480px){
.mcnBoxedTextContentContainer{
max-width:100% !important;
min-width:100% !important;
width:100% !important;
}

}   @media only screen and (max-width: 480px){
table[class=mcpreview-image-uploader]{
width:100% !important;
display:none !important;
}

}   @media only screen and (max-width: 480px){
img[class=mcnImage]{
width:100% !important;
}

}   @media only screen and (max-width: 480px){
table[class=mcnImageGroupContentContainer]{
width:100% !important;
}

}   @media only screen and (max-width: 480px){
td[class=mcnImageGroupContent]{
padding:9px !important;
}

}   @media only screen and (max-width: 480px){
td[class=mcnImageGroupBlockInner]{
padding-bottom:0 !important;
padding-top:0 !important;
}

}   @media only screen and (max-width: 480px){
tbody[class=mcnImageGroupBlockOuter]{
padding-bottom:9px !important;
padding-top:9px !important;
}

}   @media only screen and (max-width: 480px){
table[class=mcnCaptionTopContent],table[class=mcnCaptionBottomContent]{
width:100% !important;
}

}   @media only screen and (max-width: 480px){
table[class=mcnCaptionLeftTextContentContainer],table[class=mcnCaptionRightTextContentContainer],table[class=mcnCaptionLeftImageContentContainer],table[class=mcnCaptionRightImageContentContainer],table[class=mcnImageCardLeftTextContentContainer],table[class=mcnImageCardRightTextContentContainer]{
width:100% !important;
}

}   @media only screen and (max-width: 480px){
td[class=mcnImageCardLeftImageContent],td[class=mcnImageCardRightImageContent]{
padding-right:18px !important;
padding-left:18px !important;
padding-bottom:0 !important;
}

}   @media only screen and (max-width: 480px){
td[class=mcnImageCardBottomImageContent]{
padding-bottom:9px !important;
}

}   @media only screen and (max-width: 480px){
td[class=mcnImageCardTopImageContent]{
padding-top:18px !important;
}

}   @media only screen and (max-width: 480px){
td[class=mcnImageCardLeftImageContent],td[class=mcnImageCardRightImageContent]{
padding-right:18px !important;
padding-left:18px !important;
padding-bottom:0 !important;
}

}   @media only screen and (max-width: 480px){
td[class=mcnImageCardBottomImageContent]{
padding-bottom:9px !important;
}

}   @media only screen and (max-width: 480px){
td[class=mcnImageCardTopImageContent]{
padding-top:18px !important;
}

}   @media only screen and (max-width: 480px){
table[class=mcnCaptionLeftContentOuter] td[class=mcnTextContent],table[class=mcnCaptionRightContentOuter] td[class=mcnTextContent]{
padding-top:9px !important;
}

}   @media only screen and (max-width: 480px){
td[class=mcnCaptionBlockInner] table[class=mcnCaptionTopContent]:last-child td[class=mcnTextContent]{
padding-top:18px !important;
}

}   @media only screen and (max-width: 480px){
td[class=mcnBoxedTextContentColumn]{
padding-left:18px !important;
padding-right:18px !important;
}

}   @media only screen and (max-width: 480px){
td[class=mcnTextContent]{
padding-right:18px !important;
padding-left:18px !important;
}

}   @media only screen and (max-width: 480px){
/*
@tab Mobile Styles
@section template width
@tip Make the template fluid for portrait or landscape view adaptability. If a fluid layout doesnt work for you, set the width to 300px instead.
*/
table[id=templateContainer],table[id=templatePreheader],table[id=templateHeader],table[id=templateBody],table[id=templateFooter]{
/*@tab Mobile Styles
@section template width
@tip Make the template fluid for portrait or landscape view adaptability. If a fluid layout doesnt work for you, set the width to 300px instead.*/max-width:600px !important;
/*@editable*/width:100% !important;
}

}   @media only screen and (max-width: 480px){
/*
@tab Mobile Styles
@section heading 1
@tip Make the first-level headings larger in size for better readability on small screens.
*/
h1{
/*@editable*/font-size:24px !important;
/*@editable*/line-height:125% !important;
}

}   @media only screen and (max-width: 480px){
/*
@tab Mobile Styles
@section heading 2
@tip Make the second-level headings larger in size for better readability on small screens.
*/
h2{
/*@editable*/font-size:20px !important;
/*@editable*/line-height:125% !important;
}

}   @media only screen and (max-width: 480px){
/*
@tab Mobile Styles
@section heading 3
@tip Make the third-level headings larger in size for better readability on small screens.
*/
h3{
/*@editable*/font-size:18px !important;
/*@editable*/line-height:125% !important;
}

}   @media only screen and (max-width: 480px){
/*
@tab Mobile Styles
@section heading 4
@tip Make the fourth-level headings larger in size for better readability on small screens.
*/
h4{
/*@editable*/font-size:16px !important;
/*@editable*/line-height:125% !important;
}

}   @media only screen and (max-width: 480px){
/*
@tab Mobile Styles
@section Boxed Text
@tip Make the boxed text larger in size for better readability on small screens. We recommend a font size of at least 16px.
*/
table[class=mcnBoxedTextContentContainer] td[class=mcnTextContent],td[class=mcnBoxedTextContentContainer] td[class=mcnTextContent] p{
/*@editable*/font-size:18px !important;
/*@editable*/line-height:125% !important;
}

}   @media only screen and (max-width: 480px){
/*
@tab Mobile Styles
@section Preheader Visibility
@tip Set the visibility of the email preheader on small screens. You can hide it to save space.
*/
table[id=templatePreheader]{
/*@editable*/display:block !important;
}

}   @media only screen and (max-width: 480px){
/*
@tab Mobile Styles
@section Preheader Text
@tip Make the preheader text larger in size for better readability on small screens.
*/
td[class=preheaderContainer] td[class=mcnTextContent],td[class=preheaderContainer] td[class=mcnTextContent] p{
/*@editable*/font-size:14px !important;
/*@editable*/line-height:115% !important;
}

}   @media only screen and (max-width: 480px){
/*
@tab Mobile Styles
@section Header Text
@tip Make the header text larger in size for better readability on small screens.
*/
td[class=headerContainer] td[class=mcnTextContent],td[class=headerContainer] td[class=mcnTextContent] p{
/*@editable*/font-size:15px !important;
/*@editable*/line-height:125% !important;
}

}   @media only screen and (max-width: 480px){
/*
@tab Mobile Styles
@section Body Text
@tip Make the body text larger in size for better readability on small screens. We recommend a font size of at least 16px.
*/
td[class=bodyContainer] td[class=mcnTextContent],
td[class=bodyContainer] td[class=mcnTextContent] p{
/*@editable*/font-size:14px !important;
/*@editable*/line-height:125% !important;
}

td[class=bodyContainer] td[class=mcnTextContent] h5{
/*@editable*/font-size:14px !important;
/*@editable*/line-height:125% !important;
}

}   @media only screen and (max-width: 480px){
/*
@tab Mobile Styles
@section footer text
@tip Make the body content text larger in size for better readability on small screens.
*/
td[class=footerContainer] td[class=mcnTextContent],td[class=footerContainer] td[class=mcnTextContent] p{
/*@editable*/font-size:14px !important;
/*@editable*/line-height:115% !important;
}

}   @media only screen and (max-width: 480px){
td[class=footerContainer] a[class=utilityLink]{
display:block !important;
}

}</style>
<script type="text/javascript">
var w=window;
if(w.performance||w.mozPerformance||w.msPerformance||w.webkitPerformance){var d=document,AKSB=AKSB||{};AKSB.q=[];AKSB.mark=function(a,b){AKSB.q.push(["mark",a,b||(new Date).getTime()])};AKSB.measure=function(a,b,c){AKSB.q.push(["measure",a,b,c||(new Date).getTime()])};AKSB.done=function(a){AKSB.q.push(["done",a])};AKSB.mark("firstbyte",(new Date).getTime());AKSB.prof={custid:"358634",ustr:"ECDHE-RSA-AES256-GCM-SHA384",originlat:0,clientrtt:29,ghostip:"200.14.44.103",
ipv6:false,pct:10,clientip:"190.147.84.154",requestid:"141bf145",protocol:"",blver:7,akM:"x",akN:"ae",akTT:"O",akTX:"1",akTI:"141bf145",ai:"199322",ra:""};(function(a){var b=d.createElement("script");b.async="async";b.src=a;a=d.getElementsByTagName("script");a=a[a.length-1];a.parentNode.insertBefore(b,
a)})(("https:"===d.location.protocol?"https:":"http:")+"//ds-aksb-a.akamaihd.net/aksb.min.js")};
</script>
</head>

<body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">
<center>
<table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
<tr>
<td align="center" valign="top" id="bodyCell">
<!-- BEGIN TEMPLATE // -->
<table border="0" cellpadding="0" cellspacing="0" width="800" id="templateContainer">
<tr>
<td align="center" valign="top">
<!-- BEGIN PREHEADER // -->
<table border="0" cellpadding="0" cellspacing="0" width="600" id="templatePreheader">
<tr>
<td valign="top" class="preheaderContainer" style="padding-top:0px;"></td>
</tr>
</table>
<!-- // END PREHEADER -->
</td>
</tr>

<tr>
<td align="center" valign="top">
<!-- BEGIN HEADER // -->
<table border="0" cellpadding="0" cellspacing="0" width="800" id="templateHeader">
<tr>
<td valign="top" class="headerContainer"></td>
</tr>
</table>
<!-- // END HEADER -->
</td>
</tr>

<tr>
<td align="center" valign="top">
<!-- BEGIN BODY // -->
<table border="0" cellpadding="0" cellspacing="0" width="800" id="templateBody">
<tr>
<td valign="top" class="bodyContainer">
<table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
<tbody class="mcnTextBlockOuter">
<tr>
<td valign="top" class="mcnTextBlockInner" style="padding-top:0px;">
<!--[if mso]>
<table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;">
<tr>
<![endif]-->

<!--[if mso]>
<td valign="top" width="800" style="width:800px;">
<![endif]-->
<table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
<tbody>
<tr>
<td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:0px; padding-bottom:0px; padding-left:0px;">
<table cellpadding="0" cellspacing="0" width="100%">
<tbody>
<tr>
<td height="0" align="left" valign="top"><img src="'.$url_img.'" width="220" height="77" alt="" style="margin:20px;"/></td>
</tr>
'.$valormen.'
<tr>
<td style="border-top:1px solid #DEDAD4;">
<p><em>'.$nombreusuario.'</em></p>
<h5> Comentario: </h5><p>'.$descripcioncomentario.'</p>
</td>
</tr>'.$respuestacomentarioant.'
<tr>
<td style="border-top:1px solid #DEDAD4;">
<h5>Publicación '.$titulopublicacion.': </h5><!-- <p>'.$descripcioncomentario.'</p> -->
</td>
</tr>


<tr>
<td style="border-top:1px solid #DEDAD4;">
<p><em>Atentamente,</em></p>
<em><strong>Equipo Poliniza</strong></em>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td style="padding:0 20px;">
	<p><small>Red Poliniza es una iniciativa de <a style="color:#F1941B; font-weight:bold;" href="#" target="_blank">TROCATURISMO</a></small></p>   <p><small>Desarrollado por Turimetria y <a style="color:#F1941B; font-weight:bold;" href="https://colnodo.apc.org/" target="_blank">Colnodo</a>. Avalada por la <a style="color:#F1941B; font-weight:bold;" href="https://bancostiempoiberoamerica.blogspot.com/" target="_blank">Asociación Iberoamericana de Bancos de Tiempo</a></small></p>	
</td></tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<!--[if mso]>
</td>
<![endif]-->

<!--[if mso]>
</tr>
</table>
<![endif]-->
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</table>
<!-- // END BODY -->
</td>
</tr>

<tr>
<td align="center" valign="top">
<!-- BEGIN FOOTER // -->
<table border="0" cellpadding="0" cellspacing="0" width="600" id="templateFooter">
<tr>
<td valign="top" class="footerContainer" style="padding-bottom:9px;"></td>
</tr>
</table>
<!-- // END FOOTER -->
</td>
</tr>
</table>
<!-- // END TEMPLATE -->
</td>
</tr>
</table>
</center>
</body>
</html>
';

//construccion asunto
if($tipocom=='N'){ 

  $asunto = "Nuevo comentario sobre la publicación ".$titulopublicacion;
  }
  else{
  $asunto = "Respuesta  a su comentario sobre la publicación ".$titulopublicacion;
  }

//llamado de mensaje 
$cuerpomensaje=$mensaje;
//CONSTRUCCION MENSAJE  
$mail = new PHPMailer(); 
$mail->isSMTP();
//$mail->SMTPDebug = 2;
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->Username = 'RedPoliniza@gmail.com';  //CORREO  ASIGANADO
$mail->Password = 'kejckwjugexodfve';       //CONTRASEÑA  VALIDADA DE DOBLE FACTOR
$mail->setFrom('RedPoliniza@gmail.com', 'poliniza');  //correo de donde envia  usuario quien envia 
//$mail->addReplyTo($correousuario);  
$mail->addAddress($correousuario);    //usuario REGISTRADO
//$mail->addBCC($copiaoculta);
//$mail->addCC($copiaoculta);
$mail->isHTML(true); 
$mail->Subject = $asunto;         //asunto del correo 
$mail->CharSet="UTF-8";
//$message= '<p style="float:right;">'.$mensaje.'</p>';
$mail->msgHTML($mensaje);         //envio del asunto 
$mail->send();                    // envio de correo 



//construccion de mensaje del correo y validacion de  datos
if( empty ($asunto) && empty($correousuario) && empty($mensaje) && empty($tipocom) || !$mail->send()){
    echo "<html><head><script>alert('Su mensaje NO ha sido enviado, vuelva a intentarlo');location.href='".$url."';</script></head><body></body></html>";
    
    }else{
    echo 
    "<html>
    
    <head><link rel='shortcut icon' href='/favicon.ico' />
    <meta charset='utf-8'><title>Formulario Publicación</title>
    
    <script type='text/javascript' src='/js/jquery.min.js'></script></head>
    <body>
    <p>Enviando....</p>
    <form method='POST' action='https://poliniza.redescomunitarias.co/apc-aa/filler.php3' id='inputform'>
    <input type='hidden' name='ok_url' value='".$url."'>
    
    <input type='hidden' name='slice_id' value='37cb965907be908f7c8adff8d6fc9d6b'>
    
    <!-- ID publicación comentada -->
    <input type='hidden' name='aa[n1_37cb965907be908f7c8adff8d6fc9d6b][text____________][0]' value='".$idpublicacion."'>
    
    <!-- descripción comentario -->
    <input type='hidden' name='aa[n1_37cb965907be908f7c8adff8d6fc9d6b][abstract________][flag]' value='1' checked=''>
    <input type='hidden' name='aa[n1_37cb965907be908f7c8adff8d6fc9d6b][abstract________][0]' value='".$descripcioncomentario."'>          
    
    <!-- id comentario relacionado -->
    <input type='hidden' name='aa[n1_37cb965907be908f7c8adff8d6fc9d6b][relation_______1][]' value='".$idcomentario."'>  
    
    <!-- Usuario que comenta -->
    <input type='hidden' name='aa[n1_37cb965907be908f7c8adff8d6fc9d6b][relation________][]' value='".$idusuario."'>
    
    </form>
    
    
    <script>
    $( document ).ready(function() {
    document.getElementById('inputform').submit();
    });
    </script>  
    </body></html>";
    
  
  
  }

?>