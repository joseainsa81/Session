<?php
echo '<h4>clean</h4>';
echo '<pre>';
echo shell_exec('php phpDocumentor.phar --config="phpdoc.clean.xml"');
echo '</pre>';
echo '<hr />';
echo '<h4>responsive-twig</h4>';
echo '<pre>';
echo shell_exec('php phpDocumentor.phar --config="phpdoc.responsive-twig.xml"');
echo '</pre>';
