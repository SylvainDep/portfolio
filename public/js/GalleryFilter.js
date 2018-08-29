/* ==== MODAL === */

var GalleryFilter = (function () {

    var self = {};

    /* LANCEMENT DE COMMANDE */

    self.init = function () {
        Gallery.ButtonWebsite.addEventListener("click", function (e) {
            e.preventDefault();


            for (i = 0; i < Gallery.WorksWebsite.length; i++){
                Gallery.WorksWebsite[i].style.display = "block";
            }

            for (i = 0; i < Gallery.WorksSeo.length; i++){
                Gallery.WorksSeo[i].style.display = "none";
            }

            for (i = 0; i < Gallery.WorksContent.length; i++){
                Gallery.WorksContent[i].style.display = "none";
            }
        });

        console.log('tog');

    };

    return self;
})();