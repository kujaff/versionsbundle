<?php
namespace kujaff\VersionsBundle\Entity;

use kujaff\VersionsBundle\Versions\Version;

/**
 * Bundles
 */
class BundleVersion
{
	/**
	 * @var integer
	 */
	private $id;

	/**
	 * @var string
	 */
	private $name;

	/**
	 * @var \DateTime
	 */
	private $installationDate;

	/**
	 * @var Version
	 */
	private $installedVersion;

	/**
	 * @var Version
	 */
	private $version;

	/**
	 * @var \DateTime
	 */
	private $updateDate;

	/**
	 * Constructor
	 *
	 * @param string $name
	 */
	public function __construct($name)
	{
		$this->name = $name;
	}

	/**
	 * Get id
	 *
	 * @return integer
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get name
	 *
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Set installation date
	 *
	 * @param \DateTime $installation
	 * @return Bundles
	 */
	public function setInstallationDate($date)
	{
		$this->installationDate = $date;
		return $this;
	}

	/**
	 * Get installation date
	 *
	 * @return \DateTime
	 */
	public function getInstallationDate()
	{
		return $this->installationDate;
	}

	/**
	 * Indicate if bundle is installed
	 *
	 * @return boolean
	 */
	public function isInstalled()
	{
		return ($this->getInstallationDate() != null);
	}

	/**
	 * Set version
	 *
	 * @param Version $version
	 * @return Bundles
	 */
	public function setVersion(Version $version)
	{
		$this->version = $version;
		return $this;
	}

	/**
	 * Get version
	 *
	 * @return Version
	 */
	public function getVersion()
	{
		return $this->version;
	}

	/**
	 * Set installed version
	 *
	 * @param Version $version
	 * @return Bundles
	 */
	public function setInstalledVersion(Version $version)
	{
		$this->installedVersion = $version;
		return $this;
	}

	/**
	 * Get installed version
	 *
	 * @return Version
	 */
	public function getInstalledVersion()
	{
		return $this->installedVersion;
	}

	/**
	 * Set update date
	 *
	 * @param \DateTime $updatedate
	 * @return Bundles
	 */
	public function setUpdateDate($date)
	{
		$this->updateDate = $date;
		return $this;
	}

	/**
	 * Get update date
	 *
	 * @return \DateTime
	 */
	public function getUpdateDate()
	{
		return $this->updateDate;
	}

	/**
	 * Indicate if the bundle needs an update
	 *
	 * @return boolean
	 */
	public function needUpdate()
	{
		return $this->getVersion()->get() != $this->getInstalledVersion()->get();
	}

}