<?php
namespace kujaff\VersionsBundle\Install;

use kujaff\VersionsBundle\Installer\Install as BaseInstall;
use kujaff\VersionsBundle\Installer\Uninstall;
use kujaff\VersionsBundle\Installer\UpdateMethods;

class Install extends UpdateMethods implements BaseInstall, Uninstall
{

	public function getBundleName()
	{
		return 'VersionsBundle';
	}

	public function install()
	{
		$this->_executeSQL('DROP TABLE IF EXISTS versions_bundles');
		$this->_executeSQL('
			CREATE TABLE `versions_bundles` (
				`id` int(11) NOT NULL AUTO_INCREMENT,
				`name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
				`installationDate` datetime NOT NULL,
				`installedVersion` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
				`updateDate` datetime DEFAULT NULL,
				PRIMARY KEY (`id`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
		');
	}

	public function uninstall()
	{
		$this->_executeSQL('DROP TABLE IF EXISTS versions_bundles');
	}

}