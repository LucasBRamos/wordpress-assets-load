<?php namespace LucasBRamos\WordpressAssetsLoad;

interface ILoadAssets
{
  public function enqueue();

  public function getAssets();
}
