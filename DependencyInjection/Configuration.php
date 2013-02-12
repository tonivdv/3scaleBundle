<?php
/**
 * Created by Adlogix NV/SA.
 * User: Toni Van de Voorde (toni@adlogix.eu)
 * Date: 11/02/13
 * Time: 16:15
 */

namespace ToniVdv\ThreeScaleBundle\DependencyInjection;

use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;

class Configuration implements ConfigurationInterface {

  /**
   * Generates the configuration tree builder.
   *
   * @return \Symfony\Component\Config\Definition\Builder\TreeBuilder The tree builder
   */
  public function getConfigTreeBuilder() {

    $tree = new TreeBuilder();

    $tree->root('three_scale')
      ->children()
        ->scalarNode('provider_key')->defaultValue(false)->isRequired()->end()
      ->end();

    return $tree;

  }
}
