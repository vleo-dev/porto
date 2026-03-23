import { createApp } from 'vue';
import AppFloat from './AppFloatingLines.vue';
import SkillCardWrapper from './SkillCardWrapper.vue';

const skillMounts = document.querySelectorAll('.vue-skill-card-mount');

const initApps = () => {
	// 1. Montage Galaxy
	const AppFloatEl = document.getElementById('floating_lines-vue');
	if (AppFloatEl) {
		createApp(AppFloat).mount(AppFloatEl);
	}
};

skillMounts.forEach((el) => {
	const content = el.innerHTML;
	el.innerHTML = ''; // On vide

	createApp(SkillCardWrapper, {
		phpContent: content // On passe la variable ici
	}).mount(el);
});

// On lance l'initialisation dès que le document est prêt
if (document.readyState === 'complete' || document.readyState === 'interactive') {
	initApps();
} else {
	document.addEventListener('DOMContentLoaded', initApps);
}
