Role Name
========

The purpose of this role is to install the ldap toolbox self-service password
administration web application o a web server and enable access with nginx. 

Role Variables
--------------

- ltb_run_dir: "{{ lookup('env', 'PWD') }}"
- ltb_keyphrase: "{{ lookup('password', ltb_run_dir + '/private/credentials/ltb-keyphrase') }}"

- ltb_download_url: http://tools.ltb-project.org/attachments/download/497/ltb-project-self-service-password-0.8.tar.gz

- ldap_uri: ldap://127.0.0.1/

- ltb_hostname: localhost
- ltb_http_port: 80
- ltb_https_port: 443
- ltb_https_enable: true

- ltb_require_ssl: true

- ltb_ssl_cert_file: /etc/ssl/certs/ssl-cert-snakeoil.pem
- ltb_ssl_key_file: /etc/ssl/private/ssl-cert-snakeoil.key

- ltb_admin_email: root@localhost

- ltb_use_questions: false
- ltb_questions:
    - { tag: birthday, phrase: "What is the date of your birth?" }

- ltb_use_tokens: true

- ltb_use_sms: false
- ltb_sms_mailto: "{sms_attribute}@service.provider.com"
- ltb_sms_subject: Provider code
- ltb_sms_message: "{smsresetmessage} {smstoken}"

- ltb_use_recaptcha: false
- ltb_recaptcha_public_key: ''
- ltb_recaptcha_private_key: ''
- ltb_recaptcha_theme: white
- ltb_recaptcha_ssl: true

NOTE: when allowing users to set questions, make sure that ldap permissions are
such that users responses cannot be read. They are stored along with other
information in ldap.

Example Playbook
-------------------------

Including an example of how to use your role (for instance, with variables 
passed in as parameters) is always nice for users too:

    - hosts: all
      sudo: True
      roles:
        - marklee77.slapd-auth
        - marklee77.ltb

Try it Out
---------------------------

Check out the github repository, vagrant up, and load http://localhost:8080/ in
your web browser.

License
-------

GPLv2

Author Information
------------------

http://marklee77.github.io

