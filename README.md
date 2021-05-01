# Resume Builder ( HTML to Docx and PDF Generation Script )

This is an script implementation in php for generating Docx and PDF based on dynamic HTML content.

# Installtion

1. Clone repo to html folder using: ``` git clone https://github.com/lpkapil/resumebuilder.git ```
2. cd resumebuilder
3. chmod -R 777 ./*
4. composer install
5. chmod -R 777 ./*
6. Edit action.php and change below

```
$this->siteUrl = 'http://localhost/resumebuilder/';
```

# Usages

- Access http://localhost/resumebuilder  in Browser.
- ( However it's POC, we need to send dynamic form values to script and choose HTML template and it will convert that to docx and pdf. ) 

# HTML Templates

- Add ".html" template files in templates folder. They will be availble in homepage templates list.

# Response ( Generated PDF File and Docx File Full Path ) 

```
{"pdf":"http://localhost/resumebuilder/pdf/Resume-1531488196.pdf","docx":"http://localhost/resumebuilder/docx/Resume-1531488196.docx"}
```
# Dependencies

1. PHP Server ( v7.4.x )
2. PHP Extensions required 

- PHP Zip 
- PHP DOM 
- PHP XML  
- PHP Tidy 
- PHP mbstring

3. mpdf ( included using composer )
4. phpdocx ( included using composer )

## Donate and Support

<div class='pm-button'><a href='https://www.payumoney.com/paybypayumoney/#/3FF0BB83F2A6D7DD27A53BC12E4AE109' target="_blank"><img src='https://www.payumoney.com/media/images/payby_payumoney/new_buttons/21.png' /></a></div> 
