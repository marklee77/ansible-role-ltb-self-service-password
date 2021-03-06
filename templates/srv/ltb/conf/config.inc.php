<?php
#==============================================================================
# LTB Self Service Password
#
# Copyright (C) 2009 Clement OUDOT
# Copyright (C) 2009 LTB-project.org
#
# This program is free software; you can redistribute it and/or
# modify it under the terms of the GNU General Public License
# as published by the Free Software Foundation; either version 2
# of the License, or (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
#
# GPL License: http://www.gnu.org/licenses/gpl.txt
#
#==============================================================================

#==============================================================================
# Configuration
#==============================================================================
# LDAP
$ldap_url = "ldapi:///"; # does not support ldap:// with tls...
$ldap_binddn = "cn=admin,{{ ldap_auth_base_dn }}";
$ldap_bindpw = "{{ ldap_auth_admin_password }}";
$ldap_base = "{{ ldap_auth_base_dn }}";
$ldap_login_attribute = "{{ ldap_auth_uid_attribute }}";
$ldap_fullname_attribute = "{{ ldap_auth_displayname_attribute }}";
$ldap_filter = "(&({{ ldap_auth_user_filter }})($ldap_login_attribute={login}))";

# Active Directory mode
# true: use unicodePwd as password field
# false: LDAPv3 standard behavior
$ad_mode = false;
# Force account unlock when password is changed
$ad_options['force_unlock'] = false;
# Force user change password at next login
$ad_options['force_pwd_change'] = false;

# Samba mode
# true: update sambaNTpassword and sambaPwdLastSet attributes too
# false: just update the password
$samba_mode = false;

# Shadow options - require shadowAccount objectClass
# Update shadowLastChange
$shadow_options['update_shadowLastChange'] = false;

# Hash mechanism for password:
# SSHA
# SHA
# SMD5
# MD5
# CRYPT
# clear (the default)
# This option is not used with ad_mode = true
$hash = "SSHA";

# Local password policy
# This is applied before directory password policy
# Minimal length
$pwd_min_length = 10;
# Maximal length
$pwd_max_length = 0;
# Minimal lower characters
$pwd_min_lower = 2;
# Minimal upper characters
$pwd_min_upper = 2;
# Minimal digit characters
$pwd_min_digit = 2;
# Minimal special characters
$pwd_min_special = 0;
# Definition of special characters
$pwd_special_chars = "^a-zA-Z0-9";
# Forbidden characters
#$pwd_forbidden_chars = "@%";
# Don't reuse the same password as currently
$pwd_no_reuse = true;
# Complexity: number of different class of character required
$pwd_complexity = 0;
# Show policy constraints message:
# always
# never
# onerror
$pwd_show_policy = "always";
# Position of password policy constraints message:
# above - the form
# below - the form
$pwd_show_policy_pos = "above";

# Who changes the password?
# Also applicable for question/answer save
# user: the user itself
# manager: the above binddn
$who_change_password = "user";

## Questions/answers
# Use questions/answers?
# true (default)
# false
$use_questions = {{ ltb_use_questions }};

# Answer attribute should be hidden to users!
$answer_objectClass = "extensibleObject";
$answer_attribute = "info";

## Token
# Use tokens?
# true (default)
# false
$use_tokens = {{ ltb_use_tokens }};
# Crypt tokens?
# true (default)
# false
$crypt_tokens = true;
# Token lifetime in seconds
$token_lifetime = "3600";

## Mail
# LDAP mail attribute
$mail_attribute = "mail";
# Who the email should come from
$mail_from = "{{ ltb_admin_email }}";
# Notify users anytime their password is changed
$notify_on_change = false;

## SMS
# Use sms
$use_sms = {{ ltb_use_sms }};
# GSM number attribute
$sms_attribute = "mobile";
# Send SMS mail to address
$smsmailto = "{{ ltb_sms_mailto }}";
# Subject when sending email to SMTP to SMS provider
$smsmail_subject = "{{ ltb_sms_subject }}";
# Message
$sms_message = "{{ ltb_sms_message }}";

# SMS token length
$sms_token_length = 8;

# Display help messages
$show_help = true;

# Language
$lang ="en";

# Logo
$logo = "style/ltb-logo.png";

# Debug mode
$debug = false;

# Encryption, decryption keyphrase
$keyphrase = "{{ ltb_keyphrase }}";

# Where to log password resets - Make sure apache has write permission
# By default, they are logged in Apache log
#$reset_request_log = "/var/log/self-service-password";

# Invalid characters in login
# Set at least "*()&|" to prevent LDAP injection
# If empty, only alphanumeric characters are accepted
$login_forbidden_chars = "*()&|";

## CAPTCHA
# Use Google reCAPTCHA (http://www.google.com/recaptcha)
# Go on the site to get public and private key
$use_recaptcha = {{ ltb_use_recaptcha }};
$recaptcha_publickey = "{{ ltb_recaptcha_public_key }}";
$recaptcha_privatekey = "{{ ltb_recaptcha_private_key }}";
# Customize theme (see http://code.google.com/intl/de-DE/apis/recaptcha/docs/customization.html)
# Examples: red, white, blackglass, clean
$recaptcha_theme = "{{ ltb_recaptcha_theme }}";
# Force HTTPS for recaptcha HTML code
$recaptcha_ssl = {{ ltb_recaptcha_ssl }};

## Default action
# change
# sendtoken
# sendsms
$default_action = "change";

## Extra messages
# They can also be defined in lang/ files
#$messages['passwordchangedextramessage'] = NULL;
#$messages['changehelpextramessage'] = NULL;

?>
