<?php

App::uses('Component', 'Controller');

class UploadComponent extends Component {
    /**
     * @param $request
     * @param null $path subdirectory under files with trailing slash.
     * @return null
     */
    public function store($request, $path = null, $filename = null, $options = array()) {
        $base_path = WWW_ROOT . 'files/';

        if (!empty($path)) {
            $base_path .= $path;

            if (!is_dir($base_path)) {
                mkdir($base_path);
            }
        }

        if ($request['error'] == 0) {
            if (array_key_exists('maxWidth', $options) && array_key_exists('maxHeight', $options)) {
                $image_info = getimagesize($request['tmp_name']);
                $image_width = $image_info[0];
                $image_height = $image_info[1];

                if ($image_width > $options['maxWidth'] || $image_height > $options['maxHeight']) {
                    return false;
                }
            }

            if ($filename == null) {
                $filename = $request['name'];
            }
            move_uploaded_file($request['tmp_name'], $base_path . $filename);
        }

        return $filename;
    }
}