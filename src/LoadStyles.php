<?php namespace LucasBRamos\WordpressAssetsLoad;

class LoadStyles extends LoadConfig implements ILoadAssets
{
  private $media;

  private $styles = [];

  /**
   * LoadScripts constructor.
   * @param $plugin_name
   * @param $plugin_version
   * @param $path_to_assets
   * @param array $styles
   */
  public function __construct($plugin_name, $plugin_version, array $styles, $path_to_assets = null, $media = 'all')
  {
    $this->plugin_name = $plugin_name;
    $this->plugin_version = $plugin_version;
    $this->styles = $styles;
    $this->path_to_assets = $path_to_assets;
    $this->media = $media;
  }

  public function enqueue()
  {
    if (count($this->styles) < 1) return;

    foreach ($this->styles as $script) {
      $deps = null;

      if(array_key_exists('deps', $this->styles))
        $deps = $this->styles['deps'];

      if($this->is_admin) {
        wp_enqueue_media();
      }

      if($this->styles['is_external'])
        wp_enqueue_style($this->styles['name'] . '-' . $this->plugin_name, $this->styles['file'], $deps, $this->plugin_version, true);
      else
        wp_enqueue_style($this->styles['name'] . '-' . $this->plugin_name, $this->path_to_assets . $script['file'], $deps, $this->plugin_version, $this->media);
    }
  }

  public function getAssets()
  {
    return $this->styles;
  }
}
