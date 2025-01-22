document.addEventListener("DOMContentLoaded", () => {
    const flashMessages = document.querySelectorAll("#flash-message");

    flashMessages.forEach((flashMessage) => {
        // Ajout du bouton de fermeture
        const closeButton = document.createElement("button");
        closeButton.type = "button";
        closeButton.className = "absolute top-2 right-2 text-pearl bg-transparent hover:bg-text-pumpkin-btn";
        closeButton.setAttribute("aria-label", "Fermer le message de confirmation de la création du compte");
        closeButton.innerHTML = "&times;"; // Symbole de la croix

        // Ajout du bouton au flash message
        flashMessage.appendChild(closeButton);

        // Suppression manuelle via le bouton
        closeButton.addEventListener("click", () => {
            flashMessage.classList.add("opacity-0"); // Transition
            setTimeout(() => {
                flashMessage.remove(); // Suppression du DOM
            }, 500); // Correspond à la durée de la transition CSS
        });

        // Suppression automatique après 3 secondes
        setTimeout(() => {
            flashMessage.classList.add("opacity-0");
        }, 3000);

        setTimeout(() => {
            flashMessage.remove();
        }, 4000);
    });
});