// JavaScript 1.0 - slideshow.js
// Created March 31, 2013
// Created by Valery Y. Samovich
// This script run the slideshow.

// Variables
var i = 0;
var path = new Array();

// List of slides
path[0] = "images/banner-2.jpg";
path[1] = "images/banner-3.jpg";
path[2] = "images/banner-1.jpg";

function swapImage()
{
   document.slide.src = path[i];
   if(i < path.length - 1) i++; else i = 0;
   setTimeout("swapImage()",4000);
}