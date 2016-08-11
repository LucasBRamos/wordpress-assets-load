<?php namespace LucasBRamos\WordpressAssetsLoad;

/**
 *
 * Carrega os scripts usando a API do WordPress.
 *
 * @author Lucas Bernieri Ramos
 * @package LucasBRamos\WordpressAssetsLoad
 */
class LoadScripts extends LoadConfig implements ILoadAssets
{

  /**
   *
   * Armazena os scripts que são passados na instanciação da classe
   *
   * @var array
   */
  private $scripts = [];

  /**
   *
   * Construtor
   *
   * @param $plugin_name
   * @param $plugin_version
   * @param $path_to_assets
   * @param array $scripts
   */
  public function __construct($plugin_name, $plugin_version, array $scripts, $path_to_assets = null)
  {
    $this->plugin_name       = $plugin_name;
    $this->plugin_version    = $plugin_version;
    $this->scripts           = $scripts;
    $this->path_to_assets    = $path_to_assets;
  }

  /**
   *
   * Enfileira todos os scripts passados
   *
   * @return void
   */
  public function enqueue()
  {
    if (count($this->scripts) < 1) return;

    foreach ($this->scripts as $script) {
      $deps = null;

      if(array_key_exists('deps', $this->scripts))
        $deps = $this->scripts['deps'];

      if($this->is_admin) {
        wp_enqueue_media();
      }

      if($this->scripts['is_external'])
        wp_enqueue_script($script['name'] . '-' . $this->plugin_name, $script['file'], $deps, $this->plugin_version, true);
      else
        wp_enqueue_script($script['name'] . '-' . $this->plugin_name, $this->path_to_assets . $script['file'], $deps, $this->plugin_version, true);
    }
  }

  /**
   *
   * Retorna todos os scripts carregados
   *
   * @return array
   */
  public function getAssets()
  {
    return $this->scripts;
  }
}
