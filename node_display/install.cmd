@echo off
(
    call npm install -express --save
)
(
    call npm install mysql --save
)
(
    call npm install body-parser --save
)
(
    call npm install node-cmd --save
)
(
    call npm install serialport --save
)
(
    xcopy start.lnk "%userprofile%\Start Menu\Programs\Startup"
)
exit