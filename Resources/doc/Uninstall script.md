Declare a service with tag bundle.uninstall :

```yml
# MyBundle/Resources/config/services.yml
services :
    myversions.installer:
        class: MyBundle\Installer\Uninstall
        tags:
            - { name: bundle.uninstall }
```

Create the service who implements Uninstall :

```php
# MyBundle/Installer/Uninstall.php
namespace MyBundle/Installer;

use kujaff\VersionsBundle\Model\UninstallInterface;
use kujaff\VersionsBundle\Entity\Version;

class Uninstall implements UninstallInterface
{
    public function getBundleName()
    {
        return 'MyBundle';
    }

    public function uninstall()
    {
        // make stuff to uninstall your bundle, like removing dirs, removing database tables, etc
    }
}
```