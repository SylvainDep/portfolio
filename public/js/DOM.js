var LoginProcess = (function () {

    var self = {
        LoginLink: document.getElementById("loginlink"),
        LoginBox: document.getElementById("loginbox")
    };

    return self;
})();

var AddWorkProcess = (function () {

    var self = {
        AddWorkLink: document.getElementById("addworkbutton"),
        AddWorkBox: document.getElementById("addworkbox")
    };

    return self;
})();

var Gallery = (function () {

    var self = {
        ButtonAll: document.getElementById("selector_all"),
        ButtonWebsite: document.getElementById("selector_websites"),
        ButtonSeo: document.getElementById("selector_seo"),
        ButtonContent: document.getElementById("selector_content"),
        WorksWebsite: document.getElementsByClassName("website_work"),
        WorksSeo: document.getElementsByClassName("seo_work"),
        WorksContent: document.getElementsByClassName("content_work")
    };

    return self;
})();
