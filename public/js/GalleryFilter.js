var GalleryFilter = (function () {

    var self = {};

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

            Gallery.ButtonAll.classList.remove('current');
            Gallery.ButtonWebsite.classList.add('current');
            Gallery.ButtonSeo.classList.remove('current');
            Gallery.ButtonContent.classList.remove('current');
        });

        Gallery.ButtonSeo.addEventListener("click", function (e) {
            e.preventDefault();


            for (i = 0; i < Gallery.WorksWebsite.length; i++){
                Gallery.WorksWebsite[i].style.display = "none";
            }

            for (i = 0; i < Gallery.WorksSeo.length; i++){
                Gallery.WorksSeo[i].style.display = "block";
            }

            for (i = 0; i < Gallery.WorksContent.length; i++){
                Gallery.WorksContent[i].style.display = "none";
            }

            Gallery.ButtonAll.classList.remove('current');
            Gallery.ButtonWebsite.classList.remove('current');
            Gallery.ButtonSeo.classList.add('current');
            Gallery.ButtonContent.classList.remove('current');
        });

        Gallery.ButtonContent.addEventListener("click", function (e) {
            e.preventDefault();


            for (i = 0; i < Gallery.WorksWebsite.length; i++){
                Gallery.WorksWebsite[i].style.display = "none";
            }

            for (i = 0; i < Gallery.WorksSeo.length; i++){
                Gallery.WorksSeo[i].style.display = "none";
            }

            for (i = 0; i < Gallery.WorksContent.length; i++){
                Gallery.WorksContent[i].style.display = "block";
            }

            Gallery.ButtonAll.classList.remove('current');
            Gallery.ButtonWebsite.classList.remove('current');
            Gallery.ButtonSeo.classList.remove('current');
            Gallery.ButtonContent.classList.add('current');
        });

        Gallery.ButtonAll.addEventListener("click", function (e) {
            e.preventDefault();


            for (i = 0; i < Gallery.WorksWebsite.length; i++){
                Gallery.WorksWebsite[i].style.display = "block";
            }

            for (i = 0; i < Gallery.WorksSeo.length; i++){
                Gallery.WorksSeo[i].style.display = "block";
            }

            for (i = 0; i < Gallery.WorksContent.length; i++){
                Gallery.WorksContent[i].style.display = "block";
            }

            Gallery.ButtonAll.classList.add('current');
            Gallery.ButtonWebsite.classList.remove('current');
            Gallery.ButtonSeo.classList.remove('current');
            Gallery.ButtonContent.classList.remove('current');
        });
    };

    return self;
})();