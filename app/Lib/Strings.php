<?php
 /**
 * Created by Roger Dickey, Jr
 * rdickey@whytespyder.com
 * 3/8/14 6:07 PM
 */

class Strings {
    public function sanitize($raw) {
        // Based on WordPress function
        // http://wpseek.com/sanitize_title_with_dashes/
        $slug = strtolower($raw);
        $slug = str_replace('.', '-', $slug);
        $slug = preg_replace('/[^%a-z0-9 _-]/', '', $slug);
        $slug = preg_replace('/\s+/', '-', $slug);
        $slug = preg_replace('|-+|', '-', $slug);
        $slug = trim($slug, '-');
        return $slug;
    }

    public function get_excerpt($full, $current = null) {
        $excerpt = strip_tags($current ? $current : $full);
        if (strlen($excerpt) > 255) {
            $excerpt = substr($excerpt, 0, 252) . '&hellip;';
        }
        return $excerpt;
    }
}