var express=require('express');
var socket=require('socket.io');
var app=express();
var server=app.listen(4000);

//Static file
//display
var SerialPort = require('serialport');
var Readline = SerialPort.parsers.Readline;
var port = new SerialPort('COM3');
var parser = new Readline();
//const killChrome = require('kill-chrome');
//end display
//app.use(express.static('public'));
app.use(express.static('application/views/display'));
//Socket setup
var io=socket(server);
io.on('connection',function(socket){
    //console.log('made socket connection',socket.id);
    socket.on('order',function(data){
        io.sockets.setMaxListeners(0);
        io.sockets.emit('order',data);
        //display
        port.pipe(parser);
        port.write(String.fromCharCode(12));
        port.write("Total(R): "+data.total_riel+" R  Total($): $ "+data.total_dollar+"");
    });
    socket.on('dis_welcome',function(data){
        io.sockets.setMaxListeners(0);
        io.sockets.emit('dis_welcome',data);
        //display
        port.pipe(parser);
        port.write(String.fromCharCode(12));
        port.write("Welcome to BLACK FACTORY ACOUSTIC MUSIC!\n");
       
 
        // killChrome().then(() => {
        //     console.log('Killed tabs');
        // });
    });
    socket.on('payment',function(data){
        io.sockets.emit('payment',data);
    });
    socket.on('card_pay',function(data){
        io.sockets.emit('card_pay',data);
    });
    socket.on('close_pay',function(data){
        io.sockets.emit('close_pay',data);
    });
    socket.on('scan_card',function(data){
        io.sockets.emit('scan_card',data);
    });
    
});
