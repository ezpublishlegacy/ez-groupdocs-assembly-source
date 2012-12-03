<?php
 include_once( 'extension/groupdocsassembly/classes/groupdocsassembly.php' );
/*
class GroupdocsAssemblyFunctionCollection
{

function GroupdocsAssemblyFunctionCollection()
{
}

function &fetchList( $offset, $limit )
{
$parameters = array( 'offset' => $offset,
'limit' => $limit );
$lista =& GroupdocsAssembly( $parameters );

return array( 'result' => &$lista );
}

}
*/
class GroupdocsAssemblyFunctionCollection
{ 
    public function __construct() 
    {
        // ...
    }
 
    /*
     * Is opened by('modul1', 'list', hash('as_object', $bool ) ) fetch
     * @param bool $asObject
     */ 
    public static function fetchList( $asObject ) 
    { 
        return array( 'result' => GroupDocsAssembly::fetchList( $asObject ) ); 
    }
 
    /*
     * Is opened by('modul1', 'count', hash() ) fetch
     */
    public static function fetchJacExtensionDataListCount()
    { 
        return array( 'result' => GroupDocsAssembly::getListCount() ); 
    } 
} 
?>