<?php
// to retrieve selected html data, try these DomXPath examples:

$HTTP_HOST="http://www.eldesvandecarol.es/";
//$file = $DOCUMENT_ROOT. "index.html";
$file = $HTTP_HOST. "";
$doc = new DOMDocument();
$doc->loadHTMLFile($file);

$xpath = new DOMXpath($doc);

// example 1: for everything with an id
$elements = $xpath->query("//*[@id]");

// example 2: for node data in a selected id
//$elements = $xpath->query("/html/body/div[@id='yourTagIdHere']");

// example 3: same as above with wildcard
//$elements = $xpath->query("*/div[@id='id']");

if (!is_null($elements)) {
  foreach ($elements as $element) {
  	echo "<br/>[". $element->nodeName. "]";
//    echo "entra";
	$nodes = $element->childNodes;
    foreach ($nodes as $node) {
      echo $node->nodeValue. "\n";
    }
  }
  echo "fuera del for";
}
 else
  {
  echo"No hay";
  }
?>