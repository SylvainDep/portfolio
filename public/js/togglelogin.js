/* ==== MODAL === */

var ToggleLogin = (function () {

    var self = {};

    /* LANCEMENT DE COMMANDE */

    self.init = function () {
        LoginProcess.LoginLink.addEventListener("click", function (e) {
            e.preventDefault();

            if (LoginProcess.LoginBox.style.display === "none") {
                LoginProcess.LoginBox.style.display = "flex";
            } else {
                LoginProcess.LoginBox.style.display = "none";
            }
        });

    };

    return self;
})();