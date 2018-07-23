<?php
/*
 * Initial Resume Builder Template
 */

require_once __DIR__ . '/Template.php';
$templateObj = new Template();
$templatesFiles = $templateObj->getTemplates();
$templates = ($templatesFiles) ? $templatesFiles : [];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Resume Builder</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
            body {
                font: 20px Montserrat, sans-serif;
                line-height: 1.8;
                color: #f5f6f7;
            }
            p {font-size: 16px;}
            .margin {margin-bottom: 45px;}
            .bg-1 { 
                background-color: #1abc9c; /* Green */
                color: #ffffff;
                min-height: 470px;
            }
            .bg-4 { 
                background-color: #2f2f2f; /* Black Gray */
                color: #fff;
            }

            select{
                width:440px;
                color: #ccc;
                font-size: 16px;
            }
            .container-fluid {
                padding-top: 70px;
                padding-bottom: 70px;
            }
            .navbar {
                padding-top: 15px;
                padding-bottom: 15px;
                border: 0;
                border-radius: 0;
                margin-bottom: 0;
                font-size: 12px;
                letter-spacing: 5px;
            }
            .navbar-nav  li a:hover {
                color: #1abc9c !important;
            }

            #downloadcontent{
                display: none;
                width: 450px;
                margin: 0 auto;
            }

            #downloadcontent a{
                color:#fff;
                font-size: 14px;
                font-weight: 600;
                text-decoration: underline;
            }
        </style>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function (e) {
                jQuery('#choosetemplate').on('change', function (ev) {
                    jQuery('#downloadcontent').hide();
                    var template = $(this).val();
                    if (template !== '') {
                        console.log(template);
                        jQuery.ajax({
                            url: 'action.php',
                            method: 'POST',
                            data: {
                                template: template
                            },
                            dataType: 'json',
                            success: function (response) {
                                console.log(response);
                                if (response.success) {
                                    jQuery('#pdfdownload').attr('href', response.pdf);
                                    jQuery('#docxownload').attr('href', response.docx);
                                    jQuery('#downloadcontent').show();
                                } else {
                                    jQuery('#downloadcontent').hide();
                                    alert(response.message);
                                }
                            }
                        });
                    } else {
                        jQuery('#pdfdownload').attr('href', '#');
                        jQuery('#docxownload').attr('href', '#');
                        jQuery('#downloadcontent').hide();
                    }
                });
            });
        </script>
    </head>
    <body>

        <!-- Navbar -->
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                    <a class="navbar-brand" href="index.php">Resume Builder</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- First Container -->
        <div id="about" class="container-fluid bg-1 text-center">
            <h3 class="margin">Please select a template for resume.</h3>
            <form>
                <div class="form-group">
                    <select class="form-control1" id="choosetemplate">
                        <option value="" selected>Choose a template</option>
                        <?php foreach ($templates as $template): ?>
                            <option value="<?php echo $template['path']; ?>"><?php echo $template['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </form>
            <div id="downloadcontent">
                <div class="col-md-6"><a id="pdfdownload" href="#" download>Download PDF <span class="glyphicon glyphicon-file"></span></a></div>
                <div class="col-md-6"><a id="docxownload" href="#" download>Download Docx <span class="glyphicon glyphicon-file"></span></a></div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="container-fluid bg-4 text-center">
            <p>Resume Builder Template</p> 
        </footer>
    </body>
</html>

