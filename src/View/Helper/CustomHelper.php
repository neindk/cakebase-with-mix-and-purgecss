<?php
/**
 * Created by IntelliJ IDEA.
 * User: indra
 * Date: 2018-03-11
 * Time: 08:33 AM
 */

namespace App\View\Helper;


use Cake\View\Helper;

class CustomHelper extends Helper
{
    const MANIFEST_PATH = WWW_ROOT . 'mix-manifest.json';

    /**
     * @param $path
     * @return string versioned asset path
     */
    public function assetPath($path)
    {
        static $manifest;
        if (!$manifest) {
            $manifest = file_get_contents(static::MANIFEST_PATH);
        }

        $params = json_decode($manifest, true);

        try {
            return $params[$path];

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

}
