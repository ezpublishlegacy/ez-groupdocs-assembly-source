<?php
include_once( 'extension/groupdocsassembly/classes/groupdocsassembly.php' );

/** 
 * Operator: gassd('list') and gassd('count') <br> 
 * Count: {gassd('count')} <br> 
 * Liste: {gassd('list')|attribute(show)} 
 */ 
class GASSDOperator
{ 
    public $Operators;
 
    public function __construct( $name = 'gassd' )
    { 
        $this->Operators = array( $name ); 
    }
 
    /** 
     * Returns the template operators.
     * @return array
     */ 
    function operatorList()
    { 
        return $this->Operators; 
    }
 
    /**
     * Returns true to tell the template engine that the parameter list 
     * exists per operator type. 
     */ 
    public function namedParameterPerOperator() 
    { 
        return true; 
    }
 
    /**
     * @see eZTemplateOperator::namedParameterList 
     **/ 
    public function namedParameterList() 
    { 
        return array( 'gassd' => array( 'result_type' => array( 'type' => 'string',    
                                                              'required' => true, 
                                                              'default' => 'list' ))
                    ); 
    }
 
    /**
     * Depending of the parameters that have been transmitted, fetch objects JACExtensionData 
     * {gvd('list)} or count data {gvd('count')} 
     */ 
    public function modify( $tpl, $operatorName, $operatorParameters, $rootNamespace, $currentNamespace, &$operatorValue, $namedParameters )
    { 
        $result_type = $namedParameters['result_type']; 
        if( $result_type == 'list') 
            $operatorValue = GroupDocsAssembly::fetchList(true); 
        else if( $result_type == 'count') 
            $operatorValue = GroupDocsAssembly::getListCount(); 
    } 
} 
?>