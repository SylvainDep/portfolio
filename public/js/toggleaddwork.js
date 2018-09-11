var ToggleAddWork = (function () {

    var self = {};

    self.init = function () {
        AddWorkProcess.AddWorkLink.addEventListener("click", function (e) {

            if (AddWorkProcess.AddWorkBox.style.display === "none") {
                AddWorkProcess.AddWorkBox.style.display = "flex";
            } else {
                AddWorkProcess.AddWorkBox.style.display = "none";
            }
        });

        AddWorkProcess.AddWorkBox.addEventListener("click", function (e) {

            if (e.target === this) {
                AddWorkProcess.AddWorkBox.style.display = "none";
            }
        });

    };

    return self;
})();