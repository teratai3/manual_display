<?php

namespace Drupal\manual_display\Controller\Admin;

use Drupal\Core\Controller\ControllerBase;
use Drupal\manual_display\Traits\MarkdownTrait;

/**
 * マークダウンを解析してHTMLを表示するコントローラークラス.
 */
class ManualDisplayController extends ControllerBase {
  use MarkdownTrait;

  /**
   * マークダウン ファイルから生成された HTML をレンダリングします.
   */
  public function index() {
    $build = [];
    $build['content'] = [
      '#markup' => $this->getMarkdownParse("Admin/ManualDisplay/index"),
       // '#allowed_tags' => ['p', 'br', 'strong', 'em', 'ul', 'ol', 'li', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'blockquote'], //許可するhtmlタグを制限
    ];

    return $build;
  }

}
