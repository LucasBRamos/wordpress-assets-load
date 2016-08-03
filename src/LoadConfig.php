<?php namespace LucasBRamos\WordpressAssetsLoad;

/**
 * LoadConfig deve ser extendida por classes que usem a API de enfileiramento de assets do WordPress
 *
 * @athor Lucas Bernieri Ramos
 * @package LucasBRamos\WordpressAssetsLoad
 */
abstract class LoadConfig
{
  /**
   *
   * Nome do plugin que irá ter os assets enfileirados
   *
   * @var string
   */
  public $plugin_name;

  /**
   *
   * Versão do plugin que irá ter os assets enfileirados
   *
   * @var string
   */
  public $plugin_version;

  /**
   *
   * Path para os arquivos que serão enfileirados
   *
   * @var string
   */
  public $path_to_assets;
}
