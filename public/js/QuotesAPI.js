/* === APPEL DES STATIONS DECAUX ==== */

var Quotes = (function () {

    var self = {};

    /* CHARGEMENT DES FICHIERS DEPUIS L'API */

    // Va chercher les données sur le serveur Decaux
    self.getFromAPI = function () {

        // appel l'API Decaux, et transforme les objets en tableau
        ajaxGet("https://talaikis.com/api/quotes/random/", function (data) {
            var quotes = JSON.parse(data);

            document.getElementById("quote_text").textContent = quotes.quote;
            document.getElementById("quote_author").textContent = quotes.author;
        });
    }

    /* DEFINITION GENERIQUE DE LA FONCTION DE RECHERCHE SUR API */

    function ajaxGet(url, callback) {
        var req = new XMLHttpRequest();
        req.open("GET", url);
        req.addEventListener("load", function () {
            if (req.status >= 200 && req.status < 400) {
                // Appelle la fonction callback en lui passant la réponse de la requête
                callback(req.responseText);
            } else {
                console.error(req.status + " " + req.statusText + " " + url);
            }
        });
        req.addEventListener("error", function () {
            console.error("Erreur réseau avec l'URL " + url);
        });
        req.send(null);
    }

    return self;
})();
