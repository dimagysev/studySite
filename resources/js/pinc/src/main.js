import './assets/jquery';
import './assets/jquery.tipsy';
import 'flexslider';
import './assets/jquery.aw-showcase';
import './assets/jquery.cycle.min';
import './assets/jquery.anythingslider';
import './assets/jquery.eislideshow';
import './assets/jquery.easing';
import './assets/layerslider.kreaturamedia.jquery-min';
import './assets/shortcodes';
import './assets/jquery.tweetable';
import './assets/jquery.custom';
import './assets/jquery.mobilemenu';

import Comments from './modules/comments'
import Contact from './modules/contact';


document.addEventListener('DOMContentLoaded', function () {
   const comment = new Comments('commentform', 'comments-container');
   const contact = new Contact('contact-form-contact-us');
   comment.run();
   contact.run();
});
