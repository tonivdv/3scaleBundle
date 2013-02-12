<?php
/**
 * Created by Adlogix NV/SA.
 * User: Toni Van de Voorde (toni@adlogix.eu)
 * Date: 11/02/13
 * Time: 14:59
 */
namespace ToniVdv\ThreeScaleBundle\Tests\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBag;
use Symfony\Component\Config\FileLocator;
use ToniVdv\ThreeScaleBundle\DependencyInjection\ThreeScaleExtension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class ThreeScaleExtensionTest extends \PHPUnit_Framework_TestCase {

  public function testClientDefinition() {

    $container = $this->getContainer('test.yml');

    $this->assertTrue($container->has('3scale.client'));
    $definition = $container->getDefinition('3scale.client');
    $this->assertEquals('a_generated_key', $definition->getArgument(0));
    $this->assertEquals('%3scale.client.class%', $definition->getClass());
  }

  private function getContainer($file, $debug = false) {

    $container = new ContainerBuilder(new ParameterBag(array('kernel.debug' => $debug)));
    $container->registerExtension(new ThreeScaleExtension());

    $locator = new FileLocator(__DIR__ . '/Fixtures');
    $loader = new YamlFileLoader($container, $locator);
    $loader->load($file);

    $container->getCompilerPassConfig()->setOptimizationPasses(array());
    $container->getCompilerPassConfig()->setRemovingPasses(array());
    $container->compile();

    return $container;
  }
}
