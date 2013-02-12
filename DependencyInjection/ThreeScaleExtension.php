<?php
/**
 * Created by Adlogix NV/SA.
 * User: Toni Van de Voorde (toni@adlogix.eu)
 * Date: 11/02/13
 * Time: 14:54
 */

namespace ToniVdv\ThreeScaleBundle\DependencyInjection;

use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Config\Definition\Processor;

class ThreeScaleExtension extends Extension {

  /**
   * Loads a specific configuration.
   */
  public function load(array $configs, ContainerBuilder $container) {

    $processor = new Processor();
    $configuration = new Configuration($container->getParameter('kernel.debug'));
    $config = $processor->processConfiguration($configuration, $configs);


    $loader = new XmlFileLoader(
      $container,
      new FileLocator(__DIR__.'/../Resources/config')
    );
    $loader->load('3scale.xml');

    $container->getDefinition('3scale.client')->replaceArgument(0, $config['provider_key']);
  }

  public function getAlias() {
    return 'three_scale';
  }

}
