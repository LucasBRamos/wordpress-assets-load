<?php namespace LucasBRamos\WordpressAssetsLoad;

/**
 *
 * ILoadAssets deve ser implementada por classes que irão enfileirar
 * assets utilizando a API de assets do WordPress
 *
 * @author Lucas Bernieri Ramos
 * @package LucasBRamos\WordpressAssetsLoad
 */
interface ILoadAssets
{
  /**
   *
   * Enfileira os assets do plugin
   *
   */
  public function enqueue();

  /**
   *
   * Retorna os assets que foram carregados
   *
   */
  public function getAssets();
}
