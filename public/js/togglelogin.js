var ToggleLogin = (function () {

    var self = {};

    self.init = function () {
        LoginProcess.LoginLink.addEventListener("click", function (e) {
            if (LoginProcess.LoginBox.style.display === "none") {
                LoginProcess.LoginBox.style.display = "flex";
            } else {
                LoginProcess.LoginBox.style.display = "none";
            }
        }, false);

        LoginProcess.LoginBox.addEventListener("click", function (e) {
            if (e.target === this) {
                LoginProcess.LoginBox.style.display = "none";
            }
        }, false);
    };

    return self;
})();