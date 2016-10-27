'use strict';

var express = require('express');
var app = express();
var bodyParser = require('body-parser');


app.use(bodyParser.urlencoded({extended: true}));
app.use(bodyParser.json());


app.post('/user', function (req, res) {

  if ((req.body.name === "CreatShare") && (req.body.anniversary === 5) && (req.body.year === 2016)) {
    res.send("Happy 5 Anniversary");
  } else {
    res.send("error");
  }

});


var server = app.listen(3000, function () {

  console.log('Sever is listening  at localhost: 3000');
});

