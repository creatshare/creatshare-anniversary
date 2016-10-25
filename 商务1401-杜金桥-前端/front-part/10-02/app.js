'use strict';

var express = require('express');
var app = express();
var bodyParser = require('body-parser');


app.use(bodyParser.urlencoded({extended: true}));
app.use(bodyParser.json());


app.post('/user', function (req, res) {

  if (req.body = [{
        name: "CreatShare",
        anniversary: 5,
        year: 2016
      }])
  {

    res.send({data: "Happy 5 Anniversary"});
  } else {
    res.send({data: "error"});
  }

});


var server = app.listen(3000, function () {

  console.log('Example app listening  at http: 3000');
});

