<?php

namespace shop;

/**
 * Description of Cache
 *
 * @author Evgeniya
 */
class Cache {

    use TSingleton;

    public function set($key, $data, $seconds = 3600) {
        if ($seconds) {
            $content['data'] = $data;
            $content['end_time'] = time() + $seconds;
            $file = $this->getCacheFile($key);
            if (file_put_contents($file, serialize($content))) {
                return TRUE;
            }
        }
        return FALSE;
    }

    public function get($key) {
        $file = $this->getCacheFile($key);
        if (file_exists($file)) {
            $content = unserialize(file_get_contents($file));
            if (time() <= $content['end_time']) {
                return $content['data'];
            }
            unlink($file);
        }
        return FALSE;
    }

    public function delete($key) {
        $file = $this->getCacheFile($key);
        if (file_exists($file)) {
            unlink($file);
        }
    }

    public function getCacheFile($file_name) {
        return CACHE . '/' . md5($file_name) . '.txt';
    }

}
