<?php

use LucasBRamos\WordpressAssetsLoad\WordpressAssetsLoad;

class WordpressAssetsLoadTest extends PHPUnit_Framework_TestCase
{
  public function testInicial()
  {
    $loader = new WordpressAssetsLoad();
    $this->assertTrue($loader->init());
  }
}
