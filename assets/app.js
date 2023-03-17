/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';



// start the Stimulus application
import './bootstrap';
import './styles/tailwind.css';
import 'tw-elements';



var speed = 10;

/* Call this function with a string containing the ID name to
 * the element containing the number you want to do a count animation on.*/
function incEltNbr(id) {
    elt = document.getElementById(id);
    endNbr = Number(document.getElementById(id).innerHTML);
    incNbrRec(0, endNbr, elt);
}

/*A recursive function to increase the number.*/
function incNbrRec(i, endNbr, elt) {
    if (i <= endNbr) {
        elt.innerHTML = i;
        setTimeout(function() {//Delay a bit before calling the function again.
            incNbrRec(i + 1, endNbr, elt);
        }, speed);
    }
}

/*Function called on button click*/
function incNbr(){
    incEltNbr("nbr");
}

incEltNbr("nbr"); /*Call this funtion with the ID-name for that element to increase the number within*/


