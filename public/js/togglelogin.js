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

        LoginProcess.LoginBox.addEventListener("click", function (e) {
            e.preventDefault();

            if (e.target === this) {
                LoginProcess.LoginBox.style.display = "none";
            }
        });

        AddWorkProcess.AddWorkLink.addEventListener("click", function (e) {
            e.preventDefault();

            if (AddWorkProcess.AddWorkBox.style.display === "none") {
                AddWorkProcess.AddWorkBox.style.display = "flex";
            } else {
                AddWorkProcess.AddWorkBox.style.display = "none";
            }
        });

        AddWorkProcess.AddWorkBox.addEventListener("click", function (e) {
            e.preventDefault();

            if (e.target === this) {
                AddWorkProcess.AddWorkBox.style.display = "none";
            }
        });

    };

    return self;
})();