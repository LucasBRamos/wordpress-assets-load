<?php namespace LucasBRamos\WordpressAssetsLoad;

class LoadScripts extends LoadConfig
{
  private $scripts = [];

  /**
   * LoadScripts constructor.
   * @param $plugin_name
   * @param $plugin_version
   * @param $is_admin
   * @param array $scripts
   */
  public function __construct($plugin_name, $plugin_version, array $scripts, $path_to_assets)
  {
    $this->plugin_name = $plugin_name;
    $this->plugin_version = $plugin_version;
    $this->scripts = $scripts;
    $this->path_to_assets = $path_to_assets;
  }

  public function enqueue_scripts()
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
        wp_enqueue_script($this->scripts['name'] . '-' . $this->plugin_name, $this->scripts['file'], $deps, $this->plugin_version, true);
      else
        wp_enqueue_script($this->scripts['name'] . '-' . $this->plugin_name, $this->path_to_assets . $script['file'], $deps, $this->plugin_version, true);
    }
  }
}