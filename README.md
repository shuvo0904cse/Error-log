## Error Log Mail 

[![Issues](https://img.shields.io/github/issues/shuvo0904cse/Error-log)](https://github.com/shuvo0904cse/Error-log/issues)
[![Stars](	https://img.shields.io/github/stars/shuvo0904cse/Error-log)](https://github.com/shuvo0904cse/Error-log/stargazers)



##Error log send in mail and save in database

> use Shuvo\Errorlog\Service\ErrorMail;

 > ErrorMail::mailSend("Message","View Name", "Controller Name',
                       "Method Name", "Line Number","File Path", "Object", 
                       "Type", "Arguments", "Email");
