<?php

namespace Drupal\manual_display\Traits;

use Michelf\Markdown;

/**
 * モジュールのマークダウン解析機能を提供します。.
 */
trait MarkdownTrait {

  /**
   * マークダウンファイルを解析してHTMLに変換します.
   */
  protected function getMarkdownParse(string $file) {
    $my_txt = file_get_contents($this->getMarkdownPath($file));
    return Markdown::defaultTransform($my_txt);
  }

  /**
   * 指定されたマークダウンファイルのフルパスを取得します.
   */
  private function getMarkdownPath(string $file) {
    // 名前空間からモジュール名を取得
    // コントローラ先のthisを参照するので、参照先のモジュールに合わせてmdファイルを取得可能.
    $class = get_class($this);
    $parts = explode('\\', $class);

    $module_path = \Drupal::service('module_handler')->getModule($parts[1])->getPath();
    $full_path = realpath(DRUPAL_ROOT . '/' . $module_path);
    $markdown_file = $full_path . '/markdown_templates/' . $file . '.md';
    return $markdown_file;
  }

}
