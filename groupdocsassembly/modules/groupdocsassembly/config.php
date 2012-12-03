<?php
/**
* File containing the eZ Publish view implementation.
*
* @copyright Pavel Teplitskiy
* @version 1.0
* @extention groupdocsassembly
*/
/*

*/
///////////////////////////////////////// FORM STARTED /////////////////////////////////////////
// take copy of global object 
$db = eZDB::instance(); 
$http = eZHTTPTool::instance (); 

		 // Create mysql table if not exist
		if(!isset($_SESSION['gdscreatetable']) || !$_SESSION['gdscreatetable']){
			$query = 'CREATE TABLE IF NOT EXISTS `gds` (
						  `id` int(11) NOT NULL AUTO_INCREMENT,
						  `file_id` varchar(250) NOT NULL,
						  `file_hook` varchar(250) NOT NULL,
						  `width` int(5) NOT NULL,
						  `height` int(5) NOT NULL,
						  PRIMARY KEY (`id`)
						) ENGINE=MyISAM;'; 
			$db -> query( $query );
			$_SESSION['gdscreatetable'] = 1;
		}

include_once( 'extension/groupdocsassembly/classes/groupdocsassembly.php' );
$module = $Params['Module'];

// If the variable 'name' is sent by GET or POST, show variable 
$value = '';

// DELETE GroupDocs File ID 
if( $http->hasVariable('del_id') )  {
    $del_id = $http->variable ('del_id');
	$query = 'DELETE FROM gds WHERE id='.(int)$del_id; 
	$db -> arrayQuery( $query );
	return $module->redirectTo('/groupdocsassembly/config');
}

// SAVE GroupDocs File ID
if( $http->hasVariable('file_id') )  {
    $file_id = $http->variable ('file_id');
    $width = (int)$http->variable ('width');
	$height = (int)$http->variable ('height');

if( $file_id != '' ) 
{

		// assign hook_id
		$HookId = GroupDocsAssembly::getMaxId();
		$hook = '#gdassembly'.($HookId+1).'#';// as no records show zero
		// generate new data object 
		$GDObject = GroupDocsAssembly::create( $file_id, $hook, $width, $height);
		eZDebug::writeDebug( '1.'.print_r( $GDObject, true ), 
							 'GDObject before saving: ID not set' ) ;
	 
		// save object in database 
		$GDObject->store();
		eZDebug::writeDebug( '2.'.print_r( $GDObject, true ), 
							 'GDObject after saving: ID set' ) ;
	 
		// ask for the ID of the new created object 
		$id = $GDObject->attribute( 'id' );
	 
		// investigate the amount of data existing 
		$count = GroupDocsAssembly::getListCount(); 
		$statusMessage = 'File ID: >>'. $file_id .
                     '<< Hook:  >>'. $hook.
                     '<< In database with ID >>'. $id.
                     '<< saved!New ammount = '. $count ;

		return $module->redirectTo('/groupdocsassembly/config');
	}else 
		$statusMessage = 'Please insert data';
	 
	// initialize Templateobject 
	$tpl = eZTemplate::factory();

	$tpl->setVariable( 'status_message', $statusMessage ); 
	// Write variable $statusMessage in the file eZ Debug Output / Log 
	// here the 4 different types: Notice, Debug, Warning, Error 
	eZDebug::writeNotice( $statusMessage, 'groupdocsassembly:groupdocsassembly/config.php' ); 
	eZDebug::writeDebug( $statusMessage, 'groupdocsassembly:groupdocsassembly/config.php' ); 
	eZDebug::writeWarning( $statusMessage, 'groupdocsassembly:groupdocsassembly/config.php' ); 
	eZDebug::writeError( $statusMessage, 'groupdocsassembly:groupdocsassembly/config.php' );
}
/////////////////////////////////////////// form ended ////////////////////////////////////////////////
// Get list of file from DB
$dataArray = array();
$query = 'SELECT * FROM gds'; 
$rows = $db -> arrayQuery( $query );
if($rows) foreach($rows as $row){
	if($row['width']==='0') $row['width'] = '';
	if($row['height']==='0') $row['height'] = '';
	$dataArray[$row['id']] = array( $row['file_id'], $row['file_hook'], $row['width'], $row['height'] );
}
// initialize Templateobject
$tpl = eZTemplate::factory();
 
// create example Array in the template => {$data_array}
$tpl->setVariable( 'data_array', $dataArray );
/////////////////////////////////// inistialization ended ///////////////////////////////////////

//carry out internal processing here, none required in this case.
// setting up what to render to the user:
$Result = array();

//$t = $tpl->compileTemplateFile('design:groupdocsassembly/config.tpl');
$t = $tpl->fetch('design:groupdocsassembly/config.tpl');

$Result['content'] = $t; //main tpl file to display the output

$Result['left_menu'] = "design:groupdocsassembly/leftmenu.tpl"; 

$Result['path'] = array( array( 
	'url' => 'groupdocsassembly/config',
	'text' => 'Groupdocs Assembly' 
) ); //what to show in the Title bar for this URL


// read variable GdsDebug of INI block [GDSExtensionSettings] 
// of INI file jacextension.ini  

$groupdocsassemblyINI = eZINI::instance( 'groupdocsassembly.ini' ); 
 
$gdsDebug = $groupdocsassemblyINI->variable( 'GDSExtensionSetting','JacDebug' ); 
 
// If Debug is activated do something 
if( $gdsDebug === 'enabled' ) 
    echo 'groupdocsassembly.ini: [GDSExtensionSetting] GdsDebug=enabled';

?>