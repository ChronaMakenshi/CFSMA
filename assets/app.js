/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';

// or, specify which plugins you need:
import { Tooltip, Toast, Popover } from 'bootstrap';

import 'datatables.net';
import 'datatables.net-bs5';
$('#datatable').DataTable({
    "lengthMenu": [ [5, 10, 15, 20, -1], [5, 10, 15, 20, "toute les"] ],
    "scrollY": "45vh",
    "scrollX": true,
    "scrollCollapse": true,
    "language": {
    "lengthMenu": "Afficher _MENU_ lignes",
    "zeroRecords": "Rien trouvé - désolé",
    "info": "Nombre total de page _PAGE_ sur _PAGES_",
    "infoEmpty": "Aucun nombre de page disponible",
    "infoFiltered": "(filtré de _MAX_  nombre total de page)",
    "search":         "Rechercher :",
    "paginate": {
        "next":       "Suivant",
        "previous":   "Précédent"
    },
}
});

  
