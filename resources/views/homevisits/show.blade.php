<!DOCTYPE html
PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office"
style="width:100%;font-family:arial, 'helvetica neue', helvetica, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0">

<head>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1" name="viewport">
<meta name="x-apple-disable-message-reformatting">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="telephone=no" name="format-detection">
<title>Visita Domiciliaria | {{$visita->rel_empleado->name.' '.$visita->rel_empleado->surname}}</title>
<link rel="icon" type="image/png" sizes="16x16" href="{{asset('img/favicon.ico')}}">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,700,700i" rel="stylesheet">
<script src="https://kit.fontawesome.com/ff92a1680a.js" crossorigin="anonymous"></script>
<style type="text/css">
.button {
text-decoration: none;
text-align: center;
padding: 11px 32px;
border: none;
-webkit-border-radius: 4px;
-moz-border-radius: 4px;
border-radius: 4px;
font: 12px Arial, Helvetica, sans-serif;
font-weight: bold;
color: #000000;
background: #ffffff;
-webkit-box-shadow: 0px 0px 2px #ffffff, inset 0px 0px 1px #ffffff;
-moz-box-shadow: 0px 0px 2px #ffffff, inset 0px 0px 1px #ffffff;
box-shadow: 0px 0px 2px #ffffff, inset 0px 0px 1px #ffffff;
}

#outlook a {
padding: 0;
}

.ExternalClass {
width: 100%;
}

.ExternalClass,
.ExternalClass p,
.ExternalClass span,
.ExternalClass font,
.ExternalClass td,
.ExternalClass div {
line-height: 100%;
}

.es-button {
mso-style-priority: 100 !important;
text-decoration: none !important;
}

a[x-apple-data-detectors] {
color: inherit !important;
text-decoration: none !important;
font-size: inherit !important;
font-family: inherit !important;
font-weight: inherit !important;
line-height: inherit !important;
}

.es-desk-hidden {
display: none;
float: left;
overflow: hidden;
width: 0;
max-height: 0;
line-height: 0;
mso-hide: all;
}

.es-button-border:hover a.es-button,
.es-button-border:hover button.es-button {
background: #7dbf44 !important;
border-color: #7dbf44 !important;
}

.es-button-border:hover {
background: #7dbf44 !important;
border-color: #7dbf44 #7dbf44 #7dbf44 #7dbf44 !important;
}

[data-ogsb] .es-button {
border-width: 0 !important;
padding: 10px 20px 10px 20px !important;
}

td .es-button-border:hover a.es-button-1 {
background: #7dbf44 !important;
border-color: #7dbf44 !important;
}

td .es-button-border-2:hover {
background: #7dbf44 !important;
}

@media only screen and (max-width:600px) {

p,
ul li,
ol li,
a {
line-height: 150% !important
}

h1,
h2,
h3,
h1 a,
h2 a,
h3 a {
line-height: 120% !important
}

h1 {
font-size: 30px !important;
text-align: center
}

h2 {
font-size: 22px !important;
text-align: center
}

h3 {
font-size: 20px !important;
text-align: center
}

.es-header-body h1 a,
.es-content-body h1 a,
.es-footer-body h1 a {
font-size: 30px !important
}

.es-header-body h2 a,
.es-content-body h2 a,
.es-footer-body h2 a {
font-size: 22px !important
}

.es-header-body h3 a,
.es-content-body h3 a,
.es-footer-body h3 a {
font-size: 20px !important
}

.es-menu td a {
font-size: 16px !important
}

.es-header-body p,
.es-header-body ul li,
.es-header-body ol li,
.es-header-body a {
font-size: 16px !important
}

.es-content-body p,
.es-content-body ul li,
.es-content-body ol li,
.es-content-body a {
font-size: 14px !important
}

.es-footer-body p,
.es-footer-body ul li,
.es-footer-body ol li,
.es-footer-body a {
font-size: 14px !important
}

.es-infoblock p,
.es-infoblock ul li,
.es-infoblock ol li,
.es-infoblock a {
font-size: 12px !important
}

*[class="gmail-fix"] {
display: none !important
}

.es-m-txt-c,
.es-m-txt-c h1,
.es-m-txt-c h2,
.es-m-txt-c h3 {
text-align: center !important
}

.es-m-txt-r,
.es-m-txt-r h1,
.es-m-txt-r h2,
.es-m-txt-r h3 {
text-align: right !important
}

.es-m-txt-l,
.es-m-txt-l h1,
.es-m-txt-l h2,
.es-m-txt-l h3 {
text-align: left !important
}

.es-m-txt-r img,
.es-m-txt-c img,
.es-m-txt-l img {
display: inline !important
}

.es-button-border {
display: block !important
}

a.es-button,
button.es-button {
font-size: 20px !important;
display: block !important;
border-left-width: 0px !important;
border-right-width: 0px !important
}

.es-btn-fw {
border-width: 10px 0px !important;
text-align: center !important
}

.es-adaptive table,
.es-btn-fw,
.es-btn-fw-brdr,
.es-left,
.es-right {
width: 100% !important
}

.es-content table,
.es-header table,
.es-footer table,
.es-content,
.es-footer,
.es-header {
width: 100% !important;
max-width: 600px !important
}

.es-adapt-td {
display: block !important;
width: 100% !important
}

.adapt-img {
width: 100% !important;
height: auto !important
}

.es-m-p0 {
padding: 0 !important
}

.es-m-p0r {
padding-right: 0 !important
}

.es-m-p0l {
padding-left: 0 !important
}

.es-m-p0t {
padding-top: 0 !important
}

.es-m-p0b {
padding-bottom: 0 !important
}

.es-m-p20b {
padding-bottom: 20px !important
}

.es-mobile-hidden,
.es-hidden {
display: none !important
}

tr.es-desk-hidden,
td.es-desk-hidden,
table.es-desk-hidden {
width: auto !important;
overflow: visible !important;
float: none !important;
max-height: inherit !important;
line-height: inherit !important
}

tr.es-desk-hidden {
display: table-row !important
}

table.es-desk-hidden {
display: table !important
}

td.es-desk-menu-hidden {
display: table-cell !important
}

.es-menu td {
width: 1% !important
}

table.es-table-not-adapt,
.esd-block-html table {
width: auto !important
}

table.es-social {
display: inline-block !important
}

table.es-social td {
display: inline-block !important
}

.es-m-p5 {
padding: 5px !important
}

.es-m-p5t {
padding-top: 5px !important
}

.es-m-p5b {
padding-bottom: 5px !important
}

.es-m-p5r {
padding-right: 5px !important
}

.es-m-p5l {
padding-left: 5px !important
}

.es-m-p10 {
padding: 10px !important
}

.es-m-p10t {
padding-top: 10px !important
}

.es-m-p10b {
padding-bottom: 10px !important
}

.es-m-p10r {
padding-right: 10px !important
}

.es-m-p10l {
padding-left: 10px !important
}

.es-m-p15 {
padding: 15px !important
}

.es-m-p15t {
padding-top: 15px !important
}

.es-m-p15b {
padding-bottom: 15px !important
}

.es-m-p15r {
padding-right: 15px !important
}

.es-m-p15l {
padding-left: 15px !important
}

.es-m-p20 {
padding: 20px !important
}

.es-m-p20t {
padding-top: 20px !important
}

.es-m-p20r {
padding-right: 20px !important
}

.es-m-p20l {
padding-left: 20px !important
}

.es-m-p25 {
padding: 25px !important
}

.es-m-p25t {
padding-top: 25px !important
}

.es-m-p25b {
padding-bottom: 25px !important
}

.es-m-p25r {
padding-right: 25px !important
}

.es-m-p25l {
padding-left: 25px !important
}

.es-m-p30 {
padding: 30px !important
}

.es-m-p30t {
padding-top: 30px !important
}

.es-m-p30b {
padding-bottom: 30px !important
}

.es-m-p30r {
padding-right: 30px !important
}

.es-m-p30l {
padding-left: 30px !important
}

.es-m-p35 {
padding: 35px !important
}

.es-m-p35t {
padding-top: 35px !important
}

.es-m-p35b {
padding-bottom: 35px !important
}

.es-m-p35r {
padding-right: 35px !important
}

.es-m-p35l {
padding-left: 35px !important
}

.es-m-p40 {
padding: 40px !important
}

.es-m-p40t {
padding-top: 40px !important
}

.es-m-p40b {
padding-bottom: 40px !important
}

.es-m-p40r {
padding-right: 40px !important
}

.es-m-p40l {
padding-left: 40px !important
}
}
</style>
</head>

<body
style="width:100%;font-family:arial, 'helvetica neue', helvetica, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0">
<div class="es-wrapper-color" style="background-color:#F6F6F6">
<table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0"
style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;padding:0;Margin:0;width:100%;height:100%;background-repeat:repeat;background-position:center top">
<tr style="border-collapse:collapse">
<td valign="top" style="padding:0;Margin:0">
<table cellpadding="0" cellspacing="0" class="es-content" align="center"
style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
<tr style="border-collapse:collapse">
<td align="center" style="padding:0;Margin:0">
    <table class="es-content-body"
        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:900px"
        cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" align="center">
        <tr style="border-collapse:collapse">
            <td align="left" style="padding:10px;Margin:0">
                <table class="es-left" cellspacing="0" cellpadding="0" align="left"
                    style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
                    <tr style="border-collapse:collapse">
                        <td align="left" style="padding:0;Margin:0;width:430px">
                            <table width="100%" cellspacing="0" cellpadding="0"
                                role="presentation"
                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                <tr style="border-collapse:collapse">
                                    <td class="es-infoblock" align="left"
                                        style="padding:0;Margin:0;line-height:14px;font-size:12px;color:#CCCCCC">
                                        <p
                                            style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:14px;color:#CCCCCC;font-size:12px">
                                            {{ config('app.name') }}
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <table class="es-right" cellspacing="0" cellpadding="0" align="right"
                    style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right">
                    <tr style="border-collapse:collapse">
                        <td align="left" style="padding:0;Margin:0;width:430px">
                            <table width="100%" cellspacing="0" cellpadding="0"
                                role="presentation"
                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                <tr style="border-collapse:collapse">
                                    <td align="right" class="es-infoblock"
                                        style="padding:0;Margin:0;line-height:14px;font-size:12px;color:#CCCCCC">
                                        <p
                                            style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:14px;color:#CCCCCC;font-size:12px">
                                            {{date('d-m-Y h:i:s a',strtotime($visita?->created_at))}}</p>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </td>
