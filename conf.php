<?php
// Site timezone
$conf['site_timezone'] = 'AFRICA/NAIROBI';

// Site information
$conf['site_name'] = 'ICS Academy';
$conf['site_url'] = 'http://localhost/fol/';
$conf['site_email'] = 'info@icsacademy.com';

// Database Constants
$conf['DB_TYPE'] = 'mysqli';
$conf['DB_HOST'] = 'localhost';
$conf['DB_USER'] = 'root';
$conf['DB_PASS'] = '5995';
$conf['DB_NAME'] = 'fol';

// Email configuration (Gmail SMTP with App Password)
$conf['mail_type']   = 'smtp'; 
$conf['smtp_host']   = 'smtp.gmail.com'; 
$conf['smtp_user']   = '';          // 🔹 replace with your Gmail
$conf['smtp_pass']   = '';   // 🔹 replace with App Password
$conf['smtp_port']   = 587;                            // 587 for TLS
$conf['smtp_secure'] = 'tls';
