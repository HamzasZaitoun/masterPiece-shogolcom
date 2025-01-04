import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Check if the user is registering for the first time
if (!localStorage.getItem('isFirstTimeUser')) {
    localStorage.setItem('isFirstTimeUser', 'true');
    startIntro(); // Start the Intro.js tour
}
function startIntro() {
    const intro = introJs();
    intro.setOptions({
        steps: [
            {
                element: '#step1', // The ID of the element to highlight
                intro: "Welcome to our website! This is the first step of the tour.",
                position: 'bottom'
            },
            {
                element: '#step2',
                intro: "Here you can manage your profile.",
                position: 'right'
            },
            {
                element: '#step3',
                intro: "This is where you can browse available jobs.",
                position: 'top'
            },
            // Add more steps as necessary
        ]
    });

    intro.start();
}
