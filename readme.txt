A) System Requirements:

1. Linux Server
2. Apache 2.0+ Server
3. PHP 5.3+
4. Enable curl extension
5. Enable register_argc_argv


B) How to Install:

1. Upload all the script on the server
   i) xerox/create_issue.php
   ii) xerox/lib/OAuthApi.php
   iii) xerox/lib/OAuthApiException.php

2. Open command line and connect to server via host username & host password

3. Change directory to xerox
   e.g. cd /var/home/html/xerox/

4. Run Command line command to post repository issue on the github|bitbucket
   e.g. php create_issue.php username password "https://github.com/abhi1704/sample" "title" "description"
   e.g. php create_issue.php username password "https://bitbucket.org/abhi1704/sample" "title" "description"