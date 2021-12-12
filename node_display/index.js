var express = require('express');
var cors = require('cors');
var app = express();
var http = require("http");
var mysql = require('mysql');

/*
var SerialPort = require('serialport');
var Readline = SerialPort.parsers.Readline;
var port = new SerialPort('COM3');
var parser = new Readline();
*/

fs = require('fs');
var cmd=require('node-cmd');

var bodyParser = require('body-parser');
// create application/json parser
var jsonParser = bodyParser.json();

// create application/x-www-form-urlencoded parser
var urlencodedParser = bodyParser.urlencoded({ extended: false })

var path = require('path');
app.use(cors());

var status=0;
var layout_id='';
var master_id='';
var return_kh=0;
var return_us=0;
var pay_in_dollar=0;
var pay_in_riel=0;
var grand_total_us=0;
var grand_total_riel=0;

app.get('/node_osk', function (req, res, next) {
	cmd.get(
        	'osk',
        	function(err, data, stderr){
            		console.log('the current working dir is : ',data)
        	}
    	);
    res.json({"status":'done'});
  });


app.get('/node_tabtip', function (req, res, next) {
	cmd.get(
        	'tabtip',
        	function(err, data, stderr){
            		console.log('the current working dir is : ',data)
        	}
    	);
    res.json({"status":'done'});
  });


app.get('/node_display_show', function (req, res, next) {
  res.sendFile(path.join(__dirname + '/display.html'));
});

app.post("/welcome",urlencodedParser, function (req, res, next){
  /*port.pipe(parser);
  port.write("     WELCOME TO     ");
  var line = req.body.company_name;
  var space = parseInt((20-line.length)/2);
  console.log(space);
  var more = "";
  if(line.length%2>0){
    more = " ";
  }

  do {
    line=" "+line+" ";
    space--;
  }
  while (space>0);

  port.write(line+more);*/
  res.json({"status":'done'});
});

app.post('/set_display',urlencodedParser, function (req, res, next) {
  status=1;
  layout_id=req.body.layout_id;
  master_id=req.body.master_id;
  return_us=req.body.return_us;
  return_kh=req.body.return_kh;
  pay_in_dollar=req.body.pay_in_dollar;
  pay_in_riel=req.body.pay_in_riel;
  grand_total_us=req.body.grand_total_us;
  grand_total_riel=req.body.grand_total_riel;

  /*port.pipe(parser);
  port.write(String.fromCharCode(12));
  var line1="TOTAL USD= "+grand_total_us;
  var text = "";
  do {
    line1+=" ";
  }
  while (line1.length < 20);
  port.write(line1);
  var line2="TOTAL KHR= "+grand_total_riel;
  var text = "";
  do {
    line2+=" ";
  }
  while (line2.length < 20);
  port.write(line2);*/
  
  res.json({"status":'done'});
});

app.get('/get_display', function (req, res, next) {
    res.json({"layout_id":layout_id,"master_id":master_id,"status":status,"return_us":return_us,"return_kh":return_kh,"pay_in_dollar":pay_in_dollar,"pay_in_riel":pay_in_riel});
    status=0;
  });
 
app.listen(85, function () {
  console.log('CORS-enabled web server listening on port 85');
});