</tr>
</table>
<table cellpadding="0" cellspacing="0" class="es-header" align="center"
style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top">
<tr style="border-collapse:collapse">
    <td align="center" style="padding:0;Margin:0">
        <table class="es-header-body" cellspacing="0" cellpadding="0" bgcolor="#ffffff"
            align="center"
            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:900px">
            <tr style="border-collapse:collapse">
                <td align="left"
                    style="Margin:0;padding-bottom:0px;padding-top:0px;padding-left:20px;padding-right:20px">
                    <table class="es-left" cellspacing="0" cellpadding="0" align="left"
                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
                        <tr style="border-collapse:collapse">
                            <td class="es-m-p20b" align="left"
                                style="padding:0;Margin:0;width:200px">
                                <table width="100%" cellspacing="0" cellpadding="0"
                                    role="presentation"
                                    style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                    <tr style="border-collapse:collapse">
                                        <td align="center"
                                            style="padding:0;Margin:0;padding-top:5px;padding-bottom:5px;font-size:0px">
                                            <a style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:none;color:#659C35;font-size:16px">
                                                <img draggable="false"
                                                    src="{{ asset('img/logo.png') }}"
                                                    style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"
                                                    class="adapt-img" width="85">
                                                </a>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td class="es-hidden" style="padding:0;Margin:0;width:20px"></td>
                            </tr>
                        </table>
                        <!--[if mso]></td><td style="width:420px" valign="top"><![endif]-->
                        <table class="es-left" cellspacing="0" cellpadding="0" align="left"
                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
                            <tr style="border-collapse:collapse">
                                <td class="es-m-p20b" align="left"
                                    style="padding:0;Margin:0;width:420px">
                                    <table width="100%" cellspacing="0" cellpadding="0"
                                        role="presentation"
                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                        <tr style="border-collapse:collapse">
                                            <td align="center"
                                                style="padding:0;Margin:0;padding-top:25px;padding-bottom:10px">
                                                <p
                                                    style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:24px;color:#303c54;font-size:16px">
                                                    <strong>VISITA DOMICILIARIA</strong>
                                                </p>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        <table cellpadding="0" cellspacing="0" class="es-right" align="right"
                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right">
                            <tr style="border-collapse:collapse">
                                <td align="left" style="padding:0;Margin:0;width:200px">
                                    <table cellpadding="0" cellspacing="0" width="100%"
                                        role="presentation"
                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                        <tr style="border-collapse:collapse">
                                            <td align="left" style="padding:0;Margin:0">
                                                <p
                                                    style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:24px;color:#659C35;font-size:16px">
                                                    <br>
                                                    </p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr style="border-collapse:collapse">
                        <td align="left"
                            style="padding:0;Margin:0;padding-left:20px;padding-right:20px">
                            <table cellpadding="0" cellspacing="0" width="100%">
                                <tbody>
                                    <tr style="border-collapse:collapse">
                                        <td align="left" style="padding:0;Margin:0;padding-top:20px;">
                                            <table cellpadding="0" cellspacing="0" class="es-footer"
                                                align="center"
                                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top">
                                                <tbody>
                                                    <tr style="border-collapse:collapse">
                                                        <td align="center" style="padding:0;Margin:0">
                                                            <table class="es-footer-body"
                                                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#333333;"
                                                                cellspacing="0" cellpadding="0"
                                                                align="center">
                                                                <tbody>
                                                                    <tr
                                                                        style="border-collapse:collapse">
                                                                        <td style="Margin:0;padding-top:10px;padding-bottom:10px;padding-left:20px;padding-right:20px;background-color:#000000"
                                                                            align="left">
                                                                            <table width="100%"
                                                                                cellspacing="0"
                                                                                cellpadding="0">
                                                                                <tbody>
                                                                                    <tr
                                                                                        style="border-collapse:collapse">
                                                                                        <td valign="top"
                                                                                            align="center"
                                                                                            style="padding:0;Margin:0;width:860px">
                                                                                            <table
                                                                                                width="100%"
                                                                                                cellspacing="0"
                                                                                                cellpadding="0"
                                                                                                role="presentation">
                                                                                                <tbody>
                                                                                                    <tr
                                                                                                        style="border-collapse:collapse">
                                                                                                        <td align="left"
                                                                                                            style="padding:0;Margin:0">
                                                                                                            <p
                                                                                                                style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:21px;color:rgb(255, 255, 255);font-size:14px">
                                                                                                                DATOS DEL ASPIRANTE
                                                                                                            </p>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

    </table>
    <table cellpadding="0" cellspacing="0" class="es-content" align="center"
        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">

        <tr style="border-collapse:collapse">
            <td align="center" style="padding:0;Margin:0">
                <table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0"
                    cellspacing="0"
                    style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:900px">
                    <tr style="border-collapse:collapse">
                        <td align="left"
                            style="Margin:0;padding-bottom:0px;padding-top:0px;padding-left:20px;padding-right:20px">
                            <table class="es-left" cellspacing="0" cellpadding="0" align="left"
                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
                                <tr style="border-collapse:collapse">
                                    <td class="es-m-p20b" align="left"
                                        style="padding:0;Margin:0;width:430px">
                                        <table
                                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;border-left:1px solid transparent;border-top:1px solid transparent;border-bottom:1px solid transparent;background-color:#efefef;background-position:center top"
                                            width="100%" cellspacing="0" cellpadding="0"
                                            bgcolor="#efefef" role="presentation">
                                            <tr style="border-collapse:collapse">
                                                <td align="left"
                                                    style="Margin:0;padding-bottom:10px;padding-top:20px;padding-left:20px;padding-right:20px">
                                                    
                                                </td>
                                            </tr>
                                            <tr style="border-collapse:collapse">
                                                <td align="left"
                                                    style="padding:0;Margin:0;padding-bottom:20px;padding-left:20px;padding-right:20px">
                                                    <table
                                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:100%"
                                                        class="cke_show_border" cellspacing="1"
                                                        cellpadding="1" border="0" align="left"
                                                        role="presentation">
                                                        <tr style="border-collapse:collapse">
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;line-height:21px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                <strong>Tipo Documento:</strong>
                                                            </td>
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                &nbsp; {{$visita->rel_empleado->rel_tipo_documento->name}}
                                                            </td>
                                                        </tr>
                                                        <tr style="border-collapse:collapse">
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;line-height:21px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                <strong>Documento:</strong>
                                                            </td>
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                &nbsp; {{$visita->rel_empleado->identification}}
                                                            </td>
                                                        </tr>
                                                        <tr style="border-collapse:collapse">
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;line-height:21px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                <strong>Nombre:</strong>
                                                            </td>
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                &nbsp; {{$visita->rel_empleado->name.' '.$visita->rel_empleado->surname}}
                                                            </td>
                                                        </tr>
                                                        <tr style="border-collapse:collapse">
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;line-height:21px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                <strong>Cargo:</strong>
                                                            </td>
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                &nbsp; {{$visita->position}}
                                                            </td>
                                                        </tr>
                                                        <tr style="border-collapse:collapse">
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;line-height:21px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                <strong>Formación Académica:</strong>
                                                            </td>
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                &nbsp; {{$visita->rel_nivel_educacion->name}}
                                                            </td>
                                                        </tr>
                                                        <tr style="border-collapse:collapse">
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;line-height:21px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                <strong>Municipio:</strong>
                                                            </td>
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                &nbsp; {{$visita->rel_empleado->rel_municipio_residencia->nombre}}
                                                            </td>
                                                        </tr>
                                                        <tr style="border-collapse:collapse">
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;line-height:21px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                <strong>Barrio:</strong>
                                                            </td>
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                &nbsp; {{$visita->rel_empleado->rel_barrio->name}}
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <table class="es-right" cellspacing="0" cellpadding="0" align="right"
                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right">
                                <tr style="border-collapse:collapse">
                                    <td align="left" style="padding:0;Margin:0;width:430px">
                                        <table
                                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;border-left:1px solid transparent;border-right:1px solid transparent;border-top:1px solid transparent;border-bottom:1px solid transparent;background-color:#efefef;background-position:center top"
                                            width="100%" cellspacing="0" cellpadding="0"
                                            bgcolor="#efefef" role="presentation">
                                            <tr style="border-collapse:collapse">
                                                <td align="left"
                                                    style="Margin:0;padding-bottom:10px;padding-top:20px;padding-left:20px;padding-right:20px">
                                                    
                                                </td>
                                            </tr>
                                            <tr style="border-collapse:collapse">
                                                <td align="left"
                                                    style="padding:0;Margin:0;padding-bottom:20px;padding-left:20px;padding-right:20px">
                                                    <table
                                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:100%"
                                                        class="cke_show_border" cellspacing="1"
                                                        cellpadding="1" border="0" align="left"
                                                        role="presentation">
                                                        <tr style="border-collapse:collapse">
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;line-height:21px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                <strong>Fecha de Nacimiento:</strong>
                                                            </td>
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                &nbsp; {{date('d-m-Y',strtotime($visita->rel_empleado->date_of_birth))}}
                                                            </td>
                                                        </tr>
                                                        <tr style="border-collapse:collapse">
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;line-height:21px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                <strong>Edad: </strong>
                                                            </td>
                                                            <td
                                                                style="padding:0;Margin:0;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;font-size:14px;line-height:21px">
                                                                &nbsp; {{intval(floor((time() - strtotime($visita->rel_empleado->date_of_birth)) / 31556926))}}
                                                            </td>
                                                        </tr>
                                                        <tr style="border-collapse:collapse">
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;line-height:21px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                <strong>Estado Civil: </strong>
                                                            </td>
                                                            <td
                                                                style="padding:0;Margin:0;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;font-size:14px;line-height:21px">
                                                                &nbsp; {{ $visita?->rel_empleado?->rel_estado_civil?->name }}
                                                            </td>
                                                        </tr>
                                                        <tr style="border-collapse:collapse">
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;line-height:21px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                <strong>Celular: </strong>
                                                            </td>
                                                            <td
                                                                style="padding:0;Margin:0;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;font-size:14px;line-height:21px">
                                                                &nbsp; {{ $visita?->rel_empleado?->telephone }}
                                                            </td>
                                                        </tr>
                                                        <tr style="border-collapse:collapse">
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;line-height:21px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                <strong>Dirección: </strong>
                                                            </td>
                                                            <td
                                                                style="padding:0;Margin:0;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;font-size:14px;line-height:21px">
                                                                &nbsp; {{ $visita?->rel_empleado?->address }}
                                                            </td>
                                                        </tr>
                                                        <tr style="border-collapse:collapse">
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;line-height:21px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                <strong>Localidad: </strong>
                                                            </td>
                                                            <td
                                                                style="padding:0;Margin:0;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;font-size:14px;line-height:21px">
                                                                &nbsp; {{ $visita?->rel_empleado?->rel_localidad?->name }}
                                                            </td>
                                                        </tr>
                                                        <tr style="border-collapse:collapse">
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;line-height:21px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                <strong>Resultado: </strong>
                                                            </td>
                                                            <td
                                                                style="padding:0;Margin:0;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;font-size:14px;line-height:21px">
                                                                &nbsp; {{ $visita?->rel_tipo_visita?->name }}
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr style="border-collapse:collapse">
                        <td align="left"
                            style="padding:0;Margin:0;padding-left:20px;padding-right:20px">
                            <table cellpadding="0" cellspacing="0" width="100%">
                                
                            </table>
                        </td>
                    </tr>
                    
                    <!-- inicio baner seccion -->
                    <tr style="border-collapse:collapse">
                        <td align="left"
                            style="padding:0;Margin:0;padding-left:20px;padding-right:20px">
                            <table cellpadding="0" cellspacing="0" width="100%">
                                <tbody>
                                    <tr style="border-collapse:collapse">
                                        <td align="left" style="padding:0;Margin:0;padding-top:20px;">
                                            <table cellpadding="0" cellspacing="0" class="es-footer"
                                                align="center"
                                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top">
                                                <tbody>
                                                    <tr style="border-collapse:collapse">
                                                        <td align="center" style="padding:0;Margin:0">
                                                            <table class="es-footer-body"
                                                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#333333;"
                                                                cellspacing="0" cellpadding="0"
                                                                align="center">
                                                                <tbody>
                                                                    <tr
                                                                        style="border-collapse:collapse">
                                                                        <td style="Margin:0;padding-top:10px;padding-bottom:10px;padding-left:20px;padding-right:20px;background-color:#000000"
                                                                            align="left">
                                                                            <table width="100%"
                                                                                cellspacing="0"
                                                                                cellpadding="0">
                                                                                <tbody>
                                                                                    <tr
                                                                                        style="border-collapse:collapse">
                                                                                        <td valign="top"
                                                                                            align="center"
                                                                                            style="padding:0;Margin:0;width:860px">
                                                                                            <table
                                                                                                width="100%"
                                                                                                cellspacing="0"
                                                                                                cellpadding="0"
                                                                                                role="presentation">
                                                                                                <tbody>
                                                                                                    <tr
                                                                                                        style="border-collapse:collapse">
                                                                                                        <td align="left"
                                                                                                            style="padding:0;Margin:0">
                                                                                                            <p
                                                                                                                style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:21px;color:rgb(255, 255, 255);font-size:14px">
                                                                                                                ASPIRANTE NO ATIENDE LA VISITA
                                                                                                            </p>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <!-- fin baner seccion -->

                    <!-- inicio seccion -->
                    <tr style="border-collapse:collapse">
                        <td align="left"
                            style="Margin:0;padding-bottom:0px;padding-top:0px;padding-left:20px;padding-right:20px">
                            <table class="es-left" cellspacing="0" cellpadding="0" align="left"
                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
                                <tr style="border-collapse:collapse">
                                    <td class="es-m-p20b" align="left"
                                        style="padding:0;Margin:0;width:430px">
                                        <table
                                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;border-left:1px solid transparent;border-top:1px solid transparent;border-bottom:1px solid transparent;background-color:#efefef;background-position:center top"
                                            width="100%" cellspacing="0" cellpadding="0"
                                            bgcolor="#efefef" role="presentation">
                                            <tr style="border-collapse:collapse">
                                                <td align="left"
                                                    style="Margin:0;padding-bottom:10px;padding-top:20px;padding-left:20px;padding-right:20px">
                                                    
                                                </td>
                                            </tr>
                                            <tr style="border-collapse:collapse">
                                                <td align="left"
                                                    style="padding:0;Margin:0;padding-bottom:20px;padding-left:20px;padding-right:20px">
                                                    <table
                                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:100%"
                                                        class="cke_show_border" cellspacing="1"
                                                        cellpadding="1" border="0" align="left"
                                                        role="presentation">
                                                        <tr style="border-collapse:collapse">
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;line-height:21px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                <strong>Quien Atiende la Visita: </strong>
                                                            </td>
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                &nbsp; {{$visita?->who_attends}}
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <table class="es-right" cellspacing="0" cellpadding="0" align="right"
                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right">
                                <tr style="border-collapse:collapse">
                                    <td align="left" style="padding:0;Margin:0;width:430px">
                                        <table
                                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;border-left:1px solid transparent;border-right:1px solid transparent;border-top:1px solid transparent;border-bottom:1px solid transparent;background-color:#efefef;background-position:center top"
                                            width="100%" cellspacing="0" cellpadding="0"
                                            bgcolor="#efefef" role="presentation">
                                            <tr style="border-collapse:collapse">
                                                <td align="left"
                                                    style="Margin:0;padding-bottom:10px;padding-top:20px;padding-left:20px;padding-right:20px">
                                                    
                                                </td>
                                            </tr>
                                            <tr style="border-collapse:collapse">
                                                <td align="left"
                                                    style="padding:0;Margin:0;padding-bottom:20px;padding-left:20px;padding-right:20px">
                                                    <table
                                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:100%"
                                                        class="cke_show_border" cellspacing="1"
                                                        cellpadding="1" border="0" align="left"
                                                        role="presentation">
                                                        <tr style="border-collapse:collapse">
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;line-height:21px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                <strong>Parentesco: </strong>
                                                            </td>
                                                            <td
                                                                style="padding:0;Margin:0;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;font-size:14px;line-height:21px">
                                                                &nbsp; {{$visita?->relationship}}
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <!-- fin seccion -->
                    <!-- inicio baner seccion -->
                    <tr style="border-collapse:collapse">
                        <td align="left"
                            style="padding:0;Margin:0;padding-left:20px;padding-right:20px">
                            <table cellpadding="0" cellspacing="0" width="100%">
                                <tbody>
                                    <tr style="border-collapse:collapse">
                                        <td align="left" style="padding:0;Margin:0;padding-top:20px;">
                                            <table cellpadding="0" cellspacing="0" class="es-footer"
                                                align="center"
                                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top">
                                                <tbody>
                                                    <tr style="border-collapse:collapse">
                                                        <td align="center" style="padding:0;Margin:0">
                                                            <table class="es-footer-body"
                                                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#333333;"
                                                                cellspacing="0" cellpadding="0"
                                                                align="center">
                                                                <tbody>
                                                                    <tr
                                                                        style="border-collapse:collapse">
                                                                        <td style="Margin:0;padding-top:10px;padding-bottom:10px;padding-left:20px;padding-right:20px;background-color:#000000"
                                                                            align="left">
                                                                            <table width="100%"
                                                                                cellspacing="0"
                                                                                cellpadding="0">
                                                                                <tbody>
                                                                                    <tr
                                                                                        style="border-collapse:collapse">
                                                                                        <td valign="top"
                                                                                            align="center"
                                                                                            style="padding:0;Margin:0;width:860px">
                                                                                            <table
                                                                                                width="100%"
                                                                                                cellspacing="0"
                                                                                                cellpadding="0"
                                                                                                role="presentation">
                                                                                                <tbody>
                                                                                                    <tr
                                                                                                        style="border-collapse:collapse">
                                                                                                        <td align="left"
                                                                                                            style="padding:0;Margin:0">
                                                                                                            <p
                                                                                                                style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:21px;color:rgb(255, 255, 255);font-size:14px">
                                                                                                                HALLAZGOS DE LA VISITA
                                                                                                            </p>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <!-- fin baner seccion -->

                    <!-- inicio seccion -->
                    <tr style="border-collapse:collapse">
                        <td align="left"
                            style="Margin:0;padding-bottom:0px;padding-top:0px;padding-left:20px;padding-right:20px">
                            <table class="es-left" cellspacing="0" cellpadding="0" align="left"
                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
                                <tr style="border-collapse:collapse">
                                    <td class="es-m-p20b" align="left"
                                        style="padding:0;Margin:0;width:430px">
                                        <table
                                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;border-left:1px solid transparent;border-top:1px solid transparent;border-bottom:1px solid transparent;background-color:#efefef;background-position:center top"
                                            width="100%" cellspacing="0" cellpadding="0"
                                            bgcolor="#efefef" role="presentation">
                                            <tr style="border-collapse:collapse">
                                                <td align="left"
                                                    style="Margin:0;padding-bottom:10px;padding-top:20px;padding-left:20px;padding-right:20px">
                                                    
                                                </td>
                                            </tr>
                                            <tr style="border-collapse:collapse">
                                                <td align="left"
                                                    style="padding:0;Margin:0;padding-bottom:20px;padding-left:20px;padding-right:20px">
                                                    <table
                                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:100%"
                                                        class="cke_show_border" cellspacing="1"
                                                        cellpadding="1" border="0" align="left"
                                                        role="presentation">
                                                        <tr style="border-collapse:collapse">
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;line-height:21px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                <strong>Situación Laboral: </strong>
                                                            </td>
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                &nbsp; {{$visita?->employment_situation}}
                                                            </td>
                                                        </tr>
                                                        <tr style="border-collapse:collapse">
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;line-height:21px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                <strong>Facilidad para Transportarse: </strong>
                                                            </td>
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                &nbsp; {{$visita?->ease_of_transportation}}
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <table class="es-right" cellspacing="0" cellpadding="0" align="right"
                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right">
                                <tr style="border-collapse:collapse">
                                    <td align="left" style="padding:0;Margin:0;width:430px">
                                        <table
                                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;border-left:1px solid transparent;border-right:1px solid transparent;border-top:1px solid transparent;border-bottom:1px solid transparent;background-color:#efefef;background-position:center top"
                                            width="100%" cellspacing="0" cellpadding="0"
                                            bgcolor="#efefef" role="presentation">
                                            <tr style="border-collapse:collapse">
                                                <td align="left"
                                                    style="Margin:0;padding-bottom:10px;padding-top:20px;padding-left:20px;padding-right:20px">
                                                    
                                                </td>
                                            </tr>
                                            <tr style="border-collapse:collapse">
                                                <td align="left"
                                                    style="padding:0;Margin:0;padding-bottom:20px;padding-left:20px;padding-right:20px">
                                                    <table
                                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:100%"
                                                        class="cke_show_border" cellspacing="1"
                                                        cellpadding="1" border="0" align="left"
                                                        role="presentation">
                                                        <tr style="border-collapse:collapse">
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;line-height:21px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                <strong>¿Cómo se transporta?: </strong>
                                                            </td>
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                &nbsp; {{$visita?->type_transport}}
                                                            </td>
                                                        </tr>
                                                        <tr style="border-collapse:collapse">
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;line-height:21px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                <strong>¿Cuál?: </strong>
                                                            </td>
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                &nbsp; {{$visita?->vehicle}}
                                                            </td>
                                                        </tr>                                                        
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <!-- fin seccion -->

                    <!-- inicio baner seccion -->
                    <tr style="border-collapse:collapse">
                        <td align="left"
                            style="padding:0;Margin:0;padding-left:20px;padding-right:20px">
                            <table cellpadding="0" cellspacing="0" width="100%">
                                <tbody>
                                    <tr style="border-collapse:collapse">
                                        <td align="left" style="padding:0;Margin:0;padding-top:20px;">
                                            <table cellpadding="0" cellspacing="0" class="es-footer"
                                                align="center"
                                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top">
                                                <tbody>
                                                    <tr style="border-collapse:collapse">
                                                        <td align="center" style="padding:0;Margin:0">
                                                            <table class="es-footer-body"
                                                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#333333;"
                                                                cellspacing="0" cellpadding="0"
                                                                align="center">
                                                                <tbody>
                                                                    <tr
                                                                        style="border-collapse:collapse">
                                                                        <td style="Margin:0;padding-top:10px;padding-bottom:10px;padding-left:20px;padding-right:20px;background-color:#000000"
                                                                            align="left">
                                                                            <table width="100%"
                                                                                cellspacing="0"
                                                                                cellpadding="0">
                                                                                <tbody>
                                                                                    <tr
                                                                                        style="border-collapse:collapse">
                                                                                        <td valign="top"
                                                                                            align="center"
                                                                                            style="padding:0;Margin:0;width:860px">
                                                                                            <table
                                                                                                width="100%"
                                                                                                cellspacing="0"
                                                                                                cellpadding="0"
                                                                                                role="presentation">
                                                                                                <tbody>
                                                                                                    <tr
                                                                                                        style="border-collapse:collapse">
                                                                                                        <td align="left"
                                                                                                            style="padding:0;Margin:0">
                                                                                                            <p
                                                                                                                style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:21px;color:rgb(255, 255, 255);font-size:14px">
                                                                                                                INFORMACIÓN FAMILIAR
                                                                                                            </p>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <!-- fin baner seccion -->
                    <!-- inicio seccion -->
                    <tr style="border-collapse:collapse">
                        <td align="left"
                            style="Margin:0;padding-bottom:0px;padding-top:0px;padding-left:20px;padding-right:20px">
                            <table class="es-left" cellspacing="0" cellpadding="0" align="left"
                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
                                <tr style="border-collapse:collapse">
                                    <td align="left" style="padding:0;Margin:0;width:900px">
                                        <table
                                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;border-left:1px solid transparent;border-right:1px solid transparent;border-top:1px solid transparent;border-bottom:1px solid transparent;background-color:#efefef;background-position:center top"
                                            width="100%" cellspacing="0" cellpadding="0"
                                            bgcolor="#efefef" role="presentation">
            
                                            <tr style="border-collapse:collapse">
                                                <td align="left"
                                                    style="padding:0;Margin:0;padding-bottom:20px;padding-left:20px;padding-right:20px;padding-top: 15px;">
                                                    <table
                                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:100%"
                                                        class="cke_show_border" cellspacing="1"
                                                        cellpadding="1" border="0" align="left"
                                                        role="presentation">
                                                        <tr style="border-collapse:collapse">
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;line-height:21px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                <strong>¿Con quién vive en el mismo domicilio?: </strong>&nbsp;
                                                            </td>
                                                            <td
                                                                style="padding:0;Margin:0;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;font-size:14px;line-height:21px;" align="justify">
                                                                {{nl2br($visita?->who_live_with)}}
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr style="border-collapse:collapse">
                        <td align="left"
                            style="Margin:0;padding-bottom:0px;padding-top:0px;padding-left:20px;padding-right:20px">
                            <table class="es-left" cellspacing="0" cellpadding="0" align="left"
                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
                                <tr style="border-collapse:collapse">
                                    <td align="left" style="padding:0;Margin:0;width:900px">
                                        <table
                                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;border-left:1px solid transparent;border-right:1px solid transparent;border-top:1px solid transparent;border-bottom:1px solid transparent;background-color:#efefef;background-position:center top"
                                            width="100%" cellspacing="0" cellpadding="0"
                                            bgcolor="#efefef" role="presentation">
                                            <tr style="border-collapse:collapse">
                                                <td align="left"
                                                    style="padding:0;Margin:0;padding-bottom:20px;padding-left:20px;padding-right:20px">
                                                    <table
                                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:100%"
                                                        class="cke_show_border" cellspacing="1"
                                                        cellpadding="1" border="0" align="left"
                                                        role="presentation">
                                                        <tr style="border-collapse:collapse">
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;line-height:21px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;max-width: 3px;">
                                                                <strong>¿Vive solo?: </strong>&nbsp;
                                                            </td>
                                                            <td
                                                                style="padding:0;Margin:0;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;font-size:14px;line-height:21px;" align="justify">
                                                                {{$visita?->live_alone}}
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr style="border-collapse:collapse;background-color: #efefef;">
                                    <td align="center" valign="top"
                                        style="padding:0;Margin:0;width:860px">
                                        <table cellpadding="0" cellspacing="0" width="100%"
                                            role="presentation"
                                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;margin-top: 10px;">
                                            <tr style="border-collapse:collapse">
                                                <td style="padding:0;Margin:0">
                                                    <table
                                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:100%;height:36px;font-family:Roboto, sans-serif;font-size:90%;"
                                                        role="presentation">
                                                        <tr
                                                            style="border-collapse:collapse;height:30px;text-align:center;background:#000000;color:#ffffff">
                                                            <td
                                                                style="padding:0;Margin:0;width:20%;border-top-left-radius:5px">
                                                                Nombre</td>
                                                            <td style="padding:0;Margin:0;width:15%">
                                                                Parentesco</td>
                                                            <td style="padding:0;Margin:0;width:15%">
                                                                ¿Cuál?</td>
                                                            <td style="padding:0;Margin:0;width:15%">
                                                                Nivel Educativo</td>
                                                            <td
                                                                style="padding:0;Margin:0;width:55%;border-top-right-radius:5px">
                                                                Situación Laboral</td>
                                                        </tr>
                                                        @foreach ($visita?->rel_familiares as $v)
                                                        <tr
                                                            style="border-collapse:collapse;height:30px;border-bottom:#c1bcbc 1px solid">
                                                            <td
                                                                style="padding:1em;Margin:0;text-align:center">
                                                                {{ $v?->name.' '.$v?->surname }}
                                                            </td>
                                                            <td
                                                                style="padding:1em;Margin:0;text-align:center">
                                                                {{ $v?->relationship }}
                                                            </td>
                                                            <td
                                                                style="padding:1em;Margin:0;text-align:center">
                                                                {{ $v?->which_relative }}
                                                            </td>
                                                            <td
                                                                style="padding:1em;Margin:0;text-align:center">
                                                                {{ $v?->rel_nivel_educacion?->name }}
                                                            </td>
                                                            <td
                                                                style="padding:1em;Margin:0;text-align:center">
                                                                {{ $v?->employment_situation}}
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <!-- fin seccion -->

                    <!-- inicio baner seccion -->
                    <tr style="border-collapse:collapse">
                        <td align="left"
                            style="padding:0;Margin:0;padding-left:20px;padding-right:20px">
                            <table cellpadding="0" cellspacing="0" width="100%">
                                <tbody>
                                    <tr style="border-collapse:collapse">
                                        <td align="left" style="padding:0;Margin:0;padding-top:20px;">
                                            <table cellpadding="0" cellspacing="0" class="es-footer"
                                                align="center"
                                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top">
                                                <tbody>
                                                    <tr style="border-collapse:collapse">
                                                        <td align="center" style="padding:0;Margin:0">
                                                            <table class="es-footer-body"
                                                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#333333;"
                                                                cellspacing="0" cellpadding="0"
                                                                align="center">
                                                                <tbody>
                                                                    <tr
                                                                        style="border-collapse:collapse">
                                                                        <td style="Margin:0;padding-top:10px;padding-bottom:10px;padding-left:20px;padding-right:20px;background-color:#000000"
                                                                            align="left">
                                                                            <table width="100%"
                                                                                cellspacing="0"
                                                                                cellpadding="0">
                                                                                <tbody>
                                                                                    <tr
                                                                                        style="border-collapse:collapse">
                                                                                        <td valign="top"
                                                                                            align="center"
                                                                                            style="padding:0;Margin:0;width:860px">
                                                                                            <table
                                                                                                width="100%"
                                                                                                cellspacing="0"
                                                                                                cellpadding="0"
                                                                                                role="presentation">
                                                                                                <tbody>
                                                                                                    <tr
                                                                                                        style="border-collapse:collapse">
                                                                                                        <td align="left"
                                                                                                            style="padding:0;Margin:0">
                                                                                                            <p
                                                                                                                style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:21px;color:rgb(255, 255, 255);font-size:14px">
                                                                                                                ASPECTOS DE FAMILIA Y VIVIENDA ACTUAL
                                                                                                            </p>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <!-- fin baner seccion -->
                    <!-- inicio seccion -->
                    <tr style="border-collapse:collapse">
                        <td align="left"
                            style="Margin:0;padding-bottom:0px;padding-top:0px;padding-left:20px;padding-right:20px">
                            <table class="es-left" cellspacing="0" cellpadding="0" align="left"
                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
                                <tr style="border-collapse:collapse">
                                    <td align="left" style="padding:0;Margin:0;width:900px">
                                        <table
                                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;border-left:1px solid transparent;border-right:1px solid transparent;border-top:1px solid transparent;border-bottom:1px solid transparent;background-color:#efefef;background-position:center top"
                                            width="100%" cellspacing="0" cellpadding="0"
                                            bgcolor="#efefef" role="presentation">
            
                                            <tr style="border-collapse:collapse">
                                                <td align="left"
                                                    style="padding:0;Margin:0;padding-bottom:20px;padding-left:20px;padding-right:20px;padding-top: 15px;">
                                                    <table
                                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:100%"
                                                        class="cke_show_border" cellspacing="1"
                                                        cellpadding="1" border="0" align="left"
                                                        role="presentation">
                                                        <tr style="border-collapse:collapse">
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;line-height:21px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;max-width: 60px;">
                                                                <strong>Clasificación del grupo familiar: </strong>&nbsp;
                                                            </td>
                                                            <td
                                                                style="padding:0;Margin:0;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;font-size:14px;line-height:21px;" align="justify">
                                                                {{$visita?->family_classification == 'Extensa'?'C. Extensa (familia nuclear o monoparental que vivan con abuelos, tíos, sobrinos, nietos u otros)':($visita?->family_classification == 'Monoparental'?'B. Monoparental (un solo padre con hijos)':($visita?->family_classification == 'Nuclear'?'A. Nuclear (Esposo, solos o con hijos)':'D. Ampliada (grupos de hermanos, primos u otras uniones diferentes)'))}}
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr style="border-collapse:collapse">
                        <td align="left"
                            style="Margin:0;padding-bottom:0px;padding-top:0px;padding-left:20px;padding-right:20px">
                            <table class="es-left" cellspacing="0" cellpadding="0" align="left"
                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
                                <tr style="border-collapse:collapse">
                                    <td align="left" style="padding:0;Margin:0;width:900px">
                                        <table
                                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;border-left:1px solid transparent;border-right:1px solid transparent;border-top:1px solid transparent;border-bottom:1px solid transparent;background-color:#efefef;background-position:center top"
                                            width="100%" cellspacing="0" cellpadding="0"
                                            bgcolor="#efefef" role="presentation">
            
                                            <tr style="border-collapse:collapse">
                                                <td align="left"
                                                    style="padding:0;Margin:0;padding-left:20px;padding-right:20px">
                                                    <table
                                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:100%"
                                                        class="cke_show_border" cellspacing="1"
                                                        cellpadding="1" border="0" align="left"
                                                        role="presentation">
                                                        <tr style="border-collapse:collapse">
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;line-height:21px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                <strong>Especifique en caso de ser necesario: </strong>&nbsp;
                                                            </td>
                                                            <td
                                                                style="padding:0;Margin:0;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;font-size:14px;line-height:21px;" align="justify">
                                                                {{nl2br($visita?->specify)}}
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr style="border-collapse:collapse">
                        <td align="left"
                            style="Margin:0;padding-bottom:0px;padding-top:0px;padding-left:20px;padding-right:20px">
                            <table class="es-left" cellspacing="0" cellpadding="0" align="left"
                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
                                <tr style="border-collapse:collapse">
                                    <td class="es-m-p20b" align="left"
                                        style="padding:0;Margin:0;width:430px">
                                        <table
                                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;border-left:1px solid transparent;border-top:1px solid transparent;border-bottom:1px solid transparent;background-color:#efefef;background-position:center top"
                                            width="100%" cellspacing="0" cellpadding="0"
                                            bgcolor="#efefef" role="presentation">
                                            <tr style="border-collapse:collapse">
                                                <td align="left"
                                                    style="Margin:0;padding-bottom:10px;padding-top:20px;padding-left:20px;padding-right:20px">
                                                    
                                                </td>
                                            </tr>
                                            <tr style="border-collapse:collapse">
                                                <td align="left"
                                                    style="padding:0;Margin:0;padding-bottom:20px;padding-left:20px;padding-right:20px">
                                                    <table
                                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:100%"
                                                        class="cke_show_border" cellspacing="1"
                                                        cellpadding="1" border="0" align="left"
                                                        role="presentation">
                                                        <tr style="border-collapse:collapse">
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;line-height:21px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                <strong>Tipo de vivienda: </strong>
                                                            </td>
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                &nbsp; {{$visita?->housing_type}}
                                                            </td>
                                                        </tr>
                                                        <tr style="border-collapse:collapse">
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;line-height:21px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                <strong>La vivienda es: </strong>
                                                            </td>
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                &nbsp; {{$visita?->own_home}}
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <table class="es-right" cellspacing="0" cellpadding="0" align="right"
                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right">
                                <tr style="border-collapse:collapse">
                                    <td align="left" style="padding:0;Margin:0;width:430px">
                                        <table
                                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;border-left:1px solid transparent;border-right:1px solid transparent;border-top:1px solid transparent;border-bottom:1px solid transparent;background-color:#efefef;background-position:center top"
                                            width="100%" cellspacing="0" cellpadding="0"
                                            bgcolor="#efefef" role="presentation">
                                            <tr style="border-collapse:collapse">
                                                <td align="left"
                                                    style="Margin:0;padding-bottom:10px;padding-top:20px;padding-left:20px;padding-right:20px">
                                                    
                                                </td>
                                            </tr>
                                            <tr style="border-collapse:collapse">
                                                <td align="left"
                                                    style="padding:0;Margin:0;padding-bottom:20px;padding-left:20px;padding-right:20px">
                                                    <table
                                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:100%"
                                                        class="cke_show_border" cellspacing="1"
                                                        cellpadding="1" border="0" align="left"
                                                        role="presentation">
                                                        <tr style="border-collapse:collapse">
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;line-height:21px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                <strong>¿Cuál?: </strong>
                                                            </td>
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                &nbsp; {{$visita?->what_housing}}
                                                            </td>
                                                        </tr>
                                                        <tr style="border-collapse:collapse">
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;line-height:21px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                <strong>¿Cuál?: </strong>
                                                            </td>
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                &nbsp; {{$visita?->what_other_housing}}
                                                            </td>
                                                        </tr>                                                        
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr style="border-collapse:collapse">
                        <td align="left"
                            style="Margin:0;padding-bottom:0px;padding-top:0px;padding-left:20px;padding-right:20px">
                            <table class="es-left" cellspacing="0" cellpadding="0" align="left"
                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
                                <tr style="border-collapse:collapse">
                                    <td class="es-m-p20b" align="left"
                                        style="padding:0;Margin:0;width:430px">
                                        <table
                                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;border-left:1px solid transparent;border-top:1px solid transparent;border-bottom:1px solid transparent;background-color:#efefef;background-position:center top"
                                            width="100%" cellspacing="0" cellpadding="0"
                                            bgcolor="#efefef" role="presentation">
                                            <tr style="border-collapse:collapse">
                                                <td align="left"
                                                    style="Margin:0;padding-bottom:10px;padding-top:20px;padding-left:20px;padding-right:20px">
                                                    
                                                </td>
                                            </tr>
                                            <tr style="border-collapse:collapse">
                                                <td align="left"
                                                    style="padding:0;Margin:0;padding-left:20px;padding-right:20px">
                                                    <table
                                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:100%"
                                                        class="cke_show_border" cellspacing="1"
                                                        cellpadding="1" border="0" align="left"
                                                        role="presentation">
                                                        <tr style="border-collapse:collapse">
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;line-height:21px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                <strong>La vivienda cuenta con: </strong>
                                                            </td>
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                &nbsp; 
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <table class="es-right" cellspacing="0" cellpadding="0" align="right"
                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right">
                                <tr style="border-collapse:collapse">
                                    <td align="left" style="padding:0;Margin:0;width:430px">
                                        <table
                                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;border-left:1px solid transparent;border-right:1px solid transparent;border-top:1px solid transparent;border-bottom:1px solid transparent;background-color:#efefef;background-position:center top"
                                            width="100%" cellspacing="0" cellpadding="0"
                                            bgcolor="#efefef" role="presentation">
                                            <tr style="border-collapse:collapse">
                                                <td align="left"
                                                    style="Margin:0;padding-bottom:10px;padding-top:20px;padding-left:20px;padding-right:20px">
                                                    
                                                </td>
                                            </tr>
                                            <tr style="border-collapse:collapse">
                                                <td align="left"
                                                    style="padding:0;Margin:0;padding-left:20px;padding-right:20px">
                                                    <table
                                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:100%"
                                                        class="cke_show_border" cellspacing="1"
                                                        cellpadding="1" border="0" align="left"
                                                        role="presentation">
                                                        <tr style="border-collapse:collapse">
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;line-height:21px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                
                                                            </td>
                                                            <td
                                                                style="padding:0;Margin:0;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;font-size:14px;line-height:21px">
                                                                &nbsp;
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr style="border-collapse:collapse">
                        <td align="left"
                        style="Margin:0;padding-bottom:0px;padding-top:0px;padding-left:20px;padding-right:20px">
                        <table class="es-left" cellspacing="0" cellpadding="0" align="left"
                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
                        <tr style="border-collapse:collapse">
                            <td class="es-m-p20b" align="left"
                            style="padding:0;Margin:0;width:430px">
                                        <table
                                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;border-left:1px solid transparent;border-top:1px solid transparent;border-bottom:1px solid transparent;background-color:#efefef;background-position:center top"
                                            width="100%" cellspacing="0" cellpadding="0"
                                            bgcolor="#efefef" role="presentation">
                                            <tr style="border-collapse:collapse">
                                                <td align="left"
                                                    style="Margin:0;padding-bottom:10px;padding-top:20px;padding-left:20px;padding-right:20px">
                                                    
                                                </td>
                                            </tr>
                                            <tr style="border-collapse:collapse">
                                                <td align="left"
                                                    style="padding:0;Margin:0;padding-left:20px;padding-right:20px">
                                                    <table
                                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:100%"
                                                        class="cke_show_border" cellspacing="1"
                                                        cellpadding="1" border="0" align="left"
                                                        role="presentation">
                                                        <tr style="border-collapse:collapse">
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;line-height:21px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                <strong>Baño: </strong>
                                                            </td>
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                &nbsp; {{$visita?->has_bathrom}}
                                                            </td>
                                                        </tr>
                                                        <tr style="border-collapse:collapse">
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;line-height:21px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                <strong>Gas: </strong>
                                                            </td>
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                &nbsp; {{$visita?->has_gas}}
                                                            </td>
                                                        </tr>
                                                        <tr style="border-collapse:collapse">
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;line-height:21px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                <strong>Agua: </strong>
                                                            </td>
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                &nbsp; {{$visita?->has_water}}
                                                            </td>
                                                        </tr>
                                                        
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <table class="es-right" cellspacing="0" cellpadding="0" align="right"
                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right">
                                <tr style="border-collapse:collapse">
                                    <td align="left" style="padding:0;Margin:0;width:430px">
                                        <table
                                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;border-left:1px solid transparent;border-right:1px solid transparent;border-top:1px solid transparent;border-bottom:1px solid transparent;background-color:#efefef;background-position:center top"
                                            width="100%" cellspacing="0" cellpadding="0"
                                            bgcolor="#efefef" role="presentation">
                                            <tr style="border-collapse:collapse">
                                                <td align="left"
                                                    style="Margin:0;padding-bottom:10px;padding-top:20px;padding-left:20px;padding-right:20px">
                                                    
                                                </td>
                                            </tr>
                                            <tr style="border-collapse:collapse">
                                                <td align="left"
                                                    style="padding:0;Margin:0;padding-left:20px;padding-right:20px">
                                                    <table
                                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:100%"
                                                        class="cke_show_border" cellspacing="1"
                                                        cellpadding="1" border="0" align="left"
                                                        role="presentation">
                                                        <tr style="border-collapse:collapse">
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;line-height:21px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                <strong>Luz: </strong>
                                                            </td>
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                &nbsp; {{$visita?->has_electricity}}
                                                            </td>
                                                        </tr>
                                                        <tr style="border-collapse:collapse">
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;line-height:21px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                <strong>Teléfono: </strong>
                                                            </td>
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                &nbsp; {{$visita?->has_thelephone}}
                                                            </td>
                                                        </tr>
                                                        <tr style="border-collapse:collapse">
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;line-height:21px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                <strong>Internet: </strong>
                                                            </td>
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                &nbsp; {{$visita?->has_internet}}
                                                            </td>
                                                        </tr>                                                      
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr style="border-collapse:collapse">
                        <td align="left"
                            style="Margin:0;padding-bottom:0px;padding-top:0px;padding-left:20px;padding-right:20px">
                            <table class="es-left" cellspacing="0" cellpadding="0" align="left"
                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
                                <tr style="border-collapse:collapse">
                                    <td class="es-m-p20b" align="left"
                                        style="padding:0;Margin:0;width:430px">
                                        <table
                                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;border-left:1px solid transparent;border-top:1px solid transparent;border-bottom:1px solid transparent;background-color:#efefef;background-position:center top"
                                            width="100%" cellspacing="0" cellpadding="0"
                                            bgcolor="#efefef" role="presentation">
                                            <tr style="border-collapse:collapse">
                                                <td align="left"
                                                    style="Margin:0;padding-bottom:10px;padding-top:20px;padding-left:20px;padding-right:20px">
                                                    
                                                </td>
                                            </tr>
                                            <tr style="border-collapse:collapse">
                                                <td align="left"
                                                    style="padding:0;Margin:0;padding-left:20px;padding-right:20px">
                                                    <table
                                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:100%"
                                                        class="cke_show_border" cellspacing="1"
                                                        cellpadding="1" border="0" align="left"
                                                        role="presentation">
                                                        <tr style="border-collapse:collapse">
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;line-height:21px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                <strong>Pisos: </strong>
                                                            </td>
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                &nbsp; 
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <table class="es-right" cellspacing="0" cellpadding="0" align="right"
                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right">
                                <tr style="border-collapse:collapse">
                                    <td align="left" style="padding:0;Margin:0;width:430px">
                                        <table
                                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;border-left:1px solid transparent;border-right:1px solid transparent;border-top:1px solid transparent;border-bottom:1px solid transparent;background-color:#efefef;background-position:center top"
                                            width="100%" cellspacing="0" cellpadding="0"
                                            bgcolor="#efefef" role="presentation">
                                            <tr style="border-collapse:collapse">
                                                <td align="left"
                                                    style="Margin:0;padding-bottom:10px;padding-top:20px;padding-left:20px;padding-right:20px">
                                                    
                                                </td>
                                            </tr>
                                            <tr style="border-collapse:collapse">
                                                <td align="left"
                                                    style="padding:0;Margin:0;padding-left:20px;padding-right:20px">
                                                    <table
                                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:100%"
                                                        class="cke_show_border" cellspacing="1"
                                                        cellpadding="1" border="0" align="left"
                                                        role="presentation">
                                                        <tr style="border-collapse:collapse">
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;line-height:21px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                            </td>
                                                            <td
                                                                style="padding:0;Margin:0;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;font-size:14px;line-height:21px">
                                                                &nbsp;
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr style="border-collapse:collapse">
                        <td align="left"
                        style="Margin:0;padding-bottom:0px;padding-top:0px;padding-left:20px;padding-right:20px">
                        <table class="es-left" cellspacing="0" cellpadding="0" align="left"
                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
                        <tr style="border-collapse:collapse">
                            <td class="es-m-p20b" align="left"
                            style="padding:0;Margin:0;width:430px">
                                        <table
                                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;border-left:1px solid transparent;border-top:1px solid transparent;border-bottom:1px solid transparent;background-color:#efefef;background-position:center top"
                                            width="100%" cellspacing="0" cellpadding="0"
                                            bgcolor="#efefef" role="presentation">
                                            <tr style="border-collapse:collapse">
                                                <td align="left"
                                                    style="Margin:0;padding-bottom:10px;padding-top:20px;padding-left:20px;padding-right:20px">
                                                    
                                                </td>
                                            </tr>
                                            <tr style="border-collapse:collapse">
                                                <td align="left"
                                                    style="padding:0;Margin:0;padding-left:20px;padding-right:20px">
                                                    <table
                                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:100%"
                                                        class="cke_show_border" cellspacing="1"
                                                        cellpadding="1" border="0" align="left"
                                                        role="presentation">
                                                        <tr style="border-collapse:collapse">
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;line-height:21px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;max-width: 3px;">
                                                                <strong>Baldosa: </strong>
                                                            </td>
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                &nbsp; {{$visita?->has_tile}}
                                                            </td>
                                                        </tr>
                                                        <tr style="border-collapse:collapse">
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;line-height:21px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                <strong>Cerámica: </strong>
                                                            </td>
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                &nbsp; {{$visita?->has_ceramic}}
                                                            </td>
                                                        </tr>                                                      
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <table class="es-right" cellspacing="0" cellpadding="0" align="right"
                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right">
                                <tr style="border-collapse:collapse">
                                    <td align="left" style="padding:0;Margin:0;width:430px">
                                        <table
                                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;border-left:1px solid transparent;border-right:1px solid transparent;border-top:1px solid transparent;border-bottom:1px solid transparent;background-color:#efefef;background-position:center top"
                                            width="100%" cellspacing="0" cellpadding="0"
                                            bgcolor="#efefef" role="presentation">
                                            <tr style="border-collapse:collapse">
                                                <td align="left"
                                                    style="Margin:0;padding-bottom:10px;padding-top:20px;padding-left:20px;padding-right:20px">
                                                    
                                                </td>
                                            </tr>
                                            <tr style="border-collapse:collapse">
                                                <td align="left"
                                                    style="padding:0;Margin:0;padding-left:20px;padding-right:20px">
                                                    <table
                                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:100%"
                                                        class="cke_show_border" cellspacing="1"
                                                        cellpadding="1" border="0" align="left"
                                                        role="presentation">
                                                        <tr style="border-collapse:collapse">
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;line-height:21px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                <strong>Cemento: </strong>
                                                            </td>
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                &nbsp; {{$visita?->has_asphalt}}
                                                            </td>
                                                        </tr> 
                                                        <tr style="border-collapse:collapse">
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;line-height:21px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                <strong style="color:#efefef">_</strong>
                                                            </td>
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                &nbsp;
                                                            </td>
                                                        </tr>                                                     
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr style="border-collapse:collapse">
                        <td align="left"
                            style="Margin:0;padding-bottom:0px;padding-top:0px;padding-left:20px;padding-right:20px">
                            <table class="es-left" cellspacing="0" cellpadding="0" align="left"
                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
                                <tr style="border-collapse:collapse">
                                    <td class="es-m-p20b" align="left"
                                        style="padding:0;Margin:0;width:430px">
                                        <table
                                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;border-left:1px solid transparent;border-top:1px solid transparent;border-bottom:1px solid transparent;background-color:#efefef;background-position:center top"
                                            width="100%" cellspacing="0" cellpadding="0"
                                            bgcolor="#efefef" role="presentation">
                                            <tr style="border-collapse:collapse">
                                                <td align="left"
                                                    style="Margin:0;padding-bottom:10px;padding-top:20px;padding-left:20px;padding-right:20px">
                                                    
                                                </td>
                                            </tr>
                                            <tr style="border-collapse:collapse">
                                                <td align="left"
                                                    style="padding:0;Margin:0;padding-left:20px;padding-right:20px">
                                                    <table
                                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:100%"
                                                        class="cke_show_border" cellspacing="1"
                                                        cellpadding="1" border="0" align="left"
                                                        role="presentation">
                                                        <tr style="border-collapse:collapse">
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;line-height:21px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                <strong>Aspectos socioeconómicos </strong>
                                                            </td>
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                &nbsp; 
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <table class="es-right" cellspacing="0" cellpadding="0" align="right"
                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right">
                                <tr style="border-collapse:collapse">
                                    <td align="left" style="padding:0;Margin:0;width:430px">
                                        <table
                                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;border-left:1px solid transparent;border-right:1px solid transparent;border-top:1px solid transparent;border-bottom:1px solid transparent;background-color:#efefef;background-position:center top"
                                            width="100%" cellspacing="0" cellpadding="0"
                                            bgcolor="#efefef" role="presentation">
                                            <tr style="border-collapse:collapse">
                                                <td align="left"
                                                    style="Margin:0;padding-bottom:10px;padding-top:20px;padding-left:20px;padding-right:20px">
                                                    
                                                </td>
                                            </tr>
                                            <tr style="border-collapse:collapse">
                                                <td align="left"
                                                    style="padding:0;Margin:0;padding-left:20px;padding-right:20px">
                                                    <table
                                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:100%"
                                                        class="cke_show_border" cellspacing="1"
                                                        cellpadding="1" border="0" align="left"
                                                        role="presentation">
                                                        <tr style="border-collapse:collapse">
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;line-height:21px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                            </td>
                                                            <td
                                                                style="padding:0;Margin:0;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;font-size:14px;line-height:21px">
                                                                &nbsp; 
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr style="border-collapse:collapse">
                        <td align="left"
                            style="Margin:0;padding-bottom:0px;padding-top:0px;padding-left:20px;padding-right:20px">
                            <table class="es-right" cellspacing="0" cellpadding="0" align="right"
                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right">
                                <t<tr style="border-collapse:collapse">
                                    <td align="left" style="padding:0;Margin:0;width:900px">
                                        <table
                                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;border-left:1px solid transparent;border-right:1px solid transparent;border-top:1px solid transparent;border-bottom:1px solid transparent;background-color:#efefef;background-position:center top"
                                            width="100%" cellspacing="0" cellpadding="0"
                                            bgcolor="#efefef" role="presentation">
                                            <tr style="border-collapse:collapse">
                                                <td align="left"
                                                    style="padding:0;Margin:0;padding-bottom:20px;padding-left:20px;padding-right:20px">
                                                    <table
                                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:100%"
                                                        class="cke_show_border" cellspacing="1"
                                                        cellpadding="1" border="0" align="left"
                                                        role="presentation">
                                                        <tr style="border-collapse:collapse">
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;line-height:21px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;max-width: 35px;">
                                                                <strong>¿Alguien más aporta económicamente para satisfacer las necesidades básicas?: </strong>&nbsp;
                                                            </td>
                                                            <td
                                                                style="padding:0;Margin:0;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;font-size:14px;line-height:21px;" align="justify">
                                                                {{$visita?->another_contribution}}
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr style="border-collapse:collapse">
                        <td align="left"
                            style="Margin:0;padding-bottom:0px;padding-top:0px;padding-left:20px;padding-right:20px">
                            <table class="es-left" cellspacing="0" cellpadding="0" align="left"
                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
                                <tr style="border-collapse:collapse">
                                    <td class="es-m-p20b" align="left"
                                        style="padding:0;Margin:0;width:430px">
                                        <table
                                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;border-left:1px solid transparent;border-top:1px solid transparent;border-bottom:1px solid transparent;background-color:#efefef;background-position:center top"
                                            width="100%" cellspacing="0" cellpadding="0"
                                            bgcolor="#efefef" role="presentation">
                                            <tr style="border-collapse:collapse">
                                                <td align="left"
                                                    style="Margin:0;padding-bottom:10px;padding-top:20px;padding-left:20px;padding-right:20px">
                                                    
                                                </td>
                                            </tr>
                                            <tr style="border-collapse:collapse">
                                                <td align="left"
                                                    style="padding:0;Margin:0;padding-bottom:20px;padding-left:20px;padding-right:20px">
                                                    <table
                                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:100%"
                                                        class="cke_show_border" cellspacing="1"
                                                        cellpadding="1" border="0" align="left"
                                                        role="presentation">
                                                        <tr style="border-collapse:collapse">
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;line-height:21px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                <strong>Nombres: </strong>
                                                            </td>
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                &nbsp; {{$visita?->name_contribution}}
                                                            </td>
                                                        </tr>
                                                        <tr style="border-collapse:collapse">
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;line-height:21px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                <strong>Parentesco: </strong>
                                                            </td>
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                &nbsp; {{$visita?->relationship_contribution}}
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <table class="es-right" cellspacing="0" cellpadding="0" align="right"
                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right">
                                <tr style="border-collapse:collapse">
                                    <td align="left" style="padding:0;Margin:0;width:430px">
                                        <table
                                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;border-left:1px solid transparent;border-right:1px solid transparent;border-top:1px solid transparent;border-bottom:1px solid transparent;background-color:#efefef;background-position:center top"
                                            width="100%" cellspacing="0" cellpadding="0"
                                            bgcolor="#efefef" role="presentation">
                                            <tr style="border-collapse:collapse">
                                                <td align="left"
                                                    style="Margin:0;padding-bottom:10px;padding-top:20px;padding-left:20px;padding-right:20px">
                                                    
                                                </td>
                                            </tr>
                                            <tr style="border-collapse:collapse">
                                                <td align="left"
                                                    style="padding:0;Margin:0;padding-bottom:20px;padding-left:20px;padding-right:20px">
                                                    <table
                                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:100%"
                                                        class="cke_show_border" cellspacing="1"
                                                        cellpadding="1" border="0" align="left"
                                                        role="presentation">
                                                        <tr style="border-collapse:collapse">
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;line-height:21px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                <strong>Apellidos: </strong>
                                                            </td>
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                &nbsp; {{$visita?->surname_contribution}}
                                                            </td>
                                                        </tr>
                                                        <tr style="border-collapse:collapse">
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;line-height:21px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                <strong>Ocupación: </strong>
                                                            </td>
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                &nbsp; {{$visita?->position_contribution}}
                                                            </td>
                                                        </tr>                                                        
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <!-- fin seccion -->
                    <!-- inicio baner seccion -->
                    <tr style="border-collapse:collapse">
                        <td align="left"
                            style="padding:0;Margin:0;padding-left:20px;padding-right:20px">
                            <table cellpadding="0" cellspacing="0" width="100%">
                                <tbody>
                                    <tr style="border-collapse:collapse">
                                        <td align="left" style="padding:0;Margin:0;padding-top:20px;">
                                            <table cellpadding="0" cellspacing="0" class="es-footer"
                                                align="center"
                                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top">
                                                <tbody>
                                                    <tr style="border-collapse:collapse">
                                                        <td align="center" style="padding:0;Margin:0">
                                                            <table class="es-footer-body"
                                                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#333333;"
                                                                cellspacing="0" cellpadding="0"
                                                                align="center">
                                                                <tbody>
                                                                    <tr
                                                                        style="border-collapse:collapse">
                                                                        <td style="Margin:0;padding-top:10px;padding-bottom:10px;padding-left:20px;padding-right:20px;background-color:#000000"
                                                                            align="left">
                                                                            <table width="100%"
                                                                                cellspacing="0"
                                                                                cellpadding="0">
                                                                                <tbody>
                                                                                    <tr
                                                                                        style="border-collapse:collapse">
                                                                                        <td valign="top"
                                                                                            align="center"
                                                                                            style="padding:0;Margin:0;width:860px">
                                                                                            <table
                                                                                                width="100%"
                                                                                                cellspacing="0"
                                                                                                cellpadding="0"
                                                                                                role="presentation">
                                                                                                <tbody>
                                                                                                    <tr
                                                                                                        style="border-collapse:collapse">
                                                                                                        <td align="left"
                                                                                                            style="padding:0;Margin:0">
                                                                                                            <p
                                                                                                                style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:21px;color:rgb(255, 255, 255);font-size:14px">
                                                                                                                ANOTACIONES DEL ENCUESTADOR
                                                                                                            </p>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <!-- fin baner seccion -->

                    <!-- inicio seccion -->
                    <tr style="border-collapse:collapse">
                        <td align="left"
                            style="Margin:0;padding-bottom:0px;padding-top:0px;padding-left:20px;padding-right:20px">
                            <table class="es-left" cellspacing="0" cellpadding="0" align="left"
                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
                                <tr style="border-collapse:collapse">
                                    <td class="es-m-p20b" align="left"
                                        style="padding:0;Margin:0;width:430px">
                                        <table
                                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;border-left:1px solid transparent;border-top:1px solid transparent;border-bottom:1px solid transparent;background-color:#efefef;background-position:center top"
                                            width="100%" cellspacing="0" cellpadding="0"
                                            bgcolor="#efefef" role="presentation">
                                            <tr style="border-collapse:collapse">
                                                <td align="left"
                                                    style="Margin:0;padding-bottom:10px;padding-top:20px;padding-left:20px;padding-right:20px">
                                                    
                                                </td>
                                            </tr>
                                            <tr style="border-collapse:collapse">
                                                <td align="left"
                                                    style="padding:0;Margin:0;padding-left:20px;padding-right:20px">
                                                    <table
                                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:100%"
                                                        class="cke_show_border" cellspacing="1"
                                                        cellpadding="1" border="0" align="left"
                                                        role="presentation">
                                                        <tr style="border-collapse:collapse">
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;line-height:21px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                <strong>¿Ha quedado pendiente algún documento por entregar?: </strong>
                                                            </td>
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                &nbsp; {{$visita?->pending_documents}}
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <table class="es-right" cellspacing="0" cellpadding="0" align="right"
                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right">
                                <tr style="border-collapse:collapse">
                                    <td align="left" style="padding:0;Margin:0;width:430px">
                                        <table
                                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;border-left:1px solid transparent;border-right:1px solid transparent;border-top:1px solid transparent;border-bottom:1px solid transparent;background-color:#efefef;background-position:center top"
                                            width="100%" cellspacing="0" cellpadding="0"
                                            bgcolor="#efefef" role="presentation">
                                            <tr style="border-collapse:collapse">
                                                <td align="left"
                                                    style="Margin:0;padding-bottom:10px;padding-top:20px;padding-left:20px;padding-right:20px">
                                                    
                                                </td>
                                            </tr>
                                            <tr style="border-collapse:collapse">
                                                <td align="left"
                                                    style="padding:0;Margin:0;padding-left:20px;padding-right:20px">
                                                    <table
                                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:100%"
                                                        class="cke_show_border" cellspacing="1"
                                                        cellpadding="1" border="0" align="left"
                                                        role="presentation">
                                                        <tr style="border-collapse:collapse">
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;line-height:21px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                
                                                            </td>
                                                            <td
                                                                style="padding:0;Margin:0;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;font-size:14px;line-height:21px">
                                                                &nbsp;
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr style="border-collapse:collapse">
                        <td align="left"
                            style="Margin:0;padding-bottom:0px;padding-top:0px;padding-left:20px;padding-right:20px">
                            <table class="es-right" cellspacing="0" cellpadding="0" align="right"
                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right">
                                <t<tr style="border-collapse:collapse">
                                    <td align="left" style="padding:0;Margin:0;width:900px">
                                        <table
                                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;border-left:1px solid transparent;border-right:1px solid transparent;border-top:1px solid transparent;border-bottom:1px solid transparent;background-color:#efefef;background-position:center top"
                                            width="100%" cellspacing="0" cellpadding="0"
                                            bgcolor="#efefef" role="presentation">
                                            <tr style="border-collapse:collapse">
                                                <td align="left"
                                                    style="padding:0;Margin:0;padding-bottom:20px;padding-left:20px;padding-right:20px">
                                                    <table
                                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:100%"
                                                        class="cke_show_border" cellspacing="1"
                                                        cellpadding="1" border="0" align="left"
                                                        role="presentation">
                                                        <tr style="border-collapse:collapse">
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;line-height:21px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;max-width: 45px;">
                                                                <strong>¿En la visita se logró constatar la veracidad de la información registrada en la hoja de vida?: </strong>&nbsp;
                                                            </td>
                                                            <td
                                                                style="padding:0;Margin:0;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;font-size:14px;line-height:21px;" align="justify">
                                                                {{$visita?->truthful_information}}
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr style="border-collapse:collapse">
                        <td align="left"
                            style="Margin:0;padding-bottom:0px;padding-top:0px;padding-left:20px;padding-right:20px">
                            <table class="es-left" cellspacing="0" cellpadding="0" align="left"
                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
                                <tr style="border-collapse:collapse">
                                    <td align="left" style="padding:0;Margin:0;width:900px">
                                        <table
                                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;border-left:1px solid transparent;border-right:1px solid transparent;border-top:1px solid transparent;border-bottom:1px solid transparent;background-color:#efefef;background-position:center top"
                                            width="100%" cellspacing="0" cellpadding="0"
                                            bgcolor="#efefef" role="presentation">
            
                                            <tr style="border-collapse:collapse">
                                                <td align="left"
                                                    style="padding:0;Margin:0;padding-left:20px;padding-right:20px">
                                                    <table
                                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:100%"
                                                        class="cke_show_border" cellspacing="1"
                                                        cellpadding="1" border="0" align="left"
                                                        role="presentation">
                                                        <tr style="border-collapse:collapse">
                                                            <td
                                                                style="padding:0;Margin:0;font-size:14px;line-height:21px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                <strong>Observaciones: </strong>&nbsp;
                                                            </td>
                                                            <td
                                                                style="padding:0;Margin:0;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;font-size:14px;line-height:21px;" align="justify">
                                                                {{nl2br($visita?->description)}}
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <!-- fin seccion -->
                    <tr style="border-collapse:collapse">
                        <td align="left"
                            style="Margin:0;padding-bottom:0px;padding-top:30px;padding-left:20px;padding-right:20px">
                            <table class="es-left" cellspacing="0" cellpadding="0"
                                align="left"
                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
                                <tbody>
                                    <tr style="border-collapse:collapse">
                                        @foreach ($visita->rel_imagenes as $key => $i)
                                        @if (($key % 2) == 0)
                                        <td align="left"
                                            style="padding:0;Margin:0;width:430px">
                                            <table
                                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;border-left:1px solid transparent;border-right:1px solid transparent;border-top:1px solid transparent;border-bottom:1px solid transparent;background-color:#ffffff;background-position:center top"
                                                width="100%" cellspacing="0" cellpadding="0"
                                                bgcolor="#efefef" role="presentation">
                                                <tbody>
                                                    <tr style="border-collapse:collapse">
                                                        <td align="left"
                                                            style="padding:0;Margin:0;padding-bottom:20px;padding-left:20px;padding-right:20px">
                                                            <table
                                                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:100%"
                                                                class="cke_show_border"
                                                                cellspacing="1"
                                                                cellpadding="1" border="0"
                                                                align="left"
                                                                role="presentation">
                                                                <tbody>
                                                                    <tr
                                                                        style="border-collapse:collapse">
                                                                        <td
                                                                            style="padding:0;Margin:0;font-size:14px;line-height:21px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                            <div id="main_content_wrap"
                                                                                class="outer m-portlet__foot mx-auto mb-3">
                                                                                <section
                                                                                    id="main_content"
                                                                                    class="inner">
                                                                                    <div
                                                                                        style="text-align: center">
                                                                                        <a href="/Adjuntos/Visita Domiciliaria/{{ $visita?->rel_empleado?->identification.'/'.$i->image }}" download>
                                                                                        <img src="/Adjuntos/Visita Domiciliaria/{{ $visita?->rel_empleado?->identification.'/'.$i->image }}"
                                                                                            style="max-width: 100%;">
                                                                                        </a>
                                                                                    </div>
                                                                                </section>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <p
                                                                style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:21px;color:#333333;font-size:14px">
                                                                <br>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        @else
                                        @endif
                                        @endforeach
                                    </tr>
                                    <tr style="border-collapse:collapse">
                                        @foreach ($visita?->rel_imagenes as $key => $i)
                                        @if (!(($key % 2) == 0))
                                        <td align="left"
                                            style="padding:0;Margin:0;width:430px">
                                            <table
                                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;border-left:1px solid transparent;border-right:1px solid transparent;border-top:1px solid transparent;border-bottom:1px solid transparent;background-color:#ffffff;background-position:center top"
                                                width="100%" cellspacing="0" cellpadding="0"
                                                bgcolor="#efefef" role="presentation">
                                                <tbody>
                                                    <tr style="border-collapse:collapse">
                                                        <td align="left"
                                                            style="padding:0;Margin:0;padding-bottom:20px;padding-left:20px;padding-right:20px">
                                                            <table
                                                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:100%"
                                                                class="cke_show_border"
                                                                cellspacing="1"
                                                                cellpadding="1" border="0"
                                                                align="left"
                                                                role="presentation">
                                                                <tbody>
                                                                    <tr
                                                                        style="border-collapse:collapse">
                                                                        <td
                                                                            style="padding:0;Margin:0;font-size:14px;line-height:21px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                            <div id="main_content_wrap"
                                                                                class="outer m-portlet__foot mx-auto mb-3">
                                                                                <section
                                                                                    id="main_content"
                                                                                    class="inner">
                                                                                    <div
                                                                                        style="text-align: center">
                                                                                        <a href="/Adjuntos/Visita Domiciliaria/{{ $visita?->rel_empleado?->identification.'/'.$i->image }}" download>
                                                                                        <img src="/Adjuntos/Visita Domiciliaria/{{ $visita?->rel_empleado?->identification.'/'.$i->image }}"
                                                                                            style="max-width: 100%;">
                                                                                        </a>
                                                                                    </div>
                                                                                </section>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <p
                                                                style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:21px;color:#333333;font-size:14px">
                                                                <br>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        @else
                                        @endif
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr style="border-collapse:collapse">
                        <td align="center" valign="top"
                            style="padding:0;Margin:0;width:860px">
                            <table cellpadding="0" cellspacing="0" width="100%"
                                role="presentation"
                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;margin-top: 10px;">
                                <tr style="border-collapse:collapse">
                                    <td style="padding:0;Margin:0">
                                        <h4 style="padding-bottom: 10px; Margin: 0px 0px 0px 7px;line-height:120%;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;color:#303c54">
                                            {{-- Tilulo Firmas: </h4> --}}
                                        <table
                                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:100%;height:36px;font-family:Roboto, sans-serif;font-size:90%;"
                                            role="presentation">
                                            <tr
                                                style="border-collapse:collapse;height:30px;">
                                                <td
                                                    style="padding:1em;Margin:0;text-align:center">
                                                    Aspirante
                                                    <section id="main_content" class="inner">
                                                        <div style="text-align: center">
                                                            <img draggable="false" src="{{ asset('Adjuntos/Visita Domiciliaria/'.$visita?->applicant_signature) }}" width="200" style="margin-top: 10px;">
                                                            <h5 style="Margin:0;line-height:120%;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;color:#303c54">
                                                                {{-- empleaado --}}
                                                                {{ $visita?->rel_empleado?->name.' '.$visita?->rel_empleado?->surname }}</br>
                                                                {{ $visita?->rel_empleado?->identification }}
                                                            </h5>
                                                        </div>
                                                    </section>
                                                </td>
                                                <td
                                                    style="padding:1em;Margin:0;text-align:center">
                                                    Entrevistador
                                                    <section id="main_content" class="inner">
                                                        <div style="text-align: center">
                                                            <img draggable="false" src="{{ asset('Adjuntos/Visita Domiciliaria/'.$visita?->interviewer_signature) }}" width="200" style="margin-top: 10px;">
                                                            <h5 style="Margin:0;line-height:120%;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;color:#303c54">
                                                                {{-- encuestador --}}
                                                                {{ $visita?->rel_usuario?->name }}</br>
                                                                {{ $visita?->rel_usuario?->identification }}
                                                            </h5>
                                                        </div>
                                                    </section>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
                    <table class="es-content-body"
                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:900px"
                        cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" align="center">
                        <tbody>
                            <tr style="border-collapse:collapse">
                                <td align="left" style="padding:10px;Margin:0">
                                    <table class="es-left" cellspacing="0" cellpadding="0" align="left"
                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
                                        <tbody>
                                            <tr style="border-collapse:collapse">
                                                <td align="left" style="padding:0;Margin:0;width:430px">
                                                    <table width="100%" cellspacing="0" cellpadding="0"
                                                        role="presentation"
                                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                        <tbody>
                                                            <tr style="border-collapse:collapse">
                                                                <td class="es-infoblock" align="left"
                                                                    style="padding:0;Margin:0;line-height:14px;font-size:12px;color:#CCCCCC">
                                                                    <p
                                                                        style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:14px;color:#CCCCCC;font-size:12px">
                                                                        {{ config('app.name') }}
                                                                    </p>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="es-right" cellspacing="0" cellpadding="0" align="right"
                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right;">
                                        <tbody>
                                            <tr style="border-collapse:collapse">
                                                <td align="left" style="padding:0;Margin:0;width:430px">
                                                    <table width="100%" cellspacing="0" cellpadding="0"
                                                        role="presentation"
                                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                        <tbody>
                                                            <tr style="border-collapse:collapse">
                                                                <td align="right" class="es-infoblock"
                                                                    style="padding:0;Margin:0;line-height:14px;font-size:12px;color:#CCCCCC">
                                                                    <p
                                                                        style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:14px;color:#CCCCCC;font-size:12px">
                                                                        {{date('d-m-Y h:i:s a',strtotime($visita?->created_at))}}</p>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
        <script src="{{asset('js/jquery.min.js')}}"></script>
    </body>

</html>