Declare a service with tag bundle.install :
```yml
# MyBundle/Resources/config/services.yml
services :
    myversions.installer:
        class: MyBundle\Installer\Install
        tags:
            - { name: bundle.install }
```

Create the service who implements Install :
```php
# MyBundle/Installer/Install.php
namespace MyBundle/Installer;

use kujaff\VersionsBundle\Model\InstallInterface;
use kujaff\VersionsBundle\Entity\Version;

class Install implements InstallInterface
{
    public function getBundleName()
    {
        return 'MyBundle';
    }

    public function install()
    {
        // make stuff to install your bundle, like creating dirs, updating database schema, etc
        // and then return the version when installation is done
        // most of the time it will NOT be the bundle version, it's the version when THIS script is done
        // an update will be performed after the installation to update to the bundle version
        return new Version('1.0.0');
    }
}
```