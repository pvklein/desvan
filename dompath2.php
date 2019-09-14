<?php
// to retrieve selected html data, try these DomXPath examples:

//$HTTP_HOST="http://www.marca.es/";
$HTTP_HOST='https://www.skyscanner.es/transporte/vuelos/mad/bcn/170402/170403/tarifas-de-madrid-a-barcelona-en-abril-2017.html?adults=1&children=0&adultsv2=1&childrenv2=&infants=0&cabinclass=economy&rtn=1&preferdirects=false&outboundaltsenabled=false&inboundaltsenabled=false&ref=home#results//$file = $DOCUMENT_ROOT. "index.html";';

$file = $HTTP_HOST. "";
$doc = new DOMDocument();
$doc->loadHTMLFile($file);

$xpath = new DOMXpath($doc);

// example 1: for everything with an id
$elements = $xpath->query("//*[@id]");
//$elements= $xpath->query("//div[@id='content']//div[@class='listing']");
$elements= $xpath->query("//div[@id='day-list-count']");


// example 2: for node data in a selected id
//$elements = $xpath->query("/html/body/div[@id='yourTagIdHere']");

// example 3: same as above with wildcard
//$elements = $xpath->query("*/div[@id='id']");

if (!is_null($elements)) {
  foreach ($elements as $element) {
  	//echo"entra";
	echo $element->nodeValue, PHP_EOL;
  }
  echo "fuera del for";
}
 else
  {
  echo"No hay";
  }
?>