$(function () {
    $('.carousel').carousel('cycle');
});

document.addEventListener('DOMContentLoaded', function () {

    var makeresize = function (element) {
        if (element) {
            var parentelement = element.parentNode;
            var rect = parentelement.getBoundingClientRect();
            var sidebarright = parentelement.querySelector('.sidebarright');
            paddingparentelement = 30;
            sidebarright.style.width = rect.width - 750 - paddingparentelement - 10 + 'px';


        }


    };


    element = document.querySelector('.jumbotron.splash');
    makeresize(element);

    var OnResize = function () {
        makeresize(element);
    };
    window.addEventListener('resize', OnResize);


});