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
    <title>Acta de Reunión N° {{ $acta->consecutive }}</title>
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
                                                                    </p>
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
                                                                    <span
                                                                        style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:none;color:#659C35;font-size:16px">
                                                                        <img draggable="false"
                                                                            src="{{ asset('img/logo.png') }}"
                                                                            style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"
                                                                            class="adapt-img" width="85">
                                                            </span>
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
                                                                        style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:24px;color:#303c54;font-size:16px">
                                                                        <strong>ACTA DE REUNIÓN</strong>
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
                                                                                <strong>Acta No: </strong>
                                                                            </td>
                                                                            <td
                                                                                style="padding:0;Margin:0;font-size:14px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                                <b>&nbsp;</b> {{$acta->consecutive }}
                                                                            </td>
                                                                        </tr>
                                                                        <tr style="border-collapse:collapse">
                                                                            <td
                                                                                style="padding:0;Margin:0;font-size:14px;line-height:21px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                                <strong>Fecha: </strong>
                                                                            </td>
                                                                            <td
                                                                                style="padding:0;Margin:0;font-size:14px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                                <b>&nbsp;</b> {{ date('d-m-Y',strtotime($acta->date)) }}
                                                                            </td>
                                                                        </tr>
                                                                        <tr style="border-collapse:collapse">
                                                                            <td
                                                                                style="padding:0;Margin:0;font-size:14px;line-height:21px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                                <strong>Área: </strong>
                                                                            </td>
                                                                            <td
                                                                                style="padding:0;Margin:0;font-size:14px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                                &nbsp; {{ $acta->rel_area->nombre }}
                                                                            </td>
                                                                        </tr>
                                                                        <tr style="border-collapse:collapse">
                                                                            <td
                                                                                style="padding:0;Margin:0;font-size:14px;line-height:21px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                                <strong>Tema: </strong>
                                                                            </td>
                                                                            <td
                                                                                style="padding:0;Margin:0;font-size:14px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                                &nbsp; {{ $acta->topic }}
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                    <p
                                                                        style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:21px;color:#333333;font-size:14px">
                                                                        <br>
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
                                                                                <strong>Lugar: </strong>:
                                                                            </td>
                                                                            <td
                                                                                style="padding:0;Margin:0;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;font-size:14px;line-height:21px">
                                                                                &nbsp; {{ $acta->place }}
                                                                            </td>
                                                                        </tr>
                                                                        <tr style="border-collapse:collapse">
                                                                            <td
                                                                                style="padding:0;Margin:0;font-size:14px;line-height:21px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                                <strong>Liderada Por: </strong>:
                                                                            </td>
                                                                            <td
                                                                                style="padding:0;Margin:0;font-size:14px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                                &nbsp; {{ $acta->rel_lider->name }}
                                                                            </td>
                                                                        </tr>
                                                                        <tr style="border-collapse:collapse">
                                                                            <td
                                                                                style="padding:0;Margin:0;font-size:14px;line-height:21px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                                <strong>Hora Inicio: </strong>:
                                                                            </td>
                                                                            <td
                                                                                style="padding:0;Margin:0;font-size:14px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                                &nbsp; {{ $acta->start }}
                                                                            </td>
                                                                        </tr>
                                                                        <tr style="border-collapse:collapse">
                                                                            <td
                                                                                style="padding:0;Margin:0;font-size:14px;line-height:21px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                                <strong>Hora Fin: </strong>:
                                                                            </td>
                                                                            <td
                                                                                style="padding:0;Margin:0;font-size:14px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                                &nbsp; {{ $acta->end }}
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                    <p
                                                                        style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:21px;color:#333333;font-size:14px">
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
                                                <tr style="border-collapse:collapse">
                                                    <td align="center" valign="top"
                                                        style="padding:0;Margin:0;width:860px">
                                                        <table cellpadding="0" cellspacing="0" width="100%"
                                                            role="presentation"
                                                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;margin-top: 10px;">
                                                            <tr style="border-collapse:collapse">
                                                                <td style="padding:0;Margin:0">
                                                                    <h4 style="padding-bottom: 10px; Margin: 0px 0px 0px 7px;line-height:120%;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;color:#303c54">
                                                                        Orden del día: </h4>
                                                                    <table
                                                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:100%;height:36px;font-family:Roboto, sans-serif;font-size:90%;"
                                                                        role="presentation">
                                                                        @foreach ($acta->rel_orden_dia as $key => $ord)
                                                                        @if (($key % 2) == 0)
                                                                        <tr
                                                                            style="border-collapse:collapse;height:30px;border-bottom:#c1bcbc 1px solid">
                                                                            <td
                                                                                style="padding:1em;Margin:0;text-align:center">
                                                                                {{($key+1).'. '.$ord->item }}
                                                                            </td>
                                                                            @else
                                                                            <td
                                                                                style="padding:1em;Margin:0;text-align:center">
                                                                                {{ ($key+1).'. '.$ord->item }}
                                                                            </td>
                                                                        </tr>
                                                                        @endif
                                                                        @endforeach
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr style="border-collapse:collapse">
                                                    <td align="left" style="padding:0;Margin:0;padding-top:20px;">
                                                        <h4 style="padding-bottom: 10px; Margin: 0px 0px 0px 7px;line-height:120%;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;color:#303c54">
                                                            Desarrollo de la reunión: </h4>
                                                        <table cellpadding="0" cellspacing="0" class="es-footer"
                                                            align="center"
                                                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top">
                                                            <tr style="border-collapse:collapse">
                                                                <td align="center" style="padding:0;Margin:0">
                                                                    <table class="es-footer-body"
                                                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#333333;"
                                                                        cellspacing="0" cellpadding="0" align="center">
                                                                        <tr style="border-collapse:collapse">
                                                                            <td style="Margin:0;padding-top:10px;padding-bottom:10px;padding-left:20px;padding-right:20px;background-color:#fff"
                                                                            align="left">
                                                                                <table width="100%" cellspacing="0"
                                                                                    cellpadding="0">
                                                                                    <tr
                                                                                        style="border-collapse:collapse">
                                                                                        <td valign="top" align="center"
                                                                                            style="padding:0;Margin:0;width:860px">
                                                                                            <table width="100%"
                                                                                                cellspacing="0"
                                                                                                cellpadding="0"
                                                                                                role="presentation">
                                                                                                <tr
                                                                                                    style="border-collapse:collapse">
                                                                                                    <td align="left"
                                                                                                        style="padding:0;Margin:0">
                                                                                                        <p align="justify"
                                                                                                            style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;line-height:21px;color:#000;font-size:14px">
                                                                                                        {{ nl2br($acta->description) }}
                                                                                                        </b>
                                                                                                        </p>
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
                                                                        Compromisos: </h4>
                                                                    <table
                                                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:100%;height:36px;font-family:Roboto, sans-serif;font-size:90%;"
                                                                        role="presentation">
                                                                        <tr
                                                                            style="border-collapse:collapse;height:30px;text-align:center;background:#303c54;color:#ffffff">
                                                                            <td
                                                                                style="padding:0;Margin:0;width:40%;border-top-left-radius:5px">
                                                                                Compromiso</td>
                                                                            <td style="padding:0;Margin:0;width:30%">
                                                                                Responsable</td>
                                                                            <td style="padding:0;Margin:0;width:15%">
                                                                                Fecha</td>
                                                                            <td
                                                                                style="padding:0;Margin:0;width:15%;border-top-right-radius:5px">
                                                                                Cierre</td>
                                                                        </tr>
                                                                        @if(count($acta->rel_compromisos) > 0)
                                                                        @foreach ($acta->rel_compromisos as $comp)
                                                                        <tr
                                                                            style="border-collapse:collapse;height:30px;border-bottom:#c1bcbc 1px solid">
                                                                            <td
                                                                                style="padding:1em;Margin:0;text-align:center">
                                                                                {{ nl2br($comp->commitment) }}
                                                                            </td>
                                                                            <td
                                                                                style="padding:1em;Margin:0;text-align:center">
                                                                                {{ $comp->responsible }}
                                                                            </td>
                                                                            <td
                                                                                style="padding:1em;Margin:0;text-align:center">
                                                                                {{ date('d-m-Y',strtotime($comp->date_start)) }}
                                                                            </td>
                                                                            <td
                                                                                style="padding:1em;Margin:0;text-align:center">
                                                                                {{ date('d-m-Y',strtotime($comp->date_end))}}
                                                                            </td>
                                                                        </tr>
                                                                        @endforeach
                                                                        @else
                                                                        <tbody>
                                                                            <tr>
                                                                                <td colspan="4" style="padding:1em;text-align-last: center;">
                                                                                    Reunión sin compromisos adquiridos
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                        @endif
                                                                    </table>
                                                                </td>
                                                            </tr>
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
                                                                        Asistentes: </h4>
                                                                    <table
                                                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:100%;height:36px;font-family:Roboto, sans-serif;font-size:90%;"
                                                                        role="presentation">
                                                                        @foreach ($acta->rel_asistentes as $key => $val)
                                                                        @if (($key % 2) == 0)
                                                                        <tr
                                                                            style="border-collapse:collapse;height:30px;">
                                                                            <td
                                                                                style="padding:1em;Margin:0;text-align:center">
                                                                                <section id="main_content" class="inner">
                                                                                    <div style="text-align: center">
                                                                                        <img draggable="false" src="{{ asset('Adjuntos/Actas de Visitas/'.date('d_m_Y',strtotime($acta->created_at)).'/'.$val->signature) }}" width="200" style="margin-top: 10px;">
                                                                                        <h5 style="Margin:0;line-height:120%;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;color:#303c54">
                                                                                            {{ $val->attendee }}
                                                                                        </h5>
                                                                                    </div>
                                                                                </section>
                                                                            </td>
                                                                            @else
                                                                            <td
                                                                                style="padding:1em;Margin:0;text-align:center">
                                                                                <section id="main_content" class="inner">
                                                                                    <div style="text-align: center">
                                                                                        <img draggable="false" src="{{ asset('Adjuntos/Actas de Visitas/'.date('d_m_Y',strtotime($acta->created_at)).'/'.$val->signature) }}" width="200" style="margin-top: 10px;">
                                                                                        <h5 style="Margin:0;line-height:120%;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;color:#303c54">
                                                                                            {{ $val->attendee }}
                                                                                        </h5>
                                                                                    </div>
                                                                                </section>
                                                                            </td>
                                                                        </tr>
                                                                        @endif
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
                                    <tr style="border-collapse:collapse">
                                        <td align="left"
                                            style="Margin:0;padding-bottom:0px;padding-top:30px;padding-left:20px;padding-right:20px">
                                            <table class="es-left" cellspacing="0" cellpadding="0" align="left"
                                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
                                                <tbody>
                                                    <tr style="border-collapse:collapse">
                                                        <td class="es-m-p20b" align="left"
                                                            style="padding:0;Margin:0;width:430px">
                                                            <table
                                                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;border-left:1px solid transparent;border-top:1px solid transparent;border-bottom:1px solid transparent;background-color:#ffffff;background-position:center top"
                                                                width="100%" cellspacing="0" cellpadding="0"
                                                                bgcolor="#efefef" role="presentation">
                                                                <tbody>
                                                                    <tr style="border-collapse:collapse">
                                                                        <td align="left"
                                                                            style="padding:0;Margin:0;padding-bottom:20px;padding-left:20px;padding-right:20px">
                                                                            <table
                                                                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:100%"
                                                                                class="cke_show_border" cellspacing="1"
                                                                                cellpadding="1" border="0" align="left"
                                                                                role="presentation">
                                                                                <tbody>
                                                                                    <tr style="border-collapse:collapse">
                                                                                        <td style="padding:0;Margin:0;font-size:14px;line-height:21px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                                            <div id="main_content_wrap" class="outer m-portlet__foot mx-auto mb-3">

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
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <table class="es-right" cellspacing="0" cellpadding="0" align="right"
                                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right">
                                                <tbody>
                                                    <tr style="border-collapse:collapse">
                                                        <td align="left" style="padding:0;Margin:0;width:430px">
                                                            <table
                                                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;border-left:1px solid transparent;border-right:1px solid transparent;border-top:1px solid transparent;border-bottom:1px solid transparent;background-color:#ffffff;background-position:center top"
                                                                width="100%" cellspacing="0" cellpadding="0"
                                                                bgcolor="#efefef" role="presentation">
                                                                <tbody>
                                                                    <tr style="border-collapse:collapse">
                                                                        <td align="left"
                                                                            style="padding:0;Margin:0;padding-bottom:20px;padding-left:20px;padding-right:20px">
                                                                            <table
                                                                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:100%" class="cke_show_border" cellspacing="1" cellpadding="1" border="0" align="left"
                                                                                role="presentation">
                                                                                <tbody>
                                                                                    <tr
                                                                                        style="border-collapse:collapse">
                                                                                        <td style="padding:0;Margin:0;font-size:14px;line-height:21px;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif">
                                                                                            <div id="main_content_wrap" class="outer m-portlet__foot mx-auto mb-3">

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
                                                    </tr>
                                                </tbody>
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
                                                                        Alejandro Ltda
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
        </table>
    </div>
    <script src="{{asset('js/jquery.min.js')}}"></script>
</body>

</html>
