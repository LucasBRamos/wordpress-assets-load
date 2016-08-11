<?php namespace LucasBRamos\WordpressAssetsLoad;

/**
 *
 * Carrega os styles utilizando a API do WordPress
 *
 * @author Lucas Bernieri Ramos
 * @package LucasBRamos\WordpressAssetsLoad
 */
class LoadStyles extends LoadConfig implements ILoadAssets
{
  /**
   *
   * Tipo de média que o style deve ser exibido. Ex (all, screen)
   *
   * @var string
   */
  private $media;

  /**
   *
   * Armazena todos os styles passados na instanciação da classe
   *
   * @var array
   */
  private $styles = [];

  /**
   *
   * Construtor
   *
   * @param $plugin_name
   * @param $plugin_version
   * @param $path_to_assets
   * @param array $styles
   */
  public function __construct($plugin_name, $plugin_version, array $styles, $path_to_assets = null, $media = 'all')
  {
    $this->plugin_name       = $plugin_name;
    $this->plugin_version    = $plugin_version;
    $this->styles            = $styles;
    $this->path_to_assets    = $path_to_assets;
    $this->media             = $media;
  }

  /**
   *
   * Enfileira todos os assets passados
   *
   * @return void
   */
  public function enqueue()
  {
    if (count($this->styles) < 1) return;

    foreach ($this->styles as $style) {
      $deps = null;

      if(array_key_exists('deps', $this->styles))
        $deps = $this->styles['deps'];

      if($this->styles['is_external'])
        wp_enqueue_style($style['name'] . '-' . $this->plugin_name, $style['file'], $deps, $this->plugin_version, true);
      else
        wp_enqueue_style($style['name'] . '-' . $this->plugin_name, $this->path_to_assets . $style['file'], $deps, $this->plugin_version, $this->media);
    }
  }


  /**
   *
   * Retorna todos os styles passados
   *
   * @return array
   */
  public function getAssets()
  {
    return $this->styles;
  }
}
