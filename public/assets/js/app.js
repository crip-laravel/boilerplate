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
        external_plugins: {"filemanager": "/vendor/crip/cripfilemanager/js/plugin.js"}
    });
}
//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbImFwcC5qcyJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiQUFBQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBIiwiZmlsZSI6ImFwcC5qcyIsInNvdXJjZXNDb250ZW50IjpbIi8vIEhlbGxvIGZyb20gbXkgYXBwXHJcbmlmICh0aW55bWNlKSB7XHJcbiAgICB0aW55bWNlLmluaXQoe1xyXG4gICAgICAgIHBsdWdpbnM6IFtcclxuICAgICAgICAgICAgXCJhZHZsaXN0IGF1dG9saW5rIGxpbmsgaW1hZ2UgbGlzdHMgY2hhcm1hcCBwcmludCBwcmV2aWV3IGhyIGFuY2hvciBwYWdlYnJlYWtcIixcclxuICAgICAgICAgICAgXCJzZWFyY2hyZXBsYWNlIHdvcmRjb3VudCB2aXN1YWxibG9ja3MgdmlzdWFsY2hhcnMgaW5zZXJ0ZGF0ZXRpbWUgbWVkaWEgbm9uYnJlYWtpbmdcIixcclxuICAgICAgICAgICAgXCJ0YWJsZSBjb250ZXh0bWVudSBkaXJlY3Rpb25hbGl0eSBlbW90aWNvbnMgcGFzdGUgdGV4dGNvbG9yIGNyaXBmaWxlbWFuYWdlclwiXHJcbiAgICAgICAgXSxcclxuICAgICAgICBsYW5ndWFnZTogKExBTkcgPT09ICdlbicgPyAnZW5fR0InIDogTEFORyksXHJcbiAgICAgICAgc2VsZWN0b3I6IFwiLnRpbnltY2VcIixcclxuICAgICAgICBleHRlcm5hbF9maWxlbWFuYWdlcl9wYXRoOiBcIi9cIiArIExBTkcgKyBcIi9maWxlbWFuYWdlci9cIixcclxuICAgICAgICBleHRlcm5hbF9wbHVnaW5zOiB7XCJmaWxlbWFuYWdlclwiOiBcIi92ZW5kb3IvY3JpcC9maWxlbWFuYWdlci9qcy9wbHVnaW4uanNcIn1cclxuICAgIH0pO1xyXG59Il0sInNvdXJjZVJvb3QiOiIvc291cmNlLyJ9
