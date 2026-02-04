import { defineConfig } from '@rsbuild/core';
import { pluginVue } from '@rsbuild/plugin-vue';

export default defineConfig({
	plugins: [pluginVue()],
	source: {
		entry: {
			'bundle-espace': './themes/porto/src/main.js',
		},
	},
	output: {
		distPath: {
			root: 'themes/porto/js/dist',
			js: '',
		},
		filenameHash: false,
	},
	performance: {
		chunkSplit: {
			strategy: 'all-in-one',
		},
	},
});
