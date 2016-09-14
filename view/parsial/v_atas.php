<!DOCTYPE html>
<html style="min-height: 1767px;"><head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <title><?php echo $judul_halaman; ?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- bootstrap 3.0.2 -->
    <link href="data/bootstrap.css" rel="stylesheet" type="text/css">
    <!-- font Awesome -->
    <link href="data/font-awesome.css" rel="stylesheet" type="text/css">
    <!-- Ionicons -->
    <link href="data/ionicons.css" rel="stylesheet" type="text/css">
    <!-- Theme style -->
    <link href="data/style.css" rel="stylesheet" type="text/css">




    <link rel="stylesheet" href="data/validationEngine.jquery.css" type="text/css"/>
    <script src="data/jquery-1.8.2.min.js" type="text/javascript" charset="utf-8">
    </script>
    <script src="data/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8">
    </script>
    <script src="data/jquery.validationEngine.js" type="text/javascript" charset="utf-8">
    </script>
    <script>
        jQuery(document).ready(function(){
            // binds form submission and fields to the validation engine
            jQuery("#formID").validationEngine();
        });

        /**
         *
         * @param {jqObject} the field where the validation applies
         * @param {Array[String]} validation rules for this field
         * @param {int} rule index
         * @param {Map} form options
         * @return an error string if validation failed
         */
        function checkHELLO(field, rules, i, options){
            if (field.val() != "HELLO") {
                // this allows to use i18 for the error msgs
                return options.allrules.validate2fields.alertText;
            }
        }
    </script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style></head>
<body style="min-height: 1767px;" class="wysihtml5-supported  pace-done skin-blue fixed">



<div class="pace  pace-inactive"><div data-progress="99" data-progress-text="100%" style="width: 100%;" class="pace-progress">
        <div class="pace-progress-inner"></div>
    </div>
    <div class="pace-activity"></div></div>

<?php require_once "box/header.php"; ?>

<div style="min-height: 533px;" class="wrapper row-offcanvas row-offcanvas-left">