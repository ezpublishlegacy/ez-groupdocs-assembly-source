# Groupdocs Assembly
============================

GroupDocs Assembly plugin for ezPublish

With GroupDocs Assembly plugin for ezPublish you can easily view on [contract management](http://groupdocs.com/apps/Assembly) directly from within your ezPublish website.

###Plugin Manual Installation Instructions:
1. "groupdocsAssembly" module contain "design, modules, setting", so unzip it into "extentions" directory, so parent directory is "groupdocsAssembly"
2. Open file: "site/settings/override/site.ini.append.php" and add "ActiveExtensions[]=groupdocsAssembly" under "[ExtensionSettings]"
3. Go to Admin > Setup > Extentions and checkbox where "groupdocsAssembly" must be ticked
4. Then go to - Setup > Extentions and press "Regenerate autoloaded arrays for extentions" in the bottom
5. Grant permissions in admin go to - User Accounts > Roles and policies > Anonymous => Edit Role and if "groupdocsAssembly" isn't available in the list press - New Policy > choose Module: groupdocsAssembly > Grant access to all functions > Save
6. Go to Setup and press "Clear all caches"

###ChangeLog
2012-11-30
1.  Client CMS name tracking was added(referer parameter in the URL).

###[Sign, Manage, Annotate, Assemble, Compare and Convert Documents with GroupDocs](http://groupdocs.com)
* [view on contract management with GroupDocs Assembly](http://groupdocs.com/apps/Assembly)
* [Download Assembly plugin package here](https://github.com/groupdocs/ez-Assembly)
* [Embed DOC, DOCX, PDF Assembly in your ez Publish CMS website] (http://share.ez.no/projects)
* [See source code for GroupDocs Assembly plugin for Radiant CMS](https://github.com/groupdocs/ez-Assembly-source)

###Created by [GroupDocs Marketplace Team](http://groupdocs.com/marketplace/).