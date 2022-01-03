<?php
//============================================================+
// File name   : example_012.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 012 for TCPDF class
//               Graphic Functions
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Graphic Functions
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('Nicola Asuni');
$pdf->setTitle('TCPDF Example 012');
$pdf->setSubject('TCPDF Tutorial');
$pdf->setKeywords('TCPDF, PDF, example, test, guide');

// disable header and footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

// set auto page breaks
$pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->setFont('helvetica', '', 10);

// add a page
$pdf->addPage();

$style = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => '10,20,5,10', 'phase' => 10, 'color' => array(255, 0, 0));
$style2 = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(255, 0, 0));
$style3 = array('width' => 1, 'cap' => 'round', 'join' => 'round', 'dash' => '2,10', 'color' => array(255, 0, 0));
$style4 = array('L' => 0,
                'T' => array('width' => 0.25, 'cap' => 'butt', 'join' => 'miter', 'dash' => '20,10', 'phase' => 10, 'color' => array(100, 100, 255)),
                'R' => array('width' => 0.50, 'cap' => 'round', 'join' => 'miter', 'dash' => 0, 'color' => array(50, 50, 127)),
                'B' => array('width' => 0.75, 'cap' => 'square', 'join' => 'miter', 'dash' => '30,10,5,10'));
$style5 = array('width' => 0.25, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 64, 128));
$style6 = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => '10,10', 'color' => array(0, 128, 0));
$style7 = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(255, 128, 0));

// Line
$pdf->text(5, 4, 'Line examples');
$pdf->line(5, 10, 80, 30, $style);
$pdf->line(5, 10, 5, 30, $style2);
$pdf->line(5, 10, 80, 10, $style3);

// Rect
$pdf->text(100, 4, 'Rectangle examples');
$pdf->rect(100, 10, 40, 20, 'DF', $style4, array(220, 220, 200));
$pdf->rect(145, 10, 40, 20, 'D', array('all' => $style3));

// Curve
$pdf->text(5, 34, 'Curve examples');
$pdf->curve(5, 40, 30, 55, 70, 45, 60, 75, '', $style6);
$pdf->curve(80, 40, 70, 75, 150, 45, 100, 75, 'F', $style6);
$pdf->curve(140, 40, 150, 55, 180, 45, 200, 75, 'DF', $style6, array(200, 220, 200));

// Circle and ellipse
$pdf->text(5, 79, 'Circle and ellipse examples');
$pdf->setLineStyle($style5);
$pdf->circle(25,105,20);
$pdf->circle(25,105,10, 90, 180, '', $style6);
$pdf->circle(25,105,10, 270, 360, 'F');
$pdf->circle(25,105,10, 270, 360, 'C', $style6);

$pdf->setLineStyle($style5);
$pdf->ellipse(100,103,40,20);
$pdf->ellipse(100,105,20,10, 0, 90, 180, '', $style6);
$pdf->ellipse(100,105,20,10, 0, 270, 360, 'DF', $style6);

$pdf->setLineStyle($style5);
$pdf->ellipse(175,103,30,15,45);
$pdf->ellipse(175,105,15,7.50, 45, 90, 180, '', $style6);
$pdf->ellipse(175,105,15,7.50, 45, 270, 360, 'F', $style6, array(220, 200, 200));

// Polygon
$pdf->text(5, 129, 'Polygon examples');
$pdf->setLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
$pdf->polygon(array(5,135,45,135,15,165));
$pdf->polygon(array(60,135,80,135,80,155,70,165,50,155), 'DF', array($style6, $style7, $style7, 0, $style6), array(220, 200, 200));
$pdf->polygon(array(120,135,140,135,150,155,110,155), 'D', array($style6, 0, $style7, $style6));
$pdf->polygon(array(160,135,190,155,170,155,200,160,160,165), 'DF', array('all' => $style6), array(220, 220, 220));

