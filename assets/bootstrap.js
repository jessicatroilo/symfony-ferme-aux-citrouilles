import { Application } from 'stimulus';
import { definitionsFromContext } from 'stimulus/webpack-helpers';

// Créer une instance de l'application Stimulus
const application = Application.start();

// Charger les contrôleurs Stimulus
const context = require.context('./controllers', true, /.js$/);
application.load(definitionsFromContext(context));
