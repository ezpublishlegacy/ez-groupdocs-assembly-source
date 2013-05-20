<?php
 
// Which operators will load automatically? 
$eZTemplateOperatorArray = array();
 
// Operator: gvddata 
$eZTemplateOperatorArray[] = array( 'class' => 'GASSDOperator',
                                    'operator_names' => array( 'gassd' ) ); 
?>