<?php

use LucasBRamos\WordpressAssetsLoad\LoadScripts;

class LoadScriptsTest extends PHPUnit_Framework_TestCase
{
  public function testIfAssetIsEmpty()
  {
    $scripts = [];

    $scripts = new LoadScripts(
      'WordpressAssetsLoad',
      '0.1.0',
      $scripts
    );

    $this->assertCount(0, $scripts->getAssets());
  }

  public function testIfIsNotEmpty()
  {
    $scripts = [
      [
        'name' => 'jquery-cdn',
        'file' => 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js',
        'deps' => array(),
        'is_external' => false
      ]
    ];

    $scripts = new LoadScripts(
      'WordpressAssetsLoad',
      '0.1.0',
      $scripts
    );

    $this->assertCount(1, $scripts->getAssets());
  }
}
