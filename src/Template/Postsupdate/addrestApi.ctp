<?php

$xml = Xml::fromArray(['response' => $posts]);
echo $xml->asXML();

?>