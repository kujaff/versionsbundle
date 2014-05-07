An easiest way to create install / updates / uninstall for your bundle is to create a service who extends EasyInstaller.
You just need to add @service_container in parameters for your service :
	
	# MyBundle/Resources/config/services.yml
	services :
		mybundle.installer:
		class: MyBundle\Installer\Installer
		arguments: [ @service_container ]
		tags:
			- { name: bundle.install }
			- { name: bundle.update }
			- { name: bundle.uninstall }


Available methods :

	_executeDQL($sql, $parameters = array())
		Execute a DQL query, with parameters
		
	_executeSQL($sql, $parameters = array())
		Execute a SQL query, with parameters
	
	_updateOneVersionOneMethod(Update $updater, BundleVersion $bundleVersion)
		Call it from your update method, like $this->_updateOneVersionOneMethod($this, $bundleVersion);
		Each methods prefixed by 'update_' will be parsed to see if we need to call it for the current update.
		If a version doesn't need a patch, don't create an empty method, it's useless.
		Example :
			-> Current bundle installed version : 1.0.0
			-> Current bundle files version : 1.0.3
			1) Try to find a method named update_1_0_1 to update bundle from 1.0.0 to 1.0.1
			2) Try to find a method named update_1_0_2 to update bundle from 1.0.1 to 1.0.2
			3) Try to find a method named update_1_0_3 to update bundle from 1.0.2 to 1.0.3
			
	_dropTables(array $tables)
		Drop tables only if exists (DROP TABLE IF EXISTS)