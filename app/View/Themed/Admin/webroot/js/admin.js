/**
 * Created by Roger Dickey, Jr
 * rdickey@whytespyder.com
 * 3/11/14 11:27 PM
 */

if ( typeof CKEDITOR == 'undefined' ) {
    document.write(
        '<strong><span style="color: #ff0000">Error</span>: CKEditor not found</strong>.' +
            'This sample assumes that CKEditor (not included with CKFinder) is installed in' +
            'the "/ckeditor/" path. If you have it installed in a different place, just edit' +
            'this file, changing the wrong paths in the &lt;head&gt; (line 5) and the "BasePath"' +
            'value (line 32).' ) ;
}
else {
    if ($('.ckeditor').length) {
        CKFinder.setupCKEditor( null, '/js/ckfinder/' ) ;
    }
}
