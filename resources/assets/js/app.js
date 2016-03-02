// Hello from my app
if (tinymce) {
    tinymce.init({
        plugins: [
            "advlist autolink link image lists charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
            "table contextmenu directionality emoticons paste textcolor cripfilemanager"
        ],
        language: (LANG === 'en' ? 'en_GB' : LANG),
        selector: ".tinymce",
        external_filemanager_path: "/" + LANG + "/filemanager/",
        external_plugins: {"filemanager": "/vendor/crip/filemanager/js/plugin.js"}
    });
}