## Error Log Mail 


##Error log send in mail and save in database

> use Shuvo\Errorlog\Service\ErrorMail;

 > ErrorMail::mailSend("Message","View Name", "Controller Name',
                       "Method Name", "Line Number","File Path", "Object", 
                       "Type", "Arguments", "Email");
