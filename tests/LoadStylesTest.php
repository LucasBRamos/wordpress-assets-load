<?php

use LucasBRamos\WordpressAssetsLoad\LoadStyles;

class LoadStylesTest extends PHPUnit_Framework_TestCase
{
  public function testIfAssetIsEmpty()
  {
    $styles = [];

    $styles = new LoadStyles(
      'WordpressAssetsLoad',
      '0.1.0',
      $styles
    );

    $this->assertCount(0, $styles->getAssets());
  }

  public function testIfIsNotEmpty()
  {
    $styles = [
      [
        'name' => 'bootstrap-cdn',
        'file' => 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css',
        'deps' => array(),
        'is_external' => false
      ]
    ];

    $styles = new LoadStyles(
      'WordpressAssetsLoad',
      '0.1.0',
      $styles
    );

    $this->assertCount(1, $styles->getAssets());
  }
}
