/**
 * Created by aminelahrim on 01/03/2018.
 */
$('document').ready(function () {
    var categorie = document.querySelectorAll('.cate');

    var showcategorie = function (element) {
        var elementshow = element.querySelector('.sub-cate');
        elementshow.style.display = "block";
        $(elementshow).hide();


        $(element).click(function (e) {
            var other;
            for (var i = 0; i <= categorie.length - 1; i++) {//hide the pervious one that is on slideDown
                other = categorie[i].querySelector('.sub-cate');
                if (categorie[i] !== element && $(other).is(":visible")) {
                    $(other).slideUp(200);
                }
            }
            $(elementshow).slideToggle(500);
            e.stopPropagation();
        });
        $('body').click(function () {
            $(elementshow).slideUp(500);
        });

    };
    for (var i = 0; i <= categorie.length - 1; i++) {
        showcategorie(categorie[i]);
    }

});

