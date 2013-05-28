# GroupDocs Assembly plugin for ez Publish
============================

With this plugin you can easily integrate the GroupDocs' [online document assembly](http://groupdocs.com/apps/assembly) application into your ez Publish website.

GroupDocs Assembly allows you to automate the process of generation of various documents that have a standard template and require unique details to be filled in for each individual user. This could be contracts, NDAs, sales quotes, various applications, etc. After installing the plugin, you will be able to easily design and publish online forms on your website. Data entered by users through these forms will be automatically incorporated into your standard document templates and then saved as a completed document in Word or PDF format.  

####Plugin Manual Installation Instructions:
1. In the ez Publish "extentions" directory create a folder called "GroupDocsAssembly". 
2. Copy all GroupDocs Assembly plugin files to this folder.
3. Open the following file: "site/settings/override/site.ini.append.php" and then add the "ActiveExtensions[]=groupdocsAssembly" string under "[ExtensionSettings]".
4. Go to: Admin -> Setup -> Extentions and select the "groupdocsAssembly" checkbox.
5. Go to: Setup -> Extentions and press "Regenerate autoloaded arrays for extentions" in the bottom of the page.
6. Go to: User Accounts -> Roles and policies -> Anonymous -> Edit Role. If "groupdocsAssembly" isn't available in the list, select: New Policy -> choose Module: groupdocsAssembly -> Grant access to all functions -> Save.
7. Go to Setup and press "Clear all caches".

[Download the GroupDocs Assembly plugin package (Zip) here](https://github.com/groupdocs/ez-groupdocs-assembly)

####ChangeLog
2012-11-30
1. Client CMS name tracking was added (referer parameter in the URL).