// Polygonal Line
$pdf->setLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 164)));
$pdf->polyLine(array(80,165,90,160,100,165,110,160,120,165,130,160,140,165), 'D', array(), array());

// Regular polygon
$pdf->text(5, 169, 'Regular polygon examples');
$pdf->setLineStyle($style5);
$pdf->regularPolygon(20, 190, 15, 6, 0, 1, 'F');
$pdf->regularPolygon(55, 190, 15, 6);
$pdf->regularPolygon(55, 190, 10, 6, 45, false, 'DF', array($style6, 0, $style7, 0, $style7, $style7));
$pdf->regularPolygon(90, 190, 15, 3, 0, true, 'DF', array('all' => $style5), array(200, 220, 200), 'F', array(255, 200, 200));
$pdf->regularPolygon(125, 190, 15, 4, 30, true, '', array('all' => $style5), array(), '', $style6);
$pdf->regularPolygon(160, 190, 15, 10);

// Star polygon
$pdf->text(5, 209, 'Star polygon examples');
$pdf->setLineStyle($style5);
$pdf->starPolygon(20, 230, 15, 20, 3, 0, 1, 'F');
$pdf->starPolygon(55, 230, 15, 12, 5);
$pdf->starPolygon(55, 230, 7, 12, 5, 45, false, 'DF', array('all' => $style7), array(220, 220, 200), 'F', array(255, 200, 200));
$pdf->starPolygon(90, 230, 15, 20, 6, 0, true, 'DF', array('all' => $style5), array(220, 220, 200), 'F', array(255, 200, 200));
$pdf->starPolygon(125, 230, 15, 5, 2, 30, true, '', array('all' => $style5), array(), '', $style6);
$pdf->starPolygon(160, 230, 15, 10, 3);
$pdf->starPolygon(160, 230, 7, 50, 26);

// Rounded rectangle
$pdf->text(5, 249, 'Rounded rectangle examples');
$pdf->setLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
$pdf->roundedRect(5, 255, 40, 30, 3.50, '1111', 'DF');
$pdf->roundedRect(50, 255, 40, 30, 6.50, '1000');
$pdf->roundedRect(95, 255, 40, 30, 10.0, '1111', '', $style6);
$pdf->roundedRect(140, 255, 40, 30, 8.0, '0101', 'DF', $style6, array(200, 200, 200));

// Arrows
$pdf->text(185, 249, 'Arrows');
$pdf->setLineStyle($style5);
$pdf->setFillColor(255, 0, 0);
$pdf->arrow(200, 280, 185, 266, 0, 5, 15);
$pdf->arrow(200, 280, 190, 263, 1, 5, 15);
$pdf->arrow(200, 280, 195, 261, 2, 5, 15);
$pdf->arrow(200, 280, 200, 260, 3, 5, 15);

// - . - . - . - . - . - . - . - . - . - . - . - . - . - . -

// ellipse

// add a page
$pdf->addPage();

$pdf->cell(0, 0, 'Arc of Ellipse');

// center of ellipse
$xc=100;
$yc=100;

// X Y axis
$pdf->setDrawColor(200, 200, 200);
$pdf->line($xc-50, $yc, $xc+50, $yc);
$pdf->line($xc, $yc-50, $xc, $yc+50);

// ellipse axis
$pdf->setDrawColor(200, 220, 255);
$pdf->line($xc-50, $yc-50, $xc+50, $yc+50);
$pdf->line($xc-50, $yc+50, $xc+50, $yc-50);

// ellipse
$pdf->setDrawColor(200, 255, 200);
$pdf->ellipse($xc, $yc, 30, 15, 45, 0, 360, 'D', array(), array(), 2);

// ellipse arc
$pdf->setDrawColor(255, 0, 0);
$pdf->ellipse($xc, $yc, 30, 15, 45, 45, 90, 'D', array(), array(), 2);


// ---------------------------------------------------------

//Close and output PDF document
$pdf->output('example_012.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
