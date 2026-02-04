import { createApp } from 'vue';
import AppPillar from './App.vue';
import AppSplash from './AppSplash.vue';

// Montage 1 : Le fond dans le header
createApp(AppPillar).mount('#light-pillar-vue');

// Montage 2 : Le fluide dans le footer (partout)
setTimeout(() => {
	const splashEl = document.getElementById('global-splash-cursor');
	if (splashEl) {
		console.log("Tentative de montage du Splash...");
		createApp(AppSplash).mount(splashEl);
	}
}, 500); // On attend 500ms
