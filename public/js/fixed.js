/**
 * Created by aminelahrim on 15/02/2018.
 */
document.addEventListener('DOMContentLoaded', function () {

    var makesticky = function (element) {

        //la distance de scroll
        var scrollY = pageYOffset;
        //offset la distance entre top du document et quand element va etre fixed
        var offset = parseInt(element.getAttribute('data-offset') || 0);//soit have offset soit 0
        //top est doit etre cste en Refrech
        var rect = element.getBoundingClientRect();
        var top = rect.top + scrollY;
        var fake = document.createElement('div');
        fake.style.width = rect.width + "px";
        fake.style.height = rect.height + "px";
        //constraint l'encadrement de chaque element
        var constraint;
        var constraint_element = element.getAttribute('data-constraint');
        if (constraint_element) {
            constraint = document.querySelector(constraint_element)
        }
        else {
            constraint = document.body
        }
        var constraintRect = constraint.getBoundingClientRect();
        var constraintButtom = constraintRect.top + constraintRect.height - rect.height - offset + scrollY;


        //functions
        var OnScroll = function (e) {
            if (e === true) {
                scrollY = pageYOffset;
            }


            if (scrollY > constraintButtom && element.style.position !== 'absolute' && !element.classList.contains('menu')) {
                element.style.position = 'absolute';
                element.style.bottom = '0';
                element.style.top = 'auto';

            }
            else if (scrollY > top - offset && scrollY < constraintButtom && element.style.position !== 'fixed') {
                element.style.position = 'fixed';
                element.style.top = offset + 'px';
                element.style.bottom = 'auto';
                element.style.width = rect.width + 'px';
                element.parentNode.insertBefore(fake, element);


            } else if (scrollY < top - offset && element.style.position !== 'static') {
                element.style.position = 'static';
                if (element.parentNode.contains(fake)) {
                    element.parentNode.removeChild(fake);

                }


            }

        };
        var OnResize = function () {
            element.style.position = 'static';
            element.style.width = "auto";
            fake.style.display = "none";
            rect = element.getBoundingClientRect();
            constraintRect = constraint.getBoundingClientRect();
            constraintButtom = constraintRect.top + constraintRect.height - rect.height - offset + scrollY;

            fake.style.width = rect.width + "px";
            fake.style.height = rect.height + "px";
            fake.style.display = "block";

            OnScroll(false);

        };

        var OnScroll2 = function () {
            OnScroll(true);
        };

        //Listener
        window.addEventListener('scroll', OnScroll2);
        window.addEventListener('resize', OnResize);

    };


    var elements = document.querySelectorAll('[data-sticky]');

    for (var i = 0; i <= elements.length - 1; i++) {
        makesticky(elements[i]);
    }
});
